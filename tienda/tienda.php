<?php
    $usuario = $_GET['usuario'];
    session_name($usuario);
    session_set_cookie_params(3600, "/", "localhost", 0);
    session_start();
    require_once("funciones/funcionesProductos.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>
    <link rel="stylesheet" href="style/styleShop.css">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet"> 
    <script src="javascript/crearTabla.js"></script>
    <script src="javascript/comprar.js"></script>
</head>
<body>
    <div class="body">
        <div class="header">
            <h1>DSWSHOP</h1>
            <p>Bienvenido <i><?php echo session_name(); ?></i></p>
            <?php echo "<a href='cerrarSesion.php?usuario=" . $usuario . "'><img class='logout' src='style/logout.png'></a>"; ?>
        </div>

    <div class="select">
        <select name="categorias" id="categorias" onchange='productos(this.value, usuario="<?php echo $usuario ?>");'>
            <option value="">Seleccionar</option>
            <?php categoria($productos); ?>
            <option value="todos">Todos</option>
        </select>
        <div class="select_arrow"></div>
    </div>
    <div id="divProductos">Seleccione una categoría</div>
    <div class="cesta"></div>
    </div>
</body>
</html>