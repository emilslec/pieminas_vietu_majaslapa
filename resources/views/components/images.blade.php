<div id="fullscreen-container" class="hidden fixed inset-0 bg-black flex items-center justify-center z-50">
    <img id="fullscreen-image" class="max-w-full max-h-full">
    <button id="close-fullscreen" class="absolute top-4 right-4 bg-gray-700 text-white px-4 py-2 rounded">Close</button>
</div>
<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-2xl font-semibold mb-4">{{$name}} attēli:</h2>
        <div class="grid grid-cols-5 gap-4">

            @foreach ($images as $image)
            <div>
                <img src="{{ asset('storage/' . $image->path) }}" alt="Monument Image" class="w-full h-auto shadow" onclick="openFullscreen('{{ asset('storage/' . $image->path) }}')">
            </div>

            @endforeach
        </div>
    </div>
</div>