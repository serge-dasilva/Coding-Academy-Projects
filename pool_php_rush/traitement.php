<?php
session_start();
//include_once("Inscription.php");

//*********CONNEXION A LA BASE DE DONNEES*******

$host = "127.0.0.1";
$user = "root";
$pass = "root";
$port = array(3306);
$db = "gecko";

const ERROR_LOG_FILE = "~/Rendu/pool_php_d10";

function connect_db($host, $user, $pass, $port, $db)
{

	try 
	{
		$bdd = new PDO('mysql:host=' . $host .
			';dbname=' . $db .'; charset=utf8',
			 $user, $pass);
	} 
	catch (Exception $e) 
	{

		echo "Error connection to DB \n";
  		error_log($e, 3,  "ERROR_LOG_FILE") . "\n";
  		die();	
	}
	 return $bdd;
}


//********REQUETE : AJOUTER UN USER*****************

function add_user($name, $password, $email, $creation_date, $db)

{

$valid_name = FALSE;
$valid_email = FALSE;
$valid_password = FALSE;


if(isset($_POST["name"]))
{
	if (strlen($_POST["name"]) >= 3 && strlen($_POST["name"]) <= 10)
	{
		$valid_name = TRUE;
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
		$valid_email = TRUE;
	}
	else 
	{
		echo "<br>" . "Invalid email";
	}
}
	

if(isset($_POST["pass"]) && isset($_POST["confirm_pass"]))
{
	if (strlen($_POST["pass"]) >= 3 && strlen($_POST["pass"] < 10) && $_POST["pass"] == $_POST["confirm_pass"])
	{
		$valid_password = TRUE;
	}
	else 
	{
		echo "<br>" . "Invalid password or password confirmation";
	}
}

if($valid_name && $valid_email && $valid_password)

{
$hash_pass = password_hash($password, PASSWORD_DEFAULT); 
$req_insert = $db->prepare('INSERT INTO users VALUES (NULL,?,?,?,CURDATE(),?)');
$req_insert->execute(array($name, $hash_pass, $email, $creation_date)); 
header('Location: Inscription.php');

}

}


//********REQUETE : AUTHENTIFIER UN LOGIN*****************

function autho($pass_input, $email, $db)
{

$pass_input = $_POST['Password'];
$email = $_POST['Email'];

$req_get = $db->prepare("SELECT password FROM users WHERE email = ?");
$req_get->execute(array($_POST["Email"]));
$password = $req_get->fetch();

$verify = password_verify($pass_input, $password['password']);
echo "<br>";
echo "<br>";
echo "<br>";

if ($verify)
{
	header('Location: index.php');
	$req_get = $db->prepare("SELECT name FROM users WHERE email = ?");
	$req_get->execute(array($_POST["Email"]));
	$name = $req_get->fetch();
	//var_dump($name);

	$_SESSION['name'] = $name['name'];
	unset($_SESSION['error']);
}

else 
{
		$_SESSION['error'] = "invalid email or password";
		header('Location: login.php');
	
}






}






//**************MAIN***********************

$bdd = connect_db($host, $user, $pass, $port, $db);
//add_user($_POST['name'], $_POST['confirm_pass'], $_POST['email'], ('CURDATE()'), $bdd);
autho($_POST['Password'], $_POST['Email'], $bdd);


?>