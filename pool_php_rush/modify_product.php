<?php
	session_start();
	require('connect_db.php');
	include_once("Products.php");
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


		<title>Chair.com - Edit product</title>

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

	$products = new Products($bdd, $_POST["name"], $_POST["price"], $_POST["cat_product"], $_POST['cover']);

	if ($products->update($id))
	{
		$_SESSION["modify_product"] = "Update has been successful !";
		header("Location: admin.php");
		exit();
	}
	else
	{
		$_SESSION["modify_product"] = "Error ! an error has occured !";
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
              <span class="card-title">Card Title</span>

<form method="post" action="" class="form-admin">
<label for="product_name"  class="label-admin"> Product name : </label><input type="text" name="name" id="name" placeholder="Your new product" required/>
</br><br>
<label for ="product_price"  class="label-admin">Price : </label><input type="number" name="price" id="price" min="0" required/>
</br><br>
<label for="cat_product" class="label-admin">Category :</label>
                <select name="cat_product" id="cat_product" class="browser-default" id="select-admin" required>

                <?php
                //Requête pour récupérer le nom des catégories
                $sql = 'SELECT name FROM categories';
                $result = $bdd->prepare($sql);
                $result->execute();
                while($temp = $result->fetch()){
                
                   echo '<option value="' . $temp['name'] . '"' . '>' . $temp['name'] . '</option>';
                 }
                ?>
                </select>

<form action="" method="post" enctype="multipart/form-data" class="form-admin">
      <p>Upload the cover</p>
                <input type="file" name="cover"/><br />
<br><br>
<button class="btn waves-effect waves-light" type="submit" name="submit">Edit
<i class="material-icons right">send</i>
</button>


          </div>
        </div>
      </div>
