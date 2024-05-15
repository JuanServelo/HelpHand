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

<body class="container-fluid d-flex p-0 m-0 min-vh-100 justify-content-center align-items-center">
    <form action="" method="POST" class="form_reset">
        <h2 class="text-center fw-bold pe-none">ESQUECEU A SENHA?</h2>
        <?php
        include_once 'assets/bd/resetarSenha.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $P_email = $_POST['email'] ?? NULL;
            $P_senha_confirmacao = $_POST['senha_confirmacao'] ?? NULL;
            $P_senha = $_POST['senha'] ?? NULL;
            verificarUsuario($P_email, $P_senha, $P_senha_confirmacao);
        }
        if (isset($_SESSION['erro'])) {
            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
            unset($_SESSION['erro']);
        }
        ?>
        <div class="input">
            <ion-icon name="mail-outline"></ion-icon>
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required class="seletor_text"
            placeholder="Digite seu e-mail">
        </div>

        <div class="input">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <label id="label">Senha</label>
            <input type="password" id="senha" name="senha" required class="form-control mb-3" 
            placeholder="Digite sua senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$" title="A senha deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula, um número e um caractere especial">
        </div>

        <div class="input">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <label id="label">Confirme sua senha</label>
            <input type="password" id="senha_confirmacao" name="senha_confirmacao" 
            required class="form-control mb-3" placeholder="Confirme sua senha" title="Confirme sua senha">
        </div>

        <input type="submit" value="Confirmar" id="botao">
    </form>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>