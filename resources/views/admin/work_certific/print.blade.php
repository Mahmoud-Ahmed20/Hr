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
      table input disabled disabled, table textarea {
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
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
  <i class="mdi mdi-printer ml-1"></i>طباعة
</button>
<div class=" main-content-body-invoice" id="print">
    <header>
        <div class="logo flex__items" style="justify-content: flex-end;">
            <h1 style="text-align: center; margin: 0 20px">
                مصنع تي إم
                <span style="font-size: 22px; font-weight: 500; display: block">للملابس الجاهزة <br />
                    والتوريدات الفندقية</span>
            </h1>
            <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" />
        </div>
    </header>
    <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
        شهادة خبرة
    </h2>
    <h2 style="
text-transform: uppercase;
text-align: center;
margin: 0;
font-size: 28px;
font-weight: 700;
">
        Work Certific
    </h2>


    <center >
        <span style="color: orangered" class="error">{{ ($errors->first('job_title'))?$errors->first('job_title'). ' - ' : '' }} </span>
        <span style="color: orangered" class="error">{{ ($errors->first('date'))?$errors->first('date'). ' - ' : '' }} </span>
        <span style="color: orangered" class="error">{{ ($errors->first('start_work'))?$errors->first('start_work'). ' - ' : '' }} </span>
        <span style="color: orangered" class="error">{{ ($errors->first('end_work'))?$errors->first('end_work'). ' - ' : '' }} </span>

    </center>
    <div class="outer__border">
        <table>


            <thead>
            <tr>
                <td style="text-align: inherit; display: flex;">
<span>
التاريخ                        </span>
                    &nbsp;
                    &nbsp;
                    <span >
<input disabled value="{{$current_data->date}}" name="date"  type="date">
</span>
                </td>
                <td>
                    <span> :Date</span>
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: inherit;">
                    <div>
                        اّذا تفيد شركة {{optional($current_data->staff)->name}} بأن السيد/______ <br> جنسيه كان يعمل لدينا بحسب البيانات الواردة أدناه
                    </div>
                </td>
                <td>
                    /.Copany certifies that Mr___________
                    <br> nationality,wes employed by us according to
                    <br> the terms listed below
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td style="text-align: inherit; display: flex;">
<span>
مسمي الموظيفي
</span>
                    &nbsp;
                    &nbsp;
                    <span >
<input disabled value="{{$current_data->job_title}}" name="job_title"  type="text">
</span>
                </td>
                <td>
                    :Job Title
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td style="text-align: inherit; display: flex;">
<span>
تاريخ بداء الخدمة
</span>
                    &nbsp;
                    &nbsp;
                    <span >
<input disabled value="{{$current_data->start_work}}" name="start_work"  type="date">
</span>
                </td>
                <td>
                    :Start of work
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td style="text-align: inherit; display: flex;">
<span>
تاريخ نهاية الخدمة
</span>
                    &nbsp;
                    &nbsp;
                    <span >
<input disabled value="{{$current_data->end_work}}" name="end_work"  type="date">
</span>
                </td>
                <td>
                    :End of work
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td style="text-align: inherit; display: flex;">
                    <div>
                        هذه الشهادة أصدرت للمذكور بناء علي طلبه لتقديمها لمن يمهمه
                        <br> ألامر دون أنى مسؤولية علي الشركة.
                    </div>
                </td>
                <td>
                    This certificate is issued upon the employee’s
                    <br> request to present to whoever is concerned without any liability towards the firm
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td style="text-align: inherit; display: flex;">
                    <div>
                        خصائي الموارد البشرية
                    </div>
                </td>
                <td>
                    :HR Specialist
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td style="text-align: inherit; display: flex;">
                    <div>
                        رئيس قسم الموارد البشرية و الشؤون الادارية
                    </div>
                </td>
                <td>
                    :HR & Admin .Head
                </td>
            </tr>
            </tbody>


        </table>
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
