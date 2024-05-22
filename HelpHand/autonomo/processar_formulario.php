<?php
session_start();

// Conexão com o banco de dados
include 'db_connect.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o botão "Salvar" foi clicado
    if (isset($_POST['salvar'])) {
        // Recebe os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha']; // Lembre-se de criptografar a senha antes de salvar no banco de dados
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $funcoes = $_POST['funcoes'];

        // Verifica se o arquivo de imagem está sendo enviado corretamente
        if(isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            // Nome temporário do arquivo
            $tmp_name = $_FILES['foto']['tmp_name'];

            // Ler o conteúdo do arquivo
            $foto = file_get_contents($tmp_name);
        } else {
            // Defina uma imagem padrão se nenhuma imagem for enviada
            $foto = file_get_contents("default-avatar.png");
        }

        // Supondo que você tenha o ID do usuário na sessão
        $userId = $_SESSION['user_id'];

        // Atualiza os dados no banco de dados
        $sql = "UPDATE Usuario SET Nome=?, Email=?, Senha=?, CEP=?, Endereco=?, Funcoes=?, Foto=? WHERE ID_Usuario=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $nome, $email, $senha, $cep, $endereco, $funcoes, $foto, $userId);

        if ($stmt->execute()) {
            echo "Dados atualizados com sucesso.";
        } else {
            echo "Erro ao atualizar os dados: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
