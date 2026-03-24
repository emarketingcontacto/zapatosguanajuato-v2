@php
    $siteSettings = \App\Models\SiteSetting::all()->pluck('value', 'key');
@endphp

<x-components-web.layouts-web.app>

    @section('title', 'Beneficios para Fabricantes')
    @section('description', 'Beneficios de suscripcion')

    {{-- @section('content') --}}
    <div class="bg-gray-50">
        {{-- 1. Hero Section: Impacto Inmediato --}}
        <section class="relative py-20 bg-gray-900 overflow-hidden">
            {{-- Mismo estilo que el Home para coherencia --}}
            <div class="absolute inset-0 opacity-20">
                <img src="{{ asset('images/hero.webp') }}" class="w-full h-full object-cover">
            </div>

            <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
                <span class="inline-block px-4 py-1 mb-6 text-[10px] font-black tracking-[0.3em] text-indigo-400 uppercase bg-indigo-400/10 rounded-full border border-indigo-400/20">
                    Programa Exclusivo SAPICA 2026
                </span>
                <h1 class="text-4xl md:text-6xl font-black text-white leading-tight uppercase italic tracking-tighter">
                    TU FÁBRICA <span class="text-indigo-500">CONECTADA</span> <br> CON EL MUNDO
                </h1>
                <p class="mt-6 text-xl text-gray-400 max-w-2xl mx-auto font-medium">
                    No somos solo un directorio. Somos la plataforma tecnológica que pone tu catálogo frente a miles de compradores mayoristas.
                </p>
            </div>
        </section>

        {{-- 2. La Prueba Social: El "Live Counter" --}}
        <section class="relative -mt-12 z-20 px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-[2rem] shadow-2xl p-8 md:p-12 border border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-gray-100">
                    <div>
                        <p class="text-4xl font-black text-gray-900 italic tracking-tighter">{{ $totalClicks }}</p>
                        <p class="text-[10px] font-black text-indigo-600 uppercase tracking-widest mt-2">Conexiones Directas</p>
                    </div>
                    <div class="pt-6 md:pt-0">
                        <p class="text-4xl font-black text-gray-900 italic tracking-tighter">+45k</p>
                        <p class="text-[10px] font-black text-indigo-600 uppercase tracking-widest mt-2">Impresiones en Google</p>
                    </div>
                    <div class="pt-6 md:pt-0">
                        <p class="text-4xl font-black text-gray-900 italic tracking-tighter">100%</p>
                        <p class="text-[10px] font-black text-indigo-600 uppercase tracking-widest mt-2">Transparencia</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- 3. Grid de Beneficios --}}
        <section class="py-24 max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Beneficio 1: SEO --}}
                <div class="bg-white p-10 rounded-[2rem] border border-gray-100 hover:shadow-xl transition-all group">
                    <div class="w-12 h-12 bg-gray-900 text-white rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black uppercase tracking-tight mb-4">Aparece en Google</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Optimizamos tu perfil para que cuando alguien busque "Fábricas en León", tú estés ahí sin pagar un solo centavo en anuncios.</p>
                </div>

                {{-- Beneficio 2: WhatsApp Directo --}}
                <div class="bg-white p-10 rounded-[2rem] border border-gray-100 hover:shadow-xl transition-all group">
                    <div class="w-12 h-12 bg-gray-900 text-white rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        {{-- <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967..."></path></svg> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-currency-dollar text-center pt-2 px-2" viewBox="0 0 24 24">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-black uppercase tracking-tight mb-4">Venta Directa</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Sin intermediarios ni comisiones ocultas. El comprador hace clic y te escribe directamente a tu WhatsApp de ventas.</p>
                </div>

                {{-- Beneficio 3: Métricas --}}
                <div class="bg-white p-10 rounded-[2rem] border border-gray-100 hover:shadow-xl transition-all group">
                    <div class="w-12 h-12 bg-gray-900 text-white rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-black uppercase tracking-tight mb-4">Datos Reales</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Accede a reportes mensuales de cuántas personas vieron tu marca y cuántos clics recibiste. Lo que no se mide, no crece.</p>
                </div>
            </div>
        </section>

        {{-- 4. Call to Action: La oferta de SAPICA --}}
        <section class="bg-indigo-600 py-20 text-white">
            <div class="max-w-4xl mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-5xl font-black uppercase italic tracking-tighter mb-8">
                    TU PRIMER AÑO ES <span class="text-black">100% GRATUITO</span>
                </h2>
                <p class="text-indigo-100 text-lg mb-12 font-medium">
                    Estamos tan seguros de nuestra tecnología que te regalamos 12 meses de suscripción Premium. Si te funciona, hablamos. Si no, seguimos siendo amigos.
                </p>
                <a
                    href="https://wa.me/{{ $siteSettings['whatsapp'] }}?text=Hola!%20Me%20interesa%20activar%20mi%20fábrica%20gratis%20por%20un%20año"
                    class="inline-block bg-gray-900 text-white px-12 py-5 rounded-2xl font-black uppercase tracking-widest hover:bg-white hover:text-indigo-600 transition-all shadow-2xl">
                    Activar mi marca ahora
                </a>
            </div>
        </section>
    </div>
    {{-- @endsection --}}

</x-components-web.layouts-web.app>
