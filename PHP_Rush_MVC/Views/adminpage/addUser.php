<?php
session_start();
if ($_SESSION['groupe'] != 1)
{
   header("Location: http://localhost/PHP_Rush_MVC/articles/index");
}
?>

<h2>Page d'administration</h2>

<h3>Ajouter un utilisateur</h3>

<form method="post" action="#">

<p><label for ="name">Nom : </label><input type="text" name="name" id="name"/></p>
<p><label for ="password">Mot de passe : </label><input type="password" name="password" id="password"/></p>
<p><label for ="email">Email : </label><input type="email" name="email" id="email"/></p>
<p><label for ="groupe">Groupe : </label>
<p><select name="groupe" class="browser-default" id="groupe">
    <option value="admin">Admin</option>
    <option value="writer">Writer</option>
    <option value="reader">Reader</option>
</select>
</p>    
<p>
Status : <br/>
<input type="radio" name="status" id="status" value="free"/><label for="status">Ouvert</label><br/>
<input type="radio" name="status" id="status" value="banned"/><label for="status">Banni</label><br/>
</p>
<p>
<input type="submit" value="Valider"/>
</p>

</form>