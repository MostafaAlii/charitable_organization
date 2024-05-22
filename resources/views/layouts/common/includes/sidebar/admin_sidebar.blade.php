<div class="row">
    <!-- Left Sidebar start-->
    <div class="side-menu-fixed">
        <div class="scrollbar side-menu-bg">
            <ul class="nav navbar-nav side-menu" id="sidebarnav">
                <!-- Start Dashboard-->

                <li><a href="{{ route('admin.dashboard') }}">لوحه التحكم</a></li>
                <!-- End Dashboard-->

                <!-- Start CMS -->
                <li class="pl-4 mt-10 mb-10 font-medium text-muted menu-title">الاداره</li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#cms_managment">
                        <div class="pull-left">
                            <i class="fa fa-book"></i>
                            <span class="right-nav-text">اداره الخدمات والاقسام</span>
                        </div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="cms_managment" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{--route('service.index')--}}">الخدمات المقدمه</a></li>
                        <li><a href="{{ route('sections.index') }}">الاقسام</a></li>
                    </ul>
                </li>
                <!-- End CMS -->



                <!-- Start Admin Managment Menu-->
                <li class="pl-4 mt-10 mb-10 font-medium text-muted menu-title">المشرفين و الحالات</li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins_managment">
                        <div class="pull-left">
                            <i class="ti-palette"></i>
                            <span class="right-nav-text">المشرفين</span></div>
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="admins_managment" class="collapse" data-parent="#sidebarnav">
                        <li><a href="{{--route('agents.index')--}}">المشرفين</a></li>
                        <li><a href="{{--route('companies.index')--}}">الموظفين</a></li>
                        <li><a href="{{--route('employees.index')--}}">الحالات</a></li>
                    </ul>
                </li>
                <!-- End Admin Managment Menu-->
            </ul>
        </div>
    </div>

    <!-- Left Sidebar End-->
</div>