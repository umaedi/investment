@if ($paginator->hasPages())
<div class="form-button-group  transparent gap-2">
        @if ($paginator->onFirstPage())
            <a class="btn btn-primary btn-block" href="#" aria-controls="swdatatable" data-dt-idx="0" tabindex="0">Sebelumnya</a>
        @else
            <a class="btn btn-primary btn-block" onclick="loadPaginate({{ explode('page=', $paginator->previousPageUrl())[1]}})" aria-controls="swdatatable" href="javascript:void(0);" data-dt-idx="0" tabindex="0">Sebelumnya</a>
        @endif
        
        @if ($paginator->hasMorePages())
            <a class="btn btn-primary btn-block" onclick="loadPaginate({{ explode('page=',$paginator->nextPageUrl())[1]}})" href="javascript:void(0)">Selanjutnya</a>
        @else
            <a class="btn btn-primary btn-block" href="#" data-dt-idx="1" tabindex="0">Selanjutnya</a>
        @endif
</div>
@endif