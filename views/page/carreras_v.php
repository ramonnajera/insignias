<div class="container mx-auto mt-5">
    <div class="flex justify-end">
        <button data-open-modal class="btn btn-primary mx-3">Nueva carrera</button>
        <dialog data-modal>
            <p class="text-2xl mb-5">Nueva carrera</p>
            <form action="<?=htmlspecialchars(base_url . "Carrera/add")?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="input-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="input-text" placeholder="Primeros pasos para entrar al metaverso" required>
                </div>
                <div class="mb-3">
                    <label for="derscripcion" class="input-label">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" class="input-text" rows="4" placeholder="Aqui descripcion..." required></textarea>
                </div>
                <div class="mb-3"> 
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="img">Imagen del curso</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="img_help" id="img" name="img" type="file" required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="img_help">PNG (MAX. 800x400px).</p>
                </div>
                <div class="mb-3"> 
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="insignia">Insignia del curso</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="insignia_help" id="insignia" name="insignia" type="file" required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="insignia_help">PNG (MAX. 800x400px).</p>
                </div>
                <div>
                    <button data-close-modal class="btn btn-secundary">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </dialog>
    </div>
</div>