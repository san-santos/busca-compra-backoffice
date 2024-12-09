<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecommerce';

// Criando a conexão
$conn = new mysqli($host, $user, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>