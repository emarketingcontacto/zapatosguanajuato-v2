@props(['business' => null, 'category' => null, 'gender' => null, 'type' => null])

<nav class="flex py-6 px-4 text-gray-600 text-[10px] font-black uppercase tracking-[0.2em]" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-y-0 flex-wrap" itemscope itemtype="https://schema.org/BreadcrumbList">

        {{-- Inicio --}}
        <li class="inline-flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="/" itemprop="item" class="hover:text-indigo-600 transition-colors">
                <span itemprop="name">Inicio</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>

        {{-- Nivel 1: Tipo de Negocio --}}
        @php $pos = 2; @endphp
        @if(Request::is('fabricantes*') || Request::is('mayoristas*') || Request::is('minoristas*'))
            <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="mx-3 text-gray-300" aria-hidden="true">/</span>
                @if(Request::is('fabricantes*'))
                    <a href="{{ route('factories.index') }}" itemprop="item" class="{{ !isset($business) && !isset($gender) ? 'text-indigo-600' : 'hover:text-indigo-600' }}">
                        <span itemprop="name">Fabricantes</span>
                    </a>
                @elseif(Request::is('mayoristas*'))
                    <a href="{{ route('wholesalers.index') }}" itemprop="item" class="{{ !isset($business) && !isset($gender) ? 'text-indigo-600' : 'hover:text-indigo-600' }}">
                        <span itemprop="name">Mayoristas</span>
                    </a>
                @elseif(Request::is('minoristas*'))
                    <a href="{{ route('retailers.index') }}" itemprop="item" class="{{ !isset($business) && !isset($gender) ? 'text-indigo-600' : 'hover:text-indigo-600' }}">
                        <span itemprop="name">Minoristas</span>
                    </a>
                @endif
                <meta itemprop="position" content="{{ $pos++ }}" />
            </li>
        @endif

        {{-- Nivel 2: Género --}}
        @if(isset($gender))

            <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="mx-3 text-gray-300" aria-hidden="true">/</span>
                {{-- <span itemprop="name" class="{{ !isset($type) && !isset($business) ? 'text-indigo-600' : '' }}">{{ $gender }}</span> --}}
                <a class="text-indigo-600" href="{{route('factories.gender',$gender)}}">{{$gender}}</a>
                <meta itemprop="position" content="{{ $pos++ }}" />
            </li>

        @endif

        {{-- Nivel 3: Tipo --}}
        @if(isset($type))
            <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="mx-3 text-gray-300" aria-hidden="true">/</span>
                <span itemprop="name" class="{{ !isset($business) ? 'text-indigo-600' : '' }}">{{ $type }}</span>
                <meta itemprop="position" content="{{ $pos++ }}" />
            </li>
        @endif

        {{-- Nivel 4: Negocio --}}
        @if(isset($business))
            <li class="flex items-center" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span class="mx-3 text-gray-300" aria-hidden="true">/</span>
                <span itemprop="name" class="text-gray-900" aria-current="page">{{ $business->name }}</span>
                <meta itemprop="position" content="{{ $pos++ }}" />
            </li>
        @endif
    </ol>
</nav>
{{-- </nav> --}}
