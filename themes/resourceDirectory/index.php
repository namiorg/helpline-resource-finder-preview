<?php get_header(); ?>

<main class="bg-white">

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 pt-6 pb-12 sm:px-6 sm:py-16 lg:px-8">
            <h1 class="text-center text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">
                <span class="block text-[#0053a0]">NAMI HelpLine</span>
                <span class="block text-[#6caae4]">Resource Finder</span>
            </h1>
            <p class="mx-auto mt-6 max-w-lg text-center text-base sm:text-xl text-gray-700 sm:max-w-3xl">Search hundreds of mental health resources organized by the <a class="underline underline-offset-2 text-[#0053a0]" href="https://www.nami.org/help">NAMI HelpLine</a>.</p>
            <div class="mx-auto mt-10 max-w-xl">
                <form method="get" action="/" class="w-full relative">
                    <div class="rounded-full shadow-sm border border-gray-300">
                        <input type="text" name="s" class="w-full rounded-full py-2 px-4 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="<?= get_search_query() ?>" placeholder="What are you looking for?">
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-[#6caae4]">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                    </div>
                </form>
                <p class="text-center mt-6 text-gray-700 text-sm">Top searches:
                    <a class="underline decoration-dotted decoration-gray-400 underline-offset-4 hover:decoration-solid" href="/?s=emotional+support">emotional support</a>,
                    <a class="underline decoration-dotted decoration-gray-400 underline-offset-4 hover:decoration-solid" href="/?s=treatment">treatment</a>,
                    <a class="underline decoration-dotted decoration-gray-400 underline-offset-4 hover:decoration-solid" href="/?s=depression">depression</a>,
                    <a class="underline decoration-dotted decoration-gray-400 underline-offset-4 hover:decoration-solid" href="/?s=anxiety">anxiety</a>,
                    <a class="underline decoration-dotted decoration-gray-400 underline-offset-4 hover:decoration-solid" href="/?s=schizophrenia">schizophrenia</a>
                </p>
            </div>
        </div>
    </div>

</main>

<!-- Cards -->
<aside class="sm:bg-gray-50 pb-12 sm:py-12 px-4 lg:px-0 space-y-12">

    <p class="mx-auto max-w-lg text-center text-base sm:text-lg text-gray-600 sm:max-w-4xl">The <a class="underline underline-offset-2" href="https://www.nami.org">National Alliance on Mental Illness</a> (NAMI) is the nation's largest grassroots mental health organization dedicated to building better lives for the millions of Americans affected by mental illness.</p>

    <div class="max-w-5xl mx-auto grid sm:grid-cols-4 gap-8 sm:gap-4 lg:gap-12">

        <div class="flex flex-col overflow-hidden rounded-lg shadow">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="<?= get_template_directory_uri() . '/img/amazon_resource_finder_image.png' ?>" alt="">
            </div>
            <div class="flex flex-1 flex-col justify-between p-4 bg-white space-y-6">
                <div class="space-y-4">
                    <p class="text-lg font-semibold text-gray-700">Amazon Benefits Information</p>
                    <p class="text-sm text-gray-500">Go to Amazon’s Resources for Living site to learn more about your free mental health and wellbeing benefits.
                    </p>
                </div>
                <div class="">
                    <a class="inline-block text-xs uppercase tracking-wide font-medium px-4 py-3 rounded border shadow-sm text-[#0053a0]" target="_" href="https://www.resourcesforliving.com/amazon">Launch Site</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col overflow-hidden rounded-lg shadow">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="<?= get_template_directory_uri() . '/img/hAJhORQHk94.jpg' ?>" alt="">
            </div>
            <div class="flex flex-1 flex-col justify-between p-4 bg-white space-y-6">
                <div class="space-y-4">
                    <p class="text-lg font-semibold text-gray-700">Find your local NAMI</p>
                    <p class="text-sm text-gray-500">There are more than 700 NAMI State Organizations and Affiliates across the country. Many offer free support groups and education programs.</p>
                </div>
                <form class="flex space-x-2" action="https://find.nami.org/Local/List" method="get">
                    <input type="text" name="ZipCode" placeholder="Your ZIP code" class="p-2 rounded border border-gray-300 text-sm w-full">
                    <input type="hidden" name="Radius" value="10" class="hidden">
                    <button type="submit" class="text-[#0053a0] px-4 text-xs border rounded uppercase tracking-wide font-medium shadow-sm py-3">Find</button>
                </form>
            </div>
        </div>

        <div class="flex flex-col overflow-hidden rounded-lg shadow">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="<?= get_template_directory_uri() . '/img/support-group.jpg' ?>" alt="">
            </div>
            <div class="flex flex-1 flex-col justify-between p-4 bg-white space-y-6">
                <div class="space-y-4">
                    <p class="text-lg font-semibold text-gray-700">NAMI Education Programs</p>
                    <p class="text-sm text-gray-500">Led by people with lived experience, NAMI programs and support groups provide free education, training and support.</p>
                </div>
                <div class="">
                    <a class="inline-block text-xs uppercase tracking-wide font-medium px-4 py-3 rounded border shadow-sm text-[#0053a0]" target="_" href="https://nami.org/Support-Education/Mental-Health-Education">Learn More</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col overflow-hidden rounded-lg shadow">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="<?= get_template_directory_uri() . '/img/L9U5UUScnHY.jpg' ?>" alt="">
            </div>
            <div class="flex flex-1 flex-col justify-between p-4 bg-white space-y-6">
                <div class="space-y-4">
                    <p class="text-lg font-semibold text-gray-700">Contact the HelpLine</p>
                    <p class="text-sm text-gray-500">The NAMI HelpLine is here for you. HelpLine volunteers can answer your questions, offer support, and provide practical next steps.</p>
                </div>
                <div class="">
                    <a class="inline-block text-xs uppercase tracking-wide font-medium px-4 py-3 rounded border shadow-sm text-[#0053a0]" target="_" href="https://nami.org/help">Contact Us</a>
                </div>
            </div>
        </div>

    </div>

</aside>


<?php get_footer(); ?>
