<nav aria-label="Filtro por tipo de calzado para {{ $genderName }}" class="flex flex-wrap gap-2 mb-10 justify-center">
    {{-- Botón "Todos" --}}
    <a href="{{ route($prefix .'.gender', $currentGenderSlug) }}"
       aria-label="Ver todos los tipos de calzado para {{ $genderName }}"
       @if(!request()->route('tipo')) aria-current="true" @endif
       class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider transition-all {{ !request()->route('tipo') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'bg-white text-gray-600 border border-gray-100' }}">
        Todos los tipos
    </a>

    {{-- Botones dinámicos --}}
    @foreach($types as $type)
        @php $isActive = request()->route('tipo') == $type->slug; @endphp
        <a href="{{ route($prefix .'.type', [$currentGenderSlug, $type->slug]) }}"
           aria-label="Filtrar por {{ $type->name }} para {{ $genderName }}"
           @if($isActive) aria-current="true" @endif
           class="px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider transition-all {{ $isActive ? 'bg-indigo-600 text-white shadow-lg' : 'bg-white text-gray-600 border border-gray-100' }}">
            {{ $type->name }}
        </a>
    @endforeach
</nav>
