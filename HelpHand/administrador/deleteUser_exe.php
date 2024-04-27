<?php
include_once '../assets/bd/sessao.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpHand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/global.css">
</head>

<body class="bg-white">
  <?php
  require '../assets/geral/menu.php';
  require '../assets/geral/navbarAdmin.php';

  date_default_timezone_set("America/Sao_Paulo");
  $data = date("d/m/Y H:i:s", time());
  echo "<p class='text' > ";
  echo "Acesso em: ";
  echo $data;
  echo "</p> "
    ?>
  <div class="container">
    <h2>Exclusão de Usuario</h2>
  </div>

  <?php

  $conn = mysqli_connect($servername, $username, $password, $database);

  $id = $_POST['Id'];

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "DELETE FROM Usuario WHERE ID_Usuario = $id";

  echo "<div class='card'>";
  if ($result = mysqli_query($conn, $sql)) {
    echo "<p>&nbsp;Registro excluído com sucesso! </p>";
  } else {
    echo "<p>&nbsp;Erro executando DELETE: " . mysqli_error($conn) . "</p>";
  }
  echo "</div>";
  mysqli_close($conn);

  ?>
  </div>
  </div>

  <?php require '../assets/geral/rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>