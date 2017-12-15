<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link rel="stylesheet" href="css/style1.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>RUSH PHP</title>

    </head>

    <body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


        <?php
        include_once('User.php');

            if ($_POST)
            {
            if ($_POST['name'] AND $_POST['email'] AND $_POST['pass'])
            {
                $user = new User($bdd, $_POST['name'], $_POST['pass'], $_POST['email']);
                $user->subscription();
                header('Location: index.php');
            }
            }
        ?>

        <nav>
          <div class="nav-wrapper">
          <a href="index.php" class="brand-logo center"><img src="images/director-chair-frontal-view.png"></a>
        <!--  <ul class="left hide-on-med-and-down">
            <!-- Dropdown Trigger -->
            <!--<li><a class="dropdown-button " href="#!" data-activates="dropdown1"><i class="material-icons">menu</i></a></li>
          </ul>-->

          </div>
        </nav>


        <div class="container">
            <div class="row">
              <div class="col s12 m10 l10">

                <form method="post" action="">
                </br>
                <br>
                <label for="name">Username : </label><input type="text" name="name" id="name" placeholder="Your username" required/>
                </br>
                <label for ="email">Email :</label><input type="text" name="email" id="email" placeholder="Your email" required/>
                </br>
                <label for="pass">Password :</label><input type="password" name="pass" id="pass" placeholder="Your password" required/>
                </br>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
                </button>
              </div>
                </div>
                  </div>
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
