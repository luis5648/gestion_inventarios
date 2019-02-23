<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar propietarios</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #b8daff">
<form action="" method="post" style="padding:10%">

    <div class="form-group">
        <label for="" class="form-control">Nombre del propietario: </label>
        <input type="text" class="form-control" name="NombrePropietario" required>
        <br>

        <label for="" class="form-control">Telefono: </label>
        <input type="text" class="form-control" name="TelefonoPropietario">
        <br>
        <label for="" class="form-control" >Aula: </label>
        <input type="text" name="AulaPropietario" class="form-control"  required>
        <br>

        <button class="btn btn-success" name="agregarP">Agregar</button>
    </div>

    <a href="Agregar.php" class="btn btn-secondary">Regresar</a>



</form>

<?php
require "libs/Conexion.php";
require "Consultas.php";

if (isset($_POST["agregarP"])){
    $nombreP = $_POST["NombrePropietario"];
    $telefonoP = $_POST["TelefonoPropietario"];
    $aulaP = $_POST["AulaPropietario"];


    $insertarP = mysqli_query($conn,"INSERT INTO propietario (nombre_propietario, telefono, aula) VALUES ('$nombreP','$telefonoP','$aulaP') ");

    if (!$insertarP){
        echo "<script>alert('Hubo un error al insertar los datos')</script>>";
    }else{
        echo "<script>alert('Propietario añadido correctamente!')</script>>";
    }
    exit();
}

ConsultarPropietarios($conn);
echo "<br>";
?>

</body>
</html>