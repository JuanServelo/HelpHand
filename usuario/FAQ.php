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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link rel="stylesheet" href="../assets/css/navbar_.css">
  <link rel="stylesheet" href="../assets/css/FAQ.css">
</head>
<style>
  @media (max-width: 999px) {
    .navbar .menu {
      margin: 0;
    }
  }
</style>

<body>
  <header class="d-flex flex-column  text-white">
    <nav class="navbar p-0">
      <button class="logo_maozinha p-0" type="button" 
      data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
          <img src="../assets/img/logo_branca.png" 
          class="img-fluid float-start rounded d-block" width="100%" alt="">
      </button>

      <button type="menu" class="menu d-flex flex-column align-items-center"
      data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
          <span><i class="fa-solid fa-bars" style="color: #ffffff;"></i></span>
      </button>
    </nav>
    <h1 class="text-center m-3">Perguntas Frequentes</h1>
    <p class="text-center">Aqui você encontrará as respostas para suas possíveis dúvidas sobre o HelpHand.</p>
  </header>
    
  <?php require '../assets/geral/navbar_.php'; ?>

  <main class="card shadow bg-body-tertiary rounded-4" style="width: 18rem">
    <ul class="list-group list-group-flush">
      <li class="list-group-item" style="height: 8vh"><a class="d-flex align-items-center justify-content-start" href="#">lorem</a></li>
      <li class="list-group-item" style="height: 8vh"><a class="d-flex align-items-center justify-content-start" href="#">lorem</a></li>
      <li class="list-group-item" style="height: 8vh"><a class="d-flex align-items-center justify-content-start" href="#">lorem</a></li>
      <li class="list-group-item" style="height: 8vh"><a class="d-flex align-items-center justify-content-start" href="#">lorem</a></li>
    </ul>
    </main>
    <div>
      <p class="m-3">
        <span class="fs-5"><ion-icon name="help-circle-outline"></ion-icon></span> 
        Continua com dúvidas? Envie sua pergunta para a <a href="#">central de ajuda.</a> 
      </p>

    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>