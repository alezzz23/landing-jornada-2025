<?php
include_once("../../db.php");

$action = $_POST['action'] ?? '';

if ($action == 'add') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $rol_id = $_POST['rol_id'] ?? 2; // Por defecto rol 2 (ajusta según tu lógica)
    if ($username && $email && $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, email, password, rol_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $hash, $rol_id]);
        echo 'ok';
    } else {
        http_response_code(400);
        echo 'Faltan datos';
    }
} elseif ($action == 'edit') {
    $id = $_POST['id'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($id && $username && $email) {
        if ($password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE usuarios SET username=?, email=?, password=? WHERE id=?");
            $stmt->execute([$username, $email, $hash, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE usuarios SET username=?, email=? WHERE id=?");
            $stmt->execute([$username, $email, $id]);
        }
        echo 'ok';
    } else {
        http_response_code(400);
        echo 'Faltan datos';
    }
} elseif ($action == 'delete') {
    $id = $_POST['id'] ?? '';
    if ($id) {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->execute([$id]);
        echo 'ok';
    } else {
        http_response_code(400);
        echo 'Faltan datos';
    }
} else {
    http_response_code(400);
    echo 'Acción no válida';
}
