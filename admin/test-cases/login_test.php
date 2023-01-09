<?php

function login_test()
{
    echo'
    <tr>
        <th scope="row">Test successful login</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.login_test_logic("root", "root").'</th>
    </tr>
    <tr>
        <th scope="row">Test without username</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.login_test_logic("", "root").'</th>
    </tr>
    <tr>
        <th scope="row">Test without password</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.login_test_logic("root", "").'</th>
    </tr>
    <tr>
        <th scope="row">Test with invalid credentials</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.login_test_logic("uesfosiebfobueznckj", "root").'</th>
    </tr>
    ';
}

function login_test_logic($login, $password){
    global $pdo;

    if(!isset($login) || $login == ""){
        return "No login name submitted";
    }
    else if(!isset($password) || $password == ""){
        return "No password submitted";
    }
    else{
        $password = hash("SHA1", $password);
        $stmt = $pdo->prepare('SELECT login, password FROM user WHERE login="' . $login . '" AND password="' . $password . '"');
        $stmt->execute();
        if ($stmt->fetch() == FALSE){
            return "login credentials are invalid";
        }
        else{
            return "Login test passed successfully";
        }
    }
}
