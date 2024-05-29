<?php
session_start();

require 'conectar.php';

function verificarsenha($P_senha, $P_senha_confirmacao) {
    $servername = "localhost:3306";
    $username = "root";
    $password = "PUC@1234";
    $database = "HelpHand";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($_POST['senha'] !== $_POST['senha_confirmacao']) {
        $_SESSION['erro'] = "As senhas não coincidem";
        echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
        unset($_SESSION['erro']);
    } else {
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $email = isset($_POST['Email']) ? $_POST['Email'] : '';
        $telefone = isset($_POST['Telefone']) ? $_POST['Telefone'] : '';
        $cpf = isset($_POST['CPF']) ? $_POST['CPF'] : '';
        $data_de_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : '';
        $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
        $teste = isset($_POST['teste']) ? $_POST['teste'] : '';

        $sql_verificar_email = "SELECT * FROM Usuario WHERE Email = '$email'";
        $resultado = $conn->query($sql_verificar_email);

        if ($resultado->num_rows > 0) {
            $_SESSION['erro'] = "Este email já está cadastrado!";
            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
            unset($_SESSION['erro']);
        } else {

            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO Usuario (Nome, Email, Telefone, CPF, teste, Data_nasc, Genero,  Senha)
            VALUES ('$nome', '$email', '$telefone', '$cpf','$teste', '$data_de_nascimento', '$genero', '$senhaCriptografada')";

            if ($conn->query($sql) === TRUE) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro ao inserir registro: " . $conn->error;
            }
            $conn->close();
            header('Location: login.php');
        }
    }
}
