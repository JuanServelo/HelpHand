<?php
// Dados do banco de dados 
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "helphand";
// Start the session
session_start();
$logged = False;

$P_email = $_POST['email'] ?? NULL;
$P_senha = $_POST['senha'] ?? NULL;

// Função para verificar o email e senha na tabela usuario do MySQL
function verificarCredenciais($P_email, $P_senha) {

    global $servername, $username, $password, $database;
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }
    
    // Consulta SQL para verificar as credenciais
    $sql = "SELECT * FROM usuario WHERE Email = '$P_email' AND senha = '$P_senha'";
    $sqlemail = "SELECT Email FROM usuario WHERE Email = '$P_email'";
    $result = mysqli_query($conn, $sql);
    $resultemail = mysqli_query($conn, $sqlemail);
        // Verificar se a consulta retornou algum resultado
    if (mysqli_num_rows($resultemail) > 0){
            if (mysqli_num_rows($result) > 0) {
                $logged = True;
                $_SESSION['logged'] = $logged;
                $_SESSION['email'] = $P_email;
                $_SESSION['senha'] = $P_senha;
                setcookie('biscoito', $P_email, time() + 60 * 60 * 24 * 30);
                setcookie('tipo', $admin, time() + 60 * 60 * 24 * 30);
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['erro'] = "Senha Incorreta";
            }
    } else $_SESSION['erro'] = "Email não cadastrado";
    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
}
?>