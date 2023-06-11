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
        .btn{
            @apply px-6 py-2 focus:ring-4 shadow-lg transform active:scale-75 transition-transform ease-in-out font-medium;
        }
        .btn-primary{
            @apply bg-purple-700 hover:bg-purple-800 text-white outline-none;
        }
        .btn-secundary{
            @apply border-2 border-neutral-800 text-neutral-800 outline-none hover:border-neutral-800 hover:bg-neutral-500 hover:bg-opacity-10;
        }
        .btn-warning{
            @apply border-2 bg-white text-red-600 border-red-600 outline-none hover:bg-red-600 hover:text-white;
        }
        dialog::backdrop {
            @apply bg-neutral-700/50;
        }
        .input-text{
            @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500;
        }
        .input-label{
            @apply: block mb-2 text-sm font-medium text-gray-900 dark:text-white;
        }
        .fade-in-right {
            animation: fade-in-right 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
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
<body class="font-[Poppins]">
<nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="#" class="flex items-center">
            <!-- <img src="https://www.svgrepo.com/show/499962/music.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo"> -->
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Insignias</span>
        </a>
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-4 sm:inline-block">
                <span></span>
            </div>

            <?php if(isset($_SESSION['identidad'])):?>
            <a href="<?=htmlspecialchars(base_url . "User/logout")?>" class="btn btn-warning mx-3">Salir</a>
            <?php elseif(!isset($_SESSION['identidad']) && !isset($_SESSION['admin'])):?>
            <button data-open-modal class="btn btn-primary mx-3">Login</button>
            <a href="<?=htmlspecialchars(base_url . "Page/registro")?>"
                class="block py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-white">Registro</a>

            <dialog data-modal>
                <p class="text-2xl mb-5">Login</p>
                <form action="<?=htmlspecialchars(base_url . "User/login")?>" method="post">
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
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0 dark:text-white"
                        aria-current="page">Cursos</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Company</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Marketplace</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Features</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Team</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php require_once dirname(__FILE__).'../../includes/appmessages_v.php';?>