<?php
include_once '../assets/bd/sessao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fk_Colaborador_ID_Colaborador = $_POST['fk_Usuario_ID_Colaborador'];
  $fk_Usuario_ID_Usuario = $_POST['fk_Usuario_ID_Usuario'];
  $fk_Endereco_ID_Endereco = $_POST['fk_Endereco_ID_Endereco'];
  $Data_Servico = $_POST['Data_Servico'] ?? '';
  $Status_Servico = 'Analise'; // Set the initial status as 'Analise'
  $Avaliacao = $_POST['Avaliacao'] ?? '';
  $Valor = $_POST['Valor'] ?? '';
  $Descricao = $_POST['Descricao'] ?? '';

  // Insert the data into the Servico table
  $sql = "INSERT INTO Servico (fk_Colaborador_ID_Colaborador, fk_Usuario_ID_Usuario, fk_Endereco_ID_Endereco, Data_Servico, Status_Servico, Avaliacao, Valor, Descricao) 
    VALUES ('$fk_Colaborador_ID_Colaborador', '$fk_Usuario_ID_Usuario', '$fk_Endereco_ID_Endereco', '$Data_Servico', '$Status_Servico', '$Avaliacao', '$Valor', '$Descricao')";

  if (mysqli_query($conn, $sql)) {
    echo "Serviço cadastrado com sucesso!";
    header('Location: Historico.php');
  } else {
    echo "Erro ao cadastrar o serviço: " . mysqli_error($conn);
  }
}
?>