<?php

include('./accounts/account_login/login.php');
include('./accounts/account_login/logout.php');
include('./accounts/account_login/create_account.php');
include('./accounts/account_login/delete_account.php');

function login_handler() {}
{
	if (isset($_POST['submitlogin'])){
		login();
    }
	else if (isset($_POST['submitlogout'])){
		logout();
    }
	else if (isset($_POST['create_user'])){
		create_account();
    }
	else if (isset($_POST['delete_user']) && $_SESSION['logged_in_user'] != 'root'){
		delete_account();
    }
}