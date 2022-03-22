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
        padding: 5px 0;
      }
      table {
        width: 100%;
        border-spacing: 0;
      }
      table td,
      table th {
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
      table input, table textarea {
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
                    <h3>انهاء مهمات العمل</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active">قائمه انهاء مهمات العمل</li>
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
                    <h5>قائمه انهاء مهمات العمل</h5>
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
                                            <form class="card" action="{{url(route('admin/MissionsAccomplishment/store'))}}" method="post" enctype="multipart/form-data">
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
                                                        <h2>نموذج انهاء مهمة عمل Mission Accomplishment</h2>
                                                    </header>

                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>بيانات الموظف</span>
                                                                            <span>Employ date</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
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
                                                                            <span>الرقم</span>
                                                                            <span>No</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>تاريخ التعيين</span>
                                                                            <span>Growing date</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <select name="staff_id" id="staff_id">
                                                                            <option>-- اسم الموظف ----</option>
                                                                            @isset($Staffs)
                                                                                @foreach ($Staffs as $staff )
                                                                                    <option value="{{$staff->id}}" {{ old('staff_id') == $staff->id ? 'selected' : "" }}>{{$staff->name}}</option>
                                                                                @endforeach
                                                                            @endisset
                                                                        </select>
                                                                        @error('Staff_id')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input name="number" value="{{ old('number') }}" type="text" />
                                                                        @error('number')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input name="work_date" value="{{ old('work_date') }}" type="date" />
                                                                        @error('work_date')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>مسمي الوظيفة</span>
                                                                            <span>Job title</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span>الادارة</span>
                                                                        <span>Department</span>
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
                                                                        <select name="job_id" id="job_id">
                                                                            <option>-- الوظيفه ----</option>
                                                                            @isset($jobs)
                                                                                @foreach ($jobs as $job )
                                                                                    <option value="{{$job->id}}" {{ old('job_id') == $job->id ? 'selected' : "" }}>{{$job->name_job}}</option>
                                                                                @endforeach
                                                                            @endisset
                                                                        </select>
                                                                        @error('job_id')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <select name="administration_id" id="administration_id">
                                                                            <option>-- الاداره ----</option>
                                                                            @isset($administrations)
                                                                                @foreach ($administrations as $administration )
                                                                                    <option value="{{$administration->id}}" {{ old('administration_id') == $administration->id ? 'selected' : "" }}>{{$administration->name_administration}}</option>
                                                                                @endforeach
                                                                            @endisset
                                                                        </select>
                                                                        @error('administration_id')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <select name="section_id" id="section_id">
                                                                            <option>-- القسم ----</option>
                                                                            @isset($sections)
                                                                                @foreach ($sections as $section )
                                                                                    <option value="{{$section->id}}" {{ old('section_id') == $section->id ? 'selected' : "" }}>{{$section->name}}</option>
                                                                                @endforeach
                                                                            @endisset
                                                                        </select>
                                                                        @error('section_id')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>جهة المهمة الي</span>
                                                                            <span>Direction Of the mission</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>المدة</span>
                                                                            <span>Duration of mission</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input name="duration_of_mission" value="{{ old('duration_of_mission') }}" type="text">
                                                                        @error('duration_of_mission')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input name="direction_of_the_mission" value="{{ old('direction_of_the_mission') }}" type="text">
                                                                        @error('direction_of_the_mission')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>تاريخ المغادرة</span>
                                                                            <span>Leaving Date</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>تاريخ المباشرة</span>
                                                                            <span>Starting work at</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input name="leaving_date" value="{{ old('leaving_date') }}" type="date">
                                                                        @error('leaving_date')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input name="start_working_at" value="{{ old('start_working_at') }}" type="date">
                                                                        @error('start_working_at')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="flex__td">
                                                                            <span>تفاصيل المهمة </span>
                                                                            <span>Mission Details</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <textarea name="mission_details" rows="10">{{ old('mission_details') }}</textarea>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div class="flex__td">
                                                                            <span>المهام المنجزة</span>
                                                                            <span>Results</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"><textarea name="results" rows="10">{{ old('results') }}</textarea></td>
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
                            <a href="{{route('admin/MissionsAccomplishment/export/excel')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/MissionsAccomplishment/export/pdf')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>
                    </div>
                    @isset($missionsAccomplishment)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table table__style-wrapper">
                            <table class="display table__style" id="basic-1">

                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>الرقم</th>
                                        <th>الوظيفه</th>
                                        <th>القسم</th>
                                        <th>الاداره</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody id="missionsAccomplishmentRecords">
                                    {{ csrf_field() }}
                                    @foreach($missionsAccomplishment as $mission)
                                        <tr>
                                            <td>{{optional($mission->staff)->name}}</td>
                                            <td>{{$mission->number}}</td>
                                            <td>{{optional($mission->job)->name_job}}</td>
                                            <td>{{optional($mission->section)->name}}</td>
                                            <td>{{optional($mission->administration)->name_administration}}</td>
                                            <td>

                                                <!-- show row -->
                                                    <button class="btn btn-warning btn-xs mt-1" type="button">
                                                        <a href="{{route('admin/MissionsAccomplishment/edit', $mission->id)}}" style="text-decoration:none;color:white;">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                <!-- end show row -->

                                                <!-- delete row -->
                                                    @include('admin.missionsAccomplishment.delete')
                                                <!-- end delete row -->

                                                <!-- show row -->
                                                    <button class="btn btn-primary btn-xs mt-1" type="button">
                                                        <a href="{{route('admin/MissionsAccomplishment/print', $mission->id)}}" style="text-decoration:none;color:white;">
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
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\MissionsAccomplishment::notArchive()->count()}}</span> entries
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
        let dataLen = @json($missionsAccomplishment);
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
                        url: "{{ route('admin/MissionsAccomplishment/getMore') }}",
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
                                                        <td>${data[i].number}</td>
                                                        <td>${data[i].jobName}</td>
                                                        <td>${data[i].sectionName}</td>
                                                        <td>${data[i].administrationName}</td>
                                                        <td>

                                                            <!-- show row -->
                                                                <button class="btn btn-warning btn-xs" type="button">
                                                                    <a href="${data[i].urlRouteEdit}" style="text-decoration:none;color:white;">
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
                                document.getElementById("missionsAccomplishmentRecords").innerHTML += records
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
