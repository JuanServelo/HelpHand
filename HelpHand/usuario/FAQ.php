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
  <link rel="stylesheet" href="../assets/css/FAQ.css">
</head>

<body>
  <header class="d-md-flex flex-column justify-content-center align-items-center p-5 text-white">
    <h1 class="text-center m-3">Perguntas Frequentes</h1>
    <p class="text-center">Aqui você encontrará as respostas para suas possíveis dúvidas sobre o HelpHand.</p>
    <?php require '../assets/geral/navbar_mobile.php'; ?>
    <?php require '../assets/geral/navbar_desktop.php'; ?>
  </header>

  <body class="bg-white">
    <div class="card shadow mb-5 bg-body-tertiary rounded-4" style="width: 18rem">
      <ul class="list-group list-group-flush">
        <li class="list-group-item" style="height: 8vh"><a class="d-flex align-items-center justify-content-start"
            href="#">lorem</a></li>
        <li class="list-group-item" style="height: 8vh"><a class="d-flex align-items-center justify-content-start"
            href="#">lorem</a></li>
        <li class="list-group-item" style="height: 8vh"><a class="d-flex align-items-center justify-content-start"
            href="#">lorem</a></li>
        <li class="list-group-item" style="height: 8vh"><a class="d-flex align-items-center justify-content-start"
            href="#">lorem</a></li>
      </ul>
    </div>
    </div>
    </main>


    <footer class="d-sm-flex flex-row justify-content-between align-items-center py-3 my-4 border-top">

      <div class="send_aks d-flex justify-content-start" style="padding-left: 2%; width: 45%">
        <p>
          <span class="fs-5"><ion-icon name="help-circle-outline"></ion-icon></span>
          Continua com dúvidas? Envie sua pergunta para o
          <a href="#">central de ajuda.</a>
        </p>
      </div>

      <div class="copyright d-flex justify-content-center align-items-center" style="width: 30%">
        <span class="mb-3 mb-md-0 text-muted">© 2024 Copyright: HelpHand</span>
      </div>

      <div class="social_media container justify-content-end list-unstyled d-flex w-50" style="padding-right: 3%">
        <section class="mb-4">
          <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!"
            style="background-color: #b3dad4 ; border-radius:50%;" role="button"><i class="fab fa-facebook-f"></i></a>
          <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!"
            style="background-color: #b3dad4 ; border-radius:50%;" role="button"><i class="fab fa-twitter"></i></a>
          <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!"
            style="background-color: #b3dad4 ; border-radius:50%;" role="button"><i class="fab fa-google"></i></a>
          <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!"
            style="background-color: #b3dad4 ; border-radius:50%;" role="button"><i class="fab fa-instagram"></i></a>
          <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!"
            style="background-color: #b3dad4 ; border-radius:50%;" role="button"><i class="fab fa-linkedin-in"></i></a>
          <a data-mdb-ripple-init class="btn btn-outline btn-floating m-1" href="#!"
            style="background-color: #b3dad4 ; border-radius:50%;" role="button"><i class="fab fa-github"></i></a>
        </section>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
      </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  </body>

</html>