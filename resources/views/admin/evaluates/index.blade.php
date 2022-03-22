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

        .outer__border>div {
            border: 1px solid #222;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table td,
        table th {
            border: 3px double #222;
            padding: 3px 5px;
            font-size: 16px;
            font-weight: 600;
        }

        table input,
        table textarea {
            width: 100%;
            margin: auto;
            padding: 5px;
            resize: none;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
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
            direction: ltr
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
            background-color: #149ADB;
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
                    <h3>تقييم المقابلات الشخصيه</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active">قائمه تقييم المقابلات الشخصيه</li>
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
                    <h5>قائمه تقييم المقابلات الشخصيه</h5>
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
                                            <form class="card" action="{{url(route('admin/evaluatePersonalInterviews/store'))}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="digital-add needs-validation">

                                                    <header style="text-align: center; margin-bottom: 20px">
                                                        <div style="margin: 0 20px; width: 75px;">
                                                            <img src="../qr.jpg" alt="logo" style="max-width: 100%;" />
                                                        </div>
                                                        <div class="header__logo">
                                                            <h1>
                                                                مصنع تي إم
                                                                <span>للملابس الجاهزة <br />
                                                                    والتوريدات الفندقية
                                                                </span>
                                                            </h1>
                                                            <div style="margin: 0 20px; width: 120px">
                                                                <img src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt="logo" />
                                                            </div>
                                                        </div>
                                                    </header>
                                                    <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                                        نموذج تقييم المقابلات الشخصية
                                                    </h2>

                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>اسم المتقدم</td>
                                                                    <td>المؤهل العام</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input name="name" value="{{ old('name') }}" type="text"></td>
                                                                    <td><input name="qualification" value="{{ old('qualification') }}" type="text"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>الوظيفة المتقدم لها</td>
                                                                    <td>القسم</td>
                                                                </tr>
                                                                <tr>
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
                                                                    <td>
                                                                        <select name="section_id" id="section_id">
                                                                            <option  selected  disabled>-- يرجي تحديد الادارة   ----</option>
                                                                            @foreach ($section as $section_id )
                                                                            <option value="{{$section_id->id }}">{{ $section_id->name}}</option>
                                                                            @endforeach
                                                                          </select>
                                                                          @error('section_id')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                      @enderror                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="outer__border">
                                                        <div>
                                                            <table>
                                                                <tr>
                                                                    <td>مجال التقييم</td>
                                                                    <td style="width: 60%;">&nbsp;</td>
                                                                    <td>النسبة الكاملة</td>
                                                                    <td>نسبة المرشح <br> النسبة اللي حصل عليها المرشح</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>المظهر الخارجي</td>
                                                                    <td>المظهر العام الممتاز للمتقدم للوظيفة يعطيك تصور انه جيدا</td>
                                                                    <td>5%</td>
                                                                    <td><input name="extierior" value="{{ old('extierior') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>الشخصية</td>
                                                                    <td>الشخصية والثقة العالية يعطيك تصور ان الموظف واثق في عمله ونستطيع نعتمد عليه مستقبلا</td>
                                                                    <td>10%</td>
                                                                    <td><input name="personal" value="{{ old('personal') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>العمل الجماعي</td>
                                                                    <td>الموظف الجيد هو الذي يستطيع ان يعمل ضمن فريق ويشاركه المعلومات ويساعده علي حل المشكلات</td>
                                                                    <td>10%</td>
                                                                    <td><input name="team_work" value="{{ old('team_work') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>المبادرة</td>
                                                                    <td>هل عنده الحماس في انه يبدا ويبادر وياخذ مبادرات عاده ما تكون مطلوبة منه ويساعد زملائه</td>
                                                                    <td>10%</td>
                                                                    <td><input name="initiatire" value="{{ old('initiatire') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>اللغة الانجليزية</td>
                                                                    <td>معرفة قدرته في اللغة الانجليزية تسمح للشركة ان تعتمد عليه في عمل البحوث او حضور اجتماعات مع
                                                                        اجانب</td>
                                                                    <td>10%</td>
                                                                    <td><input name="english" value="{{ old('english') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>الطموح</td>
                                                                    <td>الموظف الذي يتطلع لمستقبل افضل وما يوقف علي العمل المحدد له دائما عنده افكار للتطوير والتغيير
                                                                    </td>
                                                                    <td>5%</td>
                                                                    <td><input name="ambition" value="{{ old('ambition') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>اتخاذ القرار</td>
                                                                    <td>الموظف الجيد هو الذي يتخذ القرار المناسب بحكمة وفي الوقت المناسب</td>
                                                                    <td>5%</td>
                                                                    <td><input name="make_decision" value="{{ old('make_decision') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>الخبرة</td>
                                                                    <td>الخبرات السابقة تعطيك تصور عن الاشياء التي قام بها من قبل وهل هي متوافقة مع الوظيفة المطروحة ام
                                                                        لا</td>
                                                                    <td>15%</td>
                                                                    <td><input name="experience" value="{{ old('experience') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>المهارات</td>
                                                                    <td>تعرف ما هي قدراته مثل السرعة وحب التعلم والنشطا وما هو الذي تميزه عن غيره؟ وهل هي متوافقة مع الوظيفة المطروحة ام لا</td>
                                                                    <td>20%</td>
                                                                    <td><input name="skills" value="{{ old('skills') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>المؤهل العلمي</td>
                                                                    <td>هل الشهادرة متوافقة مع الوظيفة المتاحة ام لا</td>
                                                                    <td>10%</td>
                                                                    <td><input name="qualification_skills" value="{{ old('qualification_skills') }}" type="number"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">المجموع</td>
                                                                    <td>100%</td>
                                                                    <td><input type="text"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <br><br><br>

                                                    <div style="margin-bottom: 15px;">
                                                        <h3>ملاحظات</h3>
                                                        <textarea style="width: 100%;" rows="5" name="notes">{{ old('notes') }}</textarea>
                                                    </div>

                                                    <div style="display: flex; margin-bottom: 15px;">
                                                        <div>
                                                            <input type="radio" name="interview_status" value="قبول" {{ old('interview_status') == "قبول" ? "checked" : "" }}>
                                                            <label for="">قبول</label>
                                                        </div>
                                                        <div style="margin: 0 10px;">
                                                            <input type="radio" name="interview_status" value="انتظار" {{ old('interview_status') == "انتظار" ? "checked" : "" }}>
                                                            <label for="">انتظار</label>
                                                        </div>
                                                        <div>
                                                            <input type="radio" name="interview_status" value="رفض" {{ old('interview_status') == "رفض" ? "checked" : "" }}>
                                                            <label for="">رفض</label>
                                                        </div>
                                                    </div>

                                                    <div style="display: flex;">
                                                        <div>
                                                            <span>تاريخ المقابلة</span><br>
                                                            <input name="interview_date" value="{{ old('interview_date') }}" type="date">
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
                            <a href="{{route('admin/evaluatePersonalInterviews/export/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/evaluatePersonalInterviews/export/pdf',$inputs)}}" style="text-decoration:none;color:white;">
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
                                        <form role="form" id="form" action="{{url(route('admin/evaluatePersonalInterviews/index'))}}" class="" >
                                            <input name="_method" type="hidden">
                                            {{ csrf_field() }}

                                            @include('admin.evaluates.inputsCheck')

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
                    @isset($evaluates)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table table__style-wrapper">
                            <table class="display table__style" id="basic-1">

                                <thead>
                                    <tr>
                                        @include('admin.evaluates.headertable')
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody id="evaluateRecords">
                                    {{ csrf_field() }}
                                    @foreach($evaluates as $evaluate)
                                       <tr>
                                            @include('admin.evaluates.foreachdata')
                                            <td>
                                                <!-- show row -->
                                                    <button class="btn btn-warning btn-xs mt-1" type="button">
                                                        <a href="{{route('admin/evaluatePersonalInterviews/edit', $evaluate->id)}}" style="text-decoration:none;color:white;">
                                                            <i class="fas fa-edit" style="color:white;"></i>
                                                        </a>
                                                    </button>
                                                <!-- end show row -->

                                                <!-- delete row -->
                                                    @include('admin.evaluates.delete')
                                                <!-- end delete row -->

                                                <!-- show row -->
                                                    <button class="btn btn-primary btn-xs mt-1" type="button">
                                                        <a href="{{route('admin/evaluatePersonalInterviews/print', $evaluate->id)}}" style="text-decoration:none;color:white;">
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
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\EvaluatePersonalInterview::notArchive()->count()}}</span> entries
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
        let dataLen = @json($evaluates);
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
                        url: "{{ route('admin/evaluatePersonalInterviews/getMore') }}",
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
                                                        <td>${data[i].name}</td>
                                                        <td>${data[i].qualification}</td>
                                                        <td>${data[i].urlRouteJob}</td>
                                                        <td>${data[i].urlRouteSection}</td>
                                                        <td>${data[i].interview_status}</td>
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
                                document.getElementById("evaluateRecords").innerHTML += records
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
