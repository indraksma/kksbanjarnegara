<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')


        <title>{{ $title ?? 'KKS Banjarnegara' }}</title>

        

    </head>
    <body>
        <x-layouts.partials.navbar />
       

         <main class="min-h-screen mx-auto bg-white dark:bg-black">
             <x-layouts.partials.hero />
             <x-layouts.partials.card />
            {{ $slot }}
        </main>

        @stack('scripts')

       <script>

            // This code should be added to <head>.
            // It's used to prevent page load glitches.
            const html = document.querySelector('html');
            const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
            const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

            if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
            else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
            else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
            else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
        </script>

    </body>
</html>
