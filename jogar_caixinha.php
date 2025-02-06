<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $caixinha = $_POST['caixinha'];
    $custo = 2; // Custo para jogar

    // Buscar saldo do usuário
    $stmt = $conn->prepare("SELECT saldo FROM usuarios WHERE nome = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user || $user['saldo'] < $custo) {
        echo json_encode(["status" => "error", "mensagem" => "Saldo insuficiente"]);
        exit();
    }

    // Atualizar saldo
    $novo_saldo = $user['saldo'] - $custo;
    $stmt = $conn->prepare("UPDATE usuarios SET saldo = ? WHERE nome = ?");
    $stmt->bind_param("is", $novo_saldo, $usuario);
    $stmt->execute();

    // Buscar prêmio da caixinha
    $stmt = $conn->prepare("SELECT premio FROM caixinhas WHERE numero = ?");
    $stmt->bind_param("i", $caixinha);
    $stmt->execute();
    $result = $stmt->get_result();
    $premio = $result->fetch_assoc()["premio"] ?? "Sem prêmio";

    // Salvar resultado
    $stmt = $conn->prepare("INSERT INTO resultados_caixinha (usuario, caixinha_escolhida, premio_ganho) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $usuario, $caixinha, $premio);
    $stmt->execute();

    echo json_encode(["status" => "success", "premio" => $premio, "saldo" => $novo_saldo]);
}
?>
