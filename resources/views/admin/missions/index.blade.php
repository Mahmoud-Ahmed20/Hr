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
        .dataTables_paginate,
            .dataTables_info {
                display: none;
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
                    <h3>المهمات</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active">قائمه المهمات</li>
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
                    <h5>قائمه المهمات</h5>
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
                                            <form class="card" action="{{url(route('admin/missions/store'))}}" method="post" enctype="multipart/form-data">
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
                                                    <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">تكليف بمهمة عمل</h2>
                                                    <h2 style="text-transform: uppercase;text-align: center;margin: 0;font-size: 28px;font-weight: 700;">Job Mission Request</h2>
                                                    <div class="flex__td" style="justify-content: center">
                                                        <div class="flex__td" style="margin: 0 15px">
                                                            <span>داخلي</span>
                                                            <span><input name="location" value="داخلي" type="radio" {{ old('location') ? "checked" : "" }}/></span>
                                                            <span>Local</span>
                                                        </div>
                                                        <div class="flex__td" style="margin: 0 15px">
                                                            <span>خارجي</span>
                                                            <span><input name="location" value="خارجي" type="radio" {{ old('location') ? "checked" : "" }}/></span>
                                                            @error('location')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                            <span>Inter</span>
                                                        </div>
                                                    </div>

                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                    <div class="flex__td">
                                                                        <span>اسم الموظف</span>
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
                                                                        <span>التاريخ</span>
                                                                        <span>Date</span>
                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>

                                                                        <select name="Staff_id" id="Staff_id">
                                                                            <option  selected  disabled >-- يرجي تحديد الوظيفه   ----</option>
                                                                            @foreach ($Staff_names as $Staff_name )
                                                                            <option  value="{{$Staff_name->id}}">{{$Staff_name->name}}</option>
                                                                            @endforeach
                                                                          </select>

                                                                    </td>
                                                                    @error('Staff_id')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                    <td><input name="number" value="{{ old('number') }}" type="text" /></td>
                                                                    @error('number')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                    <td><input name="date" value="{{ old('date') }}" type="date" /></td>
                                                                    @error('date')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                    <div class="flex__td">
                                                                        <span>مسمي الوظيفة</span>
                                                                        <span>Title</span>
                                                                    </div>
                                                                    </td>
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
                                                                    <td><input name="job_title" value="{{ old('job_title') }}" type="text" /></td>
                                                                    @error('job_title')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
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
                                                                    </td>
                                                                    @error('section_id')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                  @enderror
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                    <div class="flex__td">
                                                                        <span>جهة مهمة العمل</span>
                                                                        <span>Direction Of The Mission</span>
                                                                    </div>
                                                                    </td>
                                                                    <td>
                                                                    <div class="flex__td">
                                                                        <span>المدة</span>
                                                                        <span>Duration Of Mission</span>
                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input name="direction_of_the_mission" value="{{ old('direction_of_the_mission') }}" type="text" /></td>
                                                                    @error('direction_of_the_mission')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                    <td><input name="duration_of_mission" value="{{ old('duration_of_mission') }}" type="number" /></td>
                                                                    @error('duration_of_mission')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                    <div class="flex__td">
                                                                        <span>اعتبارا من</span>
                                                                        <span>Date From</span>
                                                                    </div>
                                                                    </td>
                                                                    <td>
                                                                    <div class="flex__td">
                                                                        <span>اعتبارا الي</span>
                                                                        <span>Date to</span>
                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input name="date_from" value="{{ old('date_from') }}" type="date" /></td>
                                                                    @error('date_from')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                    <td><input name="date_to" value="{{ old('date_to') }}" type="date" /></td>
                                                                    @error('date_to')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
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
                                                                        <span>بيان مهمة العمل</span>
                                                                        <span>Mission specification</span>
                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><textarea name="mission_specification" rows="5">{{ old('mission_specification') }}</textarea></td>
                                                                    @error('mission_specification')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td colspan="3">
                                                                        <div class="flex__td" style="justify-content: flex-start">
                                                                            <span><input type="checkbox" style="width: auto" /></span>
                                                                            <span style="margin: 0 10px">سلفة مصاريف بمبلغ</span>
                                                                            <span><input name="expense_advance" value="{{ old('expense_advance') }}" type="number" style="width: auto" /></span>
                                                                            @error('expense_advance')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                            <span style="margin: 0 10px">ريال</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">
                                                                    <div class="flex__td" style="justify-content: flex-start">
                                                                        <span><input type="checkbox" style="width: auto" /></span>
                                                                        <span style="margin: 0 10px">تذكرة سفر خط سير</span>
                                                                        <span style="width: 50%; margin: 0 10px">
                                                                            <input name="ticket" value="{{ old('ticket') }}" type="text"/>
                                                                            @error('ticket')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </span>
                                                                        <span>Tacit</span>
                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3">
                                                                    <div class="flex__td" style="justify-content: flex-start">
                                                                        <span><input type="checkbox" style="width: auto" /></span>
                                                                        <span style="margin: 0 10px">التاشيرات</span>
                                                                        <span style="width: 20%; margin: 0 10px">
                                                                            <input name="visas[1][name]" value="{{ old('visas[1][name]') }}" type="text"/>
                                                                        </span>
                                                                        <span style="width: 20%; margin: 0 10px">
                                                                            <input name="visas[2][name]" value="{{ old('visas[2][name]') }}" type="text"/>
                                                                        </span>
                                                                        <span style="width: 20%; margin: 0 10px">
                                                                            <input name="visas[3][name]" value="{{ old('visas[3][name]') }}" type="text"/>
                                                                        </span>
                                                                        <span>Visas</span>
                                                                    </div>
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
                            <a href="{{route('admin/missions/export/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/missions/export/pdf',$inputs)}}" style="text-decoration:none;color:white;">
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
                                        <form role="form" id="form" action="{{url(route('admin/missions/index'))}}" class="" >
                                            <input name="_method" type="hidden">
                                            {{ csrf_field() }}

                                            @include('admin.missions.inputsCheck')

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
                    @isset($missions)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table class="display" id="basic-1">

                                <thead>
                                    <tr>
                                       @include('admin.missions.headertable')
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody id="missionRecords">
                                    {{ csrf_field() }}
                                    @foreach($missions as $mission)
                                    <tr>
                                        @include('admin.missions.foreachdata')
                                        <td>

                                            <!-- show row -->
                                                <button class="btn btn-warning btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/missions/edit', $mission->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                </button>
                                            <!-- end show row -->

                                            <!-- delete row -->
                                                @include('admin.missions.delete')
                                            <!-- end delete row -->

                                            <!-- show row -->
                                                <button class="btn btn-primary btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/missions/print', $mission->id)}}" style="text-decoration:none;color:white;">
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
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\JobMissionRequest::notArchive()->count()}}</span> entries
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
        let dataLen = @json($missions);
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
                        url: "{{ route('admin/missions/getMore') }}",
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
                                                        <td>${data[i].location}</td>
                                                        <td>${data[i].urlRouteNameEmploye}</td>
                                                        <td>${data[i].number}</td>
                                                        <td>${data[i].date}</td>
                                                        <td>${data[i].job_title}</td>
                                                        <td>${data[i].direction_of_the_mission}</td>
                                                        <td>${data[i].urlRouteAdministration}</td>
                                                        <td>${data[i].urlRouteNameSections}</td>
                                                        <td>${data[i].date_from}</td>
                                                        <td>${data[i].date_to}</td>
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
                                document.getElementById("missionRecords").innerHTML += records
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
