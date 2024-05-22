<?php
include_once '../assets/bd/sessao.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpHand</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/home_adm.css">
</head>

<body class="bg-white">

  <header>
    <nav class="navbar p-0">
        <button class="logo_maozinha navbar-toggler p-0" type="button" 
        data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
            <img src="../assets/img/logo_preta.png" 
            class="img-fluid float-start rounded d-block" width="100%" alt="">
        </button>

        <button type="menu" class="menu d-flex flex-column align-items-center"
        data-bs-toggle="modal" data-bs-target="#modal_menu">
            <span><ion-icon name="menu-outline"></ion-icon></span>
        </button>
    </nav>

    <form class="search_container" role="search">
        <input class="form-control me-2" type="search" 
        placeholder="Procure um serviço" aria-label="Search">
        <button type="submit">
            <span style="font-size: 1.5rem;"><ion-icon name="search-outline"></ion-icon></span> 
        </button>
    </form> 

      <?php require '../assets/geral/navbarAdmin_mobile.php'; ?>

      <?php require '../assets/geral/navbarAdmin.php'; ?>
  </header>

  <div class="container text-center">
    <div class="d-sm-flex g-3 m-3 p-5 align-items-center justify-content-center">
      <div class="d-sm-flex justify-content-center col-12 col-md-6" style="margin-top: 20px">
        <div class="card shadow-lg bg-body-tertiary rounded" style="width: 18rem; height:22rem">
          <a class="card-body" href="gerenciarUsers.php">
            <img src="../assets/img/encanador 2 (1).png" class="card-img-top" alt="..." style="border:none;">
            Gerenciar Usuários
          </a>
        </div>
      </div>

      <div class=" d-sm-flex justify-content-center col-12 col-md-6" style="margin-top: 20px">
        <div class="card shadow-lg bg-body-tertiary rounded" style="width: 18rem; height:22rem">
          <a class="card-body" href="gerenciarUsers.php">
            <img src="../assets/img/encanador 2 (1).png" class="card-img-top" alt="..." style="border:none;">
            Gerenciar Serviços
          </a>
        </div>
      </div>
    </div>
  </div>

    <?php require '../assets/geral/rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>