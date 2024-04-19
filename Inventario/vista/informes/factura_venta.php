<?php
require_once '../../modelo/conexion.php';
require_once '../../modelo/modelo_login.php';
require_once '../../controlador/cerrar_sesion.php';


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
        header("Location: login.php"); // Ajusta la ruta según tu estructura
        exit();
    }
} else {
    // Puedes redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: ../../vista/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../imagen/saikel.jpg" sizes="32x32" type="image/x-icon" rel="icon" />
    <title>Factura de Venta</title>
    <link rel="stylesheet" href="../../css/facturas.css">
</head>

<body>
    <div class="container">
        <header>
            <img src="../../imagen/saikel.jpg"><br>
            <h1>Factura venta</h1>
        </header>


        <main>

            <div class="cont">
                <section class="cliente-info">
                    <div>
                        <h2>Informacion de la venta</h2>
                        <p><strong>Nro. Factura:</strong> ...........</p>
                        <p><strong>Fecha:</strong> ...........</p>
                        <p><strong>Dirección:</strong> .......</p>
                        <p><strong>Email:</strong> ......@gmail.com</p>
                        <p><strong>Nro. Celular:</strong>......</p>
                    </div>
                </section>

                <section class="cliente-info">
                    <div>
                        <h2>Información del Cliente</h2>
                        <p><strong>Nro. Cedula:</strong> ...........</p>
                        <p><strong>Nombre:</strong> ...........</p>
                        <p><strong>Dirección:</strong> .......</p>
                        <p><strong>Email:</strong> ......@gmail.com</p>
                        <p><strong>Nro. Celular:</strong>......</p>
                    </div>
                </section>
            </div>



            <section class="detalle-producto">
                <h2>Detalle del Producto</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>.....</td>
                            <td>......</td>
                            <td>....</td>
                            <td>$...</td>
                            <td>$...</td>
                        </tr>
                        <tr>
                            <td>.....</td>
                            <td>......</td>
                            <td>....</td>
                            <td>$...</td>
                            <td>$...</td>
                        </tr>
                        <tr>
                            <td>.....</td>
                            <td>......</td>
                            <td>....</td>
                            <td>$...</td>
                            <td>$...</td>
                        </tr>
                        <!-- Agrega más filas si hay más productos -->
                    </tbody>
                </table>
            </section>
            <section class="resumen">
                <h2>Resumen de la Factura</h2>
                <p><strong>Subtotal:</strong> $....</p>
                <p><strong>Impuestos:</strong> $....</p>
                <p><strong>Total:</strong> $....</p>
            </section>
        </main>
    </div>
</body>

</html>