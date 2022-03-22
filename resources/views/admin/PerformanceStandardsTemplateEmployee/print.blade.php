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

                <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                    نموذج معايير أداء الموظف
                </h2>
                <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                    EMPLOYEE PERFORMANCE STANDARBS TEMPLATE
                </h2>


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
                                        <span>مسمي الوظيفة</span>
                                        <span>Job title</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <input type="text" value="{{optional($Performance->staff)->name}}" readonly>
                                </td>

                                <td>
                                    <input type="text" value=" {{$Performance->job_title}}" {{ old('job_title') }}  name="job_title" readonly>
                                </td>

                            </tr>
                        </table>
                        <table>
                            <tr>

                                <td>
                                    <div style="text-align: center; margin-left: 10px;">
                                        <span>تقييم أداء الموظف في الفترة </span>
                                        <span style="margin-right: 28px;
                                        color: #f76a06;">لعام (_____)</span>
                                    </div>
                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
                <div class="outer__border">
                    <div>
                        <table>
                            <tr>
                                <div class="flex__td">
                                    <h3>عناصر التقييم</h3>
                                    <h3>درجه التقييم من 10 </h3>
                                    <h3>ملاحظات</h3>
                                </div>
                            </tr>
                        </table>
                        <table>

                        </table>
                        <div style="border-top: 3px solid #222; margin-top: 10px; padding-top: 10px;">
                            <table>
                                <tr>
                                    <h4 style="text-align: center;font-size: 21px;">أولا:معايير الاداء الوظيفي</h4>

                                </tr>
                                <tr>
                                    <th style="text-align: initial;">عناصر التقويم</th>
                                    <th style="text-align: initial;">ضعيف</th>
                                    <th style="text-align: initial;">متوسط</th>
                                    <th style="text-align: initial;">جيد</th>
                                    <th style="text-align: initial;"> ممتاز</th>
                                    <th style="text-align: initial;">ملاحظات</th>
                                </tr>
                                <tr>

                                    <td style="text-align: initial;">القدرة علي استيعاب قواعد وأساليب العمل</td>
                                    <td>
                                            <input type="radio" class="" value="2" name="understand_business_rules"
                                            {{ $Performance->understand_business_rules == "2" ? "checked" : "" }} disabled>
                                    </td>

                                    <td>
                                        <input type="radio" value="4" name="understand_business_rules"
                                        {{ $Performance->understand_business_rules == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="understand_business_rules"
                                        {{ $Performance->understand_business_rules == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="10" name="understand_business_rules"  {{ $Performance->understand_business_rules == "10" ? "checked" : "" }} disabled>
                                    </td>

                                    <td>
                                        <input type="text" value="{{$Performance->understand_notes}}" name="understand_notes" {{ old('understand_notes') }} readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align: initial;">أنجاز العمل بالمستوى و الموعد المطلوب </td>

                                    <td>
                                        <input type="radio" value="2" name="get_work_done" {{ $Performance->get_work_done == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="get_work_done" {{ $Performance->get_work_done == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="get_work_done" {{ $Performance->get_work_done == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="10" name="get_work_done" {{ $Performance->get_work_done == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text" value="{{$Performance->get_work_done_notes}}" name="get_work_done_notes" readonly></td>
                                </tr>

                                <tr>
                                    <td style="text-align: initial;"> الاجتهاد والتجاوب مع ضغط العمل</td>
                                    <td>
                                        <input type="radio" value="2" name="responding_to_work_pressure" {{ $Performance->responding_to_work_pressure == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="responding_to_work_pressure" {{ $Performance->responding_to_work_pressure == "4" ? "checked" : "" }} disabled>
                                    </td>

                                    <td>
                                        <input type="radio" value="6" name="responding_to_work_pressure" {{ $Performance->responding_to_work_pressure == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="10" name="responding_to_work_pressure" {{ $Performance->responding_to_work_pressure == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text" value="{{$Performance->responding_to_work_pressure_notes}}" name="responding_to_work_pressure_notes" readonly></td>
                                </tr>

                                <tr>
                                    <td style="text-align: initial;">المبادرة و الابتكار في العمل</td>
                                    <td>
                                        <input type="radio" value="2" name="initiative_and_innovation_at_work" {{ $Performance->initiative_and_innovation_at_work == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="initiative_and_innovation_at_work" {{ $Performance->initiative_and_innovation_at_work == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="initiative_and_innovation_at_work" {{ $Performance->initiative_and_innovation_at_work == "6" ? "checked" : "" }} disabled>
                                    </td>

                                    <td>
                                        <input type="radio" value="10" name="initiative_and_innovation_at_work"{{ $Performance->initiative_and_innovation_at_work == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text" value="{{$Performance->initiative_and_innovation_at_work_notes}}" name="initiative_and_innovation_at_work_notes"></td>
                                </tr>

                                <tr>
                                    <td style="text-align: initial;">تقبل توجيهات وانتقادات المدراء</td>
                                    <td>
                                        <input type="radio" value="2" name="accept_directives_from_managers" {{$Performance->accept_directives_from_managers == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="accept_directives_from_managers" {{$Performance->accept_directives_from_managers == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="accept_directives_from_managers" {{$Performance->accept_directives_from_managers == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="10" name="accept_directives_from_managers" {{$Performance->accept_directives_from_managers == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text" value="{{$Performance->accept_directives_from_managers_notes}}" name="accept_directives_from_managers_notes" readonly></td>
                                </tr>

                            </table>
                        </div>
                        <div style="border-top: 3px solid #222; margin-top: 10px; padding-top: 10px;">
                            <table>
                                <tr>
                                    <h4 style="text-align: center;font-size: 21px;"> ثانيا : المعايير الشخصية</h4>

                                </tr>
                                <tr>
                                    <th style="text-align: initial;">عناصر التقويم</th>
                                    <th style="text-align: initial;">ضعيف</th>
                                    <th style="text-align: initial;">متوسط</th>
                                    <th style="text-align: initial;">جيد</th>
                                    <th style="text-align: initial;">ممتاز</th>
                                    <th style="text-align: initial;">ملاحظات</th>
                                </tr>
                                <tr>
                                    <td style="text-align: initial;">المرونة و القدرة علي التكلفة</td>
                                    <td>
                                        <input type="radio" value="2" name="flexibility_and_adaptability" {{$Performance->flexibility_and_adaptability == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="flexibility_and_adaptability"  {{$Performance->flexibility_and_adaptability == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="flexibility_and_adaptability"  {{$Performance->flexibility_and_adaptability == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="10" name="flexibility_and_adaptability"  {{$Performance->flexibility_and_adaptability == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text" value="{{$Performance->flexibility_and_adaptability_notes}}" name="flexibility_and_adaptability_notes" readonly></td>
                                </tr>

                                <tr>
                                    <td style="text-align: initial;">اتخاذ القرارات و تحمل المسؤوليات</td>
                                    <td>
                                        <input type="radio" value="2" name="make_decisions_and_take_responsibility"{{$Performance->make_decisions_and_take_responsibility == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="make_decisions_and_take_responsibility" {{$Performance->make_decisions_and_take_responsibility == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="make_decisions_and_take_responsibility" {{$Performance->make_decisions_and_take_responsibility == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="10" name="make_decisions_and_take_responsibility" {{$Performance->make_decisions_and_take_responsibility == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text" value="{{$Performance->make_decisions_and_take_responsibility_notes}}" name="make_decisions_and_take_responsibility_notes" readonly></td>
                                </tr>

                                <tr>
                                    <td style="text-align: initial;">النظافة الشخصية و المظهر العام</td>
                                    <td>
                                        <input type="radio" value="2" name="personal_cleanliness" {{ $Performance->personal_cleanliness == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="personal_cleanliness" {{ $Performance->personal_cleanliness == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="personal_cleanliness" {{ $Performance->personal_cleanliness == "6" ? "checked" : "" }} disabled>
                                    </td>

                                    <td>
                                        <input type="radio" value="10" name="personal_cleanliness" {{ $Performance->personal_cleanliness == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text" value="{{$Performance->personal_cleanliness_notes}}" name="personal_cleanliness_notes" readonly></td>
                                </tr>

                                <tr>
                                    <td style="text-align: initial;">الالتزام بأنظمة وسياسات الشركة</td>
                                    <td>
                                        <input type="radio" value="2" name="adhere_to_corporate_policies" {{$Performance->adhere_to_corporate_policies == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="adhere_to_corporate_policies" {{$Performance->adhere_to_corporate_policies == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="adhere_to_corporate_policies" {{$Performance->adhere_to_corporate_policies == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="10" name="adhere_to_corporate_policies" {{$Performance->adhere_to_corporate_policies == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text" value="{{$Performance->adhere_to_corporate_policies_notes}}" name="adhere_to_corporate_policies_notes" required></td>
                                </tr>

                            </table>
                        </div>
                        <div style="border-top: 3px solid #222; margin-top: 10px; padding-top: 10px;">
                            <table>
                                <tr>
                                    <h4 style="text-align: center;font-size: 21px;"> ثالثا : معايير العلاقات العامة</h4>

                                </tr>
                                <tr>
                                    <th style="text-align: initial;">عناصر التقويم</th>
                                    <th style="text-align: initial;">ضعيف</th>
                                    <th style="text-align: initial;">متوسط</th>
                                    <th style="text-align: initial;">جيد</th>
                                    <th style="text-align: initial;">ممتاز</th>
                                    <th style="text-align: initial;">ملاحظات</th>
                                </tr>
                                <tr>
                                    <td style="text-align: initial;">العمل بروح الفريق ومهارات العمل الجماعي </td>
                                    <td>
                                        <input type="radio" value="2" name="teamwork" {{$Performance->teamwork == "2" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="teamwork"  {{$Performance->teamwork == "4" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="teamwork"  {{$Performance->teamwork == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="10" name="teamwork"  {{$Performance->teamwork == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td><input type="text"  value="{{$Performance->teamwork_notes}}"  name="teamwork_notes" required></td>
                                </tr>

                            </table>
                        </div>
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

@endsection

