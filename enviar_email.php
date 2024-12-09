<?php 
// Função para enviar o e-mail
function enviarEmail($nome, $cpf, $data, $produto, $valor) {
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "seubanco"; 

    // Criar a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consultar o banco de dados para obter o e-mail do usuário com base no CPF
    $sql = "SELECT email FROM usuarios WHERE cpf = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Recuperar o e-mail do usuário
        $row = $result->fetch_assoc();
        $para = $row['email']; 
    } else {
        echo "<script>alert('CPF não encontrado.'); window.location='buscar_compras.php';</script>";
        return;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();

    $assunto = "Informações de Compra";

    $mensagem = "
    <html>
    <head>
    <title>Ficha de Compra</title>
    </head>
    <body>
    <h2>Ficha de Compra</h2>
    <p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>
    <p><strong>CPF:</strong> " . htmlspecialchars($cpf) . "</p>
    <p><strong>Data:</strong> " . htmlspecialchars($data) . "</p>
    <p><strong>Produto:</strong> " . htmlspecialchars($produto) . "</p>
    <p><strong>Valor:</strong> R$ " . number_format($valor, 2, ',', '.') . "</p>
    </body>
    </html>
    ";

    // Definir os cabeçalhos do e-mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: mail@dominio.com.br" . "\r\n";

    // Enviar o e-mail
    if (mail($para, $assunto, $mensagem, $headers)) {
        echo "<script>alert('E-mail enviado com sucesso!'); window.location='buscar_compras.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar o e-mail.'); window.location='buscar_compras.php';</script>";
    }
}

// Verificar se os dados foram recebidos via POST
if (isset($_POST['enviar_email'])) {
    $nome = $_POST['nome_email'];
    $cpf = $_POST['cpf_email'];
    $data = $_POST['data_email'];
    $produto = $_POST['produto_email'];
    $valor = $_POST['valor_email'];

    // Chamar a função de envio de e-mail
    enviarEmail($nome, $cpf, $data, $produto, $valor);
}
?>