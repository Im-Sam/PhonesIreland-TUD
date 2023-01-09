<?php
function seller_test(){
    echo'
    <tr>
        <th scope="row">Test successful login</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.seller_test_logic("root").'</th>
    </tr>
    <tr>
        <th scope="row">Test successful login</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.seller_test_logic("Sam").'</th>
    </tr>
    ';
}

function seller_test_logic($user){
    global $pdo;
    
    $stmt = $pdo->prepare('SELECT * FROM `seller` WHERE login="'.$user.'"');
    $stmt->execute();
    
    $count = $stmt->fetch();
    if($count!=false){
        return "Seller account check successful";
    }
    else{
        return "Seller account check failed";
    }
}