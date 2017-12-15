<?php
//require('connect_db.php');
include_once('User.php');
include_once('Products.php');
include_once('Category.php');
session_start();

        if (isset($_SESSION['email']))
        {
            $email = $_SESSION['email'];
            $sql = "SELECT admin FROM users WHERE email='" . $email ."'";
            $req = $bdd->query($sql);

            $admin = $req->fetch();
        }

        if ($admin['admin'] == 0)
        {
            header('Location: index.php');
        }
?>

  <?php

            if ($_POST)
            {
            if ($_POST['cat_name'])
            {
                $category = new Category($bdd, $_POST['cat_name'], $_POST['parent_id']);
                $category->add_Category();
                header('Location: admin.php');
            }
            }
            
            
        ?>


<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
         <link rel="stylesheet" href="style1.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

       <title>Chair.com - Admin page</title>

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

            if ($_POST)
            {
            if ($_POST['username'] AND $_POST['email'] AND $_POST['pass'])
            {
                $user = new User($bdd, $_POST['username'], $_POST['pass'], $_POST['email']);
                $user->subscription();
                header('Location: admin.php');
            }

            }
        ?>

      <div class="row">
        <div class="col s12 m6" id="center">
          <div class="transparent">
            <div class="card-content black-text">
              <span class="card-title font">Add an user</span>


                <form method="post" action="" class = "form-admin">
                <label for="username" class="label-admin">Username : </label><input type="text" name="username" id="username" placeholder="Your username"/>
                </br><br>
                <label for ="email" class="label-admin">Email : </label><input type="text" name="email" id="email" placeholder="Your email"/>
                </br><br>
                <label for="pass" class="label-admin">Password :</label><input type="password" name="pass" id="pass" placeholder="Your password"/>
                <br><br>
                <label for="admin" class="label-admin">Admin :</label> <select name="admin" size="1" class="browser-default" id="select-admin" >
                                            <option value="0" >No</option>
                                            <option value="1">Yes</option>
                                            </select>
                    <br><br>
                <input class="waves-effect waves-light btn" type="submit" value="create"/>
            </div>
          </div>
        </div>
      </div>

 <table class="striped">
 <tr>
   <th>id</th>
   <th>Username</th>
   <!--<th>password</th>-->
   <th>Email</th>
   <th>Admin</th>
   <th>Edit</th>
   <th>Delete</th>
</tr>

<?php


//Display all users table
$requete = $bdd->prepare("SELECT * FROM users");
$requete->execute();
while($temp = $requete->fetch()){
?>

 <tr>
 <td><?php echo $temp["id"] ?></td>
 <td><?php echo $temp["username"] ?></td>
 <td><?php echo $temp["email"] ?></td>
 <td><?php echo $temp["admin"] ?></td>
 <td><a href="modify_user.php?id=<?php echo $temp["id"]; ?>">Edit</a></td>
 <td><a href="delete_user.php?id=<?php echo $temp["id"]; ?>">Delete</a></td>

<?php
}
?>
</table>

<br>
<?php
if (isset($_SESSION['modify_user']))
{
echo $_SESSION['modify_user'];
}
?>

 <br>
 <br>


  <?php
            if ($_POST)
            {
            if ($_POST['name'] AND $_POST['price'] AND $_POST['cover'])
            {
                $products = new Products($bdd, $_POST['name'], $_POST['price'], $_POST['cat_product'], $_POST['cover']);
                $products->add_Products();
                //header('Location: admin.php');
                

            }

            }
        ?>

      <div class="row">
        <div class="col s12 m6" id="center">
          <div class="transparent">
            <div class="card-content black-text">
              <span class="card-title">Add a product</span>

                <form method="post" action="" class="form-admin">
                <br>
                <label for="product_name" class="label-admin"> Product name : </label><input type="text" name="name" id="name" placeholder="Your new product"/>
                </br><br>
                <label for ="product_price" class="label-admin">Price : </label><input type="number" name="price" id="price" min="0"/>
                </br><br>

                <label for="cat_product" class="label-admin">Category :</label>
                <select name="cat_product" id="cat_product" class="browser-default" id="select-admin" >

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
<br>
                <input type="submit" value="Create"/>
              </form>
            </form>

            </div>
          </div>
        </div>
      </div>

<br>
<br>
 <table class="striped">
 <tr>
   <th>id</th>
   <th>Product</th>
   <th>Price</th>
   <th>Category</th>
   <th>Image</th>
   <th>Edit</th>
   <th>Delete</th>
</tr>

<?php

//Display all users table
$requete = $bdd->prepare("SELECT * FROM products");
$requete->execute();
while($temp = $requete->fetch()){
?>

 <tr>
 <td><?php echo $temp["id"] ?></td>
 <td><?php echo $temp["name"] ?></td>
 <td><?php echo $temp["price"] ?></td>
 <td><?php echo $temp["category_id"] ?></td>
 <td><?php echo $temp["cover"] ?></td>
 <td><a href="modify_product.php?id=<?php echo $temp["id"]; ?>">Edit</a></td>
 <td><a href="delete_product.php?id=<?php echo $temp["id"]; ?>">Delete</a></td>

<?php
}
?>

</table>

<?php
if (isset($_SESSION['modify_product']))
{
echo $_SESSION['modify_product'];
}
?>



      <div class="row">
        <div class="col s12 m6" id="center">
          <div class="transparent">
            <div class="card-content black-text">
              <span class="card-title">Add a category</span>

                <form method="post" action="" class="form-admin">
                <label for="cat_name" class="label-admin"> Category name : </label><input type="text" name="cat_name" id="cat_name" placeholder="Your new category"/>
                </br><br>
                <label for ="parent_id" class="label-admin">Parent ID : </label><input type="number" name="parent_id" id="parent_id" min="0"/>
                <br><br>
                <input class="waves-effect waves-light btn" type="submit" value="Create"/>
                </form>

            </div>
          </div>
        </div>
      </div>

              
 <table class="striped">
 <tr>
   <th>id</th>
   <th>Category</th>
   <th>Parent id</th>
   <th>Edit</th>
   <th>Delete</th>
</tr>

<?php

//Display all categories table
$requete = $bdd->prepare("SELECT * FROM categories");
$requete->execute();
while($temp = $requete->fetch()){
?>

 <tr>
 <td><?php echo $temp["id"] ?></td>
 <td><?php echo $temp["name"] ?></td>
 <td><?php echo $temp["parent_id"] ?></td>
 <td><a href="modify_category.php?id=<?php echo $temp["id"]; ?>">Edit</a></td>
 <td><a href="delete_category.php?id=<?php echo $temp["id"]; ?>">Delete</a></td>

<?php
}
?>

</table>

<?php
if (isset($_SESSION['modify_category']))
{
echo $_SESSION['modify_category'];
}
?>

        <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Chair.com</h5>
                <p><img src="images/director-chair-frontal-view.png"></p>
                <p class="grey-text text-lighten-4">Shop a fucking movie for a little price and fuck your girl !</p>
              </div>

            </div>
          </div>
          <div class="footer-copyright">
                      </div>
        </footer>

    </body>

</html>
