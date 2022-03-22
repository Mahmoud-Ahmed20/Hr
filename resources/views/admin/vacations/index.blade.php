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
    .dataTables_paginate,
    .dataTables_info, .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter {
        display: none;
    }
    .search_input {
        display: flex;
        align-items: center;
    }
    .search_input input {
        width: auto;
        margin-inline-start: 10px;
    }
</style>

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>طلبات الاجازه</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active">قائمه طلبات الاجازه</li>
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
                    <h5>قائمه طلبات الاجازه</h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->
                        <div class="btn-popup pull-right">
                            <button type="button" class="btn btn-primary">
                                <a href="{{route('admin/vacations/create')}}" style="text-decoration:none;color:white;">
                                    اضافه
                                </a>
                            </button>
                        </div>
                    <!-- end poper add admin -->
                    <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/vacations/export/excel')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/vacations/export/pdf')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>
                    </div>
                    @isset($vacations)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table class="display" id="basic-1">

                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>المسمي الوظيفي</th>
                                        <th>سبب الاجازه</th>
                                        <th>اول يوم</th>
                                        <th>اخر يوم</th>
                                        <th>الهاتف</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody id="adminRecords">
                                    {{ csrf_field() }}
                                    @foreach($vacations as $vacation)
                                        <tr>
                                            <td>{{optional( $vacation->staff)->name }}</td>
                                            <td>{{$vacation->job_title}}</td>
                                            <td>{{$vacation->reason_for_leave}}</td>
                                            <td>{{$vacation->first_day_off}}</td>
                                            <td>{{$vacation->last_date_off}}</td>
                                            <td>{{$vacation->phone}}</td>
                                            <td>

                                                <!-- show row -->
                                                <button class="btn btn-warning mt-1 btn-xs" type="button">
                                                    <a href="{{route('admin/vacations/edit', $vacation->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                </button>
                                                <!-- end show row -->

                                                <!-- delete row -->
                                                @include('admin.vacations.delete')
                                                <!-- end delete row -->

                                                <!-- show row -->
                                                <button class="btn btn-primary btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/vacations/print', $vacation->id)}}" style="text-decoration:none;color:white;">
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
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\VocationRequest::notArchive()->count()}}</span> entries
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

@if (count($errors) > 0)
    <script>
        $(function() {
            $('#exampleModal').modal('show');
        });
    </script>
@endif

<script>
        let dataLen = @json($vacations);
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
                        url: "{{ route('admin/vacations/getMore') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                for (let i = 0; i < data.length; i++) {
                                    console.log(data)
                                    lastId = data[i].id
                                    records +=
                                                `
                                                    <tr>
                                                        <td>${data[i].urlRouteNameEmploye}</td>
                                                        <td>${data[i].job_title}</td>
                                                        <td>${data[i].reason_for_leave}</td>
                                                        <td>${data[i].first_day_off}</td>
                                                        <td>${data[i].last_date_off}</td>
                                                        <td>${data[i].phone}</td>
                                                        <td>

                                                            <!-- show row -->
                                                                <button class="btn btn-warning mt-1 btn-xs" type="button">
                                                                    <a href="${data[i].urlRouteUpdate}" style="text-decoration:none;color:white;">
                                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                                    </a>
                                                                </button>
                                                            <!-- end show row -->

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
                                                                <button class="btn btn-primary btn-xs mt-1" type="button">
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
<!-- Container-fluid Ends-->
@endsection
