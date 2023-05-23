<?php
// Obtém os valores enviados pelo formulário
$nome = $_POST["nome"];
$codigo = $_POST["codigo"];
$descricao = $_POST["descricao"];
$quantidade = $_POST["quantidade"];

// Configurações do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "cadastro_produto";

// Conecta ao banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

// Verifica se a conexão foi bem sucedida
if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Insere os valores na tabela "produtos"
$sql = "INSERT INTO produto (nome, codigo, descricao, quantidade) VALUES ('$nome', '$codigo', '$descricao', $quantidade)";

if (mysqli_query($conexao, $sql)) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar produto: " . mysqli_error($conexao);
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>