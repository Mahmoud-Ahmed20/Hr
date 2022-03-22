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
        table input disabled,
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
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
  <i class="mdi mdi-printer ml-1"></i>طباعة
</button>
<div class=" main-content-body-invoice" id="print">

    @isset($effective)
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
                        <td><input disabled name="name" value="{{ optional($effective->staff)->name }}" type="text" /></td>
                        <td><input disabled name="job" value="{{ optional($effective->job)->name_job }}" type="text" /></td>
                        <td><input disabled name="id_number" value="{{ $effective->id_number }}" type="number" /></td>
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
                        <td><input disabled name="administration" value="{{ optional($effective->administration)->name_administration }}" type="text" /></td>
                        <td><input disabled name="section" value="{{ optional($effective->section)->name}}" type="text" /></td>
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
                        <td><input disabled name="start_working_at" value="{{ $effective->start_working_at }}" type="date" /></td>
                        <td><input disabled name="nationality" value="{{ optional($effective->nationality)->name_nationality }}" type="text" /></td>
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
                            <div>
                                <h3 style="margin: 0;">الي : شؤون الموظفين</h3>
                                <h3 style="margin: 0;">نامل اعتماد مباشرة العمل للموظف </h3>

                                <div style="margin: 5px 0;"><input disabled type="checkbox" style="width: auto; "> التحق بالعمل لاول مرة</div>
                                <div><input disabled type="checkbox" style="width: auto;"> التحلق بالعمل بعد الاجازة</div>
                            </div>
                            <div dir="ltr">
                                <h3 style="margin: 0;">To: Personnel Department</h3>
                                <h3 style="margin: 0;">Please be advised that, the EMPLOYEE</h3>

                                <div style="margin: 5px 0;"><input disabled type="checkbox" style="width: auto; "> Started the work for the first time</div>
                                <div><input disabled type="checkbox" style="width: auto; "> Joined the work after vacation</div>

                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>
                      <h2 style="margin: 0; font-weight: 600; font-size: 28px">
                        مدير الادارة
                      </h2>
                      <h2 style="margin: 0; font-weight: 600; font-size: 28px">
                        Dept. Manager
                      </h2>
                    </th>
                </tr>
                <tr>
                  <td>
                    <div class="flex__td" style="justify-content: space-around">
                      <span>الاسم</span>
                      <span>Name</span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <div class="flex__td" style="justify-content: space-around">
                      <span>التوقيع</span>
                      <span>Signature</span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <div class="flex__td" style="justify-content: space-around">
                      <span>التاريخ</span>
                      <span>Date</span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                </tr>
              </table>
          </div>
        </div>

        <div class="outer__border">
            <div>
                <table>
                    <tr>
                        <td colspan="2">
                            <span>
                                <input disabled type="checkbox" style="width: auto; margin-left: 5px;"> المذكور باشر في التاريخ المحدد ويدرج اسمه بكشوفات الرواتب اعتبار من <span>____________________________________</span>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span>
                                <input disabled type="checkbox" style="width: auto; margin-left: 5px;"> المذكور باشر العمل متاخرا  <span>____________________________________</span> ويدرج اسمه بكشوفات الرواتب اعتبارا من  <span>____________________________________</span>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <h3>شؤون الموظفين</h3>
                        <div style="margin-bottom: 5px;">
                            <span>التوقيع </span>
                        </div>
                        <div style="margin-bottom: 5px;">
                            <span>التاريخ </span>
                        </div>
                        </th>
                        <th>
                            <h3>المدير العام</h3>
                            <div style="margin-bottom: 5px;">
                                <span>التوقيع </span>
                            </div>
                            <div style="margin-bottom: 5px;">
                            <span>التاريخ </span>
                        </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>

    @endisset

    <footer class="page__footer">
      <p style="font-weight: 600; font-size: 18px; direction: ltr">
        <span><img src="../location.png" alt="" /></span>KING FAISAL ST., EL KOM
        EL AKHDAR STATION, END OF ALY SHIHA ST, HARAM, GIZA- EGYPT.
      </p>
      <p>
        <span><img src="../telephone.png" alt="" /></span>+2 33840003 - 33840530
        <img src="../whatsapp.png" alt="" /> 01099977100 - 01000080770
      </p>
      <p><img src="../facebook.png" alt="" />facebook.com/tmuniform</p>
      <p>
        <span><img src="../global.png" alt="" /></span>www.tmuniform.com
      </p>
      <p>sales@tmuniform.com - export@tmuniform.com - gm@tmuniform.com</p>
      <p>
        All rights reserved to tmuniform.com
        <span id="footer-date" style="background-color: inherit"></span>
      </p>
    </footer>
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
