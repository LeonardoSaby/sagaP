<?php
require_once '../../business/UsuarioService.php';

// Crear una instancia del servicio de usuario
$userService = new UserService();

// Verificar si se ha pasado el ID del usuario en la URL
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    
    try {
        // Obtener los detalles del usuario
        $user = $userService->getUserById($userId);
        
        if ($user) {
            // Mostrar los detalles del usuario
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del Usuario - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .details-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-home"></i> Website</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i> Usuario
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="#">Configuraciones</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="login.html">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Contenedor principal -->
        <div class="container mt-4">
            <h1 class="page-header">Detalles del Usuario</h1>

            <div class="details-container">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                    </tr>
                    <tr>
                        <th>Contraseña</th>
                        <td><?php echo htmlspecialchars($user['password']); ?></td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td><?php echo htmlspecialchars($user['estado']); ?></td>
                    </tr>
                    <tr>
                        <th>Fecha de Registro</th>
                        <td><?php echo htmlspecialchars($user['fecha_registro']); ?></td>
                    </tr>
                </table>
                <a href="index.php" class="btn btn-secondary mt-3">Volver a la lista</a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
                    <?php
        } else {
            echo "Usuario no encontrado.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID de usuario no proporcionado.";
}
?>