<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saglabāt piemienkli</title>
    @vite('resources/css/app.css') <!-- Ensure you have the Tailwind CSS included -->
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <x-navbar />
    <div class="container mx-auto px-4">

        <form action="{{ route('monuments.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="title" class="block text-lg font-semibold mb-2 text-gray-700">Nosaukums:</label>
                <input type="text" id="title" name="title" value="" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="state" class="block text-lg font-semibold mb-2 text-gray-700">Pilsēta vai pagasts:</label>
                <input type="text" id="state" name="state" value="" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="location" class="block text-lg font-semibold mb-2 text-gray-700">Atrašānās vietas piezīmes:</label>
                <input type="text" id="location" name="location" value="" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="people" class="block text-lg font-semibold mb-2 text-gray-700">Saistītās personas:</label>
                <input type="text" id="people" name="people" value="" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="cover" class="block text-lg font-semibold mb-2 text-gray-700">Sākuma bildes veids:</label>
                <select id="cover" name="cover" class="w-full p-2 border border-gray-300 rounded-lg">
                    <option value="old">Vēsturiska</option>
                    <option value="new">Aktuāla</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="types" class="block text-lg font-semibold mb-2 text-gray-700">Tipi:</label>
                <p class="text-m text-gray-700 mb-2">Lai izvēlētos vairākus tipus, turiet ctrl taustiņu.</p>
                <select name="types[]" id="types" multiple class="w-full p-3 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}" class="py-2 px-4 hover:bg-gray-100">{{ $type->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-semibold mb-2 text-gray-700">Notikuma apraksts:</label>
                <textarea id="description" name="description" required class="w-full p-2 border border-gray-300 rounded-lg h-32"></textarea>
            </div>

            <div class="mb-4">
                <label for="placeDescription" class="block text-lg font-semibold mb-2 text-gray-700">Piemiņas vietas apraksts:</label>
                <textarea id="placeDescription" name="placeDescription" required class="w-full p-2 border border-gray-300 rounded-lg h-32"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Izveidot</button>
            </div>
        </form>
    </div>

</body>

</html>