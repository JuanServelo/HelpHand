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
  <link rel="stylesheet" href="../assets/css/global.css">
</head>

<body class="bg-white">
<?php require '../assets/geral/navbar.php'; ?>

  <div class="container text-center mt-2">
    <div class="row g-3 m-5 p-5 align-items-center" style="justify-content: center;">
      <div class="col-12 col-md-6">
            <h1>Equipe: Juan, Eduarda, Eric, Carlos e João</h1>
            <h2>CONTATOS:</h2>
            <p>E-mail: contato@helphand.com</p>
            <p>Telefone: 99 9999-9999</p>
      </div>
    </div>
  </div>

  <?php require '../assets/geral/rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

</body>

</html>