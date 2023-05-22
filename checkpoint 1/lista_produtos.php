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

// Query para buscar todos os produtos
$sql = "SELECT * FROM produto";

// Executa a query
$resultado = mysqli_query($conexao, $sql);

// Verifica se houve resultados
if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='result-container'>";
    echo "<h1>Lista de Produtos</h1>";
    echo "<table>";
    echo "<tr><th>Nome</th><th>Código</th><th>Descrição</th><th>Quantidade</th></tr>";

    // Exibe os resultados em uma tabela
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["codigo"] . "</td>";
        echo "<td>" . $row["descricao"] . "</td>";
        echo "<td>" . $row["quantidade"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
} else {
    echo "Nenhum produto cadastrado.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>