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
                        <h3>الجنسيات </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/nationality/index'))}}">الجنسيات</a>
                        </li>
                        <li class="breadcrumb-item active">اضافه جنسيه</li>
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
                                <h5>اضافه جنسيه</h5>
                            </div>
                            @include('flash::message')
                            <div class="card-body">
                                <form class="card" action="{{ url(route('admin/nationality/store')) }}" method="post" >
                                    @csrf
                                    <div class="digital-add needs-validation">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> اسم الجنسيه</label>
                                            <input class="form-control" id="validationCustom01" name="name_nationality" value="{{ old('name_nationality') }}" type="text" required="">
                                            @error('name_nationality')
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
