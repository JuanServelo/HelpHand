<?php $overlay_style = (!isset($_SESSION['logged']) || $_SESSION['logged'] == False) ? 'display: flex;' : 'display: none;'; ?>

<div class="overlay" style="<?php echo $overlay_style; ?>">
    <div class="login-container">
        <h2 class="text-center mb-4">Logue para continuar</h2>
        <form action="" method="POST" class="d-flex flex-column" style="gap: 15px">
            <?php
            if (isset($_SESSION['erro'])) {
                echo "<div class='alert alert-danger' role='alert'>$_SESSION[erro]</div>";
                unset($_SESSION['erro']);
            } ?>
            <div class="form-group">
                <input type="email" class="form-control" name="email" required class="seletor_text"
                    placeholder="Digite seu email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="senha" required class="seletor_text"
                    placeholder="Digite sua senha">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            <a href="../resetSenha.php" class="text-center link-offset-2">Esqueceu a senha?</a>
            <a href="../cadastro.php" class="text-center link-offset-2">Cadastre-se</a>
        </form>
    </div>
</div>