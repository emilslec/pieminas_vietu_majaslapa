<nav class="bg-white shadow mb-8">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mx-10 py-4">
            <div class="text-3xl font-bold">Mājaslapa</div>
            <div class="hidden md:flex items-center space-x-10">
                <!-- Increased spacing between items -->
                <a href="{{ route('monuments.create') }}" class="text-gray-800 hover:text-blue-600">Pievienot objektu</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">Pievienot objekta veidu</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">Autorizēties</a>
            </div>
            <div class="md:hidden">
                <button class="text-gray-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>