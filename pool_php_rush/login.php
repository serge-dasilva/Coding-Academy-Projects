<?php
        session_start();
?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
 <link type="text/css" rel="stylesheet" href="css/style1.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Chair.com - Login</title>

        <!--Import Google Icon Font-->

    </head>

    <body>

              <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <!-- Dropdown Structure -->
      <!--<ul id="dropdown1" class="dropdown-content  ">
      <li><a href="inscription.php">Subscription</a></li>-->


      
      <nav>
        <div class="nav-wrapper">
        <a href="index.php" class="brand-logo center"><img src="images/director-chair-frontal-view.png"></a>
      <!--  <ul class="left hide-on-med-and-down">
          <!-- Dropdown Trigger -->
          <!--<li><a class="dropdown-button " href="#!" data-activates="dropdown1"><i class="material-icons">menu</i></a></li>
        </ul>-->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="inscription.php">Subscription</a></li>

      </ul>
        </div>
      </nav>

<header>
<div class="container">
    <div class="row">
      <div class="col s12 m10 l10">


      <!--<img class ="bkg" src="images/bkg-chair.jpeg">-->
      <form method="post" action="">
      </br>
      <br>
      <label for ="email">Email :</label><input type="text" name="email" id="email" placeholder="Your email" required/>
      </br>
      <br>
      <label for="pass">Password :</label><input type="password" name="pass" id="pass" placeholder="Your password" required/>
      <br>
      <br>

      <input type="checkbox" id="remember_me"  name="remember_me"/>
      <label for="remember_me">Remember me ?</label>

      </br>
      <br>
      <a href="inscription.php">Not registed yet ?</a>

      </br>
      <br>


      <!--<input type="submit" value="Valider"/>-->

<button class="btn waves-effect waves-light" type="submit" name="action">Submit
<i class="material-icons right">send</i>
</button>
</form>
</div>
</div>
</header>

        <?php
        include_once('User.php');

        if (isset($_COOKIE['email']))
        {
        	header('Location: index.php');
        }

        elseif ($_POST)
        {
        	if ($_POST['email'] AND $_POST['pass'])
        	{
        		$requete = $bdd->prepare('SELECT username FROM users WHERE email = ?');
				$requete->execute(array($_POST["email"]));
				$username = $requete->fetch();

				$user = new User($bdd, $username['username'], $_POST['pass'], $_POST['email']);
				$verif = $user->checkPassword($_POST['pass']);

				if ($verif == false)
				{
					echo "Incorrect email or password !";
				}
				elseif($_POST['remember_me'])
				{

        			setcookie('email', $_POST['email'], time() + 24*3600);
                    $_SESSION['email'] = $_POST['email'];
        			header('Location: index.php');
				}
				else
				{
                    $_SESSION['email'] = $_POST['email'];
					header('Location: index.php');
				}

        	}
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
