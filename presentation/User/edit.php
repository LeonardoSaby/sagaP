<?php
// edit_user.php
require_once '../../business/UsuarioService.php';

$userService = new UserService();

// Verificar si se recibe un ID de usuario para editar
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = $userService->getUserById($userId);

    if (!$user) {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "ID de usuario no proporcionado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $estado = $_POST['estado'];

    // Actualizar usuario existente
    $success = $userService->updateUser($userId, $username, $password, $estado);

    if ($success) {
        header('Location: index.php'); // Redirigir a la lista de usuarios
        exit;
    } else {
        echo "Error al actualizar el usuario.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario - Startmin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/metisMenu.min.css" rel="stylesheet">
    <link href="../../public/css/timeline.css" rel="stylesheet">
    <link href="../../public/css/startmin.css" rel="stylesheet">
    <link href="../../public/css/morris.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- .navbar-header -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">Startmin</a>
            </div>
            <!-- /.navbar-header -->
            <!-- Navbar links -->
            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
            </ul>
            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown navbar-inverse">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li><a href="#"><div><i class="fa fa-comment fa-fw"></i> New Comment<span class="pull-right text-muted small">4 minutes ago</span></div></a></li>
                        <li><a href="#"><div><i class="fa fa-twitter fa-fw"></i> 3 New Followers<span class="pull-right text-muted small">12 minutes ago</span></div></a></li>
                        <li><a href="#"><div><i class="fa fa-envelope fa-fw"></i> Message Sent<span class="pull-right text-muted small">4 minutes ago</span></div></a></li>
                        <li><a href="#"><div><i class="fa fa-tasks fa-fw"></i> New Task<span class="pull-right text-muted small">4 minutes ago</span></div></a></li>
                        <li><a href="#"><div><i class="fa fa-upload fa-fw"></i> Server Rebooted<span class="pull-right text-muted small">4 minutes ago</span></div></a></li>
                        <li class="divider"></li>
                        <li><a class="text-center" href="#"><strong>See All Alerts</strong><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b></a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
        </nav>

        <!-- Sidebar -->
        <aside class="sidebar navbar-default" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </li>
                    <li><a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                    <li>
                            <a href="index.php" class="active"><i class="fa fa-user fa-fw"></i> Usuarios</a>
                        </li>
                    <li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="flot.html">Flot Charts</a></li>
                            <li><a href="morris.html">Morris.js Charts</a></li>
                        </ul>
                    </li>
                    <li><a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a></li>
                    <li><a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a></li>
                    <li><a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="panels-wells.html">Panels and Wells</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="notifications.html">Notifications</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="icons.html">Icons</a></li>
                            <li><a href="grid.html">Grid</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">Second Level Item</a></li>
                            <li><a href="#">Second Level Item</a></li>
                            <li><a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="#">Third Level Item</a></li>
                                    <li><a href="#">Third Level Item</a></li>
                                    <li><a href="#">Third Level Item</a></li>
                                    <li><a href="#">Third Level Item</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="blank.html">Blank Page</a></li>
                            <li><a href="login.html">Login Page</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- /.sidebar -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Editar Usuario</h1>
                    </div>
                </div>

                <form action="edit.php?id=<?php echo $userId; ?>" method="post">
                    <div class="form-group">
                        <label for="username">Nombre</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" value="<?php echo htmlspecialchars($user['estado']); ?>" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/metisMenu.min.js"></script>
    <script src="../../public/js/startmin.js"></script>
</body>

</html>