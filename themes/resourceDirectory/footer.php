<footer>
    <section class="bg-[#0c499c] py-12">
        <div class="container mx-auto max-w-5xl grid sm:grid-cols-2 gap-6 sm:gap-0 text-white text-sm px-4 lg:px-0">

            <div class="space-y-8">
                <img class="h-16" src="<?= get_template_directory_uri() . '/img/nami-white.png' ?>">
                <p class="max-w-sm">The National Alliance on Mental Illness (NAMI) is the nation's largest grassroots mental health organization. We are dedicated to building better lives for the millions of Americans affected by mental illness.</p>
            </div>

            <div class="sm:flex sm:justify-end">
                <div class="space-y-4">
                    <div class=" text-lg font-medium">Contact Us</div>
                    <div>
                        National Alliance on Mental Illness<br />
                        4301 Wilson Blvd #300<br />
                        Arlington, VA 22203
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                            <a class="decoration decoration-1 underline-offset-4 hover:underline" href="mailto:helpline@nami.org">helpline@nami.org</a>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                            </svg>
                            <a class="decoration decoration-1 underline-offset-4 hover:underline" href="https://www.nami.org/help">www.nami.org/help</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-800 py-4">
        <div class="text-center text-white text-sm">
            &copy;
            2023
            National Alliance on Mental Illness (NAMI). <br class="sm:hidden">All rights reserved.
        </div>
    </section>
</footer>


<?php wp_footer(); ?>

</body>

</html>
