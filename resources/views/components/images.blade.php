<div class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-2xl font-semibold mb-4">{{$name}} attēli:</h2>
        <div class="grid grid-cols-3 gap-4">

            @foreach ($images as $image)
            <div>
                <img src="{{ asset('storage/' . $image->path) }}" alt="Monument Image" class="w-full h-auto rounded-lg shadow">
            </div>
            @endforeach
        </div>
    </div>
</div>