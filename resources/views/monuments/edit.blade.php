<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Monument</title>
    @vite('resources/css/app.css') <!-- Ensure you have the Tailwind CSS included -->
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <x-navbar />

    <x-smallnavbar type="edit" :id="$monument->id" />
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold my-6 text-center">Atsvaidzināt</h1>

        <form action="{{ route('monuments.update', $monument->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto mb-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nosaukums:</label>
                <input type="text" id="title" name="title" value="{{$monument->title}}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-gray-700 mb-1">Pagasts:</label>
                <input type="text" id="state" name="state" value="{{$monument->state}}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Atrašānās vietas piezīmes:</label>
                <input type="text" id="location" name="location" value="{{$monument->location}}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="people" class="block text-sm font-medium text-gray-700 mb-1">Saistītās personas:</label>
                <input type="text" id="people" name="people" value="{{$monument->people}}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Apraksts:</label>
                <textarea id="description" name="description" required class="w-full p-2 border border-gray-300 rounded-lg h-32">{{$monument->description}}</textarea>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Veida nosaukums:</label>
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