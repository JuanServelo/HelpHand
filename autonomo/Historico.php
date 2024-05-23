<!DOCTYPE html>
<html>
<head>
    <title>Historico Pedidos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Historico.css">
</head>
<?php
include_once '../assets/bd/sessao.php';
?>
<body>
<style>
            .bot{
            width: 8vw;
            height: 2vw;
            background-color: #304B47;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 1vw;
            margin-left: 2vw;
        }
</style>
<div class="container-fluid">
    <header>
        <a href="index.php"><img src="../assets/img/logo_preta.png" class="img_logo"></a>
        <div class="titulo"><h1 class="texto_titulo">Historico</h1></div>
    </header>
    <div class='container'>
        <?php
        include_once '../assets/bd/sessao.php';
        include_once '../assets/bd/conectar.php';

        $email = $_SESSION['email'];
        $sql = "SELECT s.*, u.Nome FROM Servico s
                INNER JOIN Usuario u ON s.fk_Usuario_ID_Usuario = u.ID_Usuario
                WHERE s.fk_Colaborador_ID_Colaborador IN (
                    SELECT ID_Colaborador FROM colaborador WHERE email = '$email'
                )";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all results into an array
            foreach ($rows as $index => $row) {
                echo "<div class='item'>";
                echo "   <div class='data'>";
                echo "       <h3>" . $row['Data_Servico'] . "</h3>";
                echo "   </div>";
                echo "    <div class='acompanhamento'>";
                
                // Check if current item is the last one
                if ($index === count($rows) - 1) {
                    echo "        <div class='green-ball' style='margin-left: 1.4vw;'></div>";
                    echo "        <div class='green-line' style='display: none;'></div>";
                } else {
                    echo "        <div class='green-ball'></div>";
                    echo "        <div class='green-line'></div>";
                }
                echo "    </div>";
                echo "    <div class='card'>";
                echo "        <div class='card_perfil'>";
                echo "            <img src='../assets/img/user 1.png' class='img'>";
                echo "            <a>" . $row['Avaliacao'] . " ★</a>";
                echo "        </div>";
                echo "        <div class='ml-3'>";
                echo "            <h4 class='NOME'>" . $row['Nome'] . "</h4>";
                echo "            <a>" . $row['Descricao'] . "</a><br>";
                echo "            <a>Total: " . $row['Valor'] . "</a>";
                echo "        </div>";
                echo "        <form method='post' action='detalhes_servico.php'>";
                echo "            <input type='hidden' name='ID_Servico' value='" . $row['ID_Servico'] . "'>";
                echo "            <button type='submit' class='bot' formaction='projeto.php'>Detalhes</button>";
                echo "        </form>";
                echo "    </div>";
                echo "</div>";
            }
        } else {
            echo "<center>No results found for " . $email . "</center>";
        }

        mysqli_close($conn);
        ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
