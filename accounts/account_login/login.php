<?php

include('./accounts/account_login/check_seller.php');
include('./accounts/account_login/check_admin.php');
include('./classes/user.class.php');

function login()
{
    global $pdo;
    global $user;

    if (!isset($_POST['login']) || $_POST['login'] == '')
        echo "<script type='text/javascript'>alert('No login submitted!')</script>";
    else if (!isset($_POST['password']) || $_POST['password'] == '')
        echo "<script type='text/javascript'>alert('No password submitted!')</script>";
    else {
        $password = hash("SHA1", $_POST['password']);
        $stmt = $pdo->prepare('SELECT login, password FROM user WHERE login="' . $_POST['login'] . '" AND password="' . $password . '"');
        $stmt->execute();
        if ($stmt->fetch() == FALSE){
            echo "<script type='text/javascript'>alert('Login details incorrect!')</script>";
        }
        else {
            $stmt = $pdo->prepare('SELECT login, firstname, lastname, email FROM user WHERE login="' . $_POST['login'] .'"');
            $stmt->execute();
            $userArray = $stmt->fetch();
            
            $login = $userArray['login'];
            $firstname = $userArray['firstname'];
            $lastname = $userArray['lastname'];
            $email = $userArray['email'];
            
            $_SESSION['logged_in_user'] = $_POST['login'];
            $user = new user($login, $firstname, $lastname, $email);
            $pdo->query('UPDATE user SET last_logged = NOW() WHERE login="' . $_POST['login'] . '"');
        }
    }
}
