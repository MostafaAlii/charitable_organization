<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        العمليات
    </button>
    <div class="dropdown-menu">
        <button type="button" class="modal-effect btn btn-sm btn-success dropdown-item"
            style="text-align: center !important" data-toggle="modal" data-target="#edit{{$section->id}}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                تعديل
            </span>
        </button>
        <button type="button" class="modal-effect btn btn-sm btn-danger dropdown-item"
            style="text-align: center !important" data-toggle="modal" data-target="#delete{{$section->id}}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                حذف
            </span>
        </button>
    </div>
</div>

@include('dashboard.admin.sections.btn.modals.edit')
@include('dashboard.admin.sections.btn.modals.delete')