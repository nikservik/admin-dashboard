@if ($paginator->hasPages())
    <nav class="text-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div class="inline-block border border-gray-200 rounded-lg px-3 py-1 text-gray-700" aria-disabled="true">&laquo; @lang('admin-dashboard::pagination.previous')</div>
            @else
                <div class="inline-block border border-gray-200 bg-gray-200 rounded-lg px-3 py-1 text-gray-700 hover:bg-gray-300"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="text-gray-700 hover:no-underline">&laquo; @lang('admin-dashboard::pagination.previous')</a></div>
            @endif

            {{-- Next Page link --}}
            @if ($paginator->hasMorePages())
                <div class="inline-block border border-gray-200 bg-gray-200 rounded-lg px-3 py-1 text-gray-700 hover:bg-gray-300"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="text-gray-700 hover:no-underline">@lang('admin-dashboard::pagination.next') &raquo;</a></div>
            @else
                <div class="inline-block border border-gray-200 rounded-lg px-3 py-1 text-gray-700" aria-disabled="true">@lang('admin-dashboard::pagination.next') &raquo;</div>
            @endif
    </nav>
@endif
