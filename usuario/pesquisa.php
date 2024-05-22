<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HelpHand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/global.css">
</head>

<body class="bg-white">
    
<form method="POST" action="" style="margin-top:8vw;">
                <input type="text" name="pesquisa" placeholder="Digite o nome do colaborador">
                <button type="submit">Pesquisar</button>
        </form>
<?php require '../assets/geral/navbar.php'; ?>

<?php
include_once '../assets/bd/sessao.php';
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém o valor do campo de pesquisa
        $pesquisa = $_POST['pesquisa'];
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
                die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
        }
        // Conecta ao banco de dados

        // Verifica se houve algum erro na conexão

        // Prepara a consulta SQL
        $sql = "SELECT * FROM `Colaborador` WHERE `Email` LIKE '%$pesquisa%'";

        // Executa a consulta SQL
        $resultado = $conn->query($sql);

        // Verifica se houve algum erro na consulta
        if (!$resultado) {
                die('Erro na consulta: ' . $conn->error);
        }

        // Verifica se foram encontrados resultados
        if ($resultado->num_rows > 0) {
                // Exibe os resultados
                while ($row = $resultado->fetch_assoc()) {
                        echo "<div class='resultado' style='margin-top:10vw'>" ;
                        echo 'Nome: ' . $row['Nome'] . '<br>';
                        echo 'CPF: ' . $row['CPF'] . '<br>';
                        echo "<form method='post' action='fazer_pedido.php'>";
                        echo "    <input type='hidden' name='Email' value='" . $row['Email'] . "'>";
                        echo "    <button type='submit' class='bot' formaction='fazer_pedido.php'>Detalhes</button>";
                        echo "</form>";
                        echo '<br>';
                        echo '<div>' ;
                }
        } else {
                echo 'Nenhum resultado encontrado.';
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
}
?>

</body>
</html>