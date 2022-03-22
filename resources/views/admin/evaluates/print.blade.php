@extends('layouts.admin.home')
<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection
<!-- content -->

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

        table input disabled,
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
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
  <i class="mdi mdi-printer ml-1"></i>طباعة
</button>
<div class=" main-content-body-invoice" id="print">
    @isset($evaluate)
        <header style="text-align: center; margin-bottom: 20px">
            <div style="margin: 0 20px; width: 75px;">
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
                        <td><input disabled name="name" value="{{ $evaluate->name }}" type="text"></td>
                        <td><input disabled name="qualification" value="{{ $evaluate->qualification }}" type="text"></td>
                    </tr>
                    <tr>
                        <td>الوظيفة المتقدم لها</td>
                        <td>القسم</td>
                    </tr>
                    <tr>
                        <td><input disabled name="job_title" value="{{ optional($evaluate->Job)->name_job }}" type="text"></td>
                        <td><input disabled name="section" value="{{ optional($evaluate->Section)->name }}" type="text"></td>
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
                        <td><input disabled name="extierior" value="{{ $evaluate->extierior }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>الشخصية</td>
                        <td>الشخصية والثقة العالية يعطيك تصور ان الموظف واثق في عمله ونستطيع نعتمد عليه مستقبلا</td>
                        <td>10%</td>
                        <td><input disabled name="personal" value="{{ $evaluate->personal }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>العمل الجماعي</td>
                        <td>الموظف الجيد هو الذي يستطيع ان يعمل ضمن فريق ويشاركه المعلومات ويساعده علي حل المشكلات</td>
                        <td>10%</td>
                        <td><input disabled name="team_work" value="{{ $evaluate->team_work }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>المبادرة</td>
                        <td>هل عنده الحماس في انه يبدا ويبادر وياخذ مبادرات عاده ما تكون مطلوبة منه ويساعد زملائه</td>
                        <td>10%</td>
                        <td><input disabled name="initiatire" value="{{ $evaluate->initiatire }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>اللغة الانجليزية</td>
                        <td>معرفة قدرته في اللغة الانجليزية تسمح للشركة ان تعتمد عليه في عمل البحوث او حضور اجتماعات مع
                            اجانب</td>
                        <td>10%</td>
                        <td><input disabled name="english" value="{{ $evaluate->english }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>الطموح</td>
                        <td>الموظف الذي يتطلع لمستقبل افضل وما يوقف علي العمل المحدد له دائما عنده افكار للتطوير والتغيير
                        </td>
                        <td>5%</td>
                        <td><input disabled name="ambition" value="{{ $evaluate->ambition }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>اتخاذ القرار</td>
                        <td>الموظف الجيد هو الذي يتخذ القرار المناسب بحكمة وفي الوقت المناسب</td>
                        <td>5%</td>
                        <td><input disabled name="make_decision" value="{{ $evaluate->make_decision }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>الخبرة</td>
                        <td>الخبرات السابقة تعطيك تصور عن الاشياء التي قام بها من قبل وهل هي متوافقة مع الوظيفة المطروحة ام
                            لا</td>
                        <td>15%</td>
                        <td><input disabled name="experience" value="{{ $evaluate->experience }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>المهارات</td>
                        <td>تعرف ما هي قدراته مثل السرعة وحب التعلم والنشطا وما هو الذي تميزه عن غيره؟ وهل هي متوافقة مع الوظيفة المطروحة ام لا</td>
                        <td>20%</td>
                        <td><input disabled name="skills" value="{{ $evaluate->skills }}" type="number"></td>
                    </tr>
                    <tr>
                        <td>المؤهل العلمي</td>
                        <td>هل الشهادرة متوافقة مع الوظيفة المتاحة ام لا</td>
                        <td>10%</td>
                        <td><input disabled name="qualification_skills" value="{{ $evaluate->qualification_skills }}" type="number"></td>
                    </tr>
                    <tr>
                        <td colspan="2">المجموع</td>
                        <td>100%</td>
                        <td><input disabled type="text"></td>
                    </tr>
                </table>
            </div>
        </div>

        <br><br><br>

        <div style="margin-bottom: 15px;">
            <h3>ملاحظات</h3>
            <textarea disabled style="width: 100%;" rows="5" name="notes">{{ $evaluate->notes }}</textarea>
        </div>

        <div style="display: flex; margin-bottom: 15px;">
            <div>
                <input disabled type="radio" name="interview_status" value="قبول" {{ $evaluate->interview_status == "قبول" ? "checked" : "" }}>
                <label for="">قبول</label>
            </div>
            <div style="margin: 0 10px;">
                <input disabled type="radio" name="interview_status" value="انتظار" {{ $evaluate->interview_status == "انتظار" ? "checked" : "" }}>
                <label for="">انتظار</label>
            </div>
            <div>
                <input disabled type="radio" name="interview_status" value="رفض" {{ $evaluate->interview_status == "رفض" ? "checked" : "" }}>
                <label for="">رفض</label>
            </div>
        </div>

        <div style="display: flex;">
            <div>
                <span>تاريخ المقابلة</span><br>
                <input disabled name="interview_date" value="{{ $evaluate->interview_date }}" type="date">
            </div>
            <div style="margin: 0 200px;">
                <span>اسم المقيم</span><br>
            </div>
            <div>
                <span>التوقيع</span><br>
            </div>
        </div>
    @endisset
@endsection

@section('script')
    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('admin/assets/js/chart.js/Chart.bundle.min.js') }}"></script>

    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection
