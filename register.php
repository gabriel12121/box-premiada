<?php
include 'config.php';

$usuario = "admin";
$senha = password_hash("senha123", PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO admins (usuario, senha) VALUES (?, ?)");
$stmt->bind_param("ss", $usuario, $senha);
$stmt->execute();

echo "Administrador cadastrado com sucesso!";
?>
