<?php
// Dados do banco de dados 
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "helphand";
// Start the session
$logged = False;

$P_email = $_POST['email'] ?? NULL;
$P_senha = $_POST['senha'] ?? NULL;

// Função para verificar o email e senha na tabela usuario do MySQL
function verificarCredenciais($P_email, $P_senha) {
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "helphand";
    global $servername, $username, $password, $database;
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }
    
    // Consulta SQL para verificar as credenciais
    $sql = "SELECT * FROM usuario WHERE Email = '$P_email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if (isset($row['senha']) && password_verify($P_senha, $row['senha'])) {
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
    } else {
        $_SESSION['erro'] = "Email não cadastrado";
    }    

    // Fechar a conexão com o banco de dados
    mysqli_close($conn);
}
?>