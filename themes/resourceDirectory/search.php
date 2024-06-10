<?php get_header(); ?>

<div class="border-b border bg-gray-50">
    <div class="container max-w-5xl mx-auto py-6 px-4">
        <form method="get" action="/" class="max-w-xl relative">
            <div class="rounded-full shadow-sm border border-gray-300">
                <input type="text" name="s" class="w-full rounded-full py-2 px-4 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= get_search_query() ?>">
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#6caae4]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
            </div>
        </form>
    </div>
</div>

<main class="container max-w-5xl mx-auto p-4 py-4 sm:py-8 my-2 lg:mb-8 grid grid-cols-3 sm:gap-8 lg:gap-24 relative" x-data="{ filterOpen: 0 }">
    <div class="facetwp-template col-span-3 sm:col-span-2">

        <button class="sm:hidden py-2 mb-4">
            <div class="flex items-center space-x-2 text-gray-700" @click="filterOpen = ! filterOpen">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                <h2 class="text-xs tracking-wider uppercase text-gray-700">Filter search results</h2>
            </div>
        </button>

        <?php if (have_posts()) : ?>
            <div class="space-y-8">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('templates/search');
                endwhile;
                ?>

                <?php the_posts_pagination([
                    'aria_label' => 'Resources',
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                ]); ?>
            </div>

        <?php else : ?>
            <div>No search results for "<?= get_search_query() ?>"</div>
        <?php endif; ?>

    </div>

    <aside class="hidden sm:block text-sm col-span-1 space-y-4">
        <h2 class="text-xs tracking-wider uppercase text-gray-700">Filter search results</h2>
        <div class="space-y-8">
            <?= facetwp_display('facet', 'language'); ?>
            <?= facetwp_display('facet', 'condition'); ?>
            <?= facetwp_display('facet', 'concern'); ?>
            <?= facetwp_display('facet', 'demographics'); ?>
        </div>
    </aside>

    <aside class="absolute inset-x-0 top-0 z-10 p-2 sm:block text-sm col-span-1" x-transition x-show="filterOpen">
        <div class="overflow-hidden rounded-lg bg-white shadow-md ring-1 ring-black ring-opacity-5 pt-2 pb-4 px-5 space-y-4 border">

            <div class="flex justify-between items-center">

                <div class="flex items-center space-x-2 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                    </svg>
                    <h2 class="text-xs tracking-wider uppercase text-gray-700">Filter search results</h2>
                </div>

                <div class="-mr-2">
                    <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="filterOpen = ! filterOpen">
                        <span class="sr-only">Close main menu</span>
                        <!-- Heroicon name: outline/x-mark -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="space-y-8">
                <?= facetwp_display('facet', 'language'); ?>
                <?= facetwp_display('facet', 'condition'); ?>
                <?= facetwp_display('facet', 'concern'); ?>
                <?= facetwp_display('facet', 'demographics'); ?>
            </div>
        </div>
    </aside>

</main>

<?php get_footer();
