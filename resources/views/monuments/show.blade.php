<!-- Example usage in a Blade view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>{{$monument->title}}</title>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Include the small navbar component -->
    <x-navbar />
    <!-- resources/views/components/small-navbar.blade.php -->

    <x-smallnavbar :id="$monument->id" />

    <!-- Main Content -->
    <div class="container mx-auto p-4">
        <!-- Existing content here -->

        <div class="bg-white rounded-lg shadow p-6 mb-6 flex justify-between items-start">
            <!-- Image Section -->
            <div class="w-1/4 p-4">
                @isset ($monument->oldImages[0])
                <img alt="Monument Image" class="w-full h-auto rounded-lg shadow" src="{{asset('storage/' . $monument->oldImages[0]->path)}}">
                @else
                <img alt="Monument Image" class="w-full h-auto rounded-lg shadow" src="{{asset('storage/images/default.png')}}">
                @endif
            </div>

            <!-- Content Section -->
            <div class="w-3/4 p-4 space-y-4">

                <h2 class="text-2xl font-semibold mb-2">{{ $monument->title }}</h2>

                <div class="flex flex-row items-center space-x-2">
                    <label class="font-semibold">Tips:</label>
                    <span>{{ $monument->type->title }}</span>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <label class="font-semibold">Pagasts:</label>
                    <span>{{ $monument->state }}</span>
                </div>
                <div class="flex flex-row items-center space-x-2">
                    <label class="font-semibold">Atrašanās vieta:</label>
                    <span>{{ $monument->location }}</span>
                </div>
                <div>
                    <label class="font-semibold">Apraksts:</label>
                    <p class="text-sm mb-4">{{ $monument->description }}</p> <!-- Changed text-lg to text-sm -->
                </div>
            </div>
        </div>



</body>

</html>