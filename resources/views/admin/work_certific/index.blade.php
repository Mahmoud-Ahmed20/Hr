@extends('layouts.admin.home')
@section('css')
    <style>
        .dataTables_paginate,
        .dataTables_info {
            display: none;
        }
        * {
        box-sizing: border-box;
    }

    .outer__border {
        border: 5px solid #222;
        padding: 2px;
        margin-bottom: 5px;
    }

    .outer__border>div {
        border: 1px solid #222;
        padding: 5px;
    }

    table {
        width: 100%;
        border-spacing: 0;
    }

    table td,
    table th {
        padding: 3px 5px;
        font-size: 20px;
        font-weight: 600;
    }

    .flex__td {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    table input,
    table textarea {
        width: 100%;
        margin: auto;
        padding: 5px;
        resize: none;
    }

    .header__logo {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .header__logo h1 {
        margin: 0 0 15px 0;
    }

    .header__logo img {
        max-width: 100%;
    }

    .header__logo span {
        display: block;
        font-size: 22px;
        font-weight: 500;
    }

    .page__footer {
        text-align: center;
        margin-top: 20px;
        padding-top: 30px;
        border-top: 2px solid #222;
        direction: ltr;
    }

    .page__footer p {
        font-size: 16px;
        margin: 0;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .page__footer p img {
        margin: 0 3px;
    }

    .page__footer p span {
        display: inline-block;
        width: 18px;
        height: 18px;
        background-color: #149adb;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 3px;
    }

    .page__footer p span img {
        width: 80%;
    }

    .select_data {
        width: 100%;
        font-size: 17px;
        text-align: center;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    .modal-dialog {
            max-width: 80vw!important;
        }

    </style>
@endsection
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
                            <h3>شهاده خبره</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">لوحه التحكم</li>
                            <li class="breadcrumb-item active">قائمة شهاده خبره</li>
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
                            <h5>قائمة شهاده خبره</h5>
                        </div>
                        <div class="card-body">
                            <!-- start poper add admin -->


                            <div class="btn-popup pull-right mr-1">
                                <a href="{{ route('admin/work_certific/create') }}">
                                    <button class="btn btn-primary">اضافة</button>
                                </a>
                            </div>
                            <div class="btn-popup pull-right mr-1">
                                    <button type="button" class="btn btn-primary">
                                        <a href="{{route('admin/work_certific/export/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                            <i class="fas fa-file-excel"></i>
                                        </a>
                                    </button>
                                <button type="button" class="btn btn-primary">
                                    <a href="{{route('admin/work_certific/pdf')}}" style="text-decoration:none;color:white;">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </button>
                            </div>

                            <!-- end poper add admin -->
                            @isset($work_certific)
                                <br><br>
                                @include('flash::message')
                                <div class="card-body vendor-table">
                                    <table  class="display" >

                                        <thead>
                                        <tr>
                                            <th>الموظف</th>
                                            <th>المسمي الموظيفي</th>
                                            <th>التاريخ</th>
                                            <th>تاريخ بداء الخدمة</th>
                                            <th>تاريخ نهاية الخدمة</th>
                                            <th>الاجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody id="employeRecords">
                                        {{ csrf_field() }}
                                        @foreach($work_certific as $one_work_certific)
                                            <tr>
                                                <td>{{($one_work_certific->staff)?$one_work_certific->staff->name : ''}}</td>
                                                <td>{{$one_work_certific->job_title}}</td>
                                                <td>{{$one_work_certific->date}}</td>
                                                <td>{{$one_work_certific->start_work}}</td>
                                                <td>{{$one_work_certific->end_work}}</td>
                                                <td>
                                                    <button class="btn btn-warning mt-1 btn-xs" type="button">
                                                        <a href="{{route('admin/work_certific/edit', $one_work_certific->id)}}" style="text-decoration:none;color:white;">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>

                                                    <!-- delete row -->
                                                @include('admin.work_certific.delete')
                                                <!-- end delete row -->

                                            <!-- print row -->
                                            <button class="btn btn-primary btn-xs mt-1" type="button">
                                                <a href="{{route('admin/work_certific/print', $one_work_certific->id)}}" style="text-decoration:none;color:white;">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            </button>
                                            <!-- end print row -->

                                                </td>
                                           </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                        Showing 1 to <span id="showItems"></span> of <span>{{App\Models\Work_certific::notArchive()->count()}}</span> entries
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
    <!-- Container-fluid Ends-->
@endsection
@section('script')
    <script>
        let dataLen = @json($work_certific);
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
                        url: "{{ route('admin/work_certific/getMore') }}",
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


                                                <td>${data[i].staffName}</td>
                                                <td>${data[i].date}</td>
                                                <td>${data[i].job_title}</td>
                                                <td>${data[i].start_work}</td>
                                                <td>${data[i].end_work}</td>

                                                            <td>

                                                                <!-- activate row -->

                                                                    <div class="modal fade" id="myModalactivate-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد العمليه</h5>
                                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form role="form" action="${data[i].urlRouteActivate}" class="" >
                                                                                        <input name="_method" type="hidden">
                                                                                        {{ csrf_field() }}
                                        <p>هل انت متاكد من تعديل هذه البيانات ؟</p>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">تاكيد</button>
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- end activate row -->
  <!-- show row -->
                                                                <button class="btn btn-warning mt-1 btn-xs" type="button">
                                                                    <a href="edit/${data[i].id}" style="text-decoration:none;color:white;">
                                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                                    </a>
                                                                </button>
                                                            <!-- end show row -->
                <!-- delete row -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaldelete-${data[i].id}">
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
                                document.getElementById("employeRecords").innerHTML += records
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
