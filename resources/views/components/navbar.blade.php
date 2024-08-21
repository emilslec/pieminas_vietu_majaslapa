<nav class="bg-orange-500 text-white mb-8 py-4">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between items-center mx-4 sm:mx-10 py-4">
            <div class="text-3xl sm:text-4xl font-bold mb-2 sm:mb-0">
                <a href="{{ route('monuments.index') }}">Sākums</a>
            </div>
            <div class="flex flex-col md:flex-row md:items-center text-lg sm:text-xl space-y-4 md:space-y-0 md:space-x-6 lg:space-x-10">
                @guest
                <a href="{{ route('login') }}" class="hover:text-stone-200">Autorizēties</a>
                @else
                <a href="{{ route('monuments.create') }}" class="hover:text-stone-200">Pievienot objektu</a>
                <p class="">
                    Pievienojies kā: {{ auth()->user()->username }}
                </p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:text-stone-200">
                        Iziet
                    </button>
                </form>
                @endguest
            </div>
        </div>
    </div>
</nav>