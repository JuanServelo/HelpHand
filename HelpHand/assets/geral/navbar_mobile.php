<div class="modal top-down-fade" id="modal_menu" tabindex="-1" aria-labelledby="modal_menu" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen m-0">
        <div class="modal-content">
            <div class="modal-header p-0">
                <h1 class="modal-title fs-5 text-center" id="modal_menu">
                    <img src="../assets/img/logo_preta.png" width="100%" alt="">
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span><ion-icon name="close-circle-outline"></ion-icon></span>
                </button>
            </div>
            <div class="modal-body p-0">
                <ol class="d-flex flex-column p-0">
                    <a href="#">
                        <ion-icon name="settings-outline"></ion-icon>
                        Serviços
                    </a>
                    <a href="#">
                        <ion-icon name="refresh-outline"></ion-icon>
                        Histórico
                    </a>
                    <a href="#">
                        <ion-icon name="help-circle-outline"></ion-icon>
                        FAQ
                    </a>
                </ol>
            </div>
            <div class="modal-footer d-flex justify-content-start m-3">
                <a class="profile_picture m-0" href="#">
                    <img src="../assets/img/user 1.png" alt="">
                </a>
                <a class="profile_picture-text w-75" href="#">
                    <h3><?php echo $_SESSION['nome'] ?></h3>
                </a>
            </div>
        </div>
    </div>
</div>
