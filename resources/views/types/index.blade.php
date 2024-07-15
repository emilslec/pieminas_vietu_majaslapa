<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Types</title>
    @vite('resources/css/app.css') <!-- Assuming this is for your CSS -->
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <x-navbar />
    <div class="container mx-auto p-4">

        <!-- Display Existing Types -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-4">Tipi</h2>
            @foreach ($types as $type)
            <div class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md mb-2">
                <span>{{ $type->title }}</span>
                <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Vai Jūs patiešām vēlaties dzēst {{ $type->title }} klasi? Tiks izdzēsti arī visi objekti ar šo klasi!')" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Dzēst</button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- Add New Type Form -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Pievienot jaunu tipu</h2>
            <form action="{{ route('types.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-4">
                    <label for="newType" class="block text-sm font-medium text-gray-700">Tipa nosaukums:</label>
                    <input type="text" id="newType" name="title" value="{{ old('title') }}" class="mt-1 p-2 block w-full border border-gray-300 rounded-lg">
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Pievienot</button>
            </form>
        </div>

    </div>

</body>

</html>