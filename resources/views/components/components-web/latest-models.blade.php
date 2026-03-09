    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tight">Nuevos Modelos</h2>
                    <p class="text-indigo-600 font-medium">Lo más reciente de nuestros Proveedores</p>
                </div>
                <a href="/modelos" class="text-sm font-bold text-gray-500 hover:text-indigo-600 transition">VER TODO →</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($newModels as $model)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="aspect-square overflow-hidden bg-gray-200 relative">
                        <img src="{{ asset('storage/' . $model->image) }}"
                            alt="{{ $model->name }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            loading="lazy"
                            width="400"
                            height="400">

                        <div class="absolute top-3 left-3">
                            <span class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                                ${{ Number::format($model->price, precision: 2) }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5">
                        <p class="text-xs text-indigo-600 font-bold uppercase tracking-widest mb-1">
                            {{ $model->business->name }}
                        </p>
                        <h3 class="text-lg font-bold text-gray-800 leading-tight mb-4">
                            {{ $model->name }}
                        </h3>

                        <a href="/modelo/{{ $model->id }}"
                        class="block w-full text-center bg-gray-900 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition-colors">
                            Ver Detalles
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
