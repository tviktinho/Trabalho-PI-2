<?php
// Obtém os valores enviados pelo formulário
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$id = $_POST["id"];


// Conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "admin";
$banco = "cadastro_produto";

// Conecta ao banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
//$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a conexão
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $id = $_POST["id"];

    // Insere o usuário na tabela "users"
    $sql = "INSERT INTO cliente (nome, email, senha, id) VALUES ('$username', '$email', '$password', '$id')";
    if (mysqli_query($conexao, $sql)) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>

