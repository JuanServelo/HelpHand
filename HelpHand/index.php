<?php
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
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

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

    .login-container {
      max-width: 400vh;
      padding: 20vh;
      border-radius: 5vh;
      background-color: #fff;
      box-shadow: 0 0 10vh rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="bg-white">
  <?php $overlay_style = (!isset($_COOKIE['biscoito']) || $_COOKIE['biscoito'] == '') ? 'display: flex;' : 'display: none;'; ?>
  <div class="overlay" style="<?php echo $overlay_style; ?>">
      <div class="login-container">
        <h2 class="text-center mb-4">Logue para continuar</h2>
        <form action="" method="POST">
          <?php
          if (isset($_SESSION['erro'])) {
            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
            unset($_SESSION['erro']);
          }?>
          <div class="form-group">
            <input type="email" class="form-control" name="email" required class="seletor_text"
              placeholder="Digite seu email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="senha" required class="seletor_text"
              placeholder="Digite sua senha">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          <a href="#" class="text-center link-offset-2">Esqueceu a senha?</a>
          <a href="cadastro.php"class="text-center link-offset-2">Cadastre-se</a>
        </form>
      </div>
    </div>

  <nav class="navbar fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler align-items-center bg-fff" type="button" style="border-style: hidden; width:50vw"
        data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
        aria-label="Toggle navigation">
        <img src="assets/img/logo_preta.png" class="img-fluid float-start rounded mx-auto d-block " width="15%" alt="">
        <h1 class="text-white"></h1></img>
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
              <a class="nav-link" href="FAQ.php">FAQ</a>
            </li>
          </ul>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="assets/img/user 1.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong style="color: black;">Nome</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Conta</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="sairusuario.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  
  <div class="container text-center mt-2">
    <div class="row g-3 m-5 p-5 align-items-center">
      <div class="col-12 col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="assets/img/encanador 2 (1).png" class="card-img-top bg-warning" alt="...">
          <div class="card-body">
            <h1></h1>
            <p class="card-text">Encanador: indivíduo especializado em consertar encanamentos.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="assets/img/encanador 2 (1).png" class="card-img-top bg-warning" alt="...">
          <div class="card-body">
            <p class="card-text">Encanador: indivíduo especializado em consertar encanamentos.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="assets/img/encanador 2 (1).png" class="card-img-top bg-warning" alt="...">
          <div class="card-body">
            <p class="card-text">Encanador: indivíduo especializado em consertar encanamentos.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card" style="width: 18rem;">
          <img src="assets/img/encanador 2 (1).png" class="card-img-top bg-warning" alt="...">
          <div class="card-body">
            <p class="card-text">Encanador: indivíduo especializado em consertar encanamentos.</p>
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