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
  </style>
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>نموذج معايير أداء الموظف </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>

                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/performance/index'))}}">نماذج اداء الموظفين</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل نموذج اداء موظف </li>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->






    <div dir="rtl">
        @include('flash::message')

        <h2
        style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
      >
        نموذج معايير أداء الموظف
      </h2>
      <h2
        style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
      >
        EMPLOYEE PERFORMANCE STANDARBS TEMPLATE
      </h2>

      <form action="{{url(route('admin/performance/update' , $Performance->id))}}" method="post">
        @csrf
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
                             <select name="staff_id" id="staff_id" class="form-select but_9" aria-label="Default select example">
                                 <option  selected  disabled >-- يرجي تحديد اسم الموظف   ----</option>
                                 @foreach ($staffs as $staff )
                                 <option  value="{{$staff->id }}" {{ $Performance->staff_id  ==  $staff->id  ?  "selected" : "" }}>{{ $staff->name }}</option>
                                 @endforeach
                               </select>
                         </td>
                         @error('staff_id')
                         <span class="text-danger">{{$message}}</span>
                       @enderror
                         <td>
                             <input type="text" value=" {{$Performance->job_title}}" {{ old('job_title') }}  name="job_title">
                         </td>
                         @error('job_title')
                         <span class="text-danger">{{$message}}</span>
                       @enderror
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
                                     {{ $Performance->understand_business_rules == "2" ? "checked" : "" }}>
                             </td>

                             <td>
                                 <input type="radio" value="4" name="understand_business_rules"
                                 {{ $Performance->understand_business_rules == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="understand_business_rules"
                                 {{ $Performance->understand_business_rules == "6" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="10" name="understand_business_rules"  {{ $Performance->understand_business_rules == "10" ? "checked" : "" }}>
                             </td>

                             <td>
                                 <input type="text" value="{{$Performance->understand_notes}}" name="understand_notes" {{ old('understand_notes') }}>
                             </td>
                         </tr>
                         @error('understand_business_rules')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
                         <tr>
                             <td style="text-align: initial;">أنجاز العمل بالمستوى و الموعد المطلوب </td>

                             <td>
                                 <input type="radio" value="2" name="get_work_done" {{ $Performance->get_work_done == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="get_work_done" {{ $Performance->get_work_done == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="get_work_done" {{ $Performance->get_work_done == "6" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="10" name="get_work_done" {{ $Performance->get_work_done == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text" value="{{$Performance->get_work_done_notes}}" name="get_work_done_notes"></td>
                         </tr>
                         @error('get_work_done')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
                         <tr>
                             <td style="text-align: initial;"> الاجتهاد والتجاوب مع ضغط العمل</td>
                             <td>
                                 <input type="radio" value="2" name="responding_to_work_pressure" {{ $Performance->responding_to_work_pressure == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="responding_to_work_pressure" {{ $Performance->responding_to_work_pressure == "4" ? "checked" : "" }}>
                             </td>

                             <td>
                                 <input type="radio" value="6" name="responding_to_work_pressure" {{ $Performance->responding_to_work_pressure == "6" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="10" name="responding_to_work_pressure" {{ $Performance->responding_to_work_pressure == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text" value="{{$Performance->responding_to_work_pressure_notes}}" name="responding_to_work_pressure_notes"></td>
                         </tr>
                         @error('responding_to_work_pressure')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
                         <tr>
                             <td style="text-align: initial;">المبادرة و الابتكار في العمل</td>
                             <td>
                                 <input type="radio" value="2" name="initiative_and_innovation_at_work" {{ $Performance->initiative_and_innovation_at_work == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="initiative_and_innovation_at_work" {{ $Performance->initiative_and_innovation_at_work == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="initiative_and_innovation_at_work" {{ $Performance->initiative_and_innovation_at_work == "6" ? "checked" : "" }}>
                             </td>

                             <td>
                                 <input type="radio" value="10" name="initiative_and_innovation_at_work"{{ $Performance->initiative_and_innovation_at_work == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text" value="{{$Performance->initiative_and_innovation_at_work_notes}}" name="initiative_and_innovation_at_work_notes"></td>
                         </tr>
                         @error('initiative_and_innovation_at_work')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
                         <tr>
                             <td style="text-align: initial;">تقبل توجيهات وانتقادات المدراء</td>
                             <td>
                                 <input type="radio" value="2" name="accept_directives_from_managers" {{$Performance->accept_directives_from_managers == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="accept_directives_from_managers" {{$Performance->accept_directives_from_managers == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="accept_directives_from_managers" {{$Performance->accept_directives_from_managers == "6" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="10" name="accept_directives_from_managers" {{$Performance->accept_directives_from_managers == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text" value="{{$Performance->accept_directives_from_managers_notes}}" name="accept_directives_from_managers_notes"></td>
                         </tr>
                         @error('accept_directives_from_managers_notes')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
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
                                 <input type="radio" value="2" name="flexibility_and_adaptability" {{$Performance->flexibility_and_adaptability == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="flexibility_and_adaptability"  {{$Performance->flexibility_and_adaptability == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="flexibility_and_adaptability"  {{$Performance->flexibility_and_adaptability == "6" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="10" name="flexibility_and_adaptability"  {{$Performance->flexibility_and_adaptability == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text" value="{{$Performance->flexibility_and_adaptability_notes}}" name="flexibility_and_adaptability_notes"></td>
                         </tr>
                         @error('flexibility_and_adaptability_notes')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
                         <tr>
                             <td style="text-align: initial;">اتخاذ القرارات و تحمل المسؤوليات</td>
                             <td>
                                 <input type="radio" value="2" name="make_decisions_and_take_responsibility"{{$Performance->make_decisions_and_take_responsibility == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="make_decisions_and_take_responsibility" {{$Performance->make_decisions_and_take_responsibility == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="make_decisions_and_take_responsibility" {{$Performance->make_decisions_and_take_responsibility == "6" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="10" name="make_decisions_and_take_responsibility" {{$Performance->make_decisions_and_take_responsibility == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text" value="{{$Performance->make_decisions_and_take_responsibility_notes}}" name="make_decisions_and_take_responsibility_notes"></td>
                         </tr>
                         @error('make_decisions_and_take_responsibility')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
                         <tr>
                             <td style="text-align: initial;">النظافة الشخصية و المظهر العام</td>
                             <td>
                                 <input type="radio" value="2" name="personal_cleanliness" {{ $Performance->personal_cleanliness == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="personal_cleanliness" {{ $Performance->personal_cleanliness == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="personal_cleanliness" {{ $Performance->personal_cleanliness == "6" ? "checked" : "" }}>
                             </td>

                             <td>
                                 <input type="radio" value="10" name="personal_cleanliness" {{ $Performance->personal_cleanliness == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text" value="{{$Performance->personal_cleanliness_notes}}" name="personal_cleanliness_notes"></td>
                         </tr>
                         @error('personal_cleanliness_notes')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
                         <tr>
                             <td style="text-align: initial;">الالتزام بأنظمة وسياسات الشركة</td>
                             <td>
                                 <input type="radio" value="2" name="adhere_to_corporate_policies" {{$Performance->adhere_to_corporate_policies == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="adhere_to_corporate_policies" {{$Performance->adhere_to_corporate_policies == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="adhere_to_corporate_policies" {{$Performance->adhere_to_corporate_policies == "6" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="10" name="adhere_to_corporate_policies" {{$Performance->adhere_to_corporate_policies == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text" value="{{$Performance->adhere_to_corporate_policies_notes}}" name="adhere_to_corporate_policies_notes"></td>
                         </tr>
                         @error('adhere_to_corporate_policies_notes')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
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
                                 <input type="radio" value="2" name="teamwork" {{$Performance->teamwork == "2" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="4" name="teamwork"  {{$Performance->teamwork == "4" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="6" name="teamwork"  {{$Performance->teamwork == "6" ? "checked" : "" }}>
                             </td>
                             <td>
                                 <input type="radio" value="10" name="teamwork"  {{$Performance->teamwork == "10" ? "checked" : "" }}>
                             </td>
                             <td><input type="text"  value="{{$Performance->teamwork_notes}}"  name="teamwork_notes"></td>
                         </tr>
                         @error('teamwork')
                         <span class="text-danger">{{$message}}</span>
                          @enderror
                     </table>
                 </div>
             </div>
         </div>


     </div>
     <div class="form-group mt-4" style="display: flex">
        <button class="btn btn-primary" type="submit">تعديل</button>
    </div>
    </form>
    </div>

@endsection
