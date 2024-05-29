<?php
require 'conectar.php';
function pesquisar() {
        $pesquisa = $_POST['pesquisa'];
        $servername = "localhost:3306";
        $username = "root";
        $password = "PUC@1234";
        $database = "HelpHand";

        $conn = new mysqli($servername, $username, $password, $database);
        if (!$conn) {
                die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM `Colaborador` WHERE `Email` LIKE '%$pesquisa%'";
        $resultado = $conn->query($sql);
        if (!$resultado) {
                die('Erro na consulta: ' . $conn->error);
        }
        if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                        echo "<div class='resultado' style='margin-top:10vw'>" ;
                        echo 'Nome: ' . $row['Nome'] . '<br>';
                        echo 'CPF: ' . $row['CPF'] . '<br>';
                        echo "<form method='post' action='fazer_pedido.php'>";
                        echo "    <input type='hidden' name='Email' value='" . $row['Email'] . "'>";
                        echo "    <button type='submit' class='bot' formaction='fazer_pedido.php'>Pedir Serviços</button>";
                        echo "</form>";
                        echo '<br>';
                        echo '<div>' ;
                }
        } else {
                echo 'Nenhum resultado encontrado.';
        }
        $conn->close();
}
?>