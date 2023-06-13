<div class="container mx-auto mt-5">
    <?php if(isset($_SESSION['identidad']) && isset($_SESSION['admin'])):?>
    <div class="flex justify-end">
        <button data-open-modal class="btn btn-primary mx-3">Nuevo curso</button>
        <dialog data-modal>
            <p class="text-2xl mb-5">Nuevo curso</p>
            <form action="<?=htmlspecialchars(base_url . "Curso/add")?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="carrera" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carrera</label>
                    <select id="carrera" name="carrera" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php foreach($carreras as $carrera):?>
                        <option value="<?=$carrera["carrera_id"]?>"><?=$carrera["carrera_nombre"]?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="input-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="input-text" placeholder="Primeros pasos para entrar al metaverso" required>
                </div>
                <div class="mb-3">
                    <label for="derscripcion" class="input-label">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" class="input-text" rows="4" placeholder="Aqui descripcion..." required></textarea>
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
    <section>
        <p class="mb-2 mt-0 text-5xl font-medium leading-tight">Carreras</p>
        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Curso</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Carrera</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripcion</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($miscursos as $data):?>
            <tr class="border-b hover:bg-orange-100 bg-gray-100">
            <td class="py-4 px-6 border-b border-gray-200"><?=$data["curso_id"]?></td>
            <td class="py-4 px-6 border-b border-gray-200"><?=$data["carrera_nombre"]?></td>
            <td class="py-4 px-6 border-b border-gray-200"><?=$data["curso_nombre"]?></td>
            <td class="py-4 px-6 border-b border-gray-200"><?=$data["curso_descripcion"]?></td>
            <td class="py-4 px-6 border-b border-gray-200">
                <a href="<?=base_url?>Participantes/all?id=<?=$data["curso_id"]?>" class="btn btn-primary"><i class="fa-solid fa-users"></i></a>
            </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
    </section>
    <?php elseif(isset($_SESSION['identidad']) && isset($_SESSION['user'])):?>
    <?php endif;?>
</div>