<div class="modal fade" id="edit{{$section->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark white">
                <h5 class="text-white modal-title" id="exampleModalLabel">{{'تعديل '. $section?->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sections.update', $section->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Start Name -->
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$section->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Name -->


                    <!-- Start Notes -->


                    <div class="form-group">
                        <label for="notes">ملاحظات</label>
                        <textarea type="notes" class="form-control" name="notes" rows="5" id="notes" >
                            {!! $section->notes !!}
                        </textarea>
                        @error('notes')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Notes -->

                    <!-- Start Status Status -->
                    <div class="p-1 form-group">
                        <label for="status">الحاله</label>
                        <select name="status" class="p-1 form-control">
                            <option selected disabled>اختر <span class="text-primary">{{$section->name}}</span>
                                حاله...</option>
                            <option value="1" {{ (old('status', $section->status) == '1') ? 'selected' : '' }}>
                                فعال
                            </option>
                            <option value="0" {{ (old('status', $section->status) == '0') ? 'selected' : '' }}>
                                غير فعال
                            </option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- End Status Selected -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-success">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>