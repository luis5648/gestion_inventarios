<?php
require "libs/Seguridad.php";
require "libs/Conexion.php";
require "Consultas.php";
$seguridad = new Seguridad();

if ($seguridad->getUsuario() == null) {
    header('Location: ../index.php');
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
    <title>Agregar equipos</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/TablaAll.css">
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
<body style="background-color: #e6f7ff ">
<div style="background-color: white">
    <h2>Agregar equipo.</h2>
</div>
<div>
    <form action="addItems.php" method="post" style="Margin: 2%">

        <div class="form-group">
            <label class="form-control" style="background-color: #e6f7ff ">ID: </label>
            <input type="text" name="id_equipo" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-control" style="background-color: #e6f7ff ">Nombre (Descripción del equipo):</label>
            <input type="text" name="nombre_equipo" class="form-control" required><br>
        </div>

        <div class="form-group">
            <label class="form-control" style="background-color: #e6f7ff ">Modelo: </label>
            <input type="text" name="modelo" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-control" style="background-color: #e6f7ff ">Marca: </label>
            <input type="text" name="marca" class="form-control" required><br>
        </div>

        <div class="form-group">
            <label class="form-control" style="background-color: #e6f7ff ">Número de serie: </label>
            <input type="text" name="no_serie" class="form-control">
        </div>

        <div class="form-group">
            <label class="form-control" style="background-color: #e6f7ff ">Ubicación: </label>
            <input type="text" name="ubicacion" class="form-control"><br>
        </div>

        <div class="form-group">
            <label for="Prop" class="form-control" style="background-color: #e6f7ff ">Nombre del propietario: </label>
            <select name="BuscaPropietario" class="form-control">
                <?php
                $qProp = "SELECT Nombre_Propietario FROM propietario";
                $res = $conn->query($qProp);

                if ($res->num_rows > 0) {
                    while ($filas = $res->fetch_assoc()) {
                        echo "<option value=" . $filas["Nombre_Propietario"] . ">" . $filas["Nombre_Propietario"] . "</option>";
                    }


                }

                ?>
            </select>
        </div>
        <br>
        <div class="form-group" >
            <label for="" class="form-control" style="background-color: #e6f7ff ">Categoría</label>
            <select name="BuscaCategoria" id="" class="form-control">
                <?php
                $qCat = "SELECT Nombre_Categoria FROM categoria";
                $res = $conn->query($qCat);

                if ($res->num_rows > 0) {
                    while ($filas = $res->fetch_assoc()) {
                        echo "<option value=" . $filas["Nombre_Categoria"] . ">" . $filas["Nombre_Categoria"] . "</option>";
                    }


                }

                ?>
            </select>
        </div>

        <div style="text-align: center;">
            <button class="btn btn-success">Agregar</button>
            <a href="Menu.php" class="btn btn-secondary">Regresar</a>
        </div>

    </form>


</div>
<hr>
<?php


consultarTodo($conn);

?>
</body>
</html>

