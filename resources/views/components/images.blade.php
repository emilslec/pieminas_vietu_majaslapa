<x-image-fulscreen />
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