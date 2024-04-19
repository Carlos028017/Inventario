<?php
require_once '../conexion.php';

$conexion = Conexion::obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_marca"])) {
    $id = $_GET["id_marca"];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM marcas WHERE id_marca = $id";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página principal
        header("Location: ../../vista/contenido/admin/marca.php");
        exit();
    } else {
        echo "Error al eliminar el regidtro: " . $conexion->error;
    }
} else {
    echo "Parámetro ID no especificado";
    exit();
}

$conexion->close();
?>
