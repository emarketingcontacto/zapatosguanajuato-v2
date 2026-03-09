{{-- 1. Schema para las Migas de Pan (Breadcrumbs) --}}
<script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "{{ $parentName }}",
        "item": "{{ $parentUrl }}"
    },{
        "@type": "ListItem",
        "position": 2,
        "name": "{{ $filterName }}"
    }]
    }
</script>

{{-- 2. Schema para el Listado de Negocios --}}
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "Catálogo de {{ $filterName }} - {{ $parentName }}",
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
