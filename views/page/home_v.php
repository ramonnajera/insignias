<div class="container mx-auto mt-5">
    <?php if(isset($_SESSION['identidad']) && isset($_SESSION['admin'])):?>
    <div class="flex justify-end">
        <button data-open-modal class="btn btn-primary mx-3">Nuevo curso</button>
        <dialog data-modal>
            <p class="text-2xl mb-5">Nuevo curso</p>
            <form action="<?=htmlspecialchars(base_url . "Carrera/add")?>" method="post">
                <div class="mb-3">
                    <label for="user" class="input-label">Correo</label>
                    <input type="email" id="user" name="user" class="input-text" placeholder="rnajera@uach.mx" required>
                </div>
                <div class="mb-5">
                    <label for="pass" class="input-label">Contraseña</label>
                    <input type="password" id="pass" name="pass" class="input-text" required>
                </div>
                <div>
                    <button data-close-modal class="btn btn-secundary">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </dialog>
    </div>
    <?php elseif(isset($_SESSION['identidad']) && isset($_SESSION['user'])):?>
    <?php endif;?>
</div>