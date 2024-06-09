<div class="modal fade" id="modal_logo_maozinha" tabindex="-1" 
        aria-labelledby="modal_logo_maozinha" aria-hidden="true"> 
            <div class="modal-dialog m-0">
                <div class="modal-content">
                    <div class="modal-header p-0">
                        <h1 class="modal-title fs-5 text-center" id="modal_logo_maozinha">
                            <img src="../assets/img/logo_preta.png" alt="">
                        </h1>
                        <button type="button" 
                        data-bs-dismiss="modal" aria-label="Close">
                        <span><ion-icon name="close-circle-outline"></ion-icon></span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <ol class="d-flex flex-column p-0">
                            <a href="../usuario/home.php">
                                <ion-icon name="home-outline"></ion-icon>
                                    Home
                            </a>
                            <a href="#">
                                <ion-icon name="settings-outline"></ion-icon>
                                    Serviços
                            </a>
                            <a href="#">
                                <ion-icon name="refresh-outline"></ion-icon>
                                    Histórico
                            </a>
                            <a href="FAQ.php">
                                <ion-icon name="help-circle-outline"></ion-icon>
                                    FAQ
                            </a>
                        </ol>
                    </div>     
                    <div class="modal-footer d-flex flex-column">
                        <div class="profile d-flex align-items-center" style="gap:10px; width:50%; margin-right: 45%">
                            <a href="#" class="profile_picture">
                                <img src="../assets/img/user 1.png" alt="">
                            </a>
                            <a class="profile_picture-text" href="#">
                                <h3 class="fs-3" href="perfil.php"><?php echo $_SESSION['nome'] ?></h3>
                            </a>
                        </div>
                        <a class="logout link-underline-danger" href="../assets/bd/sairusuario.php">
                            <h3 class='fs-5 text-danger '>Logout</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>