@if($businesses->count() > 0)
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-black text-gray-800 mb-8 uppercase tracking-tight text-center">
            {{ $categoryName.'s' }} <span class="text-indigo-600 font-medium italic">Destacados</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($businesses as $biz)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center hover:shadow-md transition-shadow">

                {{-- Contenedor de Imagen/Logo --}}
                <div class="w-full aspect-video flex items-center justify-center mb-4">
                    @if($biz->image)
                        <img
                            src="{{ asset('storage/' . $biz->image) }}"
                            {{-- Mejora SEO: Nombre del negocio + contexto --}}
                            alt="Logo de {{ $biz->name }}, {{ $categoryName }} de calzado en Guanajuato"
                            class="max-h-full max-w-full object-contain"
                            loading="lazy"
                            width="400"
                            height="225"
                        >
                    @else
                        {{-- Mejora Accesibilidad: aria-hidden para que no se duplique con el h3 de abajo --}}
                        <div class="text-gray-300 font-bold text-2xl uppercase italic text-center" aria-hidden="true">
                            {{ $biz->name }}
                        </div>
                    @endif
                </div>

                <div class="text-center w-full">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">{{ $biz->name }}</h3>

                    {{--Aria-label dinámico para evitar enlaces idénticos --}}
                    <a href="/{{$url}}/{{ $biz->slug }}"
                       aria-label="Ver catálogo completo y perfil de {{ $biz->name }}"
                       class="inline-block w-full py-2 bg-indigo-700 text-white rounded-lg font-bold text-sm hover:bg-indigo-800 transition-colors">
                        Ver Catálogo
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
