<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../imagen/saikel.jpg" sizes="32x32" type="image/x-icon" rel="icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="../../css/stylelogin.css" rel="stylesheet">

  <title>LOGIN</title>

</head>
<body>
  <div class="contanier">

    <form action="../../controlador/controlador_login.php" method="post" class="w-50 mx-auto py-5 shadow p-4">
      <h3 class="text-white">Login saikel</h3>
      <hr>
      <div class="mb-3 ">
        <label class="form-label">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Ingrese su usuario">
      </div>
      <div class="mb-3 ">
        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="contraseña" name="contraseña" required
          placeholder="Ingrese su contraseña">
      </div>
      <input name="ingresar" type="submit" value="Iniciar sesion">
    </form>
  </div>

</body>

</html>