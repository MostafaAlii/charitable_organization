<div class="modal fade" id="delete{{$personalStatus->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{'حذف '. $personalStatus?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('cases.destroy', $personalStatus->id)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="row">
                        <h3 class="form-group ml-5 p-1">
                            هل انت متاكد من الحذف <span class="text-danger">{{$personalStatus?->name}}</span>
                        </h3>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning text-danger" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>