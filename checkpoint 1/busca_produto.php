
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

    // Executa a query
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se houve resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Exibe os resultados
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '<div class="result-container">';
            echo '<h3>Nome: ' . $row["nome"] . '</h3>';
            echo '<p>Código: ' . $row["codigo"] . '</p>';
            echo '<p>Descrição: ' . $row["descricao"] . '</p>';
            echo '<p>Quantidade: ' . $row["quantidade"] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p class="no-results">Nenhum resultado encontrado.</p>';
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
