<?php
// Index: Principal
//Llamar a la capa de negocio pero de usuario
require_once '../../business/UsuarioService.php';

// Instancia de UserService
$userService = new UserService();

// Obtener todos los usuarios
$usuarios = $userService->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <title>Lista de Usuarios - Admin</title>
    <style>
 body {
    background-color: #011126; /* Fondo principal */
    color: #6CAFD9; /* Texto principal */
    font-family: 'Arial', sans-serif;
}

h1, h2, h3 {
    color: #034C8C; /* Color de encabezados */
}

a {
    color: #84B8D9; /* Color de enlaces */
    text-decoration: none;
}

.user-card{
    margin-top: 30px;
    border: 2px solid #007bff;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px; 
}
a:hover {
    text-decoration: underline;
}

.btn-primary {
    background-color: #023059; /* Fondo de botones primarios */
    border-color: #023059;
}

.btn-primary:hover {
    background-color: #034C8C;
    border-color: #034C8C;
}

.navbar {
    background-color: #023059 !important;
}

.navbar a {
    color: #6CAFD9 !important;
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
                        <a class="nav-link" href="#"><i class="fa fa-home"></i> Sitio Web</a>
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

        <div class="container mt-4">
            <h1 class="page-header">Lista de Usuarios Registrados</h1>
            <a href="create.php" class="btn btn-success mb-3">Agregar Nuevo Usuario</a>

            <div class="row">
                <?php foreach ($usuarios as $usuario): ?>
                    <div class="col-md-4">
                        <div class="user-card">
                            <h5><?php echo htmlspecialchars($usuario['username']); ?></h5>
                            <p><strong>Contraseña: </strong> <?php echo htmlspecialchars($usuario['password']); ?></p>
                            <p><strong>Estado: </strong> <?php echo htmlspecialchars($usuario['estado']); ?></p>
                            <p><strong>Fecha de Registro: </strong> <?php echo htmlspecialchars($usuario['fecha_registro']); ?></p>
                            <div class="user-actions">
                                <a href="edit.php?id=<?php echo htmlspecialchars($usuario['id']); ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="details.php?id=<?php echo htmlspecialchars($usuario['id']); ?>" class="btn btn-info btn-sm">Ver</a>
                                <a href="delete.php?id=<?php echo htmlspecialchars($usuario['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">Eliminar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>