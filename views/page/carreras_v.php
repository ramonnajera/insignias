<div class="container mx-auto mt-5">
    <div class="flex justify-end">
        <button data-open-modal class="btn btn-primary mx-3">Nueva ruta de aprendizaje</button>
        <dialog data-modal class="rounded rounded-md p-10">
            <p class="text-2xl mb-5">Nueva ruta de aprendizaje</p>
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
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="img_help" id="img" name="img" type="file" required>
                    <p class="mt-1 text-sm text-gray-500 " id="img_help">PNG (MAX. 800x400px).</p>
                </div>
                <div class="mb-3"> 
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="insignia">Insignia del curso</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="insignia_help" id="insignia" name="insignia" type="file" required>
                    <p class="mt-1 text-sm text-gray-500  id="insignia_help">PNG (MAX. 800x400px).</p>
                </div>
                <div  class="flex justify-center ">
                    <button data-close-modal class="mx-5 btn btn-secundary">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </dialog>
    </div>
    <section>
        <p class="mb-2 mt-0 text-5xl font-medium leading-tight">Rutas de aprendizaje</p>
        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripcion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($carreras as $carrera):?>
            <tr class="border-b hover:bg-orange-100 bg-gray-100">
            <td class="py-4 px-6 border-b border-gray-200"><?=$carrera["carrera_id"]?></td>
            <td class="py-4 px-6 border-b border-gray-200"><?=$carrera["carrera_nombre"]?></td>
            <td class="py-4 px-6 border-b border-gray-200"><?=$carrera["carrera_descripcion"]?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
    </section>
</div>