<?php
include 'config.php';

// Adicionar uma nova caixinha
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numero']) && isset($_POST['premio'])) {
    $numero = $_POST['numero'];
    $premio = $_POST['premio'];

    $stmt = $conn->prepare("INSERT INTO caixinhas (numero, premio) VALUES (?, ?)");
    $stmt->bind_param("is", $numero, $premio);
    $stmt->execute();
}

// Buscar todas as caixinhas
$result = $conn->query("SELECT * FROM caixinhas");

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Caixinha Premiada</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #222; color: white; }
        table { width: 50%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid white; padding: 10px; }
        input, button { padding: 10px; margin: 5px; }
    </style>
</head>
<body>
    <h2>Painel Administrativo - Gerenciar Caixinhas</h2>

    <form method="POST">
        <input type="number" name="numero" placeholder="Número da Caixinha" required>
        <input type="text" name="premio" placeholder="Prêmio" required>
        <button type="submit">Adicionar</button>
    </form>

    <h3>Caixinhas Cadastradas</h3>
    <table>
        <tr>
            <th>Número</th>
            <th>Prêmio</th>
            <th>Ação</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['numero'] ?></td>
                <td><?= $row['premio'] ?></td>
                <td>
                    <a href="remover_caixinha.php?id=<?= $row['id'] ?>">Remover</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
