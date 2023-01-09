<?php
include ('./accounts/account_cart/show_cart.php');
include ('./accounts/account_cart/remove_cart.php');

function add_to_cart($item_id)
{
    global $pdo;

    $check_cart_stmnt = $pdo->prepare('SELECT * FROM user_carts WHERE login ="'.$_SESSION['logged_in_user'].'" AND item_id ="'.$item_id.'"');
    $check_cart_stmnt->execute();
    $result = $check_cart_stmnt->fetch();
    
    if ($result == NULL) {
        //add items to cart
        $add_to_cart_stmnt = $pdo->prepare('INSERT INTO user_carts (login, item_id, amount) VALUES ("'.$_SESSION['logged_in_user'].'", "'.$item_id.'", "1")');
        $add_to_cart_stmnt->execute();
        //subtract items from stock
        $take_from_stock_stmnt = $pdo->prepare('UPDATE item SET stock = stock -1 WHERE item_id="'.$item_id.'"');
        $take_from_stock_stmnt->execute();
    } else {
        //add items to cart
        $add_to_cart_stmnt = $pdo->prepare('UPDATE user_carts SET amount = amount+1 WHERE login="'.$_SESSION['logged_in_user'].'" AND item_id="'.$item_id.'"');
        $add_to_cart_stmnt->execute();
        //subtract items from stock
        $take_from_stock_stmnt = $pdo->prepare('UPDATE item SET stock = stock -1 WHERE item_id="'.$item_id.'"');
        $take_from_stock_stmnt->execute();
    }
    
}
