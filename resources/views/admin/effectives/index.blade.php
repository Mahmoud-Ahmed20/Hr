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
        .modal-dialog table td,
        .modal-dialog table th {
          border: 3px double #222;
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
        .modal-dialog {
            max-width: 70vw!important;
        }
    </style>
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
                    <h3>اشعارات مباشره العمل</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active">قائمه اشعارات مباشره العمل</li>
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
                    <h5>قائمه اشعارات مباشره العمل</h5>
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
                                        <div class="modal-body modal__body-form">
                                            <form class="card" action="{{url(route('admin/effectiveNotice/store'))}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="digital-add needs-validation">
                                                    <header style="text-align: center; margin-bottom: 20px">
                                                        <div class="header__logo">
                                                            <h1>
                                                                مصنع تي إم
                                                                <span
                                                                >للملابس الجاهزة <br />
                                                                والتوريدات الفندقية
                                                                </span>
                                                            </h1>
                                                            <div style="margin: 0 20px; width: 120px">
                                                                <img src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt="logo" />
                                                            </div>
                                                        </div>
                                                    </header>
                                                    <p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p>
                                                    <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                                        اشعار مباشرة العمل
                                                    </h2>
                                                    <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                                        Effective Date Notice
                                                    </h2>
                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                        <span>الاسم</span>
                                                                        <span>Name</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                        <span>الوظيفة</span>
                                                                        <span>Title</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                        <span>رقم الموظف</span>
                                                                        <span>ID No</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>

                                                                        <select name="staff_id" id="staff_id">
                                                                            <option  selected  disabled >-- يرجي تحديد اسم الموظف   ----</option>
                                                                            @foreach ($Staff_names as $Staff_name )
                                                                            <option  value="{{$Staff_name->id}}">{{$Staff_name->name}}</option>
                                                                            @endforeach
                                                                          </select>
                                                                    </td>
                                                                    <td>
                                                                        <select name="job_id" id="job_id">
                                                                            <option  selected  disabled >-- يرجي تحديد الوظيفه   ----</option>
                                                                            @foreach ($jobs as $job )
                                                                            <option  value="{{$job->id }}">{{ $job->name_job }}</option>
                                                                            @endforeach
                                                                          </select>
                                                                          @error('job_id')
                                                                          <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td><input name="id_number" value="{{ old('id_number') }}" type="number" /></td>
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                        <span>الادارة</span>
                                                                        <span>Department</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                        <span>القسم</span>
                                                                        <span>Section</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <select name="administration_id" id="administration_id">
                                                                            <option  selected  disabled>-- يرجي تحديد الادارة   ----</option>
                                                                            @foreach ($administrations as $administration )
                                                                            <option value="{{$administration->id }}">{{ $administration->name_administration}}</option>
                                                                            @endforeach
                                                                          </select>
                                                                          @error('administration_id')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                      @enderror
                                                                    </td>
                                                                    <td>
                                                                        <select name="section_id" id="section_id">
                                                                            <option  selected  disabled >-- يرجي تحديد القسم   ----</option>
                                                                            @foreach ($sections as $section )
                                                                            <option  value="{{$section->id}}">{{ $section->name}}</option>
                                                                            @endforeach
                                                                          </select>
                                                                          @error('section_id')
                                                                          <span class="text-danger">{{$message}}</span>
                                                                        @enderror                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                        <span>تاريخ المباشرة</span>
                                                                        <span>Starting work at</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                        <span>الجنسية</span>
                                                                        <span>Nationality</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input name="start_working_at" value="{{ old('start_working_at') }}" type="date" /></td>
                                                                    <td>
                                                                        <select name="nationality_id" id="nationality_id">
                                                                            <option  selected  disabled>----</option>
                                                                            @foreach ($nationalitys as $nationality )
                                                                            <option value="{{$nationality->id }}">{{ $nationality->name_nationality}}</option>
                                                                            @endforeach
                                                                          </select>
                                                                          @error('nationality_id')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
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
                            <a href="{{route('admin/effectiveNotice/export/excel')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                    </div>
                    @isset($effectives)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table class="display" id="basic-1">

                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>الوظيفه</th>
                                        <th>رقم الموظف</th>
                                        <th>الاداره</th>
                                        <th>القسم</th>
                                        <th>الجنسيه</th>
                                        <th>تاريخ مباشره العمل</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody id="effectivesRecords">
                                    {{ csrf_field() }}
                                    @foreach($effectives as $effective)
                                    <tr>
                                        <td>{{optional($effective->staff)->name}}</td>
                                        <td>{{optional($effective->job)->name_job}}</td>
                                        <td>{{$effective->id_number}}</td>
                                        <td>{{optional($effective->administration)->name_administration}}</td>
                                        <td>{{optional($effective->section)->name}}</td>
                                        <td>{{optional($effective->nationality)->name_nationality}}</td>
                                        <td>{{$effective->start_working_at}}</td>
                                        <td>

                                            <!-- show row -->
                                                <button class="btn btn-warning btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/effectiveNotice/edit', $effective->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                </button>
                                            <!-- end show row -->

                                            <!-- delete row -->
                                                @include('admin.effectives.delete')
                                            <!-- end delete row -->

                                            <!-- show row -->
                                                <button class="btn btn-primary btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/effectiveNotice/print', $effective->id)}}" style="text-decoration:none;color:white;">
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
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\EffectiveDateNotice::notArchive()->count()}}</span> entries
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
        let dataLen = @json($effectives);
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
                        url: "{{ route('admin/effectiveNotice/getMore') }}",
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
                                                        <td>${data[i].urlRouteNameEmpolye}</td>
                                                        <td>${data[i].urlRoutejob}</td>
                                                        <td>${data[i].id_number}</td>
                                                        <td>${data[i].urlRouteadministration}</td>
                                                        <td>${data[i].urlRoutesection}</td>
                                                        <td>${data[i].urlRoutenationality}</td>
                                                        <td>${data[i].start_working_at}</td>
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
                                document.getElementById("effectivesRecords").innerHTML += records
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
