<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informação de Compra</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="card-formulario">
        <h1>Buscar Compra</h1>
        <form action="buscar_compras.php" method="POST">
            <label>Nome:</label>
            <input id="nome" type="text" name="nome"><br>
            <label>CPF:</label>
            <input id="cpf" type="text" name="cpf"><br>
            <label>Data:</label>
            <input id="data" type="date" name="data"><br>
            <input type="submit" value="Buscar" id="botaoBuscar" disabled>
        </form>
    </div>
    <script src="./assets/js/script.js"></script>
</body>

</html>