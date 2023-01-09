<?php

include('./data/dbconnect.php');

if (isset($_POST['installdb'])) {
    try {
        $connection = new PDO($dsn, $db_user, $db_passwd, $options);
        $sql = file_get_contents("./data/databaseINIT.sql");
        $connection->exec($sql);
        echo "databse installed";
    } catch (PDOException $error) {
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phones Ireland</title>
    <link rel="stylesheet" href="./public/style/bootstrap.min.css">
    <link rel="stylesheet" href="./public/style/main.css">
</head>

<body>

    <form action="install.php" method="post" class="installbutton">
        <input type="submit" class="btn btn-primary" name="installdb" value="Install Database" />
    </form>

    <footer class="text-center fixed-bottom" id="footer">
        Copyright &copy; 2022 PhonesIreland
    </footer>

    <script src="./public/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./public/js/popper.min.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>
</body>

</html>