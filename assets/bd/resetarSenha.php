<?php
session_start();

require 'conectar.php';

function verificarUsuario($P_email, $P_senha, $P_senha_confirmacao)
{
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "HelpHand";

    $conn = new mysqli($servername, $username, $password, $database);

    $email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    $sql = "SELECT Senha FROM usuario WHERE Email = '$P_email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $_SESSION['conexao'] = mysqli_error($conn);
        $_SESSION['erro'] = "Erro na consulta: " + $_SESSION['conexao'];
        echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
        unset($_SESSION['erro']);
        unset($_SESSION['conexao']);
    } else {
        if (mysqli_num_rows($result) == 0) {
            $_SESSION['erro'] = "E-mail não encontrado!";
            echo "<div class='alert alert-danger' role='alert' style='position: fixed; top: 0; left: 0; width: 100%;'>$_SESSION[erro]</div>";
            unset($_SESSION['erro']);
            return;
        } else {
            if ($_POST['senha'] !== $_POST['senha_confirmacao']) {
                $_SESSION['erro'] = "As senhas não coincidem";
                echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                unset($_SESSION['erro']);
            } else {
                $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

                $sql = "UPDATE usuario SET Senha = '$senhaCriptografada' WHERE Email = '$P_email'";

                if ($result = mysqli_query($conn, $sql)) {
                    echo "Senha alterada com sucesso!";
                    $conn->close();
                    header('Location: login.php');
                } else {
                    echo "Erro ao inserir registro: " . $conn->error;
                }
            }
        }
    }
}
