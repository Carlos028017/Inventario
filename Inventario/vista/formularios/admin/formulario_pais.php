<?php
require_once '../../../modelo/conexion.php';
require_once '../../../modelo/modelo_login.php';
require_once '../../../controlador/cerrar_sesion.php';


// Crear una instancia del modelo (ajusta según tus necesidades)
$conexion = Conexion::obtenerConexion();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario ha iniciado sesión antes de acceder a $_SESSION['cli_id']
$cliente_id = isset ($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : false;

// Verifica si $_SESSION['id_usuario'] está definido antes de usarlo
if ($cliente_id !== false) {
    // Verifica si se ha enviado el formulario de cerrar sesión
    if (isset ($_POST['cerrar_sesion'])) {
        // Crea una instancia del controlador de sesión y cierra la sesión
        $sesionController = new cerrarSesion();
        $sesionController->cerrarSesion();

        // Redirige al usuario a la página de inicio o a donde desees después de cerrar sesión
        header("Location: ../../../vista/menu_principal/login.php"); // Ajusta la ruta según tu estructura
        exit();
    }
} else {
    // Puedes redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: ../../../vista/menu_principal/login.php");
    exit();
}
?>

<html>

<head>
    <title>Registrarme</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../css/styleformularios.css" rel="stylesheet" type="text/css" />
    <link href="../../../imagen/saikel.jpg" sizes="32x32" type="image/x-icon" rel="icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <header class="log">
        <font>
            <img src="../../../imagen/saikel.jpg">
            <font class="cabeza">
                <b>Formulario para crear un país
                </b>
            </font>
        </font>
    </header>
    <div class="container">
        <form class="center" action="" method="POST">

            <div class="fila">
                <div class="txt_field">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="" required><br>
                </div>
                <div class="txt_field">
                    <label for="estado">Estado</label>
                    <select type="text" for="estado" name="form-select" aria-label="Default select example">
                        <option selected>Activo</option>
                        <option selected>inactivo</option>
                    </select>
                </div><br>
            </div>

            <div class="fila">
                <font class="pass">
                    <input href="" class="boton" type="submit" value="crear pais" onclick="">
                    <input href="" class="boton" type="submit" value="cancelar" onclick="">
                </font> <br>
            </div>


            </from>

    </div>

</body>

</html>