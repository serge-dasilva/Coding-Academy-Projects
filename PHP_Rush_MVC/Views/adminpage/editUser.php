<?php
session_start();
if ($_SESSION['groupe'] != 1)
{
   header("Location: http://localhost/PHP_Rush_MVC/articles/index");
}
?>

<h2>Page d'administration</h2>

<h3>Modifier un utilisateur</h3>

<form method="post" action="#">

<p><label for ="name">Modifier le nom : </label><input type="text" name="name" id="name"/></p>
<p><label for ="email">Modifier l'email : </label><input type="email" name="email" id="email"/></p>
<p><label for ="groupe">Définir Groupe : </label>
<p><select class="browser-default" name="groupe" id="groupe">
    <option value="nomodif">Ne pas modifier</option>
    <option value="admin">Admin</option>
    <option value="writer">Writer</option>
    <option value="reader">Reader</option>
</select>
</p>    
<p>
Status : <br/>
<input type="radio" name="status" id="free" value="free"/><label for="free">Ouvert</label><br/>
<input  type="radio" name="status" id="banned" value="banned"/><label for="banned">Banni</label><br/>
</p>
<p>
<input type="submit" value="Valider"/>
</p>

</form>