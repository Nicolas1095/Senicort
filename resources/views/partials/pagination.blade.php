@if ($model->hasPages())
<div class="pagination">
    <span>
        @if($model->onFirstPage())
        <span class="link_disabled">&laquo;</span>    
        @else
        <a href="{{ $model->previousPageUrl() }}" class="link_enabled">&laquo;</a>    
        @endif
        Pagina <strong>{{ $model->currentPage() }}</strong> de <strong>{{ $model->lastPage() }}</strong>
        @if($model->currentPage() == $model->lastPage())
        <span class="link_disabled">&raquo;</span>  
        @else
        <a href="{{ $model->nextPageUrl() }}" class="link_enabled">&raquo;</a>  
        @endif
    </span>
</div>
@endif