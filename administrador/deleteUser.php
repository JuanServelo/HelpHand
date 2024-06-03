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
  <link rel="stylesheet" href="../assets/css/navbar_adm.css">
  <link rel="stylesheet" href="../assets/css/update_user.css">
</head>

<body class="bg-white">
  <header class="d-flex ">
    <nav class="navbar p-0">
      <button class="logo_maozinha p-0" type="button" data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
        <img src="../assets/img/logo_preta.png" 
        class="img-fluid float-start rounded d-block" width="100%" alt="">
      </button>

      <button type="menu" class="menu d-flex flex-column align-items-center" data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
        <span><ion-icon name="menu-outline"></ion-icon></span>
      </button>
    </nav>
  </header>

  <?php
  require '../assets/geral/menu.php';
  require '../assets/geral/navbarAdmin.php';

  mysqli_query($conn, "SET NAMES 'utf8'");
  mysqli_query($conn, 'SET character_set_connection=utf8');
  mysqli_query($conn, 'SET character_set_client=utf8');
  mysqli_query($conn, 'SET character_set_results=utf8');

  date_default_timezone_set("America/Sao_Paulo");
  $data = date("d/m/Y H:i:s", time());

  $id=$_GET['id'];
	
  $sql = "SELECT ID_Usuario, Nome, Foto, Email, CPF, Data_nasc, Tipo_User FROM Usuario WHERE ID_Usuario = $id;";

  echo "<div>";  
   if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $nome = $row['Nome'];
      $dataN = explode('-', $row["Data_nasc"]);
      $ano = $dataN[0];
      $mes = $dataN[1];
      $dia = $dataN[2];
      $nova_data = $dia . '/' . $mes . '/' . $ano;
?>
      <h1 class="text-center">Exclusão do Usuário</h1>
			<p class='text-center mb-5'>Último acesso em: <?php echo $data; ?></p>

      <main class="d-flex justify-content-center">
        <div class="container__profile d-flex align-items-center justify-content-center flex-column">
          <div class="container__profile-picture">
            <img src="..\assets\img\user 1.png" alt="" style="width:100%">
          </div>
          <h2><?php echo $nome; ?></h2>
        </div>
        
        <div class="container__form">
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
            <div class="inputs">
              <input type="submit" value="Confirma exclusão?" class="btn btn-primary button">
              <input type="button" value="Cancelar" class="btn btn-danger button" onclick="window.location.href='gerenciarUsers.php'">
            </div>
          </form>
        </div>
      </main>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>