<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Cadastrar.css">
    <title>HelpHand</title>
</head>
<body>
    <div class="container" id="site">
        <div class="row" id="row">
            <div class="col-lg-6">
                <div class="cadastro">
                    <h1 class="titulo_cad">Cadastrar</h1>
                    <form action="Cadastrar.php" method="post" class="form_cadastro">
                        <label id="label">Nome</label>
                        <input type="text" id="nome" name="nome" required class="form-control mb-3" placeholder="Digite seu nome de usuário">
                        <label id="label">Email</label>
                        <input type="text" id="Email" name="Email" required class="form-control mb-3" placeholder="Digite seu Email">
                        <label id="label">Data De Nascimento</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" required class="form-control mb-3" placeholder="Digite sua data de nascimento">
                        <label id="label">Gênero</label>
                        <select id="genero" name="genero" required class="form-control mb-3">
                            <option value="" disabled selected>Selecione seu gênero</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Helicóptero de combate">Helicóptero de combate</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <label id="label">CEP</label>
                        <input type="text" id="cep" name="cep" required class="form-control mb-3" placeholder="Digite seu cep" pattern="\d{5}-\d{3}" title="Digite um CEP válido no formato XXXXX-XXX">
                        <label id="label">Senha</label>
                        <input type="password" id="senha" name="senha" required class="form-control mb-3" placeholder="Digite sua senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="A senha deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula, um número e um caractere especial">
                        <input type="submit" value="Cadastrar" id="botao">
                    </form>
                </div>
            </div>

            <div class="col-lg-6" id="div_HELP">
                <div class="conj_text">
                    <a href="#" class="text">Home</a>
                    <a href="#" class="text">Fale Conosco</a>
                    <a href="#" class="text">Entrar</a>
                </div>
                <div class="div_image">
                    <h1 class="text_titulo">Help <br>Hand</h1>
                    <img  id="mao_img" src="./img/maozinha.png">
                </div> 
            </div>
        </div>
    </div>
</body>
</html>
<?php