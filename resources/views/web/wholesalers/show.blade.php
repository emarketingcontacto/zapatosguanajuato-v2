<x-components-web.layouts-web.app>
    {{-- SEO Dinámico Optimizado para Mayoristas --}}
    @section('title', $business->name . ' | Distribuidor Mayorista de Calzado en León')
    @section('description', 'Contacta con ' . $business->name . ' en ' . $business->city . '. Catálogo de calzado para surtir tu negocio con envíos a todo México. ' . Str::limit($business->description, 120))
    @section('og_image', asset('storage/'.$business->image))

    {{-- HERO: Estilo v2 más limpio y profesional --}}
    <section class="relative bg-gray-900 pt-32 pb-20 overflow-hidden">
        {{-- Imagen de fondo con overlay degradado --}}
        <img src="{{ asset('storage/' . $business->image) }}"
            class="absolute inset-0 w-full h-full object-cover opacity-30 blur-sm scale-105"
            alt="Centro de distribución {{ $business->name }}"
            loading="eager"
            fetchpriority="high">

        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center md:text-left">
            {{-- Breadcrumbs --}}
            <div class="mb-8 opacity-80">
                <x-components-web.breadcrumbs :business="$business" />
            </div>

            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex-1">
                    <span class="inline-block px-4 py-1 bg-indigo-600/30 backdrop-blur-md border border-indigo-500/50 text-indigo-300 text-[10px] font-black uppercase tracking-widest rounded-full mb-4">
                        {{ $business->category->name ?? 'Distribuidor Mayorista' }}
                    </span>

                    <h1 class="text-4xl md:text-7xl font-black text-white uppercase italic leading-none tracking-tighter">
                        {{ $business->name }}
                    </h1>

                    <div class="flex flex-wrap justify-center md:justify-start gap-6 mt-6 text-gray-400">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            <span class="font-bold uppercase text-xs tracking-widest">{{ $business->city }}, Guanajuato</span>
                        </div>
                        @if($business->whatsapp)
                        <div class="flex items-center gap-2 text-green-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967..."/></svg>
                            <span class="font-bold uppercase text-xs tracking-widest">Surtido Inmediato</span>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- CTA Rápido en Hero --}}
                <div class="flex gap-4 w-full md:w-auto">
                    <a href="#catalogo" class="px-8 py-4 bg-white text-gray-900 rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-indigo-600 hover:text-white transition-all text-center flex-1 md:flex-none">
                        Explorar Catálogo
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 1. Detalle del Negocio (Componente unificado) --}}
    <x-components-web.business-detail :business="$business" :genders="$genders" />

    {{-- 2. Grid de Modelos (Catálogo con Livewire) --}}
    <section id="catalogo" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 text-center md:text-left">
                <div>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 uppercase tracking-tighter">Catálogo de Mayoreo</h2>
                    <p class="text-indigo-600 font-bold uppercase text-xs tracking-[0.2em] mt-2">Existencias y corridas de {{ $business->name }}</p>
                </div>
                <div class="hidden md:block">
                    <div class="h-1 w-20 bg-indigo-600 rounded-full"></div>
                </div>
            </div>

            {{-- Componente Livewire para el catálogo dinámico --}}
            <livewire:web.factory-catalogue :business="$business"/>
        </div>
    </section>

    {{-- 3. Modelos Relacionados (Sugerencias inteligentes) --}}
    <x-components-web.related-products :business="$business" :prefix="$prefix" />

    {{-- SEO Dinámico JSON-LD --}}
    @push('head')
        <x-components-web.business-schema :business="$business" />
    @endpush

</x-components-web.layouts-web.app>
