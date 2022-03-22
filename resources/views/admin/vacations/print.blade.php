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
  </style>
@endsection
@section('content')
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()"> 
  <i class="mdi mdi-printer ml-1"></i>طباعة
</button>
<div class="main-content-body-invoice" id="print" dir="rtl">
    <header class="flex__items">
      <div style="text-align: center">
        <h2 style="margin: 0">نموذج طلب اجازة</h2>
        <h2 style="margin: 5px 0">Vacation request</h2>
      </div>
      <div class="logo flex__items">
        <h1 style="text-align: center; margin: 0 20px">
          مصنع تي إم
          <span style="font-size: 22px; font-weight: 500; display: block"
            >للملابس الجاهزة <br />
            والتوريدات الفندقية</span
          >
        </h1>
        <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" />
      </div>
    </header>
    @isset($vacation)
      <div class="flex__items" style="margin: 20px 0 40px">
        <span>التاريخ:{{$vacation->request_date}}</span>
        <p style="margin: 0">
          (يتم تعبئة الطلب قبل شهر واحد للاجازة السنوية علي الاقل من تاريخ السفر)
        </p>
      </div>
      <div class="flex__items" style="flex-wrap: wrap">
        <div style="width: 50%">الاسم:{{$vacation->name}}</div>
        <div style="width: 50%">الرقم الوظيفي:{{$vacation->job_number}}</div>
        <div style="width: 50%">المسمي الوظيفي:{{$vacation->job_title}}</div>
        <div style="width: 50%">التوقيع:</div>
      </div>
      <h2 class="section__title">طلب الاجازة</h2>
      <div class="flex__items">
        <span>سبب الاجازة: </span>
        <span class="flex__items"><input disabled type="checkbox" {{ $vacation->reason_for_leave == "سنوية" ? "checked" : "" }}> السنوية</span>
        <span class="flex__items"><input disabled type="checkbox" {{ $vacation->reason_for_leave == "غير مدفوعة" ? "checked" : "" }}> غير مدفوعة</span>
        <span class="flex__items"><input disabled type="checkbox" {{ $vacation->reason_for_leave == "مرضية" ? "checked" : "" }}> مرضية</span>
        <span class="flex__items"><input disabled type="checkbox" {{ $vacation->reason_for_leave == "حج" ? "checked" : "" }}> حج</span>
        <span class="flex__items"><input disabled type="checkbox" {{ $vacation->reason_for_leave == "زواج" ? "checked" : "" }}> زواج</span>
        <span class="flex__items"><input disabled type="checkbox" {{ $vacation->reason_for_leave == "مولود" ? "checked" : "" }}> مولود</span>
        <span class="flex__items"><input disabled type="checkbox" {{ $vacation->reason_for_leave == "دراسية" ? "checked" : "" }}> دراسية</span>
      </div>
      <div class="flex__items">
        <div style="width: 40%">اول يوم من الاجازة:{{$vacation->first_day_off}}</div>
        <div style="width: 40%">اخر يوم من الاجازة:{{$vacation->last_date_off}}</div>
        <div style="width: 20%">عدد الايام:</div>
      </div>
      <div class="flex__items">العنوان اثناء الاجازة:{{$vacation->address_in_vacation}}</div>
      <div class="flex__items">هاتف:{{$vacation->phone}}</div>

      <h2 class="section__title">الخدمة المطلوبة</h2>
      <div class="flex__items" style="align-items: flex-start">
        <div style="width: 30%">
          <h3 style="margin: 0 0 18px 0; text-align: center">البند:</h3>
          <h4 style="margin: 0 0 18px 0">تاشيرة خروج وعودة :{{$vacation->required_service->exit_and_return_visa}}</h4>
          <h4 style="margin: 0 0 18px 0">تاشيرة بلد :{{$vacation->required_service->country_visa}}</h4>
          <h4 style="margin: 0 0 18px 0">حجز الطيران / تذاكر :{{$vacation->required_service->ticket_reservation}}</h4>
          <h4 style="margin: 0 0 18px 0">تعويض التذكرة :{{$vacation->required_service->ticket_reimbursement}}</h4>
          <h4 style="margin: 0 0 18px 0">تاريخ السفر :{{$vacation->required_service->date_travel}}</h4>
        </div>
        <div style="width: 70%">
          <h3 style="margin: 0 0 18px 0; text-align: center">التفصيل:{{$vacation->required_service->notes_one}}</h3>
        </div>
      </div>
      <div>
      <div class="flex__items" style="flex-wrap: wrap;">
        <h3 style="width: 30%; text-align: center; margin: 0">الاسم</h3>
        <h3 style="width: 15%; text-align: center; margin: 0">العمر</h3>
        <h3 style="width: 30%; text-align: center; margin: 0">الاسم</h3>
        <h3 style="width: 15%; text-align: center; margin: 0">العمر</h3>
        <div style="width: 48%;" class="flex__items">
          <h4 style="margin: 0; width: 10%;">الموظف :</h4>
          @if($person_val = $vacation->persons()->where('person_id', 1)->first())
            <div style="width: 50%;">{{ $person_val->name }}</div>
            <div style="width: 30%;">{{ $person_val->age }}</div>
          @else
            <div style="width: 50%;"></div>
            <div style="width: 30%;"></div>
          @endif
        </div>
        <div style="width: 48%;" class="flex__items">
          <h4 style="margin: 0; width: 10%;">زوجة :</h4>
          @if($person_val_2 = $vacation->persons()->where('person_id', 2)->first())
            <div style="width: 50%;">{{ $person_val_2->name }}</div>
            <div style="width: 30%;">{{ $person_val_2->age }}</div>
          @else
            <div style="width: 50%;"></div>
            <div style="width: 30%;"></div>
          @endif
        </div>
        <div class="flex__items" style="width: 100%; align-items: flex-start;">
          <h4 style="margin: 0; width: 5%;">اطفال :</h4>
          <div class="flex__items" style="flex-wrap: wrap; width: 95%">
            <span style="width: 48%;" class="flex__items">
              @if($person_val_3 = $vacation->persons()->where('person_id', 3)->first())
                <span style="width: 50%;">1 - <div style="width: 30%;">{{ $person_val_3->name }}</div></span>
                <span style="width: 50%;"><div style="width: 30%;">{{ $person_val_3->age }}</div></span>
              @else
                <span style="width: 50%;">1 - <div style="width: 30%;"></div></span>
                <span style="width: 50%;"><div style="width: 30%;"></div></span>
              @endif
            </span>
            <span style="width: 48%;" class="flex__items">
              @if($person_val_4 = $vacation->persons()->where('person_id', 4)->first())
                <span style="width: 50%;">2 - <div style="width: 30%;">{{ $person_val_4->name }}</div></span>
                <span style="width: 50%;"><div style="width: 30%;">{{ $person_val_4->age }}</div></span>
              @else
                <span style="width: 50%;">2 - <div style="width: 30%;"></div></span>
                <span style="width: 50%;"><div style="width: 30%;"></div></span>
              @endif
            </span>
            <span style="width: 48%;" class="flex__items">
              @if($person_val_5 = $vacation->persons()->where('person_id', 5)->first())
                <span style="width: 50%;">3 - <div style="width: 30%;">{{ $person_val_5->name }}</div></span>
                <span style="width: 50%;"><div style="width: 30%;">{{ $person_val_5->age }}</div></span>
              @else
                <span style="width: 50%;">3 - <div style="width: 30%;"></div></span>
                <span style="width: 50%;"><div style="width: 30%;"></div></span>
              @endif
            </span>
            <span style="width: 48%;" class="flex__items">
              @if($person_val_6 = $vacation->persons()->where('person_id', 6)->first())
                <span style="width: 50%;">4 - <div style="width: 30%;">{{ $person_val_6->name }}</div></span>
                <span style="width: 50%;"><div style="width: 30%;">{{ $person_val_6->age }}</div></span>
              @else
                <span style="width: 50%;">4 - <div style="width: 30%;"></div></span>
                <span style="width: 50%;"><div style="width: 30%;"></div></span>
              @endif
            </span>
          </div>
        </div>
      </div>

      <h2 class="section__title">قسم الموارد البشرية والشؤون الادارية</h2>
      <div class="flex__items">
        <div style="width: 48%">
          <p>تاريخ العودة السابقة :{{$vacation->human_resources->previous_return_date}}</p>
          <p>
            تم صرف اجازة غير مدفوعة في هذه السنة
            {{$vacation->human_resources->unpaid_leave_per_year}}
            (ايام)
          </p>
          <p style="margin-bottom: 25px">ملاحظات :{{$vacation->human_resources->notes_tow}}</p>
        </div>
        <div style="width: 48%">
          <p>
            الاجازة المستحقة (مدفوعة)
            {{$vacation->human_resources->paid_leave}}
            (ايام)
          </p>
          <p>
            الاجازة المستحقة (غير مدفوعة)
            {{$vacation->human_resources->unpaid_leave}}
            (ايام)
          </p>
          <p>
            العطلات والاعياد
            {{$vacation->human_resources->holidays}}
            (ايام)
          </p>
          <p>
            الاجمالي
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            (ايام)
          </p>
        </div>
      </div>
      <div class="flex__items">
        <div style="width: 48%">
          <p class="flex__items">
            <span>هل الجواز ساري المفعول؟</span>
            <span>نعم</span>
            <input disabled type="checkbox" {{ $vacation->human_resources['is_the_passport_valid'] == 1 ? "checked" : "" }}>
            <span>لا</span>
            <input disabled type="checkbox" {{ $vacation->human_resources['is_the_passport_valid'] == 0 ? "checked" : "" }}>
          </p>
          <p class="flex__items">
            <span>هل الاقامة سارية المفعول؟</span>
            <span>نعم</span>
            <input disabled type="checkbox" {{ $vacation->human_resources['cover_the_duration_of_the_visa'] == 1 ? "checked" : "" }}>
            <span>لا</span>
            <input disabled type="checkbox" {{ $vacation->human_resources['cover_the_duration_of_the_visa'] == 0 ? "checked" : "" }}>
          </p>
        </div>
        <div style="width: 48%">
          <p class="flex__items">
            <span>هل تغطي الاقامة مدة التاشيرة ؟ </span>
            <span>نعم</span>
            <input disabled type="checkbox" {{ $vacation->human_resources['is_the_residence_permit_valid'] == 1 ? "checked" : "" }}>
            <span>لا</span>
            <input disabled type="checkbox" {{ $vacation->human_resources['is_the_residence_permit_valid'] == 0 ? "checked" : "" }}>
          </p>
          <p>اعتماد من قبل : </p>
        </div>
      </div>

      <h2 class="section__title">الموافقات (حسب مصفوفة الصلاحيات والمسؤوليات)</h2>
      <p class="flex__items">الرئيس المباشر : </p>
      <p class="flex__items">اخصائي الموارد البشرية : </p>
    @endisset
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
