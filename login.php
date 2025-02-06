<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT senha FROM admins WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($senha, $admin['senha'])) {
        $_SESSION['admin'] = $usuario;
        header("Location: admin.php");
        exit();
    } else {
        echo "Login inválido!";
    }
}
?>

<form method="POST">
    <input type="text" name="usuario" placeholder="Usuário" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>
