<article class="space-y-1">
    <h1 class="text-xl text-blue-800 truncate">
        <?php if (get_field('url')) : ?>
            <a class="underline underline-offset-4 decoration-1 decoration-transparent hover:decoration-blue-800" target="_" href="<?= get_field('url'); ?>"><?php the_title(); ?></a>
        <?php else : ?>
            <?php the_title(); ?>
        <?php endif; ?>
    </h1>
    <div class="text-sm text-gray-700"><?php the_content(); ?></div>
    <div class="space-y-1 pt-1 ml-2">

        <!-- Website -->
        <?php if (get_field('url')) : ?>
            <div class="flex items-center space-x-2 text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                </svg>
                <a class="text-green-700 text-sm truncate underline underline-offset-4 decoration-1 decoration-transparent hover:decoration-green-600" target="_" href="<?= get_field('url'); ?>"><?= get_field('url'); ?></a>
            </div>
        <?php endif; ?>

        <!-- Phone Number -->
        <?php if (get_field('phone')) : ?>
            <div class="flex items-center space-x-2 text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>
                <a class="text-green-700 text-sm truncate underline underline-offset-4 decoration-1 decoration-transparent hover:decoration-green-600" href="tel:<?= preg_replace("/[^0-9]/", "", get_field('phone')); ?>"><?= get_field('phone'); ?></a>
            </div>
        <?php endif; ?>

        <!-- Physical Address -->
        <?php if (get_field('address')) : ?>
            <div class="flex items-center space-x-2 text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <a class="text-sm underline underline-offset-2 decoration-gray-400" target="_" href="https://www.google.com/maps/place/<?= str_replace(' ', '+', get_field('address')); ?>">Google Maps</a>
            </div>
        <?php endif; ?>

    </div>
</article>
