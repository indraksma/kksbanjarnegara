<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}">

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')


        <title>{{ $title ?? 'KKS Banjarnegara' }}</title>
        

        <script>
            const html = document.querySelector('html');
            const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || 
                (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
            const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || 
                (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

            if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
            else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
            else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
            else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
        </script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    </head>
    <body>
        <x-layouts.partials.navbar />
        {{-- <x-layouts.partials.floating-news /> --}}

        <main class="min-h-screen bg-white dark:bg-gray-900">
           
            {{ $slot }}
        </main>

        @unless ($withoutFooter ?? false)
            <x-layouts.partials.footer />
        @endunless

      

        <script>
            document.addEventListener('livewire:navigated', () => {
                console.log('Livewire navigated – Re-initializing Preline...');
                window.HSStaticMethods?.autoInit?.();
            });
        </script>

            
    </body>
</html>
