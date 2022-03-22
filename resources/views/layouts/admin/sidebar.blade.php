@section('css')
    <style>
        .logo-style {
            width: 100%!important
        }
    </style>
@endsection
    <!-- Page Sidebar Start-->
    <div class="page-sidebar">
        <div class="main-header-left d-none d-lg-block">
            <div class="logo-wrapper"><a href="{{url(route('admin/index'))}}"><img class="blur-up lazyloaded logo-style" src="{{asset('admin/assets/images/dashboard/logo1.jpg')}}" alt=""></a></div>
        </div>
        <div class="sidebar custom-scrollbar">

            <div class="sidebar-user text-center">
                <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset(auth()->guard('admin')->user()->photo)}}" alt="#">
                </div>
                <h6 class="mt-3 f-14"></h6>
                <p>general manager.</p>
            </div>

            <ul class="sidebar-menu">

                <li><a class="sidebar-header" href="{{url(route('admin/index'))}}"><i data-feather="home"></i><span>لوحه التحكم</span></a></li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>المشرفين</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admins/index'))}}"><i class="fa fa-circle"></i>قائمه المشرفين</a></li>
                        <li><a href="{{url(route('admins/create'))}}"><i class="fa fa-circle"></i>اضافه مشرف</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>مستخدمين</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/users/index'))}}"><i class="fa fa-circle"></i>قائمه مستخدمين</a></li>
                        <li><a href="{{url(route('admin/users/create'))}}"><i class="fa fa-circle"></i>اضافه مستخدم</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>الموظفين</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/staffs/index'))}}"><i class="fa fa-circle"></i>قائمه الموظفين</a></li>
                        <li><a href="{{url(route('admin/staffs/create'))}}"><i class="fa fa-circle"></i>اضافه موظف</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>طلبات التوظيف</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/employees/index'))}}"><i class="fa fa-circle"></i>قائمه طلبات التوظيف</a></li>
                        <li><a href="{{url(route('admin/employees/create'))}}"><i class="fa fa-circle"></i>اضافه طلب توظيف</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>  الادارات</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ url(route('admin/administration/index')) }}"><i class="fa fa-circle"></i>الادارات</a></li>
                        <li><a href="{{url(route('admin/administration/create'))}}"><i class="fa fa-circle"></i> اضافه ادارة </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>  الاقسام</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ url(route('admin/sections/index')) }}"><i class="fa fa-circle"></i>الاقسام</a></li>
                        <li><a href="{{url(route('admin/sections/create'))}}"><i class="fa fa-circle"></i> اضافه قسم </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>  الوظائف</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/job/index'))}}"><i class="fa fa-circle"></i>الوظائف</a></li>
                        <li><a href="{{ url(route('admin/job/create')) }}"><i class="fa fa-circle"></i>اضافه وظيفه</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>  الجنسيات</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/nationality/index'))}}"><i class="fa fa-circle"></i>الجنسيات</a></li>
                        <li><a href="{{ url(route('admin/nationality/create')) }}"><i class="fa fa-circle"></i>اضافه جنسيات </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>طلبات السلفة </span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/loanRequests/index'))}}"><i class="fa fa-circle"></i>طلبات السلفة</a></li>
                        <li><a href="{{ url(route('admin/loanrequests/create')) }}"><i class="fa fa-circle"></i>اضافه سلفه </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>طلبات الاجازه</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/vacations/index'))}}"><i class="fa fa-circle"></i>قائمه طلبات الاجازه</a></li>
                        <li><a href="{{url(route('admin/vacations/create'))}}"><i class="fa fa-circle"></i>اضافه</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>الاجراءات الجزائيه</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/penaltys/index'))}}"><i class="fa fa-circle"></i>قائمه الاجراءات الجزائيه</a></li>
                        <li><a href="{{url(route('admin/penaltys/create'))}}"><i class="fa fa-circle"></i>اضافه</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>اشعار بغياب موظف </span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/notice_absence_employee/index'))}}"><i class="fa fa-circle"></i>قائمة الاشعارات </a></li>
                        <li><a href="{{url(route('admin/notice_absence_employee/create'))}}"><i class="fa fa-circle"></i>إضافة</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>المهمات</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/missions/index'))}}"><i class="fa fa-circle"></i>قائمه المهمات</a></li>
                        <li><a href="{{url(route('admin/missions/create'))}}"><i class="fa fa-circle"></i>اضافه</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>انهاء المهمات</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/MissionsAccomplishment/index'))}}"><i class="fa fa-circle"></i>قائمه انهاء المهمات</a></li>
                        <li><a href="{{url(route('admin/MissionsAccomplishment/create'))}}"><i class="fa fa-circle"></i>اضافه</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>وصف وظيفي </span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/job_description/index'))}}"><i class="fa fa-circle"></i>قائمة الوصف الوظيفي</a></li>
                        <li><a href="{{url(route('admin/job_description/create'))}}"><i class="fa fa-circle"></i>إضافة وصف وظيفي </a></li>
                    </ul>
                </li>
                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>شهادة خبرة </span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/work_certific/index'))}}"><i class="fa fa-circle"></i>قائمة شهادة خبرة</a></li>
                        <li><a href="{{url(route('admin/work_certific/create'))}}"><i class="fa fa-circle"></i>إضافة شهادة خبرة </a></li>
                    </ul>
                </li>

                {{-- <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>متابعه السيارات</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/followCars/index'))}}"><i class="fa fa-circle"></i>قائمه متابعه السيارات</a></li>
                        <li><a href="{{url(route('admin/followCars/create'))}}"><i class="fa fa-circle"></i>اضافه</a></li>
                    </ul>
                </li> --}}

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>إخلاء طرف </span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/staffServiceActions/index'))}}"><i class="fa fa-circle"></i>القائمه</a></li>
                        <li><a href="{{url(route('admin/staffServiceActions/create'))}}"><i class="fa fa-circle"></i>اضافه</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>اداء الموظفين</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/UnderTheScabies/index'))}}"><i class="fa fa-circle"></i>اداء الموظفين</a></li>
                        <li><a href="{{ url(route('admin/UnderTheScabies/create')) }}"><i class="fa fa-circle"></i>اضافه نموذج </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>معايير أداء الموظفين</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/performance/index'))}}"><i class="fa fa-circle"></i>معايير أداء الموظفين </a></li>
                        <li><a href="{{ url(route('admin/performance/create')) }}"><i class="fa fa-circle"></i>اضافه نموذج </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>اشعارات مباشره العمل</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/effectiveNotice/index'))}}"><i class="fa fa-circle"></i>قائمه اشعارات مباشره العمل</a></li>
                        <li><a href="{{url(route('admin/effectiveNotice/create'))}}"><i class="fa fa-circle"></i>اضافه</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>الرجوع الي العمل</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/backs/index'))}}"><i class="fa fa-circle"></i>قائمه الرجوع الي العمل</a></li>
                        <li><a href="{{url(route('admin/backs/create'))}}"><i class="fa fa-circle"></i>اضافه</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span> تفاصيل عرض العمل </span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/jobOfferSpecification/index'))}}"><i class="fa fa-circle"></i> تفاصيل عرض العمل</a></li>
                        <li><a href="{{url(route('admin/jobOfferSpecification/create'))}}"><i class="fa fa-circle"></i>  اضافه عرض عمل </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>تقييم المقابلات الشخصية</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/evaluatePersonalInterviews/index'))}}"><i class="fa fa-circle"></i>قائمه تقييم المقابلات</a></li>
                        <li><a href="{{url(route('admin/evaluatePersonalInterviews/create'))}}"><i class="fa fa-circle"></i>اضافه موظف</a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>طلبات  نقل او رحلات عمل </span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{url(route('admin/business_trip_and_transfer_requests/index'))}}"><i class="fa fa-circle"></i>قائمة الطلبات</a></li>
                        <li><a href="{{url(route('admin/business_trip_and_transfer_requests/create'))}}"><i class="fa fa-circle"></i>إضافة طلب </a></li>
                    </ul>
                </li>

                <li><a class="sidebar-header" href="{{url(route('admin/logout'))}}"><i data-feather="log-in"></i><span>تسجيل الخروج</span></a></li>

            </ul>
        </div>
    </div>
    <!-- Page Sidebar end-->
