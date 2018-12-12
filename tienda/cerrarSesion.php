<?php
//recoger por GET el valor de usuario para destruir su sesión
    $usuario = $_GET['usuario'];
    session_name($usuario);
    session_start();
    $_SESSION = array();
    session_destroy();   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cerrar sesión</title>
    <link rel="stylesheet" href="style/styleEnd.css">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet"> 
</head>
<body>
    <div class="body">
        <div class="header">
            <h1>DSWSHOP</h1>
        </div>
        <div class="fin">
            <p>Ha cerrado sesión correctamente</p>
            <a href="index.php"><img src="style/back.png"></a>
            <br>
            <a href="index.php" class="back">Iniciar sesión</a>
        </div>
    </div> 
</body>
</html>