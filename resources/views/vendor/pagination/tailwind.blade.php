@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="opacity-50 cursor-not-allowed bg-red-700 text-white px-4 py-2 rounded-l-md">
                &lt; Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="bg-red-700 text-white px-4 py-2 rounded-l-md hover:bg-red-800">
                &lt; Previous
            </a>
        @endif

        <span class="flex">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="bg-red-700 text-white px-4 py-2">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="bg-red-700 text-white px-4 py-2 hover:bg-red-800">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="bg-red-700 text-white px-4 py-2 rounded-r-md hover:bg-red-800">
                Next &gt;
            </a>
        @else
            <span class="opacity-50 cursor-not-allowed bg-red-700 text-white px-4 py-2 rounded-r-md">
                Next &gt;
            </span>
        @endif
    </nav>
@endif
