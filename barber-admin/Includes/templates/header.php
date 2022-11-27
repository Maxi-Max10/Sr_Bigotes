<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Barbershop Booking Website">
    <meta name="author" content="JAIRI IDRISS">

    <title><?php echo $pageTitle ?></title>
   

    <!-- FONTS FILE -->
    <link href="Design/fonts/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Nunito FONT FAMILY FILE -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- CSS FILES -->
    <link href="Design/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="Design/css/main.css" rel="stylesheet">

    <!-- Barber Icons -->
    <link rel="stylesheet" type="text/css" href="Design/fonts/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="Design/css/barber-icons.css">

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

<body id="page-top">
	 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bs bs-scissors-1"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sr.Bigotes</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Administrador</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                SERVICIOS
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="servic-categoria.php">
                    <i class="fas fa-list"></i>
                    <span>Categorías de Servicios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.php">
                    <i class="bs bs-scissors-1"></i>
                    <span>Servicios</span>
                </a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                CLIENTES & PERSONAL
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="clients.php">
                    <i class="far fa-address-card"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="empleados.php">
                    <i class="far fa-user"></i>
                    <span>Empleados</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="empleados-horarios.php">
                    <i class="fas fa-calendar-week icon-ver"></i>
                    <span>Horarios de Empleados</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

					  	<!-- Topbar Navbar -->
					  	<ul class="navbar-nav ml-auto">
							<li class="nav-item">
		              			<a class="nav-link" href="../" target="_blank">
		              				<i class="far fa-eye"></i>
		                			<span style="margin-left: 5px;">Ver sitio web</span>
		              			</a>
		          			</li>
							<div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['username_barbershop_Xw211qAAsq4']; ?>
                                </span>
                                <i class="fas fa-caret-down"></i>
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Actividad
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->