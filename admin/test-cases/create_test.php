<?php

function create_test(){
    echo'
    <tr>
        <th scope="row">Test successful create</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.create_logic("test_user", "password", "test@user.ie", "test", "user").'</th>
    </tr>
    <tr>
        <th scope="row">Test without username</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.create_logic("", "password", "test@user.ie", "test", "user").'</th>
    </tr>
    <tr>
        <th scope="row">Test without password</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.create_logic("test_user", "", "test@user.ie", "test", "user").'</th>
    </tr>
    <tr>
        <th scope="row">Test without first name</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.create_logic("test_user", "password", "test@user.ie", "", "user").'</th>
    </tr>
    <tr>
        <th scope="row">Test without last name</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.create_logic("test_user", "password", "test@user.ie", "test", "").'</th>
    </tr>
    <tr>
        <th scope="row">Test without email</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.create_logic("test_user", "password", "", "test", "user").'</th>
    </tr>
    <tr>
        <th scope="row">Test with sub 8 char password - Equivalence Partition</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.create_logic("test_user", "pass", "test@user.ie", "test", "user").'</th>
    </tr>
    <tr>
        <th scope="row">Test with already existent username</th>
        <td class="text-danger font-weight-bold">Failed</td>
        <th>'.create_logic("root", "passdfgdfgword", "test@user.ie", "test", "user").'</th>
    </tr>
    <tr>
        <th scope="row">Basis path test - No fields entered</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.create_logic("", "", "", "", "").'</th>
    </tr>
    <tr>
        <th scope="row">Basis path test - Password entered</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.create_logic("", "password", "", "", "").'</th>
    </tr>
    <tr>
        <th scope="row">Basis path test - Password + email entered</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.create_logic("", "password", "test@user.ie", "", "").'</th>
    </tr>
    <tr>
        <th scope="row">Basis path test - Password + email +username entered</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.create_logic("test", "password", "test@user.ie", "", "").'</th>
    </tr>
    <tr>
        <th scope="row">Basis path test - Everything but lastname</th>
        <td class="text-success font-weight-bold">Success</td>
        <th>'.create_logic("test", "password", "test@user.ie", "test", "").'</th>
    </tr>
    ';
}

function create_logic($username, $password, $email, $firstname, $lastname){
    global $pdo;

    if(strlen($password) < 8){return "Password < 8 characters";}
    else if(!preg_match("/^.+@.+\..+$/", $email) || $email == ""){return "Invalid email address";}
    else if(!isset($username) || $username == ""){return "Username not set";}
    else if(!isset($firstname) || $firstname == ""){return "First name not set";}
    else if(!isset($lastname) || $lastname == ""){return "Last name not set";}
    
    else{
        $query = 'SELECT * FROM `user` WHERE `login`="'.$username.'"';
        $stmnt = $pdo->prepare($query);
        $stmnt -> execute();
        $result = $stmnt->fetch();
        if($result == true){
            return "Account already exists";
        }
        else{
            return("Account creation successful");
        }
    }
}