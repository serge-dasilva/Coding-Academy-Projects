<?php
session_start();
var_dump($_SESSION['id']);
echo '
<br>
<div class= "container" id="article">
<div class="row  z-depth-1">
    <div class="col s12 m12">
        <h4>'.$var['Title'].'</h4>
         <b>Auteur:</b> '.$var['Name'].'<br>
         <b>Publié le:</b> '.$var['Date_creation'].'<br>
         <b>Dernière modification le:</b> '.$var['Date_edition'].'
    </div>
    <div class="col s12 m12">
        <p>'.substr($var['Content'], 0, 50).'...</p>
    </div>
    <a class="btn blue-grey darken-4 white-text waves-effect waves-light" href="http://localhost/PHP_Rush_MVC/articles/index/'.$var['articleId'].'">Lire l\'article</a>
    ';
    if ($_SESSION['id'] == $var['Author_id']) {
        echo '<a class="btn light-green darken-4 white-text waves-effect waves-light" href="http://localhost/PHP_Rush_MVC/articles/index/'.$var['articleId'].'">Modifier l\'article</a>';
    }
echo '
</div>
</div>
';
?>

