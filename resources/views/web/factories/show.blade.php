<x-components-web.layouts-web.app>
    {{-- SEO Dinámico --}}

    {{-- En el @section('title') fabricantes --}}
        @section('title', $business->name . ' | Fábrica de Calzado en Guanajuato (Precio de Fábrica)')
    {{-- En el @section('description') fabricantes --}}
        @section('description', 'Contacta directamente a la fábrica ' . $business->name . ' en ' . $business->city . '. Especialistas en producción de calzado al mayoreo -'. Str::limit($business->description, 50))
        @section('og_image', asset('storage/'.$business->image))

    {{-- HERO: Ahora más limpio para no saturar con la misma imagen --}}
    <section class="relative bg-gray-900 pt-32 pb-20 overflow-hidden">
        <img src="{{ asset('storage/' . $business->image) }}"
            class="absolute inset-0 w-full h-full object-cover opacity-30 blur-sm scale-105"
            alt="Fábrica {{ $business->name }}"
            loading="eager"
            fetchpriority="high">

        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center md:text-left">
            {{-- Breadcrumbs con tu componente --}}
            <div class="mb-8 opacity-80">
                <x-components-web.breadcrumbs :business="$business" />
            </div>

            <div class="flex flex-col md:flex-row items-center gap-10">
                {{-- Badge de Categoría --}}
                <div class="flex-1">
                    <span class="inline-block px-4 py-1.5 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full mb-6">
                        {{ $business->category->name ?? 'Fabricante Verificado' }}
                    </span>
                    <h1 class="text-5xl md:text-7xl font-black text-white uppercase italic tracking-tighter leading-[0.9]">
                        {{ $business->name }}
                    </h1>

                    <div class="flex flex-wrap justify-center md:justify-start gap-6 mt-8">
                        <div class="flex items-center gap-2 text-gray-300">
                            <div class="p-2 bg-white/10 rounded-xl">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </div>
                            <span class="font-bold uppercase text-xs tracking-widest">{{ $business->city }}, Gto.</span>
                        </div>
                        @if($business->whatsapp)
                        <div class="flex items-center gap-2 text-gray-300">
                            <div class="p-2 bg-green-500/20 rounded-xl">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967..."/></svg>
                            </div>
                            <span class="font-bold uppercase text-xs tracking-widest">Trato Directo</span>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Acciones Rápidas en Hero --}}
                <div class="flex flex-col gap-4 w-full md:w-auto">
                    <a href="#catalogo" class="px-8 py-4 bg-white text-gray-900 rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-indigo-600 hover:text-white transition-all text-center">
                        Explorar Catálogo
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Breadcrumbs --}}
        <x-components-web.breadcrumbs :business="$business" />

    {{-- 1. Detalle del Fabricante --}}
    <x-components-web.business-detail :genders="$genders" :business="$business"  />

    {{-- 2. Grid de Modelos (Catálogo) --}}
    <section id="catalogo" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-end justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 uppercase">Catálogo de Modelos</h2>
                    <p class="text-indigo-600 font-medium">Diseños exclusivos de {{ $business->name }}</p>
                </div>
            </div>
                {{-- Menu LiveWire --}}
                <livewire:web.factory-catalogue :business="$business"/>
        </div>
    </section>

    {{-- 3. Modelos Relacionados (Sugerencias) --}}
    <x-components-web.related-products :business="$business" :prefix="$prefix" />

    {{-- seo dinamico --}}
    @push('head')
        <x-components-web.business-schema :business="$business" />
    @endpush

</x-components-web.layouts-web.app>
