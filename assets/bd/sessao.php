<?php
    session_start();
    require 'conectar.php';

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
            $_SESSION['conexao'] = mysqli_error($conn);
            $_SESSION['erro'] = "Erro na consulta: " + $_SESSION['conexao'];
            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
            unset($_SESSION['erro']);
            unset($_SESSION['conexao']);
        }

        $sql = "SELECT Senha FROM Usuario WHERE Email = '$P_email'"; 
        $result = mysqli_query($conn, $sql); 
        
                if (!$result) {
                    $_SESSION['conexao'] = mysqli_error($conn);
                    $_SESSION['erro'] = "Erro na consulta: " + $_SESSION['conexao'];
                    echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                    unset($_SESSION['erro']);
                    unset($_SESSION['conexao']);
                }
                else{
                    if (mysqli_num_rows($result) == 0) { 
                        $sql = "SELECT Senha FROM Colaborador WHERE Email = '$P_email'"; 
                        $result = mysqli_query($conn, $sql); 
                        
                        if (!$result) {
                            $_SESSION['conexao'] = mysqli_error($conn);
                            $_SESSION['erro'] = "Erro na consulta: " + $_SESSION['conexao'];
                            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                            unset($_SESSION['erro']);
                            unset($_SESSION['conexao']);
                        }
                        else{
                            if (mysqli_num_rows($result) == 0) { 
                                $_SESSION['erro'] = "E-mail não encontrado!"; 
                                echo "<div class='alert alert-danger' role='alert' style='position: fixed; top: 0; left: 0; width: 100%;'>$_SESSION[erro]</div>";
                                unset($_SESSION['erro']); 
                                return;
                            }
                            $row = mysqli_fetch_row($result);
                            $senha_do_bd = $row[0];
                            if (password_verify($P_senha, $senha_do_bd)) {
                                $_SESSION['logged'] = True;
                                $_SESSION['email'] = $P_email;
                                setcookie('biscoito', $P_email, time() + 60 * 60 * 24 * 30);
                                $nome_user = "SELECT Nome FROM Colaborador WHERE Email = '$P_email'";
                                $consultaNome = mysqli_query($conn, $nome_user);
                                $colunaNome = mysqli_fetch_row($consultaNome);
                                $_SESSION['nome'] = $colunaNome[0];
                                if (basename($_SERVER['PHP_SELF']) == 'login.php') {
                                    header('Location: autonomo/index.php');
                                    exit;
                                } else {
                                    header('Location: ../autonomo/index.php');
                                    exit;
                                }   
                                
                            } else {
                                $_SESSION['erro'] = "Senha incorreta!";
                                echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                                unset($_SESSION['erro']);
                            }
                        }
                    }
                    $row = mysqli_fetch_row($result);
                    $senha_do_bd = $row[0]; 
                    if (password_verify($P_senha, $senha_do_bd)) {
                        $_SESSION['logged'] = True;
                        $_SESSION['email'] = $P_email;
                        setcookie('biscoito', $P_email, time() + 60 * 60 * 24 * 30);
                        $nome_user = "SELECT Nome FROM usuario WHERE Email = '$P_email'";
                        $consultaNome = mysqli_query($conn, $nome_user);
                        $colunaNome = mysqli_fetch_row($consultaNome);
                        $_SESSION['nome'] = $colunaNome[0];
                        $tipo_user = "SELECT Tipo_User FROM usuario WHERE Email = '$P_email'";
                        $consultaTipo = mysqli_query($conn, $tipo_user);
                        if (!$consultaTipo) {
                            $_SESSION['conexao'] = mysqli_error($conn);
                            $_SESSION['erro'] = "Erro na consulta: " + $_SESSION['conexao'];
                            echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                            unset($_SESSION['erro']);
                            unset($_SESSION['conexao']);
                        }
                        else{
                            if (mysqli_num_rows($consultaTipo) == 0) {
                                $_SESSION['erro'] = "E-mail não encontrado!"; 
                                echo "<div class='alert alert-danger' role='alert' style='position: fixed; top: 0; left: 0; width: 100%;'>$_SESSION[erro]</div>";
                                unset($_SESSION['erro']); 
                                return; 
                            }
                            else{
                                $colunaTipo = mysqli_fetch_row($consultaTipo);
                                $tipo_usuario = $colunaTipo[0];
                                if ($tipo_usuario == 'Administrador') {
                                    if (basename($_SERVER['PHP_SELF']) == 'login.php') {
                                        header('Location: administrador/indexAdmin.php');
                                        exit;
                                    } else {
                                        header('Location: ../administrador/indexAdmin.php');
                                        exit;
                                    }
                                } else {
                                    if (basename($_SERVER['PHP_SELF']) == 'login.php') {
                                        header('Location: usuario/home.php');
                                        exit;
                                    } else {
                                        header('Location: ../usuario/home.php');
                                        exit;
                                    }
                                }
                            }     
                        } 
                    } else {
                        $_SESSION['erro'] = "Senha incorreta!";
                        echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                        unset($_SESSION['erro']);
                    }
                }
        mysqli_close($conn);
    }
?>