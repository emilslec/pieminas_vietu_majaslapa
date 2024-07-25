<nav class="bg-cyan-200 shadow  mb-4 p-4 md:px-0">
    <div class="container mx-auto">
        <div class="flex justify-between items-center  text-xl">
            <div>
                <a href="{{ route('monuments.' . $type, $id) }}" class=" hover:text-blue-600">Informācija</a>
                <a href="{{ route('monuments.' . $type .  '.oldImages', $id) }}" class="ml-4  hover:text-blue-600">Vēsturiskie attēli</a>
                <a href=" {{ route('monuments.' . $type .  '.newImages', $id) }}" class="ml-4  hover:text-blue-600">Aktuālie attēli</a>
                <a href=" {{ route('monuments.' . $type .  '.documents', $id) }}" class="ml-4  hover:text-blue-600">Citi dokumenti</a>
            </div>
            @auth
            @if ($type == "show")
            <div class="md:flex items-center space-x-4">
                <form action="{{ route('monuments.edit', $id)}}" method="GET">
                    <button type="submit" class="bg-sky-500 text-white py-2 px-4 rounded hover:bg-sky-700">Rediģēt objektu</button>
                </form>
            </div>
            @else
            <a href=" {{ route('monuments.show', $id) }}" class="ml-4  hover:text-blue-600">Atpakaļ uz objektu</a>
            <form action="{{ route('monuments.destroy', $id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Vai Jūs patiešām vēlaties dzēst objektu?')" class="bg-amber-500 text-white py-2 px-4 rounded hover:bg-amber-700">Dzēst objektu</button>
            </form>
        </div>
        @endif
        @endif
    </div>
    </div>
</nav>