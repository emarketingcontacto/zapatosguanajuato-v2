<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "{{ $business->name }}",
        "image": "{{ asset('storage/' . $business->image) }}",
        "description": "{{ $business->description }}",
        "telephone": "{{ $business->phone ?? $business->whatsapp }}",
        "url": "{{ url()->current() }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "{{ $business->street_number }}",
            "addressLocality": "{{ $business->city }}",
            "addressRegion": "Guanajuato",
            "addressCountry": "MX"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": {{ $business->lat ?? '21.1219' }}, {{-- Coordenadas de León por defecto --}}
            "longitude": {{ $business->lon ?? '-101.6825' }}
        }
    }
</script>
