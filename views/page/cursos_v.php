<section class="bg-[#EAF3F0]">
    <p class="text-center text-gray-600 font-bold text-2xl py-5">LISTA DE CURSOS</p>
    <div class="w-full mx-auto justify-items-center p-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        <?php foreach($cursos as $curso):?>
            <div class="w-60 col-span-1 flex flex-col bg-white border-2 p-2 rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl divide-y-2 divide-[#371e49]">
                <!-- Image -->
                <!-- <img class="h-40 object-cover rounded-xl" h-40 object-cover rounded-xl" src="<?=base_url?>assets/img/images/<?=$curso["carrera_img"]?>" alt=""> -->
                <div class="p-2">
                    <!-- Heading -->
                    <h2 class="px-4 font-bold text-lg mb-2 "><?=$curso["curso_nombre"]?></h2>
                    <!-- Description -->
                    <p class="px-4 text-sm text-gray-600 line-clamp-3"><?=$curso["curso_descripcion"]?></p>
                </div>
                <!-- CTA -->
                <div class="flex flex-wrap mt-auto pt-3">
                    <p class="px-4 mb-2 ">Ruta de aprendizaje:</p>
                    <p class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-full"><?=$curso["carrera_nombre"]?></p>
                <?php if(isset($_SESSION['identidad']) && isset($_SESSION['user'])):?>
                <?php if($curso["usuario_id"] != $_SESSION["identidad"][0]["usuario_id"]):?>
                <a role='button' href='<?=base_url?>Participante/add?id=<?=$curso["curso_id"]?>' class="btn btn-primary mt-4">Registrarme</a>
                <?php else:?>
                    <p class="btn btn-primary mt-4 opacity-50">Registrado</p>
                <?php endif;?>
                <?php endif;?>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</section>