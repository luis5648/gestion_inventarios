<?php
require "../libs/Seguridad.php";
$seguridad = new Seguridad();

if ($seguridad->getUsuario() == null) {
    header('Location: ../../index.php');
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        div {

            background-color: #e6f7ff;
        }

        button {
            padding: 10px;
            margin: 20px;

        }

    </style>
</head>
<body style="background-color: #e6f7ff">

<div style="background-color: white">
    <h1>Añadir nuevos usuarios</h1>
</div>

<form action="" method="post">
    <p>Nombre del usuario:</p>
    <input type="text" name="id_equipo">
    <p>Contraseña:</p>
    <input type="text" name="modelo">

    <button class="btn btn-secondary" type="submit">Agregar</button>

</form>
<form action="../libs/CerrarSesion.php">
    <button class="btn btn-dark">Cerar Sesión</button>
</form>
<a class="btn btn-danger" href="EliminarUsuarios.php">Eliminar usuarios</a>
<a class="btn btn-primary" href="ModificarUsuarios.php">Modificar usuarios</a>
<a class="btn btn-success" href="BuscarUsuarios.php">Buscar usuarios</a>
</body>
</html>
