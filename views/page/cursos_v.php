<section class="bg-[#EAF3F0]">
    <p class="text-center text-gray-600 font-[Faktum] text-2xl py-5">LISTA DE CURSOS</p>
    <div class="w-full mx-auto justify-items-center p-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        <?php foreach($cursos as $curso):?>
            <div class="w-80 col-span-1 flex flex-col bg-transparent rounded-sm transform transition-all hover:-translate-y-2 duration-300  ">
                
                <!-- Card Image -->
                <div class="">

            
                    <!-- Heading -->
                    <!-- <h2 class="px-4 font-[Faktum] text-lg mb-2 "><?=$curso["curso_nombre"]?></h2> -->
                    
                    <!-- Image -->
                    <img class="h-full w-full object-cover "  src="<?=base_url?>assets/img/images/<?=$curso["curso_img"]?>" alt="">

                    <!-- Description -->
                    <!-- <p class="px-4 text-sm text-gray-600 line-clamp-3"><?=$curso["curso_descripcion"]?></p> -->
                </div>
                <!-- CTA -->
                <div class="flex flex-wrap mt-auto">
                    <!-- <p class="px-4 mb-2 ">Ruta de aprendizaje:</p> -->
                    <!-- <p class="px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-full"><?=$curso["carrera_nombre"]?></p> -->



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