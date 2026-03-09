<section class="py-2">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white rounded-[3rem] shadow-xl shadow-gray-200/50 overflow-hidden border border-gray-100">
            <div class="flex flex-col lg:flex-row">

                {{-- Fachada de la Fábrica --}}
                <div class="lg:w-2/5 relative bg-gray-900 min-h-[400px]">
                    <img src="{{ asset('storage/' . $business->image) }}"
                         alt="{{ $business->name }}"
                         class="w-full h-full object-cover opacity-70">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent"></div>
                    <div class="absolute top-8 left-8">
                        <div class="flex items-center gap-2 bg-indigo-800 backdrop-blur-md border border-white/20 px-4 py-2 rounded-2xl">
                            <span class="text-white text-[14px] font-black uppercase tracking-widest italic">
                                {{ $business->category->name ?? 'Fabricante' }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Información Detallada --}}
                <div class="lg:w-3/5 p-8 lg:p-14">

                    {{-- Bloque: Especialización (Géneros) --}}
                    <div class="mb-8">
                        <h2 class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.3em] mb-6">Especialización</h2>
                        <div class="flex items-start">
                            <div class="bg-indigo-50 p-3 rounded-2xl mr-4 text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-black uppercase mb-1">Enfoque de Calzado</p>
                                <div class="flex flex-wrap gap-1 mt-2">
                                    @foreach($genders as $gender)
                                        <span class="text-[9px] bg-gray-900 text-white px-2 py-1 rounded-md uppercase font-black">
                                            {{ Str::ucfirst($gender) }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Condiciones de Venta (v2) --}}
                    @if($business->saleType)
                    <div class="my-8 py-4 pt-2 px-5 border-t border-gray-100 bg-gray-50 rounded-2xl">
                        <h3 class="text-[10px] font-black text-indigo-600 uppercase tracking-widest mb-3">Modalidad: {{ $business->saleType->name }}</h3>
                        <p class="text-gray-600 leading-relaxed text-sm italic">
                            "{{ $business->saleType->conditions }}"
                        </p>
                    </div>
                    @endif

                    {{-- Bloque: Ubicación y Contacto --}}
                    <div class="mt-10">
                        <h2 class="text-[10px] font-black text-indigo-600 uppercase tracking-[0.3em] mb-6">Ubicación y Contacto</h2>

                        {{-- Grid Responsivo para contacto --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="flex items-start">
                                <div class="bg-green-50 p-3 rounded-2xl mr-4 text-green-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-black uppercase mb-1">Atención Directa</p>
                                    <p class="text-gray-700 font-bold leading-tight">{{ $business->contact_person ?? 'Depto. Ventas' }}</p>
                                    <p class="text-indigo-600 font-black text-sm">{{ $business->phone ?? $business->whatsapp }}</p>
                                </div>
                            </div>

                            @if($business->email)
                            <div class="flex items-start">
                                <div class="bg-indigo-50 p-3 rounded-2xl mr-4 text-indigo-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-400 font-black uppercase mb-1">Email Corporativo</p>
                                    <p class="text-gray-700 font-bold text-sm truncate w-full max-w-[150px]">{{ $business->email }}</p>
                                </div>
                            </div>
                            @endif
                        </div>

                        {{-- Planta de Producción --}}
                        <div class="flex items-start mt-8">
                            <div class="bg-indigo-50 p-3 rounded-2xl mr-4 text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-black uppercase mb-1">Planta de Producción</p>
                                <p class="text-gray-700 font-bold leading-tight">
                                    {{ $business->street_number }}, Col. {{ $business->neighborhood }}<br>
                                    {{ $business->city }}, {{ $business->state }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Mapa --}}
                    @if($business->lat && $business->lon)
                    <div class="mt-6 pt-8 border-t border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-[10px] font-black text-indigo-600 uppercase tracking-widest">Localización exacta</h3>
                            <a href="https://www.google.com/maps?q={{ $business->lat }},{{ $business->lon }}" target="_blank" class="text-[10px] font-black text-gray-400 hover:text-indigo-600 uppercase transition-colors">Ver en Google Maps →</a>
                        </div>
                        <div class="w-full h-[300px] rounded-[2rem] overflow-hidden border border-gray-100 shadow-inner">
                            <gmp-map center="{{ $business->lat }},{{ $business->lon }}" zoom="16" map-id="DEMO_MAP_ID" class="w-full h-full">
                                <gmp-advanced-marker position="{{ $business->lat }},{{ $business->lon }}" title="{{ $business->name }}"></gmp-advanced-marker>
                            </gmp-map>
                        </div>
                    </div>
                    @endif

                    {{-- Redes Sociales --}}
                    <div class="mt-8 flex flex-wrap gap-4">
                        @if($business->facebook)
                            <a href="{{ $business->facebook }}" target="_blank" class="flex-1 min-w-[120px] bg-[#1877F2] text-white py-3 px-6 rounded-2xl font-black text-[10px] uppercase tracking-widest text-center hover:opacity-90 transition-opacity">Facebook</a>
                        @endif
                        @if($business->website)
                            <a href="{{ $business->website }}" target="_blank" class="flex-1 min-w-[120px] bg-gray-800 text-white py-3 px-6 rounded-2xl font-black text-[10px] uppercase tracking-widest text-center hover:bg-black transition-colors">Sitio Web</a>
                        @endif
                        <x-components-web.trackin-button :business="$business"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Script de Google Maps con soporte para Advanced Markers --}}
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=marker&v=beta"></script>
