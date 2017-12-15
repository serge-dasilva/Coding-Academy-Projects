<?php
if ($_SESSION['groupe'] == 3)
{
   header("Location: http://localhost/PHP_Rush_MVC/articles/index");
}

if ($_SESSION) {
    foreach ($myArticles as $var) {
        echo '
        <br>
        <div class= "container" id="article">
        <div class="row  z-depth-1">
        <div class="col s12 m12">
        <h4>'.$var['Title'].'</h4>
         <b>Publié le:</b> '.$var['Date_creation'].'<br>
         <b>Dernière modification le:</b> '.$var['Date_edition'].'
        </div>
        <div class="col s12 m12">
        <p>'.substr($var['Content'], 0, 50).'...</p>
        </div>
        <a class="btn blue-grey darken-4 white-text waves-effect waves-light" href="http://localhost/PHP_Rush_MVC/articles/getArticle/'.$var['Id'].'">Lire l\'article</a>
        <a class="btn light-green darken-4 white-text waves-effect waves-light" href="http://localhost/PHP_Rush_MVC/articles/updateArticle/'.$var['Id'].'">Modifier l\'article</a>
        <br>
        </div>
        </div>
        ';
    }
} else {
    header("Location: http://localhost/PHP_Rush_MVC/users/login");
}
?>  