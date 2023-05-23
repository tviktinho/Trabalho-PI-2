<?php
// Obtém os dados do formulário de login
$emailUsuario = $_POST['username'];
$senhaUsuario = $_POST['password'];

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

$sql = "SELECT * FROM cliente WHERE email = '$emailUsuario' AND senha = '$senhaUsuario'";
$result = $conexao->query($sql);


// Verifica se o resultado da consulta retornou algum registro
if ($result->num_rows > 0) {
    // O login é válido, o usuário está autenticado
    echo "Login bem-sucedido!";

    // Você pode redirecionar o usuário para outra página ou executar outras ações desejadas aqui

} else {
    // Login inválido, o usuário não está autenticado
    echo "Nome de usuário ou senha inválidos.";

    // Você pode redirecionar o usuário de volta para a página de login ou executar outras ações desejadas aqui
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>