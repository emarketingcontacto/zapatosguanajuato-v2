<section class="py-20 bg-indigo-600 border-t border-indigo-700">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-indigo-200 font-black text-[10px] uppercase tracking-[0.3em] mb-2 block">Explora más opciones</span>
                <h2 class="text-3xl font-black text-white uppercase italic">También te podría interesar</h2>
            </div>
            <a href="{{ route($prefix . '.index') }}" class="text-[10px] font-black uppercase tracking-widest text-indigo-200 hover:text-white transition-colors border-b border-indigo-400 pb-1">
                Ver todos los {{ $prefix == 'factories' ? 'fabricantes' : ($prefix == 'wholesalers' ? 'mayoristas' : 'minoristas') }} →
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($relatedModels as $related)
                <div class="group">
                    <x-components-web.shoe-card :model="$related" />
                    <p class="mt-3 text-[9px] text-indigo-200 font-bold uppercase tracking-tighter italic">
                        Negocio: <span class="text-white">{{ $related->business->name }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
