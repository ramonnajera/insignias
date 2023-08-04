<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,900&display=swap" rel="stylesheet">

    <style type="text/tailwindcss">
    @layer utilities {
       
        .social {
            cursor: pointer;
            border-radius: 9999px;
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
        .btn{
            @apply px-4 py-2 focus:ring-4 shadow-lg transform active:scale-75 transition-transform ease-in-out font-medium rounded-sm;
        }
        .btn-primary{
            @apply bg-[#D5175E] hover:bg-pink-400 text-white outline-none;
        }
        .btn-secundary{
            @apply border-2 border-neutral-800 text-neutral-800 outline-none hover:border-neutral-800 hover:bg-pink-400 hover:bg-opacity-10;
        }
        .btn-warning{
            @apply border-2  text-white  outline-none hover:bg-red-600 hover:text-white;
        }
        dialog::backdrop {
            @apply bg-neutral-700/50;
        }
        .input-text{
            @apply bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-auto md:w-80 p-2.5;
        }
        .input-label{
            @apply:  mb-2 text-sm font-medium text-gray-900 ;
        }
        .fade-in-right {
            animation: fade-in-right 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
        }
        @font-face {
            font-family: 'Faktum';
            src: url('../assets/fonts/faktum-wide-bold.otf') 
        }

        @keyframes fade-in-right {
            0% {
                transform: translateX(50px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .fade-out-right {
            animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @keyframes fade-out-right {
            0% {
                transform: translateX(0);
                opacity: 1;
            }

            100% {
                transform: translateX(50px);
                opacity: 0;
            }
        }
    }
    </style>
    
    <title>Insignias UACH</title>
</head>
<body class="font-[Poppins] min-h-screen flex flex-col justify-start">
<nav class="bg-[#45484c] border-gray-200 py-2.5">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="<?=base_url?>" class="flex items-center">
            <!-- <img src="https://www.svgrepo.com/show/499962/music.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo"> -->
            
            <img src="https://teachers-xi.vercel.app/images/logo-white.png" class="h-6 mr-3 sm:h-9" >
            <span class="ml-8 self-center text-xl font-[Faktum] whitespace-nowrap dark:text-white">Insignias</span>
        </a>
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-4 sm:inline-block">
                <span></span>
            </div>

            <?php if(isset($_SESSION['identidad'])):?>
            <a href="<?=htmlspecialchars(base_url . "User/logout")?>" class="btn btn-warning mx-3"><i class="fa-solid fa-arrow-right-from-bracket"></i> Salir</a>
            <?php elseif(!isset($_SESSION['identidad'])):?>
            <button data-open-modal class="btn btn-primary mx-3">Ingresar</button>
            <a href="<?=htmlspecialchars(base_url . "Page/registro")?>"
                class="block py-2 pl-3 pr-4 text-white border hover:bg-pink-400 hover:border-transparent ">Registro</a>
            <dialog data-modal class="rounded-md col">
                <p class="text-2xl mb-5 pt-10 text-center font-[Faktum]">Ingresar</p>
                <form action="<?=htmlspecialchars(base_url . "User/login")?>" method="post">
                    <div class="mb-3 px-5">
                        <label for="user" class="input-label">Correo</label>
                        <input type="email" id="user" name="user" class="input-text" placeholder="rnajera@uach.mx" required>
                    </div>
                    <div class="mb-5 px-5">
                        <label for="pass" class="input-label">Contraseña</label>
                        <input type="password" id="pass" name="pass" class="input-text" required>
                    </div>
                    <div class=" pb-10 flex justify-center">
                        <button data-close-modal class="btn  border border-gray-500 text-black hover:text-white hover:border-transparent hover:bg-[#D5175E] mx-5">Cerrar</button>
                        <button type="submit" class="btn btn-primary mr-5">Entrar</button>
                        
                        
                    </div>
                </form>
            </dialog>
            <?php endif;?>
            <button data-collapse-toggle="mobile-menu-2" type="button"
				class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
				aria-controls="mobile-menu-2" aria-expanded="true">
				<span class="sr-only">Open main menu</span>
				<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
						clip-rule="evenodd"></path>
				</svg>
				<svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
        </div>
        <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <?php if(isset($_SESSION['identidad'])):?>
                    <?php if(isset($_SESSION['admin'])):?>
                <li>
                    <a href="<?=htmlspecialchars(base_url)?>"
                        class="block py-2 pl-3 pr-4 text-white rounded hover:text-[#D5175E] font-[Faktum] lg:p-0"hover:text-[#D5175E] font-[Faktum]
                        aria-current="page">Mis cursos</a>
                </li>
                <li>
                    <a href="<?=htmlspecialchars(base_url . "Page/carreras")?>"
                        class="block py-2 pl-3 pr-4 text-white rounded hover:text-[#D5175E] font-[Faktum] lg:p-0">Rutas de aprendizaje</a>
                </li>
                    <?php elseif(isset($_SESSION['user'])):?>
                        <li>
                            <a href="<?=htmlspecialchars(base_url)?>"
                            class="block py-2 pl-3 pr-4 text-white  rounded hover:text-[#D5175E] font-[Faktum] lg:p-0"
                            aria-current="page">Mis insignias</a>
                        </li>
                        <li>
                            <a href="<?=htmlspecialchars(base_url . "Curso/alls")?>"
                                class="block py-2 pl-3 pr-4 text-white rounded hover:text-[#D5175E] font-[Faktum] lg:p-0">Todos los cursos</a>
                        </li>
                    <?php endif;?>
                <?php elseif(!isset($_SESSION['identidad'])):?>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-white rounded hover:text-[#D5175E] font-[Faktum] lg:p-0"
                        aria-current="page">Cursos</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-white rounded hover:text-[#D5175E] font-[Faktum] lg:p-0">Otros</a>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>
<?php require_once dirname(__FILE__).'../../includes/appmessages_v.php';?>