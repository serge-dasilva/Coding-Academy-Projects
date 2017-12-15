<?php
session_start();
//include_once('Products.php');
require('connect_db.php');
?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
 <link rel="stylesheet" href="styleindex.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Chair.com - Movies</title>
    </head>
<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

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

  <nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

<header>

    <!--<div>
      <img class ="bkg" src="images/bkg-chair.jpeg">
    </div>-->

</header>

<!--
<main>
<div class="row">
       <div class="col s12 m4 l2">
         <div class="card hoverable">
           <div class="card-image">
             <img src="images/x-men1.jpeg">

           </div>
           <div class="card-content">
             <p class="center">X-men</p>
           </div>
           <div class="card-action">
             <a href="#">See more</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4 l2">
         <div class="card hoverable">
           <div class="card-image">
             <img src="images/hobbit.jpeg">

           </div>
           <div class="card-content">
             <p class="center">Hobbit</p>
           </div>
           <div class="card-action">
             <a href="#">See more</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4 l2">
         <div class="card hoverable">
           <div class="card-image">
             <img src="images/zoubir.jpeg">

           </div>
           <div class="card-content">
             <p class="center">Zoubir</p>
           </div>
           <div class="card-action">
             <a href="#">See more</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4 l2">
         <div class="card hoverable">
           <div class="card-image">
             <img src="images/inferno.jpeg">

           </div>
           <div class="card-content">
             <p class="center">Inferno</p>
           </div>
           <div class="card-action">
             <a href="#">See more</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4 l2">
         <div class="card hoverable">
           <div class="card-image">
             <img src="images/die-hard.jpeg">

           </div>
           <div class="card-content">
             <p class="center">Die-Hard</p>
           </div>
           <div class="card-action">
             <a href="#">See more</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4 l2">
         <div class="card hoverable">
           <div class="card-image">
             <img src="images/quantum.jpeg">

           </div>
           <div class="card-content">
             <p class="center">Quantum</p>
           </div>
           <div class="card-action">
             <a href="#">See more</a>
           </div>
         </div>
       </div>

     </div>

     <div class="row">
            <div class="col s12 m4 l2">
              <div class="card hoverable">
                <div class="card-image">
                  <img src="images/amelie-poulain.jpeg">

                </div>
                <div class="card-content">
                  <p class="center">Amelie Poulain</p>
                </div>
                <div class="card-action">
                  <a href="#">See more</a>
                </div>
              </div>
            </div>

            <div class="col s12 m4 l2">
              <div class="card hoverable">
                <div class="card-image">
                  <img src="images/projet-x.jpeg">

                </div>
                <div class="card-content">
                  <p class="center">Projet-X</p>
                </div>
                <div class="card-action">
                  <a href="#">See more</a>
                </div>
              </div>
            </div>

            <div class="col s12 m4 l2">
              <div class="card hoverable">
                <div class="card-image">
                  <img src="images/Cocoon.jpeg">

                </div>
                <div class="card-content">
                  <p class="center">Cocoon</p>
                </div>
                <div class="card-action">
                  <a href="#">See more</a>
                </div>
              </div>
            </div>

            <div class="col s12 m4 l2">
              <div class="card hoverable">
                <div class="card-image">
                  <img src="images/Star-Wars4.jpeg">

                </div>
                <div class="card-content">
                  <p class="center">Star wars 4</p>
                </div>
                <div class="card-action">
                  <a href="#">See more</a>
                </div>
              </div>
            </div>

            <div class="col s12 m4 l2">
              <div class="card hoverable">
                <div class="card-image">
                  <img src="images/Makarius.jpeg">

                </div>
                <div class="card-content">
                  <p class="center">Makarius</p>
                </div>
                <div class="card-action">
                  <a href="#">See more</a>
                </div>
              </div>
            </div>

            <div class="col s12 m4 l2">
              <div class="card hoverable">
                <div class="card-image">
                  <img src="images/Wicked.jpeg">

                </div>
                <div class="card-content">
                  <p class="center">Wicked</p>
                </div>
                <div class="card-action">
                  <a href="#">See more</a>
                </div>
              </div>
            </div>

          </div>

-->
<main>


<div class="row">

<?php

$sql = "SELECT * FROM products";
$requete = $bdd->prepare($sql);
$requete->execute();
while($temp = $requete->fetch()){

?>

       <div class="col s12 m4 l2">
         <div class="card hoverable">
           <div class="card-image">
             <img src=<?php echo '"' . $temp['cover'] . '"' ?>>

           </div>
           <div class="card-content">
             <p class="left"><?php echo $temp['name']?></p>
             <p class="right"><?php echo $temp['price'] . '€'?></p>
           </div>
           <div class="card-action">
             <a href="#">See more</a>

           </div>
         </div>
       </div>

<?php
}
?>

</div>



</main>
      <?php

      /*if (!isset($_SESSION['email']))
      {
        header('Location: login.php');
      }*/

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
