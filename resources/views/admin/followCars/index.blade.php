@extends('layouts.admin.home')

<!-- title page -->
@section('title')
Multikart - Premium Admin Template
@endsection

@section('content')

<style>
    .dataTables_paginate,
    .dataTables_info {
        display: none;
    }
</style>

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
                    <h5>قائمه متابعه السيارات</h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->
                        <div class="btn-popup pull-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">اضافه</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافه</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="card" action="{{url(route('admin/followCars/store'))}}" method="post" enctype="multipart/form-data">
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
                                                    <div class="form-group">
                                                        <label for="validationCustom0221" class="col-form-label"><span>*</span> تاريخ انتهاء الرخصه </label>
                                                        <input class="form-control" id="validationCustom0221" name="license_expiration" value="{{ old('license_expiration') }}" type="date" required="" autocomplete="off">
                                                        @error('license_expiration')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom0222" class="col-form-label"><span>*</span> تاريخ انتهاء التامين </label>
                                                        <input class="form-control" id="validationCustom0222" name="insurance_expiry" value="{{ old('insurance_expiry') }}" type="date" required="" autocomplete="off">
                                                        @error('insurance_expiry')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="validationCustom0223" class="col-form-label"><span>*</span> تاريخ انتهاء تفويض القياده </label>
                                                        <input class="form-control" id="validationCustom0223" name="driving_auth_expiry_1" value="{{ old('driving_auth_expiry_1') }}" type="date" required="" autocomplete="off">
                                                        @error('driving_auth_expiry_1')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="validationCustom0224" class="col-form-label"><span>*</span> اسم سائق السياره </label>
                                                        <input class="form-control" id="validationCustom0224" name="driver_name" value="{{ old('driver_name') }}" type="text" required="">
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
                                        <div class="modal-footer">
                                            <!-- <button class="btn btn-primary" type="button">Save</button>
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end poper add admin -->
                    <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/followCars/export/excel')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/followCars/export/pdf')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>
                    </div>
                    @isset($followCars)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table class="display" id="basic-1">

                                <thead>
                                    <tr>
                                        <th>نوع السياره</th>
                                        <th>رقم اللوحه</th>
                                        <th>اللون</th>
                                        <th>الموديل</th>
                                        <th>اسم المالك</th>
                                        <th>اسم السائق</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody id="adminRecords">
                                    {{ csrf_field() }}
                                    @foreach($followCars as $car)
                                    <tr>
                                        <td>{{$car->car_type}}</td>
                                        <td>{{$car->plate_number}}</td>
                                        <td>{{$car->color}}</td>
                                        <td>{{$car->model}}</td>
                                        <td>{{$car->owner_name}}</td>
                                        <td>{{$car->driver_name}}</td>
                                        <td>

                                            <!-- edit row -->
                                            @include('admin.followCars.edit')
                                            <!-- end edit row -->

                                            <!-- delete row -->
                                            @include('admin.followCars.delete')
                                            <!-- end delete row -->

                                            <!-- show row -->
                                            <button class="btn btn-primary btn-xs mt-1" type="button">
                                                <a href="{{route('admin/followCars/print', $car->id)}}" style="text-decoration:none;color:white;">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            </button>
                                            <!-- end show row -->

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\FollowCars::count()}}</span> entries
                            </div>
                            <div class="ltn__pagination-area text-center mt-5">
                                <div class="ltn__pagination">
                                    <div id="load_more">
                                        <button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id="'.$last_id.'" id="load_more_button">عرض المزيد</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        let dataLen = @json($followCars);
        let showItems = document.getElementById("showItems")
        showItems.innerHTML = dataLen.data.length
        let length = dataLen.data.length
        $(document).ready(function() {
            $(document).on('click', '#load_more_button', function() {
                let records = ``
                var _token = $('input[name="_token"]').val();
                var id = $(this).attr('data-id');
                let lastId = ''
                $('#load_more_button').html('<b>... جاري التحميل</b>');
                load_data(id, _token);

                function load_data(id = "", _token) {
                    $.ajax({
                        url: "{{ route('admin/followCars/getMore') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                for (let i = 0; i < data.length; i++) {
                                    lastId = data[i].id
                                    records +=
                                                `
                                                    <tr>
                                                        <td>${data[i].car_type}</td>
                                                        <td>${data[i].plate_number}</td>
                                                        <td>${data[i].color}</td>
                                                        <td>${data[i].model}</td>
                                                        <td>${data[i].owner_name}</td>
                                                        <td>${data[i].driver_name}</td>


                                                        <td>

                                                            <!-- edit row -->
                                                                <button type="button" class="btn btn-warning mt-1" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaledit-${data[i].id}">
                                                                    <i class="fas fa-edit" style="color:white;"></i>
                                                                </button>
                                                                <div class="modal fade" id="myModaledit-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">تعديل</h5>
                                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                            </div>
                                                                            <div class="modal-body mt-3">
                                                                                <form class="card" action="${data[i].urlRouteUpdate}" method="post" enctype="multipart/form-data">
                                                                                    @include('flash::message')
                                                                                    @csrf
                                                                                    <div class="digital-add needs-validation">
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> نوع السياره </label>
                                                                                            <input class="form-control" id="validationCustom01" name="car_type" value="${data[i].car_type}" type="text" required="">
                                                                                            @error('car_type')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> رقم اللوحه </label>
                                                                                            <input class="form-control" id="validationCustomtitle" name="plate_number" value="${data[i].plate_number}" type="text" required="">
                                                                                            @error('plate_number')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom021" class="col-form-label"><span>*</span> اللون </label>
                                                                                            <input class="form-control" id="validationCustom021" name="color" value="${data[i].color}" type="text" required="">
                                                                                            @error('color')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom022" class="col-form-label"><span>*</span> الموديل </label>
                                                                                            <input class="form-control" id="validationCustom022" name="model" value="${data[i].model}" type="text" required="">
                                                                                            @error('model')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom023" class="col-form-label"><span>*</span> اسم المالك </label>
                                                                                            <input class="form-control" id="validationCustom023" name="owner_name" value="${data[i].owner_name}" type="text" required="">
                                                                                            @error('owner_name')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom0221" class="col-form-label"><span>*</span> تاريخ انتهاء الرخصه </label>
                                                                                            <input class="form-control" id="validationCustom0221" name="license_expiration" value="${data[i].license_expiration}" type="date" autocomplete="off" required="">
                                                                                            @error('license_expiration')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom0222" class="col-form-label"><span>*</span> تاريخ انتهاء التامين </label>
                                                                                            <input class="form-control" id="validationCustom0222" name="insurance_expiry" value="${data[i].insurance_expiry}" type="date" autocomplete="off" required="">
                                                                                            @error('insurance_expiry')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom0223" class="col-form-label"><span>*</span> تاريخ انتهاء تفويض القياده </label>
                                                                                            <input class="form-control" id="validationCustom0223" name="driving_auth_expiry_1" value="${data[i].driving_auth_expiry_1}" type="date" autocomplete="off" required="">
                                                                                            @error('driving_auth_expiry_1')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom0223" class="col-form-label"><span>*</span> اسم سائق السياره </label>
                                                                                            <input class="form-control" id="validationCustom0223" name="driver_name" value="${data[i].driver_name}" type="text" required="">
                                                                                            @error('driver_name')
                                                                                            <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <div class="form-group mt-4">
                                                                                            <button class="btn btn-primary" type="submit">تعديل</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <!-- end edit row -->

                                                            <!-- delete row -->
                                                                <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaldelete-${data[i].id}">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                                <div class="modal fade" id="myModaldelete-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد الحذف</h5>
                                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form role="form" action="${data[i].urlRouteDelete}" class="" >
                                                                                    <input name="_method" type="hidden">
                                                                                    {{ csrf_field() }}
                                                                                    <p>هل انت متاكد من حذف هذه البيانات ؟</p>
                                                                                    <div class="modal-footer">
                                                                                        <button class="btn btn-primary" type="submit">تاكيد</button>
                                                                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <!-- end delete row -->

                                                            <!-- print row -->
                                                                <button class="btn btn-primary btn-xs" type="button">
                                                                    <a href="${data[i].urlRoutePrint}" style="text-decoration:none;color:white;">
                                                                        <i class="fas fa-print"></i>
                                                                    </a>
                                                                </button>
                                                            <!-- end print row -->

                                                        </td>
                                                    </tr>
                                                `
                                }
                                let btnData = `<button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id=${lastId} id="load_more_button">عرض المزيد</button>`
                                document.getElementById("adminRecords").innerHTML += records
                                length += data.length
                                showItems.innerHTML = Number(length)
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnData
                            } else if (data.length === 0) {
                                let btnNoData = `<button type="button" name="load_more_button" class="w-auto btn btn-primary form-control px-5">لا يوجد بيانات اخري</button>`
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnNoData
                            }
                        }
                    })
                }
            });
        });
    </script>
@endsection


