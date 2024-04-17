
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Cadastrar.css">
    <title>HelpHand</title>
</head>

<body>
    <div class="container" id="site">
        <div class="row" id="row">
            <div class="col-lg-6">
                <div class="cadastro">
                    <h1 class="titulo_cad">Cadastrar</h1>
                    <form method="post" class="form_cadastro">
                    <?php
                    include_once 'assets/bd/Cadastrar.php';
                    
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $P_senha_confirmacao = $_POST['senha_confirmacao'] ?? NULL;
                        $P_senha = $_POST['senha'] ?? NULL;
                        verificarsenha($P_senha, $P_senha_confirmacao);
                    }
                        if (isset($_SESSION['erro'])) {
                            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";   
                            unset($_SESSION['erro']);                 
                        }
                    ?>
                        <label id="label">Nome</label>
                        <input type="text" id="nome" name="nome" required class="form-control mb-3" placeholder="Digite seu nome de usuário">
                        <label id="label">Email</label>
                        <input type="text" id="Email" name="Email" required class="form-control mb-3" placeholder="Digite seu Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Digite um endereço de email válido">
                        <label id="label">Data De Nascimento</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" required class="form-control mb-3" placeholder="Digite sua data de nascimento">
                        <label id="label">Gênero</label>
                        <select id="genero" name="genero" required class="form-control mb-3">
                            <option value="" disabled selected>Selecione seu gênero</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <label id="label">Senha</label>
                        <input type="password" id="senha" name="senha" required class="form-control mb-3" placeholder="Digite sua senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="A senha deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula, um número e um caractere especial">
                        <label id="label">Confirme sua senha</label>
                        <input type="password" id="senha_confirmacao" name="senha_confirmacao" required class="form-control mb-3" placeholder="Confirme sua senha" title="Confirme sua senha">
                        <input type="submit" value="Cadastrar" id="botao">
                    </form>
                </div>
            </div>

            <div class="col-lg-6" id="div_HELP">
                <div class="conj_text">
                    <a href="./index.php" class="text">Home</a>
                    <a href="#" class="text">Fale Conosco</a>
                    <a href="./login.php" class="text">Entrar</a>
                </div>
                <div class="div_image">
                    <h1 class="text_titulo">Help <br>Hand</h1>
                    <img  id="mao_img" src="assets/img/maozinha.png">
                </div> 
            </div>
        </div>
    </div>
</body>
</html>