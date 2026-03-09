<x-components-web.layouts-web.app>
    @section('title', 'Fabricantes Calzado Guanajuato: Venta Directa de Fábrica')
    @section('description', 'Directorio completo de Fabricantes de Calzado en Guanajuato. ¡Encuentra los mejores precios de Mayoreo!')
    @section('og_image', asset('storage/'.$category->image))

    {{-- Hero Section Específico para Fabricantes --}}
    <section name='hero' class="relative min-h-[600px] flex items-center justify-center bg-gray-900 pt-20">
        {{-- 1. Imagen optimizada con SEO Local --}}
        <img src="{{ asset('storage/'.$category->image) }}"
            class="absolute inset-0 w-full h-full object-cover opacity-50"
            alt="Directorio especializado de Fabricantes de Calzado en Guanajuato"
            loading="eager"
            fetchpriority="high"
        >

        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            {{-- 2. Badge Superior (Aria-hidden para evitar lectura redundante) --}}
            <span aria-hidden="true" class="inline-block bg-indigo-600/20 backdrop-blur-md text-indigo-400 px-4 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-indigo-500/30">
                Directorio de Fábricas
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight uppercase">
                Fabricantes de Calzado <br>
                <span class="text-indigo-500 drop-shadow-sm">en Guanajuato</span>
            </h1>

            <p class="mt-6 text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed">
                Establezca una línea de producción propia o adquiera altos volúmenes con
                <strong class="text-white">precios de planta</strong>. Conecte directo con el productor sin intermediarios.
            </p>

            {{-- 3. Botones con etiquetas descriptivas --}}
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="#directorio"
                aria-label="Ir al listado de fábricas de calzado"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full font-bold transition duration-300 shadow-lg shadow-indigo-600/20 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                    EXPLORAR FÁBRICAS
                </a>
                <a href="/usuario/crear"
                aria-label="Registrar mi fábrica en el directorio de Zapatos Guanajuato"
                class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-3 rounded-full font-bold transition duration-300 focus:ring-2 focus:ring-white/50 focus:outline-none">
                    REGISTRAR MI FÁBRICA
                </a>
            </div>

            {{-- 4. Beneficios con SVGs ocultos para limpieza de lectura --}}
            <div class="mt-12 flex flex-wrap justify-center gap-6">
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Producción por Maquila
                </div>
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Venta por Corrida
                </div>
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Socio de Negocios Directo
                </div>
            </div>
        </div>
    </section>

    {{-- Gender Selector --}}
    <h2 class="text-center text-gray-500 font-bold uppercase tracking-[0.2em] mb-4">¿Qué calzado buscas?</h2>
        <x-components-web.gender-selector :prefix="'factories'" />

    {{-- Contenido de Introducción SEO (Lo que tenías en la vista vieja) --}}
    <section id="directorio" class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center mb-16">
            <h2 class="text-3xl font-black text-gray-900 uppercase mb-4">Producción por Volumen y Maquila</h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Si su negocio requiere establecer una línea de producción de marca blanca o manejar altos volúmenes de inventario,
                nuestros proveedores garantizan precios de planta competitivos.
            </p>
        </div>

        {{-- Grid de Business Cards --}}
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($businesses as $biz)
                    <x-components-web.business-card :business="$biz" :prefix="'factories'" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ Section (Siguiente componente a crear) --}}
    <x-components-web.faq-section categoryName="fabricantes" />

    {{-- SEO Dinámico: JSON-LD para el listado --}}
    @push('head')
        <x-components-web.seo-schema type="itemList" :data="$businesses" routeName="factories.show" />
    @endpush


</x-components-web.layouts-web.app>
