<nav class="bg-orange-500 text-white  mb-8 py-4">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mx-10 py-4">
            <div class="text-4xl font-bold">
                <a href="{{ route('monuments.index') }}">Sākums</a>
            </div>
            <div class="md:flex text-xl items-center space-x-10">
                <!-- Increased spacing between items -->
                <a href="{{ route('monuments.create') }}" class=" hover:text-stone-200">Pievienot objektu</a>
                <a href="{{ route('types.index') }}" class=" hover:text-stone-200">Pārvaldīt objektu veidus</a>
                <a href="#" class=" hover:text-stone-200">Autorizēties</a>
            </div>
        </div>
    </div>
</nav>