<div>
    @if($isOpen && $model)
        <div class="fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            {{-- Overlay --}}
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-90 backdrop-blur-sm" wire:click="closeModal"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                {{-- Contenido del Modal --}}
                <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-[2.5rem] shadow-2xl sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                    <div class="absolute top-6 right-6 z-10">
                        <button wire:click="closeModal" class="p-2 text-gray-400 bg-gray-100 rounded-full hover:bg-gray-200 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <div class="flex flex-col md:flex-row">
                        {{-- Imagen --}}
                        <div class="bg-gray-100 md:w-1/2">
                            <img src="{{ asset('storage/' . $model->image) }}" alt="{{ $model->name }}" class="object-cover w-full h-full max-h-[500px]">
                        </div>

                        {{-- Info --}}
                        <div class="p-8 md:w-1/2">
                            <div class="mb-4">
                                <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest">{{ $model->subcategory->name ?? 'Calzado' }}</span>
                                <h2 class="mt-1 text-3xl font-black text-gray-900 uppercase italic leading-none">{{ $model->name }}</h2>
                            </div>

                            <div class="space-y-4 text-sm text-gray-600">
                                <p>{{ $model->description ?? 'Sin descripción disponible.' }}</p>

                                <div class="grid grid-cols-2 gap-4 py-4 border-y border-gray-100">
                                    {{-- Precio con validación --}}
                                    <div>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Precio de lista</p>
                                        @if($model->price > 0)
                                            <p class="text-xl font-black text-indigo-600">
                                                ${{ number_format($model->price, 2) }}
                                                <span class="text-[10px] text-gray-400 font-normal">MXN</span>
                                            </p>
                                        @else
                                            <p class="text-sm font-black text-orange-600 uppercase italic mt-1">
                                                Precio bajo cotización
                                            </p>
                                        @endif
                                    </div>

                                    {{-- Condiciones de Venta (Viene del Negocio) --}}
                                    <div>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Modalidad</p>
                                        <p class="text-xs font-black text-gray-800 leading-tight uppercase mt-1">
                                            {{ $model->business->saleType->name ?? 'Venta Directa' }}
                                        </p>
                                        <p class="text-[10px] text-gray-500 italic leading-tight mt-1">
                                            {{ $model->business->saleType->conditions ?? 'Consultar condiciones con el vendedor' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4 py-4 border-y border-gray-100">
                                    <div>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase">Material</p>
                                        <p class="font-bold text-gray-900 uppercase">{{ $model->material->name ?? 'No especificado' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-gray-400 uppercase">Género</p>
                                        <p class="font-bold text-gray-900 uppercase">{{ $model->gender ?? 'Unisex' }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Botón WhatsApp Dinámico --}}
                            {{-- @php
                                $mensaje = "Hola " . $model->business->name . ", me interesa el modelo *" . $model->name . "* que vi en ZapatosGuanajuato.com. ¿Podrían darme más información?";
                                $urlWa = "https://wa.me/" . ($model->business->whatsapp ?? $model->business->phone) . "?text=" . urlencode($mensaje);
                            @endphp --}}

                            @php
                                $precioTexto = $model->price > 0 ? " con precio de $" . number_format($model->price, 2) : "";

                                $mensaje = "Hola " . $model->business->name . ", me interesa el modelo *" . $model->name . "*" . $precioTexto . " que vi en ZapatosGuanajuato.com. ¿Podrían darme más información?";

                                $urlWa = "https://wa.me/" . ($model->business->whatsapp ?? $model->business->phone) . "?text=" . urlencode($mensaje);
                            @endphp

                            <div class="mt-8">
                                <a href="{{ $urlWa }}" target="_blank" class="flex items-center justify-center w-full gap-3 px-6 py-4 text-xs font-black text-white uppercase transition-transform bg-green-500 rounded-2xl hover:scale-105 tracking-widest">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                    Contactar por WhatsApp
                                </a>
                                <p class="mt-4 text-[9px] text-gray-400 text-center uppercase font-bold tracking-widest">Atención directa por {{ $model->business->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
