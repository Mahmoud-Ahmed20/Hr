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
                        <h3>المستخدمين</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active"><a style="text-decoration:none;color:black;" href="{{url(route('admin/users/index'))}}">قائمة المستخدمين</a></li>
                        <li class="breadcrumb-item active">اضافه مستخدم</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row product-adding">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>اضافه مستخدم</h5>
                            </div>
                            @include('flash::message')
                            <div class="card-body">
                                <form class="card" action="{{url(route('admin/users/store'))}}" method="post" >
                                    @csrf
                                    <div class="digital-add needs-validation">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>الاسم</label>
                                            <input class="form-control" id="validationCustom01" name="name" value="{{ old('name') }}" type="text" required="">
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom0144" class="col-form-label pt-0"><span>*</span>رقم الهاتف</label>
                                            <input class="form-control" id="validationCustom0144" name="phone" value="{{ old('phone') }}" type="text" required="">
                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> الايميل</label>
                                            <input class="form-control" id="validationCustomtitle" name="email" value="{{ old('email') }}" type="email">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label"><span>*</span> كلمه السر</label>
                                            <input class="form-control" id="validationCustom02" name="password" value="{{ old('password') }}" type="password" required="">
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom02" class="col-form-label"><span>*</span> تاكيد كلمه السر</label>
                                            <input class="form-control" id="validationCustom02" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" required="">
                                            @error('password_confirmation')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <button class="btn btn-primary" type="submit">اضافه</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Container-fluid Ends-->
@endsection