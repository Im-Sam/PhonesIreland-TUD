<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhonesIreland - 
    <?php
			if (isset($_GET['cat'])) echo htmlspecialchars($_GET['cat']);
			else echo "Home"; 
	?>	
    </title>
    <link rel="stylesheet" href="./public/style/bootstrap.min.css">
    <link rel="stylesheet" href="./public/style/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
