<div class="modal fade" id="createService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title text-white" id="exampleModalLabel">اضافه حاله جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route( 'cases.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Start Name -->
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="name">الاسم</label>
                            <input type="text" class="form-control" required name="name" id="name" value="">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="phone">رقم الهاتف</label>
                            <input type="text" class="form-control" required name="phone" id="phone" value="">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="children_number">عدد الاطفال</label>
                            <input type="text" class="form-control" required name="children_number" id="children_number" value="">
                            @error('children_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="wife_name">اسم الزوجه</label>
                            <input type="text" class="form-control" required name="wife_name" id="wife_name" value="">
                            @error('wife_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-8">
                            <label for="nationality_id">رقم الهويه</label>
                            <input type="text" class="form-control" required name="nationality_id" id="nationality_id" value="">
                            @error('nationality_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- End Name -->

                    <!-- Start Notes -->
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="notes">ملاحظات</label>
                            <textarea type="text" class="form-control" name="notes" rows="5" id="notes"></textarea>
                            @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="address">العنوان</label>
                            <textarea type="text" class="form-control" name="address" rows="5" id="address"></textarea>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> 
                    <!-- End Notes -->

                    <!-- Start Sections Select -->
                    <div class="form-group">
                        <label>القسم التابع</label>
                        <select class="form-control" name="section_id" required>
                            <option value="" disabled selected>-- اختر --</option>
                            @foreach (\App\Models\Section::active()->get() as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- End Sections Select -->


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