@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection

@section('css')
    <style>
        .modal-dialog {
            width: 80vw;
            max-width: 80vw;
            direction: rtl;
        }
        .modal__body {
            padding: 10px;
        }
        .modal__body .outer__border {
        border: 5px solid #222;
        padding: 2px;
        margin-bottom: 5px;
        }
        .modal__body .outer__border > div {
        border: 1px solid #222;
        padding: 5px 0;
        }
        .modal__body table {
        width: 100%;
        border-spacing: 0;
        }
        .modal__body table td,
        .modal__body table th {
        border: 1px solid #222;
        padding: 3px 5px;
        font-size: 20px;
        font-weight: 600;
        }
        .modal__body .flex__td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
        }
        .modal__body table input {
        width: 95%;
        margin: auto;
        padding: 5px;
        }
    </style>
    <style>
        body {font-family: Arial;}

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
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
            padding: 5px;
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
    </style>
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
        }
        .flex__td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        table input,
        table textarea {
            width: 100%;
            margin: auto;
            padding: 5px;
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
    </style>
@endsection

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>طلبات التوظيف</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/employees/index'))}}">طلبات التوظيف</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل طلب توظيف</li>
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
                                <h5>تعديل</h5>
                            </div>
                            <div class="card-body">


                                <form class="card" action="{{url(route('admin/employees/update', $employee->id))}}" method="post" enctype="multipart/form-data">
                                    @include('flash::message')
                                    @csrf


                                    <div class="digital-add needs-validation modal__body" style="direction:rtl;">
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

                                                    <img src="{{asset('/admin/assets/images/Logo.png')}}" alt="logo" />
                                                </div>
                                            </div>
                                        </header>
                                        <center>ادارة الموارد البشرية والشؤون الادارية</center>
                                        <h2
                                            style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
                                        >
                                            طلب توظيف
                                        </h2>
                                        <h2
                                            style="
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        font-size: 28px;
        font-weight: 700;
      "
                                        >
                                            Employment addplication
                                        </h2>

                                        <center >
                                            <span style="color: orangered" class="error">{{ ($errors->first('position_applied_of'))?$errors->first('position_applied_of'). ' - ' : '' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('first_name')?$errors->first('first_name')  . '  - ' : '')}} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('father_name'))?$errors->first('father_name'). '  - ' :  ' ' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('grandfather_name'))?$errors->first('grandfather_name'). '  - ' :  ' ' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('family_name'))?$errors->first('family_name'). '  - ' :  ' ' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('birth'))?$errors->first('birth'). '  - ' :  ' ' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('place_of_birth'))?$errors->first('place_of_birth'). '  - ' :  ' ' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('nationality'))?$errors->first('nationality'). '  - ' :  ' ' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('religion'))?$errors->first('religion'). '  - ' :  ' ' }} </span>

                                        </center>

                                        <div class="tab">
                                            <button hidden id="Basic_Datatab" class="tablinks" onclick="openCity(event, 'Basic_Data')">البيانات الاساسيه</button>
                                            <button hidden id="company_Datatab" class="tablinks" onclick="openCity(event, 'company_Data')">بيانات الشركه</button>
                                            <button hidden id="employees_driving_licencetab" class="tablinks" onclick="openCity(event, 'employees_driving_licence')">Last Step</button>
                                            <button hidden id="lasttab" class="tablinks" onclick="openCity(event, 'last')">Last Step</button>
                                        </div>


                                        <div id="Basic_Data" class="tabcontent">

                                        <div class="outer__border">
                                            <div>
                                                <h3
                                                    style="
                                                border-bottom: 2px solid #222;
                                                margin: 0 auto 15px;
                                                width: fit-content;
                                                font-size: 30px;
                                                font-weight: 700;
                                              "
                                                >
                                                    شروط الطلب &nbsp;&nbsp;&nbsp; Conditions of Application
                                                </h3>
                                                <div
                                                    style="
                                                font-weight: 600;
                                                font-size: 20px;
                                                margin-bottom: 10px;
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                              "
                                                >
                                                    <span>1 - يجب الاجابة علي جميع الاسئلة الواردة في هذا الخطاب</span>
                                                    <span dir="ltr"
                                                    >1 - Answer all the questions. Do not leave blank</span
                                                    >
                                                </div>
                                                <div
                                                    style="
                                                font-weight: 600;
                                                font-size: 20px;
                                                margin-bottom: 10px;
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                              "
                                                >
                                                    <span>2 - املا الطلب بخط يدك ولا تستعمل الالة الكاتبة</span>
                                                    <span dir="ltr">2 - Use your handwriting (block letters)</span>
                                                </div>
                                                <div
                                                    style="
                                                font-weight: 600;
                                                font-size: 20px;
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                              "
                                                >
                                                    <span>3 - علي المتقدم لطلب الوظيفة الموافقة علي اجراء فحص طبي</span>
                                                    <span dir="ltr"
                                                    >3 - Applicant must agree to undergo a complete medical
                                                examination</span
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="outer__border">
                                            <div style="padding: 0 0 5px 0">
                                                <div class="flex__td">
                                                    <div style="width: 75%">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <div class="flex__td">
                                                                        <span>الوظيفة المطلوبة</span>
                                                                        <span>Position Applied For</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="flex__td">
                                                                        <span>المدينة المفضلة</span>
                                                                        <span>Favorite city</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                      <textarea
                                                          style="resize: none"
                                                          rows="5"

                                                          name="position_applied_of">{{$employee->position_applied_of}}</textarea>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $cityData=explode(',',$employee->city);
                                                                    ?>
                                                                    <div style="margin: 3px 0"><input value="{{(isset($cityData[0]))?$cityData[0]:''}}" name="city[]" type="text" /></div>
                                                                    <div style="margin: 3px 0"><input value="{{(isset($cityData[1]))?$cityData[1] : ''}}" name="city[]" type="text" /></div>
                                                                    <div style="margin: 3px 0"><input value="{{(isset($cityData[2]))?$cityData[2] : ''}}" name="city[]" type="text" /></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table>
                                                            <tr>
                                                                <th>الاسم الاول First Name</th>
                                                                <th>اسم الاب Father's Name</th>
                                                                <th>اسم الجد Grand father's</th>
                                                                <th>اسم العائلة Family Name</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input value="{{$employee->first_name}}" name="first_name" type="text" /></td>
                                                                <td><input value="{{$employee->father_name}}" name="father_name" type="text" /></td>
                                                                <td><input value="{{$employee->grandfather_name}}" name="grandfather_name" type="text" /></td>
                                                                <td><input value="{{$employee->family_name}}" name="family_name" type="text" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th>تاريخ الميلاد Date of birth</th>
                                                                <th>مكان الميلاد Place of birth</th>
                                                                <th>الجنسية Nationality</th>
                                                                <th>الديانة Religion</th>
                                                            </tr>
                                                            <tr>
                                                                <td><input value="{{$employee->birth}}" name="birth" type="date" /></td>
                                                                <td><input value="{{$employee->place_of_birth}}" name="place_of_birth" type="text" /></td>
                                                                <td><input value="{{$employee->nationality}}" name="nationality" type="text" /></td>
                                                                <td><input value="{{$employee->religion}}" name="religion" type="text" /></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <?php

                                                    if($employee->photo != null ){?>

                                                    <img src="{{asset( $employee->photo)}}" width="20%" height="20%">
<?php } ?>
                                                    <div style="width: 25%; padding: 15px; display: flex; justify-content: center; align-items: center;">
                                                        <div style="border: 1px solid #222; width: 70%; height: 250px; padding: 3px;">
                                                            <div style="border: 5px solid #222; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                                                                <input name="photo" type="file">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table>
                                                    <tr>
                                                        <td style="border-right: 0">
                                                            <div class="flex__td">
                                                                <span>رقم بطاقة الرقم القومي/</span>
                                                                <span dir="ltr">No. of ID /</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>مكان الاصدار</span>
                                                                <span dir="ltr">Place of issue</span>
                                                            </div>
                                                        </td>
                                                        <td style="border-left: 0">
                                                            <div class="flex__td">
                                                                <span>تاريخ الاصدار</span>
                                                                <span dir="ltr">Date of issue</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="{{$employee->card->card_id}}" name="card_id" type="text" />
                                                        </td>
                                                        <td>
                                                            <input value="{{$employee->card->place_of_issue}}" name="place_of_issue" type="text" />
                                                        </td>
                                                        <td>
                                                            <input value="{{$employee->card->date_of_issue}}" name="date_of_issue" type="date" />
                                                        </td>
                                                    </tr>
                                                    {{--                                            <tr>--}}
                                                    {{--                                                <td style="border-right: 0">--}}
                                                    {{--                                                    <div class="flex__td">--}}
                                                    {{--                                                        <span>رقم الجواز للاجانب/</span>--}}
                                                    {{--                                                        <span dir="ltr">No. of Passport /</span>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </td>--}}
                                                    {{--                                                <td>--}}
                                                    {{--                                                    <div class="flex__td">--}}
                                                    {{--                                                        <span>مكان الاصدار</span>--}}
                                                    {{--                                                        <span dir="ltr">Place of issue</span>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </td>--}}
                                                    {{--                                                <td style="border-left: 0">--}}
                                                    {{--                                                    <div class="flex__td">--}}
                                                    {{--                                                        <span>تاريخ الاصدار</span>--}}
                                                    {{--                                                        <span dir="ltr">Date of issue</span>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </td>--}}
                                                    {{--                                            </tr>--}}
                                                    {{--                                            <tr>--}}
                                                    {{--                                                <td>--}}
                                                    {{--                                                    <input name="passport" type="text" />--}}
                                                    {{--                                                </td>--}}
                                                    {{--                                                <td>--}}
                                                    {{--                                                    <input name="place_of_issue" type="text" />--}}
                                                    {{--                                                </td>--}}
                                                    {{--                                                <td>--}}
                                                    {{--                                                    <input name="date_of_issue" type="text" />--}}
                                                    {{--                                                </td>--}}
                                                    {{--                                            </tr>--}}
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>هاتف المنزل</span>
                                                                <span dir="ltr">Home Phone No</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>الموبايل</span>
                                                                <span dir="ltr">Mobile No</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input  value="{{($employee->contact) ? $employee->contact->home_phone : ''}}" name="home_phone" type="text" />
                                                        </td>
                                                        <td>
                                                            <input value="{{($employee->contact) ? $employee->contact->mobile : ''}}" name="mobile" type="text" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>هاتف العمل</span>
                                                                <span dir="ltr">Work Phone No</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>البريد الالكتروني</span>
                                                                <span dir="ltr">E-Mail</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="{{($employee->contact) ?$employee->contact->work_phone : ''}}" name="work_phone" type="text" />
                                                        </td>
                                                        <td>
                                                            <input value="{{($employee->contact) ?$employee->contact->email : ''}}" name="email" type="text" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>العنوان الحالي</span>
                                                                <span dir="ltr">Present Address</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>البريد</span>
                                                                <span dir="ltr">Post</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="{{($employee->contact) ?$employee->contact->present_adderss : ''}}" name="present_adderss" type="text" />
                                                        </td>
                                                        <td>
                                                            <input value="{{($employee->contact) ?$employee->contact->post : ''}}" name="post" type="text" />
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>الحالة الاجتماعية</span>
                                                                <span class="flex__td">
                                                      <div class="flex__td" style="margin: 0 10px">
                                                        <span>متزوج</span>
                                                        <input <?php if($employee->marital_status == 'Married') { echo 'checked';} ?> name="marital_status" value="Married" type="radio" style="width: auto; margin: 0 5px" />
                                                        <span>Married</span>
                                                      </div>
                                                      <div class="flex__td" style="margin: 0 10px">
                                                        <span>اعزب</span>
                                                        <input  <?php if($employee->marital_status == 'Single') { echo 'checked';} ?> name="marital_status" type="radio" value="Single" style="width: auto; margin: 0 5px" />
                                                        <span>Single</span>
                                                      </div>
                                                    </span>
                                                                <span dir="ltr">Marital status</span>
                                                            </div>
                                                            <div class="flex__td">
                                                                <span>هل تعول احدا؟</span>
                                                                <span class="flex__td">
                                                      <div class="flex__td" style="margin: 0 10px">
                                                        <span>نعم</span>
                                                        <input  <?php if($employee->dependents == '1') { echo 'checked';} ?> type="radio" name="dependents" value="1" style="width: auto; margin: 0 5px" />
                                                        <span>YES</span>
                                                      </div>
                                                      <div class="flex__td" style="margin: 0 10px">
                                                        <span>لا</span>
                                                        <input <?php if($employee->dependents == '0') { echo 'checked';} ?> type="radio" name="dependents" value="0" style="width: auto; margin: 0 5px" />
                                                        <span>NO</span>
                                                      </div>
                                                    </span>
                                                                <span dir="ltr">Have you any dependents?</span>
                                                            </div>
                                                            <p style="margin: 0; text-align: center">
                                                                <span>اذا كانت الاجابة "نعم" بين المعلومات التالية</span>
                                                                <span dir="ltr">If answer is "yes" Please state following</span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>الاسم</span>
                                                                <span dir="ltr">Name</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>السن</span>
                                                                <span dir="ltr">Age</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>القرابة</span>
                                                                <span dir="ltr">Relation</span>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="flex__td">
                                                                <span> <input onclick="addRowDependances(this.form);" type="button" value="<?php echo "إضافه"; ?>" class="btn btn-success" /></span>
                                                                <span dir="ltr"><input onclick="addRowDependances(this.form);" type="button" value="<?php echo "Add"; ?>" class="btn btn-success" /></span>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    {{--                                                                                <tr>--}}
                                                    {{--                                                                                    <td>--}}
                                                    {{--                                                                                        <input name="dependents_name[]" type="text" />--}}
                                                    {{--                                                                                    </td>--}}
                                                    {{--                                                                                    <td>--}}
                                                    {{--                                                                                        <input name="dependents_age[]" type="text" />--}}
                                                    {{--                                                                                    </td>--}}
                                                    {{--                                                                                    <td>--}}
                                                    {{--                                                                                        <input name="dependents_relation[]" type="text" />--}}
                                                    {{--                                                                                    </td>--}}

                                                    {{--                                                                                    <td>--}}
                                                    {{--                                                                                        <input name="dependents_address[]" type="text" />--}}
                                                    {{--                                                                                    </td>--}}
                                                    {{--                                                                                    <td>--}}
                                                    {{--                                                                                        <input type="button" value="<?php echo "Remove"; ?>" onclick="removeRowDependances(' + rowNum + ');" class="btn btn-danger" />--}}
                                                    {{--                                                                                    </td>--}}
                                                    {{--                                                                                </tr>--}}

                                                    <tbody id="itemRowsDependances">

                                                    <?php

                                                    foreach ($employee->people_dependents as $depend){
                                                    ?>
                                                    <tr id="dependent_<?php echo  $depend->id;  ?>"><td>
                                                            <input value="{{$depend->name}}" name="dependents_name[]" type="text" />
                                                            </td>
                                                        <td>
                                                            <input  value="{{$depend->age}}" name="dependents_age[]" type="text" />
                                                            </td>
                                                        <td>
                                                            <input  value="{{$depend->relation}}" name="dependents_relation[]" type="text" />
                                                             </td>


                                                        <td>
                                                            <input type="button" value="<?php echo "Remove"; ?>" onclick="removeRowDependancesOld({{$depend->id}});" class="btn btn-danger" />
                                                            </td>
                                                        </tr>
<?php } ?>
                                                    </tbody>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>عنوان اقامته</span>
                                                                <span dir="ltr">Thier residence address</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center">
                                                            <textarea name="dependents_address" style="resize: none" rows="5"><?php echo $depend->address ?></textarea>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
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

                                            <center><button   class="tablinks btn btn-primary" onclick="openCity(event, 'company_Data')">التالي</button></center>
                                        </div>


                                        <div id="company_Data" class="tabcontent">
                                            <div class="outer__border">
                                                <div>
                                                    <h3
                                                        style="
                                                border-bottom: 2px solid #222;
                                                margin: 0 auto 15px;
                                                width: fit-content;
                                                font-size: 30px;
                                                font-weight: 700;
                                              "
                                                    >
                                                        شروط الطلب &nbsp;&nbsp;&nbsp; Conditions of Application
                                                    </h3>
                                                    <div
                                                        style="
                                                font-weight: 600;
                                                font-size: 20px;
                                                margin-bottom: 10px;
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                              "
                                                    >
                                                        <span>1 - يجب الاجابة علي جميع الاسئلة الواردة في هذا الخطاب</span>
                                                        <span dir="ltr"
                                                        >1 - Answer all the questions. Do not leave blank</span
                                                        >
                                                    </div>
                                                    <div
                                                        style="
                                                font-weight: 600;
                                                font-size: 20px;
                                                margin-bottom: 10px;
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                              "
                                                    >
                                                        <span>2 - املا الطلب بخط يدك ولا تستعمل الالة الكاتبة</span>
                                                        <span dir="ltr">2 - Use your handwriting (block letters)</span>
                                                    </div>
                                                    <div
                                                        style="
                                                font-weight: 600;
                                                font-size: 20px;
                                                display: flex;
                                                justify-content: space-between;
                                                align-items: center;
                                              "
                                                    >
                                                        <span>3 - علي المتقدم لطلب الوظيفة الموافقة علي اجراء فحص طبي</span>
                                                        <span dir="ltr"
                                                        >3 - Applicant must agree to undergo a complete medical
                                                examination</span
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="outer__border">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>هل سبق وعملت في تي أم؟</span>
                                                                    <span class="flex__td">
                                              <div class="flex__td" style="margin: 0 10px">
                                                <span>نعم</span>
                                                <input type="radio" <?php if($employee->employed_by_this_company == '1') { echo 'checked';} ?>  name="employed_by_this_company" value="1"style="width: auto; margin: 0 5px" />
                                                <span>YES</span>
                                              </div>
                                              <div class="flex__td" style="margin: 0 10px">
                                                <span>لا</span>
                                                <input type="radio" <?php if($employee->employed_by_this_company == '0') { echo 'checked';} ?> name="employed_by_this_company" value="0" style="width: auto; margin: 0 5px" />
                                                <span>NO</span>
                                              </div>
                                            </span>
                                                                    <span dir="ltr">Were you employed by this Company before?</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>متي تستطيع مباشرة العمل؟</span>
                                                                    <span><input  value="{{$employee->start_working}}" name="start_working" type="text" style="width: 200px" /></span>
                                                                    <span dir="ltr">When can you start working?</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>هل تعمل حاليا؟</span>
                                                                    <span class="flex__td">
                                              <div class="flex__td" style="margin: 0 10px">
                                                <span>نعم</span>
                                                <input type="radio" <?php if($employee->employed_now == '1') { echo 'checked';} ?> name="employed_now" value="1" style="width: auto; margin: 0 5px" />
                                                <span>YES</span>
                                              </div>
                                              <div class="flex__td" style="margin: 0 10px">
                                                <span>لا</span>
                                                <input type="radio" <?php if($employee->employed_now == '0') { echo 'checked';} ?> name="employed_now" value="0" style="width: auto; margin: 0 5px" />
                                                <span>NO</span>
                                              </div>
                                            </span>
                                                                    <span dir="ltr">Are you employed now?</span>
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
                                                            <thead>
                                                            <h2 style="margin: 0">
                                                                <span>الاعمال التي مارستها سابقا</span>
                                                                <span>Your Previous employment record</span>


                                                            </h2>
                                                            </thead>
                                                            <div class="flex__td">
                                                                <span> <input onclick="addRowcompany_row(this.form);" type="button" value="<?php echo "إضافه"; ?>" class="btn btn-success" /></span>
                                                                {{--                                                            <span dir="ltr"><input onclick="addRowDependances(this.form);" type="button" value="<?php echo "Add"; ?>" class="btn btn-success" /></span>--}}
                                                            </div>
                                                        </tr>
                                                        <tbody id="itemCompany_row">


                                                        <?php foreach ($employee->company_privious as $company ) {?>

                                                        <tr id="company_rowNum<?php echo $company->id ;?>">
                                                            <td>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removecompany_rowOld(<?php echo $company->id ;?>);" class="btn btn-danger" /></td>
                                                              <td> <div class="flex__td">             <span> <div class="flex__td"> <span>من</span><span><input value="{{$company->from}}" name="company_from[]" type="date" style="width: auto" /></span><span>from</span></div></span><span><div class="flex__td"><span>الي</span><span><input  value="{{$company->to}}"  name="company_to[]" type="date" style="width: auto" /></span><span>To</span></div></span></div></td><td><div class="flex__td"><span>مسمي الوظيفة</span><span><input  value="{{$company->job_title}}"  name="company_job_title[]" type="text" style="width: auto" /></span><span dir="ltr"> Job title </span></div></td><td><div class="flex__td"><span>الراتب</span><span><input  value="{{$company->salary}}"  name="company_salary[]" type="text" style="width: auto" /></span><span dir="ltr">Salary</span></div><div class="flex__td"><span>البدلات</span><span><input  value="{{$company->allowance}}"  name="company_allowance[]" type="text" style="width: auto" /></span><span dir="ltr">Allowance</span></div></td></tr>
                                                        <tr id="company_rowNum1<?php echo $company->id ;?>"><td><div class="flex__td" style="flex-wrap: wrap"><span>اسم الشركة/صاحب العمل</span><span dir="ltr">Name of co/org</span><span style="width: 100%"> <input  value="{{$company->name_of_org}}" name="company_name_of_org[]" type="text" /></span></div><div class="flex__td" style="flex-wrap: wrap"><span>الهاتف </span><span dir="ltr">Telephone No</span><span style="width: 100%"><input  value="{{$company->telephone}}"  name="company_telephone[]" type="text" /></span></div><div class="flex__td" style="flex-wrap: wrap"><span>العنوان</span><span dir="ltr">Address</span><span style="width: 100%"><input  value="{{$company->address}}"  name="company_address[]" type="text" /></span></div></td><td><div class="flex__td" style="flex-wrap: wrap"><span>تفاصيل عن واجباتك</span><span dir="ltr">Description of your duties</span><span style="width: 100%; text-align: center"><textarea name="company_description[]" style="width: 95%" rows="10"><?php echo $company->description  ;?></textarea></span></div></td><td><div class="flex__td" style="flex-wrap: wrap"><span>سبب ترك العمل</span><span dir="ltr">Reason for Quit</span><span style="width: 100%; text-align: center"><textarea name="company_reason_for_quit[]" style="width: 95%" rows="10"><?php echo $company->reason_for_quit ;?></textarea></span></div></td></tr>
                                                        </tr>
                                                        <?php } ?>

                                                        </tbody>



                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>رقم التامينات</span>
                                                                    <span><input  value="{{$employee->G_O_S_I_O_available}}"  name="G_O_S_I_O_available" type="text" style="width: 300px" /></span>
                                                                    <span dir="ltr">G. O. S. I. No. Avaliable</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الراتب الادني المطلوب</span>
                                                                    <span><input  value="{{$employee->minimum_salary_required}}"  name="minimum_salary_required" type="text" style="width: 300px" /></span>
                                                                    <span dir="ltr">Minimum salary required</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
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
                                            <center> &nbsp;
                                                <button   class="tablinks btn btn-primary" onclick="openCity(event, 'Basic_Data')">السابق</button>


                                                &nbsp;
                                                <button   class="tablinks btn btn-primary" onclick="openCity(event, 'employees_driving_licence')">التالي</button>
                                            </center>
                                        </div>

                                        <div id="employees_driving_licence" class="tabcontent">



                                            {{--                                <p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p>--}}
                                            <div class="outer__border">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td colspan="2" style="border-right: 0; border-left: 0">
                                                                <div class="flex__td" style="justify-content: space-around">
                                                                    <span>رخصة القيادة</span>
                                                                    <span>DRIVING LICENCE</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-right: 0">
                                                                <div class="flex__td">
                                                                    <span>نوعها</span>
                                                                    <span><input  value="{{(isset($employee->driving))?$employee->driving->category : ''}}"  name="licence_category" type="text" /></span>
                                                                    <span dir="ltr">Category</span>
                                                                </div>
                                                            </td>
                                                            <td style="border-left: 0">
                                                                <div class="flex__td">
                                                                    <span>رقمها</span>
                                                                    <span><input value="{{(isset($employee->driving))?$employee->driving->number : ''}}"  name="licence_number" type="text" /></span>
                                                                    <span dir="ltr">Number</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-right: 0">
                                                                <div class="flex__td">
                                                                    <span>تاريخ صدورها</span>
                                                                    <span><input value="{{(isset($employee->driving))?$employee->driving->date_of_issue : ''}}"  name="licence_date_of_issue" type="text" /></span>
                                                                    <span dir="ltr">Date of issue</span>
                                                                </div>
                                                            </td>
                                                            <td style="border-left: 0">
                                                                <div class="flex__td">
                                                                    <span>تاريخ انتهائها</span>
                                                                    <span><input value="{{(isset($employee->driving))?$employee->driving->expiry_date : ''}}"  name="licence_expiry_date" type="text" /></span>
                                                                    <span dir="ltr">Expiry date</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-right: 0">
                                                                <div class="flex__td">
                                                                    <span>مكان الاصدار</span>
                                                                    <span><input value="{{(isset($employee->driving))?$employee->driving->place_of_issue : ''}}"  name="licence_place_of_issue" type="text" /></span>
                                                                    <span dir="ltr">Place of issue</span>
                                                                </div>
                                                            </td>
                                                            <td style="border-left: 0">
                                                                <div class="flex__td">
                                                                    <span>فصيلة الدم</span>
                                                                    <span><input value="{{(isset($employee->driving))?$employee->driving->blood_group : ''}}"  name="licence_blood_group" type="text" /></span>
                                                                    <span dir="ltr">Blood group</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>هل صدرت بحقك احكام قضائية؟</span>
                                                                    <span class="flex__td">
                  <div class="flex__td" style="margin: 0 10px">
                    <span>نعم</span>
                    <input type="radio" <?php if($employee->judicial_ruling == '1') { echo 'checked';} ?> name="judicial_ruling" value="1" style="width: auto; margin: 0 5px" />
                    <span>YES</span>
                  </div>
                  <div class="flex__td" style="margin: 0 10px">
                    <span>لا</span>
                    <input type="radio" <?php if($employee->judicial_ruling == '0') { echo 'checked';} ?> name="judicial_ruling" value="0" style="width: auto; margin: 0 5px" />
                    <span>NO</span>
                  </div>
                </span>
                                                                    <span dir="ltr">Have you ever been convicted?</span>
                                                                </div>
                                                                <div class="flex__td" style="flex-wrap: wrap">
                                                                    <span>في حال الاجابة بنعم يرجي بينا التفاصيل</span>
                                                                    <span>If answer is "yes" please give details</span>
                                                                    <span style="width: 100%; text-align: center">
                  <textarea name="reason_judicial_ruling"
                            style="width: 98%; resize: none"
                            rows="10"
                  ><?php  echo $employee->reason_judicial_ruling; ?></textarea>
                </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th rowspan="2">
                                                                <span>التحصيل العلمي</span><br />
                                                                <span>Education</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>اسم المدرسة/الجامعة</span><br />
                                                                <span>Name of school/University</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>المدينة / البلد</span><br />
                                                                <span>City / Count</span>
                                                            </th>
                                                            <th colspan="2">
                                                                <span>مدة الدراسة</span><br />
                                                                <span>Duration of study</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>التخصص</span><br />
                                                                <span>Specialize</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>الدرجة</span><br />
                                                                <span>Grade</span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>من تاريخ</span>
                                                                    <span>From</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الي</span>
                                                                    <span>To</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <input value="{{(isset($employee->educations))?$employee->educations[0]->stage_id : ''}}"  name="education_stage_id[]" value="1" type="hidden" />
                                                                <span>ابتدائي</span><br />
                                                                <span>Elementary</span>
                                                            </th>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[0]->place_name : ''}}" name="education_place_name[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[0]->city : ''}}" name="education_city[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[0]->from : ''}}" name="education_from[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[0]->to : ''}}" name="education_to[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[0]->specialize : ''}}" name="education_specialize[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[0]->grade : ''}}" name="education_grade[]" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <input value="{{(isset($employee->educations))?$employee->educations[1]->stage_id : ''}}" name="education_stage_id[]" value="2" type="hidden" />
                                                                <span>اعدادي</span><br />
                                                                <span>Intermediate</span>
                                                            </th>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[1]->place_name : ''}}" name="education_place_name[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[1]->city : ''}}" name="education_city[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[1]->from : ''}}" name="education_from[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[1]->to : ''}}" name="education_to[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[1]->specialize : ''}}" name="education_specialize[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[1]->grade : ''}}" name="education_grade[]" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <input value="{{(isset($employee->educations))?$employee->educations[2]->stage_id : ''}}" name="education_stage_id[]" value="3" type="hidden" />
                                                                <span>ثانوي</span><br />
                                                                <span>Secondary</span>
                                                            </th>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[2]->place_name : ''}}" name="education_place_name[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[2]->city : ''}}" name="education_city[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[2]->from : ''}}" name="education_from[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[2]->to : ''}}" name="education_to[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[2]->specialize : ''}}" name="education_specialize[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[2]->grade : ''}}" name="education_grade[]" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <input value="{{(isset($employee->educations))?$employee->educations[3]->stage_id : ''}}" name="education_stage_id[]" value="4" type="hidden" />
                                                                <span>دبلوم بعد الثانوية</span><br />
                                                                <span>High diploma</span>
                                                            </th>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[3]->place_name : ''}}" name="education_place_name[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[3]->city : ''}}" name="education_city[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[3]->from : ''}}" name="education_from[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[3]->to : ''}}" name="education_to[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[3]->specialize : ''}}" name="education_specialize[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[3]->grade : ''}}" name="education_grade[]" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <input value="{{(isset($employee->educations))?$employee->educations[4]->stage_id : ''}}" name="education_stage_id[]" value="5" type="hidden" />
                                                                <span>الجامعة</span><br />
                                                                <span>University</span>
                                                            </th>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[4]->place_name : ''}}" name="education_place_name[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[4]->city : ''}}" name="education_city[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[4]->from : ''}}" name="education_from[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[4]->to : ''}}" name="education_to[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[4]->specialize : ''}}" name="education_specialize[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[4]->grade : ''}}" name="education_grade[]" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <input value="{{(isset($employee->educations))?$employee->educations[5]->stage_id : ''}}" name="education_stage_id[]" value="6" type="hidden" />
                                                                <span>دراسات عليا</span><br />
                                                                <span>Pos gradute studies</span>
                                                            </th>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[5]->place_name : ''}}" name="education_place_name[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[5]->city : ''}}" name="education_city[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[5]->from : ''}}" name="education_from[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[5]->to : ''}}" name="education_to[]" type="date" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[5]->specialize : ''}}" name="education_specialize[]" type="text" /></td>
                                                            <td><input value="{{(isset($employee->educations))?$employee->educations[5]->grade : ''}}" name="education_grade[]" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <span> <input onclick="addRowcourse_row(this.form);" type="button" value="<?php echo "إضافه"; ?>" class="btn btn-success" /></span>

                                                            </th>
                                                            <th>
                                                                <span>الدورات التدريبية</span><br />
                                                                <span>Training Courses</span>
                                                            </th>
                                                            <th>
                                                                <span>اسم المعهد</span><br />
                                                                <span>Name of institute</span>
                                                            </th>
                                                            <th>
                                                                <span>المدينة / البلد</span><br />
                                                                <span>City / Country</span>
                                                            </th>
                                                            <th>
                                                                <span>من تاريخ</span><br />
                                                                <span>From</span>
                                                            </th>
                                                            <th>
                                                                <span>الي</span><br />
                                                                <span>To</span>
                                                            </th>
                                                            <th colspan="2">
                                                                <span>التخصص</span><br />
                                                                <span>Specialize</span>
                                                            </th>

                                                        </tr>

                                                        <tbody id="itemcourse_row">

                                                        <?php  foreach ($employee->trining_courses as $course){  ?>
                                                        <tr id="course_rowNum<?php echo $course->id ;?>"><td>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removecourse_rowOld(<?php echo $course->id ;?>);" class="btn btn-danger" /></td>
                                                            <td><input value="{{$course->name}}" name="course_name[]" type="text" /></td> <td><input value="{{$course->name_of_institute}}" name="course_name_of_institute[]" type="text" /></td><td><input value="{{$course->city}}" name="course_city[]" type="text" /></td><td><input value="{{$course->from}}" name="course_from[]" type="date" /></td><td><input value="{{$course->to}}" name="course_to[]" type="date" /></td><td colspan="2"><input value="{{$course->specialize}}" name="course_specialize[]" type="text" /></td></tr>

                                                      <?php } ?>
                                                        </tbody>


                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th rowspan="2">
                                                                <span>معرفة اللغات</span><br />
                                                                <span> <input onclick="addRowlanguage_row(this.form);" type="button" value="<?php echo "إضافه"; ?>" class="btn btn-success" /></span>
                                                                <span>Knowledge of languages</span>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="flex__td">
                                                                    <span>التحدث</span>
                                                                    <span>Speaking</span>
                                                                </div>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="flex__td">
                                                                    <span>القراءة</span>
                                                                    <span>Reading</span>
                                                                </div>
                                                            </th>
                                                            <th colspan="3">
                                                                <div class="flex__td">
                                                                    <span>الكتابة</span>
                                                                    <span>Writing</span>
                                                                </div>
                                                             <th rowspan="2">
                                                                <span>سرعة الطباعة</span><br />
                                                                <span style="text-transform: uppercase">Typing speed</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>مهارات اخري</span><br />
                                                                <span style="text-transform: uppercase">Other skills</span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <span>ممتاز</span><br />
                                                                <span>EX</span>
                                                            </th>
                                                            <th>
                                                                <span>جيد</span><br />
                                                                <span>G</span>
                                                            </th>
                                                            <th>
                                                                <span>حسن</span><br />
                                                                <span>F</span>
                                                            </th>
                                                            <th>
                                                                <span>ممتاز</span><br />
                                                                <span>EX</span>
                                                            </th>
                                                            <th>
                                                                <span>جيد</span><br />
                                                                <span>G</span>
                                                            </th>
                                                            <th>
                                                                <span>حسن</span><br />
                                                                <span>F</span>
                                                            </th>
                                                            <th>
                                                                <span>ممتاز</span><br />
                                                                <span>EX</span>
                                                            </th>
                                                            <th>
                                                                <span>جيد</span><br />
                                                                <span>G</span>
                                                            </th>
                                                            <th>
                                                                <span>حسن</span><br />
                                                                <span>F</span>
                                                            </th>
                                                        </tr>

                                                        <?php

                                                        $count=0;
                                                        foreach ($employee->languages as $language){  ?>

                                                        <tr id="langRow<?php echo $language->id;?>">
                                                            <th>
                                                                <input name="language_name[]" value="{{$language->name}}" type="hidden" />
                                                                <div class="flex__td">
                                                                    <span style="text-align: center">{{$language->name}}</span>
<?php if($count >1){?>

                                                                    <input type="button" value="<?php echo "Remove"; ?>" onclick="removelanguage_rowOLd(<?php echo $language->id ; ?>);" class="btn btn-danger" />
                                                                <?php }  ?>                                                                </div>
                                                            </th>
                                                            <td>
                                                                <input value="{{$language->speaking_ex}}" name="language_speaking_ex[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->speaking_g}}" name="language_speaking_g[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->speaking_f}}" name="language_speaking_f[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->reading_ex}}" name="language_reading_ex[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->reading_g}}" name="language_reading_g[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->reading_f}}" name="language_reading_f[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->writing_ex}}" name="language_writing_ex[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->writing_g}}" name="language_writing_g[]" type="text" />
                                                            </td>
                                                            <td>

                                                                <input value="{{$language->writing_f}}" name="language_writing_f[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->typing_speed}}" name="language_typing_speed[]" type="text" />
                                                            </td>
                                                            <td>
                                                                <input value="{{$language->other_skills}}" name="language_other_skills[]" type="text" />
                                                            </td>
                                                        </tr>

                                                        <?php  $count++;
                                                        } ?>

                                                        <tbody id="itemlanguage_row">

                                                        </tbody>
                                                        </table>
                                                </div>
                                            </div>
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

                                            <center> &nbsp;
                                                <button   class="tablinks btn btn-primary" onclick="openCity(event, 'company_Data')">السابق</button>


                                                &nbsp;
                                                <button   class="tablinks btn btn-primary" onclick="openCity(event, 'last')">التالي</button>
                                            </center>
                                        </div>
                                        <div id="last" class="tabcontent"><div class="outer__border">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>كيف عرفت عن فرصة العمل؟</span>
                                                                    <span style="width: 40%"><input value="{{$employee->get_to_know_the_job}}" name="get_to_know_the_job" type="text" /></span>
                                                                    <span>How did you came to know about the job?</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td" style="flex-wrap: wrap">
                                                                    <span>هل لديك اقارب يعملون في شركتنا ؟ (اذكرهم)</span>
                                                                    <span
                                                                    >Do you have any relatives employed our company?
                  (Specify)</span
                                                                    >
                                                                    <span style="width: 100%; text-align: center">
                  <textarea name="employees_relatives_employed_name" style="resize: none" rows="5"><?php if (count($employee->relatives_employed) > 0){  echo $employee->relatives_employed[0]->name; }?></textarea>
                </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="flex__td">
                                                                    <span>المعرفون : اذكر ثلاتة اشخاص (من غير الاقارب)</span>
                                                                    <span>References : List 3 persons (not relatives)</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>الاسم . Name</th>
                                                            <th>الوظيفة . Position</th>
                                                            <th>الشركة . Company</th>
                                                            <th>الهاتف . TEL</th>
                                                            <th>العنوان . Address</th>
                                                        </tr>

                                                        <tr>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>0) ? $employee->not_relatives_employed[0]->name : ''}}"  name="employees_not_relatives_name[]" type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>0) ?$employee->not_relatives_employed[0]->position : ''}}" name="employees_not_relatives_position[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>0) ?$employee->not_relatives_employed[0]->company : ''}}" name="employees_not_relatives_company[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>0) ?$employee->not_relatives_employed[0]->telephone : ''}}" name="employees_not_relatives_telephone[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>0) ?$employee->not_relatives_employed[0]->address : ''}}" name="employees_not_relatives_address[]"  type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->name : ''}}" name="employees_not_relatives_name[]" type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->position : ''}}" name="employees_not_relatives_position[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->company : ''}}" name="employees_not_relatives_company[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->telephone : ''}}"  name="employees_not_relatives_telephone[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->address : ''}}"  name="employees_not_relatives_address[]"  type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->name : ''}}" name="employees_not_relatives_name[]" type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->position : ''}}" name="employees_not_relatives_position[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->company : ''}}" name="employees_not_relatives_company[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->telephone : ''}}"  name="employees_not_relatives_telephone[]"  type="text" /></td>
                                                            <td><input value="{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->address : ''}}"  name="employees_not_relatives_address[]"  type="text" /></td>
                                                        </tr>


                                                        <tr>
                                                            <td colspan="5">
                                                                <div class="flex__td" style="flex-wrap: wrap">
                                                                    <span>هل هناك معلومات اخري تود اضافتها؟</span>
                                                                    <span>Other data which may be of interest</span>
                                                                    <span style="width: 100%; text-align: center">
                  <textarea name="other_data" style="resize: none" rows="5"><?php  echo $employee->other_data; ?></textarea>
                </span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td style="width: 45%">
                                                                اشهد ان كافة المعلومات الانفة الذكر حسب معرفتي واعتقادي هي صحيحة
                                                                وكاملة واوافق علي ان تتحققوا من صحتها واي معلومات غير صحيحة ستكون
                                                                سببا كافيا لمسالتي
                                                            </td>
                                                            <td style="width: 55%" dir="ltr">
                                                                I Hereby certify all the foregoing information is to the best of
                                                                my knowledge and belief, correct and complete and I authorize you
                                                                to verify it. Any false or omitted information will be sufficient
                                                                cause for my responsibility.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                ملاحظة: يجب ارفاق نسخ من الشهادات الدراسية وشهادات الخبرات العلمية
                                                                وليس الشهادات الاصلية
                                                            </td>
                                                            <td dir="ltr">
                                                                Ps. Copies, and not originals of educational and experience
                                                                certificates must be enclosed
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="flex__td">
                                                                    <span>الاسم</span>
                                                                    <span style="width: 75%"><input value="{{(isset($employee->skill))?$employee->skill->skills : ''}}"  name="employee_skills" type="text" /></span>
                                                                    <span>Name</span>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    </table>
                                                                                         </div>
                                            </div>
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
                                            <center> &nbsp;
                                                <button   class="tablinks btn btn-primary" onclick="openCity(event, 'employees_driving_licence')">السابق</button>


                                                &nbsp;
                                                {{--                                    <div class="text-center form-group mt-4">--}}
{{--                                                <div class="form-group mt-4">--}}
                                                     <button class="btn btn-primary" type="submit">تعديل</button>
{{--                                                </div>                                                --}}{{--                                    </div> --}}
                                            </center>

                                        </div>



                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Container-fluid Ends-->
