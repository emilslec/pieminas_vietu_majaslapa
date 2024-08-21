<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>{{ $monument->title }}</title>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <!-- Include the small navbar component -->
    <x-navbar />

    <!-- resources/views/components/small-navbar.blade.php -->
    <x-smallnavbar type="show" :id="$monument->id" />

    <!-- Main Content -->
    <div class="container mx-auto p-4">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6 flex flex-wrap items-start space-y-4 md:space-y-0 md:flex-nowrap">
            <!-- Image Section -->
            <div class="w-full md:w-1/4 p-4">
                <img alt="Monument Image" class="w-full h-auto rounded-lg shadow" src="{{ $monument->coverPath() }}">
            </div>

            <!-- Content Section -->
            <div class="w-full md:w-3/4 p-4 space-y-4">
                <h2 class="text-2xl font-semibold mb-2">{{ $monument->title }}</h2>

                <div class="flex flex-wrap items-center space-x-2">
                    <label class="font-semibold">Numurs:</label>
                    <span>{{ $monument->id }}</span>
                </div>
                <div class="flex flex-wrap items-center space-x-2">
                    <label class="font-semibold">Objeka tips/tipi:</label>
                    <span>
                        @foreach ($monument->types as $type)
                        {{ $type->title }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </span>
                </div>
                <div class="flex flex-wrap items-center space-x-2">
                    <label class="font-semibold">Hronoloģija:</label>
                    <span>
                        @foreach ($monument->intervals as $interval)
                        {{ $interval->title }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </span>
                </div>
                <div class="flex flex-wrap items-center space-x-2">
                    <label class="font-semibold">Pilsēta vai pagasts:</label>
                    <span>{{ $monument->state }}</span>
                </div>
                <div class="flex flex-wrap items-center space-x-2">
                    <label class="font-semibold">Atrašānās vieta vai adrese:</label>
                    <span>{{ $monument->location }}</span>
                </div>
                <div class="flex flex-wrap items-center space-x-2">
                    <label class="font-semibold">Iesaistītās personas:</label>
                    <span>{{ $monument->people }}</span>
                </div>
                <div>
                    <label class="font-semibold">Notikuma apraksts:</label>
                    <p class="text-sm mb-4">{{ $monument->description->content }}</p>
                </div>
                <div>
                    <label class="font-semibold">Piemiņas vietas apraksts:</label>
                    <p class="text-sm mb-4">{{ $monument->placeDescription->content }}</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>