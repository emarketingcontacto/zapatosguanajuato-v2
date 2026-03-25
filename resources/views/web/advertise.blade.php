@php
    $siteSettings = \App\Models\SiteSetting::all()->pluck('value', 'key');
@endphp

<x-components-web.layouts-web.app>
    @section('title', 'Anúnciate con Nosotros - Directorio de Calzado Guanajuato')
    @section('description', 'Une tu fábrica o negocio al ecosistema digital más grande del calzado en México. Programa especial SAPICA 2026.')

    {{-- 1. Hero: Impacto y Autoridad (v2 + v1) --}}
    <section class="relative py-28 bg-gray-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('images/hero.webp') }}" class="w-full h-full object-cover">
        </div>
        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            <span class="inline-block px-4 py-1 mb-8 text-[10px] font-black uppercase tracking-[0.4em] text-indigo-400 bg-indigo-400/10 rounded-full border border-indigo-400/20">
                Impulsando la Industria del Calzado desde León, Gto.
            </span>
            <h1 class="text-5xl md:text-8xl font-black text-white leading-[0.9] uppercase italic tracking-tighter mb-8">
                NO SOLO FABRIQUES, <br> <span class="text-indigo-500">HAZTE NOTAR.</span>
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto text-xl font-medium italic leading-relaxed">
                El punto de encuentro digital para Fabricantes, Mayoristas y Proveedores de Insumos en México.
            </p>
            <div class="mt-12 flex flex-col sm:flex-row justify-center gap-6">
                <a href="#planes" class="bg-indigo-600 text-white px-12 py-6 rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-white hover:text-gray-900 transition-all shadow-2xl shadow-indigo-500/20">
                    Ver Planes SAPICA 2026
                </a>
                <a href="https://wa.me/{{ $siteSettings['whatsapp'] }}?text=Hola%2C%20vengo%20de%20la%20secci%C3%B3n%20de%20anunciantes%20de%20zapatosguanajuato.com.%20Me%20interesa%20saber%20m%C3%A1s%20sobre%20los%20servicios%20para%20digitalizar%20mi%20empresa."
                    id="btn-wa-asesoria"
                    target="_blank"
                    class="bg-green-500 text-white px-12 py-6 rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-green-600 transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.888 11.888-11.888 3.176 0 6.161 1.237 8.404 3.48s3.48 5.228 3.48 8.404c0 6.556-5.332 11.888-11.888 11.888-2.016 0-3.991-.511-5.741-1.481l-6.242 1.636zm6.205-4.415l.445.264c1.489.884 3.203 1.35 4.965 1.35 5.31 0 9.633-4.323 9.633-9.633 0-2.573-1.001-4.991-2.819-6.809s-4.236-2.819-6.809-2.819c-5.31 0-9.633 4.323-9.633 9.633 0 2.036.638 4.02 1.844 5.703l.289.403-1.01 3.692 3.792-.993z"/></svg>
                    Asesoría Directa
                </a>
            </div>
        </div>
    </section>

    {{-- 2. Segmentación: ¿A quién ayudamos? (Rescatado de v1) --}}
    <section class="py-24 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 text-center mb-16">
            <h2 class="text-3xl font-black uppercase italic tracking-tight">Un espacio para cada eslabón <span class="text-indigo-600 text-4xl block md:inline">de la cadena</span></h2>
        </div>
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-8">
            <div class="p-8 bg-gray-50 rounded-3xl hover:bg-indigo-50 transition-colors group text-center">
                <span class="text-4xl mb-4 block">🏭</span>
                <h4 class="font-black uppercase italic mb-3 group-hover:text-indigo-600">Fabricantes</h4>
                <p class="text-gray-500 text-sm italic">Exhibe tus catálogos de temporada ante compradores nacionales e internacionales.</p>
            </div>
            <div class="p-8 bg-gray-50 rounded-3xl hover:bg-indigo-50 transition-colors group text-center">
                <span class="text-4xl mb-4 block">📦</span>
                <h4 class="font-black uppercase italic mb-3 group-hover:text-indigo-600">Mayoristas</h4>
                <p class="text-gray-500 text-sm italic">Conecta con nuevos distribuidores y expande tu red de ventas por todo México.</p>
            </div>
            <div class="p-8 bg-gray-50 rounded-3xl hover:bg-indigo-50 transition-colors group text-center">
                <span class="text-4xl mb-4 block">🧪</span>
                <h4 class="font-black uppercase italic mb-3 group-hover:text-indigo-600">Proveedores</h4>
                <p class="text-gray-500 text-sm italic">Vende pieles, suelas, herrajes y maquinaria directo a los productores de calzado.</p>
            </div>
        </div>
    </section>

    {{-- 3. Beneficios: Por qué nosotros (v2 + v1) --}}
    <section class="py-24 bg-gray-900 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 items-center gap-16">
            <div>
                <h2 class="text-4xl font-black uppercase italic mb-8 leading-none">Resultados que <br><span class="text-indigo-500">puedes medir.</span></h2>
                <ul class="space-y-8">
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-indigo-500 rounded-lg flex-shrink-0 flex items-center justify-center font-black">01</div>
                        <div>
                            <h5 class="font-black uppercase italic text-sm mb-1 tracking-widest">SEO Especializado</h5>
                            <p class="text-gray-400 text-xs">Aparece en Google cuando los clientes buscan proveedores de calzado en Guanajuato.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-indigo-500 rounded-lg flex-shrink-0 flex items-center justify-center font-black">02</div>
                        <div>
                            <h5 class="font-black uppercase italic text-sm mb-1 tracking-widest">Botón de WhatsApp Directo</h5>
                            <p class="text-gray-400 text-xs">Sin intermediarios. Los prospectos llegan directo a tu celular para cerrar la venta.</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-indigo-500 rounded-lg flex-shrink-0 flex items-center justify-center font-black">03</div>
                        <div>
                            <h5 class="font-black uppercase italic text-sm mb-1 tracking-widest">Estadísticas en Tiempo Real</h5>
                            <p class="text-gray-400 text-xs">Reportes mensuales de impresiones y clics. Sabrás exactamente cuánto interés generas.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="bg-indigo-600 p-12 rounded-[3rem] text-center transform rotate-2 shadow-2xl">
                <span class="text-[10px] font-black uppercase tracking-[0.4em] block mb-4">Métrica Actual</span>
                <p class="text-7xl font-black italic mb-2">+1.22k</p>
                <p class="text-sm font-bold uppercase tracking-widest opacity-80">Impresiones mensuales <br> en Google Search Console</p>
            </div>
        </div>
    </section>

    {{-- 4. Planes: El Gancho SAPICA (v2) --}}
    <section id="planes" class="py-24 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black uppercase italic mb-4">Planes de Membresía</h2>
                <p class="text-gray-500 font-medium">Aprovecha el relanzamiento v2 y prepárate para SAPICA 2026.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 items-stretch">
                {{-- Básico --}}
                <div class="bg-white p-12 rounded-[2rem] border border-gray-200 flex flex-col h-full">
                    <h4 class="text-xs font-black uppercase tracking-[0.3em] text-gray-400 mb-2 italic">Perfil Básico</h4>
                    <p class="text-4xl font-black mb-8 italic uppercase">Gratis</p>
                    <ul class="space-y-5 flex-grow text-sm font-bold text-gray-600 uppercase italic">
                        <li>✅ Presencia en el directorio</li>
                        <li>✅ Datos generales de empresa</li>
                        <li class="opacity-30">❌ Botón de WhatsApp Directo</li>
                        <li class="opacity-30">❌ Sello de Empresa Verificada</li>
                    </ul>
                    <a href="https://wa.me/{{ $siteSettings['whatsapp'] }}?text=%C2%A1Hola%20Vi%20la%20web%20de%20ZapatosGuanajuato.com%20y%20me%20gustar%C3%ADa%20registrar%20mi%20negocio%20en%20el%20Plan%20B%C3%A1sico%20gratuito.%20%C2%BFQu%C3%A9%20datos%20necesito%20enviar%3F"
                        id="btn-wa-basico"
                        class="mt-12 block text-center py-5 border-2 border-gray-900 rounded-2xl font-black uppercase text-[10px] tracking-[0.3em] hover:bg-gray-900 hover:text-white transition-all"
                        target="_blank">
                        Registrar ahora
                    </a>
                </div>

                {{-- Premium SAPICA --}}
                <div class="bg-indigo-600 p-12 rounded-[2rem] flex flex-col h-full shadow-2xl shadow-indigo-500/40 relative transform hover:scale-105 transition-all">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-black text-white text-[8px] font-black px-6 py-2 rounded-full uppercase tracking-[0.3em]">MÁS POPULAR</div>
                    <h4 class="text-xs font-black uppercase tracking-[0.3em] text-indigo-200 mb-2 italic">Perfil Premium</h4>
                    <p class="text-4xl font-black text-white mb-2 italic uppercase underline decoration-black underline-offset-8">1 año gratis</p>
                    <p class="text-[9px] font-black text-indigo-900 uppercase tracking-widest mb-8 italic">Oferta limitada SAPICA 2026</p>
                    <ul class="space-y-5 flex-grow text-sm font-bold text-white uppercase italic">
                        <li>🔥 Botón de WhatsApp Ilimitado</li>
                        <li>🔥 Sello de Empresa Verificada</li>
                        <li>🔥 Galería de Modelos Destacada</li>
                        <li>🔥 Reportes Mensuales de Tráfico</li>
                    </ul>
                    <a href="https://wa.me/{{ $siteSettings['whatsapp'] }}?text=%C2%A1Hola%21%20Me%20interesa%20el%20Plan%20Premium%20%28Promo%20SAPICA%202026%29.%20Estuve%20en%20la%20feria%20y%20quiero%20activar%20mi%20a%C3%B1o%20gratis%20para%20mi%20marca."
                        id="btn-wa-premium"
                        class="mt-12 block text-center py-5 bg-white text-gray-900 rounded-2xl font-black uppercase text-[10px] tracking-[0.3em] hover:bg-gray-900 hover:text-white transition-all"
                        target="_blank">
                        Obtener 1 año gratis
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Agencia Solucion-E (Cierre v1+v2) --}}
    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <p class="text-[10px] font-black uppercase tracking-[0.5em] text-indigo-600 mb-6">Aliado Tecnológico</p>
            <h2 class="text-4xl font-black uppercase italic mb-8 leading-tight">¿Buscas algo más que <br> un directorio?</h2>
            <p class="text-gray-600 text-lg mb-10 italic font-medium">
                Si tu empresa necesita una tienda en línea propia, posicionamiento SEO avanzado o gestión de redes sociales, <span class="font-bold">Solucion-</span><span class="text-red-800">e</span> es la agencia que lo hace posible.
            </p>
            <div class="flex justify-center">
                <a href="https://solucion-e.com.mx" target="_blank" class="inline-block border-b-4 border-indigo-600 pb-2 text-2xl font-black italic uppercase hover:text-indigo-600 transition-colors">
                    Conoce Solucion-E
                </a>
            </div>
        </div>
    </section>

</x-components-web.layouts-web.app>
