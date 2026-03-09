<nav x-data="{ open: false, atTop: true }"
     @scroll.window="atTop = (window.pageYOffset > 10 ? false : true)"
     :class="{ 'bg-white shadow-md py-2': !atTop, 'bg-transparent py-4': atTop }"
     class="fixed w-full z-50 transition-all duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="flex items-center space-x-2">

                <span :class="{ 'text-indigo-600': !atTop, 'text-white': atTop }"
                    class="text-2xl font-black tracking-tighter transition-colors drop-shadow-md">
                     ZAPATOS<span class="font-light">GUANAJUATO</span>
                </span>



                </a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="/fabricantes-calzado-guanajuato"
                   :class="{ 'text-gray-700 hover:text-indigo-600': !atTop, 'text-white hover:text-indigo-200': atTop }"
                   class="font-medium transition-colors">Fabricantes</a>

                <a href="/mayoristas-calzado-guanajuato"
                   :class="{ 'text-gray-700 hover:text-indigo-600': !atTop, 'text-white hover:text-indigo-200': atTop }"
                   class="font-medium transition-colors">Mayoristas</a>

                <a href="/minoristas-calzado-guanajuato"
                   :class="{ 'text-gray-700 hover:text-indigo-600': !atTop, 'text-white hover:text-indigo-200': atTop }"
                   class="font-medium transition-colors">Minoristas</a>

                <a href="{{route('web.advertise')}}"
                   class="bg-indigo-600 text-white px-5 py-2 rounded-full font-bold hover:bg-indigo-700 transition shadow-lg">
                    Anúnciate Aquí
                </a>
            </div>

            <div class="md:hidden flex items-center">
                <button @click="open = !open"
                        :class="{ 'text-gray-800': !atTop, 'text-white': atTop }"
                        class="outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open"
         x-transition
         class="md:hidden bg-white border-b border-gray-100 shadow-xl">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{route('factories.index')}}" class="block px-3 py-2 text-gray-700 font-medium">Fabricantes</a>
            <a href="{{route('wholesalers.index')}}" class="block px-3 py-2 text-gray-700 font-medium">Mayoristas</a>
            <a href="{{route('retailers.index')}}" class="block px-3 py-2 text-gray-700 font-medium">Minoristas</a>
            <a href="{{route('web.advertise')}}" class="block px-3 py-2 text-indigo-600 font-bold">Anúnciate</a>
        </div>
    </div>
</nav>
