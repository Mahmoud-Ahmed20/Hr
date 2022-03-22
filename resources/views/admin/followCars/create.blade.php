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
                        <h3>متابعه السيارات</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">قائمه متابعه السيارات</li>
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
                                <h5>اضافه</h5>
                            </div>
                            <div class="card-body">
                                <form class="card" action="{{url(route('admin/followCars/store'))}}" method="post" enctype="multipart/form-data">
                                    @include('flash::message')
                                    @csrf
                                    <div class="digital-add needs-validation">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> نوع السياره </label>
                                            <input class="form-control" id="validationCustom01" name="car_type" value="{{ old('car_type') }}" type="text" required="">
                                            @error('car_type')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> رقم اللوحه </label>
                                            <input class="form-control" id="validationCustomtitle" name="plate_number" value="{{ old('plate_number') }}" type="text" required="">
                                            @error('plate_number')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom021" class="col-form-label"><span>*</span> اللون </label>
                                            <input class="form-control" id="validationCustom021" name="color" value="{{ old('color') }}" type="text" required="">
                                            @error('color')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom022" class="col-form-label"><span>*</span> الموديل </label>
                                            <input class="form-control" id="validationCustom022" name="model" value="{{ old('model') }}" type="text" required="">
                                            @error('model')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom023" class="col-form-label"><span>*</span> اسم المالك </label>
                                            <input class="form-control" id="validationCustom023" name="owner_name" value="{{ old('owner_name') }}" type="text" required="">
                                            @error('owner_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <<div class="form-group">
                                            <label for="validationCustom0221" class="col-form-label"><span>*</span> تاريخ انتهاء الرخصه </label>
                                            <input class="form-control" id="validationCustom0221" name="license_expiration" value="{{ old('license_expiration') }}" type="date" autocomplete="off" required="">
                                            @error('license_expiration')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom0222" class="col-form-label"><span>*</span> تاريخ انتهاء التامين </label>
                                            <input class="form-control" id="validationCustom0222" name="insurance_expiry" value="{{ old('insurance_expiry') }}" type="date" autocomplete="off" required="">
                                            @error('insurance_expiry')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom0223" class="col-form-label"><span>*</span> تاريخ انتهاء تفويض القياده </label>
                                            <input class="form-control" id="validationCustom0223" name="driving_auth_expiry_1" value="{{ old('driving_auth_expiry_1') }}" type="date" autocomplete="off" required="">
                                            @error('driving_auth_expiry_1')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="validationCustom0223" class="col-form-label"><span>*</span> اسم سائق السياره </label>
                                            <input class="form-control" id="validationCustom0223" name="driver_name" value="{{ old('driver_name') }}" type="text" required="">
                                            @error('driver_name')
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