<script type="text/javascript">
    $( document ).ready(function() {
        $('#Basic_Datatab').click();
    });
    var rowNum = 1;

    function addRowDependances(frm) {
        rowNum++;
        var row = '<tr id="rowNum' + rowNum + '">' +'<td>'+
            '<input name="dependents_name[]" type="text" />'+
            '</td>'+
            '<td>'+
            '<input name="dependents_age[]" type="text" />'+
            '</td>'+
            '<td>'+
            '<input name="dependents_relation[]" type="text" />'+
            ' </td>'+


            '<td>'+
            '<input type="button" value="<?php echo "Remove"; ?>" onclick="removeRowDependances(' + rowNum + ');" class="btn btn-danger" />'+
            '</td>'
        '</tr>';
        jQuery('#itemRowsDependances').append(row);
    }

    function removeRowDependances(rnum) {
        jQuery('#rowNum' + rnum).remove();
    }
    function removeRowDependancesOld(dependId) {
        var _token = $('input[name="_token"]').val();

        var r = confirm("هل انت متاكد من حذف هذه البيانات ؟");
        if (r == true) {
            $.ajax({
                url: "{{ route('admin/employees/dependents/deletedependents') }}",
                method: "POST",
                data: {id: dependId,
                    _token: _token
                },
                success: function(data) {
                    if (data=='deleted'){
                        $('#dependent_'+dependId).remove();
                    }
                    console.log(data)
                    console.log('------0000------')
                }
            })        }





    }

