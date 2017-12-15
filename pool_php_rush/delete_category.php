<?php
session_start();
include_once("User.php");
include_once("Category.php");
//require("connect_db.php");

if (isset($_GET["id"]))
{
	$id = $_GET["id"];

	$sql = "SELECT * FROM categories WHERE id=" . $id;
	$req = $bdd->query($sql);

	$data = $req->fetch();

	$category = new Category($bdd, $data["name"], $data["parent_id"]);

	if ($category->delete())
	{
		$_SESSION["delete_category"] = "Update has been successful !";
		header("Location: admin.php");
		exit();
	}
	else
	{
		$_SESSION["delete_category"] = "Error ! an error has occured !";
		header("Location: admin.php");
		exit();
	}
}
?>
