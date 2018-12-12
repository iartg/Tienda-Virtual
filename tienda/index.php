<?php
    session_start();
    require_once("funciones/funcionesUsuarios.php");

    if(isset($_COOKIE['usuario'])) { //recuerda el último usuario que inició sesión y pone su nombre de usuario en el input 
        $usuario = $_COOKIE['usuario'];
    } else {
        $usuario = "";
    }
    $error = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Tienda</title>
    <link rel="stylesheet" href="style/styleIndex.css">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
</head>

<?php 

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['user']) && isset($_POST['pass'])) {
        $usuario = $_POST['user'];
        $pass = $_POST['pass'];

        if (compruebaUsuario($usuario, $pass) == true) { //si el nombre de usuario y su contraseña son correctas establece la sesión con su nombre, una cookie y lo redirige a la tienda
            $_SESSION['usuario'] = $usuario;
            setcookie("usuario", $usuario, time()+5000, "/");
            header('Location: tienda.php?usuario='.$usuario);
        } else {
            $error = "Datos incorrectos";
        }
    }

?>

<body>
    <div class="body">
        <div class="header"><h1>DSWSHOP</h1></div>
        <form action="index.php" method="post">
            <fieldset>
                <legend><img src="style/logo.png"></legend>
                <table>
                    <tr>
                        <td></td>
                        <td><input type="text" name="user" placeholder="Nombre de usuario" value="<?php echo $usuario; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="password" name="pass" placeholder="Contraseña"></td>
                    </tr>
                    <tr><td><td></td></td></tr>
                    <tr><td colspan="2"><input type="submit" value="Acceder" class="boton"></td></tr>
                </table>
            </fieldset> 
        </form>
        <p class="error"> <?php echo $error; ?> </p>
    </div>
</body>
</html>