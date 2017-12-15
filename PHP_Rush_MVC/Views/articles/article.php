<?php
if ($_SESSION) {
echo '
<br>
<div class= "container" id="article">
<div class="row  z-depth-1">
    <div class="col s12 m12">
        <h4>'.$article['Title'].'</h4>
         <b>Auteur:</b> '.$article['Name'].'<br>
         <b>Publié le:</b> '.$article['Date_creation'].'<br>
         <b>Dernière modification le:</b> '.$article['Date_edition'].'
    </div>
    <div class="col s12 m12">
        <p>'.$article['Content'].'</p>
    </div>
</div>
</div>
';
} else {
    header("Location: http://localhost/PHP_Rush_MVC/articles/index");
}
?>