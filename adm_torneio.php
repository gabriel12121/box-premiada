<?php
include 'config.php';

// Criar torneio
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $premio = intval($_POST['premio']);

    $stmt = $conn->prepare("INSERT INTO torneios (nome, data_inicio, data_fim, premio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $nome, $data_inicio, $data_fim, $premio);
    $stmt->execute();
    echo "Torneio criado com sucesso!";
}

// Buscar torneios existentes
$torneios = $conn->query("SELECT * FROM torneios ORDER BY data_inicio DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Admin - Torneios</title></head>
<body>
    <h2>Criar Novo Torneio</h2>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome do torneio" required>
        <input type="datetime-local" name="data_inicio" required>
        <input type="datetime-local" name="data_fim" required>
        <input type="number" name="premio" placeholder="Valor do prêmio" required>
        <button type="submit">Criar</button>
    </form>

    <h2>Torneios Ativos</h2>
    <ul>
        <?php while ($torneio = $torneios->fetch_assoc()): ?>
            <li><?= $torneio['nome'] ?> - Prêmio: <?= $torneio['premio'] ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
