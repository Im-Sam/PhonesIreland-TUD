<?php

function delete_account(){
    global $pdo;

    $query = 'DELETE FROM user WHERE login="'.$_SESSION['logged_in_user'].'"';
    $stmnt = $pdo->prepare($query);
    $stmnt->execute();
    $query = 'DELETE FROM user_carts WHERE login="'.$_SESSION['logged_in_user'].'"';
    $stmnt = $pdo->prepare($query);
    $stmnt->execute();
    logout();
    echo "<script type='text/javascript'>alert('Account deleted!')</script>";

}