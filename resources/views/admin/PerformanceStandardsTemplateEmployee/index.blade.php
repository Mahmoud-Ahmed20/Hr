@extends('layouts.admin.home')


@section('css')
<style>
    * {
      box-sizing: border-box;
    }
    .modal-dialog table td,
        .modal-dialog table th {
          border: 3px double #222;
          padding: 3px 5px;
          font-size: 20px;
          font-weight: 600;
        }
        .modal-dialog {
            max-width: 70vw!important;
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
    /* table td,
    table th {
      border: 3px double #222;
      padding: 3px 5px;
      font-size: 20px;
      font-weight: 600;
      text-align: initial;
    } */
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

<style>
    .dataTables_paginate,
    .dataTables_info {
        display: none;
    }
</style>
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
                    <li class="breadcrumb-item active"> نموذج معايير أداء الموظف </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row product-adding">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>  معايير أداء الموظف </h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->

                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">اضافه نموذج</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافه وظيفه</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                    </div>
                                    <div class="modal-body">
                                        <div dir="rtl">
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

                                          <form action="{{url(route('admin/performance/store'))}}" method="post">
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
                                                                     <option  value="{{$staff->id }}" >{{ $staff->name }}</option>
                                                                     @endforeach
                                                                   </select>
                                                             </td>
                                                             @error('staff_id')
                                                             <span class="text-danger">{{$message}}</span>
                                                           @enderror
                                                             <td>
                                                                 <input type="text" {{ old('job_title') }}  name="job_title">
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
                                                                         {{ old('understand_business_rules') == "2" ? "checked" : "" }}>
                                                                 </td>

                                                                 <td>
                                                                     <input type="radio" value="4" name="understand_business_rules"
                                                                     {{ old('understand_business_rules') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="understand_business_rules"
                                                                     {{ old('understand_business_rules') == "6" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="10" name="understand_business_rules" {{ old('understand_business_rules') == "10" ? "checked" : "" }}>
                                                                 </td>

                                                                 <td>
                                                                     <input type="text" name="understand_notes" {{ old('understand_notes') }}>
                                                                 </td>
                                                             </tr>
                                                             @error('understand_business_rules')
                                                             <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                             <tr>
                                                                 <td style="text-align: initial;">أنجاز العمل بالمستوى و الموعد المطلوب </td>

                                                                 <td>
                                                                     <input type="radio" value="2" name="get_work_done" {{ old('get_work_done') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="get_work_done" {{ old('get_work_done') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="get_work_done" {{ old('get_work_done') == "6" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="10" name="get_work_done" {{ old('get_work_done') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="get_work_done_notes"></td>
                                                             </tr>
                                                             @error('get_work_done')
                                                             <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                             <tr>
                                                                 <td style="text-align: initial;"> الاجتهاد والتجاوب مع ضغط العمل</td>
                                                                 <td>
                                                                     <input type="radio" value="2" name="responding_to_work_pressure" {{ old('responding_to_work_pressure') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="responding_to_work_pressure" {{ old('responding_to_work_pressure') == "4" ? "checked" : "" }}>
                                                                 </td>

                                                                 <td>
                                                                     <input type="radio" value="6" name="responding_to_work_pressure" {{ old('responding_to_work_pressure') == "6" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="10" name="responding_to_work_pressure" {{ old('responding_to_work_pressure') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="responding_to_work_pressure_notes"></td>
                                                             </tr>
                                                             @error('responding_to_work_pressure')
                                                             <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                             <tr>
                                                                 <td style="text-align: initial;">المبادرة و الابتكار في العمل</td>
                                                                 <td>
                                                                     <input type="radio" value="2" name="initiative_and_innovation_at_work" {{ old('initiative_and_innovation_at_work') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="initiative_and_innovation_at_work" {{ old('initiative_and_innovation_at_work') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="initiative_and_innovation_at_work" {{ old('initiative_and_innovation_at_work') == "6" ? "checked" : "" }}>
                                                                 </td>

                                                                 <td>
                                                                     <input type="radio" value="10" name="initiative_and_innovation_at_work" {{ old('initiative_and_innovation_at_work') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="initiative_and_innovation_at_work_notes"></td>
                                                             </tr>
                                                             @error('initiative_and_innovation_at_work')
                                                             <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                             <tr>
                                                                 <td style="text-align: initial;">تقبل توجيهات وانتقادات المدراء</td>
                                                                 <td>
                                                                     <input type="radio" value="2" name="accept_directives_from_managers" {{ old('accept_directives_from_managers') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="accept_directives_from_managers" {{ old('accept_directives_from_managers') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="accept_directives_from_managers" {{ old('accept_directives_from_managers') == "6" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="10" name="accept_directives_from_managers" {{ old('accept_directives_from_managers') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="accept_directives_from_managers_notes"></td>
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
                                                                     <input type="radio" value="2" name="flexibility_and_adaptability" {{ old('flexibility_and_adaptability') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="flexibility_and_adaptability" {{ old('flexibility_and_adaptability') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="flexibility_and_adaptability" {{ old('flexibility_and_adaptability') == "6" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="10" name="flexibility_and_adaptability" {{ old('flexibility_and_adaptability') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="flexibility_and_adaptability_notes"></td>
                                                             </tr>
                                                             @error('flexibility_and_adaptability_notes')
                                                             <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                             <tr>
                                                                 <td style="text-align: initial;">اتخاذ القرارات و تحمل المسؤوليات</td>
                                                                 <td>
                                                                     <input type="radio" value="2" name="make_decisions_and_take_responsibility" {{ old('make_decisions_and_take_responsibility') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="make_decisions_and_take_responsibility" {{ old('make_decisions_and_take_responsibility') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="make_decisions_and_take_responsibility" {{ old('make_decisions_and_take_responsibility') == "6" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="10" name="make_decisions_and_take_responsibility" {{ old('make_decisions_and_take_responsibility') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="make_decisions_and_take_responsibility_notes"></td>
                                                             </tr>
                                                             @error('make_decisions_and_take_responsibility')
                                                             <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                             <tr>
                                                                 <td style="text-align: initial;">النظافة الشخصية و المظهر العام</td>
                                                                 <td>
                                                                     <input type="radio" value="2" name="personal_cleanliness" {{ old('personal_cleanliness') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="personal_cleanliness" {{ old('personal_cleanliness') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="personal_cleanliness" {{ old('personal_cleanliness') == "6" ? "checked" : "" }}>
                                                                 </td>

                                                                 <td>
                                                                     <input type="radio" value="10" name="personal_cleanliness" {{ old('personal_cleanliness') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="personal_cleanliness_notes"></td>
                                                             </tr>
                                                             @error('personal_cleanliness_notes')
                                                             <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                             <tr>
                                                                 <td style="text-align: initial;">الالتزام بأنظمة وسياسات الشركة</td>
                                                                 <td>
                                                                     <input type="radio" value="2" name="adhere_to_corporate_policies" {{ old('adhere_to_corporate_policies') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="adhere_to_corporate_policies" {{ old('adhere_to_corporate_policies') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="adhere_to_corporate_policies" {{ old('adhere_to_corporate_policies') == "6" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="10" name="adhere_to_corporate_policies" {{ old('adhere_to_corporate_policies') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="adhere_to_corporate_policies_notes"></td>
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
                                                                     <input type="radio" value="2" name="teamwork" {{ old('teamwork') == "2" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="4" name="teamwork" {{ old('teamwork') == "4" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="6" name="teamwork" {{ old('teamwork') == "6" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td>
                                                                     <input type="radio" value="10" name="teamwork" {{ old('teamwork') == "10" ? "checked" : "" }}>
                                                                 </td>
                                                                 <td><input type="text" name="teamwork_notes"></td>
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
                                             <button class="btn btn-primary" type="submit">اضافه</button>
                                         </div>

                                         </form>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button class="btn btn-primary" type="button">Save</button>
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/performance/export/Excel',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>

                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/performance/Pdf')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModalExportPDF">
                            <i class="fas fa-filter"></i>
                        </button>
                        <div class="modal fade" id="myModalExportPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel"></h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" id="form" action="{{url(route('admin/performance/index'))}}" class="" >
                                            <input name="_method" type="hidden">
                                            {{ csrf_field() }}

                                            @include('admin.PerformanceStandardsTemplateEmployee.inputsCheck')

                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">تاكيد</button>
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- end poper add admin -->
                    @isset($Performances)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table  class="display" id="basic-1">
                                <thead>
                                    <tr>
                                      @include('admin.PerformanceStandardsTemplateEmployee.headertable')
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody id="jobOfferRecords">
                                @foreach($Performances as $Performance)

                                        <tr>
                                            @include('admin.PerformanceStandardsTemplateEmployee.foreachdata')
                                            <td>

                                                <!-- activate row -->
                                                @include('admin.PerformanceStandardsTemplateEmployee.activate')
                                                <!-- end activate row -->

                                                <!-- delete row -->
                                                @include('admin.PerformanceStandardsTemplateEmployee.delete')
                                                <!-- end delete row -->

                                                <!-- edit row -->
                                                <button class="btn btn-warning btn-xs" type="button">
                                                    <a href="{{route('admin/performance/edit', $Performance->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                </button>
                                                <!-- end edit row -->

                                                <!--  print row -->
                                                <button class="btn btn-primary btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/performance/print' , $Performance->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </button>
                                                <!-- end print row -->

                                            </td>


                                        </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\PerformanceStandardsTemplateEmployee::notArchive()->count()}}</span> entries
                            </div>
                            <div class="ltn__pagination-area text-center mt-5">
                                <div class="ltn__pagination">
                                    <div id="load_more">
                                        <button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id="'.$last_id.'" id="load_more_button">عرض المزيد</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@section('script')
    <script>
        let dataLen = @json($Performances);
        let showItems = document.getElementById("showItems")
        showItems.innerHTML = dataLen.data.length
        let length = dataLen.data.length
        console.log('showItems', Number(showItems.innerHTML));
        $(document).ready(function() {
            $(document).on('click', '#load_more_button', function() {
                let records = ``
                var _token = $('input[name="_token"]').val();
                var id = $(this).attr('data-id');
                let lastId = ''
                $('#load_more_button').html('<b>... جاري التحميل</b>');
                load_data(id, _token);

                function load_data(id = "", _token) {
                    $.ajax({
                        url: "{{ route('admin/performance/getMore') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                for (let i = 0; i < data.length; i++) {
                                    lastId = data[i].id
                                    records +=
                                        `
                                                        <tr>
                                                            <td>${data[i].StaffName}</td>
                                                            <td>${data[i].job_title}</td>
                                                            <td>${data[i].understand_business_rules}</td>
                                                            <td>${data[i].get_work_done}</td>
                                                            <td>${data[i].responding_to_work_pressure}</td>
                                                            <td>${data[i].initiative_and_innovation_at_work}</td>
                                                            <td>${data[i].accept_directives_from_managers}</td>
                                                            <td>${data[i].flexibility_and_adaptability}</td>
                                                            <td>${data[i].make_decisions_and_take_responsibility}</td>
                                                            <td>${data[i].personal_cleanliness}</td>
                                                            <td>${data[i].adhere_to_corporate_policies}</td>
                                                            <td>${data[i].teamwork}</td>
                                                            <td>

                                                                <!-- activate row -->
                                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-original-title="test"  data-bs-target="#myModalactivate-${data[i].id}">
                                                                        ${ data[i].is_activate == 1 ?' <i class="fas fa-lock-open"></i>' : '<i class="fas fa-lock"></i>' }
                                                                    </button>
                                                                    <div class="modal fade" id="myModalactivate-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد العمليه</h5>
                                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form role="form" action="${data[i].urlRouteActivate}" class="" >
                                                                                        <input name="_method" type="hidden">
                                                                                        {{ csrf_field() }}
                                                                                        <p>هل انت متاكد من تعديل هذه البيانات ؟</p>
                                                                                        <div class="modal-footer">
                                                                                            <button class="btn btn-primary" type="submit">تاكيد</button>
                                                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <!-- end activate row -->
                                                                <!-- delete row -->
                                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaldelete-${data[i].id}">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                    <div class="modal fade" id="myModaldelete-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد الحذف</h5>
                                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form role="form" action="${data[i].urlRouteDelete}" class="" >
                                                                                        <input name="_method" type="hidden">
                                                                                        {{ csrf_field() }}
                                                                                        <p>هل انت متاكد من حذف هذه البيانات ؟</p>
                                                                                        <div class="modal-footer">
                                                                                            <button class="btn btn-primary" type="submit">تاكيد</button>
                                                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <!-- end delete row -->

                                                                <!-- edit row -->
                                                                                <button class="btn btn-warning btn-xs" type="button">
                                                                                <a href="${data[i].urlRouteUpdate}, ${data[i].id}" style="text-decoration:none;color:white;">
                                                                                    <i class="fas fa-edit" style="color:white;"></i>
                                                                                </a>
                                                                                </button>
                                                                <!-- end edit row -->
                                                                 <!--  print row -->
                                                                        <button class="btn btn-primary btn-xs mt-1" type="button">
                                                                            <a href="${data[i].urlRoutePrint}" style="text-decoration:none;color:white;">
                                                                                <i class="fas fa-print"></i>
                                                                            </a>
                                                                        </button>
                                                                <!-- end print row -->

                                                            </td>
                                                        </tr>
                                                    `
                                }
                                let btnData = `<button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id=${lastId} id="load_more_button">عرض المزيد</button>`
                                document.getElementById("jobOfferRecords").innerHTML += records
                                length += data.length
                                showItems.innerHTML = Number(length)
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnData
                            } else if (data.length === 0) {
                                let btnNoData = `<button type="button" name="load_more_button" class="w-auto btn btn-primary form-control px-5">لا يوجد بيانات اخري</button>`
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnNoData
                            }
                        }
                    })
                }
            });
        });
    </script>
      <script>
        $(document).ready(function(){
        $("#form #select-all").click(function(){
            $("#form input[type='checkbox']").prop('checked',this.checked);
        });
    });
</script>
@endsection
