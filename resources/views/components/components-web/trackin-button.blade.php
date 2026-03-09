@php
    $phone = preg_replace('/[^0-9]/', '', $business->whatsapp);
    $message = "Hola " . $business->name . ", vi tu catálogo en ZapatosGuanajuato.com y me interesa solicitar información.";
    $waUrl = "https://wa.me/" . $phone . "?text=" . urlencode($message);
@endphp

<div class="whatsapp-container w-full">
    <a href="{{ $waUrl }}"
       id="wa-track-btn-{{ $business->id }}"
       target="_blank"
       {{ $attributes->merge(['class' => 'inline-flex items-center justify-center w-full gap-2 px-8 py-4 bg-[#25D366] text-white font-bold rounded-xl hover:bg-[#128C7E] transition-all transform hover:scale-105 shadow-xl']) }}>
        <i class="fab fa-whatsapp text-2xl"></i>
        Contactar por WhatsApp
    </a>
</div>

<script>
    document.getElementById('wa-track-btn-{{ $business->id }}').addEventListener('click', function() {
        fetch("{{ route('tracking.click', $business->id) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => console.log('Tracking:', data.message))
        .catch(error => console.error('Error tracking:', error));
    });
</script>
