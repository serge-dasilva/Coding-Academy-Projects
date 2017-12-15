<?php
if ($_SESSION) {
    if ($_SESSION['groupe'] == 3) {
        include(ROOT.'Views/Pages/header_writer.php');
    } elseif ($_SESSION['groupe'] == 2) {
        include(ROOT.'Views/Pages/header_writer.php');
    } elseif ($_SESSION['groupe'] == 1) {
        include(ROOT.'Views/Pages/header_admin.php');
    }
}
?>

