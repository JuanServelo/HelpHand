
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpHand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/global.css">
  <link rel="stylesheet" href="../assets/css/projeto.css">
</head>
<?php
include_once '../assets/bd/sessao.php';

if (isset($_POST['ID_Servico'])) {
    $id = $_POST['ID_Servico'];
} else {
    $id = '1';
}
$sql = "SELECT s.*, u.Nome FROM Servico s
    INNER JOIN Usuario u ON s.fk_Usuario_ID_Usuario = u.ID_Usuario
    WHERE s.fk_Colaborador_ID_Colaborador IN (
        SELECT ID_Colaborador FROM colaborador WHERE s.ID_Servico = '$id')";
$result = mysqli_query($conn, $sql);
?>
<body class="bg-white">
<?php

    require '../assets/geral/navbar.php';
 ?>
<?php require '../assets/geral/menu.php'; ?>
<a href="Historico.php"><img src='../assets/img/seta-esquerda.png' class='img-seta'></a>
    <div class="conteiner">
    
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    Echo "<div class='item'>";
                    echo "            <img src='../assets/img/user 1.png' class='img'>";
                    echo "            <a>" . $row['Avaliacao'] . " ★</a>";
                    echo "            <div class='ml-3'>";
                    echo "            <h4 class='NOME'>" . $row['Nome'] . "</h4>";
                    echo "            <a>" . $row['Descricao'] . "</a><br>";
                    echo "            <a>Total: " . $row['Valor'] . "</a>";
                    Echo "</div>";
                }
                ?>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

</body>
</html>