<?php
if(!isset($_SESSION)) { 
      session_start(); 
} 
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Blog</title>
  <link rel="stylesheet" type="text/css" href="../Webroot/Css/blog.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
</head>
<body>
<div class = "container z-depth-3">
<header><?php include(ROOT.'Views/Pages/header.php'); ?></header><br>

<?php
include(ROOT.'Views/Pages/script.php');
if ($_SESSION) {
  include(ROOT.'Views/Pages/menu.php');
}
?>
<?php 
echo $content_for_layout; 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<footer></footer>
</div>
</body>
</html>