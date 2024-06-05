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
  <link rel="stylesheet" href="../assets/css/navbar_adm.css">
</head>
<body class="bg-white">

  <header class="d-flex ">
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

  <?php require '../assets/geral/menu.php'; ?>
  <?php require '../assets/geral/navbarAdmin.php'; ?>

  <div class="container text-center">
    <div class="d-sm-flex g-3 m-3 p-5 align-items-center justify-content-center">
      <div class="d-flex justify-content-center col-12 col-md-6" style="margin-top: 20px">
        <div class="card shadow-lg" style="width: 18rem; height:22rem">
          <a class="card-body" href="gerenciarUsers.php" style="text-decoration: none">
            <img src="../assets/img/encanador 2 (1).png" class="card-img-top" alt="..." style="border:none;">
            <p class="fw-semibold">Gerenciar Usuários</p> 
          </a>
        </div>
      </div>

      <div class=" d-flex justify-content-center col-12 col-md-6" style="margin-top: 20px">
        <div class="card shadow-lg bg-body-tertiary rounded" style="width: 18rem; height:22rem">
          <a class="card-body" href="gerenciarUsers.php" style="text-decoration: none">
            <img src="../assets/img/encanador 2 (1).png" class="card-img-top" alt="..." style="border:none;">
            <p class="fw-semibold">Gerenciar Serviços</p> 
          </a>
        </div>
      </div>
    </div>
  </div>

    <?php require '../assets/geral/rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>