<?php

include('./accounts/account_login/login_handler.php');

function display_handler(){
    if (!isset($_SESSION['logged_in_user']))
        display_login();
    else
        display_logout();
}

function display_login(){
    echo '
    <form method="POST" action=".">
        <div class="form-group login">
            Username: <input type="text" class="loginforms form-control" name="login" value="" autocomplete="off"/>
        </div>
        <div class="form-group login">
            Password: <input type="password" class="loginforms form-control" name="password" value="" autocomplete="off"/>
        </div>
        <br>
        <div class="modal-footer login justify-content-center">
            <input type="submit" formmethod="post" class="btn btn-primary loginsubm" name="submitlogin" value="Log in"/>
        </div>
    </form>
    ';
}


function display_logout(){
    echo '
    <form method="POST" action=".">
        <h5 class="text-center">Welcome '.$_SESSION['logged_in_user'].'</h5>
        <div class="modal-footer justify-content-center">
            <button type="submit" formmethod="post" class="btn btn-danger loginsubmit" name="delete_user">
            Delete Account
            </button>
            <button type="submit" formmethod="post" class="btn btn-primary loginsubmit" name="submitlogout">
            Logout
            </button>
        </div>
    </form>
    ';
}