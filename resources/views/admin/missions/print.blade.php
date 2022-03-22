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
        font-weight: 600;
    }
    .page__header-logo {
        display: flex;
        align-items: center;
        text-align: center;
        direction: ltr;
    }

    .page__header-logo img {
        margin-right: 15px;
    }

    .page__header-logo h1 {
        margin: 0;
    }

    .page__header-logo span {
        display: block;
        font-weight: 500;
        font-size: 22px;
    }

    .flex__items {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .outer__border {
        border: 5px solid #222;
        padding: 3px;
        margin-bottom: 15px;
    }

    .outer__border>div {
        border: 1px solid #222;
        padding: 5px;
    }
  </style>
@endsection
@section('content')
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()"> 
  <i class="mdi mdi-printer ml-1"></i>طباعة
</button>
<div class=" main-content-body-invoice" id="print">

    @isset($mission)
      <header>
        <div class="page__header-logo">
            <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo">
            <div>
                <h1>مصنع تي إم
                    <span>
                        للملابس الجاهزة <br>
                        والتوريدات الفندقية
                    </span>
                </h1>
            </div>
        </div>
        <p style="font-weight: 600;">ادارة الموارد البشرية والشؤون الادارية</p>
        <h2 style="text-align: center; font-size: 30px; margin: 0 0 10px 0;"><span>تكليف بمهمة عمل</span> - Job Mission
            Request</h2>
        <div class="flex__items" style="justify-content: center; font-weight: 600; margin: auto;">
            <div class="flex__items" style="margin: 0 15px;">
                <span>داخلي</span>
                <span><<input disabled type="radio" {{ $mission->location == "داخلي" ? "checked" : "" }}/></span>
                <span>Local</span>
            </div>
            <div class="flex__items" style="margin: 0 15px;">
                <span>خارجي</span>
                <span><input disabled type="radio" {{ $mission->location == "خارجي" ? "checked" : "" }}/></span>
                <span>Inter</span>
            </div>
        </div>
      </header>

    <div class="outer__border">
      <div>
          <div class="flex__items" style="margin-bottom: 10px;">
              <div class="flex__items">
                  <span>اسم الموظف</span>
                  <span style="margin: 0 5px;">{{optional($mission->NameEmploye)->name}}</span>
                  <span>Name</span>
              </div>
              <div class="flex__items">
                  <span>الرقم</span>
                  <span style="margin: 0 5px;">{{$mission->number}}</span>
                  <span>No</span>
              </div>
              <div class="flex__items">
                  <span>التاريخ</span>
                  <span style="margin: 0 5px;">{{$mission->date}}</span>
                  <span>Date</span>
              </div>
          </div>
          <div class="flex__items" style="margin-bottom: 10px;">
              <div class="flex__items">
                  <span>مسمي الوظيفة</span>
                  <span style="margin: 0 5px;">{{$mission->job_title}}</span>
                  <span>Title</span>
              </div>
              <div class="flex__items">
                  <span>الادارة</span>
                  <span style="margin: 0 5px;">{{optional($mission->Administration)->name_administration}}</span>
                  <span>Department</span>
              </div>
              <div class="flex__items">
                  <span>القسم</span>
                  <span style="margin: 0 5px;">{{optional($mission->NameSections)->name}}</span>
                  <span>Section</span>
              </div>
          </div>
          <div class="flex__items" style="margin-bottom: 10px;">
              <div class="flex__items">
                  <span>جهة مهمة العمل</span>
                  <span style="margin: 0 5px;">{{$mission->direction_of_the_mission}}</span>
                  <span>Direction Of The Mission</span>
              </div>
              <div class="flex__items">
                  <span>المدة</span>
                  <span style="margin: 0 5px;">{{$mission->duration_of_mission}}</span>
                  <span>Duration Of Mission</span>
              </div>
          </div>
          <div class="flex__items" style="justify-content: space-around;">
              <div class="flex__items">
                  <span>اعتبارا من </span>
                  <span style="margin: 0 5px;">{{$mission->date_from}}</span>
                  <span>Date From</span>
              </div>
              <div class="flex__items">
                  <span>الي</span>
                  <span style="margin: 0 5px;">{{$mission->date_to}}</span>
                  <span>Date To</span>
              </div>
          </div>
      </div>
    </div>

    <div class="outer__border">
        <div>
            <div class="flex__items">
                <span>بيان مهمة العمل</span>
                <span>Mission specification</span>
            </div>
            {{$mission->mission_specification}}
        </div>
    </div>

    <div class="outer__border">
        <div>
            <div style="margin-bottom: 10px;">
                <input disabled type="checkbox" {{!$mission->expense_advance == null ? "checked" : ""}}>
                <span>سلفة مصاريف بمبلغ</span>
                <span>{{$mission->expense_advance}}</span>
                <span>جنيه</span>
            </div>
            <div class="flex__items" style="margin-bottom: 10px;">
                <span><input disabled type="checkbox" {{!$mission->ticket == null ? "checked" : ""}}> تذكرة سفر خط سير </span>
                <span>{{$mission->ticket}}</span>
                <span>Tacit</span>
            </div>
            <!-- <div class="flex__items" style="margin-bottom: 10px;">
                <span><input disabled type="checkbox"> التاشيرات</span>
                <span><input disabled type="text" style="margin: 0 5px;"> <input disabled type="text" style="margin: 0 5px;"> <input disabled
                        type="text" style="margin: 0 5px;"> <input disabled type="text" style="margin: 0 5px;"></span>
                <span>Visas</span>
            </div> -->
            <div class="flex__items">
                <div class="flex__items">
                    <span>الاسم</span>
                    <span style="margin: 0 5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <span>Name</span>
                </div>
                <div class="flex__items">
                    <span>التوقيع</span>
                    <span style="margin: 0 5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <span>Signature</span>
                </div>
                <div class="flex__items">
                    <span>التاريخ</span>
                    <span style="margin: 0 5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <span>Date</span>
                </div>
            </div>
        </div>
    </div>

    <div class="outer__border">
        <div style="padding: 0 5px;">
            <div class="flex__items">
                <div style="width: 50%; border-left: 2px solid #222; padding-left: 5px;">
                    <h3 style="margin: 0 0 14px 0; font-weight: 600;">سعادة المدير التنفيذي</h3>
                    <p>ارجو الموافقة علي تكليف الموظف المذكور بالمهمة المذكورة اعلاه الي (                      )</p>
                    <p>لمدة ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
                      بتاريخ ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</p>
                    <p>الاسم&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                    <p>الوظيفة &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                    <p>التوقيع &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                    <p>التاريخ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                </div>
                <div style="width: 50%; padding-right: 5px;" dir="ltr">
                    <h3 style="margin: 0 0 14px 0; font-weight: 600;">To GM</h3>
                    <p>Would you please accept the mission for the a.m Emp To 
                        ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )
                      </p>
                    <p>Duration 
                      ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ) 
                      Date 
                      ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ) 
                    </p>
                    <p>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                    <p>Job title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                    <p>Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                    <p>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
                </div>
            </div>
        </div>
    </div>

    <div class="outer__border">
        <div>
            <div class="flex__items">
                <div>
                    <p style="margin: 0 0 10px 0;"><input disabled type="checkbox"> اوافق</p>
                    <p style="margin: 0 0 10px 0;"><input disabled type="checkbox"> لا اوافق</p>
                </div>
                <div dir="ltr">
                    <p style="margin: 0 0 10px 0;"><input disabled type="checkbox"> Approved</p>
                    <p style="margin: 0 0 10px 0;"><input disabled type="checkbox"> Not Approved</p>
                </div>
            </div>
            <h2 style="text-align: center; margin: 10px 0 20px 0;">مدير الادارة</h2>
            <p style="text-align: center; margin: 0 0 20px 0;">
                <span>التوقيع</span>
                                    
                <span>Signature</span>
            </p>
            <p style="text-align: center;">
                <span>التاريخ</span>
                                    
                <span>Date</span>
            </p>
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
