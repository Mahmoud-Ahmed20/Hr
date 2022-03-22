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
                        <h3>الوظائف </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/job/index'))}}">الوظائف</a>
                        </li>
                        <li class="breadcrumb-item active">اضافه وظيفه</li>
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
                                <h5>اضافه وظيفه</h5>
                            </div>
                            @include('flash::message')
                            <div class="card-body">
                                <form class="card" action="{{ url(route('admin/job/store')) }}" method="post" >
                                    @csrf
                                    <div class="digital-add needs-validation">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> الاسم الوظيفه</label>
                                            <input class="form-control" id="validationCustom01" name="name_job" value="{{ old('name_job') }}" type="text" required="">
                                            @error('name_job')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>  اسم الادارة </label>
                                            <select name="administration_id" id="administration_id" class="form-control">
                                                <option  selected  disabled>-- يرجي تحديد الادارة   ----</option>
                                            </select>
                                            @error('administration_id')
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

@section('script')

<script>
    $("#administration_id").select2({
        delay: 250,
        ajax: {
            url: "{{ route('admin/get/administrations')  }}",
            dataType: 'json',
            processResults: function (data) {
                var data = data.map((obj) => ({
                    id : obj.id,
                    text: obj.name_administration,
                }));
                return {
                    results: data,
                    pagination: {
                        more: false
                    }
                };
            },
        },
    });
</script>
@endsection

