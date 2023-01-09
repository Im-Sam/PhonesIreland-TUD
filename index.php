<?php
session_start();
include('./data/dbconnect.php');
include('./data/data_handler.php');
include('./accounts/account_login/display_handler.php');
include('./includes/header.php');
login_handler();
?>

<?php
//topbar
include('./includes/navbar.php');
//content navbar
include('./includes/contentnavbar.php');
include('./data/populate.php');
populate_handler();
?>

<?php
include './includes/footer.html';
?>