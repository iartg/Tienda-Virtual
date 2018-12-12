<?php
    
    //meter todos los usuarios del xml en un array asociativo
    function arrayUsuarios() {
        libxml_use_internal_errors(true);
        $usuarios = simplexml_load_file("xml/usuarios.xml") or die("No se encuentra el archivo .xml");
        $users = array();
        foreach($usuarios->usuario as $usuario) {
            $user = $usuario->nombre;
            $pass = $usuario->pass;
            $users["{$user}"] = $pass;
        }
        return $users;
    }

    //funcion para comprobar que el usuario y la contraseña son correctos
    function compruebaUsuario($user, $pass) {
        $users = arrayUsuarios();
        $pass = md5($pass);
        $validacion = false;

        foreach ($users as $key => $value) {
            if ($user == $key && trim($pass) == trim($value)) {
                $validacion = true;
                break;
            } else {
                $validacion = false;
            }
        }
        return $validacion;
    }
?>