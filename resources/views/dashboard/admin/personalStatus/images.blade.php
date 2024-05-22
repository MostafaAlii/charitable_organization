@extends('layouts.master')
@section('css')
@section('title')
{{$title . ' ' .  $personalStatus?->name}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{$title . ' ' .  $personalStatus?->name}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" class="default-color">لوحه التحكم</a></li>
                <li class="breadcrumb-item active">{{$title . ' ' .  $personalStatus?->name}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('layouts.common.partials.messages')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <!-- Start Form -->
                <form class="form" action="{{ route('personal_status_cases.images.store.db') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <input type="hidden" name="personal_statuses_id" value="{{$personalStatus->id}}">
                        <h4 class="form-section"><i class="ft-home"></i> صور الحاله </h4>
                        <div class="form-group">
                            <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                <div class="dz-message">يمكنك رفع اكثر من صوره هنا</div>
                            </div>
                            <br><br>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i>
                            تحديث
                        </button>
                    </div>
                </form>
                <!-- End Form -->
                <!-- Start Gallery -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="card-text">
                        <p>الصوره الحاليه.</p>
                    </div>
                </div>
                <div class="card-body my-gallery" itemscope="" itemtype="http://schema.org/ImageGallery"
                     data-pswp-uid="1">
                    <div class="row">
                        @isset($images)
                            @forelse($images as $image )
                                <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope=""
                                        itemtype="http://schema.org/ImageObject">
                                    <a href="{{$image->photo}}" itemprop="contentUrl"
                                       data-size="480x360">
                                        <img class="img-thumbnail img-fluid"
                                             src="{{$image->photo}}"
                                             itemprop="thumbnail" alt="{{$image->photo}}">
                                    </a>
                                </figure>
                            @empty
                                 لا يوجد صور حتي اللحظه
                            @endforelse
                        @endisset
                    </div>

                </div>
            </div>
            <!-- End Gallery -->
            </div>

            
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        var uploadedDocumentMap = {}
       Dropzone.options.dpzMultipleFiles = {
           paramName: "dzfile", // The name that will be used to transfer the file
           //autoProcessQueue: false,
           maxFilesize: 5, // MB
           clickable: true,
           addRemoveLinks: true,
           acceptedFiles: 'image/*',
           dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
           dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
           dictCancelUpload: "الغاء الرفع ",
           dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
           dictRemoveFile: "حذف الصوره",
           dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
           headers: {
               'X-CSRF-TOKEN':
                   "{{ csrf_token() }}"
           }

           ,
           url: "{{ route('personal_status_cases.images.store') }}", // Set the url
           success:
               function (file, response) {
                   $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                   uploadedDocumentMap[file.name] = response.name
               }
           ,
           removedfile: function (file) {
               file.previewElement.remove()
               var name = ''
               if (typeof file.file_name !== 'undefined') {
                   name = file.file_name
               } else {
                   name = uploadedDocumentMap[file.name]
               }
               $('form').find('input[name="document[]"][value="' + name + '"]').remove()
           }
           ,
           // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
           init: function () {

                   @if(isset($event) && $event->document)
               var files =
               {!! json_encode($event->document) !!}
                   for (var i in files) {
                   var file = files[i]
                   this.options.addedfile.call(this, file)
                   file.previewElement.classList.add('dz-complete')
                   $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
               }
               @endif
           }
       }
</script>
@endsection