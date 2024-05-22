<nav class="navbar fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler align-items-center bg-fff" type="button" style="border-style: hidden; width:50vw"
        data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
        aria-label="Toggle navigation">
        <img src="../assets/img/logo_preta.png" class="img-fluid float-start rounded mx-auto d-block " width="15%" alt="">
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
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="FAQ.php">FAQ</a>
            </li>
          </ul>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../assets/img/user 1.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong style="color: black;"><?php echo $_SESSION['nome'] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Conta</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../assets/bd/sairusuario.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>