</script>
<script type="text/javascript">
    var company_rowNum = 1;

    function addRowcompany_row(frm) {
        company_rowNum++;
        var row = '<tr id="company_rowNum' + company_rowNum + '">' +'<td>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removecompany_row(' + company_rowNum + ');" class="btn btn-danger" /></td>'+
            '  <td> <div class="flex__td">             <span> <div class="flex__td"> <span>من</span><span><input name="company_from[]" type="date" style="width: auto" /></span><span>from</span></div></span><span><div class="flex__td"><span>الي</span><span><input name="company_to[]" type="date" style="width: auto" /></span><span>To</span></div></span></div></td><td><div class="flex__td"><span>مسمي الوظيفة</span><span><input name="company_job_title[]" type="text" style="width: auto" /></span><span dir="ltr"> Job title </span></div></td><td><div class="flex__td"><span>الراتب</span><span><input name="company_salary[]" type="text" style="width: auto" /></span><span dir="ltr">Salary</span></div><div class="flex__td"><span>البدلات</span><span><input name="company_allowance[]" type="text" style="width: auto" /></span><span dir="ltr">Allowance</span></div></td></tr><tr id="company_rowNum1' + company_rowNum + '"><td><div class="flex__td" style="flex-wrap: wrap"><span>اسم الشركة/صاحب العمل</span><span dir="ltr">Name of co/org</span><span style="width: 100%"> <input name="company_name_of_org[]" type="text" /></span></div><div class="flex__td" style="flex-wrap: wrap"><span>الهاتف </span><span dir="ltr">Telephone No</span><span style="width: 100%"><input name="company_telephone[]" type="text" /></span></div><div class="flex__td" style="flex-wrap: wrap"><span>العنوان</span><span dir="ltr">Address</span><span style="width: 100%"><input name="company_address[]" type="text" /></span></div></td><td><div class="flex__td" style="flex-wrap: wrap"><span>تفاصيل عن واجباتك</span><span dir="ltr">Description of your duties</span><span style="width: 100%; text-align: center"><textarea name="company_description[]" style="width: 95%" rows="10"></textarea></span></div></td><td><div class="flex__td" style="flex-wrap: wrap"><span>سبب ترك العمل</span><span dir="ltr">Reason for Quit</span><span style="width: 100%; text-align: center"><textarea name="company_reason_for_quit[]" style="width: 95%" rows="10"></textarea></span></div></td></tr>'
        '</tr>';
        jQuery('#itemCompany_row').append(row);
    }

    function removecompany_row(rnum) {
        // alert(rnum)
        jQuery('#company_rowNum' + rnum).remove();
        jQuery('#company_rowNum1' + rnum).remove();
    }
    function removecompany_rowOld(companyId) {
        // alert(companyId)
        var _token = $('input[name="_token"]').val();

        var r = confirm("هل انت متاكد من حذف هذه البيانات ؟");
        if (r == true) {
            $.ajax({
                url: "{{ route('admin/employees/company_previous/deletecompany_previous') }}",
                method: "POST",
                data: {id: companyId,
                    _token: _token
                },
                success: function(data) {
                    if (data=='deleted'){
                        $('#company_rowNum'+companyId).remove();
                        $('#company_rowNum1'+companyId).remove();
                    }
                    console.log(data)
                    console.log('------0000------')
                }
            })        }
    }
