<?php
include_once '../assets/bd/sessao.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Home</title>
</head>
<body>
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

        <!-- modal do mobile -->
        <?php require '../assets/geral/navbar_mobile.php'; ?>

        <!-- modal do desktop -->
        <?php require '../assets/geral/navbar_desktop.php'; ?>
    </header>

    <main>
        <div class="texto d-flex flex-column p-0">
            <h1>Bem-vindo,</h1>
            <h2>Ache aqui a <img src="../assets/img/maozinha 1.png" alt="mãozinha" class="maozinha"> 
                para os seus problemas!</h2>
        </div>

        <div class="container pt-5">
            <div class="carousel slide" id="ads"> <!--data-bs-ride="carousel" para rolagem automática-->

                <div class="carousel-indicators">
                    <button type="button" aria-current="true" data-bs-target="#ads" data-bs-slide-to="0" class="active"></button>
                    <button type="button" aria-label="slide 2" data-bs-target="#ads" data-bs-slide-to="1"></button>
                </div>
            
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="card_column col-md-4">
                                <div class="card_container d-flex justify-content-center align-items-center">
                                    <div class="card_content d-flex flex-column align-items-center">
                                        <img src="../assets/img/encanador 3.png" alt="" class="d-block w-75">
                                        <h5>Eletricista</h5>
                                        <button class="button_info">Ver Mais</button>                                   
                                    </div>
                                </div>
                            </div>

                            <div class="card_column col-md-4">
                                <div class="card_container d-flex justify-content-center align-items-center">
                                    <div class="card_content d-flex flex-column align-items-center">
                                        <img src="../assets/img/encanador 3.png" alt="" class="d-block w-75">
                                        <h5>Jardineiro</h5>
                                        <button class="button_info">Ver Mais</button>                 
                                    </div>
                                </div>
                            </div>

                            <div class="card_column col-md-4">
                                <div class="card_container d-flex justify-content-center align-items-center">
                                    <div class="card_content d-flex flex-column align-items-center">
                                        <img src="../assets/img/encanador 3.png" alt="" class="d-block w-75">
                                        <h5>Mecânico</h5>
                                        <button class="button_info">Ver Mais</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <div class="card_column col-md-4">
                                <div class="card_container d-flex justify-content-center align-items-center">
                                    <div class="card_content d-flex flex-column align-items-center">
                                        <img src="../assets/img/encanador 3.png" alt="" class="d-block w-75">
                                        <h5>Encanador</h5>
                                        <button class="button_info">Ver Mais</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card_column col-md-4">
                                <div class="card_container d-flex justify-content-center align-items-center">
                                    <div class="card_content d-flex flex-column align-items-center">
                                        <img src="../assets/img/encanador 3.png" alt="" class="d-block w-75">
                                        <h5>Eletricista</h5>
                                        <button class="button_info">Ver Mais</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card_column col-md-4">
                                <div class="card_container d-flex justify-content-center align-items-center">
                                    <div class="card_content d-flex flex-column align-items-center">
                                        <img src="../assets/img/encanador 3.png" alt="" class="d-block w-75">
                                        <h5>Eletricista</h5>
                                        <button class="button_info">Ver Mais</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="botoes-carousel">
                    <button class="carousel-control-prev" data-bs-target="#ads" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" data-bs-target="#ads" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

            </div>
        </div>
    </main>    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>