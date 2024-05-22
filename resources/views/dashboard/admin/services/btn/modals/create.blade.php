<div class="modal fade" id="createService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title text-white" id="exampleModalLabel">اضافه خدمه جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route( 'services.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">الخدمه</label>
                        <input type="text" class="form-control" required name="name" id="name" value="">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->

                    <!-- Start Notes -->
                    <div class="form-group">
                        <label for="notes">ملاحظات</label>
                        <textarea type="notes" class="form-control" name="notes" rows="5" id="notes"></textarea>
                        @error('notes')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Notes -->

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="status">الحاله</label>
                        <select name="status" class="form-control">
                            <option selected disabled> اختر حاله الخدمه...</option>
                            <option value="1" {{ old('status')=='1' ? 'selected' : '' }}>فعال</option>
                            <option value="0" {{ old('status')=='0' ?'selected' : '' }}>غير فعال</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Status Selected -->


                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-success">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>