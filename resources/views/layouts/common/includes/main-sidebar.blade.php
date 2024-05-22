<div class="container-fluid">
    @if(auth('admin')->check())
        @include('layouts.common.includes.sidebar.admin_sidebar')
    @endif
</div>