<?php
if ($_SESSION) {
    foreach ($article as $var) {
        include(ROOT.'Views/articles/Cours.php'); 
    } 
} else {
    header("Location: http://localhost/PHP_Rush_MVC/users/login");
}
?>