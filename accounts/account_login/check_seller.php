<?php
function check_seller(){
    global $pdo;

    $current_user = $_SESSION['logged_in_user'];

    $stmt = $pdo->prepare('SELECT * FROM `seller` WHERE login="'.$current_user.'"');
    $stmt->execute();
    
    $count = $stmt->fetch();
    if($count!=false) return true;
    else return false;
}