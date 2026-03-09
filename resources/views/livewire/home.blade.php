<div>
        @section('title', 'Fabricantes Calzado Guanajuato: Venta Directa de Fábrica')
        @section('description', 'Directorio completo de Calzado en Guanajuato...')

    {{-- hero --}}
    <section name='hero' class="relative min-h-[650px] flex items-center justify-center bg-gray-900">
        {{-- 1. Imagen optimizada (se eliminó la clase duplicada) --}}
        <img src="{{ asset('images/hero.webp') }}"
            class="absolute inset-0 w-full h-full object-cover opacity-50"
            alt="Fabricantes de calzado en León Guanajuato" {{-- Alt más descriptivo para SEO --}}
            loading="eager"
            fetchpriority="high">

        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight">
                ENCUENTRA TU <span class="text-indigo-700 drop-shadow-sm">PROVEEDOR IDEAL</span> <br>
                EN LA CAPITAL DEL CALZADO
            </h1>
            <p class="mt-6 text-xl text-gray-200 max-w-3xl mx-auto">
                Conectamos a fabricantes, mayoristas y minoristas de León, Guanajuato con el mundo.
                Venta directa, precios de fábrica y calidad garantizada.
            </p>

            {{-- 2. Formulario con mejoras de accesibilidad --}}
            <div class="mt-10 bg-white p-2 rounded-full shadow-2xl max-w-3xl mx-auto flex flex-col md:flex-row items-center">
                <div class="flex-1 w-full px-4 border-b md:border-b-0 md:border-r border-gray-100">
                    {{-- Agregamos aria-label al input para que Lighthouse no se queje de la falta de <label> --}}
                    <input type="text"
                        aria-label="¿Qué tipo de calzado buscas?"
                        placeholder="¿Qué tipo de calzado buscas? (ej. Botas, Tenis...)"
                        class="w-full py-3 border-none focus:ring-0 text-gray-700 outline-none">
                </div>

                <button type="submit"
                    aria-label="Realizar búsqueda de proveedores"
                    class="w-full md:w-auto mt-2 md:mt-0 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full font-bold transition duration-300 uppercase">
                    BUSCAR AHORA
                </button>
            </div>

            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <span class="bg-black/40 backdrop-blur-md text-white px-4 py-1 rounded-full text-sm border border-white/20">
                    ✓ +500 Fabricantes
                </span>
                <span class="bg-black/40 backdrop-blur-md text-white px-4 py-1 rounded-full text-sm border border-white/20">
                    ✓ Precios Directos
                </span>
            </div>
        </div>
    </section>
    {{-- hero end--}}

    {{-- latestModelv2 --}}
        <x-components-web.latest-models/>
    {{-- latestModelv2 --}}

    {{-- categories home --}}
        <x-components-web.categories-home/>
    {{-- categories home end--}}

    {{-- trust component --}}
        <x-components-web.trust-section />
    {{-- trust component end --}}

    {{-- Premium Factories  --}}
        <x-components-web.featured-businesses category="Fabricante"/>
    {{-- Premium Factories end --}}

    {{-- Premium Wholesalers  --}}
        <x-components-web.featured-businesses category="Mayorista"/>
    {{-- Premium Factories end --}}

</div>
