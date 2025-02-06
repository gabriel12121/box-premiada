<?php
include 'config.php';
$result = $conn->query("SELECT * FROM resultados_caixinha ORDER BY data DESC");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Jogadores</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #222; color: white; }
        table { width: 60%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid white; padding: 10px; }
    </style>
</head>
<body>
    <h2>Histórico de Jogos</h2>
    <table>
        <tr><th>Usuário</th><th>Caixinha Escolhida</th><th>Prêmio</th><th>Data</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['usuario'] ?></td>
                <td><?= $row['caixinha_escolhida'] ?></td>
                <td><?= $row['premio_ganho'] ?></td>
                <td><?= $row['data'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
