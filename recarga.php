<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $valor = intval($_POST['valor']);

    if ($valor > 0) {
        $stmt = $conn->prepare("UPDATE usuarios SET saldo = saldo + ? WHERE nome = ?");
        $stmt->bind_param("is", $valor, $usuario);
        $stmt->execute();
        echo "Saldo recarregado com sucesso!";
    } else {
        echo "Valor inválido!";
    }
}
?>

<form method="POST">
    <input type="text" name="usuario" placeholder="Nome do jogador" required>
    <input type="number" name="valor" placeholder="Valor da recarga" required>
    <button type="submit">Recarregar</button>
</form>
