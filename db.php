<?php
// Configuraciš®n de la base de datos local
$host = '161.129.68.42';
$db   = 'cursoen2_sistema_educativo';
$user = 'cursoen2_ale';  // En XAMPP, el usuario por defecto es 'root'
$pass = 'p6,n@KQKj[*a';      // En XAMPP, la contrase09a por defecto estš¢ vacšªa
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