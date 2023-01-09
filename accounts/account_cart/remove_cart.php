<?php

function remove_cart($item_id){
    global $pdo;
    
    $stmnt = $pdo->prepare('SELECT amount FROM user_carts WHERE login="'.$_SESSION['logged_in_user'].'" AND item_id="'.$item_id.'"');
    $stmnt->execute();
    $result = $stmnt->fetchAll();
    $amount = $result[0]['amount'];
    //add stock back to inventory
    $stmnt = $pdo->prepare('UPDATE item SET stock = stock+'.$amount.' WHERE item_id="'.$item_id.'"');
    $stmnt->execute();
    //removes from user cart
    $stmnt = $pdo->prepare('DELETE FROM user_carts WHERE login="'.$_SESSION['logged_in_user'].'" AND item_id="'.$item_id.'"');
    $stmnt->execute();
   
    show_cart();
}