
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpHand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/global.css">
  <link rel="stylesheet" href="../assets/css/fazer_pedido.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
include_once '../assets/bd/sessao.php';

$Email = $_SESSION['email'];
$Email1 = $_Post['email'];
$sql = "SELECT Nome, Telefone, Email, CPF, Foto, Genero, ID_Usuario FROM Usuario WHERE Email = '$Email'";
$sql1 = "SELECT Nome, Telefone, Email, CPF, Foto, Genero, ID_Colaborador FROM Colaborador WHERE Email = '$Email1'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ID_Usuario = $row['ID_Usuario'] ?? null;

$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$ID_Colaborador = $row1['ID_Colaborador'] ?? null;

$ID_Endereco = 1;
echo "id".$ID_Usuario;
echo "id".$ID_Colaborador;
?>
<body class="bg-white">
<?php require '../assets/geral/navbar.php';?>
<?php require '../assets/geral/menu.php'; ?>

    <form action="inserir_servico.php" method="POST" class="form_cadastro" >

        <input id="nome" type="hidden" name="fk_Usuario_ID_Usuario" value="<?php echo $ID_Colaborador;; ?>" required>

        <input id="nome" type="hidden" name="fk_Usuario_ID_Usuario" value="<?php echo $ID_Usuario; ?>" required>

        <input id="nome" type="hidden" name="fk_Endereco_ID_Endereco" value="<?php echo $ID_Endereco; ?>" required>

        <label id="label" for="Data_Servico">Data do Serviço:</label>
        <input id="data_nascimento" type="date" name="Data_Servico" id="Data_Servico" required><br>

        <label id="label" for="Avaliacao">Avaliação:</label>
        <input id="nome" type="number" name="Avaliacao" id="Avaliacao"><br>

        <label id="label" for="Valor">Valor:</label>
        <input id="nome" type="number" step="0.01" name="Valor" id="Valor" required><br>

        <label id="label" for="Descricao">Descrição:</label>
        <textarea name="Descricao" id="Descricao"></textarea><br>

        <input type="submit" value="Cadastrar Serviço" id="botao">
    </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

</body>
</html>