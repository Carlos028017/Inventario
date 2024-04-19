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

$sql = "SELECT * FROM usuarios";
$result = $conexion->query($sql);

$usuarios = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
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
                    <!-- </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <form class="d-flex" role="Buscar">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar ">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <a href="../../../vista/formularios/admin/formulario_usuario.php" class="btn btn-primary mb-3">Nuevo Usuario</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nit</th>
                    <th>rol</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>pais</th>
                    <th>departamento</th>
                    <th>ciudad</th>
                    <th>direccion</th>
                    <th>usuario</th>
                    <th>contraseña</th>
                    <th>Estado</th>
                    <th>Botones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usu): ?>
                    <tr>
                        <td>
                            <?php echo $usu["id_usuario"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["nit"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["id_rol"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["nombres"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["apellidos"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["telefono"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["correo"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["id_pais"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["id_departamento"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["id_ciudad"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["direccion"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["usuario"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["contraseña"]; ?>
                        </td>
                        <td>
                            <?php echo $usu["estado"]; ?>
                        </td>
                        <td>
                        <a href="../procesoscrud/editar.php?id= <?php echo $usu["id_usuario"]; ?>"><i class="bi bi-pen"
                                title="Editar"></i></a>
                        <a href="../procesoscrud/eliminar.php?id= <?php echo $usu["id_usuario"]; ?>"><i class="bi bi-trash3"
                                title="Eliminar"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>