<?php
require_once '../modelo/conexion.php';
$conn = new Conexion();
$conexion = $conn->obtenerConexion();

session_start();
if (!empty($_POST["ingresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["contraseña"])) {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $sql = $conexion->query("SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'");
        if ($datos = $sql->fetch_object()) {
            $_SESSION["id_usuario"] = $datos->id_usuario;
            $_SESSION["nombres"] = $datos->nombres;
            $_SESSION["apellidos"] = $datos->apellidos;
            $_SESSION["id_rol"] = $datos->id_rol;
            if ($_SESSION["id_rol"] == 1) {
                header("Location: ../vista/menu_principal/admin.php");
            } else if ($_SESSION["id_rol"] == 2) {
                header("Location: ../vista/menu_principal/gerente.php");
            } else if ($_SESSION["id_rol"] == 3) {
                header("Location: ../vista/menu_principal/inventarista.php");
            } else if ($_SESSION["id_rol"] == 4) {
                header("Location: ../vista/menu_principal/empleado.php");
            }
        } else {

            echo '<error>El usuario y/o clave son incorrectas, vuelva a intentarlo.</error>';
        }
    }
}
