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
</head>
<style>
  .navbar {
        display: flex;
        align-items: center;
    }
    
    .navbar .logo_maozinha {
        width: 15%;
        margin: 2% 0 0% 2%;
        background: none;
        border: none;
    }
</style>

<body class="bg-white">
  <?php
  require '../assets/geral/menu.php';
  require '../assets/geral/navbarAdmin.php';

  date_default_timezone_set("America/Sao_Paulo");
  $data = date("d/m/Y H:i:s", time());
    ?>
    <header class="d-flex ">
      <nav class="navbar p-0">
        <a class="logo_maozinha p-0" type="button" href='..\cadastro.php'>
          <img src="../assets/img/logo_preta.png" 
          class="img-fluid float-start rounded d-block" width="100%" alt="">
        </a>
      </nav>
    </header>

  <div class="text-center">
    <h1>Exclusão de Usuario</h1>
    <p class='text-center mb-5'>Último acesso em: <?php echo $data; ?></p>
  </div>

  <?php

  $conn = mysqli_connect($servername, $username, $password, $database);

  $id = $_POST['Id'];

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "DELETE FROM Usuario WHERE ID_Usuario = $id";

  echo "<div class='text-center'>";
  if ($result = mysqli_query($conn, $sql)) {
    echo "<p class='text-center fs-3'>&nbsp;Usuário excluído com sucesso! </p>";
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