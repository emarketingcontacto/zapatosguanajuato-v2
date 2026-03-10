<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- seo --}}
        <title>@yield('title', 'Directorio de Calzado') | Zapatos Guanajuato </title>
        <meta name="description" content="@yield('description', 'Encuentra proveedores en Guanajuato.')">
        @stack('head')

        <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZP9TGP6"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        {{-- Open Graph / Facebook / WhatsApp --}}
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title', 'Directorio de Calzado') | Zapatos Guanajuato">
        <meta property="og:description" content="@yield('description', 'Encuentra proveedores en Guanajuato.')">
        {{-- PRIORIDAD: 1. Sección de la vista | 2. Imagen del Hero principal --}}
        <meta property="og:image" content="@yield('og_image', asset('images/hero.webp'))">
        {{-- Twitter --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', 'Directorio de Calzado')">
        <meta name="twitter:description" content="@yield('description', 'Encuentra proveedores en Guanajuato.')">
        <meta name="twitter:image" content="@yield('og_image', asset('images/hero.webp'))">

        {{-- scripts --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-gray-50 font-sans antialiased text-gray-900">
        {{-- navigation --}}
        <x-components-web.navigation></x-components-web.navigation>

        <main >
            {{ $slot }}
        </main>

        {{-- footer --}}
        <x-components-web.footer></x-components-web.footer>
        <livewire:web.shoe-model-modal />
        @livewireScripts
    </body>
</html>
