<div class="bg-white rounded-[2rem] overflow-hidden shadow-sm border border-gray-100 group hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-500 transform hover:-translate-y-2">

    {{-- Contenedor de Imagen con Overlay de Acción --}}
    <div class="aspect-square overflow-hidden bg-gray-100 relative">
        <img src="{{ asset('storage/' . $model->image) }}"
            alt="{{ $model->name }}"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
            loading="lazy"
            width="400"
            height="400"
        >

        {{-- Badges Superiores --}}
        <div class="absolute top-4 left-4 flex flex-col gap-2">
            <span class="px-3 py-1 bg-white/90 backdrop-blur-md text-[9px] font-black uppercase rounded-full shadow-sm text-gray-800 border border-gray-100">
                {{ $model->gender }}
            </span>
            @if($model->is_new) {{-- Suponiendo que tengas este campo --}}
                <span class="px-3 py-1 bg-indigo-600 text-white text-[9px] font-black uppercase rounded-full shadow-lg shadow-indigo-200">
                    Nuevo
                </span>
            @endif
        </div>

        {{-- Acciones Rápidas en Hover (Overlay) --}}
        <div class="absolute inset-0 bg-indigo-900/40 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
            <a href="https://wa.me/{{ $model->business->whatsapp }}?text=Hola! Me interesa el modelo {{ $model->name }} (SKU: {{ $model->sku }})"
               target="_blank"
               class="p-3 bg-green-500 hover:bg-green-600 text-white rounded-full transition-transform hover:scale-110 shadow-xl"
               title="Preguntar por WhatsApp">
               <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884 0 2.225.584 3.911 1.746 5.92l-.999 3.648 3.742-.981z"/></svg>
            </a>
            <a href="#"
               class="p-3 bg-white hover:bg-indigo-600 hover:text-white text-gray-900 rounded-full transition-transform hover:scale-110 shadow-xl"
               title="Ver ficha técnica">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </a>
        </div>
    </div>

    {{-- Detalles del Producto --}}
    <div class="p-5">
        <div class="flex justify-between items-center mb-2">
            <span class="text-[9px] font-black text-indigo-600 uppercase tracking-widest bg-indigo-50 px-2 py-0.5 rounded">
                {{ $model->subcategory->name ?? 'Calzado' }}
            </span>
            <span class="text-[9px] text-gray-400 font-mono tracking-tighter">REF: {{ $model->sku }}</span>
        </div>

        <h3 class="font-black text-gray-800 text-sm mb-3 uppercase italic leading-tight group-hover:text-indigo-600 transition-colors">
            {{ $model->name }}
        </h3>

        {{-- Mini Info Técnica --}}
        <div class="flex gap-4 mb-4">
            <div>
                <p class="text-[8px] text-gray-400 uppercase font-bold">Material</p>
                <p class="text-[10px] text-gray-600 font-bold uppercase">
                    {{-- {{ $model->material->name ?? 'Piel' }} --}}
                    {{ is_object($model->material) ? $model->material->name : ($model->material ?? 'Piel') }}
                </p>
            </div>
            <div class="border-l border-gray-100 pl-4">
                <p class="text-[8px] text-gray-400 uppercase font-bold">Corrida</p>
                <p class="text-[10px] text-gray-600 font-bold italic">{{ $model->sizes ?? '25-29' }}</p>
            </div>
        </div>

        {{-- Footer de Precio y Acción --}}
        <div class="pt-4 border-t border-gray-100 flex items-center justify-between">
            <div class="flex flex-col">
                <span class="text-[9px] text-gray-400 font-bold uppercase leading-none mb-1">Precio Sugerido</span>
                <div class="flex items-baseline gap-1">
                    <span class="text-xs font-bold text-gray-900">$</span>
                    <span class="text-xl font-black text-gray-900 tracking-tighter">{{ number_format($model->price, 0) }}</span>
                    <span class="text-[10px] font-bold text-gray-500 uppercase">mxn</span>
                </div>
            </div>

            <button
                wire:click="$dispatchTo('web.shoe-model-modal', 'openModal', { id: {{ $model->id }} })"
                class="bg-gray-900 text-white text-[9px] font-black px-4 py-2 rounded-xl uppercase tracking-widest hover:bg-indigo-600 transition-colors">
                Detalles
            </button>
        </div>
    </div>
</div>
