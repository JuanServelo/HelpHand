<?php
include_once '../assets/bd/sessao.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HelpHand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/global.css">
</head>

<body class="bg-white">
  <?php
  require '../assets/geral/menu.php';
  require '../assets/geral/navbarAdmin.php';

  mysqli_query($conn, "SET NAMES 'utf8'");
  mysqli_query($conn, 'SET character_set_connection=utf8');
  mysqli_query($conn, 'SET character_set_client=utf8');
  mysqli_query($conn, 'SET character_set_results=utf8');

  date_default_timezone_set("America/Sao_Paulo");
  $data = date("d/m/Y H:i:s", time());
  echo "<p class='w3-small' > ";
  echo "Acesso em: ";
  echo $data;
  echo "</p> ";

  $id=$_GET['id'];
	
  $sql = "SELECT ID_Usuario, Nome, Email, CPF, Data_nasc, Tipo_User FROM Usuario WHERE ID_Usuario = $id;";

  echo "<div class='d-flex justify-content-center align-items-center'>";  
   if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $dataN = explode('-', $row["Data_nasc"]);
      $ano = $dataN[0];
      $mes = $dataN[1];
      $dia = $dataN[2];
      $nova_data = $dia . '/' . $mes . '/' . $ano;
?>
      <div class="container">
        <h2>Exclusão do Usuario ID = [<?php echo $row['ID_Usuario']; ?>]</h2>
      </div>
      <form class="container" action="deleteUser_exe.php" method="post" onsubmit="return check(this.form)">
        <input type="hidden" id="Id" name="Id" value="<?php echo $row['ID_Usuario']; ?>">
        <p>
        <label class="text-start"><b>Nome: </b> <?php echo $row['Nome']; ?> </label></p>
        <p>
        <label class="text-start"><b>Email: </b><?php echo $row['Email']; ?></label></p>
        <p>
        <label class="text-start"><b>CPF: </b><?php echo $row['CPF']; ?></label></p>
        <p>
        <label class="text-start"><b>Data de Nascimento: </b><?php echo $nova_data; ?></label></p>
        <p>
        <label class="text-start"><b>Tipo usuario: </b><?php echo $row['Tipo_User']; ?></label></p>
        <p>
        <input type="submit" value="Confirma exclusão?" class="button" >
        <input type="button" value="Cancelar" class="button" onclick="window.location.href='gerenciarUsers.php'"></p>
      </form>
<?php 
    }else{?>
      <div class="container">
      <h2>Tentativa de exclusão de Usuario inexistente</h2>
      </div>
      <br>
    <?php }
  }else {
    echo "<p style='text-align:center'>Erro executando DELETE: " . mysqli_error($conn) . "</p>";
  }
  echo "</div>"; //Fim form
  mysqli_close($conn);  //Encerra conexao com o BD

?>

  <?php require '../assets/geral/rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>