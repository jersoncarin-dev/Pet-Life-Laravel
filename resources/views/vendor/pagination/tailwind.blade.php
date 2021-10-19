@if ($paginator->hasPages())
    <div class="page-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
                @if ($paginator->onFirstPage())
                    <li><a class="disabled" style="pointer-events: none"><i class="fa fa-angle-left"></i></a></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                @endif
                
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li><a>...</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="current-page"><a>{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if (!$paginator->hasMorePages())
                    <li><a class="disabled" style="pointer-events: none"><i class="fa fa-angle-right"></i></a></li>
                @else
                    <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
@endif