<!-- Example usage in a Blade view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Piemiņas vietu datubāze</title>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <x-navbar />

    <x-smallnavbar type="show" :id="$monument->id" />

    <!-- Main Content -->
    <x-images :images="$monument->documents" name="Citi dokumenti" />
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>