<?php
    require "libs/Seguridad.php";
    require "libs/Conexion.php";
    $seguridad = new Seguridad();
    $VAL = "ADMINISTRADOR";
    $usuarioEnSesion = $seguridad->getUsuario();

    $esAdministrador = mysqli_query($conn,"SELECT * FROM usuarios WHERE Administrador = '$VAL' and nombre_Usuario = '$usuarioEnSesion'" );

    if ($seguridad->getUsuario()==null){
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
    <title>Menú principal</title>
    <link rel="stylesheet" href="../css/TablaAll.css">
    <style>
        button{

            padding: 10px;
            margin: 15px;
            background-color: #ccebff;
            color: black;
            font-size: 15px;

        }
        .dropbt{
            color: black;
            padding: 16px;
            cursor: pointer;
            border:none;
        }
        .dropdown{
            position: relative;
            display: inline-block;
            color: white;

        }
        .dropcont{
            position: absolute;
            display: none;
            min-width: 160px;
            z-index: 1;
            background-color: white;
        }
        .dropcont a{
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown:hover .dropcont{
            display: block;
        }


    </style>
</head>
<body style="background-color: #d9f2d9">
<h1>Menú principal</h1>
<?php

$user = $_SESSION['usuario'];

$hora = time();
echo "Usuario en sesión: \n".$user;
?>
<div style="background-color: white">
    <?php
    if ($esAdministrador->num_rows>0){
        echo '<div class="dropdown" >';
        echo '   <button class="dropbt">Agregar</button>';
        echo '     <div class="dropcont">';
        echo '       <a href="AgregarEquipos.php">Agregar equipo</a>';
        echo '    </div>';
        echo '</div>';
    }else{
        //echo $hora;
    }

    ?>
    <div class="dropdown" >
        <button class="dropbt">Buscar</button>
        <div class="dropcont">
            <a href="Buscar.php" >Buscar Equipo</a>
        </div>
    </div>

</div>
<?php

require "Consultas.php";

if (!$esAdministrador-> num_rows> 0){
    ConsultarSinAcciones($conn);
}else{
    consultarTodo($conn);
}


?>

    <form action="libs/CerrarSesion.php" method="post">
        <button>Cerrar Sesión</button>
    </form>

</body>
</html>
