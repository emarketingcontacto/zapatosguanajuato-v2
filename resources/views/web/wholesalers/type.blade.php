<x-components-web.layouts-web.app>
    {{-- Metadatos SEO Optimizados para Mayoristas y Tipos --}}
    @section('title', 'Mayoristas de ' . $subcategory->name . ' para ' . ucfirst($genderName) . ' en Guanajuato')
    @section('description', 'Catálogo de ' . $subcategory->name . ' para ' . $genderName . ' al por mayor. Distribuidores de León y San Pancho con stock disponible y precios de lote.')
    @section('og_image', asset('storage/'.$category->image))

    {{-- Hero Section: Estilo v2 con degradado y profundidad --}}
    <section class="relative bg-gray-900 py-20 overflow-hidden">
        {{-- Fondo decorativo sutil --}}
        <div class="absolute inset-0 opacity-10 bg-[url('/img/pattern-shoes.png')] bg-repeat"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            {{-- Breadcrumbs con Microdatos para Google --}}
            <nav aria-label="Breadcrumb" class="flex justify-center text-sm text-indigo-300 mb-6 uppercase tracking-widest font-bold">
                <ol class="flex list-none p-0">
                    <li class="flex items-center">
                        <a href="{{ route('wholesalers.index') }}" class="hover:text-white transition-colors">Mayoristas</a>
                        <svg class="w-4 h-4 mx-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                    </li>
                    <li class="flex items-center">
                        <a href="{{ route('wholesalers.gender', $genderSlug) }}" class="hover:text-white transition-colors">{{ ucfirst($genderName) }}</a>
                        <svg class="w-4 h-4 mx-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                    </li>
                    <li class="text-white" aria-current="page">{{ $subcategory->name }}</li>
                </ol>
            </nav>

            <h1 class="text-5xl md:text-7xl font-black text-white uppercase italic tracking-tighter">
                {{ $subcategory->name }} <span class="text-indigo-500 block md:inline-block not-italic font-light">al mayoreo</span>
            </h1>

            <p class="text-gray-400 mt-6 max-w-2xl mx-auto font-medium uppercase tracking-[0.2em] text-[10px] md:text-xs border-y border-white/10 py-4">
                Abastecimiento directo de {{ $subcategory->name }} para {{ $genderName }}
            </p>
        </div>
    </section>

    {{-- BARRA DE FILTROS: Type Selector (Sticky) --}}
    <div class="bg-white border-b border-gray-100 py-8 sticky top-0 z-20 shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 mb-4">Cambiar tipo de calzado</span>
                <x-components-web.type-selector
                    :types="$availableTypes"
                    :currentGenderSlug="$genderSlug"
                    prefix="wholesalers"
                    :genderName="$genderName"
                />
            </div>
        </div>
    </div>

    {{-- Breadcrumbs de navegación inferior --}}
    <x-components-web.breadcrumbs :gender="$genderName" :type="$subcategory->name"/>

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
                                 alt="Mayorista de {{ $subcategory->name }} - {{ $business->name }}"
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
                                {{ $business->description ?? 'Distribuidor especializado en ' . $subcategory->name . ' para ' . $genderName . '.' }}
                            </p>

                            {{-- Info de Contacto --}}
                            <div class="flex items-center gap-4 mb-8">
                                <div class="flex items-center gap-1 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    <span class="text-[10px] font-bold uppercase">{{ $business->city }}</span>
                                </div>
                                @if($business->whatsapp)
                                <div class="flex items-center gap-1 text-green-600">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967... (Icono Usuario) ..."/></svg>
                                    <span class="text-[10px] font-bold uppercase">Lotes Listos</span>
                                </div>
                                @endif
                            </div>

                            {{-- Botón de Acción --}}
                            <a href="{{ route('wholesalers.show', $business->slug) }}"
                               class="block w-full text-center py-4 bg-gray-900 text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-indigo-600 hover:shadow-lg hover:shadow-indigo-200 transition-all duration-300">
                                Ver Catálogo de {{ $subcategory->name }}
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-24 text-center bg-white rounded-[3rem] border-2 border-dashed border-gray-200 shadow-sm">
                        <div class="text-6xl mb-4" role="img" aria-label="Sin resultados">👞</div>
                        <h3 class="text-xl font-bold text-gray-900 uppercase tracking-tighter">Sin existencias</h3>
                        <p class="text-gray-400 max-w-xs mx-auto mt-2 text-sm font-medium">No hay mayoristas de {{ $subcategory->name }} para {{ $genderName }} registrados en este momento.</p>
                        <a href="{{ route('wholesalers.gender', $genderSlug) }}" class="inline-block mt-6 text-indigo-600 font-black uppercase text-xs border-b-2 border-indigo-600 pb-1 hover:text-indigo-800 hover:border-indigo-800 transition-all">Ver todo {{ $genderName }}</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- SEO Dinámico --}}
    @push('head')
        <x-components-web.category-schema
            :collection="$businesses"
            :filterName="$subcategory->name"
            parentName="Mayoristas"
            :parentUrl="route('wholesalers.index')"
            routeName="wholesalers.show"
        />
    @endpush

</x-components-web.layouts-web.app>
