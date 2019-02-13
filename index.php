<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio de sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-43">
						Inicio de sesión - UCTA inventario
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username">
						<span class="label-input100">Nombre de usuario</span>
					</div>
					
					
					<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="label-input100">Contraseña</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="inicioSesion">
							Iniciar sesión
						</button>
                        <p ><a style="color: black;" href="PHP/AgregarUsuarios.php">Agregar nuevos usuarios (Solo administrador)</a></p>
					</div>
					

				</form>

                <?php
                    require "PHP/Conexion.php";

                    if (isset($_POST['inicioSesion'])) {
                        //VARIABLES DEL USUARIO
                        $usuario = $_POST['username'];
                        $pass = $_POST['pass'];
                        if (empty($usuario) | empty($pass))
                        {
                            header("Location: index.php");
                            exit();
                        }

                        $sql = "SELECT * from usuarios  where nombreUsuario = '$usuario' and pass = '$pass' ";
                        $sql2 = "SELECT * FROM admins where User_Admin = '$usuario' and Pass_Admin = '$pass'";
                        $result2 = $conn->query($sql2);
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0||$result2->num_rows>0)
                        {
                            //VARIABLE DE SESIÓN DEL USUARIO
                            session_start();
                            $_SESSION['usuario'] = $usuario;
                            echo '<script> alert("\tBienvenido !");
        location.href = "PHP/Menu.php" </script>';
                        }else
                        {
                            echo '<script> alert("Usuario o contraseña incorrectos");
        location.href = "index.php" </script>';
                            exit();
                        }
                    }


                ?>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>