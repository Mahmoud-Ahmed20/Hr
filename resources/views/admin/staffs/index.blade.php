@extends('layouts.admin.home')

<!-- title page -->
@section('title')
Multikart - Premium Admin Template
@endsection

@section('css')
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
@endsection

@section('content')
<style>
    .dataTables_paginate,
    .dataTables_info {
        display: none;
    }
    .modal-dialog {
        max-width: 80vw!important;
    }
</style>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>الموظفين</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active">قائمه الموظفين</li>
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
                    <h5>قائمه الموظفين</h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->
                        <div class="btn-popup pull-right">
                            <button type="button" class="btn btn-primary">
                                <a href="{{route('admin/staffs/create')}}" style="text-decoration:none;color:white;">
                                    اضافه
                                </a>
                            </button>
                        </div>
                    <!-- end poper add admin -->
                    <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/staffs/export/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/staffs/export/pdf',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>
                        <!---filter ---->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModalExportPDF">
                            <i class="fas fa-filter"></i>
                        </button>
                        <div class="modal fade" id="myModalExportPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">PDF تصدير</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" id='form' action="{{url(route('admin/staffs/index',))}}" class="" >
                                            <input name="_method" type="hidden">
                                            {{ csrf_field() }}
                                            @include('admin.staffs.inputsCheckPDF')
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">تاكيد</button>
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--- end filter ---->

                    </div>
                    <div class="search_input">
                        <label for="search">Search : </label>
                        <input type="text" class="form-control" id="data_search">
                    </div>
                    @isset($staffs)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table table__style-wrapper">
                            <table class="display table__style" id="basic-1">
                                <thead>
                                    <tr>
                                        @include('admin.staffs.headertable')
                                    </tr>
                                </thead>
                                <tbody id="staffRecords">
                                    {{ csrf_field() }}
                                    @foreach($staffs as $staff)
                                        <tr>
                                                @include('admin.staffs.foreachdata')
                                            <td>
                                                <!-- show row -->
                                                    <button class="btn btn-warning btn-xs mt-1" type="button">
                                                        <a href="{{route('admin/staffs/edit', $staff->id)}}" style="text-decoration:none;color:white;">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                <!-- end show row -->

                                                <!-- delete row -->
                                                    @include('admin.staffs.delete')
                                                <!-- end delete row -->

                                                <!-- show row -->
                                                    <button class="btn btn-primary btn-xs mt-1" type="button">
                                                        <a href="{{route('admin/staffs/print', $staff->id)}}" style="text-decoration:none;color:white;">
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
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\Staff::notArchive()->count()}}</span> entries
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

<!-- Container-fluid Ends-->
@endsection

@section('script')
    <script>
        let dataLen = @json($staffs);
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
                        url: "{{ route('admin/staffs/getMore') }}",
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
                                                        <td>${data[i].id}</td>
                                                        <td>${data[i].created_at}</td>
                                                        <td>${data[i].name}</td>
                                                        <td>

                                                            <!-- show row -->
                                                                <button class="btn btn-warning btn-xs mt-1" type="button">
                                                                    <a href="${data[i].urlRouteEdit}" style="text-decoration:none;color:white;">
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
                                document.getElementById("staffRecords").innerHTML += records
                                length += data.length
                                showItems.innerHTML = Number(length)
                                $('#load_more_button_remove').remove();
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnData
                            } else if (data.length === 0) {
                                let btnNoData = `<button type="button" name="load_more_button" class="w-auto btn btn-primary form-control px-5" id="load_more_button_remove">Not Found Data</button>`
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnNoData
                            }
                        }
                    })
                }
            });

            $(document).on('keyup', '#data_search', function(){
                var query = $(this).val();
                var _token = $('input[name="_token"]').val();
                let records = ``
                event.preventDefault();
                $.ajax({
                    url:"{{ route('admin/staffs/search') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success:function(data){
                        if (data.length > 0) {
                            for (let i = 0; i < data.length; i++) {
                                if(data[i].searchButton == 1){
                                    printSearchButton = 1;
                                }else{
                                    printSearchButton = 0;
                                }
                                records +=
                                            `
                                                <tr>
                                                    <td>${data[i].id}</td>
                                                    <td>${data[i].created_at}</td>
                                                    <td>${data[i].name}</td>
                                                    <td>

                                                        <!-- show row -->
                                                            <button class="btn btn-warning btn-xs mt-1" type="button">
                                                                <a href="${data[i].urlRouteEdit}" style="text-decoration:none;color:white;">
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
                            document.getElementById("staffRecords").style.display = null
                            document.getElementById("staffRecords").innerHTML = records
                            $('#load_more_button').remove();
                            $('#load_more_button_remove').remove();
                            if(printSearchButton == 1){
                                let btnData = `<button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id='.$last_id.' id="load_more_button">Get More</button>`
                                document.getElementById("load_more").innerHTML = btnData
                            }
                            length = data.length
                            showItems.innerHTML = Number(length)
                        } else if (data.length === 0) {
                            $('#load_more_button').remove();
                            length = data.length
                            showItems.innerHTML = Number(length)
                            document.getElementById("staffRecords").style.display = 'none'
                            let btnNoData = `<button type="button" name="load_more_button" class="w-auto btn btn-primary form-control px-5" id="load_more_button_remove">Not Found Data</button>`
                            document.getElementById("load_more").innerHTML = btnNoData
                        }
                    }
                })
            });
        });
    </script>
     <script>
        $(document).ready(function(){
            $("#form #select-all").click(function(){
                $("#form input[type='checkbox']").prop('checked',this.checked);
            });
        });
    </script>

@endsection
