<footer class="bg-gray-900 border-t border-white/5 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            {{-- Columna 1: Branding --}}
            <div class="col-span-1 md:col-span-1">
                <a href="/" class="text-2xl font-black text-white uppercase italic tracking-tighter">
                    Zapatos<span class="text-indigo-500">Guanajuato</span>
                </a>
                <p class="mt-4 text-gray-400 text-sm leading-relaxed font-medium">
                    El directorio digital más importante del sector calzado en Guanajuato. Conectamos talento local con el mundo.
                </p>
            </div>

            {{-- Columna 2: Navegación --}}
            <div>
                <h4 class="text-white font-black uppercase text-[10px] tracking-[0.3em] mb-6">Explorar</h4>
                <ul class="space-y-4 text-gray-400 text-xs font-bold uppercase">
                    <li><a href="{{ route('factories.index') }}" class="hover:text-indigo-400 transition-colors">Fábricas (Mayoreo)</a></li>
                    <li><a href="{{ route('retailers.index') }}" class="hover:text-indigo-400 transition-colors">Minoristas (Menudeo)</a></li>
                    <li><a href="#" class="hover:text-indigo-400 transition-colors">Próximos Eventos</a></li>
                </ul>
            </div>

            {{-- Columna 3: Servicios Agencia --}}
            <div>
                <h4 class="text-white font-black uppercase text-[10px] tracking-[0.3em] mb-6">Soluciones Web</h4>
                <ul class="space-y-4 text-gray-400 text-xs font-bold uppercase">
                    <li><a href="https://solucion-e.com.mx" target="_blank" class="hover:text-indigo-400 transition-colors">Marketing para Fábricas</a></li>
                    <li><a href="#" class="hover:text-indigo-400 transition-colors">Catálogos Digitales</a></li>
                    <li><a href="{{route('web.advertise')}}" class="hover:text-indigo-400 transition-colors">Anúnciate aquí</a></li>
                </ul>
            </div>

            {{-- Columna 4: Contacto --}}
            <div>
                <h4 class="text-white font-black uppercase text-[10px] tracking-[0.3em] mb-6">Contacto</h4>
                <a href="https://wa.me/tu_numero" class="inline-flex items-center gap-2 bg-white/5 border border-white/10 px-4 py-3 rounded-xl text-white text-[10px] font-black uppercase hover:bg-indigo-600 transition-all">
                    <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967..."/>
                    </svg>
                    Soporte Directo
                </a>
            </div>
        </div>

        <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">
                © {{ date('Y') }} Zapatos Guanajuato v2.0 - Desarrollado por
                <a href="https://solucion-e.com.mx" class="text-white hover:text-indigo-400">Solucion-E</a>
            </p>
            <div class="flex gap-6">
                {{-- Iconos Redes Sociales sutiles --}}
            </div>
        </div>
    </div>
</footer>
