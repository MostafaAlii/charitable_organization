<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Cairo:300,400&amp;subset=arabic,latin-ext" rel="stylesheet">

<style>
    html,
    body,
    a,
    i,
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    table,
    .btn,
    .alert {
        font-family: 'Cairo', sans-serif;
    }
    .custom-bg-success {
        background-color: #87df9b !important;
    }
    .custom-bg-warning {
        background-color: #e9bb33 !important;
    }
</style>
@yield('css')
<!--- Style css -->
@if (App::getLocale() == 'en')
<link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
<style>
    .scrollbar {
        overflow-x: hidden !important;
    }
</style>
@else
<link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/file-uploaders/dropzone.min.css')}}">


<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/file-uploaders/dropzone.css')}}">
<script src="{{ asset('assets/js/file-uploaders/dropzone.min.js') }}"></script>