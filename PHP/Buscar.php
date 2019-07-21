<?php
require "Consultas.php";
require "libs/Conexion.php";


?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Busquedas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</head>
<body style="background-color: aquamarine">

<div style="text-align: center; padding-left: 6%; padding-top: 5%; ">


    <form action="" method="post" style=" float: left; width: 30%; border: solid black; padding-bottom: 2%">
        <h3>Buscar por ID de equipo</h3>
        <br><br>

        <label for="ID">ID: </label>
        <input id="ID" type="text" name="ID_Equipo" required>

        <button name="buscaID" class="btn btn-success">Buscar</button>

    </form>

    <form action="" style=" float: left; width: 30%; border: solid black; padding-bottom: 2%" method="post">
        <h3>Buscar por propietario</h3>
        <br><br>
        <label for="Prop">Nombre del propietario: </label>
        <select name="BuscaPropietario">
            <?php
            $qProp = "SELECT Nombre_Propietario FROM propietario";
            $res = $conn->query($qProp);

            if ($res->num_rows > 0) {
                while ($filas = $res->fetch_assoc()) {
                    echo "<option value='$filas[Nombre_Propietario]'> $filas[Nombre_Propietario]</option>";
                }



            }

            ?>
        </select>

        <button name="buscaP" class="btn btn-success">Buscar</button>


    </form>

    <form action="" style="width: 30%; float: left; border: solid black; padding-bottom: 2%" method="post" >
        <h3>buscar por categoría</h3>
        <br><br>

        <label for="">Categoría</label>
        <select name="BuscaCategoria" id="">
            <?php
            $qCat = "SELECT Nombre_Categoria FROM categoria";
            $res = $conn->query($qCat);

            if ($res->num_rows > 0) {
                while ($filas = $res->fetch_assoc()) {
                    echo "<option value='$filas[Nombre_Categoria]'> $filas[Nombre_Categoria]</option>";
                }


            }

            ?>
        </select>

        <button name="BuscaC" class="btn btn-success">Buscar</button>

    </form>
</div>
<br><br><br><br><br><br><br><br>
<?php

if (isset($_POST["buscaID"])) {
    $id = $_POST["ID_Equipo"];


    buscaID($conn,$id);

} elseif (isset($_POST["buscaP"])) {
    $prop = $_POST["BuscaPropietario"];
    buscarPropietario($conn,$prop);

} elseif (isset($_POST["BuscaC"])) {
    $cat = $_POST["BuscaCategoria"];

    buscarCategoria($conn,$cat);

}


?>

<a href="Menu.php" class="btn btn-secondary">Regresar</a>

</body>
</html>