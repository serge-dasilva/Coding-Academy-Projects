<?php
session_start();
include_once("User.php");
include_once("Products.php");
//require("connect_db.php");

if (isset($_GET["id"]))
{
	$id = $_GET["id"];

	$sql = "SELECT * FROM products WHERE id=" . $id;
	$req = $bdd->query($sql);

	$data = $req->fetch();

	$products = new Products($bdd, $data["name"], $data["price"], $data["category_id"]);

	if ($products->delete())
	{
		$_SESSION["message-crud-product"] = "This product has been deleted";
		header("Location: admin.php", true, 301);
		exit();
	}
	else
	{
		$_SESSION["message-crud-product"] = "Error: This product has not been deleted";
		header("Location: admin.php", true, 301);
		exit();
	}
}
?>
