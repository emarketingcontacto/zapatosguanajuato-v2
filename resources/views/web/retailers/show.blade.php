<x-components-web.layouts-web.app>
    {{-- SEO Dinámico: Optimizado para intención de compra (Retail) --}}
    @section('title', $business->name . ' | Zapatería en ' . $business->city . ' - Catálogo y Modelos')
    @section('description', 'Explora el catálogo de ' . $business->name . '. Encuentra las mejores tendencias en calzado en ' . $business->city . '. Calidad garantizada en venta al público. ' . Str::limit($business->description, 100))
    @section('og_image', asset('storage/'.$business->image))

    {{-- HERO DEL MINORISTA: Impacto Visual v2 --}}
    <section class="relative bg-gray-900 py-32 overflow-hidden">
        {{-- Imagen de fondo con desenfoque estratégico --}}
        <img src="{{ asset('storage/' . $business->image) }}"
             class="absolute inset-0 w-full h-full object-cover opacity-60 blur-md scale-110"
             alt="Interior de la zapatería {{ $business->name }}"
             loading="eager"
             fetchpriority="high">

        {{-- Overlay degradado para legibilidad premium --}}
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4">
            <div class="flex flex-col items-center md:items-start">
                {{-- Badge de Estatus --}}
                <div class="flex items-center gap-3 mb-6">
                    <span class="px-5 py-1.5 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full shadow-lg shadow-indigo-500/30">
                        {{ $business->category->name ?? 'Tienda Verificada' }}
                    </span>
                    <span class="px-5 py-1.5 bg-white/10 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full border border-white/20">
                        Venta al Menudeo
                    </span>
                </div>

                <h1 class="text-5xl md:text-8xl font-black text-white uppercase italic tracking-tighter leading-none mb-8 text-center md:text-left">
                    {{ $business->name }}
                </h1>

                {{-- Quick Info Bar --}}
                <div class="flex flex-wrap justify-center md:justify-start gap-8 text-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center backdrop-blur-sm">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase text-gray-400 font-black tracking-widest">Ubicación</p>
                            <p class="text-sm font-bold">{{ $business->city }}, Guanajuato</p>
                        </div>
                    </div>

                    @if($business->whatsapp)
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-green-500/20 flex items-center justify-center backdrop-blur-sm border border-green-500/30">
                            <svg class="w-5 h-5 text-green-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase text-green-400 font-black tracking-widest">
                                Consultar Stock
                            </p>
                            <p class="text-sm font-bold text-white">WhatsApp Disponible</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Breadcrumbs --}}
    <x-components-web.breadcrumbs :business="$business" />

    {{-- 1. DETALLE DEL NEGOCIO --}}
    {{-- Reutilizamos el componente, asegurando que los textos internos hablen de "Tienda" y no "Fábrica" --}}
    <x-components-web.business-detail :business="$business" :genders="$genders" />

    {{-- 2. CATÁLOGO / MODELOS --}}
    <section id="catalogo" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between mb-12 gap-6">
                <div class="text-center md:text-left">
                    <h2 class="text-4xl font-black text-gray-900 uppercase italic tracking-tighter leading-tight">
                        Catálogo de <span class="text-indigo-600">Temporada</span>
                    </h2>
                    <p class="text-gray-500 font-medium mt-2">Explora los modelos disponibles en {{ $business->name }}</p>
                </div>

                {{-- Opcional: Badge de "Nuevos Modelos" --}}
                <div class="px-6 py-3 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center gap-3">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                    </span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-gray-600">Actualizado recientemente</span>
                </div>
            </div>

            {{-- Componente LiveWire para filtrado dinámico --}}
            <livewire:web.factory-catalogue :business="$business"/>
        </div>
    </section>

    {{-- 3. PRODUCTOS RELACIONADOS --}}
    <x-components-web.related-products :business="$business" :prefix="$prefix" />

    {{-- SEO: JSON-LD Structured Data --}}
    @push('head')
        <x-components-web.business-schema :business="$business" />
    @endpush

</x-components-web.layouts-web.app>
