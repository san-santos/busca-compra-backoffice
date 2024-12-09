<?php
if (isset($_GET['nome']) && isset($_GET['cpf']) && isset($_GET['data']) && isset($_GET['produto']) && isset($_GET['valor'])) {
    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $data = $_GET['data'];
    $produto = $_GET['produto'];
    $valor = $_GET['valor'];
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="styles.php">
    <title>Ficha de Compra - Imprimir</title>
</head>

<body>

    <div class="print-container">
        <div class="print-header">
            <h1>Ficha de Compra</h1>
            <p>Impressão da compra realizada</p>
        </div>

        <div class="details">
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?>
            </p>
            <p><strong>CPF:</strong> <?php echo htmlspecialchars($cpf); ?></p>
            <p><strong>Data da Compra:</strong> <?php echo date("d/m/Y", strtotime($data)); ?></p>
            <p><strong>Produto:</strong> <?php echo htmlspecialchars($produto); ?></p>
            <p><strong>Valor:</strong> R$ <?php echo number_format($valor, 2, ',', '.'); ?></p>
        </div>

        <div class="print-footer">
            <button onclick="voltarPaginaAnterior()">Voltar</button>
            <button id="print-button" onclick="imprimir()">Imprimir</button>
        </div>
    </div>
</body>

</html>