<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "HelpHand";

// Pega os dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['Email']) ? $_POST['Email'] : '';
$data_de_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : '';
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Prepara a consulta SQL
$sql = "INSERT INTO Usuarios (Nome, Email, Data_De_Nascimento, Genero, CEP, Senha)
VALUES ('$nome', '$email', '$data_de_nascimento', '$genero', '$cep', '$senha')";

// Executa a consulta
if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}
$conn->close();
?>
