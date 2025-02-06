<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixinha Premiada</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Escolha uma Caixinha</h2>
        <input type="text" id="usuario" placeholder="Digite seu nome">
        <div class="caixinhas">
            <button class="caixinha" data-numero="1">📦 1</button>
            <button class="caixinha" data-numero="2">📦 2</button>
            <button class="caixinha" data-numero="3">📦 3</button>
            <button class="caixinha" data-numero="4">📦 4</button>
        </div>
        <p id="resultado"></p>
    </div>

    <script src="script.js"></script>
</body>
</html>
