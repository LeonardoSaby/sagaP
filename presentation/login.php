<?php
// /presentation/login.php

require_once '../business/UsuarioService.php';
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $userService = new UserService();

    if ($userService->authenticate($email, $password)) {
        $_SESSION['user'] = $email;
        header("Location: ../presentation/User/index.php");
        exit();
    } else {
        $error = 'Correo o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body {
            background: url('fondo.jpg') no-repeat center center/cover;
            display: flex; justify-content: center; align-items: center;
            height: 100vh; backdrop-filter: blur(5px);
        }
        .container {
            display: flex; background: rgba(108, 175, 217, 0.9);
            padding: 20px; border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            width: 600px; height: 300px;
        }
        .login-container {
            flex: 1; background: #6cafd9;
            padding: 20px; border-radius: 10px;
            color: #011126; border: 1px solid #023059;
        }
        .login-container h2 { margin-bottom: 15px; font-size: 22px; text-align: center; }
        .input-group { margin-bottom: 15px; }
        .input-group label { display: block; font-size: 14px; margin-bottom: 5px; }
        .input-group input {
            width: 100%; padding: 10px;
            border: none; border-radius: 5px;
            background-color: #034c8c; color: #f0f0f0;
        }
        .login-btn {
            width: 100%; padding: 10px;
            background: #023059; border: none;
            border-radius: 5px; font-size: 16px;
            cursor: pointer; color: #f0f0f0;
        }
        .welcome-container {
            flex: 1; display: flex; flex-direction: column;
            justify-content: center; align-items: center;
            color: #011126; padding: 20px;
        }
        .links { font-size: 14px; text-align: center; margin-top: 10px; }
        .links a { color: #011126; text-decoration: none; }
        .links a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <?php if ($error): ?>
                <div style="color: red; text-align: center; margin-bottom: 10px;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input-group">
                    <label for="email">Correo</label>
                    <input type="text" id="email" name="email" placeholder="Correo" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
        <div class="welcome-container">
            <h2>Bienvenido</h2>
            <div class="links">
                <p>¿Perdiste tu contraseña?<br>¿No tienes cuenta? <a href="#">Regístrate</a></p>
                <p><a href="#">&laquo; Volver</a></p>
            </div>
        </div>
    </div>
</body>
</html>
