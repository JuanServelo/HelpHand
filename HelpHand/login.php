<?php
include_once 'assets/bd/sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Help Hand</title>
</head>

<body class="container-fluid d-flex p-0 m-0 min-vh-100">
    <div class="logo">
        <ul class="d-flex  ">
            <li><a href="usuario/index.php" class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Home</a></li>
            <li><a href="usuario/FAQ.php"class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Fale Conosco</a></li>
            <li><a href="cadastro.php"class="link-light link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Cadastre-se</a></li>
        </ul>
        <div class="img__container">
            <a href="#">
                <img src="assets/img/logo_branca.png" alt="" >
            </a>
        </div>
    </div>
    <main class="d-flex justify-content-center align-items-center">

        <form action="" method="POST" class="d-flex gap-4 flex-column w-75">
            <h2 class="text-center fw-bold pe-none">Login</h2>
            <?php
                if (isset($_SESSION['erro'])) {
                    echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";   
                    unset($_SESSION['erro']);                 
                }?>
            <div class="input">
                <ion-icon name="mail-outline"></ion-icon>
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" required class="seletor_text" 
                    placeholder="Digite seu email">
            </div>

            <div class="input">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" required class="seletor_text" 
                    placeholder="Digite sua senha"
                    >
            </div>

            <a href="resetSenha.php" class="text-center link-offset-2">Esqueceu a senha?</a>

            <input type="submit" class="btn btn-outline w-50"></input>
        </form>

    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>