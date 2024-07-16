@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between mt-4">
    <div class="flex items-center">
        <div class="text-sm text-gray-700 leading-5 mr-6">
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            -
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            no
            <span class="font-medium">{{ $paginator->total() }}</span>
        </div>

        <div class="flex">
            @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                Nākamā lapa
            </span>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Nākamā lapa
            </a>
            @endif

            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                Iepriekšējā lapa
            </a>
            @else
            <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                Iepriekšējā lapa
            </span>
            @endif
        </div>
    </div>
</nav>
@endif