<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $caixinha_escolhida = $_POST['caixinha'];

    // Buscar prêmio da caixinha escolhida
    $query = "SELECT premio FROM caixinhas WHERE numero = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $caixinha_escolhida);
    $stmt->execute();
    $result = $stmt->get_result();
    $premio = $result->fetch_assoc()["premio"] ?? "Sem prêmio";

    // Salvar resultado
    $insert = $conn->prepare("INSERT INTO resultados_caixinha (usuario, caixinha_escolhida, premio_ganho) VALUES (?, ?, ?)");
    $insert->bind_param("sis", $usuario, $caixinha_escolhida, $premio);
    $insert->execute();

    echo json_encode(["status" => "success", "premio" => $premio]);
}
?>
