<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <x-navbar />

    <!-- Main Content -->
    <div class="container mx-auto p-8 flex-1">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- username Address -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-semibold mb-1">Lietotājvārds</label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                    @if ($errors->has('username'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('username') }}</p>
                    @endif
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-1">Parole</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500">
                    @if ($errors->has('password'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
                    @endif
                </div>



                <!-- Submit Button -->
                <div class="flex items-center justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Ienākt
                    </button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>