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

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    echo "</table>";
    echo "</div>";
    die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
  }

  mysqli_query($conn, "SET NAMES 'utf8'");
  mysqli_query($conn, 'SET character_set_connection=utf8');
  mysqli_query($conn, 'SET character_set_client=utf8');
  mysqli_query($conn, 'SET character_set_results=utf8');

  $sql = "SELECT ID_Usuario, Nome, Email, Senha, Telefone, CPF, Genero, Nota, Foto, Tipo_User, Data_nasc FROM Usuario";
  echo "<div class='container m-5'>";
  if ($result = mysqli_query($conn, $sql)) {
    echo "  <table class='table table-striped-columns table-hover'>";
    echo "    <thead>";
    echo "      <tr>";
    echo "        <th scope='col'>ID</th>";
    echo "        <th scope='col'>Foto</th>";
    echo "        <th scope='col'>Nome</th>";
    echo "        <th scope='col'>E-mail</th>";
    echo "        <th scope='col'>Senha</th>";
    echo "        <th scope='col'>Telefone</th>";
    echo "        <th scope='col'>Nascimento</th>";
    echo "        <th scope='col'>Idade</th>";
    echo "        <th scope='col'>CPF</th>";
    echo "        <th scope='col'>Genero</th>";
    echo "        <th scope='col'>Nota</th>";
    echo "        <th scope='col'>Tipo Usuario</th>";
    echo "      </tr>";
    echo "    </thead>";
    echo "    <tbody>";
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $data = $row['Data_nasc'];
        list($ano, $mes, $dia) = explode('-', $data);
        $nova_data = $dia . '/' . $mes . '/' . $ano;
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
        $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        $cod = $row["ID_Usuario"];
        echo "<tr>";
        echo "<td>";
        echo $cod;
        echo "</td>";
        if ($row['Foto']) { ?>
          <td>
            <img id="imagemSelecionada" class="img-fluid img-thumbnail w-50 h-50"
              src="data:image/png;base64,<?= base64_encode($row['Foto']) ?>" />
          </td>
          <td>
            <?php
        } else {
          ?>
          <td>
            <img id="imagemSelecionada" class="img-fluid img-thumbnail w-50 h-50" src="../assets/img/maozinha 1.png" />
          </td>
          <td>
            <?php
        }
        echo $row["Nome"];
        echo "</td><td>";
        echo $row["Email"];
        echo "</td><td>";
        echo $row["Senha"];
        echo "</td><td>";
        echo $row["Telefone"];
        echo "</td><td>";
        echo $nova_data;
        echo "</td><td>";
        echo $idade;
        echo "</td><td>";
        echo $row["CPF"];
        echo "</td><td>";
        echo $row["Genero"];
        echo "</td><td>";
        echo $row["Nota"];
        echo "</td><td>";
        echo $row["Tipo_User"];
        echo "</td>";
        ?>
        <td>
          <a href='updateUser.php?id=<?php echo $cod; ?>'><img src='../assets/img/Edit.png' title='Editar Usuario'
              width='32'></a>
        </td>
        <td>
          <a href='deleteUser.php?id=<?php echo $cod; ?>'><img src='../assets/img/Delete.png' title='Excluir Usuario'
              width='32'></a>
        </td>
        </tr>
        <?php
      }
    }
    echo "    </tbody>";
    echo "  </table>";
    echo "</div>";
  } else {
    echo "Erro executando SELECT: " . mysqli_error($conn);
  }

  mysqli_close($conn);

  ?>

  <?php require '../assets/geral/rodape.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

</body>

</html>