@extends('layouts.admin.home')
<!-- title page -->
@section('title')
    Multikart - Premium Admin Template 
@endsection
<!-- content -->
@section('css')
  <style>
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
    table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid #222;
    }
    table td,
    table th {
      padding: 5px;
      border: 1px solid #222;
      font-size: 25px;
    }
    table td input {
      width: 90%;
      margin: auto;
      display: block;
      font-size: 20px;
      padding: 8px;
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
          <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" />
        </div>
      </div>
      <h2>بيان متابعة سيارات شركة ومصنع تي ام</h2>
    </header>
    @isset($car)
    <div style="border: 5px solid #222; padding: 3px;">
      <table>
        <tr>
          <th>م</th>
          <th>نوع السيارة</th>
          <th>رقم اللوحة</th>
          <th>اللون</th>
          <th>الموديل</th>
          <th>اسم المالك</th>
          <th>تاريخ انتهاء الرخصة</th>
          <th>تاريخ انتهاء التامين</th>
          <th>تاريخ انتهاء تفويض القيادة</th>
          <th>اسم سائق السيارة</th>
        </tr>
        <tr>
          <td>1</td>
          <td>{{$car->car_type}}</td>
          <td>{{$car->plate_number}}</td>
          <td>{{$car->color}}</td>
          <td>{{$car->model}}</td>
          <td>{{$car->owner_name}}</td>
          <td>{{$car->license_expiration}}</td>
          <td>{{$car->insurance_expiry}}</td>
          <td style="padding: 0">
            <span
              style="
                border-bottom: 2px solid #222;
                display: block;
                padding: 10px 15px;
              "
            >
              {{$car->driving_auth_expiry_1}}
            </span>
            <span style="display: block; padding: 10px 15px">
              {{$car->driving_auth_expiry_2}}
            </span>
          </td>
          <td>
            {{$car->driver_name}}
          </td>
        </tr>
      </table>
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
