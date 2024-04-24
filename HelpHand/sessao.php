<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "PUC@1234";
    $database = "HelpHand";
    global $servername, $username, $password, $database;

    $P_email = $_POST['email'] ?? NULL;
    $P_senha = $_POST['senha'] ?? NULL;

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $P_email = $_POST['email'] ?? NULL;
        $P_senha = $_POST['senha'] ?? NULL;
        verificarCredenciais($P_email, $P_senha);
    }

    function verificarCredenciais($P_email, $P_senha) {
        global $servername, $username, $password, $database;
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
        }

        $sql = "SELECT Senha FROM usuario WHERE Email = '$P_email'"; 
        $result = mysqli_query($conn, $sql); 
        
                if (!$result) {
                    die("Erro na consulta: " . mysqli_error($conn));
                }
                else{
                    if (mysqli_num_rows($result) == 0) { 
                        $_SESSION['erro'] = "E-mail não encontrado!"; 
                        echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>"; 
                        unset($_SESSION['erro']); 
                        return; 
                    }
                    $row = mysqli_fetch_row($result);
                    $senha_do_bd = $row[0]; 
                    if (password_verify($P_senha, $senha_do_bd)) {                
                        $logged = True;
                        $_SESSION['logged'] = $logged;
                        $_SESSION['email'] = $_COOKIE['biscoito'];
                        $_SESSION['erro'] = "Conectado com sucesso!";
                        setcookie('biscoito', $P_email, time() + 60 * 60 * 24 * 30);
                        setcookie('tipo', $admin, time() + 60 * 60 * 24 * 30);
                        echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                        unset($_SESSION['erro']);
                        header('Location: ./index.php');
                        exit;
                    } else {
                        $_SESSION['erro'] = "Senha incorreta!";
                        echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                        unset($_SESSION['erro']);
                    }
                }
        mysqli_close($conn);
    }
?>