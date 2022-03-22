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
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/evaluatePersonalInterviews/index'))}}">قائمه تقييم المقابلات الشخصيه</a>
                        </li>
                        <li class="breadcrumb-item active">اضافه تقييم</li>
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
                                <h5>اضافه</h5>
                            </div>
                            <div class="card-body">
                                <form class="card" action="{{url(route('admin/evaluatePersonalInterviews/store'))}}" method="post">
                                    @include('flash::message')
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
                        </div>
                    </div>
                </div>
            </div>
    <!-- Container-fluid Ends-->
@endsection
