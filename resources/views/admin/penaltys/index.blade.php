@extends('layouts.admin.home')

<!-- title page -->
@section('title')
Multikart - Premium Admin Template
@endsection

@section('css')
    <style>
        * {
            box-sizing: border-box;
        }
        .outer__border {
            border: 5px solid #222;
            padding: 2px;
            margin-bottom: 5px;
        }
        .outer__border > div {
            border: 1px solid #222;
            padding: 5px;
        }
        table {
            width: 100%;
            border-spacing: 0;
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
        .modal-dialog {
            max-width: 80vw!important;
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
        .dataTables_paginate,
        .dataTables_info {
            display: none;
        }
        .modal__body-form table td {
            border: 1px solid #222;
            padding: 10px;
        }
    </style>
@endsection

@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>الاجراءات الجزائيه</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active">قائمه الاجراءات الجزائيه</li>
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
                    <h5>قائمه الاجراءات الجزائيه</h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->
                        <div class="btn-popup pull-right mr-1">
                            <a href="{{ route('admin/penaltys/create') }}">
                                <button class="btn btn-primary">اضافة</button>
                            </a>
                        </div>
                    <!-- end poper add admin -->
                    <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/penaltys/export/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/penaltys/export/pdf',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModalExportPDF">
                            <i class="fas fa-filter"></i>
                        </button>
                        <div class="modal fade" id="myModalExportPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel"></h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" id="form" action="{{url(route('admin/penaltys/index'))}}" class="" >
                                            <input name="_method" type="hidden">
                                            {{ csrf_field() }}

                                            @include('admin.penaltys.inputsCheck')

                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">تاكيد</button>
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    @isset($penaltys)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table class="display" id="basic-1">

                                <thead>
                                    <tr>
                                      @include('admin.penaltys.headertable')
                                        <th>العمليات </th>
                                    </tr>
                                </thead>
                                <tbody id="penaltyRecords">
                                    {{ csrf_field() }}
                                    @foreach($penaltys as $penalty)
                                    <tr>
<<<<<<< HEAD
                                       @include('admin.penaltys.foreachdata')
=======
                                        <td>{{optional($penalty->staff)->name}}</td>
                                        <td>{{optional($penalty->section)->name}}</td>
                                        <td>{{$penalty->joining_date}}</td>
                                        <td>{{optional($penalty->administration)->name_administration}}</td>
                                        <td>{{$penalty->job_title}}</td>
                                        <td>{{$penalty->last_penalty}}</td>
>>>>>>> 802b1d71623e67e71433f4bc75eff90524eca554
                                        <td>

                                            <!-- edit row -->
                                                <button class="btn btn-warning btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/penaltys/edit', $penalty->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                </button>
                                            <!-- end edit row -->

                                            <!-- delete row -->
                                                @include('admin.penaltys.delete')
                                            <!-- end delete row -->

                                            <!-- show row -->
                                                <button class="btn btn-primary btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/penaltys/print', $penalty->id)}}" style="text-decoration:none;color:white;">
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
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\PenaltyProcedures::notArchive()->count()}}</span> entries
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
        let dataLen = @json($penaltys);
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
                        url: "{{ route('admin/penaltys/getMore') }}",
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
                                                        <td>${data[i].sectionName}</td>
                                                        <td>${data[i].joining_date}</td>
                                                        <td>${data[i].administrationName}</td>
                                                        <td>${data[i].job_title}</td>
                                                        <td>${data[i].last_penalty}</td>
                                                        <td>

                                                            <!-- edit row -->
                                                            <button class="btn btn-warning btn-xs mt-1" type="button">
                                                                    <a href="${data[i].urlRouteEdit}" style="text-decoration:none;color:white;">
                                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                                    </a>
                                                            </button>
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
                                document.getElementById("penaltyRecords").innerHTML += records
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
        <script>
            $(document).ready(function(){
                $("#form #select-all").click(function(){
                    $("#form input[type='checkbox']").prop('checked',this.checked);
                });
            });

        </script>
@endsection
