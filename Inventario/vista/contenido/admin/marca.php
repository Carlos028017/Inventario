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
        header("Location: ../../menu_principal/login.php"); // Ajusta la ruta según tu estructura
        exit();
    }
} else {
    // Puedes redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: ../../menu_principal/login.php");
    exit();
}

$sql = "SELECT * FROM marcas";
$result = $conexion->query($sql);

$marcas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $marcas[] = $row;
    }
}

if (isset($_POST['buscar'])) {
    // Sanitizar y escapar el término de búsqueda para prevenir inyección SQL
    $termino_busqueda = mysqli_real_escape_string($conexion, $_POST['termino_busqueda']);

    // Consulta SQL para buscar en la tabla 'usuarios'
    $sql = "SELECT * FROM marcas WHERE nombre LIKE '%$termino_busqueda%'";

    // Ejecutar consulta
    $result = $conexion->query($sql);
    // Si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar los resultados
        while ($row = $result->fetch_assoc()) {
            echo "" . $row["id_marca"] . " - " . $row["nombre"] . "<br>";
        }
    } else {
        echo "No se encontraron resultados.";
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/marcas.css">
    <title>Saikel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../../vista/menu_principal/admin.php">Home</a>
                </ul>
                <form class="d-flex" role="Buscar" method="post" action="">
                    <input class="form-control me-2" type="search" name="termino_busqueda" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit" name="buscar" value="Buscar">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <a href="../../../vista/formularios/admin/formulario_marca.php" class="btn btn-primary mb-3">Nueva Marca</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Botones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marcas as $marca): ?>
                    <tr>
                        <td>
                            <?php echo $marca["id_marca"]; ?>
                        </td>
                        <td>
                            <?php echo $marca["nombre"]; ?>
                        </td>
                        <td>
                        <?php
                            if($marca["estado"] == 1){
                                echo "Activo";
                            }else if($marca["estado"] == 0){
                                echo "inactivo";
                            }
                            ?>
                        </td>
                        <td>
                        <a href="crud/editar_marca.php?id_marca=<?php echo $marca["id_marca"]; ?>"><i class="bi bi-pen"
                                title="Editar"></i></a>
                        <a href="crud/eliminar.php?id_marca=<?php echo $marca["id_marca"]; ?>"><i class="bi bi-trash3"
                                title="Eliminar"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>