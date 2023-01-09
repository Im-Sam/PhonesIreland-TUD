<?php
require_once './data/dbconfig.php'; 

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

if(!isset($_POST['installdb'])){
    try{
        $pdo = new PDO($dsn, $db_user, $db_passwd, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "PDO error: ".$e->getMessage();
        die();
    }
}


