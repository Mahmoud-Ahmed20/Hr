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
                        <h3>تفاصيل عرض العمل </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>

                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">  <a style="text-decoration:none;color:black;" href="{{ url(route('admin/UnderTheScabies/index')) }}">
                             النموذج الشهري لتقويم اداء الموظفين تحت التجربة  </a></li>
                        <li class="breadcrumb-item active">تعديل عرض عمل </li>

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
        تفاصيل عرض العمل
      </h2>
      <h2
        style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
      >
        Job Offer Specfication
      </h2>

      <div class="outer__border">
        <form class="card" action="{{url(route('admin/UnderTheScabies/update', $UnderTheScabie->id)) }}" method="post" >
            @csrf
            <div class="outer__border">
                <div>
                    <table>
                        <tr>
                            <th colspan="3">
                                <div style="display: flex; align-items: flex-start; justify-content: space-around;">
                                    <div style="width: 50%;">
                                        <h2>قسم الشؤون المالية والادارية</h2>

                                    </div>
                                    <div style="width: 50%;">
                                        <h2>النموذج الشهري لتقويم اداء الموظفين <br> تحت التجربة</h2>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>اسم الموظف</td>
                            <td colspan="2">الوظيفة</td>
                        </tr>
                        <tr>

                            <td>
                                <select name="staff_id" id="staff_id">
                                    <option disabled >-- يرجي تحديد اسم الموظف   ----</option>
                                    @foreach ($staffs as $staff)
                                    <option  value="{{$staff->id}}" {{$UnderTheScabie->staff_id == $staff->id ?"selected":""}}>{{ $staff->name}}</option>
                                    @endforeach
                                  </select>
                                  @error('staff_id')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror

                            </td>
                            <td colspan="2">
                                <select name="job_id" id="job_id">
                                    <option  disabled >-- يرجي تحديد الوظيفة   ----</option>
                                    @foreach ($jobs as $job )
                                    <option  value="{{$job->id}}" {{ $UnderTheScabie->job_id == $job->id ?"selected":"" }}>{{ $job->name_job }}</option>
                                    @endforeach
                                  </select>
                                  @error('job_id')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>الادارة</td>
                            <td>القسم </td>
                            <td>تاريخ التعيين</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="administration_id" id="administration_id">
                                    <option  disabled >-- يرجي تحديد الادارة   ----</option>
                                    @foreach ($administrations as $administration )
                                    <option  value="{{$administration->id}}" {{ $UnderTheScabie->administration_id == $administration->id ?"selected":"" }}>{{ $administration->name_administration }}</option>
                                    @endforeach
                                  </select>
                                  @error('administration_id')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror

                            </td>
                            <td>
                                <select name="section_id" id="section_id">
                                    <option  disabled >-- يرجي تحديد القسم   ----</option>
                                    @foreach ($sections as $section )
                                    <option  value="{{$section->id}}"  {{ $UnderTheScabie->section_id == $section->id ?"selected":"" }}>{{ $section->name}}</option>
                                    @endforeach
                                  </select>
                                  @error('section_id')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td><input type="date" value="{{ $UnderTheScabie->date_of_being_hired }}" name="date_of_being_hired">
                                @error('date_of_being_hired')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>اسم المسؤول المباشر</td>
                            <td colspan="2">تاريخ تقويم الاداء</td>
                        </tr>
                        <tr>
                            <td><input name="direct_admin_name" value="{{ $UnderTheScabie->direct_admin_name }}" type="text">
                                @error('direct_admin_name')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </td>
                            <td colspan="2"><input type="date" value="{{ $UnderTheScabie->performance_appraisal_date }}" name="performance_appraisal_date">
                                @error('performance_appraisal_date')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </td>
                        </tr>
                    </table>
                    <div style="border-top: 3px solid #222; margin-top: 10px; padding-top: 10px;">
                        <table>
                            <tr>
                                <th>الرقم</th>
                                <th>عناصر التقويم</th>
                                <th>ممتاز <br> 10</th>
                                <th>جيدجدا <br> 8</th>
                                <th>جيد <br> 6 </th>
                                <th>متوسط <br> 4</th>
                                <th>ضعيف <br> 2</th>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>الحفاظ علي مواعيد العمل</td>
                                <td>
                                    <input type="radio" {{ $UnderTheScabie->maintain_working_hours == "10" ? "checked" : "" }} value="10" name="maintain_working_hours"
                                    >
                                </td>
                                <td>
                                    <input type="radio" value="8" {{ $UnderTheScabie->maintain_working_hours == "8" ? "checked" : "" }} name="maintain_working_hours"
                                    >
                                </td>
                                <td>
                                    <input type="radio" value="6" {{ $UnderTheScabie->maintain_working_hours == "6" ? "checked" : "" }} name="maintain_working_hours"
                                    >
                                </td>
                                <td>
                                    <input type="radio" value="4" {{ $UnderTheScabie->maintain_working_hours == "4" ? "checked" : "" }} name="maintain_working_hours"
                                    >
                                </td>
                                    <td>
                                        <input type="radio" value="2" {{ $UnderTheScabie->maintain_working_hours == "2" ? "checked" : "" }} name="maintain_working_hours"
                                        >
                                    </td>
                                        @error('maintain_working_hours')
                                        <span class="text-danger">{{$message}}</span>
                                      @enderror
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>جودة انتاجية الاداء</td>
                                <td>
                                    <input type="radio" value="10" {{ $UnderTheScabie->good_productivity_performance == "10" ? "checked" : "" }} name="good_productivity_performance"
                                   >
                                </td>
                                <td>
                                    <input type="radio" value="8" {{ $UnderTheScabie->good_productivity_performance == "8" ? "checked" : "" }} name="good_productivity_performance"
                                    >
                                </td>
                                <td>
                                    <input type="radio" value="6" {{ $UnderTheScabie->good_productivity_performance == "6" ? "checked" : "" }} name="good_productivity_performance"
                                    >
                                </td>
                                <td>
                                    <input type="radio" value="4" {{ $UnderTheScabie->good_productivity_performance == "4" ? "checked" : "" }} name="good_productivity_performance"
                                    >
                                </td>
                                    <td>
                                        <input type="radio" value="2" {{ $UnderTheScabie->good_productivity_performance == "2" ? "checked" : "" }} name="good_productivity_performance"
                                        >
                                    </td>
                                @error('good_productivity_performance')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>كمية الانتاج</td>
                                <td>
                                    <input type="radio" value="10" {{ $UnderTheScabie->production_quantity == "10" ? "checked" : "" }} name="production_quantity"
                                   >
                                </td>
                                <td>
                                    <input type="radio" value="8" {{ $UnderTheScabie->production_quantity == "8" ? "checked" : "" }} name="production_quantity"
                                 >
                                </td>
                                <td>
                                    <input type="radio" value="6" {{ $UnderTheScabie->production_quantity == "6" ? "checked" : "" }} name="production_quantity"
                                   >
                                </td>
                                <td>
                                    <input type="radio" value="4" {{ $UnderTheScabie->production_quantity == "4" ? "checked" : "" }} name="production_quantity"
                                   >
                                </td>
                                    <td>
                                        <input type="radio" value="2" {{ $UnderTheScabie->production_quantity == "2" ? "checked" : "" }} name="production_quantity"
                                       >
                                    </td>
                                @error('production_quantity')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>القدرة علي التعلم</td>
                                <td>
                                    <input type="radio" value="10" name="learning_ability"
                                    {{ $UnderTheScabie->learning_ability == "10" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="8" name="learning_ability"
                                    {{ $UnderTheScabie->learning_ability == "8" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="6" name="learning_ability"
                                    {{ $UnderTheScabie->learning_ability == "6" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="4" name="learning_ability"
                                    {{ $UnderTheScabie->learning_ability == "4" ? "checked" : "" }}>
                                </td>
                                    <td>
                                        <input type="radio" value="2" name="learning_ability"
                                        {{ $UnderTheScabie->learning_ability == "2" ? "checked" : "" }}>
                                    </td>
                                @error('learning_ability')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </tr>
                            <tr>
                                <th>5</th>
                                <td>التقدم في العمل</td>
                                <td>
                                    <input type="radio" value="10" name="work_progress"
                                    {{ $UnderTheScabie->work_progress == "10" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="8" name="work_progress"
                                    {{ $UnderTheScabie->work_progress == "8" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="6" name="work_progress"
                                    {{ $UnderTheScabie->work_progress == "6" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="4" name="work_progress"
                                    {{ $UnderTheScabie->work_progress == "4" ? "checked" : "" }}>
                                </td>
                                    <td>
                                        <input type="radio" value="2" name="work_progress"
                                        {{ $UnderTheScabie->work_progress == "2" ? "checked" : "" }}>
                                    </td>
                                @error('work_progress')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </tr>
                            <tr>
                                <th>6</th>
                                <td>الالتزام بتعليمات المسؤول المباشر</td>
                                <td>
                                    <input type="radio" value="10" name="adhere_to_the_directives_instructions"
                                    {{ $UnderTheScabie->adhere_to_the_directives_instructions == "10" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="8" name="adhere_to_the_directives_instructions"
                                    {{ $UnderTheScabie->adhere_to_the_directives_instructions == "8" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="6" name="adhere_to_the_directives_instructions"
                                    {{ $UnderTheScabie->adhere_to_the_directives_instructions == "6" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="4" name="adhere_to_the_directives_instructions"
                                    {{ $UnderTheScabie->adhere_to_the_directives_instructions == "4" ? "checked" : "" }}>
                                </td>
                                    <td>
                                        <input type="radio" value="2" name="adhere_to_the_directives_instructions"
                                        {{ $UnderTheScabie->adhere_to_the_directives_instructions == "2" ? "checked" : "" }}>
                                    </td>
                                @error('adhere_to_the_directives_instructions')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </tr>
                            <tr>
                                <th>7</th>
                                <td>المبادرة وسرعة البديهة</td>
                                <td>
                                    <input type="radio" value="10" name="initiative_and_quick_wit"
                                    {{ $UnderTheScabie->initiative_and_quick_wit == "10" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="8" name="initiative_and_quick_wit"
                                    {{ $UnderTheScabie->initiative_and_quick_wit == "8" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="6" name="initiative_and_quick_wit"
                                    {{ $UnderTheScabie->initiative_and_quick_wit == "6" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="4" name="initiative_and_quick_wit"
                                    {{ $UnderTheScabie->initiative_and_quick_wit == "4" ? "checked" : "" }}>
                                </td>
                                    <td>
                                        <input type="radio" value="2" name="initiative_and_quick_wit"
                                        {{ $UnderTheScabie->initiative_and_quick_wit == "2" ? "checked" : "" }}>
                                    </td>
                                @error('initiative_and_quick_wit')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </tr>
                            <tr>
                                <th>8</th>
                                <td>العلاقة مع الزملاء</td>
                                <td>
                                    <input type="radio" value="10" name="relationship_with_colleagues"
                                    {{ $UnderTheScabie->relationship_with_colleagues == "10" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="8" name="relationship_with_colleagues"
                                    {{ $UnderTheScabie->relationship_with_colleagues == "8" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="6" name="relationship_with_colleagues"
                                    {{ $UnderTheScabie->relationship_with_colleagues == "6" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="4" name="relationship_with_colleagues"
                                    {{ $UnderTheScabie->relationship_with_colleagues == "4" ? "checked" : "" }}>
                                </td>
                                    <td>
                                        <input type="radio" value="2" name="relationship_with_colleagues"
                                        {{ $UnderTheScabie->relationship_with_colleagues == "2" ? "checked" : "" }}>
                                    </td>
                                @error('relationship_with_colleagues')
                                    <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </tr>
                            <tr>
                                <th>9</th>
                                <td>القدرة علي تنظيم العمل</td>
                                <td>
                                    <input type="radio" value="10" name="ability_to_organize_work"
                                    {{ $UnderTheScabie->ability_to_organize_work == "10" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="8" name="ability_to_organize_work"
                                    {{ $UnderTheScabie->ability_to_organize_work == "8" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="6" name="ability_to_organize_work"
                                    {{ $UnderTheScabie->ability_to_organize_work == "6" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="4" name="ability_to_organize_work"
                                    {{ $UnderTheScabie->ability_to_organize_work == "4" ? "checked" : "" }}>
                                </td>
                                    <td>
                                        <input type="radio" value="2" name="ability_to_organize_work"
                                        {{ $UnderTheScabie->ability_to_organize_work == "2" ? "checked" : "" }}>
                                    </td>
                                @error('ability_to_organize_work')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </tr>
                            <tr>
                                <th>10</th>
                                <td>الافادة من وقت العمل</td>
                                <td>
                                    <input type="radio" value="10" name="take_advantage_of_working_time"
                                    {{ $UnderTheScabie->take_advantage_of_working_time == "10" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="8" name="take_advantage_of_working_time"
                                    {{ $UnderTheScabie->take_advantage_of_working_time == "8" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="6" name="take_advantage_of_working_time"
                                    {{ $UnderTheScabie->take_advantage_of_working_time == "6" ? "checked" : "" }}>
                                </td>
                                <td>
                                    <input type="radio" value="4" name="take_advantage_of_working_time"
                                    {{ $UnderTheScabie->take_advantage_of_working_time == "4" ? "checked" : "" }}>
                                </td>
                                    <td>
                                        <input type="radio" value="2" name="take_advantage_of_working_time"
                                        {{ $UnderTheScabie->take_advantage_of_working_time == "2" ? "checked" : "" }}>
                                    </td>
                                @error('take_advantage_of_working_time')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </tr>
                            <tr>
                                <th colspan="2">المجموع</th>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td><input id="total" type="text"></td>
                            </tr>
                        </table>
                    </div>
                    <div style="border-top: 3px solid #222; margin-top: 10px; padding-top: 10px;">
                        <table>
                            <tr>
                                <td>النتيجة</td>
                                <th>ممتاز</th>
                                <th>جيد جدا</th>
                                <th>جيد</th>
                                <th>متوسط</th>
                                <th>ضعيف</th>
                            </tr>
                            <tr>
                                <td>النتيجة</td>
                                <th>90-100</th>
                                <th>80-89</th>
                                <th>70-79</th>
                                <th>60-69</th>
                                <th>50-59</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="outer__border">
                <div>
                    <h3>توصية المسؤول المباشر</h3>
                    <div style="display: flex; justify-content: space-between;">
                        <div style="width: 33%;">
                            1. <input type="radio" name="direct_administrators_recommendation" value="تثبيت"
                            {{ $UnderTheScabie->direct_administrators_recommendation == "تثبيت" ? "checked" : "" }}> <label for="">تثبيت</label>
                        </div>
                        <div style="width: 33%;">
                            2. <input type="radio" value="تمديد فترة التجربة" 
                                name="direct_administrators_recommendation"
                            {{ $UnderTheScabie->direct_administrators_recommendation == "تمديد فترة التجربة" ? "checked" : "" }}> 
                            <label for="">تمديد فترة التجربة</label>
                        </div>
                        <div style="width: 33%;">
                            3. <input type="radio" value="الاستغناء عن الخدمة" name="direct_administrators_recommendation"
                            {{ $UnderTheScabie->direct_administrators_recommendation == "الاستغناء عن الخدمة" ? "checked" : "" }}
                            > <label for="">الاستغناء عن الخدمة</label>
                        </div>
                        <div>
                            @error('direct_administrators_recommendation')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                        <span>ملاحظات</span>
                        <div style="width: 90%;">
                            <span>المسؤول المباشر</span><br>
                            <textarea rows="5"  name="notes" style="width: 100%;">{{ $UnderTheScabie->notes }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4" style="display: flex;">
                <button class="btn btn-warning btn-xs" type="submit">تعديل</button>
            </div>
        </form>


      </div>
    </div>

@endsection
