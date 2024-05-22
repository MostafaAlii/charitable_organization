<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        العمليات
    </button>
    <div class="dropdown-menu">
        <button type="button" class="modal-effect btn btn-sm btn-success dropdown-item"
            style="text-align: center !important" data-toggle="modal" data-target="#edit{{$personalStatus->id}}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                تعديل
            </span>
        </button>
        <a href="{{ route('personal_status_cases.images', $personalStatus->id)}}" style="text-align: center !important" target="_blank" class="btn btn-sm btn-success dropdown-item">
            <span class="icon text-wight text-bold">
                رفع الصور
            </span>
        </a>
        <button type="button" class="modal-effect btn btn-sm btn-success dropdown-item"
            style="text-align: center !important" data-toggle="modal" data-target="#show{{$personalStatus->id}}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                عرض
            </span>
        </button>
        <button type="button" class="modal-effect btn btn-sm btn-danger dropdown-item"
            style="text-align: center !important" data-toggle="modal" data-target="#delete{{$personalStatus->id}}"
            data-effect="effect-scale">
            <span class="icon text-wight text-bold">
                حذف
            </span>
        </button>
    </div>
</div>

{{--@include('dashboard.admin.personalStatus.btn.modals.edit')--}}
@include('dashboard.admin.personalStatus.btn.modals.delete')