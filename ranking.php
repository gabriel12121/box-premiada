<?php
include 'config.php';

$result = $conn->query("SELECT usuario, COUNT(*) as vitorias FROM resultados_caixinha GROUP BY usuario ORDER BY vitorias DESC LIMIT 10");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking dos Ganhadores</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #222; color: white; }
        table { width: 50%; margin: auto; border-collapse: collapse; }
        th, td { border: 1px solid white; padding: 10px; }
    </style>
</head>
<body>
    <h2>Ranking dos Maiores Ganhadores</h2>
    <table>
        <tr><th>Usuário</th><th>Vitórias</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['usuario'] ?></td>
                <td><?= $row['vitorias'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
