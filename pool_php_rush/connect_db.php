<?php

define ("ERROR_LOG_FILE","error.log");

$host = "127.0.0.1";
$port = 3306;
$db = "pool_php_rush";
$username = "root";
$passwd="root";

try 
{
  $bdd = new PDO("mysql:host=" . $host . ";dbname=" . $db, $username, $passwd);
}
catch (PDOException $e)
{
  error_log($e->getMessage(), 3, ERROR_LOG_FILE);
  echo "PDO ERROR:" . $e->getMessage() . "storage in ERROR_LOG_FILE\n";
  return 0;
}


?>