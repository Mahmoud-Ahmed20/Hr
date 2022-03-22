@extends('layouts.admin.home')
<!-- title page -->
@section('title')
    Job Offer Specification
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
      text-align: initial;
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
      display: block;
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
    .true{
        display: flex;
    }
    .line{
        background: black;
        width: 237px;
        height: 2px;
        margin: auto;
        margin-top: 12px;
    }
    .center{
        text-align: center;
    }
  </style>
@endsection
@section('content')
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
    <i class="mdi mdi-printer ml-1"></i>طباعة
  </button>
        <div dir="rtl" id="print">
            <header  style="text-align: center; margin-bottom: 20px">
                <div class="header__logo">
                  <h1>
                    مصنع تي إم
                    <span style="color: black;"
                      >للملابس الجاهزة <br />
                      والتوريدات الفندقية
                    </span>
                  </h1>
                  <div style="margin: 0 20px; width: 120px">
                    <img src="{{ asset('admin/assets/images/Logo.png') }}" alt="logo" />
                  </div>
                </div>

              </header>
              <p style="text-align: right; font-weight: 600">
                ادارة الموارد البشرية والشؤون الادارية
              </p>
              <h2
                style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
              >
                تفاصيل عرض العمل
              </h2>
              <h2
                style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
              >
                Job Offer Specfication
              </h2>



             <div class="outer__border">
            <div>

                <table>

                    <tr>
                      <th class="center">الاسم</th>
                      <th class="center">الجنسية</th>
                      <th class="center">التاريخ</th>
                    </tr>
                    <td><input type="text"  value="{{ $jobOffer->name }}"  readonly></td>
                    <td><input type="text"  value="{{ optional($jobOffer->nationality)->name_nationality}}"  readonly></td>
                    <td><input type="text"  value="{{ $jobOffer->date}}" readonly></td>
                    <tr>
                      <th class="center">رقم بطاقة الرقم القومي</th>
                      <th class="center">مكان الاصدار</th>
                      <th class="center">تاريخ الاصدار</th>
                    </tr>
                    <tr>
                      <td><input type="text" value="{{ $jobOffer->national_id}}" readonly></td>
                      <td><input type="text" value="{{ $jobOffer->issue_id }}" readonly></td>
                      <td><input type="text" value="{{ $jobOffer->issue_id_data }}" readonly></td>

                    </tr>
                    <tr>
                      <th class="center">الوظيفة</th>
                      <th class="center">الدرجة</th>
                      <th class="center">المؤهل العلمي</th>
                    </tr>
                    <tr>
                        <td><input type="text"  value="{{optional($jobOffer->jobOfferSpecifincation)->name_job}}"  readonly></td>
                        <td><input type="text"  value="{{$jobOffer->degree_job}}"  readonly></td>
                        <td><input type="text"  value="{{$jobOffer->qualification}}"  readonly></td>

                    </tr>
                    <tr>
                      <th class="center">الادارة</th>
                      <th class="center">الفرع</th>
                      <th class="center">الدرجة</th>
                    </tr>
                    <tr>
                        <td><input type="text"  value="{{optional($jobOffer->administration)->name_administration}}"  readonly></td>
                        <td><input type="text"  value="{{$jobOffer->branch}}"  readonly></td>
                        <td><input type="text"  value="{{ $jobOffer->degree }}"  readonly></td>

                    </tr>
                    <tr>
                        <th colspan="2">مدة العقد</th>
                        <th>تاريخ مباشرة العمل : فور انتهاء التعيين اوا اجراءات اخري</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="flex__td">
                                <span>سنة ميلادية <input type="radio" name="year_contract" {{ $jobOffer->year_contract == "سنة ميلادية" ? "checked" : "" }} value="سنة ميلادية" style="display: inline-block; width: auto;" disabled></span>
                                <span>سنتين ميلاديتين <input type="radio" name="year_contract"{{ $jobOffer->year_contract == "سنتين ميلاديتين" ? "checked" : "" }}  value="سنتين ميلاديتين" style="display: inline-block; width: auto;" disabled></span>
                                <span>عقد <input type="radio" name="year_contract" value="عقد" {{ $jobOffer->year_contract == "عقد" ? "checked" : "" }} style="display: inline-block; width: auto;" disabled></span>
                            </div>
                        </td>
                        <td><input type="date"></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th class="center">الراتب والعلاوات</th>
                        <th class="center">شهريا</th>
                        <th class="center">سنويا</th>
                    </tr>
                    <tr>
                        <td>الراتب الاساسي</td>
                        <td><input type="text" value="{{optional($jobOffer->jobOfferSalary)->basic_salary_monthly}}" readonly></td>
                        <td><input type="text" value="{{optional($jobOffer->jobOfferSalary)->basic_salary_Year}}" readonly></td>
                    </tr>
                    <tr>
                        <td>بدل سكن</td>
                        <td><input type="text" value="{{optional($jobOffer->jobOfferSalary)->housing_allowance_monthly}}" readonly></td>
                        <td><input type="text" value="{{optional($jobOffer->jobOfferSalary)->housing_allowance_Year}}" readonly ></td>
                    </tr>
                    <tr>
                        <td>بدل مواصلات</td>
                        <td><input type="text" value="{{optional($jobOffer->jobOfferSalary)->switch_connectors_monthly}}" readonly></td>
                        <td><input type="text" value="{{optional($jobOffer->jobOfferSalary)->switch_connectors_Year}}" readonly></td>
                    </tr>
                    <tr>
                        <td>الاجمالي</td>
                        <td><input type="text" readonly></td>
                        <td><input type="text" readonly></td>
                    </tr>
                    <caption style="text-align: center;">
                        <h2 style="margin: 0;">مميزات وشروط العمل</h2>
                    </caption>
                </table>

                <table>

                    <tr>
                        <td colspan="3">الاجازة السنوية فقط (30) يوما مدفوعة الاجر عن كل (سنة) ميلادية خدمة
                            <span>لا <input type="radio"  name="yearly_vacation" {{ $jobOffer->yearly_vacation == 0 ? "checked" : "" }} value="0" style="display: inline-block; width: auto;" {{ old('yearly_vacation') == "0" ? "checked" : "" }} disabled></span>
                            <span> نعم <input type="radio" name="yearly_vacation" {{ $jobOffer->yearly_vacation == 1 ? "checked" : "" }} value="1" style="display: inline-block; width: auto;" {{ old('yearly_vacation') == "1" ? "checked" : "" }} disabled></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">العلاج: يكون العلاج مجانا للموظف (حسب نظام الشركة)
                            <span>لا <input type="radio"  name="treatment" {{ $jobOffer->treatment == 0 ? "checked" : "" }} value="0" style="display: inline-block; width: auto;" {{ old('treatment') == "0" ? "checked" : "" }} disabled></span>
                            <span> نعم <input type="radio" name="treatment" {{ $jobOffer->treatment == 1 ? "checked" : "" }} value="1" style="display: inline-block; width: auto;" {{ old('treatment') == "1" ? "checked" : "" }} disabled></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">فترة التجربة : (90) يوما حسب نظام العمل والعمال اعتبارا من تاريخ مباشرة العمل
                            <span>لا <input type="radio"  name="Probation" value="0"   {{ $jobOffer->Probation == 0 ? "checked" : "" }} style="display: inline-block; width: auto;" {{ old('Probation') == "0" ? "checked" : "" }} disabled></span>
                            <span> نعم <input type="radio" name="Probation" value="1"  {{ $jobOffer->Probation == 1 ? "checked" : "" }} style="display: inline-block; width: auto;" {{ old('Probation') == "1" ? "checked" : "" }} disabled></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3">يعتبر هذا العرض لاغيا في حالة عدم مباشرة العمل في التاريخ المحدد ادناه</td>
                    </tr>
                    <tr>
                        <td colspan="3">هذا العرض جزء من عقد العمل الذي سوف يتم توقيعه بين الموظف والشركة وبعد انتهاء فترة التجربة حسب نظام العمل ط ويعتبر هذا العرض نهائيا ويحل محل اي اتفاقيات او مفاوضات سابقة</td>
                    </tr>
                    <tr>
                        <td colspan="3">ملاحظة : في حال استقالة الموظف او انهاء خدماته لاسباب مخلة بالعمل او الشرف او عدم اطاعة الاوامر فان الشركة لن تمنحه او تمتعه باي حقوق</td>
                    </tr>
                    <tr>
                        <th class="center">مشرف شؤون الموظفين</th>
                        <th class="center">مدير الادارة</th>
                        <th class="center">مدير ادارة الموارد البشرية والشؤون الادارية</th>
                    </tr>
                    <tr>
                        <td style="height: 69px;"><div class="line"></div></td>
                        <td><div class="line"></div></td>
                        <td><div class="line"></div></td>
                    </tr>
                    <tr>
                        <tr>
                            <td colspan="3">اوافق علي ما جاء في تفاصيل هذا العرض واوكد بانني علي استعداد لمباشرة العمل خلاص ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ) والالتزام  بالبنود المدونة اعلاه</td>
                        </tr>
                    </tr>
                    <tr>
                        <th class="center">الاسم</th>
                        <th class="center">التوقيع</th>
                        <th class="center">التاريخ</th>
                    </tr>
                    <tr>
                        <td style="height: 69px"><div class="line"></div></td>
                        <td><div class="line"></div></td>
                        <td><div class="line"></div></td>
                    </tr>
                </table>







            </div>
        </div>
        <div class="page__footer">
            <p style="font-weight: 600; font-size: 18px; direction: ltr">
              <span><img src="{{ asset('admin/assets/images/location.png') }}" alt="" /></span>KING FAISAL ST., EL KOM
              EL AKHDAR STATION, END OF ALY SHIHA ST, HARAM, GIZA- EGYPT.
            </p>
            <p>
              <span><img src="{{asset('admin/assets/images/telephone.png')}}" alt="" /></span>+2 33840003 - 33840530
              <img src="{{ asset('admin/assets/images/whatsapp.png') }}" alt="" /> 01099977100 - 01000080770
            </p>
            <p><img src="{{ asset('admin/assets/images/facebook.png') }}" alt="" />facebook.com/tmuniform</p>
            <p>
              <span><img src="{{ asset('admin/assets/images/global.png') }}" alt="" /></span>www.tmuniform.com
            </p>
            <p>sales@tmuniform.com - export@tmuniform.com - gm@tmuniform.com</p>
            <p>
              All rights reserved to tmuniform.com
              <span id="footer-date" style="background-color: inherit"></span>
            </p>
        </div>

    </div>
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
<script>
    var Basic_Salary_Monthly =document.getElementById('basic_salary_monthly');
    var Basic_Salary_Year = document.getElementById('basic_salary_Year');
    var Housing_Allowance_Monthly = document.getElementById('housing_allowance_monthly');
    var Housing_Allowance_Year = document.getElementById('housing_allowance_Year')
    var Switch_Connectors_Monthly= document.getElementById('switch_connectors_monthly');
    var Switch_Connectors_Year = document.getElementById('switch_connectors_Year');
    var Other_Allowances_Monthly= document.getElementById('other_allowances_monthly');
    var Other_Allowances_Year = document.getElementById('other_allowances_Year');
    const inputsMonthAlert = [Housing_Allowance_Monthly, Housing_Allowance_Year, Switch_Connectors_Monthly, Switch_Connectors_Year, Other_Allowances_Monthly, Other_Allowances_Year];
    const inputsSumSalaries = [...inputsMonthAlert, Basic_Salary_Monthly, Basic_Salary_Year];
    inputsMonthAlert.map(el => {
        el.addEventListener('focus', SalariesAndBonuses);
    })
    inputsSumSalaries.map(el => {
        el.addEventListener('keyup', SalariesAndBonuses)
    })
    function SalariesAndBonuses(){
        var Basic_Salary_Monthly_Val =parseFloat(Basic_Salary_Monthly.value);
        var Basic_Salary_Year_Val = parseFloat(Basic_Salary_Year.value);
        var Housing_Allowance_Monthly_Val = parseFloat(housing_allowance_monthly.value);
        var Housing_Allowance_Year_Val = parseFloat(housing_allowance_Year.value)
        var Switch_Connectors_Monthly_Val = parseFloat(switch_connectors_monthly.value);
        var Switch_Connectors_Year_Val = parseFloat(switch_connectors_Year.value);
        var Other_Allowances_Monthly_Val = parseFloat(Other_Allowances_Monthly.value);
        var Other_Allowances_Year_Val = parseFloat(Other_Allowances_Year.value);
        if( (typeof Basic_Salary_Monthly_Val === 'undefined' || !Basic_Salary_Monthly_Val) && (typeof Basic_Salary_Year_Val === 'undefined' || !Basic_Salary_Year_Val)){
            console.log('sk;jgsdfhglksdjfgs');
            alert('يرجي ادخال الراتب الاساسي');
            Basic_Salary_Monthly.focus()
        } else {
            var Monthly = (Basic_Salary_Monthly_Val || 0) + (Housing_Allowance_Monthly_Val || 0) +(Switch_Connectors_Monthly_Val || 0)+(Other_Allowances_Monthly_Val || 0);
    var Year = (Basic_Salary_Year_Val || 0) + (Housing_Allowance_Year_Val || 0) + (Switch_Connectors_Year_Val || 0)+(Other_Allowances_Year_Val || 0);
    sumq = parseFloat(Monthly).toFixed(2);
    sumt = parseFloat(Year).toFixed(2);
    document.getElementById("total_monthly").value = sumq;
    document.getElementById("total_Year").value = sumt;
        }
    }
</script>
@endsection

