<?php
session_start();
unset($_SESSION);
session_destroy();
header("Location: http://localhost/PHP_Rush_MVC/users/login")
?>