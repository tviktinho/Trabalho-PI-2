<?php
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

// Verifica se o formulário de busca foi submetido
if (isset($_POST['buscar'])) {
    // Obtém o valor de busca
    $busca = $_POST['buscar'];

    // Query para buscar produtos com base no nome ou código
    $sql = "SELECT * FROM produto WHERE nome LIKE '%$busca%' OR codigo LIKE '%$busca%'";

    // Exibe a consulta SQL para depuração
    echo "Consulta SQL: " . $sql . "<br>";

    // Executa a query
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se houve resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Exibe os resultados
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "Nome: " . $row["nome"] . "<br>";
            echo "Código: " . $row["codigo"] . "<br>";
            echo "Descrição: " . $row["descricao"] . "<br>";
            echo "Quantidade: " . $row["quantidade"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>