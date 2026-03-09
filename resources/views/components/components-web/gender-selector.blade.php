<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
    @php
        $genders = [
            ['slug' => 'mujer', 'name' => 'Damas', 'icon' => '👠'],
            ['slug' => 'hombres', 'name' => 'Caballeros', 'icon' => '👞'],
            ['slug' => 'ninos', 'name' => 'Niños', 'icon' => '👦'],
            ['slug' => 'ninas', 'name' => 'Niñas', 'icon' => '👧'],
        ];
    @endphp

    @foreach($genders as $gender)
        <a href="{{ route($prefix.'.gender', $gender['slug']) }}"
           {{-- Mejora: Aria-label descriptivo único por cada tarjeta --}}
           aria-label="Ver fabricantes de calzado para {{ $gender['name'] }}"
           class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-500 transition-all text-center focus:outline-none focus:ring-2 focus:ring-indigo-500">

            {{-- Mejora: Role img y label para el emoji --}}
            <div class="text-4xl mb-3 group-hover:scale-110 transition-transform"
                 role="img"
                 aria-label="Icono de {{ $gender['name'] }}">
                {{ $gender['icon'] }}
            </div>

            <h3 class="font-black text-gray-800 uppercase tracking-tighter group-hover:text-indigo-600">
                {{ $gender['name'] }}
            </h3>

            {{-- Mejora: Subimos el tono del gris (gray-500) para pasar prueba de contraste --}}
            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-1">
                Ver Fabricantes
            </p>
        </a>
    @endforeach
</div>
