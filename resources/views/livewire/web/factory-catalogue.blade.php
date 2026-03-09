@php
    $genders = [
        'todos'   => 'Ver Todos',
        'mujer'   => 'Mujer',
        'hombres' => 'Hombre',
        'ninos'   => 'Niños',
        'ninas'   => 'Niñas',
        'unisex'  => 'Unisex'
    ];
@endphp

<div class="relative">
    {{-- Barra de Filtros Optimizada para Móvil --}}
    <div class="flex flex-col gap-4 mb-8">

        {{-- Fila 1: Géneros (Scroll horizontal en móvil para no ocupar espacio vertical) --}}
        <div class="flex items-center justify-between gap-4">
            <div class="flex p-1 bg-gray-200/50 backdrop-blur-sm rounded-2xl overflow-x-auto no-scrollbar max-w-full">
                <div class="flex flex-nowrap shrink-0">
                    @foreach($genders as $key =>$label)
                        <button wire:click="$set('filterGender', '{{ $key }}')"
                            class="whitespace-nowrap px-5 py-2.5 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all {{ $filterGender == $key ? 'bg-white text-indigo-600 shadow-sm' : 'text-gray-500 hover:text-gray-700' }}">
                            {{$label}}
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Contador discreto en móvil --}}
            <div class="hidden md:block">
                <p class="text-[10px] font-bold text-gray-400 uppercase">
                    <span class="text-indigo-600">{{ $models->count() }}</span> Modelos
                </p>
            </div>
        </div>

        {{-- Fila 2: Selector de Material y Contador Móvil --}}
        <div class="flex items-center gap-3">
            <div class="flex-1 relative">
                <select wire:model.live="selectedMaterial"
                    class="w-full bg-white border border-gray-100 pl-4 pr-10 py-3.5 rounded-2xl text-[10px] font-black uppercase tracking-widest text-gray-700 shadow-sm focus:ring-2 focus:ring-indigo-500 outline-none appearance-none">
                    <option value="">Materiales (Todos)</option>
                    @foreach($materials as $material)
                        <option value="{{ $material->id }}">{{ $material->name }}</option>
                    @endforeach
                </select>
                {{-- Icono de flecha personalizado para el select --}}
                {{-- <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                </div> --}}
            </div>

            {{-- En móvil el contador lo ponemos aquí al lado del select --}}
            <div class="md:hidden bg-indigo-50 px-4 py-3.5 rounded-2xl border border-indigo-100">
                <p class="text-[10px] font-black text-indigo-600 uppercase">{{ $models->count() }}</p>
            </div>
        </div>
    </div>

    {{-- 2. El Indicador de Carga Inteligente --}}
    {{-- Solo se muestra cuando Livewire está trabajando --}}
    <div wire:loading.flex class="absolute inset-x-0 top-32 bottom-0 z-20 bg-gray-50/40 backdrop-blur-[2px] items-start justify-center pt-20">
        <div class="sticky top-1/2 -translate-y-1/2 bg-indigo-500 border border-gray-100 px-8 py-4 rounded-3xl shadow-2xl flex items-center gap-4">
            {{-- Spinner Animado --}}
            <svg class="animate-spin h-5 w-5 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-100">Actualizando Catálogo</span>
        </div>
    </div>

    {{-- Grid de Modelos --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
        @forelse($models as $model)
            <x-components-web.shoe-card :model="$model" />
        @empty
            <div class="col-span-full py-20 text-center bg-white rounded-[3rem] border-2 border-dashed border-gray-100">
                <p class="text-gray-400 text-lg italic uppercase font-black tracking-widest opacity-50">No hay modelos con estos filtros</p>
            </div>
        @endforelse
    </div>

</div>
