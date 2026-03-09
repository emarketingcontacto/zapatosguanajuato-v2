<x-components-web.layouts-web.app>
    {{-- Metadatos SEO Optimizado para Mayoristas --}}
    @section('title', 'Mayoristas de Calzado para ' . $genderName . ' en Guanajuato | Mayoreo Directo')
    @section('description', 'Encuentra distribuidores y mayoristas especializados en calzado para ' . $genderName . '. Stock listo para envío y los mejores precios por lote en León y San Pancho.')
    @section('og_image', asset('storage/'.$category->image))

    {{-- MINI-HERO: Consistente con v2 --}}
    <section class="relative bg-gray-900 py-20 overflow-hidden">
        {{-- Imagen con SEO Local y prioridad de carga --}}
        <img
            src="{{ asset('storage/'.$category->image) }}"
            class="absolute inset-0 w-full h-full object-cover opacity-30"
            alt="Proveedores mayoristas de calzado para {{ $genderName }} en León Guanajuato"
            loading="eager"
            fetchpriority="high"
        >

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            {{-- Breadcrumbs con Microdatos --}}
            <nav aria-label="Breadcrumb" class="flex justify-center text-sm text-indigo-300 mb-4 uppercase tracking-widest font-bold">
                <ol class="flex list-none p-0">
                    <li class="flex items-center">
                        <a href="{{ route('wholesalers.index') }}" class="hover:text-white transition-colors">Mayoristas</a>
                        <svg class="w-4 h-4 mx-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                    </li>
                    <li class="text-white" aria-current="page">{{ $genderName }}</li>
                </ol>
            </nav>

            <h1 class="text-5xl md:text-7xl font-black text-white uppercase italic tracking-tighter">
                {{ $genderName }} <span class="text-indigo-500 text-3xl md:text-5xl block md:inline-block not-italic font-light">al por mayor</span>
            </h1>

            <div class="w-24 h-2 bg-indigo-600 mx-auto mt-6 rounded-full"></div>

            <p class="text-gray-300 mt-6 max-w-2xl mx-auto text-lg leading-relaxed">
                Directorio de bodegas y centros de distribución con <strong>venta por lote y corrida</strong> de calzado para {{ strtolower($genderName) }}.
            </p>
        </div>
    </section>

    {{-- BARRA DE FILTROS: Type Selector --}}
    <div class="bg-white border-b border-gray-100 py-8 sticky top-0 z-20 shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center">
                <h2 class="text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 mb-4">Especialidad en {{ $genderName }}</h2>
                <x-components-web.type-selector
                    :types="$availableTypes"
                    :currentGenderSlug="$genderSlug"
                    :prefix="'wholesalers'"
                    :genderName="$genderName"
                />
            </div>
        </div>
    </div>

    {{-- Breadcrumbs de navegación inferior --}}
    <x-components-web.breadcrumbs :gender="$genderName" />

    {{-- LISTADO DE NEGOCIOS --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($businesses as $business)
                    <article class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-100 group">
                        {{-- Imagen con Badge --}}
                        <div class="relative h-64 overflow-hidden bg-gray-200">
                            <img src="{{ asset('storage/' . $business->image) }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                 alt="Distribuidor {{ $business->name }}"
                                 loading="lazy">
                            <div class="absolute top-5 left-5">
                                <span class="px-4 py-2 bg-white/90 backdrop-blur-md text-[10px] font-black uppercase tracking-tighter rounded-xl shadow-sm border border-white/20 text-indigo-600">
                                    {{ $business->category->name ?? 'Mayorista' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-8">
                            <h2 class="text-2xl font-black text-gray-900 uppercase leading-tight group-hover:text-indigo-600 transition-colors mb-3">
                                {{ $business->name }}
                            </h2>

                            <p class="text-gray-500 text-sm mb-6 line-clamp-2 leading-relaxed italic">
                                {{ $business->description ?? 'Distribuidor mayorista con amplio catálogo en calzado de ' . strtolower($genderName) . '.' }}
                            </p>

                            {{-- Info de Contacto --}}
                            <div class="flex items-center gap-4 mb-8">
                                <div class="flex items-center gap-1 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    <span class="text-[10px] font-bold uppercase">{{ $business->city }}</span>
                                </div>
                                @if($business->whatsapp)
                                <div class="flex items-center gap-1 text-green-600">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967... (Contenido del SVG del usuario) ..."/></svg>
                                    <span class="text-[10px] font-bold uppercase">Stock Disponible</span>
                                </div>
                                @endif
                            </div>

                            {{-- Botón de Acción --}}
                            <a href="{{ route('wholesalers.show', $business->slug) }}"
                               class="block w-full text-center py-4 bg-gray-900 text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-indigo-600 hover:shadow-lg hover:shadow-indigo-200 transition-all duration-300 focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                Ver Catálogo de Mayoreo
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-24 text-center bg-white rounded-[3rem] border-2 border-dashed border-gray-200 shadow-sm">
                        <div class="text-6xl mb-4" role="img" aria-label="Sin resultados">📦</div>
                        <h3 class="text-xl font-bold text-gray-900 uppercase tracking-tighter">Sin mayoristas</h3>
                        <p class="text-gray-500 max-w-xs mx-auto mt-2 text-sm font-medium">No encontramos distribuidores de {{ $genderName }} en esta selección.</p>
                        <a href="{{ route('wholesalers.index') }}" class="inline-block mt-6 text-indigo-600 font-black uppercase text-xs border-b-2 border-indigo-600 pb-1 hover:text-indigo-800 hover:border-indigo-800 transition-all">Volver al inicio</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- SEO Dinámico --}}
    @push('head')
        <x-components-web.category-schema
            :collection="$businesses"
            :filterName="$genderName"
            parentName="Mayoristas"
            :parentUrl="route('wholesalers.index')"
            routeName="wholesalers.show"
        />
    @endpush
</x-components-web.layouts-web.app>
