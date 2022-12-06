@if ($model->hasPages())
    <div class="pagination">
        <span>
            @if ($model->onFirstPage())
                <span class="link_disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
            @else
                <a href="{{ $model->previousPageUrl() }}" class="link_enabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
            @endif
            @for ($i = 1; $i <= $model->lastPage(); $i++)
                @if ($i == $model->currentPage())
                    <span class="paginator enabled background-yellow">{{ $i }}</span>
                @else
                    <a href="?page={{ $i }}" class="paginator"><span class="disabled">{{ $i }}</span></a>
                @endif
            @endfor
            @if ($model->currentPage() == $model->lastPage())
                <span class="link_disabled"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
            @else
                <a href="{{ $model->nextPageUrl() }}" class="link_enabled"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            @endif
        </span>
    </div>
@endif
