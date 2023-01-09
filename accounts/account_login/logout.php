<?php

function logout(){
    if (isset($_SESSION['logged_in_user'])){
        unset($_SESSION['logged_in_user']);
        session_destroy();
        unset($user);
    }
}