<?php
class user extends appModel {
    
    function addUser($post) {
        $sql = 'INSERT INTO users (Name, Password, Email, Groupe, Status, Date_creation, Date_edition)
        VALUES (:name, :password, :email, :groupe, :status, :datecreation, :dateedition)';
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute(array(
            ':name'=> $post['name'],
            ':password'=> password_hash($post['password'], PASSWORD_DEFAULT),
            ':email'=> $post['email'],
            ':groupe'=> '3',
            ':status'=> '0',
            ':datecreation'=> date("Y-m-d"),
            ':dateedition'=> date("Y-m-d")
        ));
    }

    public function mailExist($email) {
        $sql = "SELECT * FROM users WHERE Email = '$email'";
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetch();
        if ($retour != null) {
            return false;
        } else {
            return true;
        }
    }

    public function nameExist($name) {
        $sql = "SELECT * FROM users WHERE Name = '$name'";
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetch();
        if ($retour != null) {
            return false;
        } else {
            return true;
        }
    }

    public function passwordExist($name, $password) {
        $sql = "SELECT Password FROM users WHERE Name = '$name'";
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetch();
        if (password_verify($password, $retour['Password'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getUserSession($name) {
        $sql = "SELECT * FROM users WHERE Name = '$name'";
	    $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetch(PDO::FETCH_ASSOC);
        return $retour;
    } 

    public function myAccount($oldname, $newname=null, $password=null)
    {
        $sql = 'UPDATE users SET ';
        if($newname != null) {
          $sql .= "Name = '" . $newname. "', ";
        }
        if($password != null) {
          $sql .= "Password = '" . $password . "', ";
        }
        $sql .= "Date_edition = NOW() WHERE Name = " . "'" . $oldname . "'";
        $result = Connect_db::getBdd()->prepare($sql);
        if ($result->execute())
        {
            $validation = array("modification réussie !");
            return $validation;
        }     
    }

    // RECUPERER LES INFOS SUR LA BDD DE USERNAME
    public function displayInfos($id)
    {
        $sql = 'SELECT * FROM users WHERE Id = ' . $id;
        $result = Connect_db::getBdd()->prepare($sql);
        $result->execute();
        $retour = $result->fetchAll(PDO::FETCH_ASSOC);
        return $retour;
    }
    
}
?>