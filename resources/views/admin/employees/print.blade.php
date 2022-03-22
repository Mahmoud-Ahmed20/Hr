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
                    <div class="card-header" >
                        <h5>
                            <button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
                                <i class="mdi mdi-printer ml-1"></i>طباعة
                            </button>
                        </h5>                    </div>
                    <div class="card-body" id="print">





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
                                                     {{$employee->position_applied_of}}
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $cityData=explode(',',$employee->city);
                                                                ?>
                                                                <div style="margin: 3px 0">{{(isset($cityData[0]))?$cityData[0]:''}}</div>
                                                                <div style="margin: 3px 0">{{(isset($cityData[1]))?$cityData[1] : ''}}</div>
                                                                <div style="margin: 3px 0">{{(isset($cityData[2]))?$cityData[2] : ''}}</div>
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
                                                            <td>{{$employee->first_name}}</td>
                                                            <td>{{$employee->father_name}}</td>
                                                            <td>{{$employee->grandfather_name}}</td>
                                                            <td>{{$employee->family_name}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>تاريخ الميلاد Date of birth</th>
                                                            <th>مكان الميلاد Place of birth</th>
                                                            <th>الجنسية Nationality</th>
                                                            <th>الديانة Religion</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$employee->birth}}</td>
                                                            <td>{{$employee->place_of_birth}}</td>
                                                            <td>{{$employee->nationality}}</td>
                                                            <td>{{$employee->religion}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <?php

                                                if($employee->photo != null ){?>

                                                <?php } ?>
                                                <div style="width: 25%; padding: 15px; display: flex; justify-content: center; align-items: center;">
                                                    <div style="border: 1px solid #222; width: 70%; height: 250px; padding: 3px;">
                                                        <div style="border: 5px solid #222; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
                                                            <img src="{{asset( $employee->photo)}}" width="100%" height="100%">
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
                                                        {{$employee->card->card_id}}
                                                    </td>
                                                    <td>
                                                        {{$employee->card->place_of_issue}}
                                                    </td>
                                                    <td>
                                                        {{$employee->card->date_of_issue}}
                                                    </td>
                                                </tr>
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
                                                    {{($employee->contact) ? $employee->contact->home_phone : ''}}
                                                    </td>
                                                    <td>
                                                        {{($employee->contact) ? $employee->contact->mobile : ''}}
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
                                                        {{($employee->contact) ?$employee->contact->work_phone : ''}}
                                                    </td>
                                                    <td>
                                                        {{($employee->contact) ?$employee->contact->email : ''}}
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
                                                        {{($employee->contact) ?$employee->contact->present_adderss : ''}}
                                                    </td>
                                                    <td>
                                                        {{($employee->contact) ?$employee->contact->post : ''}}
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
                                                          <?php if($employee->marital_status == 'Married') {
?>

                                                                <span>متزوج</span>&nbsp;
                                                                <span>Married</span>
                                                          <?php

                                                          }else{
                                                              ?>
                                                              <span>اعزب</span>&nbsp;
                                                              <span>Single</span>
<?php
                                                          } ?>
                                                      </div>
                                                      </span>
                                                            <span dir="ltr">Marital status</span>
                                                        </div>
                                                        <div class="flex__td">
                                                            <span>هل تعول احدا؟</span>
                                                            <span class="flex__td">
                                                      <div class="flex__td" style="margin: 0 10px">

                                                           <?php if($employee->dependents == '1') { ?>

                                                                <span>نعم</span>&nbsp;
                                                        <span>YES</span>
                                                               <?php } else{?>


                                                          <span>لا</span>&nbsp;
                                                        <span>NO</span>

                                                          <?php } ?>

                                                         </div>

                                                    </span>
                                                            <span dir="ltr">Have you any dependents?</span>
                                                        </div>
                                                        <p style="margin: 0; text-align: center">
{{--                                                            <span>اذا كانت الاجابة "نعم" بين المعلومات التالية</span>--}}
{{--                                                            <span dir="ltr">If answer is "yes" Please state following</span>--}}
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

{{--                                                    <td>--}}
{{--                                                        <div class="flex__td">--}}
{{--                                                            <span> <input onclick="addRowDependances(this.form);" type="button" value="<?php echo "إضافه"; ?>" class="btn btn-success" /></span>--}}
{{--                                                            <span dir="ltr"><input onclick="addRowDependances(this.form);" type="button" value="<?php echo "Add"; ?>" class="btn btn-success" /></span>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}

                                                </tr>

                                                <tbody id="itemRowsDependances">

                                                <?php

                                                foreach ($employee->people_dependents as $depend){
                                                ?>
                                                <tr id="dependent_<?php echo  $depend->id;  ?>"><td>
                                                        {{$depend->name}}
                                                    </td>
                                                    <td>
                                                       {{$depend->age}}
                                                    </td>
                                                    <td>
                                                       {{$depend->relation}}
                                                    </td>


{{--                                                    <td>--}}
{{--                                                        <input type="button" value="<?php echo "Remove"; ?>" onclick="removeRowDependancesOld({{$depend->id}});" class="btn btn-danger" />--}}
{{--                                                    </td>--}}
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
                                                    <td style="text-align: center"><?php echo $depend->address ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
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
                                               <?php if($employee->employed_by_this_company == '1') { ?>

                                                                <span>نعم</span>&nbsp;
                                                        <span>YES</span>
                                                               <?php } else{?>


                                                          <span>لا</span>&nbsp;
                                                        <span>NO</span>

                                                          <?php } ?>

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
                                                            <span>{{$employee->start_working}}</span>
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


                                                  <?php if($employee->employed_now == '1') { ?>

                                                                <span>نعم</span>&nbsp;
                                                        <span>YES</span>
                                                               <?php } else{?>


                                                          <span>لا</span>&nbsp;
                                                        <span>NO</span>

                                                          <?php } ?>
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
{{--                                                    <div class="flex__td">--}}
{{--                                                        <span> <input onclick="addRowcompany_row(this.form);" type="button" value="<?php echo "إضافه"; ?>" class="btn btn-success" /></span>--}}
{{--                                                        --}}{{--                                                            <span dir="ltr"><input onclick="addRowDependances(this.form);" type="button" value="<?php echo "Add"; ?>" class="btn btn-success" /></span>--}}
{{--                                                    </div>--}}
                                                </tr>
                                                <tbody id="itemCompany_row">


                                                <?php foreach ($employee->company_privious as $company ) {?>

                                                <tr id="company_rowNum<?php echo $company->id ;?>">
{{--                                                    <td>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removecompany_rowOld(<?php echo $company->id ;?>);" class="btn btn-danger" /></td>--}}
                                                    <td> <div class="flex__td">             <span> <div class="flex__td"> <span>من</span><span>{{$company->from}}</span><span>from</span></div></span><span><div class="flex__td"><span>الي</span><span>{{$company->to}}</span><span>To</span></div></span></div></td><td><div class="flex__td"><span>مسمي الوظيفة</span><span>{{$company->job_title}}</span><span dir="ltr"> Job title </span></div></td><td><div class="flex__td"><span>الراتب</span><span>{{$company->salary}}</span><span dir="ltr">Salary</span></div><div class="flex__td"><span>البدلات</span><span>{{$company->allowance}}</span><span dir="ltr">Allowance</span></div></td></tr>
                                                <tr id="company_rowNum1<?php echo $company->id ;?>"><td><div class="flex__td" style="flex-wrap: wrap"><span>اسم الشركة/صاحب العمل</span><span dir="ltr">Name of co/org</span><span style="width: 100%">{{$company->name_of_org}}</span></div><div class="flex__td" style="flex-wrap: wrap"><span>الهاتف </span><span dir="ltr">Telephone No</span><span style="width: 100%">{{$company->telephone}}</span></div><div class="flex__td" style="flex-wrap: wrap"><span>العنوان</span><span dir="ltr">Address</span><span style="width: 100%">{{$company->address}}</span></div></td><td><div class="flex__td" style="flex-wrap: wrap"><span>تفاصيل عن واجباتك</span><span dir="ltr">Description of your duties</span><span style="width: 100%; text-align: center"><?php echo $company->description  ;?></span></div></td><td><div class="flex__td" style="flex-wrap: wrap"><span>سبب ترك العمل</span><span dir="ltr">Reason for Quit</span><span style="width: 100%; text-align: center"><?php echo $company->reason_for_quit ;?></span></div></td></tr>
                                                </tr>
                                                <?php } ?>

                                                </tbody>



                                            </table>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="flex__td">
                                                            <span>رقم التامينات</span>
                                                            <span>{{$employee->G_O_S_I_O_available}}</span>
                                                            <span dir="ltr">G. O. S. I. No. Avaliable</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="flex__td">
                                                            <span>الراتب الادني المطلوب</span>
                                                            <span>{{$employee->minimum_salary_required}}</span>
                                                            <span dir="ltr">Minimum salary required</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>  <div class="outer__border">
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
                                                            <span>{{(isset($employee->driving))?$employee->driving->category : ''}}</span>
                                                            <span dir="ltr">Category</span>
                                                        </div>
                                                    </td>
                                                    <td style="border-left: 0">
                                                        <div class="flex__td">
                                                            <span>رقمها</span>
                                                            <span>{{(isset($employee->driving))?$employee->driving->number : ''}}</span>
                                                            <span dir="ltr">Number</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="border-right: 0">
                                                        <div class="flex__td">
                                                            <span>تاريخ صدورها</span>
                                                            <span>{{(isset($employee->driving))?$employee->driving->date_of_issue : ''}}</span>
                                                            <span dir="ltr">Date of issue</span>
                                                        </div>
                                                    </td>
                                                    <td style="border-left: 0">
                                                        <div class="flex__td">
                                                            <span>تاريخ انتهائها</span>
                                                            <span>{{(isset($employee->driving))?$employee->driving->expiry_date : ''}}</span>
                                                            <span dir="ltr">Expiry date</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="border-right: 0">
                                                        <div class="flex__td">
                                                            <span>مكان الاصدار</span>
                                                            <span>{{(isset($employee->driving))?$employee->driving->place_of_issue : ''}}</span>
                                                            <span dir="ltr">Place of issue</span>
                                                        </div>
                                                    </td>
                                                    <td style="border-left: 0">
                                                        <div class="flex__td">
                                                            <span>فصيلة الدم</span>
                                                            <span>{{(isset($employee->driving))?$employee->driving->blood_group : ''}}</span>
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

                      <?php if($employee->judicial_ruling == '1') { ?>

                                                                <span>نعم</span>&nbsp;
                                                        <span>YES</span>
                                                               <?php } else{?>


                                                          <span>لا</span>&nbsp;
                                                        <span>NO</span>

                                                          <?php } ?>

                  </div>

                </span>
                                                            <span dir="ltr">Have you ever been convicted?</span>
                                                        </div>
                                                        <div class="flex__td" style="flex-wrap: wrap">
                                                            <span>في حال الاجابة بنعم يرجي بينا التفاصيل</span>
                                                            <span>If answer is "yes" please give details</span>
                                                            <span style="width: 100%; text-align: center">
                 <?php  echo $employee->reason_judicial_ruling; ?>
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
                                                        <span>ابتدائي</span><br />
                                                        <span>Elementary</span>
                                                    </th>
                                                    <td>{{(isset($employee->educations))?$employee->educations[0]->place_name : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[0]->city : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[0]->from : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[0]->to : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[0]->specialize : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[0]->grade : ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span>اعدادي</span><br />
                                                        <span>Intermediate</span>
                                                    </th>
                                                    <td>{{(isset($employee->educations))?$employee->educations[1]->place_name : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[1]->city : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[1]->from : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[1]->to : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[1]->specialize : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[1]->grade : ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span>ثانوي</span><br />
                                                        <span>Secondary</span>
                                                    </th>
                                                    <td>{{(isset($employee->educations))?$employee->educations[2]->place_name : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[2]->city : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[2]->from : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[2]->to : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[2]->specialize : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[2]->grade : ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span>دبلوم بعد الثانوية</span><br />
                                                        <span>High diploma</span>
                                                    </th>
                                                    <td>{{(isset($employee->educations))?$employee->educations[3]->place_name : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[3]->city : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[3]->from : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[3]->to : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[3]->specialize : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[3]->grade : ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span>الجامعة</span><br />
                                                        <span>University</span>
                                                    </th>
                                                    <td>{{(isset($employee->educations))?$employee->educations[4]->place_name : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[4]->city : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[4]->from : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[4]->to : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[4]->specialize : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[4]->grade : ''}}</td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        <span>دراسات عليا</span><br />
                                                        <span>Pos gradute studies</span>
                                                    </th>
                                                    <td>{{(isset($employee->educations))?$employee->educations[5]->place_name : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[5]->city : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[5]->from : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[5]->to : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[5]->specialize : ''}}</td>
                                                    <td>{{(isset($employee->educations))?$employee->educations[5]->grade : ''}}</td>
                                                </tr>
                                                <tr>
{{--                                                    <th>--}}
{{--                                                        <span> <input onclick="addRowcourse_row(this.form);" type="button" value="<?php echo "إضافه"; ?>" class="btn btn-success" /></span>--}}

{{--                                                    </th>--}}
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
                                                <tr id="course_rowNum<?php echo $course->id ;?>">
                                                    <td>{{$course->name}}</td>
                                                    <td>{{$course->name_of_institute}}</td><td>{{$course->city}}</td>
                                                    <td>{{$course->from}}</td><td>{{$course->to}}</td>
                                                    <td colspan="2">{{$course->specialize}}</td></tr>

                                                <?php } ?>
                                                </tbody>


                                            </table>
                                            <table>
                                                <tr>
                                                    <th rowspan="2">
                                                        <span>معرفة اللغات</span><br />
{{--                                                        <span> <input onclick="addRowlanguage_row(this.form);" type="button" value="<?php echo "إضافه"; ?>" class="btn btn-success" /></span>--}}
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
{{--                                                        {{$language->name}}--}}
                                                        <div class="flex__td">
                                                            <span style="text-align: center">{{$language->name}}</span>
                                                            <?php if($count >1){?>

{{--                                                            <input type="button" value="<?php echo "Remove"; ?>" onclick="removelanguage_rowOLd(<?php echo $language->id ; ?>);" class="btn btn-danger" />--}}
                                                            <?php }  ?>                                                                </div>
                                                    </th>
                                                    <td>
                                                        {{$language->speaking_ex}}
                                                    </td>
                                                    <td>
                                                        {{$language->speaking_g}}
                                                    </td>
                                                    <td>
                                                        {{$language->speaking_f}}
                                                    </td>
                                                    <td>
                                                        {{$language->reading_ex}}
                                                    </td>
                                                    <td>
                                                        {{$language->reading_g}}
                                                    </td>
                                                    <td>
                                                        {{$language->reading_f}}
                                                    </td>
                                                    <td>
                                                        {{$language->writing_ex}}
                                                    </td>
                                                    <td>
                                                        {{$language->writing_g}}
                                                    </td>
                                                    <td>

                                                        {{$language->writing_f}}
                                                    </td>
                                                    <td>
                                                        {{$language->typing_speed}}
                                                    </td>
                                                    <td>
                                                        {{$language->other_skills}}
                                                    </td>
                                                </tr>

                                                <?php  $count++;
                                                } ?>

                                                <tbody id="itemlanguage_row">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>   <div>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="flex__td">
                                                            <span>كيف عرفت عن فرصة العمل؟</span>
                                                            <span style="width: 40%">{{$employee->get_to_know_the_job}}</span>
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
                                                            <span style="width: 100%; text-align: center"><?php if (count($employee->relatives_employed) > 0){  echo $employee->relatives_employed[0]->name; }?>
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
                                                    <td>{{(count($employee->not_relatives_employed)>0) ? $employee->not_relatives_employed[0]->name : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>0) ?$employee->not_relatives_employed[0]->position : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>0) ?$employee->not_relatives_employed[0]->company : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>0) ?$employee->not_relatives_employed[0]->telephone : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>0) ?$employee->not_relatives_employed[0]->address : ''}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->name : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->position : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->company : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->telephone : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>1) ?$employee->not_relatives_employed[1]->address : ''}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->name : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->position : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->company : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->telephone : ''}}</td>
                                                    <td>{{(count($employee->not_relatives_employed)>2) ?$employee->not_relatives_employed[2]->address : ''}}</td>
                                                </tr>


                                                <tr>
                                                    <td colspan="5">
                                                        <div class="flex__td" style="flex-wrap: wrap">
                                                            <span>هل هناك معلومات اخري تود اضافتها؟</span>
                                                            <span>Other data which may be of interest</span>
                                                            <span style="width: 100%; text-align: center">
                 <?php  echo $employee->other_data; ?>
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
                                                            <span style="width: 75%">{{(isset($employee->skill))?$employee->skill->skills : ''}}</span>
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
{{--                                        <button   class="tablinks btn btn-primary" onclick="openCity(event, 'employees_driving_licence')">السابق</button>--}}


{{--                                        &nbsp;--}}
{{--                                        --}}{{--                                    <div class="text-center form-group mt-4">--}}
{{--                                        --}}{{--                                                <div class="form-group mt-4">--}}
{{--                                        <button class="btn btn-primary" type="submit">تعديل</button>--}}
                                        {{--                                                </div>                                                --}}{{--                                    </div> --}}
                                    </center>

{{--                                </div>--}}



                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('admin/assets/js/chart.js/Chart.bundle.min.js') }}"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            $('#Basic_Datatab').click();
        }); function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection
