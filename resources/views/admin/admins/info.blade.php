@extends('layouts.admin.home')
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
                                <h3>البيانات الشخصيه</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">لوحه التحكم</li>
                                <li class="breadcrumb-item active">البيانات الشخصيه</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                @isset($admin)
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-details text-center">
                                        <img src="{{asset(auth()->guard('admin')->user()->photo)}}" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                                        <h5 class="f-w-600 mb-0">{{$admin->name}}</h5>
                                        <h6 class="f-w-600 mb-0">{{$admin->email}}</h6>
                                        <h6 class="f-w-600 mb-0">{{$admin->phone}}</h6>
                                        <div class="social">
                                            <div class="form-group btn-showcase">
                                                <button class="btn social-btn btn-fb d-inline-block"> <i class="fa fa-facebook"></i></button>
                                                <button class="btn social-btn btn-twitter d-inline-block"><i class="fa fa-google"></i></button>
                                                <button class="btn social-btn btn-google d-inline-block me-0"><i class="fa fa-twitter"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="project-status">
                                        <h5 class="f-w-600">Employee Status</h5>
                                        <div class="media">
                                            <div class="media-body">
                                                <h6>Performance<span class="pull-right">80%</span></h6>
                                                <div class="progress sm-progress-bar">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <h6>Overtime <span class="pull-right">60%</span></h6>
                                                <div class="progress sm-progress-bar">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-body">
                                                <h6>Leaves taken<span class="pull-right">70%</span></h6>
                                                <div class="progress sm-progress-bar">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card tab2-card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>البيانات الشخصيه</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="settings" class="me-2"></i>تعديل كلمه السر</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="top-tabContent">
                                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                            @include('flash::message') 
                                            <h5 class="f-w-600">البيانات الشخصيه</h5>
                                            <div class="table-responsive profile-table">
                                                <!-- form edit profile -->
                                                @include('admin.admins.edit-profile')
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                            <div class="account-setting">
                                                <h5 class="f-w-600">تعديل كلمه السر</h5>
                                                <!-- form change password -->
                                                @include('admin.admins.change-password')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
            <!-- Container-fluid Ends-->

@endsection