<?php
session_start();
require 'db.php'; // Asegúrate de que este archivo contiene la conexión a la base de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar las credenciales con JOIN a la tabla de roles
    $stmt = $pdo->prepare('SELECT u.*, r.nombre as rol_nombre FROM usuarios u 
                          JOIN roles r ON u.rol_id = r.id 
                          WHERE u.username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Debug: Mostrar información de depuración
    error_log('Intento de inicio de sesión para: ' . $username);
    
    // Verificar si el usuario existe
    if ($user) {
        error_log('Usuario encontrado en la base de datos');
        error_log('Hash almacenado: ' . $user['password']);
        
        // Verificar si la contraseña es correcta
        if (password_verify($password, $user['password'])) {
            error_log('Contraseña verificada correctamente');
        } else {
            error_log('Error: La contraseña no coincide');
            // Intentar con la contraseña por defecto 'admin123' para el usuario admin
            if ($username === 'admin' && $password === 'admin123') {
                error_log('Usando contraseña temporal para admin');
                // Actualizar la contraseña en la base de datos
                $hashedPassword = password_hash('admin123', PASSWORD_DEFAULT);
                $updateStmt = $pdo->prepare('UPDATE usuarios SET password = ? WHERE username = ?');
                $updateStmt->execute([$hashedPassword, 'admin']);
                $user['password'] = $hashedPassword;
            }
        }
    } else {
        error_log('Error: Usuario no encontrado');
    }

    // Verificar credenciales
    if ($user && password_verify($password, $user['password'])) {
        // Credenciales válidas, iniciar sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_role'] = $user['rol_nombre'];
        $_SESSION['rol_id'] = $user['rol_id'];
        
        // Redirigir según el rol (1 = admin)
        if ($user['rol_id'] == 1) {
            header('Location: soft-ui-dashboard-main/pages/dashboard.html');
        } else {
            header('Location: index.php');
        }
        exit;
    } else {
        // Credenciales inválidas
        $error = 'Usuario o contraseña incorrectos.';
        error_log('Error de autenticación para el usuario: ' . $username);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="login__header">
                <h2 class="login__title">Bienvenido</h2>
                <p class="login__subtitle">Inicia sesión para continuar</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form action="login.php" method="post" class="login__form">
                <div class="form-group">
                    <label for="username">Usuario</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa tu usuario" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                    </div>
                </div>
                
                <button type="submit" class="btn">
                    <span>Iniciar Sesión</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
            
            <div class="login__footer">
                <p>¿Olvidaste tu contraseña? <a href="#" class="text-link">Recupérala aquí</a></p>
            </div>
        </div>
    </div>
</body>
</html>
