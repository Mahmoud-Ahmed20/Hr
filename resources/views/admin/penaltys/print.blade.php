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
        font-size: 20px;
    }

    .outer__border {
        border: 5px solid #222;
        padding: 3px;
        margin-bottom: 20px;
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
    @isset($penalty)
      <p>ادارة الموارد البشرية</p>
      <div style="text-align: center; font-weight: 700;">
          <h2 style="margin: 0; font-size: 35px;">اجراء جزائي</h2>
          <h2 style="margin: 0; font-size: 35px;">Penalty Procedure</h2>
      </div>

      <div class="outer__border">
          <div>
              <div class="flex__items" style="margin-bottom: 10px;">
                  <div class="flex__items" style="width: 30%;">
                      <span>الاسم</span>
                      <span style="width: 60%;">{{optional($penalty->staff)->name}}</span>
                      <span>Name</span>
                  </div>
                  <div class="flex__items" style="width: 30%;">
                      <span>الرقم</span>
                      <span style="width: 60%;">{{$penalty->number}}</span>
                      <span>No</span>
                  </div>
                  <div class="flex__items" style="width: 30%;">
                      <span>الادارة</span>
                      <span style="width: 60%;">{{optional($penalty->administration)->name_administration}}</span>
                      <span>Location</span>
                  </div>
              </div>
              <div class="flex__items" style="margin-bottom: 10px;">
                  <div class="flex__items" style="width: 45%;">
                      <span>القسم</span>
                      <span style="width: 60%;">{{optional($penalty->section)->name}}</span>
                      <span>Section</span>
                  </div>
                  <div class="flex__items" style="width: 45%;">
                      <span>مسمي الوظيفة</span>
                      <span style="width: 60%;">{{$penalty->job_title}}</span>
                      <span>Job title</span>
                  </div>
              </div>
              <div class="flex__items" style="margin-bottom: 10px;">
                  <div class="flex__items" style="width: 45%;">
                      <span>تاريخ التعيين</span>
                      <span style="width: 60%;">{{$penalty->joining_date}}</span>
                      <span>Joining Date</span>
                  </div>
                  <div class="flex__items" style="width: 45%;">
                      <span>تاريخ اخر مخالفة</span>
                      <span style="width: 60%;">{{$penalty->last_penalty}}</span>
                      <span>Last Penalty Date</span>
                  </div>
              </div>
              <div class="flex__items" style="margin-bottom: 10px;">
                  <span>الموضوع</span>
                  <span style="width: 80%;">{{$penalty->subject}}</span>
                  <span>Subject</span>
              </div>
              <div class="flex__items">
                  <span>المسؤول المباشر</span>
                  <span style="width: 20%;"></span>
                  <span>التوقيع</span>
                  <span style="width: 70%;"></span>
              </div>
          </div>
      </div>

      <div class="outer__border">
          <div style="padding: 0 3px;">
              <div class="flex__items">
                  <div style="width: 50%; border-left: 2px solid #222; padding-left: 10px; margin-left: 10px;">
                      <div class="flex__items">
                          <span>لفت نظر</span>
                          <span><input disabled type="checkbox" {{$penalty->draw_attention == 1 ? "checked" : ""}}></span>
                          <span>Draw Attention</span>
                      </div>
                      <div class="flex__items">
                          <span>انذار كتابي ()</span>
                          <span><input disabled type="checkbox" {{$penalty->penalty == 1 ? "checked" : ""}}></span>
                          <span>Penalty</span>
                      </div>
                      <div class="flex__items">
                          <span>خصم: </span>
                          <span><input disabled type="checkbox" {{!$penalty->deduction == null ? "checked" : ""}}></span>
                          <span>Deduction: <input disabled type="text" value="{{$penalty->deduction}}"> Day</span>
                      </div>
                      <div class="flex__items">
                          <span>انذار كتابي بالفصل</span>
                          <span><input disabled type="checkbox" {{$penalty->written_warning_by_fired == 1 ? "checked" : ""}}></span>
                          <span>Written Warning by Fired</span>
                      </div>
                      <div class="flex__items">
                          <span>اخري</span>
                          <span><input disabled type="checkbox" {{$penalty->others == 1 ? "checked" : ""}}></span>
                          <span>Others</span>
                      </div>
                  </div>
                  <div style="width: 50%;" dir="ltr">
                      <div class="flex__items">
                          <span>Stopping From Work For </span>
                          <span><input disabled type="checkbox" {{!$penalty->stopping_from_work_for == null ? "checked" : ""}}></span>
                          <span>ايقاف عن العمل لمدة <input disabled type="text" value="{{$penalty->stopping_from_work_for}}"> يوم</span>
                      </div>
                      <div class="flex__items">
                          <span>Stopping The yearly increase</span>
                          <span><input disabled type="checkbox" {{$penalty->stopping_the_yearly_increase == 1 ? "checked" : ""}}></span>
                          <span>الحرمان من الزيادة السنوية</span>
                      </div>
                      <div class="flex__items">
                          <span>Firing With a bying</span>
                          <span><input disabled type="checkbox" {{$penalty->firing_with_a_bying == 1 ? "checked" : ""}}></span>
                          <span>فصل من الخدمة مع التعويض</span>
                      </div>
                      <div class="flex__items">
                          <span>Firing Without a bying</span>
                          <span><input disabled type="checkbox" {{$penalty->firing_without_a_bying == 1 ? "checked" : ""}}></span>
                          <span>فصل من الخدمة بدون تعوضي</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="outer__border">
          <div>
              <div class="flex__items">
                  <span>السيد / <input disabled type="text"> المحترم</span>
              </div>
              <div class="flex__items" dir="ltr">
                  <span>Mr / <input disabled type="text"></span>
              </div>
              <div class="flex__items">
                  <span style="width: 25%;">مدير الادارة <input disabled type="text"></span>
                  <span style="width: 75%;">التوقيع <input disabled type="text"></span>
              </div>
              <div class="flex__items" style="margin: 30px 0;">
                  <div style="width: 49%;">
                      اشارة الي مخالفاتكم في العمل والمتضمنة : ما ذكر في قسم (1) وحيث ان مثل هذا يعتبر مخالفا للانظمة واللوائح المطبقة وعليه فقد <span style="border-bottom: 2px solid #222;">تقرر اتخاذ الاجراءات الموضحة في القيم (2) ضدكم</span> مع انذاركم بعدم تكرار ذلك مستقبلا
                  </div>
                  <div style="width: 49%;" dir="ltr">
                      Ref to the written note Dated <input disabled type="text"> Regarding what you have done is against the rules of the company so we <span style="border-bottom: 2px solid #222;">you will get the penalties in section (2)</span> with warning
                  </div>
              </div>

              <h3 style="font-size: 35px; margin: 0 0 15px 0; text-align: center;">مدير ادارة الموارد البشرية والشؤون الاداية</h3>
              <h3 style="font-size: 35px; margin: 0 0 25px 0; text-align: center;">HR & Admin Manager</h3>
              <div class="flex__items" style="justify-content: center; margin-bottom: 20px;">
                  التوقيع <input disabled type="text"> Signature
              </div>
              <div class="flex__items" style="justify-content: center;">
                  التاريخ <input disabled type="text"> Date
              </div>
          </div>
      </div>
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
