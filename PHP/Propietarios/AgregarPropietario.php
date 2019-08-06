<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar propietarios</title>

    <link rel="stylesheet" href="../../css/TablaAll.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">

</head>

<body style="background-color: #b8daff">
    <h3 style="text-align: center;">Agregar propietario</h3>
    <form action="" method="post" style="padding:10%">

        <div class="form-group">
            <label for="" class="form-control">Nombre del propietario: </label>
            <input type="text" class="form-control" name="NombrePropietario" required>
            <br>

            <label for="" class="form-control">Telefono: </label>
            <input type="text" class="form-control" name="TelefonoPropietario">
            <br>
            <label for="" class="form-control">Aula: </label>
            <input type="text" name="AulaPropietario" class="form-control" required>
            <br>

            <button class="btn btn-success" name="agregarP">Agregar</button>
        </div>

        <a href="../AgregarEquipos.php" class="btn btn-secondary">Regresar</a>


    </form>

    <?php
    require "../libs/Conexion.php";
    require "../Consultas.php";

    if (isset($_POST["agregarP"])) {
        $nombreP = $_POST["NombrePropietario"];
        $telefonoP = $_POST["TelefonoPropietario"];
        $aulaP = $_POST["AulaPropietario"];



        //validación de existencia de datos en la db
        $sqlVal = mysqli_query($conn, "SELECT * FROM propietario WHERE Nombre_Propietario = '$nombreP' OR Telefono= '$telefonoP'");



        if (!$sqlVal->num_rows > 0) {
            $sqlInP = "INSERT INTO propietario (Nombre_Propietario, Telefono, Aula) VALUES ('$nombreP','$telefonoP','$aulaP')";
            if ($conn->query($sqlInP) === TRUE) {

                echo "<script>alert('Propietario añadido correctamente!');</script>";
            }
        } else {

            echo "<script>alert('El nombre o teléfono del propietario ya están registrados!');</script>";
        }
    }

    ConsultarPropietarios($conn);
    echo "<br>";

    ?>

</body>

</html>