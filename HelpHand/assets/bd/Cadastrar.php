<?php
session_start();
// Conexão com o banco de dados
global $servername;
global $username;
global $password;
global $database;
// Dados do banco de dados 
$servername = "localhost:3306";
$username = "root";
$password = "PUC@1234";
$database = "HelpHand";

function verificarsenha($P_senha, $P_senha_confirmacao) {
    $servername = "localhost:3306";
    $username = "root";
    $password = "PUC@1234";
    $database = "HelpHand";
    if ($_POST['senha'] !== $_POST['senha_confirmacao']) {
        $_SESSION['erro'] = "As senhas não coincidem";
        echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
        unset($_SESSION['erro']);
    } else {
        // Pega os dados do formulário
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $email = isset($_POST['Email']) ? $_POST['Email'] : '';
        $telefone = isset($_POST['Telefone']) ? $_POST['Telefone'] : '';
        $cpf = isset($_POST['CPF']) ? $_POST['CPF'] : '';
        $data_de_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : '';
        $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

        // Criptografa a senha
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $database);
        // Prepara a consulta SQL
        $sql = "INSERT INTO Usuario (Nome, Email, Telefone, CPF, Data_nasc, Genero,  Senha)
        VALUES ('$nome', '$email', '$telefone', '$cpf', '$data_de_nascimento', '$genero', '$senhaCriptografada')";

        // Executa a consulta
        if ($conn->query($sql) === TRUE) {
            echo "Registro inserido com sucesso!";
        } else {
            echo "Erro ao inserir registro: " . $conn->error;
        }
        $conn->close();
        header('Location: login.php');
    }
}
