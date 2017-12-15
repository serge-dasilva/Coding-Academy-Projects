<?php
session_start();
if ($_SESSION['groupe'] != 1)
{
   header("Location: http://localhost/PHP_Rush_MVC/articles/index");
}
?>

<h2>Page d'administration</h2>

<h3>Liste des inscrits</h3>

<a href="http://localhost/MVC/PHP_Rush_MVC/adminpage/addUser">Ajouter</a>

<table>
<tr>
    <th>Nom</th>
    <th>Email</th> 
    <th>Groupe</th>
    <th>Status</th>
    <th>Date de création</th>
    <th>Dernière modification</th>
    <th>Modifier</th>
    <th>Supprimer</th>
</tr>
<?php 
foreach ($allUsers as $var){
    echo '<tr>';
    echo '<td>' . $var['Name'] . '</td>';
    echo '<td>' . $var['Email'] . '</td>';
    echo '<td>' . $var['Groupe'] . '</td>';
    echo '<td>' . $var['Status'] . '</td>';
    echo '<td>' . $var['Date_creation'] . '</td>';
    echo '<td>' . $var['Date_edition'] . '</td>';
    echo '<td><a href="http://localhost/MVC/PHP_Rush_MVC/adminpage/editUser/' . $var['Id'] . '">Modifier</a></td>';
    echo '<td><a href="http://localhost/MVC/PHP_Rush_MVC/adminpage/deleteUser/' . $var['Id'] . '">Supprimer</a></td>';
}
?>

</table>