</script>
<script type="text/javascript">
    var language_rowNum = 1;

    function addRowlanguage_row(frm) {
        language_rowNum++;
        var row = '<tr id="language_rowNum' + language_rowNum + '">' +'<th>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removelanguage_row(' + language_rowNum + ');" class="btn btn-danger" /> <input type="text" placeholder="اسم اللغة" name="language_name[]" > </th><td><input name="language_speaking_ex[]" type="text" /></td><td><input name="language_speaking_g[]" type="text" /></td><td><input name="language_speaking_f[]" type="text" /></td><td><input name="language_reading_ex[]" type="text" /></td><td><input name="language_reading_g[]" type="text" /></td><td><input name="language_reading_f[]" type="text" /></td><td><input name="language_writing_ex[]" type="text" /></td><td><input name="language_writing_g[]" type="text" /></td><td><input name="language_writing_f[]" type="text" /></td><td><input name="language_typing_speed[]" type="text" /></td><td><input name="language_other_skills[]" type="text" /></td></tr>';
        jQuery('#itemlanguage_row').append(row);
    }

    function removelanguage_row(rnum) {
        // alert(rnum)
        jQuery('#language_rowNum' + rnum).remove();
    }
    function removelanguage_rowOLd(langID) {
        // alert(langID)
        var _token = $('input[name="_token"]').val();

        var r = confirm("هل انت متاكد من حذف هذه البيانات ؟");
        if (r == true) {
            $.ajax({
                url: "{{ route('admin/employees/lang/deletelang') }}",
                method: "POST",
                data: {id: langID,
                    _token: _token
                },
                success: function(data) {
                    if (data=='deleted'){
                        $('#langRow'+langID).remove();
                    }
                    console.log(data)
                    console.log('------0000------')
                }
            })        }
    }
