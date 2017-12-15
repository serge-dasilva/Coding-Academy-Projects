<?php

class adminpage extends appController{

    protected $groupe;
    protected $status;

    // NETTOYER LES DONNEES
    function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;
    }

    //CONTROLL : PAGE INDEX DE L'ADMIN - CHARGEMENT DES DONNES
    function index(){

        $this->loadModel('admin');
        $arr['allUsers'] = $this->admin->getUsers();

        for($i=0; $i < count($arr['allUsers']); $i++)
        {
            if ($arr['allUsers'][$i]['Groupe'] == 1)
            {
            $arr['allUsers'][$i]['Groupe'] = 'Admin';
            }
            else if ($arr['allUsers'][$i]['Groupe'] == 2)
            {
            $arr['allUsers'][$i]['Groupe'] = 'Writer';
            }
            else if ($arr['allUsers'][$i]['Groupe'] == 3)
            {
            $arr['allUsers'][$i]['Groupe'] = 'Reader';
            }
        }
        
        for($j=0; $j < count($arr['allUsers']); $j++)
        {
            if ($arr['allUsers'][$j]['Status'] == 0)
            {
            $arr['allUsers'][$j]['Status'] = 'Free';
            }
            else if ($arr['allUsers'][$j]['Status'] == 1)
            {
            $arr['allUsers'][$j]['Status'] = 'Banni';
            }
        }      

        $this->set($arr);
        $this->render('index');
    }

    // CONTROLL : AJOUTER UN USER VIA PAGEADMIN
    function addUser(){

        $valid_name = false;
        $valid_email = false;
        $valid_password = false;

        $this->loadModel('admin');

        if ($_POST)
        {
            if(isset($_POST["name"]))
            {
                if (strlen($_POST["name"]) >= 3 && strlen($_POST["name"]) <= 10)
                {
                    $valid_name = true;
                }
                else
                {
                    echo "<br>" . "Invalid name";
                }
            }

            if(isset($_POST["email"]))
            {
                if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST["email"]))
                {
                    $valid_email = true;
                }
                else 
                {
                    echo "<br>" . "Invalid email";
                }
            }
            
            if(isset($_POST["password"]))
            {
                if (strlen($_POST["password"]) >= 8 && strlen($_POST["password"]) <= 20)
                {
                    $valid_password = true;
                }
                else 
                {
                    echo "<br>" . "Invalid password or password confirmation";
                }
            }

            if(isset($_POST['groupe']))
            {
                if ($_POST['groupe'] == "admin")
                {
                    $groupe = 1;
                }
                else if ($_POST['groupe'] == "writer")
                {
                    $groupe = 2;
                }
                else if ($_POST['groupe'] == "reader")
                {
                    $groupe = 3;
                }
            }

            if(isset($_POST['status']))
            {
                if ($_POST['status'] == "free")
                {
                    $status = 0;
                }
                else if ($_POST['status'] == "banned")
                {
                    $status = 1;
                }
            }

            $checkemail = admin::checkEmail($_POST['email']);
            $checkname = admin::checkName($_POST['name']);
            
            if ($checkemail == true && $checkname == true)
            {
                if($valid_name && $valid_email && $valid_password)
                
                {
                $hash_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                admin::addUser($_POST['name'], $hash_pass, $_POST['email'], $groupe, $status);
                }
            }


        }
        $this->render('addUser');

    }

    // CONTROLL : MODIFIER UN USER VIA PAGEADMIN
    function editUser($id){

        $name = "";
        $email = "";
        $groupe = "";
        $status = null;

        $this->loadModel('admin');

        if ($_POST)
        {
            if(isset($_POST["name"]))
            {
                if ($_POST['name'] != "")
                {
                    if (strlen($_POST["name"]) >= 3 && strlen($_POST["name"]) <= 10)
                    {
                            if(admin::checkName($_POST['name']) == true)
                            {
                            $name = $_POST['name'];
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
        

            if(isset($_POST["email"]))
            {
                if($_POST['email'] != "")
                {
                    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST["email"]))
                    {
                            if(admin::checkEmail($_POST['email']) == true)
                            {
                            $email = $_POST['email'];
                            }
                    }
                    else 
                    {
                        echo "<br>" . "Invalid email";
                    }
                }
                else if ($_POST['email'] == "")
                {
                    $email = null;
                }
            }
            
            if(isset($_POST['groupe']))
            {
                if ($_POST['groupe'] == "admin")
                {
                    $groupe = 1;
                }

                if ($_POST['groupe'] == "writer")
                {
                    $groupe = 2;
                }

                if ($_POST['groupe'] == "reader")
                {
                    $groupe = 3;
                }
                if ($_POST['groupe'] == "nomodif")
                {
                    $groupe = null;
                }

            }

            if(isset($_POST['status']))
            {
                if ($_POST['status'] == "free")
                {
                    $status = 0;
                }

                else if ($_POST['status'] == "banned")
                {
                    $status = 1;
                }
            }
            admin::editUser($id, $name, $email, $groupe, $status);
        }
    

    $arr['allUsers'] = $this->admin->getUsers();
    $this->set($arr);
    $arr['id'] = $id;
    $this->set($arr);
    $this->render('editUser');
}
    
        

    // CONTROLL : SUPPRIMER UN USER VIA PAGEADMIN
    public function deleteUser($id)
    {
       $this->loadModel('admin');
       admin::deleteUser($id);
    }

}





?>