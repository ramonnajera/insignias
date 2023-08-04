<div class="container mx-auto mt-5">
    <?php if(isset($_SESSION['identidad']) && isset($_SESSION['admin'])):?>
    <div class="flex justify-end">
        <button data-open-modal class="btn btn-primary mx-3">Nuevo curso</button>
        <dialog data-modal class="rounded rounded-md p-10">
            <p class="text-2xl mb-5">Nuevo curso</p>
            <form action="<?=htmlspecialchars(base_url . "Curso/add")?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="carrera" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruta de aprendisaje</label>
                    <select id="carrera" name="carrera" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="insignia">Imagen del Curso</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="curso_help" id="curso_img" name="img" type="file" required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="curso_help">PNG (MAX. 800x400px).</p>
                </div>
                <div class="mb-3"> 
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="insignia">Insignia del curso</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none " aria-describedby="insignia_help" id="insignia" name="insignia" type="file" required>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="insignia_help">PNG (MAX. 800x400px).</p>
                </div>
                <div class="flex justify-center ">
                    <button data-close-modal class="mx-5 btn btn-secundary">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </dialog>
    </div>
    <section>
        <p class="mb-2 mt-0 text-5xl font-medium leading-tight">Cursos</p>
        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Curso</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ruta de aprendisaje</th>
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
                <a href="<?=base_url?>Participante/all?id=<?=$data["curso_id"]?>" class="btn btn-primary"><i class="fa-solid fa-users"></i></a>
            </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        </table>
    </section>
    <?php elseif(isset($_SESSION['identidad']) && isset($_SESSION['user'])):?>
        <section class="bg-[#EAF3F0] border-2 p-2 rounded-xl mb-5">
            <p>Nombre: <?=$_SESSION['identidad'][0]["usuario_nombre"]?></p>
            <p>Correo: <?=$_SESSION['identidad'][0]["usuario_correo"]?></p>
            <p>Area: <?=$_SESSION['identidad'][0]["usuario_area"]?></p>
        </section>
        <section class="bg-[#EAF3F0] border-2 p-2 rounded-xl">
        <p class="text-center text-gray-600 font-bold text-2xl py-5">MIS INSIGNIAS</p>
        <div class="w-full mx-auto justify-items-center p-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        <?php foreach($insignias as $data):?>
            <div>
                <img class="w-40 h-40 rounded-full mx-auto mb-3 <?=$data["participante_terminado"] ?"":"grayscale"?>" src="<?=base_url."assets/img/images/".$data["curso_insignia"]?>" alt="">
                <p class="text-center"><?=$data["curso_nombre"]?></p>
            </div>
        <?php endforeach;?>
        </div>
        </section>
    <?php elseif(!isset($_SESSION['identidad'])):?>

    
<section class="">
    <p class="text-center text-gray-900 font-[Faktum] font-bold text-2xl py-5">RUTAS DE APRENDIZAJE</p>
    <div class="w-full mx-auto justify-items-center p-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        <?php foreach($carreras as $carrera):?>
            <div class="w-60 col-span-1 flex flex-col bg-[#009989] border-2 p-2 rounded-sm transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                <!-- Heading -->
                <!-- <div class="p-2">
                <h2 class="font-bold font-[Faktum] text-lg mb-2 "><?=$carrera["carrera_nombre"]?></h2>
                </div> -->
                <!-- Image -->
                <img class="h-40 object-cover rounded-md" h-40 object-cover rounded-xl" src="<?=base_url?>assets/img/images/<?=$carrera["carrera_img"]?>" alt="">
                <div class="p-2">
                    <!-- Description -->
                    <!-- <p class="text-sm  text-gray-600 line-clamp-3"><?=$carrera["carrera_descripcion"]?></p>
                </div> -->
                <!-- CTA -->
                <div class="flex mt-auto pt-3 text-xs justify-center">
                <a role='button' href='<?=base_url?>Curso/all?id=<?=$carrera["carrera_id"]?>' class="btn btn-primary ">Ver cursos</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section>
    <?php endif;?>
</div>