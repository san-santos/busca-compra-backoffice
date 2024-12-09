CRIAR BASE DE DADOS SQL ecommerce;

USE ecommerce;

CREATE TABLE compras (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
cpf VARCHAR(14),
data DATE,
produto VARCHAR(100),
valor DECIMAL(10, 2)
);

-- Exemplo de inserção de dados
INSERT INTO compras (nome, cpf, data, produto, valor) VALUES
('João Silva', '123.456.789-00', '2024-12-08', 'Lasanha à Bolonhesa', 42.50),
('Maria Oliveira', '987.654.321-00', '2024-12-07', 'Canneloni Piemonte', 46.50);