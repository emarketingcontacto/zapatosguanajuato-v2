<div>
    <x-slot:title>Fabricantes de Calzado en Guanajuato | Directorio</x-slot:title>
    <x-slot:description>Encuentra los mejores fabricantes de calzado de León y el estado de Guanajuato.</x-slot:description>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold my-8">Fabricantes de Calzado</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($fabricantes as $fabricante)
                <div class="bg-white p-6 rounded-lg shadow border">
                    <h2 class="text-xl font-bold text-indigo-600">{{ $fabricante->name }}</h2>

                    <p class="text-gray-600 text-sm mt-2">{{ Str::limit($fabricante->description, 100) }}</p>

                    <div class="mt-3 text-sm text-gray-600">
                        <p>📍 {{ $fabricante->neighborhood }}, {{ $fabricante->city }}</p>
                        <p class="mt-1">📞 {{ $fabricante->phone ?? 'Sin teléfono' }}</p>
                    </div>

                    <div class="mt-4 pt-4 border-t flex justify-between items-center">
                        <a href="/perfil/{{ $fabricante->slug }}" class="text-indigo-600 font-medium hover:underline text-sm">
                            Ver perfil completo
                        </a>
                        @if($fabricante->whatsapp)
                            <span class="text-green-500 text-xs font-semibold">WhatsApp disponible</span>
                        @endif
                    </div>

                    <div class="mt-4">
                        <span class="text-xs bg-gray-100 px-2 py-1 rounded text-gray-500">
                            {{ $fabricante->city }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
