<div class=" mx-auto px-4">
    <form action="<?=htmlspecialchars(base_url . "User/signup")?>" method="post">
        <div class="flex flex-col  justify-center items-center text-center ">
            <br/>
            <p class="text-center text-gray-900 font-bold text-4xl py-5 ">Registro</p>
            <div className="flex flex-col">
                <div class="mb-3  text-left  ">
                    <label for="name" class="input-label">Nombre</label>
                    <input type="text" id="name" name="name" class="input-text " placeholder="Ramon Gomez" required>
                </div>
                <div class="mb-3 text-left ">
                    <label for="correo" class="input-label">Correo</label>
                    <input type="email" id="correo" name="correo" class="input-text" placeholder="rnajera@uach.mx" required>
                </div>
                <div class="mb-3 text-left ">
                    <label for="area" class="input-label">Area</label>
                    <input type="text" id="area" name="area" class="input-text" placeholder="Cordinacion General de Tecnologias de la informacion" required>
                </div>
                <div class="mb-5 text-left ">
                    <label for="pass" class="input-label">Contraseña</label>
                    <input type="password" id="pass" name="pass" class="input-text" required>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </form>
</div>