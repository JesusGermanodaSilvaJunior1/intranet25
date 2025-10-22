HTML: Para estruturar a página e o formulário.
CSS: Para estilizar o card, a logomarca e a foto, além de garantir um design responsivo.
PHP: Para o processamento do formulário, a lógica de autenticação, o cadastro e a recuperação de senha.
MySQL: Para o banco de dados que irá armazenar os dados dos funcionários (email, senha, foto, etc.).
PDO: Para fazer a conexão segura com o banco de dados, prevenindo ataques de injeção de SQL.
JavaScript: Para interações dinâmicas no frontend, como exibir diferentes partes do formulário (login, cadastro, recuperação).
Estrutura do projeto
1. Database
Crie um banco de dados chamado login_empresa. Dentro dele, execute o seguinte comando SQL para criar a tabela funcionarios:

CREATE TABLE funcionarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    foto VARCHAR(255),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




<?php
$host = 'localhost';
$dbname = 'login_empresa';
$usuario = 'seu_usuario';
$senha = 'sua_senha';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>



