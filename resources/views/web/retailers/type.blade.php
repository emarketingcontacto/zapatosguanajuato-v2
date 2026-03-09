<x-components-web.layouts-web.app>
    {{-- Metadatos SEO Optimizado para Retail --}}
    @section('title', 'Tiendas de ' . $subcategory->name . ' para ' . ucfirst($genderName) . ' | Calzado Guanajuato')
    @section('description', 'Encuentra las mejores zapaterías especializadas en ' . $subcategory->name . ' para ' . $genderName . '. Calidad garantizada y venta al menudeo en León y San Pancho.')
    @section('og_image', asset('storage/'.$category->image))

    {{-- Hero Section v2 --}}
    <section class="relative bg-gray-900 py-24 overflow-hidden">
        {{-- Fondo decorativo sutil --}}
        <div class="absolute inset-0 opacity-10 bg-[url('/img/pattern-shoes.png')] bg-repeat"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            {{-- Breadcrumbs Nav --}}
            <nav aria-label="Breadcrumb" class="flex justify-center text-sm text-indigo-300 mb-6 uppercase tracking-widest font-black">
                <ol class="flex list-none p-0">
                    <li class="flex items-center">
                        <a href="{{ route('retailers.index') }}" class="hover:text-white transition-colors">Minoristas</a>
                        <span class="mx-3 text-white/40">/</span>
                    </li>
                    <li class="flex items-center">
                        <a href="{{ route('retailers.gender', $genderSlug) }}" class="hover:text-white transition-colors">{{ ucfirst($genderName) }}</a>
                        <span class="mx-3 text-white/40">/</span>
                    </li>
                    <li class="text-white">{{ $subcategory->name }}</li>
                </ol>
            </nav>

            <h1 class="text-5xl md:text-8xl font-black text-white uppercase italic tracking-tighter leading-none">
                {{ $subcategory->name }} <br>
                <span class="text-indigo-500 not-italic font-light">para {{ $genderName }}</span>
            </h1>

            <p class="text-gray-400 mt-8 max-w-2xl mx-auto font-bold uppercase tracking-[0.3em] text-[10px] md:text-xs">
                Directorio de zapaterías y puntos de venta especializados
            </p>
        </div>
    </section>

    {{-- BARRA DE FILTROS STICKY --}}
    <div class="bg-white border-b border-gray-100 py-10 sticky top-0 z-20 shadow-sm backdrop-blur-md bg-white/90">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center">
                <h2 class="text-[10px] font-black uppercase tracking-[0.4em] text-indigo-600 mb-6 text-center">Explorar otros estilos para {{ $genderName }}</h2>
                <x-components-web.type-selector
                    :types="$availableTypes"
                    :currentGenderSlug="$genderSlug"
                    prefix="retailers"
                    :genderName="$genderName"
                />
            </div>
        </div>
    </div>

    {{-- Breadcrumbs de apoyo --}}
    <div class="bg-gray-50 pt-8">
        <x-components-web.breadcrumbs :gender="$genderName" :type="$subcategory->name"/>
    </div>

    {{-- LISTADO DE TIENDAS --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($businesses as $business)
                    <article class="bg-white rounded-[3rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-100 group">
                        {{-- Imagen con Badge --}}
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ asset('storage/' . $business->image) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="{{ $subcategory->name }} en tienda {{ $business->name }}"
                                loading="lazy">
                            <div class="absolute top-6 left-6">
                                <span class="px-4 py-2 bg-white/90 backdrop-blur-md text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-sm border border-white/20">
                                    {{ $business->category->name ?? 'Minorista' }}
                                </span>
                            </div>
                        </div>

                        {{-- Info Card --}}
                        <div class="p-10">
                            <h2 class="text-2xl font-black text-gray-900 uppercase leading-tight group-hover:text-indigo-600 transition-colors mb-4 italic">
                                {{ $business->name }}
                            </h2>

                            <p class="text-gray-500 text-sm mb-8 line-clamp-2 leading-relaxed italic font-medium">
                                {{ $business->description ?? 'Especialistas en ' . $subcategory->name . ' de alta calidad para ' . $genderName . '.' }}
                            </p>

                            {{-- Contacto Rápido --}}
                            <div class="flex items-center gap-6 mb-10 text-gray-400">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    <span class="text-[10px] font-black uppercase tracking-widest">{{ $business->city }}</span>
                                </div>
                                @if($business->whatsapp)
                                <div class="flex items-center gap-2 text-green-500">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967..."/></svg>
                                    <span class="text-[10px] font-black uppercase tracking-widest">Atención en Tienda</span>
                                </div>
                                @endif
                            </div>

                            <a href="{{ route('retailers.show', $business->slug) }}"
                               class="block w-full text-center py-5 bg-gray-900 text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-indigo-600 hover:shadow-[0_20px_50px_rgba(79,70,229,0.3)] transition-all duration-300">
                                Ver Colección de {{ $subcategory->name }}
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-32 text-center bg-white rounded-[4rem] border-2 border-dashed border-gray-200">
                        <div class="text-7xl mb-6 opacity-40 italic">👞</div>
                        <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tighter italic">No hay tiendas registradas</h3>
                        <p class="text-gray-400 max-w-xs mx-auto mt-3 text-sm font-bold uppercase tracking-widest">Aún no tenemos minoristas de {{ $subcategory->name }} para {{ $genderName }}</p>
                        <a href="{{ route('retailers.gender', $genderSlug) }}" class="inline-block mt-8 px-8 py-3 bg-indigo-50 text-indigo-600 font-black uppercase text-[10px] tracking-[0.2em] rounded-full hover:bg-indigo-600 hover:text-white transition-all">Ver todo en {{ $genderName }}</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- SEO Dinámico JSON-LD --}}
    @push('head')
        <x-components-web.category-schema
            :collection="$businesses"
            :filterName="$subcategory->name"
            parentName="Minoristas"
            :parentUrl="route('retailers.index')"
            routeName="retailers.show"
        />
    @endpush
</x-components-web.layouts-web.app>
