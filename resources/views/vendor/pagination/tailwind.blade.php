@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col justify-center items-center">

        <div class="flex items-center justify-between">
            <div class="">
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Показано книг с ') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('по ') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __(', всего') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('') !!}
                </p>
            </div>
        </div>

        <div class="flex justify-between mt-2">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    Предыдущая страница
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Предыдущая страница
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Следующая страница
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    Следующая страница
                </span>
            @endif
        </div>

    </nav>
@endif
