<x-components-web.layouts-web.app>
    @section('title', 'Mayoristas de Calzado en Guanajuato: Catálogo de Mayoreo Directo')
    @section('description', 'Encuentra los mejores Mayoristas de Calzado en Guanajuato. Distribución masiva, modelos en tendencia y existencias listas para envío a todo México.')
    @section('og_image', asset('storage/'.$category->image))

    {{-- Hero Section Específico para Mayoristas --}}
    <section name='hero' class="relative min-h-[600px] flex items-center justify-center bg-gray-900 pt-20">
        {{-- 1. Imagen optimizada con SEO Local --}}
        <img src="{{ asset('storage/'.$category->image) }}"
            class="absolute inset-0 w-full h-full object-cover opacity-50"
            alt="Directorio de Mayoristas y Distribuidores de Calzado en Guanajuato"
            loading="eager"
            fetchpriority="high"
        >

        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            {{-- 2. Badge Superior (Aria-hidden para evitar lectura redundante) --}}
            <span aria-hidden="true" class="inline-block bg-indigo-600/20 backdrop-blur-md text-indigo-400 px-4 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-indigo-500/30">
                Centros de Distribución y Mayoreo
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight uppercase">
                Mayoristas de Calzado <br>
                <span class="text-indigo-500 drop-shadow-sm">en Guanajuato</span>
            </h1>

            <p class="mt-6 text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed">
                Abastezca su negocio con los modelos más vendidos. Acceda a
                <strong class="text-white">catálogos actualizados</strong> y proveedores con
                <strong class="text-white">stock inmediato</strong> para envío nacional.
            </p>

            {{-- 3. Botones con etiquetas descriptivas --}}
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="#directorio"
                aria-label="Ver listado de mayoristas de calzado"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full font-bold transition duration-300 shadow-lg shadow-indigo-600/20 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    EXPLORAR MAYORISTAS
                </a>
                <a href="/usuario/crear"
                aria-label="Registrar mi bodega o venta al mayoreo en Zapatos Guanajuato"
                class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-3 rounded-full font-bold transition duration-300 focus:ring-2 focus:ring-white/50 focus:outline-none">
                    REGISTRAR MI BODEGA
                </a>
            </div>

            {{-- 4. Beneficios específicos para MAYORISTAS --}}
            <div class="mt-12 flex flex-wrap justify-center gap-6">
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Stock para Envío Inmediato
                </div>
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Modelos en Tendencia
                </div>
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Precios Especiales por Lote
                </div>
            </div>
        </div>
    </section>

    {{-- Gender Selector --}}
    <h2 class="text-center text-gray-500 font-bold uppercase tracking-[0.2em] mb-4">¿Qué calzado buscas?</h2>
    <x-components-web.gender-selector :prefix="'wholesalers'" />

    {{-- Contenido de Introducción SEO para MAYORISTAS --}}
    <section id="directorio" class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center mb-16">
            <h2 class="text-3xl font-black text-gray-900 uppercase mb-4">Distribución Masiva y Surtido Inmediato</h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Optimice el inventario de su zapatería o negocio de venta por catálogo.
                Nuestros mayoristas en Guanajuato ofrecen <strong>corridas completas</strong>,
                <strong>modelos de temporada</strong> y la logística necesaria para surtir sus pedidos
                sin las esperas de los tiempos de fabricación.
            </p>
        </div>

        {{-- Grid de Business Cards --}}
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($businesses as $biz)
                    {{-- Importante: El prefix 'wholesalers' asegura que los links vayan a la ruta de mayoristas --}}
                    <x-components-web.business-card :business="$biz" :prefix="'wholesalers'" />
                @endforeach
            </div>
        </div>
    </section>

    <x-components-web.faq-section categoryName="mayoristas" />

    @push('head')
        <x-components-web.seo-schema type="itemList" :data="$businesses" routeName="wholesalers.show" />
    @endpush
</x-components-web.layouts-web.app>
