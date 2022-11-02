@if ($paginator->hasPages())
    <div class="example-preview">
        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap py-2 m-5">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <a style="cursor: no-drop"
                       class="btn btn-icon btn-circle btn-sm btn-light-info mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                    </a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="btn btn-icon btn-circle btn-sm btn-light-info mr-2 my-1 loading">
                        <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                    </a>
                @endif


                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <a class="btn btn-icon btn-circle btn-sm border-0 btn-hover-info mr-2 my-1">...</a>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a href="" class="btn btn-icon btn-circle btn-sm border-0 btn-hover-info active mr-2 my-1">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}" class="loading btn btn-icon btn-circle btn-sm border-0 btn-hover-info mr-2 my-1">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="loading btn btn-icon btn-circle btn-sm btn-light-info mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                    </a>
                @else
                    <a style="cursor: no-drop" class=" btn btn-icon btn-circle btn-sm btn-light-info mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                    </a>
                @endif


            </div>
        </div>
        <!--end:: Pagination-->
    </div>
@endif