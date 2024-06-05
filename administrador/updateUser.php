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
	
  $sql = "SELECT ID_Usuario, Nome, Foto, Email, Senha, Telefone, Tipo_User FROM Usuario WHERE ID_Usuario = $id;";

  echo "<div>";
			if ($result = mysqli_query($conn, $sql)) {
				if(mysqli_num_rows($result) == 1){
					$row = mysqli_fetch_assoc($result);
					
					$id_usuario     = $row['ID_Usuario'];
					$foto		    = $row['Foto'];
					$nome		    = $row['Nome'];
					$email          = $row['Email'];
					$senha          = $row['Senha'];
					$telefone       = $row['Telefone'];
					$tipo_user      = $row['Tipo_User'];
								
					?>
					<h1 class="text-center">Alteração do Usuário</h1>
					<p class='text-center mb-5'>Último acesso em: <?php echo $data; ?></p>

					<main class="d-flex justify-content-center">
						<div class="container__profile d-flex align-items-center justify-content-center flex-column">
							<div class="container__profile-picture">
								<img src="..\assets\img\user 1.png" alt="" style="width:100%">
							</div>
							<h2><?php echo $nome; ?></h2>
						</div>
						<div class="container__form">
							<form action="updateUser_exe.php" method="post" enctype="multipart/form-data">
								<div class="inputs">
    								<input type="hidden" id="Id" name="Id" value="1">
								</div>
								<div class="inputs d-flex flex-column">
									<label class="form-label"><b>Email</b>*</label>
									<input name="email" id="email" type="text" placeholder="email@dominio.com" title="email" value="teste@gmail.com" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
								</div>
								<div class="inputs d-flex flex-column">
									<label class="form-label"><b>Senha</b></label>
									<input name="senha" type="password" id="senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&amp;#])[A-Za-z\d@$!%*?&amp;#]{8,}$" title="A senha deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula, um número e um caractere especial" placeholder="Digite aqui uma nova senha caso deseje">
								</div>
								<div class="inputs d-flex flex-column">
									<label class="form-label"><b>Telefone</b></label>
									<input name="telefone" type="text" id="telefone" pattern="^\d{2} \d{5}-\d{4}$" title="Digite um telefone: 99 99999-9999" value="21 99999-9999">
								</div>
								<div class="inputs d-flex flex-column">
									<label class="form-label"><b>Tipo de usuario</b>*</label>
									<select name="tipo_user" id="tipo_user" class="form-control " required="">
									<option value="" disabled="" selected="">Selecione o tipo de Usuario</option>
									<option value="Usuario">Usuario</option>
									<option value="Administrador">Administrador</option>
									</select>
								</div>
								<div class="inputs">
									<input type="submit" value="Alterar" class="btn button btn-primary">
									<input type="button" value="Cancelar" class="btn button btn-danger" onclick="window.location.href='gerenciarUsers.php'">
								</div>
							</form>
						</div>
					</main>
							<?php
				}else{?>
							<div class="container">
							<h2>Usuario inexistente</h2>
							</div>
							<br>
						<?php
						}
			} else {
				echo "<p style='text-align:center'>Erro executando UPDATE: " . mysqli_error($conn) . "</p>";
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