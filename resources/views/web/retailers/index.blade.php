<x-components-web.layouts-web.app>
    {{-- SEO Dinámico para Retailers --}}
    @section('title', 'Zapatanerías y Tiendas de Calzado en Guanajuato | Compra al Menudeo')
    @section('description', 'Encuentra las mejores tiendas de calzado en León y San Pancho. Compra un solo par con la mejor calidad de Guanajuato. ¡Visita nuestro directorio de minoristas!')
    @section('og_image', asset('storage/'.$category->image))

    {{-- Hero Section: Enfoque Consumidor Final --}}
    <section name='hero' class="relative min-h-[600px] flex items-center justify-center bg-gray-900 pt-20">
        <img src="{{ asset('storage/'.$category->image) }}"
            class="absolute inset-0 w-full h-full object-cover opacity-50"
            alt="Tiendas de calzado y minoristas en Guanajuato"
            loading="eager"
            fetchpriority="high">

        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            {{-- Badge Superior --}}
            <span class="inline-block bg-indigo-600/20 backdrop-blur-md text-indigo-400 px-4 py-1 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-indigo-500/30">
                Venta al Menudeo y Tiendas
            </span>

            <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight uppercase">
                Encuentra tu próximo <br>
                <span class="text-indigo-500 drop-shadow-sm">par de zapatos</span>
            </h1>

            <p class="mt-6 text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed">
                Explora las mejores zapaterías de la región. Calidad premium
                <strong>directo en tienda</strong> con atención personalizada y envíos a domicilio.
            </p>

            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="#directorio" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-full font-bold transition duration-300 shadow-lg shadow-indigo-600/20 uppercase text-sm tracking-widest">
                    Ver Zapaterías
                </a>
                <a href="/usuario/crear" class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 px-8 py-3 rounded-full font-bold transition duration-300 uppercase text-sm tracking-widest">
                    Registrar mi Tienda
                </a>
            </div>

            {{-- Beneficios Retail --}}
            <div class="mt-12 flex flex-wrap justify-center gap-6">
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Venta desde 1 par
                </div>
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Garantía de Calidad
                </div>
                <div class="flex items-center text-white/80 text-sm">
                    <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Últimas Tendencias
                </div>
            </div>
        </div>
    </section>

    {{-- Selector de Género: Usando el prefijo 'retailers' --}}
    <div class="bg-gray-50 py-10">
        <h2 class="text-center text-gray-500 font-bold uppercase tracking-[0.2em] mb-4 text-xs">¿Para quién buscas calzado?</h2>
        <x-components-web.gender-selector :prefix="'retailers'" />
    </div>

    {{-- Sección de Introducción SEO --}}
    <section id="directorio" class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center mb-16">
            <h2 class="text-3xl font-black text-gray-900 uppercase mb-4 tracking-tighter italic">Calzado a tu alcance</h2>
            <p class="text-gray-600 text-lg leading-relaxed italic">
                Ya sea que busques botas, sandalias o tenis, nuestro directorio de minoristas te conecta con las tiendas físicas y digitales
                que ofrecen el mejor balance entre diseño, comodidad y precio.
            </p>
        </div>

        {{-- Grid de Business Cards --}}
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($businesses as $biz)
                    <x-components-web.business-card :business="$biz" :prefix="'retailers'" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <x-components-web.faq-section categoryName="minoristas" />

    {{-- SEO Dinámico JSON-LD --}}
    @push('head')
          <x-components-web.seo-schema type="itemList" :data="$businesses" routeName="retailers.show" />
    @endpush

</x-components-web.layouts-web.app>
