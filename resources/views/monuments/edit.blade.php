<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediģēt pieminekli</title>
    @vite('resources/css/app.css') <!-- Ensure you have the Tailwind CSS included -->
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <x-navbar />

    <x-smallnavbar type="edit" :id="$monument->id" />
    <div class="container mx-auto px-4">

        <form action="{{ route('monuments.update', $monument->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto mb-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nosaukums:</label>
                <input type="text" id="title" name="title" value="{{$monument->title}}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-gray-700 mb-1">Pilsēta vai pagasts:</label>
                <input type="text" id="state" name="state" value="{{$monument->state}}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Atrašānās vieta:</label>
                <input type="text" id="location" name="location" value="{{$monument->location}}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="people" class="block text-sm font-medium text-gray-700 mb-1">Iesaistītās personas:</label>
                <input type="text" id="people" name="people" value="{{$monument->people}}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Notikuma apraksts:</label>
                <textarea id="description" name="description" required class="w-full p-2 border border-gray-300 rounded-lg h-32">{{$monument->description->content}}</textarea>
            </div>

            <div class="mb-4">
                <label for="placeDescription" class="block text-sm font-medium text-gray-700 mb-1">Piemiņas vietas apraksts:</label>
                <textarea id="placeDescription" name="placeDescription" required class="w-full p-2 border border-gray-300 rounded-lg h-32">{{$monument->placeDescription->content}}</textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Tips:</label>
                <select id="type" name="type" class="w-full p-2 border border-gray-300 rounded-lg">
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $monument->type_id ? 'selected' : '' }}>
                        {{ $type->title }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Atjaunināt</button>
            </div>
        </form>

    </div>

</body>

</html>