<?php
require 'conectar.php';

function cadastrar($P_ID_Colaborador, $P_ID_Usuario, $P_ID_Endereco) {
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "HelpHand";

    $conn = new mysqli($servername, $username, $password, $database);

        $fk_Colaborador_ID_Colaborador = $P_ID_Colaborador;
        $fk_Usuario_ID_Usuario = $P_ID_Usuario;
        $fk_Endereco_ID_Endereco = $P_ID_Endereco;
        $Data_Servico = isset($_POST['Data_Servico']) ? $_POST['Data_Servico'] : '';
        $Status_Servico = 'Analise';
        $Avaliacao = $_POST['Avaliacao'] ?? '';
        $Valor = $_POST['Valor'] ?? '';
        $Descricao = $_POST['Descricao'] ?? '';

        $sql = "INSERT INTO Servico (fk_Colaborador_ID_Colaborador, fk_Usuario_ID_Usuario, fk_Endereco_ID_Endereco, Data_Servico, Status_Servico, Avaliacao, Valor, Descricao) 
        VALUES ('$fk_Colaborador_ID_Colaborador', '$fk_Usuario_ID_Usuario', '$fk_Endereco_ID_Endereco', '$Data_Servico', '$Status_Servico', '$Avaliacao', '$Valor', '$Descricao')";

            if ($conn->query($sql) === TRUE) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro ao inserir registro: " . $conn->error;
            }
            $conn->close();
    
}
