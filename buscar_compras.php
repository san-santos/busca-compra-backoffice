<?php
include 'includes/conexao.php'; // Conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.php">
    <script src="script.js"></script>
    <title>Busca de Compras</title>
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Evitar SQL Injection utilizando prepared statements
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $data = $_POST['data'];

        // Preparando a query com placeholders
        $sql = "SELECT * FROM compras WHERE nome LIKE ? AND cpf LIKE ? AND data LIKE ?";
        $stmt = $conn->prepare($sql);

        // Substituindo os placeholders pelos dados de entrada
        $nome_like = "%$nome%";
        $cpf_like = "%$cpf%";
        $data_like = "%$data%";
        $stmt->bind_param('sss', $nome_like, $cpf_like, $data_like);

        // Executando a query
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Pop-up com as informações encontradas
            echo '<div id="popup">';
            echo '<button id="button-close" onclick="fecharPopup()">X</button>';
            echo '<h2>Ficha de Compra</h2>';

            while ($row = $result->fetch_assoc()) {
                echo '<p><strong>Nome:</strong> ' . htmlspecialchars($row['nome']) . '</p>';
                echo '<p><strong>CPF:</strong> ' . htmlspecialchars($row['cpf']) . '</p>';
                echo '<p><strong>Data:</strong> ' . htmlspecialchars($row['data']) . '</p>';
                echo '<p><strong>Produto:</strong> ' . htmlspecialchars($row['produto']) . '</p>';
                echo '<p><strong>Valor:</strong> R$ ' . number_format($row['valor'], 2, ',', '.') . '</p>';
                ?>

    <!-- Link para a página de impressão -->
    <div id="container-envio-email">
        <a class="buttom-imprimir" href="print.php?nome=<?php echo urlencode($row['nome']); ?> 
                        &cpf=<?php echo urlencode($row['cpf']); ?> 
                        &data=<?php echo urlencode($row['data']); ?> 
                        &produto=<?php echo urlencode($row['produto']); ?> 
                        &valor=<?php echo urlencode($row['valor']); ?>" target="_self">
            <button>Imprimir</button>
        </a>


        <!-- Botão para enviar por email -->

        <form method="POST" action="enviar_email.php">
            <input type="hidden" name="nome_email" value="<?php echo $row['nome']; ?>">
            <input type="hidden" name="cpf_email" value="<?php echo $row['cpf']; ?>">
            <input type="hidden" name="data_email" value="<?php echo $row['data']; ?>">
            <input type="hidden" name="produto_email" value="<?php echo $row['produto']; ?>">
            <input type="hidden" name="valor_email" value="<?php echo $row['valor']; ?>">
            <button class="buttom-email" type="submit" name="enviar_email">Enviar por Email</button>
        </form>
    </div>

    <?php
            }

            echo '</div>';
        } else {
            echo "<script>
                voltarPaginaInicial()
            </script>";
        }

        // Fechar a declaração preparada
        $stmt->close();
    }
    ?>

</body>

</html>