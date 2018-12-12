<?php
    session_name($_GET['usuario']);
    session_start();
    require_once("funciones/funcionesProductos.php");
    require_once("clases/claseProducto.php");

    $id = $_GET['id'];
    $cantidad = $_GET['cantidad'];
    $producto = $_GET['producto'];

    $cesta = array();
    $cesta = [$producto, $cantidad];
    $_SESSION[$id] = $cesta; //en la clave del array guarda el id asociado a un array con el nombre del producto y la cantidad

    $cantidadTotal = 0;

    foreach ($_SESSION as $id => $valor) {
        $producto = productosPorId($id);
        if(gettype($producto) === "object") { //en el array se guardan algunos valores NULL, se filtra para que sólo haga las operacioes con los objetos.
            $cantidad = intval($valor[1]);
            $cantidadTotal += $cantidad;
        }
    }

    echo $cantidadTotal;
?>