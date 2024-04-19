<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Eliminación</title>
    <link rel="stylesheet" href="../css/styles_crud.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <br><br><br>
    <div class="container">
        <h1>Confirmar Eliminación</h1>
        <p>¿Estás seguro de que deseas eliminar este registro?</p>
        <a href="../../../../modelo/admin/eliminar_marca.php?id_marca=<?php echo $_GET["id_marca"] ?> " style="background-color: azure; color:brown;" class="btn btn-secondary">Eliminar</a>
        <a href="../marca.php" style="background-color: azure; color:black;" class="btn btn-secondary">Cancelar</a>
    </div>
</body>
</html>
