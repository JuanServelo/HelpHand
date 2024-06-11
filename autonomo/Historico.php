<!DOCTYPE html>
<html>
<head>
    <title>Historico Pedidos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/navbar_.css">
    <link rel="stylesheet" href="../assets/css/Historico.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
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
        <nav class="navbar p-0">
            <button class="logo_maozinha p-0" type="button" 
            data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
                <img src="../assets/img/logo_preta.png" 
                class="img-fluid float-start rounded d-block" width="100%" alt="">
            </button>

            <button type="menu" class="menu d-flex flex-column align-items-center"
            data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
                <span><ion-icon name="menu-outline"></ion-icon></span>
            </button>
            </nav>
    </header>
    <h1 class="text-center mt-4">Historico</h1>
    <div class='container'>
        <?php
        include_once '../assets/bd/sessao.php';
        include_once '../assets/bd/conectar.php';
        include_once '../assets/geral/navbar_.php';

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
