<x-components-web.layouts-web.app>
    {{-- Metadatos SEO --}}
    @section('title', 'Fabricantes de Calzado para ' . $genderName . ' en Guanajuato')
    @section('description', 'Directorio especializado en ' . $genderName . '. Contacta directamente con las fábricas de León y San Francisco del Rincon.')
    @section('og_image', asset('storage/'.$category->image))

    {{-- MINI-HERO: Fondo oscuro para contraste con el Navigation --}}
    <section class="relative bg-gray-900 py-20 overflow-hidden">
        {{-- 1. Imagen con SEO Local y prioridad de carga --}}
        <img
            src="{{ asset('storage/'.$category->image) }}"
            class="absolute inset-0 w-full h-full object-cover opacity-30"
            {{-- Mejora: Alt dinámico y descriptivo para SEO --}}
            alt="Fábricas de calzado para {{ $genderName }} en León Guanajuato"
            loading="eager"
            fetchpriority="high"
        >

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            {{-- 2. Breadcrumbs con Microdatos Schema.org para Google --}}
            <nav aria-label="Breadcrumb" class="flex justify-center text-sm text-indigo-300 mb-4 uppercase tracking-widest font-bold">
                <ol class="flex list-none p-0">
                    <li class="flex items-center">
                        <a href="{{ route('factories.index') }}" class="hover:text-white transition-colors">Fabricantes</a>
                        <span class="mx-2 text-white" aria-hidden="true">/</span>
                    </li>
                    <li class="text-white aria-current="page">
                        {{ $genderName }}
                    </li>
                </ol>
            </nav>

            {{-- 3. Título Principal --}}
            <h1 class="text-5xl md:text-7xl font-black text-white uppercase italic tracking-tighter">
                {{ $genderName }}
            </h1>
            {{-- Decoración decorativa oculta para lectores de pantalla --}}
            <div class="w-24 h-2 bg-indigo-600 mx-auto mt-6 rounded-full" aria-hidden="true"></div>

            <p class="text-gray-300 mt-6 max-w-2xl mx-auto text-lg leading-relaxed">
                Explora los mejores fabricantes especializados en <strong class="text-indigo-200">calzado para {{ strtolower($genderName) }}</strong>.
                Conexión directa con plantas de producción en León, Guanajuato.
            </p>
        </div>
    </section>

    {{-- BARRA DE FILTROS: Subcategorías (Botas, Sandalias, etc.) --}}
    <div class="bg-white border-b border-gray-100 py-8 sticky top-0 z-20 shadow-sm">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 mb-4">Filtrar por tipo de calzado</span>
                <x-components-web.type-selector
                    :types="$availableTypes"
                    :currentGenderSlug="$genderSlug"
                    :prefix="'factories'"
                    :genderName="$genderName"
                    />
            </div>
        </div>
    </div>

    {{-- Breadcrumbs --}}
    <x-components-web.breadcrumbs :gender="$genderName" />

    {{-- LISTADO DE NEGOCIOS --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($businesses as $business)
                    <article class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-100 group">
                        {{-- Imagen con Badge de Categoría --}}
                        <div class="relative h-64 overflow-hidden bg-gray-200">
                            <img
                                src="{{ asset('storage/' . $business->image) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="Fábrica de calzado {{ $business->name }} en {{ $business->city ?? 'Guanajuato' }}"
                                loading="lazy"
                                width="600"
                                height="400"
                            >
                            <div class="absolute top-5 left-5">
                                <span class="px-4 py-2 bg-white/90 backdrop-blur-md text-[10px] font-black uppercase tracking-tighter rounded-xl shadow-sm border border-white/20 text-indigo-900">
                                    {{ $business->category->name ?? 'Fabricante' }}
                                </span>
                            </div>
                        </div>

                        {{-- Contenido de la Tarjeta --}}
                        <div class="p-8 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-4">
                                <h2 class="text-2xl font-black text-gray-900 uppercase leading-tight group-hover:text-indigo-600 transition-colors">
                                    {{ $business->name }}
                                </h2>
                            </div>

                            <p class="text-gray-600 text-sm mb-6 line-clamp-2 leading-relaxed italic">
                                {{ $business->description ?? 'Fabricante especializado en calzado de alta calidad en la región de Guanajuato.' }}
                            </p>

                            {{-- Info de Contacto Rápida --}}
                            <div class="flex items-center gap-4 mb-8 text-gray-500">
                                <div class="flex items-center gap-1" title="Ubicación">
                                    <svg class="w-4 h-4 text-indigo-500" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span class="text-[10px] font-bold uppercase">{{ $business->city ?? 'Guanajuato' }}</span>
                                </div>

                                @if($business->whatsapp)
                                <div class="flex items-center gap-1 text-green-700 font-bold">
                                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                    <span class="text-[10px] uppercase">WhatsApp Disponible</span>
                                </div>
                                @endif
                            </div>

                            {{-- Botón de Acción --}}
                            <div>
                                <a href="{{ route('factories.show', $business->slug) }}"
                                    aria-label="Ver catálogo completo y perfil de la fábrica {{ $business->name }}"
                                    class="block w-full text-center py-4 bg-gray-900 text-white text-xs font-black uppercase tracking-widest rounded-2xl hover:bg-indigo-600 hover:shadow-lg hover:shadow-indigo-200 transition-all duration-300 focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                    Ver Catálogo y Perfil
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-24 text-center bg-white rounded-[3rem] border-2 border-dashed border-gray-200 shadow-sm">
                        <div class="text-6xl mb-4" role="img" aria-label="Sin resultados">👟</div>
                        <h3 class="text-xl font-bold text-gray-900 uppercase tracking-tighter">Sin resultados</h3>
                        <p class="text-gray-500 max-w-xs mx-auto mt-2 text-sm font-medium">No encontramos fabricantes de {{ $genderName }} en esta selección específica.</p>
                        <a href="{{ route('factories.index') }}" class="inline-block mt-6 text-indigo-600 font-black uppercase text-xs border-b-2 border-indigo-600 pb-1 hover:text-indigo-800 hover:border-indigo-800 transition-all">Volver al directorio</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- seo dinamico --}}
    @push('head')
        <x-components-web.category-schema
            :collection="$businesses"
            :filterName="$genderName"
            parentName="Fabricantes"
            :parentUrl="route('factories.index')"
            routeName="factories.show"
        />
    @endpush

</x-components-web.layouts-web.app>
