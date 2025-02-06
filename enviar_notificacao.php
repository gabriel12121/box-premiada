<?php
include 'config.php';

$mensagem = $_POST['mensagem'];
$stmt = $conn->prepare("INSERT INTO notificacoes (mensagem) VALUES (?)");
$stmt->bind_param("s", $mensagem);
$stmt->execute();

echo "Notificação enviada!";
?>
