{{-- @props(['business' => null, 'gender' => null, 'type' => null]) --}}

<nav class="flex py-6 px-4 text-gray-600 text-[10px] font-black uppercase tracking-[0.2em]" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-y-0 flex-wrap" itemscope itemtype="https://schema.org/BreadcrumbList">

        {{-- 1. Inicio --}}
        <li class="inline-flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="/" itemprop="item" class="hover:text-indigo-600">
                <span itemprop="name">Inicio</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>

        @php $pos = 2; @endphp

        {{-- 2. Base (Fabricantes/Mayoristas...) --}}
        @if($baseLabel)
            <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="mx-3 text-gray-300">/</span>
                <a href="{{ $baseRoute }}" itemprop="item" class="{{ !isset($gender) ? 'text-indigo-600' : 'hover:text-indigo-600' }}">
                    <span itemprop="name">{{ $baseLabel }}</span>
                </a>
                <meta itemprop="position" content="{{ $pos++ }}" />
            </li>
        @endif

        {{-- 3. Género --}}

        @if($gender)
            <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="mx-3 text-gray-300">/</span>
                <a href="{{ url(Request::segment(1) . '/genero/' . ($genderSlug ?? Str::slug($gender))) }}" itemprop="item" class="{{ !isset($type) ? 'text-indigo-600' : 'hover:text-indigo-600' }}">
                    <span itemprop="name">{{ $gender }}</span>
                </a>
                <meta itemprop="position" content="{{ $pos++ }}" />
            </li>
        @endif

        {{-- 4. Tipo (Ej: Ortopédico) --}}
        @if($type)
            <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="mx-3 text-gray-300">/</span>
                <a href="{{ url()->current() }}" itemprop="item" class="{{ !isset($business) ? 'text-indigo-600' : 'hover:text-indigo-600' }}">
                    <span itemprop="name">{{ $type }}</span>
                </a>
                <meta itemprop="position" content="{{ $pos++ }}" />
            </li>
        @endif

       {{-- 5. Business (Ficha del Fabricante) --}}

        @if(isset($business))
            <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="mx-3 text-gray-300">/</span>
                {{-- Al ser el último nivel, usamos aria-current para accesibilidad y SEO --}}
                <a href="{{ url()->current() }}" itemprop="item" aria-current="page" class="text-indigo-600 font-bold">
                    <span itemprop="name">{{ $business->name }}</span>
                </a>
                <meta itemprop="position" content="{{ $pos }}" />
            </li>
        @endif

    </ol>
</nav>


