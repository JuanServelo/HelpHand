<?php
// Conectar ao banco de dados
include 'db_connect.php';

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter o termo de pesquisa
    $searchTerm = $_POST["searchTerm"];

    // Consulta SQL para buscar profissionais por função
    $sql = "SELECT c.Nome, e.Descricao FROM Colaborador c
            INNER JOIN Especialista es ON c.ID_Colaborador = es.fk_Colaborador_ID_Colaborador
            INNER JOIN Especialidade e ON es.fk_Especialidade_ID_Espec = e.ID_Espec
            WHERE e.Descricao LIKE '%$searchTerm%'";

    // Executar a consulta
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Exibir os resultados
        while ($row = $result->fetch_assoc()) {
            echo "<div class='searchResultCard'>";
            echo "<img class='icon1' src='img\Ellipse 4.png' alt='1'>";
            echo "<a href='#' class='b1'>" . $row["Nome"] . "</a>";
            echo "<h2 class='enc1'>" . $row["Descricao"] . "</h2>";
            echo "</div>";
        }
    } else {
        echo "Nenhum profissional encontrado.";
    }

    // Fechar a conexão
    $conn->close();
}
?>
