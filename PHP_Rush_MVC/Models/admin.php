<?php 

class admin extends appModel{

// RECUPERER LES DONNNES DE LA BDD    
public function getUsers()
{
    $sql = 'SELECT * FROM users';
    $result = Connect_db::getBdd()->prepare($sql);
    $result->execute();
    $retour = $result->fetchAll(PDO::FETCH_ASSOC);
    return $retour;
}

// RECUPERE LE GROUPE D'UN USER
public function getGroupe($email)
{
    $sql = 'SELECT Groupe FROM users WHERE Email =' . $email;
    $result = Connect_db::getBdd()->prepare($sql);
    $result->execute();
    $retour = $result->fetchAll(PDO::FETCH_ASSOC);
    return $retour; 
}

// RECUPERE LE STATUS D'UN USER
public function getStatus($email)
{
    $sql = 'SELECT Status FROM users WHERE Email =' . $email;
    $result = Connect_db::getBdd()->prepare($sql);
    $result->execute();
    $retour = $result->fetchAll(PDO::FETCH_ASSOC);
    return $retour; 
}

// VERIFIER L'EXISTENCE D'UN NAME
public function checkName($name)
{
    $errors = [];

    // check username
        $sql = 'SELECT EXISTS (SELECT * FROM users WHERE Name = :name) AS username_exists';
        $result = Connect_db::getBdd()->prepare($sql);
        $data = array('name' => $name);

        $result->execute($data);

        $req = $result->fetch();

        if ($req["username_exists"])
        {
            $errors["name"] = "This name already exists";
        }
        else{
            return true;
        }
}

// VERIFIER L'EXISTENCE D'UN EMAIL
public function checkEmail($email)
{
    // check email
        $sql = 'SELECT EXISTS (SELECT * FROM users WHERE Email = :email) AS email_exists';
        $result = Connect_db::getBdd()->prepare($sql);
        $data = array('email' => $email);

        $result->execute($data);

        $req = $result->fetch();

        if ($req["email_exists"])
        {
            $errors["email"] = "This email already exists";
            return $errors;
        }
        else 
        {
            return true;
        }
}

// AJOUTER UN UTILISATEUR
public function addUser($name, $password, $email, $groupe, $status)
{
        $sql = 'INSERT INTO users (Name, Password, Email, Groupe, Status, Date_creation, Date_edition) VALUES (:name, :password, :email, :groupe, :status, :date_crea, :date_edit)';
        $result = Connect_db::getBdd()->prepare($sql);

        $data = array(
            'name' => $name,
            'password' => $password,
            'email' => $email,
            'groupe' => $groupe,
            'status' => $status,
            'date_crea' => date('Y-m-d H:i:s'),
            'date_edit' => date('Y-m-d H:i:s'),
            );

        if ($result->execute($data))
        {
            echo 'Ajouté avec succès !';
        }
}

// MODIFIER UN UTILISATEUR
/*public function editUser($id, $name, $email, $groupe, $status)
{
    $sql = 'UPDATE users SET Name = :name, Email = :email, Groupe = :groupe, Status = :status, Date_creation = :date_crea, Date_edition = :date_edit WHERE Id = :id';
            $result = Connect_db::getBdd()->prepare($sql);
    
            $data = array(
                'name' => $name,
                'email' => $email,
                'groupe' => $groupe,
                'status' => $status,
                'date_crea' => date('Y-m-d H:i:s'),
                'date_edit' => date('Y-m-d H:i:s'),
                'id' => $id
                );
    
            if ($result->execute($data))
            {
                echo "modification réussie !";
            }
}*/

public function editUser($id, $name = null, $email = null, $groupe = null, $status = null) {
    
    $sql = 'UPDATE users SET ';
    if($name != null) {
      $sql .= "Name = '" . $name. "', ";
    }
    if($email != null) {
      $sql .= "Email = '" . $email . "', ";
    }
    if($groupe != null) {
        $sql .= "Groupe = '" . $groupe . "', ";
      }
    if($status != null) {
      $sql .= "Status = '" . $status . "', ";
    }
    $sql .= "Date_edition = NOW() WHERE Id =" . $id;

    $result = Connect_db::getBdd()->prepare($sql);
    if ($result->execute())
    {
        echo "modification réussie !";
    }
  }

// SUPPRIMER UN UTILISATEUR
public function deleteUser($id)
{
    $sql = 'DELETE FROM users WHERE Id =' . $id;
    $result = Connect_db::getBdd()->prepare($sql);

    if ($result->execute())
    {
        header('Location: http://localhost/PHP_Rush_MVC/adminpage/index');
        echo "Cet user a été supprimé";
    }
} 


}
?>