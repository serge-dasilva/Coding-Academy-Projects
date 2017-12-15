<?php
if ($_SESSION) {
    foreach ($article as $var) {
        include(ROOT.'Views/articles/Expo.php'); 
    } 
} else {
    header("Location: http://localhost/PHP_Rush_MVC/users/login");
}
?>