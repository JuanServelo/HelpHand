<?php
session_start();

require 'conectar.php';

function verificarsenha($P_senha, $P_senha_confirmacao) {
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
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

        $sql_verificar_email = "SELECT * FROM Colaborador WHERE Email = '$email'";
        $resultado = $conn->query($sql_verificar_email);
        $sql_verificar_email_usuario = "SELECT * FROM Usuario WHERE Email = '$email'";
        $resultado_usuario = $conn->query($sql_verificar_email);

        if ($resultado->num_rows > 0) {
            $_SESSION['erro'] = "Este email já está cadastrado!";
            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
            unset($_SESSION['erro']);
        }else if ($resultado_usuario->num_rows > 0) {
            $_SESSION['erro'] = "Este email já está cadastrado!";
            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
            unset($_SESSION['erro']);
        }else {

            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "INSERT INTO Colaborador (Nome, Email, Telefone, CPF, Data_nasc, Genero,  Senha)
            VALUES ('$nome', '$email', '$telefone', '$cpf', '$data_de_nascimento', '$genero', '$senhaCriptografada')";

            if ($conn->query($sql) === TRUE) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro ao inserir registro: " . $conn->error;
            }
            $conn->close();
            header('Location: ../login.php');
        }
    }
}
