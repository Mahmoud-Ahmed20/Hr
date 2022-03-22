@extends('layouts.admin.home')
<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection
<!-- content -->
@section('css')
    <style>
      * {
          -webkit-print-color-adjust: exact !important;
      }
      .flex__items {
          display: flex;
          justify-content: space-between;
          align-items: center;
          font-weight: 600;
          margin-bottom: 15px;
          font-size: 20px;
      }
      .section__title {
          background-color: #222;
          margin: 15px 0;
          padding: 3px 0;
          color: #fff;
          text-align: center;
      }
      .span__check {
          width: 15px;
          height: 15px;
          border: 2px solid #222;
          display: inline-block;
          background-color: #fff;
          margin: 0 10px;
      }
      .page__footer p span img {
      width: 80%;
      }
      .modal-dialog {
          max-width: 80vw!important;
      }
  </style>
@endsection
@section('content')
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
  <i class="mdi mdi-printer ml-1"></i>طباعة
</button>
<div class=" main-content-body-invoice" id="print">
    <header class="flex__items">
        <div style="text-align: center">
            <h2 style="margin: 0">نموذج تبليغ العودة للعمل</h2>
            <h2 style="margin: 5px 0">Back to Work Form</h2>
        </div>
        <div class="logo flex__items">
            <h1 style="text-align: center; margin: 0 20px">
            مصنع تي إم
            <span style="font-size: 22px; font-weight: 500; display: block"
                >للملابس الجاهزة <br />
                والتوريدات الفندقية</span
            >
            </h1>
            <img src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt="logo" />
        </div>
    </header>
    @isset($back)
      <div class="flex__items" style="margin: 20px 0 40px">
        <span>التاريخ/Date:{{$back->date}}</span>
        <p style="margin: 0">
            (<span>Completed upon return to work/يتم تعبئة الطلب فور عودة الموظف ومباشرته للعمل</span>)
        </p>
      </div>
      <div class="flex__items" style="flex-wrap: wrap">
          <div style="width: 50%">الاسم:{{optional($back->NameEmployeBackToWork)->name}}</div>
          <div style="width: 50%">الرقم الوظيفي:{{$back->job_number}}</div>
          <div style="width: 50%">المسمي الوظيفي:{{$back->job_title }}</div>
      </div>

      <h2 class="section__title">البيانات الفعلية للاجازة</h2>
      <div class="flex__items" style="direction:rtl;">
          <span>سبب الاجازة</span>
          <span><input disabled style="width: auto" type="radio" {{ $back->reason_for_leave && $back->reason_for_leave == "سنوية" ? "checked" : "" }}/> سنوية</span>
          <span><input disabled style="width: auto" type="radio" {{ $back->reason_for_leave && $back->reason_for_leave == "غير مدفوعة" ? "checked" : "" }}/> غير مدفوعة</span>
          <span><input disabled style="width: auto" type="radio" {{ $back->reason_for_leave && $back->reason_for_leave == "مرضية" ? "checked" : "" }}/> مرضية</span>
          <span><input disabled style="width: auto" type="radio" {{ $back->reason_for_leave && $back->reason_for_leave == "حج" ? "checked" : "" }}/> حج</span>
          <span><input disabled style="width: auto" type="radio" {{ $back->reason_for_leave && $back->reason_for_leave == "زواج" ? "checked" : "" }}/> زواج</span>
          <span><input disabled style="width: auto" type="radio" {{ $back->reason_for_leave && $back->reason_for_leave == "مولود" ? "checked" : "" }}/> مولود</span>
          <span><input disabled style="width: auto" type="radio" {{ $back->reason_for_leave && $back->reason_for_leave == "دراسية" ? "checked" : "" }}/> دراسية</span>
          @error('reason_for_leave')
              <span class="text-danger">{{$message}}</span>
          @enderror
      </div>

      <div class="flex__items" style="margin-bottom: 16px; flex-wrap: wrap">
          <div style="margin-bottom: 16px; width: 48%">
              تاريخ بدا الاجازة / First day of vacation:{{ $back->first_day_off }}
          </div>
          <div style="margin-bottom: 16px; width: 48%">
              تاريخ انتهاء الاجازة / Last day:{{ $back->last_date_off }}
          </div>
          <div style="margin-bottom: 16px; width: 48%">
              تاريخ مباشرة العمل / Date work resumed:{{ $back->date_word_resumed }}
          </div>
          <div style="margin-bottom: 16px; width: 48%">
              عدد ايام الاجازة الفعلية / No. of actual vacation days:{{ $back->no_of_actual_vacation_days }}
          </div>
      </div>

      <h2 class="section__title">قسم الموارد البشرية والشؤون الادارية</h2>
      <p class="flex__items">
          اجمالي عدد ايام الاجازة الفعلية:{{ $back->hr_total_no_actual_vacation_days }} (ايام)
      </p>
      <p class="flex__items" style="margin-bottom: 80px;">
          فرق الايام بين بين المخطط والفعلي (ان وجد) Difference between planned and
          actual vacation days, if any
          {{ $back->hr_difference_between_vacation_days }}
          (ايام /days)
      </p>
    @endisset

    <footer class="page__footer">
      <p style="font-weight: 600; font-size: 18px; direction: ltr">
        <span><img src="{{asset('admin/assets/images/location.png')}}"  style="max-width: 20px;" alt="" /></span>KING FAISAL ST., EL KOM
        EL AKHDAR STATION, END OF ALY SHIHA ST, HARAM, GIZA- EGYPT.
      </p>
      <p>
        <span><img src="{{asset('admin/assets/images/telephone.png')}}" style="max-width: 20px;"alt="" /></span>+2 33840003 - 33840530
        <img src="{{asset('admin/assets/images/whatsapp.png')}}"  style="max-width: 20px;" alt="" /> 01099977100 - 01000080770
      </p>
      <p><img src="{{asset('admin/assets/images/facebook.png')}}" style="max-width: 20px;" alt="" />facebook.com/tmuniform</p>
      <p>
        <span><img src="{{asset('admin/assets/images/global.png')}}" style="max-width: 20px;" alt="" /></span>www.tmuniform.com
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
