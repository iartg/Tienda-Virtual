<?php
    session_name($_GET['usuario']);
    session_start();
    require_once("funciones/funcionesProductos.php");
    require_once("clases/claseProducto.php");    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finalizar compra</title>
    <link rel="stylesheet" href="style/styleEnd.css">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Coming+Soon" rel="stylesheet"> 
</head>
<body>
    <div class="body">
        <div class="header">
            <h1>DSWSHOP</h1>
            <p>Compra de <i><?php echo session_name(); ?></i></p>
            <?php echo "<a href='cerrarSesion.php?usuario=" . $_GET['usuario'] . "'><img class='logout' src='style/logout.png'></a>"; ?>
        </div>

        <table class="table">
            <tr>
                <th>Producto</th>
                <th>Precio por unidad</th>
                <th>Imagen</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
            <?php
                $precioTotal = 0; //variable que almacena la suma total de la compra

                foreach ($_SESSION as $id => $valor) {
                    $producto = productosPorId($id);
                    if(gettype($producto) === "object") {
                        $cantidad = $valor[1]; //cantidad de artículos elegidos por el usuario
                        $precio = floatval($producto->getPrecio()) * $cantidad;
                        echo "<tr><td>" . $producto->getNombre() . "</td>";
                        echo "<td>" . $producto->getPrecio() . " €</td>";
                        echo "<td><img src='" . $producto->getImagen() . "'></td>";
                        echo "<td>" . $cantidad . "</td>";
                        echo "<td>" . $precio . " €</td></tr>";
                        $precioTotal += $precio;
                    }
                }
            ?>
            <tr>
                <td colspan="4">TOTAL:</td>
                <td><?php echo $precioTotal; ?> €</td>
            </tr>
        </table>
    </div> 
</body>
</html>