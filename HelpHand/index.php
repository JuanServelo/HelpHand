<?php
session_start();
include_once 'sessao.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpHand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      font-family: "Inter", sans-serif;
      font-variation-settings: "slnt" 0;
      font-optical-sizing: auto;
    }

    body {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
    }

    .corfundo {
      --bs-text-opacity: 1;
      color: rgba(var(#304B47), var(--bs-text-opacity)) !important;
    }
  </style>
</head>

<body class="bg-white">
  <nav class="navbar fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler align-items-center bg-fff" type="button" style="border-style: hidden; width:50vw" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <img src="assets/img/logo_preta.png" class="img-fluid float-start rounded mx-auto d-block " width="15%" alt="">
        <h1 class="text-white">HelpHand</h1></img>
      </button>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> 
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">HelpHand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Conta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="FAQ.html">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./sairusuario.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container text-center">
    <div class="row g-3 m-5 p-5 align-items-center">
      <div class="col-12 col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="assets/img/maozinha.png" class="card-img-top bg-warning" alt="...">
          <div class="card-body">
          <h1></h1>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="assets/img/maozinha.png" class="card-img-top bg-warning" alt="...">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="assets/img/maozinha.png" class="card-img-top bg-warning" alt="...">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="assets/img/maozinha.png" class="card-img-top bg-warning" alt="...">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>