<?php
session_start();
class users extends appController { 

    function inscription() {
        $this->render('inscription');
    }

    public function inscriptionCheck() {
        $this->render('inscription');
        $this->loadModel('user');
        if ($this->passwordCheck($_POST['password'], $_POST['password_conf'])
                && $this->nameCheck($_POST['name'])
                    && $this->mailCheck($_POST['email'])) {
        $this->user->addUser($_POST);
        header("Location: http://localhost/PHP_Rush_MVC/articles/index");
        }
    }

     public function loginCheck() {
        $this->render('login');
        $this->loadModel('user');
        if ($this->user->nameExist($_POST['name']) == false 
                && $this->user->passwordExist($_POST['name'], $_POST['password']) == true) {
            $this->session($_POST['name']);
            header("Location: http://localhost/PHP_Rush_MVC/articles/index");
        } else {
            echo 'Bad name or password';
        }
        $this->session($_POST['name']);
    }

    public function passwordCheck($password, $password_conf) {
        if (empty($password) 
            || empty($password_conf)
                || strlen($password) < 8
                    || strlen($password) > 20
                        || strlen($password_conf) < 8
                            || strlen($password_conf) > 20 
                                || $password != $password_conf){
            echo 'invalid password';
            return false;
        } else {
            return true;
        }
    }

    public function nameCheck($name) {
        $this->loadModel('user');
        if ($this->user->nameExist($name)) {
            if (empty($name)
                || strlen($name) < 3
                    || strlen($name) > 20) {
                echo 'Invalid username';
                return false;
            } else {
                return true;
            }
        } else {
            echo 'This name already exist';
            return false;
        }
    }

    public function mailCheck($email) {
        $this->loadModel('user');
        if ($this->user->mailExist($email)) {
            if(empty($email) 
                || !preg_match('#^[a-z0-9A-Z._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $email)) {
                echo 'Invalid mail';
			    return false; 
		    } else {
                return true;
            }
        } else {
            echo 'This email already exist';
            return false;
        }
    }
    
    public function session($name){
        $this->loadModel('user');
        $retour = $this->user->getUserSession($name);
        $_SESSION['groupe'] = $retour['Groupe'];
        $_SESSION['login'] = true; 
        $_SESSION['name'] = $retour['Name'];
        $_SESSION['id'] = $retour['Id'];  
    }

    public function login() {
        $this->render('login');
    }

    public function logout() {
        session_start();
        unset($_SESSION);
        session_destroy();
        header("Location: http://localhost/PHP_Rush_MVC/users/login");
    }
/*
// CONTROLL : DISPLAY LES INFOS DE L'USER
public function displayInfos()
{
    $this->loadModel('user');
    $arr['infos'] = $this->user->displayInfos();
    $this->set($arr);
    $this->render('myAccount');
}*/

// CONTROLL : MODIFIER LES DONNES VIA USERPAGE
    public function myAccount()
    {
        $name = "";
        $password = "";
        $this->loadModel('user');
    if ($_SESSION)
    {
        if ($_POST)
        {
            if (isset($_POST['submit_name']))
            {
                if(isset($_POST["name"]))
                {
                    if ($_POST['name'] != "")
                    {
                        if (strlen($_POST["name"]) >= 3 && strlen($_POST["name"]) <= 10)
                        {
                                if(user::nameExist($_POST['name']) == true)
                                {
                                $name = $_POST['name'];
                                var_dump($name);
                                $arr['validation'] = user::myAccount($_SESSION['name'], $name);
                                $this->session($name);
                                $this->set($arr);
                                }
                        }
                        else
                        {
                            echo "<br>" . "Invalid name";
                        }
                    }
                    else if ($_POST['name'] == "")
                    {
                        $name = null;
                    }
                }
            }
        }

        if($_POST)
        {
            if (isset($_POST['submit_pass']))
            {
                if(isset($_POST["password"]))
                {
                    if($_POST['password'] != "")
                    {
                        if (strlen($_POST["password"]) >= 8 && strlen($_POST["password"] <= 20))
                        {
                            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                            $arr['validation'] = user::myAccount($_POST['name'], $password);
                            $this->set($arr);
                        }
                        else 
                        {
                            echo "<br>" . "Mot de passe invalide : Saisir entre 8 et 20 caractères.";
                        }
                    }
                    else if ($_POST['password'] == "")
                    {
                        $password = null;
                    }
                }
            }
        }
    $arr['infos'] = user::displayInfos($_SESSION['id']);
    $this->set($arr);
    $this->render('myAccount');
}
}

}
?>