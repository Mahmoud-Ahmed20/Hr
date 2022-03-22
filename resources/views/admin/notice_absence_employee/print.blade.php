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
                اشعار بغياب موظف
            </h2>
            <h2 style="text-transform: uppercase;text-align: center; margin: 0;font-size: 17px;font-weight: 700;">
                Notice of absence of an employee
            </h2>



            <div class="outer__border">
                <div>
                    <table>
                        <tr>
                            <td>
                                <div class="flex__td">
                                    <span>اسم الموظف</span>
                                </div>
                            </td>
        
                            <td>
                                <div class="flex__td">
                                    <span>رقم الموظف</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="" value="{{ $current_data->staff->name }}" id="" readonly>
                            </td>
                            <td><input value="{{$current_data->staff_number}}" name="staff_number" type="number" readonly></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
        
                            <td>
                                <div class="flex__td">
                                    <span>القسم</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex__td">
                                    <span>الوظيفة</span>
                                </div>
                            </td>
                            <td>
                                <div class="flex__td">
                                    <span>التاريخ</span>
        
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="" value="{{ $current_data->section->name }}" id="" readonly>
                            </td>
                            <td>
                                <input type="text" name="" value="{{ $current_data->job->name_job }}" id="" readonly>

                            </td>
                            <td>
                                <input value="{{$current_data->date}}" name="date" type="date" readonly>
                            </td>
                        </tr>
        
                    </table>
                    <table>
                        <tr>
                            <td>
                                <h3>
                                    أقر انا الموضح أسمي أعلاه بأنني قد تغيبت عن العمل في هذا التاريخ و علب هذا إقرار مني بذ لك
                                </h3>
                            </td>
        
                        </tr>
                    </table>
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

