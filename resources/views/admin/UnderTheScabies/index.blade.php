@extends('layouts.admin.home')


@section('content')

<style>
    .dataTables_paginate,
    .dataTables_info {
        display: none;
    }
    /* * {
            box-sizing: border-box;
        } */

        .outer__border {
            border: 5px solid #222;
            padding: 2px;
            margin-bottom: 5px;
        }

        .outer__border>div {
            border: 1px solid #222;
            padding: 0 5px;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }
        .modal-dialog table td,
        .modal-dialog table th {
            border: 3px double #222;
            padding: 3px 5px;
            font-size: 20px;
            font-weight: 600;
        }
        table td,
        table th {
            padding: 3px 5px;
            font-size: 20px;
            font-weight: 600;
        }

        table input,
        table textarea {
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
            direction: ltr
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
            background-color: #149ADB;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 3px;
        }
        .page__footer p span img {
        width: 80%;
        }
        .modal-dialog {
            max-width: 70vw!important;
        }
        .page__footer p span img {
            width: 80%;
        }
</style>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> النموذج الشهري أداء الموظفين</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active"> النموذج الشهري أداء الموظفين </li>
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
                    <h5> تحت التجربة</h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->

                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">اضافه نموذج</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافه نموذج</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="card" action="{{ url(route('admin/UnderTheScabies/store')) }}" method="post" >
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
                                                                    <option  selected  disabled >-- يرجي تحديد اسم الموظف   ----</option>
                                                                    @foreach ($staffs as $staff)
                                                                    <option  value="{{$staff->id}}">{{ $staff->name}}</option>
                                                                    @endforeach
                                                                  </select>
                                                                  @error('staff_id')
                                                                  <span class="text-danger">{{$message}}</span>
                                                                @enderror

                                                            </td>
                                                            <td colspan="2">
                                                                <select name="job_id" id="job_id">
                                                                    <option  selected  disabled >-- يرجي تحديد الوظيفة   ----</option>
                                                                    @foreach ($jobs as $job )
                                                                    <option  value="{{$job->id}}">{{ $job->name_job }}</option>
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
                                                                    <option  selected  disabled >-- يرجي تحديد الادارة   ----</option>
                                                                    @foreach ($administrations as $administration )
                                                                    <option  value="{{$administration->id}}">{{ $administration->name_administration }}</option>
                                                                    @endforeach
                                                                  </select>
                                                                  @error('administration_id')
                                                                  <span class="text-danger">{{$message}}</span>
                                                                @enderror

                                                            </td>
                                                            <td>
                                                                <select name="section_id" id="section_id">
                                                                    <option  selected  disabled >-- يرجي تحديد القسم   ----</option>
                                                                    @foreach ($sections as $section )
                                                                    <option  value="{{$section->id}}">{{ $section->name}}</option>
                                                                    @endforeach
                                                                  </select>
                                                                  @error('section_id')
                                                                  <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td><input type="date" name="date_of_being_hired">
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
                                                            <td><input name="direct_admin_name" type="text">
                                                                @error('direct_admin_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                            </td>
                                                            <td colspan="2"><input type="date" name="performance_appraisal_date">
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
                                                                    <input type="radio" value="10" name="maintain_working_hours"
                                                                    {{ old('maintain_working_hours') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="maintain_working_hours"
                                                                    {{ old('maintain_working_hours') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="maintain_working_hours"
                                                                    {{ old('maintain_working_hours') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="maintain_working_hours"
                                                                    {{ old('maintain_working_hours') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="maintain_working_hours"
                                                                        {{ old('maintain_working_hours') == "2" ? "checked" : "" }}>
                                                                    </td>
                                                                        @error('maintain_working_hours')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                      @enderror
                                                            </tr>
                                                            <tr>
                                                                <th>2</th>
                                                                <td>جودة انتاجية الاداء</td>
                                                                <td>
                                                                    <input type="radio" value="10" name="good_productivity_performance"
                                                                    {{ old('good_productivity_performance') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="good_productivity_performance"
                                                                    {{ old('good_productivity_performance') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="good_productivity_performance"
                                                                    {{ old('good_productivity_performance') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="good_productivity_performance"
                                                                    {{ old('good_productivity_performance') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="good_productivity_performance"
                                                                        {{ old('good_productivity_performance') == "2" ? "checked" : "" }}>
                                                                    </td>
                                                                @error('good_productivity_performance')
                                                                <span class="text-danger">{{$message}}</span>
                                                              @enderror
                                                            </tr>
                                                            <tr>
                                                                <th>3</th>
                                                                <td>كمية الانتاج</td>
                                                                <td>
                                                                    <input type="radio" value="10" name="production_quantity"
                                                                    {{ old('production_quantity') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="production_quantity"
                                                                    {{ old('production_quantity') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="production_quantity"
                                                                    {{ old('production_quantity') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="production_quantity"
                                                                    {{ old('production_quantity') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="production_quantity"
                                                                        {{ old('production_quantity') == "2" ? "checked" : "" }}>
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
                                                                    {{ old('learning_ability') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="learning_ability"
                                                                    {{ old('learning_ability') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="learning_ability"
                                                                    {{ old('learning_ability') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="learning_ability"
                                                                    {{ old('production_quantity') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="learning_ability"
                                                                        {{ old('learning_ability') == "2" ? "checked" : "" }}>
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
                                                                    {{ old('work_progress') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="work_progress"
                                                                    {{ old('work_progress') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="work_progress"
                                                                    {{ old('work_progress') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="work_progress"
                                                                    {{ old('work_progress') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="work_progress"
                                                                        {{ old('work_progress') == "2" ? "checked" : "" }}>
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
                                                                    {{ old('adhere_to_the_directives_instructions') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="adhere_to_the_directives_instructions"
                                                                    {{ old('adhere_to_the_directives_instructions') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="adhere_to_the_directives_instructions"
                                                                    {{ old('adhere_to_the_directives_instructions') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="adhere_to_the_directives_instructions"
                                                                    {{ old('adhere_to_the_directives_instructions') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="adhere_to_the_directives_instructions"
                                                                        {{ old('adhere_to_the_directives_instructions') == "2" ? "checked" : "" }}>
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
                                                                    {{ old('initiative_and_quick_wit') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="initiative_and_quick_wit"
                                                                    {{ old('initiative_and_quick_wit') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="initiative_and_quick_wit"
                                                                    {{ old('initiative_and_quick_wit') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="initiative_and_quick_wit"
                                                                    {{ old('initiative_and_quick_wit') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="initiative_and_quick_wit"
                                                                        {{ old('initiative_and_quick_wit') == "2" ? "checked" : "" }}>
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
                                                                    {{ old('relationship_with_colleagues') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="relationship_with_colleagues"
                                                                    {{ old('relationship_with_colleagues') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="relationship_with_colleagues"
                                                                    {{ old('relationship_with_colleagues') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="relationship_with_colleagues"
                                                                    {{ old('relationship_with_colleagues') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="relationship_with_colleagues"
                                                                        {{ old('relationship_with_colleagues') == "2" ? "checked" : "" }}>
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
                                                                    {{ old('ability_to_organize_work') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="ability_to_organize_work"
                                                                    {{ old('ability_to_organize_work') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="ability_to_organize_work"
                                                                    {{ old('ability_to_organize_work') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="ability_to_organize_work"
                                                                    {{ old('ability_to_organize_work') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="ability_to_organize_work"
                                                                        {{ old('ability_to_organize_work') == "2" ? "checked" : "" }}>
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
                                                                    {{ old('take_advantage_of_working_time') == "10" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="8" name="take_advantage_of_working_time"
                                                                    {{ old('take_advantage_of_working_time') == "8" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="6" name="take_advantage_of_working_time"
                                                                    {{ old('take_advantage_of_working_time') == "6" ? "checked" : "" }}>
                                                                </td>
                                                                <td>
                                                                    <input type="radio" value="4" name="take_advantage_of_working_time"
                                                                    {{ old('take_advantage_of_working_time') == "4" ? "checked" : "" }}>
                                                                </td>
                                                                    <td>
                                                                        <input type="radio" value="2" name="take_advantage_of_working_time"
                                                                        {{ old('take_advantage_of_working_time') == "2" ? "checked" : "" }}>
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
                                                            {{ old('direct_administrators_recommendation') == "تثبيت" ? "checked" : "" }}> <label for="">تثبيت</label>
                                                        </div>
                                                        <div style="width: 33%;">
                                                            2. <input type="radio" value="تمديد فترة التجربة" name="direct_administrators_recommendation"> <label
                                                            {{ old('direct_administrators_recommendation') == "تمديد فترة التجربة" ? "checked" : "" }}
                                                            for="">تمديد فترة التجربة</label>
                                                        </div>
                                                        <div style="width: 33%;">
                                                            3. <input type="radio" value="الاستغناء عن الخدمة" name="direct_administrators_recommendation"
                                                            {{ old('direct_administrators_recommendation') == "الاستغناء عن الخدمة" ? "checked" : "" }}
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
                                                            <textarea rows="5" name="notes" style="width: 100%;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mt-4" style="display: flex">
                                                <button class="btn btn-primary" type="submit">اضافه</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button class="btn btn-primary" type="button">Save</button>
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/UnderTheScabies/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/UnderTheScabies/pdf',$inputs)}}" style="text-decoration:none;color:white;">
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
                                        <form role="form" id="form" action="{{url(route('admin/UnderTheScabies/index'))}}" class="" >
                                            <input name="_method" type="hidden">
                                            {{ csrf_field() }}

                                            @include('admin.UnderTheScabies.inputsCheck')

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
                    <!-- end poper add admin -->
                    @isset($UnderTheScabies)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table  class="display" id="basic-1">

                                <thead>
                                    <tr>
                                       @include('admin.UnderTheScabies.headertable')
                                        <th>العمليات</th>

                                    </tr>
                                </thead>
                                <tbody id="jobRecords">
                                @foreach($UnderTheScabies as $UnderTheScabie)

                                        <tr>
                                           @include('admin.UnderTheScabies.foreachdata')
                                            <td>
                                                <!-- activate row -->
                                                @include('admin.UnderTheScabies.activate')
                                                <!-- end activate row -->

                                                  <!-- edit row -->
                                                   <button class="btn btn-warning btn-xs" type="button">
                                                    <a href="{{route('admin/UnderTheScabies/edit', $UnderTheScabie->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                <!-- delete row -->
                                                @include('admin.UnderTheScabies.delete')
                                                <!-- end delete row -->

                                                <!-- show row -->
                                                <button class="btn btn-primary btn-xs" type="button">
                                                    <a href="{{route('admin/UnderTheScabies/print', $UnderTheScabie->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </button>
                                                <!-- end show row -->
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\UnderTheScabies::notArchive()->count()}}</span> entries
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
        let dataLen = @json($UnderTheScabies);
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
                        url: "{{ route('admin/UnderTheScabies/getMore') }}",
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
                                                            <td>${data[i].urlRouteStaff}</td>
                                                            <td>${data[i].urlRouteJob}</td>
                                                            <td>${data[i].direct_admin_name}</td>
                                                            <td>${data[i].maintain_working_hours}</td>
                                                            <td>${data[i].good_productivity_performance}</td>
                                                            <td>${data[i].production_quantity}</td>
                                                            <td>${data[i].learning_ability}</td>
                                                            <td>${data[i].work_progress}</td>
                                                            <td>${data[i].adhere_to_the_directives_instructions}</td>
                                                            <td>${data[i].initiative_and_quick_wit}</td>
                                                            <td>${data[i].relationship_with_colleagues}</td>
                                                            <td>${data[i].ability_to_organize_work}</td>
                                                            <td>${data[i].take_advantage_of_working_time}</td>
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

                                                                <!-- edit row -->
                                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaledit-${data[i].id}">
                                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                                    </button>
                                                                    <div class="modal fade" id="myModaledit-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">تعديل</h5>
                                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                </div>
                                                                                <div class="modal-body mt-3">
                                                                                    <form class="card" action="${data[i].urlRouteUpdate}" method="post">
                                                                                        @include('flash::message')
                                                                                        @csrf
                                                                                        <div class="digital-add needs-validation">
                                                                                            <div class="form-group">
                                                                                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>  اسم الادارة </label>
                                                                                                <input class="form-control" id="validationCustom01" name="name_job" value="${data[i].name_job}" type="text" required="">
                                                                                                @error('name_job')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                                @enderror
                                                                                            </div>

                                                                                            <div class="form-group mt-4">
                                                                                                <button class="btn btn-primary" type="submit">تعديل</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <!-- end edit row -->

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
                                document.getElementById("jobRecords").innerHTML += records
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
