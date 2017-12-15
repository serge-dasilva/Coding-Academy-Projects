<?php 
session_start();
if ($_SESSION['groupe'] != 1)
{
   header("Location: http://localhost/PHP_Rush_MVC/articles/index");
}
header('Location :http://localhost/PHP_Rush_MVC/adminpage/index');
?>