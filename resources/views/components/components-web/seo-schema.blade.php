@if ($type === 'itemList')
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "itemListElement": [
            @foreach ($collection as $business)
            {
                "@type": "ListItem",
                "position": {{ $loop->iteration }},
                "url": "{{ route($routeName, $business->slug) }}",
                "name": "{{ $business->name }}"
            }@if (!$loop->last),@endif
            @endforeach
        ]
    }
    </script>
@endif
