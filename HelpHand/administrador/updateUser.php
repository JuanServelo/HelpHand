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
	
  $sql = "SELECT ID_Usuario, Email, Senha, Telefone, Tipo_User FROM Usuario WHERE ID_Usuario = $id;";

  echo "<div class='d-flex justify-content-center align-items-center'>";
				if ($result = mysqli_query($conn, $sql)) {
					if(mysqli_num_rows($result) == 1){
						$row = mysqli_fetch_assoc($result);
						
						$id_usuario     = $row['ID_Usuario'];
						$email          = $row['Email'];
            $senha          = $row['Senha'];
            $telefone       = $row['Telefone'];
            $tipo_user      = $row['Tipo_User'];
									
						?>
						<div class="container">
							<h2>Altere os dados do Usuario ID = [<?php echo $id_usuario; ?>]</h2>
						</div>
						<form class="container" action="updateUser_exe.php" method="post" enctype="multipart/form-data">
						<table class='table table-striped-columns table-hover'>
						<tr>
							<td style="width:50%;">
							<p>
							<input type="hidden" id="Id" name="Id" value="<?php echo $id_usuario; ?>">
							<p>
							<label class="form-label"><b>Email</b>*</label>
							<input class="form-control " name="email" id="email"  type="text"
						       placeholder="email@dominio.com" title="email" value="<?php echo $email; ?>" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"></p>							
							<p><label class="form-label"><b>Senha</b></label>
							<input class="form-control " name="senha" type="password" id="senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$"
									title="A senha deve conter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula, um número e um caractere especial"
                  placeholder="Digite aqui uma nova senha caso deseje"></p>
							<p><label class="form-label"><b>Telefone</b></label>
							<input class="form-control " name="telefone" type="text" id="telefone" pattern="^\d{2} \d{5}-\d{4}$"
									title="Digite um telefone: 99 99999-9999" value="<?php echo $telefone; ?>"></p>
							<p><label class="form-label"><b>Tipo de usuario</b>*</label>
							<select name="tipo_user" id="tipo_user" class="form-control " required>
                            <option value="" disabled selected>Selecione o tipo de Usuario</option>
                            <option value="Usuario">Usuario</option>
                            <option value="Administrador">Administrador</option>
							</select>
							</p>
						
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center">
							<p>
							<input type="submit" value="Alterar" class="btn btn-primary" >
							<input type="button" value="Cancelar" class="btn btn-danger" onclick="window.location.href='gerenciarUsers.php'"></p>
						</tr>
						</table>
						<br>
						</form>
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

</body>

</html>