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
              <h2
                style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
              >
              النموذج الشهري لتقويم اداء الموظفين <br> تحت التجربة
              </h2>



             <div class="outer__border">
            <div>

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
                                    <input type="text" value="{{optional($UnderTheScabie->staff)->name}}" readonly>

                                </td>
                                <td colspan="2">
                                    <input type="text" value="{{optional($UnderTheScabie->job)->name_job}}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>الادارة</td>
                                <td>القسم </td>
                                <td>تاريخ التعيين</td>
                            </tr>
                            <tr>
                                <td>

                                    <input type="text" value="{{optional($UnderTheScabie->administration)->name_administration }}" readonly>
                                </td>
                                <td>
                                    <input type="text" value=" {{optional($UnderTheScabie->section)->name}}" readonly>

                                </td>
                                <td><input type="date" value="{{ $UnderTheScabie->date_of_being_hired }}" name="date_of_being_hired" readonly>

                                </td>
                            </tr>
                            <tr>
                                <td>اسم المسؤول المباشر</td>
                                <td colspan="2">تاريخ تقويم الاداء</td>
                            </tr>
                            <tr>
                                <td><input name="direct_admin_name" value="{{ $UnderTheScabie->direct_admin_name }}" type="text" readonly>

                                </td>
                                <td colspan="2"><input type="date" value="{{ $UnderTheScabie->performance_appraisal_date }}" name="performance_appraisal_date" readonly>

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
                                        disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" {{ $UnderTheScabie->maintain_working_hours == "8" ? "checked" : "" }} name="maintain_working_hours"
                                        disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" {{ $UnderTheScabie->maintain_working_hours == "6" ? "checked" : "" }} name="maintain_working_hours"
                                        disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" {{ $UnderTheScabie->maintain_working_hours == "4" ? "checked" : "" }} name="maintain_working_hours"
                                        disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" {{ $UnderTheScabie->maintain_working_hours == "2" ? "checked" : "" }} name="maintain_working_hours"
                                            disabled >
                                        </td>

                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td>جودة انتاجية الاداء</td>
                                    <td>
                                        <input type="radio" value="10" {{ $UnderTheScabie->good_productivity_performance == "10" ? "checked" : "" }} name="good_productivity_performance"
                                        disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" {{ $UnderTheScabie->good_productivity_performance == "8" ? "checked" : "" }} name="good_productivity_performance"
                                        disabled >
                                    </td>
                                    <td>
                                        <input type="radio" value="6" {{ $UnderTheScabie->good_productivity_performance == "6" ? "checked" : "" }} name="good_productivity_performance"
                                        disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" {{ $UnderTheScabie->good_productivity_performance == "4" ? "checked" : "" }} name="good_productivity_performance"
                                        disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" {{ $UnderTheScabie->good_productivity_performance == "2" ? "checked" : "" }} name="good_productivity_performance"
                                            disabled >
                                        </td>

                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td>كمية الانتاج</td>
                                    <td>
                                        <input type="radio" value="10" {{ $UnderTheScabie->production_quantity == "10" ? "checked" : "" }} name="production_quantity"
                                        disabled >
                                    </td>
                                    <td>
                                        <input type="radio" value="8" {{ $UnderTheScabie->production_quantity == "8" ? "checked" : "" }} name="production_quantity"
                                        disabled >
                                    </td>
                                    <td>
                                        <input type="radio" value="6" {{ $UnderTheScabie->production_quantity == "6" ? "checked" : "" }} name="production_quantity"
                                        disabled >
                                    </td>
                                    <td>
                                        <input type="radio" value="4" {{ $UnderTheScabie->production_quantity == "4" ? "checked" : "" }} name="production_quantity"
                                        disabled  >
                                    </td>
                                        <td>
                                            <input type="radio" value="2" {{ $UnderTheScabie->production_quantity == "2" ? "checked" : "" }} name="production_quantity"
                                            disabled   >
                                        </td>

                                </tr>
                                <tr>
                                    <th>4</th>
                                    <td>القدرة علي التعلم</td>
                                    <td>
                                        <input type="radio" value="10" name="learning_ability"
                                        {{ $UnderTheScabie->learning_ability == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" name="learning_ability"
                                        {{ $UnderTheScabie->learning_ability == "8" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="learning_ability"
                                        {{ $UnderTheScabie->learning_ability == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="learning_ability"
                                        {{ $UnderTheScabie->learning_ability == "4" ? "checked" : "" }} disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" name="learning_ability"
                                            {{ $UnderTheScabie->learning_ability == "2" ? "checked" : "" }} disabled>
                                        </td>

                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td>التقدم في العمل</td>
                                    <td>
                                        <input type="radio" value="10" name="work_progress"
                                        {{ $UnderTheScabie->work_progress == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" name="work_progress"
                                        {{ $UnderTheScabie->work_progress == "8" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="work_progress"
                                        {{ $UnderTheScabie->work_progress == "6" ? "checked" : "" }}disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="work_progress"
                                        {{ $UnderTheScabie->work_progress == "4" ? "checked" : "" }}disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" name="work_progress"
                                            {{ $UnderTheScabie->work_progress == "2" ? "checked" : "" }}disabled>
                                        </td>

                                </tr>
                                <tr>
                                    <th>6</th>
                                    <td>الالتزام بتعليمات المسؤول المباشر</td>
                                    <td>
                                        <input type="radio" value="10" name="adhere_to_the_directives_instructions"
                                        {{ $UnderTheScabie->adhere_to_the_directives_instructions == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" name="adhere_to_the_directives_instructions"
                                        {{ $UnderTheScabie->adhere_to_the_directives_instructions == "8" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="adhere_to_the_directives_instructions"
                                        {{ $UnderTheScabie->adhere_to_the_directives_instructions == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="adhere_to_the_directives_instructions"
                                        {{ $UnderTheScabie->adhere_to_the_directives_instructions == "4" ? "checked" : "" }}disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" name="adhere_to_the_directives_instructions"
                                            {{ $UnderTheScabie->adhere_to_the_directives_instructions == "2" ? "checked" : "" }}disabled>
                                        </td>
                                </tr>
                                <tr>
                                    <th>7</th>
                                    <td>المبادرة وسرعة البديهة</td>
                                    <td>
                                        <input type="radio" value="10" name="initiative_and_quick_wit"
                                        {{ $UnderTheScabie->initiative_and_quick_wit == "10" ? "checked" : "" }}disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" name="initiative_and_quick_wit"
                                        {{ $UnderTheScabie->initiative_and_quick_wit == "8" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="initiative_and_quick_wit"
                                        {{ $UnderTheScabie->initiative_and_quick_wit == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="initiative_and_quick_wit"
                                        {{ $UnderTheScabie->initiative_and_quick_wit == "4" ? "checked" : "" }} disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" name="initiative_and_quick_wit"
                                            {{ $UnderTheScabie->initiative_and_quick_wit == "2" ? "checked" : "" }} disabled>
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
                                        {{ $UnderTheScabie->relationship_with_colleagues == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" name="relationship_with_colleagues"
                                        {{ $UnderTheScabie->relationship_with_colleagues == "8" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="relationship_with_colleagues"
                                        {{ $UnderTheScabie->relationship_with_colleagues == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="relationship_with_colleagues"
                                        {{ $UnderTheScabie->relationship_with_colleagues == "4" ? "checked" : "" }} disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" name="relationship_with_colleagues"
                                            {{ $UnderTheScabie->relationship_with_colleagues == "2" ? "checked" : "" }} disabled>
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
                                        {{ $UnderTheScabie->ability_to_organize_work == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" name="ability_to_organize_work"
                                        {{ $UnderTheScabie->ability_to_organize_work == "8" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="ability_to_organize_work"
                                        {{ $UnderTheScabie->ability_to_organize_work == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="ability_to_organize_work"
                                        {{ $UnderTheScabie->ability_to_organize_work == "4" ? "checked" : "" }} disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" name="ability_to_organize_work"
                                            {{ $UnderTheScabie->ability_to_organize_work == "2" ? "checked" : "" }} disabled>
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
                                        {{ $UnderTheScabie->take_advantage_of_working_time == "10" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="8" name="take_advantage_of_working_time"
                                        {{ $UnderTheScabie->take_advantage_of_working_time == "8" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="6" name="take_advantage_of_working_time"
                                        {{ $UnderTheScabie->take_advantage_of_working_time == "6" ? "checked" : "" }} disabled>
                                    </td>
                                    <td>
                                        <input type="radio" value="4" name="take_advantage_of_working_time"
                                        {{ $UnderTheScabie->take_advantage_of_working_time == "4" ? "checked" : "" }} disabled>
                                    </td>
                                        <td>
                                            <input type="radio" value="2" name="take_advantage_of_working_time"
                                            {{ $UnderTheScabie->take_advantage_of_working_time == "2" ? "checked" : "" }}disabled>
                                        </td>

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
                                {{ $UnderTheScabie->direct_administrators_recommendation == "تثبيت" ? "checked" : "" }} disabled> <label for="">تثبيت</label>
                            </div>
                            <div style="width: 33%;">
                                2. <input type="radio" value="تمديد فترة التجربة" name="direct_administrators_recommendation" disabled> <label
                                {{ $UnderTheScabie->direct_administrators_recommendation == "تمديد فترة التجربة" ? "checked" : "" }}
                                for="">تمديد فترة التجربة</label>
                            </div>
                            <div style="width: 33%;">
                                3. <input type="radio" value="الاستغناء عن الخدمة" name="direct_administrators_recommendation"
                                {{ $UnderTheScabie->direct_administrators_recommendation == "الاستغناء عن الخدمة" ? "checked" : "" }}
                                disabled> <label for="">الاستغناء عن الخدمة</label>
                            </div>
                            <div>

                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                            <span>ملاحظات</span>
                            <div style="width: 90%;">
                                <span>المسؤول المباشر</span><br>
                                <textarea rows="5"  name="notes" style="width: 100%;" readonly>{{ $UnderTheScabie->notes }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-around;">
                    <span>التوقيع <input type="text"></span>
                    <span>التاريخ <input type="date"></span>
                </div>
                <p style="margin: 10px 0;">توقيع <input type="text"> لقد اطلعت علي التقويم وتمت المناقشة مع المسؤول المباشر
                    <input type="text">
                </p>
                <div style="display: flex; justify-content: space-between;">
                    <span>الموظف</span>
                    <div style="width: 90%;">
                        <ul>
                            <li>لا يوجد اي اعتراض علي ما ورد فيه</li>
                            <li>اعترض علي البنود الرقم <input type="text"
                                    style="width: 35px; height: 30px; margin: 0 5px;"><input type="text"
                                    style="width: 35px; height: 30px; margin: 0 5px;"><input type="text"
                                    style="width: 35px; height: 30px; margin: 0 5px;"> (ومرفق ورقة تبين وجه الاعتراض)</li>
                        </ul>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-around;">
                    <span>التوقيع <input disabled type="text"></span>
                    <span>التاريخ <input disabled type="date"></span>
                </div>
                <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                    <h3 style="margin: 0;">قرار المدير التنفيذي</h3>
                    <div style="width: 33%;">
                        1. <input disabled type="radio" name="direct_administrators_recommendation" value="تثبيت"
                        {{ $UnderTheScabie->direct_administrators_recommendation == "تثبيت" ? "checked" : "" }}> <label for="">تثبيت</label>
                    </div>
                    <div style="width: 33%;">
                        2. <input disabled type="radio" value="تمديد فترة التجربة" name="direct_administrators_recommendation"
                        {{ $UnderTheScabie->direct_administrators_recommendation == "تمديد فترة التجربة" ? "checked" : "" }}
                        > <label
                        for="">تمديد فترة التجربة</label>
                    </div>
                    <div style="width: 33%;">
                        3. <input disabled type="radio" value="الاستغناء عن الخدمة" name="direct_administrators_recommendation"
                        {{ $UnderTheScabie->direct_administrators_recommendation == "الاستغناء عن الخدمة" ? "checked" : "" }}
                        > <label for="">الاستغناء عن الخدمة</label>
                    </div>
                </div>
                <textarea style="width: 100%;" rows="5"></textarea>
                <div style="display: flex; justify-content: space-around;">
                    <span>التوقيع <input type="text"></span>
                    <span>التاريخ <input type="date"></span>
                </div>






            </div>
        </div>
        <div class="page__footer">
            <p style="font-weight: 600; font-size: 18px; direction: ltr">
              <span><img src="{{ asset('admin/assets/images/location.png') }}" alt="" /></span>KING FAISAL ST., EL KOM
              EL AKHDAR STATION, END OF ALY SHIHA ST, HARAM, GIZA- EGYPT.
            </p>
            <p>
              <span><img src="{{asset('admin/assets/images/telephone.png')}}" alt="" /></span>+2 33840003 - 33840530
              <img src="{{ asset('admin/assets/images/whatsapp.png') }}" alt="" /> 01099977100 - 01000080770
            </p>
            <p><img src="{{ asset('admin/assets/images/facebook.png') }}" alt="" />facebook.com/tmuniform</p>
            <p>
              <span><img src="{{ asset('admin/assets/images/global.png') }}" alt="" /></span>www.tmuniform.com
            </p>
            <p>sales@tmuniform.com - export@tmuniform.com - gm@tmuniform.com</p>
            <p>
              All rights reserved to tmuniform.com
              <span id="footer-date" style="background-color: inherit"></span>
            </p>
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

