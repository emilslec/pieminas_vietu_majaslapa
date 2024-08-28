<nav class="bg-cyan-200 shadow mb-4 p-4">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center text-base md:text-xl">
            <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 mb-2 md:mb-0">
                <a href="{{ route('monuments.' . $type, $id) }}" class="hover:text-blue-600">Informācija</a>
                <a href="{{ route('monuments.' . $type . '.oldImages', $id) }}" class="hover:text-blue-600">Vēsturiskie attēli</a>
                <a href="{{ route('monuments.' . $type . '.newImages', $id) }}" class="hover:text-blue-600">Aktuālie attēli</a>
                <a href="{{ route('monuments.' . $type . '.documents', $id) }}" class="hover:text-blue-600">Citi dokumenti</a>
            </div>
            @auth
            <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-32 items-center">
                @if ($type == "show")
                <form action="{{ route('monuments.edit', $id) }}" method="GET" class="flex justify-center">
                    <button type="submit" class="bg-sky-500 text-white py-2 px-4 rounded hover:bg-sky-700 w-full md:w-auto">Rediģēt objektu</button>
                </form>
                @else
                <a href="{{ route('monuments.show', $id) }}" class="hover:text-blue-600">Atpakaļ uz objektu</a>
                <form action="{{ route('monuments.destroy', $id) }}" method="POST" class="flex justify-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Vai Jūs tiešām vēlaties dzēst objektu?')" class="bg-amber-500 text-white py-2 px-4 rounded hover:bg-amber-700 w-full md:w-auto">Dzēst objektu</button>
                </form>
                @endif
            </div>
            @endauth
        </div>
    </div>
</nav>