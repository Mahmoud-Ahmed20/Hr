@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>لوحه التحكم
                            <small></small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        @include('flash::message')
        <div class="row">
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <a style="text-decoration:none;" href="{{url(route('admins/index'))}}">
                        <div class="bg-warning card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                </div>
                                <div class="media-body col-8"><span class="m-0">المشرفين</span>
                                    <h3 class="mb-0"><span class=""></span></h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <a style="text-decoration:none;" href="{{url(route('admin/users/index'))}}">
                        <div class="bg-danger card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                </div>
                                <div class="media-body col-8"><span class="m-0">المستخدمين</span>
                                    <h3 class="mb-0"><span class=""></span></h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden  widget-cards">
                    <a style="text-decoration:none;" href="{{url(route('admin/staffs/index'))}}">
                        <div class="bg-secondary card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                </div>
                                <div class="media-body col-8"><span class="m-0">الموظفين</span>
                                    <h3 class="mb-0"><span></span></h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <a style="text-decoration:none;" href="{{url(route('admin/employees/index'))}}">
                        <div class="bg-primary card-body">
                            <div class="media static-top-widget row">
                                <div class="icons-widgets col-4">
                                    <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                                </div>
                                <div class="media-body col-8"><span class="m-0">طلبات التوظيف</span>
                                    <h3 class="mb-0"><span class=""></span></h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- <div class="col-xl-12 xl-100">
                <div class="card">
                    <div class="card-body">
                        <div class="user-status table-responsive latest-order-table">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">الايميل</th>
                                        <th scope="col">الهاتف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>id</td>
                                        <td class="digits">name</td>
                                        <td class="digits">email</td>
                                        <td class="digits">phone</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="btn btn-primary">View All</a>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="" data-original-title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre class=" language-html"><code class=" language-html" id="example-head1">
                                &lt;div class="user-status table-responsive latest-order-table"&gt;
                                    &lt;table class="table table-bordernone"&gt;
                                        &lt;thead&gt;
                                            &lt;tr&gt;
                                                &lt;th scope="col"&gt;Order ID&lt;/th&gt;
                                                &lt;th scope="col"&gt;Order Total&lt;/th&gt;
                                                &lt;th scope="col"&gt;Payment Method&lt;/th&gt;
                                                &lt;th scope="col"&gt;Status&lt;/th&gt;
                                            &lt;/tr&gt;
                                        &lt;/thead&gt;
                                        &lt;tbody&gt;
                                            &lt;tr&gt;
                                                &lt;td&gt;1&lt;/td&gt;
                                                &lt;td class="digits"&gt;$120.00&lt;/td&gt;
                                                &lt;td class="font-secondary"&gt;Bank Transfers&lt;/td&gt;
                                                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                            &lt;/tr&gt;
                                            &lt;tr&gt;
                                                &lt;td&gt;2&lt;/td&gt;
                                                &lt;td class="digits"&gt;$90.00&lt;/td&gt;
                                                &lt;td class="font-secondary"&gt;Ewallets&lt;/td&gt;
                                                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                            &lt;/tr&gt;
                                            &lt;tr&gt;
                                                &lt;td&gt;3&lt;/td&gt;
                                                &lt;td class="digits"&gt;$240.00&lt;/td&gt;
                                                &lt;td class="font-secondary"&gt;Cash&lt;/td&gt;
                                                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                            &lt;/tr&gt;
                                            &lt;tr&gt;
                                                &lt;td&gt;4&lt;/td&gt;
                                                &lt;td class="digits"&gt;$120.00&lt;/td&gt;
                                                &lt;td class="font-primary"&gt;Direct Deposit&lt;/td&gt;
                                                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                            &lt;/tr&gt;
                                            &lt;tr&gt;
                                                &lt;td&gt;5&lt;/td&gt;
                                                &lt;td class="digits"&gt;$50.00&lt;/td&gt;
                                                &lt;td class="font-primary"&gt;Bank Transfers&lt;/td&gt;
                                                &lt;td class="digits"&gt;Delivered&lt;/td&gt;
                                            &lt;/tr&gt;
                                        &lt;/tbody&gt;
                                    &lt;/table&gt;
                                &lt;/div&gt;
                            </code></pre>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('script')
    <!--dashboard custom js-->
@endsection