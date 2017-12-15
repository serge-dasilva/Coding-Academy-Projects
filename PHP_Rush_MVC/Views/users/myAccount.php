<h3>Mon compte</h3>



<h4>Mes informations personnelles</h4>



<table>

<tr>

    <th>Nom</th>

    <th>Email</th> 

    <th>Date de création</th>

</tr>

<?php 

foreach ($infos as $var){

    echo '<tr>';

    echo '<td>' . $var['Name'] . '</td>';

    echo '<td>' . $var['Email'] . '</td>';

    echo '<td>' . $var['Date_creation'] . '</td>';

}

?>



</table>



<form method="post" action="#">

<p><label for ="name">Modifier le nom : </label><input type="text" name="name" id="name"/></p>

<p>

<input type="submit" name="submit_name" value="Modifier"/>

</p>

<?php 

if ($_POST)

{

    echo '<p>' . $validation[0] . '</p>';

}

?>



</form>

<form method="post" action="#">

<p><label for ="password">Modifier le mot de passe</label><input type="password" name="password" id="password"/></p>

<p>

<input type="submit" name="submit_pass" value="Modifier"/>

</p>



</form>