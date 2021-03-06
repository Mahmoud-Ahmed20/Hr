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
    </style>
@endsection
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
                            <h3>?????????? ?????????? ????????</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">???????? ????????????</li>
                            <li class="breadcrumb-item active">?????????? ?????????? ?????????? ????????</li>
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
                            <h5>?????????? ?????????? ?????????? ????????</h5>
                        </div>
                        <div class="card-body">
                            <!-- start poper add admin -->

                            <div class="btn-popup pull-right">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">?????????? ??????????    </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">?????????? ??????????</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>

                                            </div>
                                            <div class="modal-body">
                                                <div dir="rtl">
                                                    <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                                        ?????????? ?????????? ????????
                                                    </h2>
                                                    <h2 style="
                                                                text-transform: uppercase;
                                                                text-align: center;
                                                                margin: 0;
                                                                font-size: 28px;
                                                                font-weight: 700;
                                                                    ">
                                                        Notice of absence of an employee
                                                    </h2>

                                                  <div class="outer__border">

                                                    <form class="card" action="{{url(route('admin/notice_absence_employee/store'))}}" method="post" enctype="multipart/form-data" >
                                                        @csrf
                                                    <center >
                                                        <span style="color: orangered" class="error">{{ ($errors->first('staff_number'))?$errors->first('staff_number'). ' - ' : '' }} </span>
                                                        <span style="color: orangered" class="error">{{ ($errors->first('staff_id'))?$errors->first('staff_id'). ' - ' : '' }} </span>
                                                        <span style="color: orangered" class="error">{{ ($errors->first('section_id'))?$errors->first('section_id'). ' - ' : '' }} </span>
                                                        <span style="color: orangered" class="error">{{ ($errors->first('job_id'))?$errors->first('job_id'). ' - ' : '' }} </span>

                                                    </center>
                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>?????? ????????????</span>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>?????? ????????????</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <select class="select_data" name="staff_id" >
                                                                            <option  selected  disabled>-- ???????? ?????????? ?????? ????????????   ----</option>
                                                                            <?php
                                                                            foreach ($staffs as $onestaff){
                                                                            ?>
                                                                            <option     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                                            <?php } ?> </select>
                                                                    </td>
                                                                    <td><input name="staff_number" type="number" /></td>
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>

                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>??????????</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>??????????????</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>??????????????</span>

                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <select class="select_data" name="section_id" >
                                                                            <option  selected  disabled>-- ???????? ?????????? ??????????   ----</option>
                                                                            <?php
                                                                            foreach ($sections as $onesection){
                                                                            ?>
                                                                            <option     value="{{$onesection->id}}">{{$onesection->name}}</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select name="job_id" class="select_data"  >
                                                                            <option  selected  disabled>-- ???????? ?????????? ??????????????   ----</option>
                                                                            <?php
                                                                            foreach ($jobs as $onejob){
                                                                            ?>
                                                                            <option     value="{{$onejob->id}}">{{$onejob->name_job}}</option>
                                                                            <?php } ?></select>
                                                                    </td>
                                                                    <td>
                                                                        <input name="date" type="date">
                                                                    </td>
                                                                </tr>

                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <h3>
                                                                            ?????? ?????? ???????????? ???????? ?????????? ?????????? ???? ?????????? ???? ?????????? ???? ?????? ?????????????? ?? ?????? ?????? ?????????? ?????? ???? ????
                                                                        </h3>
                                                                    </td>

                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">??????????</button>

                                                </form>

                                                  </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <!-- <button class="btn btn-primary" type="button">Save</button>
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-popup pull-right mr-1">
                                {{-- <button type="button" class="btn btn-primary">
                                    <a href="{{route('admin/jobOfferSpecification/excel')}}" style="text-decoration:none;color:white;">
                                        <i class="fas fa-file-excel"></i>
                                    </a>
                                </button> --}}
                                <button type="button" class="btn btn-primary">
                                    <a href="{{route('admin/notice_absence_employee/export/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                        <i class="fas fa-file-excel"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <a href="{{route('admin/notice_absence_employee/exportPDF')}}" style="text-decoration:none;color:white;">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </button>
                            </div>
                            <!-- end poper add admin -->
                            @isset($notice_absence_employee)
                                <br><br>
                                @include('flash::message')
                                <div class="card-body vendor-table">
                                    <table  class="display" id="basic-1">

                                        <thead>
                                        <tr>
                                            <th>??????????</th>
                                            <th>??????????????</th>
                                            <th>?????? ????????????</th>
                                            <th>??????????</th>
                                            <th>??????????????</th>
                                            <th>??????????????????</th>
                                        </tr>
                                        </thead>
                                        <tbody id="employeRecords">
                                        {{ csrf_field() }}
                                        @foreach($notice_absence_employee as $one_notice_absence_employee)
                                            <tr>
                                                <td>{{$one_notice_absence_employee->staff->name}}</td>
                                                <td>{{$one_notice_absence_employee->date}}</td>
                                                <td>{{$one_notice_absence_employee->staff_number}}</td>
                                                <td>{{$one_notice_absence_employee->section->name}}</td>
                                                <td>{{$one_notice_absence_employee->job->name_job}}</td>
                                                <td>
                                                    <button class="btn btn-warning mt-1 btn-xs" type="button">
                                                        <a href="{{route('admin/notice_absence_employee/edit', $one_notice_absence_employee->id)}}" style="text-decoration:none;color:white;">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>

                                                    <!-- delete row -->
                                                @include('admin.notice_absence_employee.delete')
                                                <!-- end delete row -->
                                                    <!-- print row  -->
                                                    <button class="btn btn-primary btn-xs mt-1" type="button">
                                                        <a href="{{route('admin/notice_absence_employee/print' , $one_notice_absence_employee->id)}}" style="text-decoration:none;color:white;">
                                                            <i class="fas fa-print"></i>
                                                        </a>
                                                    </button>
                                                    <!-- end print row  -->
                                                </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                        Showing 1 to <span id="showItems"></span> of <span>{{App\Models\Notice_absence_employee::notArchive()->count()}}</span> entries
                                    </div>
                                    <div class="ltn__pagination-area text-center mt-5">
                                        <div class="ltn__pagination">
                                            <div id="load_more">
                                                <button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id="'.$last_id.'" id="load_more_button">?????? ????????????</button>
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
        let dataLen = @json($notice_absence_employee);
        let showItems = document.getElementById("showItems")
        showItems.innerHTML = dataLen.data.length
        let length = dataLen.data.length
        $(document).ready(function() {
            $(document).on('click', '#load_more_button', function() {
                let records = ``
                var _token = $('input[name="_token"]').val();
                var id = $(this).attr('data-id');
                let lastId = ''
                $('#load_more_button').html('<b>... ???????? ??????????????</b>');
                load_data(id, _token);

                function load_data(id = "", _token) {
                    $.ajax({
                        url: "{{ route('admin/notice_absence_employee/getMore') }}",
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


                                                <td>${data[i].staff.name}</td>
                                                <td>${data[i].date}</td>
                                                <td>${data[i].staff_number}</td>
                                                <td>${data[i].section.name}</td>
                                                <td>${data[i].job.name_job}</td>

                                                            <td>
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
                                                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">?????????? ??????????</h5>
                                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form role="form" action="${data[i].urlRouteDelete}" class="" >
                                                                                        <input name="_method" type="hidden">
                                                                                        {{ csrf_field() }}
                                        <p>???? ?????? ?????????? ???? ?????? ?????? ???????????????? ??</p>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="submit">??????????</button>
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">??????????</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- end delete row -->
                                                 <!-- print row  -->
                                                        <button class="btn btn-primary btn-xs mt-1" type="button">
                                                            <a href="${data[i].urlRoutePrint}" style="text-decoration:none;color:white;">
                                                                <i class="fas fa-print"></i>
                                                            </a>
                                                        </button>
                                                    <!-- end print row  -->

            </td>
        </tr>
`
                                }
                                let btnData = `<button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id=${lastId} id="load_more_button">?????? ????????????</button>`
                                document.getElementById("employeRecords").innerHTML += records
                                length += data.length
                                showItems.innerHTML = Number(length)
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnData
                            } else if (data.length === 0) {
                                let btnNoData = `<button type="button" name="load_more_button" class="w-auto btn btn-primary form-control px-5">???? ???????? ???????????? ????????</button>`
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
