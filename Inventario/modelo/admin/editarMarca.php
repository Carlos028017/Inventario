<?php
require_once '../conexion.php';

$conexion = Conexion::obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_marca"];
    $nombre = $_POST["nombre"];
    $estado = $_POST["estado"];

    // Actualizar el producto en la base de datos
    $sql = "UPDATE marcas SET nombre = '$nombre', estado = '$estado' WHERE id_marca = '$id'";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página principal
        header("Location: ../../vista/contenido/admin/marca.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }
}

$conexion->close();
?>
