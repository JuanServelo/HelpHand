<?php
include_once '../assets/bd/sessao.php';
$email = $_SESSION['email'];


$sql = "SELECT Nome, Telefone, Email, CPF, Foto, Genero FROM Usuario WHERE Email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $email);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Nenhum usuário encontrado.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="perfilc.css">
    <link rel="stylesheet" href="../assets/css/navbar_.css">
    <title>Perfil</title>
</head>
<body>
    <header>
        <nav class="navbar p-0">
            <button class="logo_maozinha p-0" type="button" 
            data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
                <img src="../assets/img/logo_preta.png" 
                class="img-fluid float-start rounded d-block" width="100%" alt="">
            </button>

            <button type="menu" class="menu d-flex flex-column align-items-center"
            data-bs-toggle="modal" data-bs-target="#modal_logo_maozinha">
                <span><ion-icon name="menu-outline"></ion-icon></span>
            </button>
        </nav>

        <h1 class="text-center">Meu Perfil</h1>
    </header>

        <?php require '../assets/geral/menu.php'; ?>
        <?php require '../assets/geral/navbar_.php'; ?>

    <div class="container">
        <!-- Formulários -->
        <section class="d-flex justify-content-center mt-5">
            <div class="row">
                <!-- Parte do perfil -->
                <div class="col">
                    <!-- Imagem do perfil -->
                    <?php if ($user['Foto']) { ?>
                        <div>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($user['Foto']);?>" alt="Foto de Perfil">
                        </div>
                        <?php } else { ?>
                            <div>
                                <img src="default-avatar.png" class="user">
                        </div>
                    <?php } ?>
                    <!-- Dados do perfil -->
                    <div>
                        <h2 class="nome">Nome: <?php echo htmlspecialchars($user['Nome']); ?></h2>
                        <p class="telefone">Telefone: <?php echo htmlspecialchars($user['Telefone']); ?></p>
                        <h2 class="email">E-mail: <?php echo htmlspecialchars($user['Email']); ?></h2>
                        <h2 class="cpf">CPF: <?php echo htmlspecialchars($user['CPF']); ?></h2>
                    </div>
                </div>

                <div class="col d-flex justify-content-center align-items-center">
                    <div class="linha-vertical"></div>
                </div>
                
                <div class="col"">
                    <div class="header__form d-flex flex-row">
                        <h1 class="dados">Meus Dados</h1>
                        <a href="#">Editar Dados</a>
                    </div>
                    <form action="processar_formulario.php" method="POST">
                        <div class="form-group">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($user['Nome']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="senha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
                    </form>
                </div>           
            </div>
        </section>
    </div>

    <?php require '../assets/geral/rodape.php'; ?>
</body>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>