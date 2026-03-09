<article class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">
    {{-- Imagen del Negocio --}}
    <div class="relative aspect-[3/4] overflow-hidden bg-gray-200">
        @if($business->image)
            <img src="{{ asset('storage/' . $business->image) }}"
                alt="Instalaciones o productos de {{ $business->name }} en León, Guanajuato"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                loading="lazy"
                width="450"
                height="600"
            >
        @else
            <div class="w-full h-full flex items-center justify-center bg-indigo-50 text-indigo-200" aria-hidden="true">
                {{-- Icono decorativo oculto --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif

        {{-- Badge de Categoría (Flotante) --}}
        <div class="absolute top-4 left-4">
            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm text-indigo-700 text-xs font-bold uppercase tracking-widest rounded-full shadow-sm">
                {{ $business->category->name ?? 'Negocio' }}
            </span>
        </div>
    </div>

    {{-- Contenido --}}
    <div class="p-5 flex flex-col flex-grow text-center">
        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
            {{ $business->name }}
        </h3>

        {{-- Lista de subcategorías mejorada para SEO --}}
        <div class="flex flex-wrap justify-center gap-1 mb-6" aria-label="Especialidades de calzado">
            @if($business->modelCategories)
                @foreach($business->modelCategories->take(3) as $modelCat)
                    <span class="text-[10px] bg-gray-100 text-gray-700 px-2 py-0.5 rounded uppercase font-semibold border border-gray-200/50">
                        {{ $modelCat->name }}
                    </span>
                @endforeach
            @endif
        </div>

        {{-- Botón de Acción --}}
        <div class="mt-auto">
            <a href="{{ route($prefix.'.show', $business->slug) }}"
               aria-label="Ver perfil completo y catálogo de {{ $business->name }}"
               class="inline-flex items-center justify-center w-full px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transform active:scale-95 transition-all shadow-lg shadow-indigo-200 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Ver Detalles
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </a>
        </div>
    </div>
</article>
