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
  echo "<p class='w3-small' > ";
  echo "Acesso em: ";
  echo $data;
  echo "</p> "
    ?>
  <div class="container">
    <h2>Atualização de Usuario</h2>
  </div>
  <?php


  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
  }

  $id = $_POST['Id'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $telefone = $_POST['telefone'];
  $tipo_user = $_POST['tipo_user'];

  $sql = "SELECT Senha FROM Usuario WHERE ID_Usuario = $id;";
  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      if ($senha != $row['Senha']) {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
      }
    }
  }

  mysqli_query($conn, "SET NAMES 'utf8'");
  mysqli_query($conn, 'SET character_set_connection=utf8');
  mysqli_query($conn, 'SET character_set_client=utf8');
  mysqli_query($conn, 'SET character_set_results=utf8');
  ?>

  <?php
  $sql = "UPDATE Usuario SET Email = '$email', Senha = '$senha', Telefone = '$telefone', Tipo_User = '$tipo_user' WHERE ID_Usuario = $id";

  echo "<div class='card'>";
  if ($result = mysqli_query($conn, $sql)) {
    echo "<p>&nbsp;Registro alterado com sucesso! </p>";
  } else {
    echo "<p>&nbsp;Erro executando UPDATE: " . mysqli_error($conn) . "</p>";
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