<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link rel="stylesheet" href="css/style1.css">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>SEARCH PAGE</title>

</head>

<body>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

        <nav>
          <div class="nav-wrapper">
          <a href="index.php" class="brand-logo center">my movie</a>
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
                <label for="search">Search a movie</label><input type="search" name="search" id="search" placeholder="Search a movie"/>
                </br>
                <p>

			       Order by<br />

			       <input type="radio" name="order" value="order_name" id="order_name" /> <label for="order_name">Order by name</label><br />

			       <input type="radio" name="order" value="order_price" id="order_price" /> <label for="order_price">Order by price</label><br />
   				</p>
                <button class="btn waves-effect waves-light" type="submit" name="action">Search
                <i class="material-icons right">search</i>
                </button>
            </form>
              </div>
                </div>
                  </div>

<?php 

if($_POST)
{
	if ($_POST['search'] AND $_POST != null)
	{
		$search = $_POST['search'];
		$sql = 'SELECT * '
	}
}

?>


</body>
</html>