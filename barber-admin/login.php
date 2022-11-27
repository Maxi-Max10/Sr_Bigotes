<?php
	session_start();

	// IF THE USER HAS ALREADY LOGGED IN
	if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
	{
		header('Location: index.php');
		exit();
	}
	// ELSE
	$pageTitle = 'Barber Admin Login';
	include 'connect.php';
	include 'Includes/functions/functions.php';


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Señor Bigotes</title>
    <!-- FONTS FILE -->
    <link href="Design/fonts/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Nunito FONT FAMILY FILE -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- CSS FILES -->
    <link href="Design/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="Design/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="Design/css/login-adm.css">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="Design/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="Design/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="Design/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="Design/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="Design/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="Design/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="Design/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="Design/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="Design/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="Design/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="Design/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="Design/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="Design/favicon/favicon-16x16.png">
    <link rel="manifest" href="Design/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	
</head>

<body>
    <div class="login-container">
        <div class="login">
            <form class="login-container validate-form" name="login-form" method="POST" action="login.php"
                onsubmit="return validateLogInForm()">
                <span class="login100-form-title p-b-32">
                    Bienvenido

                </span>

                <!-- PHP SCRIPT WHEN SUBMIT -->
                <!-- GUIÓN PHP AL ENVIAR -->

                <?php

					if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin-button']))
					{
						$usuario = test_input($_POST['usuario']);
						$password = test_input($_POST['password']);
						$hashedPass = sha1($password); //cifro contraseña
						

						//Comprobar si el usuario existe en la base de datos

						$stmt = $con->prepare("Select admin_id, usuario,password FROM barber_admin WHERE usuario = ? and password = ?");
						$stmt->execute(array($usuario,$hashedPass));
						$row = $stmt->fetch();
						$count = $stmt->rowCount();

						// Comprueba si cuenta > 0, lo que significa que la base de datos contiene un registro sobre este usuario

						if($count > 0)
						{

							$_SESSION['username_barbershop_Xw211qAAsq4'] = $usuario;
							$_SESSION['password_barbershop_Xw211qAAsq4'] = $password;
							$_SESSION['admin_id_barbershop_Xw211qAAsq4'] = $row['admin_id'];
							header('Location: index.php');
							die();
						}
						else
						{
							?>
                              // si se ingresan mal los campos , largar un mensaje
                                <div class="alert alert-danger">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="messages">
                                        <div>¡Usuario o contraseña incorrecto!</div>
                                    </div>
                                </div>

                <?php
						}
					}

				?>

                <!-- USERNAME INPUT  validar input de formularios--> 

                <div class="form-input">
                    <span class="txt1">Usuario</span>
                    <input type="text" name="usuario" class="form-control"
                        oninput="getElementById('required_username').style.display = 'none'" autocomplete="off">
                    <span class="invalid-feedback" id="required_username">Usuario Requerido!</span>
                </div>

                <!-- PASSWORD INPUT -->

                <div class="form-input">
                    <span class="txt1">Contraseña</span>
                    <input type="password" name="password" class="form-control"
                        oninput="getElementById('required_password').style.display = 'none'"
                        autocomplete="new-password">
                    <span class="invalid-feedback" id="required_password">Contraseña requerida!</span>
                </div>

                <!-- SIGN IN BUTTON -->

                <p>
                    <button type="Submit" name="signin-button">Iniciar Sesion</button>
                </p>

                <!-- FORGOT YOUR PASSWORD LINK -->

                <span class="forgotPW">Olvido su contraseña? <a href="#">Restablecer</a></span>
            </form>



        </div>

        <img class="image-container" src="img/sr Bigote .logo.png" alt="">

    </div>










    <!-- End of Footer -->

    <!-- INCLUDE JS SCRIPTS -->
    <script src="Design/js/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="Design/js/bootstrap.bundle.min.js"></script>
    <script src="Design/js/sb-admin-2.min.js"></script>
    <script src="Design/js/main.js"></script>
</body>

</html>