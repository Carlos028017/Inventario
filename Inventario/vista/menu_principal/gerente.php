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
    header("Location: ../../vista/menu_principal/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../imagen/saikel.jpg" sizes="32x32" type="image/x-icon" rel="icon" />
    <title>Administrador</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <font style="vertical-align: inherit; ">
                        <img src="../../imagen/saikel.jpg"
                            style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                        <font style="vertical-align: inherit; font-size: 24px;"><b>Saikel</b></font>
                    </font>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                opc. Admministrador
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Acerca de</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <font style="vertical-align: inherit; ">
                    <img src="../../imagen/saikel.jpg"
                        style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; margin-right: 10px;">
                    <font style="vertical-align: inherit; font-size: 24px;"><b>Saikel</b></font>
                </font>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Consultar en
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Action</a></li>
                </ul>
            </div>

            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Insertar nuevo
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Action</a></li>
                </ul>
            </div>
            
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <?php echo $_SESSION["id_rol"] ?>
                    <?php echo $_SESSION["nombres"] ?>
                    <i class="bi bi-person-circle"></i>
                </a>
                <ul class="dropdown-menu">
                    <?php
                    // Verifica si el cliente ha iniciado sesión antes de mostrar el enlace de cerrar sesión
                    if (isset ($_SESSION['id_usuario'])) {

                        echo '<form method="post" action="../../vista/menu_principal/admin.php">';
                        echo '<li ><a class="dropdown-item" href="#" name="Info. usuario">Info. Usuario</a></li>';
                        echo '<li class="dropdown-item"><button action="../controlador/cerrar_sesion.php" type="submit" name="cerrar_sesion">Cerrar Sesión</button>';
                        echo '</form></li>';
                    } else {
                        echo '<li class="dropdown-item"><a href="../vista/menu_principal/login.php">Iniciar Sesión</a></li>';
                    }
                    ?>
                </ul>
            </div>


        </div>

    </nav>

    <section class="full-width text-center" style="padding: 40px 0;">
        <h3 class="text-center tittles">Menu de aceso rapido</h3>
        <!-- Tiles -->
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                    <small>Usuarios</small>
                </span>
            </div>
            <i class="zmdi zmdi-account tile-icon"></i>
        </article>
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                    <small>Clientes</small>
                </span>
            </div>
            <i class="zmdi zmdi-accounts tile-icon"></i>
        </article>
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                    <small>Produtos</small>
                </span>
            </div>
            <i class="zmdi zmdi-truck tile-icon"></i>
        </article>
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                    <small>Iventario</small>
                </span>
            </div>
            <i class="zmdi zmdi-label tile-icon"></i>
        </article>
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                    <small>Ventas</small>
                </span>
            </div>
            <i class="zmdi zmdi-washing-machine tile-icon"></i>
        </article>
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                    <small>Generar informes</small>
                </span>
            </div>
            <i class="zmdi zmdi-shopping-cart tile-icon"></i>
        </article>
    </section>


</body>

</html>