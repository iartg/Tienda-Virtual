<?php
    require_once("clases/claseProducto.php");
    libxml_use_internal_errors(true);
    $productos = simplexml_load_file("xml/productos.xml") or die("No se encuentra el archivo .xml");

    //lee el xml filtrado por la categoría que se pasa por parámetro y crea un array de objetos con cada producto.
    function productos($categoria) {
        libxml_use_internal_errors(true);
        $productos = simplexml_load_file("xml/productos.xml") or die("No se encuentra el archivo .xml");
        $categoria = $_GET['categorias'];
        $arrayProductos = array();
        foreach ($productos->producto as $producto) {
            if($categoria == "todos") { //carga el array con todos los artículos del xml
                $objeto = new Producto($producto->categoria, $producto->id, $producto->nombre, $producto->precio, $producto->imagen); //creacion del objeto producto
                array_push($arrayProductos, $objeto);
            } else {
                if($producto->categoria == $categoria) { //carga el array con los artículos de la categoría que se le pasa
                    $objeto = new Producto($producto->categoria, $producto->id, $producto->nombre, $producto->precio, $producto->imagen); //creacion del objeto producto
                    array_push($arrayProductos, $objeto);
                }
            }
        }
        return $arrayProductos;
    }

    //funcion para mostrar las categorias sin repetidos
    function categoria($productos) {
        $opciones = array(); 
        foreach($productos->producto as $producto) {
            $opciones[] = $producto->categoria;
        }
        //eliminar los duplicados para mostrar el select con las opciones
        $opciones = array_unique($opciones);

        //crear las opciones del select sin repetidos
        for ($i=0; $i < count($opciones); $i++) { 
            echo "<option value='" . $opciones[$i] . "'>" . ucwords($opciones[$i]) . "</option>";
        }
    }

    //recorre el xml para mostrar el artículo según su id
    function productosPorId($id) {
        libxml_use_internal_errors(true);
        $productos = simplexml_load_file("xml/productos.xml") or die("No se encuentra el archivo .xml");

        //$id = $_GET['id'];
        $objetoProducto = "";
        foreach ($productos->producto as $producto) {
            if($producto->id == $id) {
                $objetoProducto = new Producto($producto->categoria, $producto->id, $producto->nombre, $producto->precio, $producto->imagen); //creacion del objeto producto
            }
        }
        return $objetoProducto;
    }

?>