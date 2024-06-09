<?php
include_once '../assets/bd/sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" href="../assets/css/navbar_.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>Home</title>
</head>
<style>
    .container__carrossel {
        height: 100%;
        background: var(--cor-principal);
        border-radius: 20px;
        margin: 0% 5%;
    }
    
    .row {
        height: 42vh;
        padding: 4% 2%;
    }
    
    .col-md-12 {
        height: 100%;
    }
    
    .featured-carousel {
        height: 100%;
    }

    .blog-entry {
        height: 29vh;
        display: flex;
        width: 100%;
        justify-content: center;
    }

    .card {
        height: 100%;
    } 
</style>

<body>
    <header>
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

        <form class="search_container" role="search" action="pesquisa.php" method="post">
            <input class="form-control me-2" type="search" name="pesquisa" placeholder="Procure um serviço" aria-label="Search">
            <button type="submit">
                <span style="font-size: 1.5rem;"><ion-icon name="search-outline"></ion-icon></span> 
            </button>
        </form>
    </header>
        <?php require '../assets/geral/menu.php'; ?>
        <?php require '../assets/geral/navbar_.php'; ?>

    <main>
        <div class="texto d-flex flex-column p-0">
            <h1>Bem-vindo,</h1>
            <h2>Ache aqui a <img src="../assets/img/maozinha 1.png" alt="mãozinha" class="maozinha"> 
            para os seus problemas!</h2>
        </div>

        <section class="ftco-section">
            <div class="container__carrossel">
                <div class="row" style="padding: 3% 2%">
                    <div class="col-md-12">
                        <div class="featured-carousel owl-carousel">
                            
                            <div class="item">
                                <div class="blog-entry d-flex flex-column align-items-center">
                                    <a href="#" class="card" style="width:100%">
                                        <img src="..\assets\img\encanador 3.png" class="img__card m-auto" style="width:35%">    
                                        <h3 class="text-center">Jardineiro</h3>
                                        <button class="btn">Ver Mais</button>
                                    </a>
                                </div>
                            </div>

                            <div class="item" >
                                <div class="blog-entry d-flex flex-column align-items-center">
                                    <a href="#" class="card" style="width:100%">
                                        <img src="..\assets\img\encanador 3.png" class="img__card m-auto" style="width:35%">    
                                        <h3 class="text-center">Jardineiro</h3>
                                        <button class="btn">Ver Mais</button>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry d-flex flex-column align-items-center">
                                    <a href="#" class="card" style="width:100%">
                                        <img src="..\assets\img\encanador 3.png" class="img__card m-auto" style="width:35%">    
                                        <h3 class="text-center">Jardineiro</h3>
                                        <button class="btn">Ver Mais</button>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry d-flex flex-column align-items-center">
                                    <a href="#" class="card" style="width:100%">
                                        <img src="..\assets\img\encanador 3.png" class="img__card m-auto" style="width:35%">    
                                        <h3 class="text-center">Jardineiro</h3>
                                        <button class="btn">Ver Mais</button>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry d-flex flex-column align-items-center">
                                    <a href="#" class="card" style="width:100%">
                                        <img src="..\assets\img\encanador 3.png" class="img__card m-auto" style="width:35%">    
                                        <h3 class="text-center">Jardineiro</h3>
                                        <button class="btn">Ver Mais</button>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry d-flex flex-column align-items-center">
                                    <a href="#" class="card" style="width:100%">
                                        <img src="..\assets\img\encanador 3.png" class="img__card m-auto" style="width:35%">    
                                        <h3 class="text-center">Jardineiro</h3>
                                        <button class="btn">Ver Mais</button>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry d-flex flex-column align-items-center">
                                    <a href="#" class="card" style="width:100%">
                                        <img src="..\assets\img\encanador 3.png" class="img__card m-auto" style="width:35%">    
                                        <h3 class="text-center">Jardineiro</h3>
                                        <button class="btn">Ver Mais</button>
                                    </a>
                                </div>
                            </div>

                            <div class="item">
                                <div class="blog-entry d-flex flex-column align-items-center">
                                    <a href="#" class="card" style="width:100%">
                                        <img src="..\assets\img\encanador 3.png" class="img__card m-auto" style="width:35%">    
                                        <h3 class="text-center">Jardineiro</h3>
                                        <button class="btn">Ver Mais</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>    
    
    <?php require '../assets/geral/rodape.php'; ?>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
          $(".owl-carousel").owlCarousel();
          
        });
        (function($) {
        var fullHeight = function() {
                               
        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function(){
            $('.js-fullheight').css('height', $(window).height());
        });
    
        };
        fullHeight();
        
        var carousel = function() {
            $('.featured-carousel').owlCarousel({
            loop:true,
            autoplay: false,
            margin:30,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            nav:true,
            dots: true,
            autoplayHoverPause: false,
            items: 1,
            navText : ["<span class='ion-ios-arrow-back'></span>","<span class='ion-ios-arrow-forward'></span>"],
            responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
            }
            });
        
        };
        carousel();
        
        })(jQuery);   
    </script>
</body>

</html>