</script>
<script type="text/javascript">
    var course_rowNum = 1;

    function addRowcourse_row(frm) {
        course_rowNum++;
        var row = '<tr id="course_rowNum' + course_rowNum + '">' +'<td>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removecourse_row(' + course_rowNum + ');" class="btn btn-danger" /></td>'+

            '<td><input name="course_name[]" type="text" /></td> <td><input name="course_name_of_institute[]" type="text" /></td><td><input name="course_city[]" type="text" /></td><td><input name="course_from[]" type="date" /></td><td><input name="course_to[]" type="date" /></td><td colspan="2"><input name="course_specialize[]" type="text" /></td></tr>';
        jQuery('#itemcourse_row').append(row);
    }

    function removecourse_row(rnum) {
        // alert(rnum)
        jQuery('#course_rowNum' + rnum).remove();
    }

    function removecourse_rowOld(courseID) {
        // alert(courseID)
        var _token = $('input[name="_token"]').val();

        var r = confirm("هل انت متاكد من حذف هذه البيانات ؟");
        if (r == true) {
            $.ajax({
                url: "{{ route('admin/employees/course/deletecourse') }}",
                method: "POST",
                data: {id: courseID,
                    _token: _token
                },
                success: function(data) {
                    if (data=='deleted'){
                        $('#course_rowNum'+courseID).remove();
                    }
                    console.log(data)
                    console.log('------0000------')
                }
            })        }
    }
</script>
<script>
    function openCity(evt, cityName) {
        evt.preventDefault();
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
@endsection
