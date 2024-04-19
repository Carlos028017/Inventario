<?php
require_once '../modelo/conexion.php';

$conexion = Conexion::obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id_marca"];
    $nombre = $_POST["nombre"];
    $estado = $_POST["estado"];

    // Insertar el nuevo producto en la base de datos
    $sql = "INSERT INTO marcas (nombre, estado) VALUES ('$nombre', '$estado')";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página principal
        header("Location: ../vista/contenido/admin/marca.php");
        exit();
    } else {
        echo "Error al agregar el producto: " . $conexion->error;
    }
}