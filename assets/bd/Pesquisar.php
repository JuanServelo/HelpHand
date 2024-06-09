<?php
require 'conectar.php';

function pesquisar() {
    $pesquisa = $_POST['pesquisa'];
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "HelpHand";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Adicionar wildcards para a pesquisa LIKE
    $pesquisa = "%" . $pesquisa . "%";

    // Lista das colunas nas quais você deseja realizar a pesquisa
    $columns = ['Nome', 'teste', 'Email', 'Senha', 'Telefone', 'Descricao'];

    // Construir a consulta dinamicamente
    $sql = "SELECT * FROM `Colaborador` WHERE ";
    $conditions = [];

    foreach ($columns as $column) {
        $conditions[] = "`$column` LIKE ?";
    }

    $sql .= implode(" OR ", $conditions);

    // Preparar e executar a consulta
    $stmt = $conn->prepare($sql);

    // Vincular os parâmetros
    $types = str_repeat("s", count($columns)); // s para cada parâmetro de string
    $params = array_fill(0, count($columns), $pesquisa);

    $stmt->bind_param($types, ...$params);

    // Executar a consulta
    $stmt->execute();

    // Obter os resultados
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "<div class='resultado' style='margin-top:10vw'>";
            echo 'Nome: ' . $row['Nome'] . '<br>';
            echo 'CPF: ' . $row['CPF'] . '<br>';
            echo "<form method='post' action='fazer_pedido.php'>";
            echo "    <input type='hidden' name='Email' value='" . $row['Email'] . "'>";
            echo "    <button type='submit' class='bot' formaction='fazer_pedido.php'>Pedir Serviços</button>";
            echo "</form>";
            echo '<br>';
            echo '</div>';
        }
    } else {
        echo 'Nenhum resultado encontrado.';
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
