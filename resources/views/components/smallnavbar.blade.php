<nav class="bg-gray-200 shadow mb-4 p-4 md:px-0">
    <div class="container mx-auto">
        <div class="flex justify-between items-center  text-lg">
            <div>
                <a href="{{ route('monuments.' . $type, $id) }}" class="text-gray-800 hover:text-blue-600">Informācija</a>
                <a href="{{ route('monuments.' . $type .  '.oldImages', $id) }}" class="ml-4 text-gray-800 hover:text-blue-600">Vecās bildes</a>
                <a href=" {{ route('monuments.' . $type .  '.newImages', $id) }}" class="ml-4 text-gray-800 hover:text-blue-600">Jaunās bildes</a>
            </div>
            @if ($type == "show")
            <div class="hidden md:flex items-center space-x-4">
                <form action="{{ route('monuments.edit', $id)}}" method="GET">
                    <button type="submit" class="bg-sky-500 text-white py-2 px-4 rounded hover:bg-sky-700">Rediģēt objektu</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</nav>