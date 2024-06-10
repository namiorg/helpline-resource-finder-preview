<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <!-- Fathom - beautiful, simple website analytics -->
    <script src="https://cdn.usefathom.com/script.js" data-site="XXXXXXX" defer></script>
    <!-- / Fathom -->
</head>

<body class="bg-white">

    <header class="bg-white py-6" x-data="{ open: false }">
        <nav class="relative mx-auto flex max-w-5xl items-center justify-between px-4 sm:px-6" aria-label="Global">
            <div class="flex flex-1 items-center">
                <div class="flex w-full items-center justify-between md:w-auto">
                    <a href="/">
                        <span class="sr-only">National Alliance on Mental Illness</span>

                        <?php if (is_search()) : ?>
                            <div class="flex items-center space-x-4">
                                <img class="h-8 w-auto sm:h-10" src="<?= get_template_directory_uri() . '/img/nami-blue.svg' ?>" alt="">
                                <div class="text-sm leading-none sm:text-xl font-medium text-[#0053a0]">HelpLine Resource <br class="sm:hidden">Finder</div>
                            </div>
                        <?php else : ?>
                            <img class="h-8 w-auto sm:h-10" src="<?= get_template_directory_uri() . '/img/nami-blue.svg' ?>" alt="">
                        <?php endif; ?>
                    </a>
                    <div class="-mr-2 flex items-center md:hidden">
                        <button type="button" class="focus-ring-inset inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white" aria-expanded="false" @click="open = ! open">
                            <span class="sr-only">Open main menu</span>
                            <!-- Heroicon name: outline/bars-3 -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden space-x-8 md:ml-10 md:flex">
                <a href="https://nami.org/help" target="_" class="text-base font-medium text-gray-700 decoration underline-offset-4 decoration-1 decoration-transparent hover:decoration-gray-500 underline transition ease-in-out duration-150">NAMI HelpLine</a>
                <a href="https://nami.org" target="_" class="text-base font-medium text-gray-700 decoration underline-offset-4 decoration-1 decoration-transparent hover:decoration-gray-500 underline transition ease-in-out duration-150">About NAMI</a>
            </div>
        </nav>

        <div class="absolute inset-x-0 top-0 z-10 p-2 sm:hidden" x-transition x-show="open">
            <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-black ring-opacity-5">
                <div class="flex items-center justify-between px-5 pt-4">
                    <div>
                        <img class="h-8 w-auto " src="<?= get_template_directory_uri() . '/img/nami-blue.svg' ?>" alt="">
                    </div>
                    <div class="-mr-2">
                        <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="open = ! open">
                            <span class="sr-only">Close main menu</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="space-y-1 px-5 pt-2 pb-3">
                    <a href="https://nami.org/help" target="_" class="block py-2 text-base font-medium text-gray-700 decoration underline-offset-4 decoration-1 decoration-transparent hover:decoration-gray-500 underline transition ease-in-out duration-150">NAMI HelpLine</a>
                    <a href="https://nami.org" target="_" class="block py-2 text-base font-medium text-gray-700 decoration underline-offset-4 decoration-1 decoration-transparent hover:decoration-gray-500 underline transition ease-in-out duration-150">About NAMI</a>
                </div>
            </div>
        </div>

    </header>
