<div id="fullscreen-container" class="hidden fixed inset-0 bg-black flex items-center justify-center z-50">
    <img id="fullscreen-image" class="max-w-full max-h-full">
    <button id="close-fullscreen" class="absolute top-4 right-4 bg-gray-700 text-white px-4 py-2 rounded">Aizvērt</button>
</div>
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">{{ $name }}</h2>
    <div class="">
        <div class="grid grid-cols-4 gap-4">
            @foreach ($images as $image)
            <div class="bg-white rounded-lg shadow flex justify-center p-6 mb-6">
                <img src="{{ asset('storage/' . $image->path) }}" alt="Monument Image" class="w-48 h-48 object-cover shadow" onclick="openFullscreen('{{ asset('storage/' . $image->path) }}')">
            </div>
            @endforeach
        </div>
    </div>
</div>