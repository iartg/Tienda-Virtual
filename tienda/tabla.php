<?php
    require_once("funciones/funcionesProductos.php");
    require_once("clases/claseProducto.php");
    $usuario = $_GET['usuario'];
?>
    <div id="purchase">
        <?php echo "<a class='basket' href='fin.php?usuario=" . $usuario . "'><img src='style/basket.png'>"; ?>
        <div class="container"><span id="resultado"></span></div></a>
    </div>

    <table class="table">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Cantidad</th>
        </tr>
        <?php 
            $categoria = $_GET['categorias'];
            $usuario = $_GET['usuario'];
            $arrayProductos = productos($categoria);

            for ($i = 0; $i < count($arrayProductos); $i++) { 
                echo "<tr><td>" . $arrayProductos[$i]->getNombre() . "</td>";
                echo "<td>" . $arrayProductos[$i]->getPrecio() . "€</td>";
                echo "<td><img src='" . $arrayProductos[$i]->getImagen() . "'></td>";
                foreach ($arrayProductos as $posicion => $nombre) {
                    if($arrayProductos[$i]->getID() == $nombre->getID()) {
                        echo "<td>";
                        echo "<button class='boton' id='".$nombre->getID()."' value='menos' onclick= comprar(this,'".$usuario."','".$arrayProductos[$i]->getNombre()."')>-</button>";
                        echo "<button class='boton' id='".$nombre->getID()."' value='mas'   onclick= comprar(this,'".$usuario."','".$arrayProductos[$i]->getNombre()."')>+</button>";

                        echo "<p id='cantidad".$nombre->getID()."'>0</p>";
                        echo "<input type='hidden' id='aux".$nombre->getID()."' name='aux".$nombre->getID()."' value='0'>";
                        echo "</td>";
                    }
                }
                echo "</tr>";
            }
        ?>
    </table>