<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-black text-gray-900 uppercase text-center mb-12">
            Preguntas Frecuentes <span class="text-indigo-600">sobre {{$categoryName}}</span>
        </h2>

        <div class="space-y-4" x-data="{ active: null }">
            @foreach($faqs as $index => $faq)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    {{-- Pregunta: Añadimos atributos ARIA para accesibilidad --}}
                    <button
                        @click="active !== {{ $index }} ? active = {{ $index }} : active = null"
                        class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        :aria-expanded="active === {{ $index }} ? 'true' : 'false'"
                        aria-controls="faq-answer-{{ $index }}"
                    >
                        <h3 class="text-lg font-bold text-gray-800 leading-tight">
                            {{ $faq['question'] }}
                        </h3>
                        <svg
                            class="w-5 h-5 text-indigo-500 transform transition-transform duration-300"
                            :class="active === {{ $index }} ? 'rotate-180' : ''"
                            aria-hidden="true"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    {{-- Respuesta: Conectada mediante ID con el botón --}}
                    <div
                        id="faq-answer-{{ $index }}"
                        x-show="active === {{ $index }}"
                        x-collapse
                        role="region"
                        class="px-6 pb-5"
                    >
                        <div class="prose prose-indigo text-gray-600">
                            {!! $faq['answer'] !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- SEO: JSON-LD para Google (Impecable) --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        @foreach($faqs as $faq)
        {
          "@type": "Question",
          "name": "{{ $faq['question'] }}",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "{{ addslashes(strip_tags($faq['answer'])) }}"
          }
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
      ]
    }
    </script>
</section>
