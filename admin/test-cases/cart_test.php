<?php
function cart_test(){
    echo'
    <tr>
        <th scope="row">Test success adding item not already in cart</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.cart_test_logic("root", 13).'</th>
    </tr>
    <tr>
        <th scope="row">Test success adding item already in cart - Equivalence Partition</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.cart_test_logic("root", 1).'</th>
    </tr>
    <tr>
        <th scope="row">Test fail adding item not in stock</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.cart_test_logic("root", 8).'</th>
    </tr>
    ';
}

function cart_test_logic($login, $item_id){
    global $pdo;

    $stmnt = $pdo->prepare('SELECT * FROM item WHERE item_id ="'.$item_id.'"');
    $stmnt -> execute();
    $stmnt_result = $stmnt->fetchAll();

    if($stmnt_result[0]['stock'] > 0){
        $check_cart_stmnt = $pdo->prepare('SELECT * FROM user_carts WHERE login ="'.$login.'" AND item_id ="'.$item_id.'"');
        $check_cart_stmnt->execute();
        $result = $check_cart_stmnt->fetch();
        //item not already in cart
        if ($result == NULL) {
            return("Add to cart successful");
        }
        //item already in cart 
        else {
            return("Item already in cart, +1 added");
        }
    }
    else{
        return "Not enough stock";
    }
}