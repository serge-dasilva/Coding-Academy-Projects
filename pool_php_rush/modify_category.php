<?php
	session_start();
	require('connect_db.php');
	include_once("Category.php");
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
 <link type="text/css" rel="stylesheet" href="css/style1.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


		<title>Chair.com - Edit category</title>

      <!-- Dropdown Structure -->
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="logout.php">Log out</a></li>
      <li><a href="admin.php">Admin</a></li>
      <li class="divider"></li>

      </ul>
      <nav>
        <div class="col l8">
        <div class="nav-wrapper">
        <a href="index.php" class="brand-logo center"><img src="images/director-chair-frontal-view.png"></a>
        <ul class="right hide-on-med-and-down">
          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons">menu</i></a></li>
        </ul>
        </div>
      </div>
      </nav>


	</head>

	<body>

	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>



<?php

if (isset($_GET["id"]))
{
	$id = $_GET["id"];

	if ($_POST)
    {

	$category = new Category($bdd, $_POST["cat_name"], $_POST["parent_id"]);

	if ($category->update($id))
	{
		$_SESSION["modify_category"] = "Update has been successful !";
		header("Location: admin.php");
		exit();
	}
	else
	{
		$_SESSION["modify_category"] = "Error ! an error has occured !";
		header("Location: admin.php");
		exit();
	}
	}
}
?>


      <div class="row">
        <div class="col s12 m6" id="center">
          <div class="transparent">
            <div class="card-content black-text">
              <span class="card-title">Edit a category</span>

<form method="post" action="" class ="form-admin">
<label for="cat_name" class="label-admin"> Category name : </label><input type="text" name="cat_name" id="cat_name" placeholder="New name"/>
</br><br>
<label for ="parent_id" class="label-admin">Parent id : </label><input type="number" name="parent_id" id="parent_id" min="0"/>
<br><br>
<button class="btn waves-effect waves-light" type="submit" name="submit">Edit
<i class="material-icons right">send</i>
</button>

          </div>
        </div>
      </div>