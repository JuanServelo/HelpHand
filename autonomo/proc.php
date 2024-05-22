<?php
include 'search_professionals.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="proc.css">
    <title>Procurar</title>
</head>
<body>
    <!------------------------------------------- Navbar --------------------------------------->
    <nav class="navbar fixed-top" style="background-color: #304B47;">
        <div class="container-fluid">
            <button class="navbar-toggler align-items-center" type="button" style="border-style: hidden;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <img src="assets/img/maozinha.png" class="img-fluid float-start rounded mx-auto d-block " width="10%" alt="">
                <h1 class="text-white">HelpHand</h1>
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
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!------------------------------------------- Navbar --------------------------------------->
    <div class="container">
        <div class="col-md-4 col-sm-12 card1">
            <form id="searchForm">
                <input type="text" id="searchInput" placeholder="Buscar por função...">
                <button type="submit">Buscar</button>
            </form>
            <div id="searchResults" class="mt-3">
                <!-- Os resultados da pesquisa serão exibidos aqui -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById('searchForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio do formulário padrão

            // Obter o valor da entrada de pesquisa
            let searchTerm = document.getElementById('searchInput').value;

            // Aqui você deve enviar uma solicitação para o servidor para buscar os profissionais correspondentes
            // Você pode usar AJAX, Fetch API ou qualquer outra técnica para isso

            // Exemplo de resultados fictícios
            let searchResults = [
                { name: 'José Bezerra', occupation: 'Encanador' },
                { name: 'Maria Silva', occupation: 'Eletricista' },
                // Outros resultados...
            ];

            // Limpar os resultados anteriores
            let searchResultsContainer = document.getElementById('searchResults');
            searchResultsContainer.innerHTML = '';

            // Exibir os resultados da pesquisa como cards
            searchResults.forEach(function(result) {
                let card = document.createElement('div');
                card.classList.add('searchResultCard');
                card.innerHTML = `
                    <img class="icon1" src="img\Ellipse 4.png" alt="1">
                    <a href="#" class="b1">${result.name}</a>
                    <h2 class="enc1">${result.occupation}</h2>
                `;
                searchResultsContainer.appendChild(card);
            });
        });
    </script>
</body>
</html>
