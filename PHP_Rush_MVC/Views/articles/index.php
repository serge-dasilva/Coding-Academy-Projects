<?php
if ($_SESSION) {
    foreach ($allArticle as $var) {
        include(ROOT.'Views/articles/articlesList.php'); 
    } 
} else {
    header("Location: http://localhost/PHP_Rush_MVC/users/login");
}
?>         