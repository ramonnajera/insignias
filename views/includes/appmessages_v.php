<?php if (isset($_SESSION['respuesta'])): ?>
    <div class="relative w-full z-50" id="notification">
    <div class="absolute top-0 right-5">
        <div class="flex shadow fade-in-right" role="alert">
            <div class="<?=$_SESSION['respuesta']['status'] == "error"  ? "bg-red-400": "bg-green-400"?>  text-center p-2">
            <div class="flex justify-center w-16 h-full items-center">
                <i class="<?=$_SESSION['respuesta']['status'] == "error"  ? "fa-solid fa-triangle-exclamation": "fa-regular fa-thumbs-up"?> text-2xl"></i>
            </div>
            </div>
            <div class="bg-white border-r-4 <?=$_SESSION['respuesta']['status'] == "error"  ? "border-red-400": "border-green-400"?> w-full p-4">
            <div>
                <p class="text-gray-600 font-bold uppercase"><?=$_SESSION['respuesta']['status']?></p>
                <p class="text-gray-600 text-sm"><?=$_SESSION['respuesta']['mensaje']?></p>
            </div>
            </div>
        </div>
    </div>
    </div>
<?php endif; ?>
<?php Utils::deleteSession('respuesta'); ?>