<?php
// Configuración de la base de datos local
$host = 'localhost';
$db   = 'cursoen2_sistema_educativo';
$user = 'root';  // En XAMPP, el usuario por defecto es 'root'
$pass = '';      // En XAMPP, la contraseña por defecto está vacía
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>