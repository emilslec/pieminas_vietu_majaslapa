<div id="fullscreen-container" class="hidden fixed inset-0 bg-black flex items-center justify-center z-50">
    <div class="relative flex flex-col w-full h-full">
        <div class="flex justify-center items-center h-[90%]">
            <img id="fullscreen-image" class="max-h-full object-contain">
        </div>
        <div id="image-description" class="w-full bg-white text-black py-3 px-6 absolute bottom-0 left-0 text-lg h-24 flex">
        </div>
        <button id="close-fullscreen" class="absolute top-4 right-4 bg-gray-700 text-white px-4 py-2 rounded">Aizvērt</button>
    </div>
</div>
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">{{ $name }}</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach ($images as $image)
        <div class="bg-white rounded-lg shadow flex justify-center p-3 mb-6">
            <img src="{{ asset('storage/' . $image->path) }}" alt="Monument Image" class="w-32 h-32 sm:w-48 sm:h-48 object-cover shadow cursor-pointer"
                onclick="openFullscreen('{{ asset('storage/' . $image->path) }}', '{{ $image->description }}')">
        </div>
        @endforeach
    </div>
</div>