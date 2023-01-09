<?php
function admin_test(){
    echo'
    <tr>
        <th scope="row">Test successful login</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.admin_test_logic("root").'</th>
    </tr>
    <tr>
        <th scope="row">Test successful login</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.admin_test_logic("Sam").'</th>
    </tr>
    ';
}

function admin_test_logic($user){
    global $pdo;
    
    $stmt = $pdo->prepare('SELECT * FROM `admin` WHERE login="'.$user.'"');
    $stmt->execute();
    
    $count = $stmt->fetch();
    if($count!=false){
        return "Admin account check successful";
    }
    else{
        return "Admin account check failed";
    }
}