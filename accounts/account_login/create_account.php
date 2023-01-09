<?php

function create_account(){
    global $pdo;

    if(strlen($_POST['createPassword']) < 8){
        echo "<script type='text/javascript'>alert('Password needs to be minimum 8 characters long!')</script>";
    }
    else if(!preg_match("/^.+@.+\..+$/", $_POST['email']) || $_POST['email'] == ""){
		echo "<script type='text/javascript'>alert('Invalid e-mail address!')</script>";
    }
    else if(!isset($_POST['createLogin']) || $_POST['createLogin'] == ""){
		echo "<script type='text/javascript'>alert('No login submitted!')</script>";
    }
    else if(!isset($_POST['firstname']) || $_POST['firstname'] == ""){
		echo "<script type='text/javascript'>alert('No first name submitted!')</script>";
    }
    else if(!isset($_POST['lastname']) || $_POST['lastname'] == ""){
		echo "<script type='text/javascript'>alert('No last name submitted!')</script>";
    }
    else{
        $query = 'SELECT * FROM `user` WHERE `login`="'.$_POST['createLogin'].'"';
        $stmnt = $pdo->prepare($query);
        $stmnt -> execute();
        $result = $stmnt->fetchAll();
        if($result == true){
            echo "<script type='text/javascript'>alert('Account already exists!')</script>";
            unset($_POST['create_user']);
        }
        else{
            $query = ('INSERT INTO `user` (`login`, `firstname`, `lastname`, `email`, `password`) VALUES ("'.$_POST['createLogin'].'", "'.$_POST['firstname'].'", "'.$_POST['lastname'].'", "'.$_POST['email'].'", "'.hash('SHA1', $_POST['createPassword']).'")');
            $stmnt = $pdo->prepare($query);
            $stmnt -> execute();
            echo "<script type='text/javascript'>alert('Account create successful!')</script>";
            unset($_POST['create_user']);
        }
    }
}