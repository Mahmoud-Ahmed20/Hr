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
    </style>@section('css')

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3> إخلاء طرف</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/staffServiceActions/index'))}}"> إخلاء طرف</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل إخلاء طرف</li>
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
                                <h5> تعديل إخلاء طرف</h5>
                            </div>
                            <div class="card-body">


                                <form class="card" action="{{url(route('admin/staffServiceActions/update', $staffServiceAction->id))}}" method="post" enctype="multipart/form-data">
                                    @include('flash::message')
                                    @csrf





                                        <header style="text-align: center; margin-bottom: 20px">
                                            <div class="header__logo">
                                                <h1>
                                                    مصنع تي إم
                                                    <span>للملابس الجاهزة <br />
            والتوريدات الفندقية
          </span>
                                                </h1>
                                                <div style="margin: 0 20px; width: 120px">
                                                    <img src="{{asset('/admin/assets/images/Logo.png')}}" alt="logo" />
                                                </div>
                                            </div>
                                        </header>
                                        <center><p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p></center>
                                        <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                            نموذج إخلاء طرف
                                        </h2>
                                        <h2 style="
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        font-size: 17px;
        font-weight: 700;
      ">
                                            Disclaimer form for the third party of the transfer services and the end of the service
                                        </h2>
                                        <center >
                                            <span style="color: orangered" class="error">{{ ($errors->first('staff_id'))?$errors->first('staff_id'). ' - ' : '' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('job_id')?$errors->first('job_id')  . '  - ' : '')}} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('section_id'))?$errors->first('section_id'). '  - ' :  ' ' }} </span>
                                            <span style="color: orangered" class="error">{{ ($errors->first('action_type'))?$errors->first('action_type'). '  - ' :  ' ' }} </span>
                                            {{--                                <span style="color: orangered" class="error">{{ ($errors->first('family_name'))?$errors->first('family_name'). '  - ' :  ' ' }} </span>--}}
                                            {{--                                <span style="color: orangered" class="error">{{ ($errors->first('birth'))?$errors->first('birth'). '  - ' :  ' ' }} </span>--}}
                                            {{--                                <span style="color: orangered" class="error">{{ ($errors->first('place_of_birth'))?$errors->first('place_of_birth'). '  - ' :  ' ' }} </span>--}}
                                            {{--                                <span style="color: orangered" class="error">{{ ($errors->first('nationality'))?$errors->first('nationality'). '  - ' :  ' ' }} </span>--}}
                                            {{--                                <span style="color: orangered" class="error">{{ ($errors->first('religion'))?$errors->first('religion'). '  - ' :  ' ' }} </span>--}}

                                        </center>
                                        <div class="outer__border">
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            اسم الموظف
                                                        </td>

                                                        <td>
                                                            الوظيفة
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select  class="select_data" name="staff_id" >
                                                                <option  selected   disabled>-- يرجي تحديد اسم الموظف   ----</option>
                                                                <?php
                                                                foreach ($staffs as $onestaff){
                                                                ?>
                                                                <option    <?php if($staffServiceAction->staff_id == $onestaff->id) { echo 'selected';} ?>  value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="select_data" name="job_id" id="job_id">
                                                                <option      disabled>-- يرجي تحديد الوظيفة    ----</option>
                                                                <?php
                                                                foreach ($jobs as $oneJob){
                                                                ?>
                                                                <option  <?php if($staffServiceAction->job_id == $oneJob->id) { echo 'selected';} ?>   value="{{$oneJob->id}}">{{$oneJob->name_job}}</option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>

                                                        <td>
                                                            <div class="flex__td">
                                                                <span>الرقم الوظيفي</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>القسم</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="{{$staffServiceAction->job_number}}" name="job_number" type="number">
                                                        </td>
                                                        <td>
                                                            <select name="section_id" class="select_data" name="section_id" id="administration_id">
                                                                <option selected     disabled>-- يرجي تحديد القسم   ----</option>
                                                                <?php
                                                                foreach ($sections as $oneSection){
                                                                ?>
                                                                <option  <?php if($staffServiceAction->section_id == $oneSection->id) { echo 'selected';} ?>   value="{{$oneSection->id}}">{{$oneSection->name}}</option>
                                                                <?php } ?> </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>

                                                        <td>
                                                            <div class="flex__td">
                                                                <span> موقع العمل</span>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="{{$staffServiceAction->work_address}}" name="work_address" type="text">
                                                        </td>

                                                        <td>
                                                            <div class="flex__td">

                                                                <span> منح إجازة<input  <?php if($staffServiceAction->action_type == 'منح إجاز') { echo 'checked';} ?> name="action_type" value="منح إجاز" type="radio"  style="display: inline-block; width: auto;"></span>
                                                                <span>نقل<input  <?php if($staffServiceAction->action_type == 'نقل') { echo 'checked';} ?> name="action_type" value="نقل" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                                <span>استقالة / انتهاء خدمات<input  <?php if($staffServiceAction->action_type == 'استقالة / انتهاء خدمات') { echo 'checked';} ?> name="action_type" value="استقالة / انتهاء خدمات" type="radio" style="display: inline-block; width: auto;" ></span>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="outer__border">
                                            <table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            حيث تم اعتماد : الموضحة بياناته أعلاه و بناء علي القرار الاداري رقم (_____) بتاريخ (_________).اعتبارا من تاريخ (______)وعلية فقد تم استكمال الاجراءات حيال إخلاء طرفة كما يلي
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            موقع العمل
                                                        </td>
                                                    </tr>
                                                </table>
                                        </div>
                                        <div class="outer__border">
                                            <table>
                                                <tr>
                                                    <td>
                                                        سلم مهام عمله الي الموظف
                                                    </td>
                                                    <td>
                                                        سلم وثائق المؤسسة
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="to_staff_id" class="select_data">
                                                            <option selected   disabled>-- يرجي تحديد الموظف المنوب إليه    ----</option>
                                                            <?php
                                                            foreach ($staffs as $onestaff){
                                                            ?>
                                                            <option <?php if($staffServiceAction->to_staff_id == $onestaff->id) { echo 'selected';} ?>     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                            <?php } ?></select>
                                                    </td>
                                                    <td>
                                                        <select name="document_type" class="select_data">
                                                            <option  value=""  <?php if($staffServiceAction->document_type == '') { echo 'selected';} ?>  disabled>-- يرجي تحديد الوثائق    ----</option>
                                                            <option value="كتالوجات"  <?php if($staffServiceAction->document_type == 'كتالوجات') { echo 'selected';} ?>  >كتالوجات </option>
                                                            <option value="ملفات"  <?php if($staffServiceAction->document_type == 'ملفات') { echo 'selected';} ?>  >ملفات</option>
                                                            <option value="مراسلات" <?php if($staffServiceAction->document_type == 'مراسلات') { echo 'selected';} ?>  >مراسلات</option>
                                                            <option  value="مفاتيح" <?php if($staffServiceAction->document_type == 'مفاتيح') { echo 'selected';} ?>  >مفاتيح</option>
                                                            <option   value="مواد دعاية" <?php if($staffServiceAction->document_type == 'مواد دعاية') { echo 'selected';} ?> >مواد دعاية</option>
                                                            <option  value="أدوات" <?php if($staffServiceAction->document_type == 'أدوات') { echo 'selected';} ?> >أدوات</option>
                                                            <option  value="عدد" <?php if($staffServiceAction->document_type == 'عدد') { echo 'selected';} ?> >عدد</option>
                                                            <option  value="كروت عمل" <?php if($staffServiceAction->document_type == 'كروت عمل') { echo 'selected';} ?> >كروت عمل</option>
                                                            <option   value="أخري " <?php if($staffServiceAction->document_type == 'أخري') { echo 'selected';} ?> >أخري </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        التي بحوزته الي
                                                    </td>
                                                    <td>
                                                        قام بتدريب الموظف علي الاعمال التخصصية المناط به .
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select  class="select_data" name="he_has" >
                                                            <option  selected  disabled>-- يرجي تحديد الموظف المسلم إليه    ----</option>
                                                            <?php
                                                            foreach ($staffs as $onestaff){
                                                            ?>
                                                            <option    <?php if($staffServiceAction->he_has == $onestaff->id) { echo 'selected';} ?>  value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                            <?php } ?>
                                                        </select>
{{--                                                        <input value="{{$staffServiceAction->he_has}}" name="he_has" type="text">--}}
                                                    </td>
                                                    <td>
                                                        <select  class="select_data" name="employee_special_work" >
                                                            <option  selected  disabled>-- يرجي تحديد الموظف  المدرب    ----</option>
                                                            <?php
                                                            foreach ($staffs as $onestaff){
                                                            ?>
                                                            <option    <?php if($staffServiceAction->employee_special_work == $onestaff->id) { echo 'selected';} ?>  value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                            <?php } ?>
                                                        </select>
{{--                                                        <input value="{{$staffServiceAction->employee_special_work}}" name="employee_special_work" type="text">--}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        قام بتسليم المعدات و العدد و الادوات المسلمه له الي
                                                    </td>
                                                    <td>
                                                        توقيع المستلم
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select  class="select_data" name="equipment_reciver" >
                                                            <option  selected  disabled>-- يرجي تحديد الموظف  المستلم للمعدات    ----</option>
                                                            <?php
                                                            foreach ($staffs as $onestaff){
                                                            ?>
                                                            <option    <?php if($staffServiceAction->equipment_reciver == $onestaff->id) { echo 'selected';} ?>  value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                            <?php } ?>
                                                        </select>
{{--                                                        <input value="{{$staffServiceAction->equipment_reciver}}" name="equipment_reciver" type="text">--}}
                                                    </td>
                                                    <td>
                                                        {{--                                                <input type="text">--}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        تم تسليم ارقام الشفره الخاصة ب الالات و الاجهزة و الخزائن اخري
                                                    </td>
                                                    <td>
                                                        توقيع المستلم
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="select_data" name="code_numbers_note"  >
                                                            <option  selected   disabled>-- يرجي تحديد اسم الموظف  لتسليم ارقام الشفره ----</option>
                                                            <?php
                                                            foreach ($staffs as $onestaff){
                                                            ?>
                                                            <option    <?php if($staffServiceAction->code_numbers_note == $onestaff->id) { echo 'selected';} ?>  value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                            <?php } ?>
                                                        </select>
{{--                                                        <input value="{{$staffServiceAction->code_numbers_note}}" name="code_numbers_note" type="text">--}}
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        تمت عمليات التسليم و التدريب عالية
                                                    </td>
                                                    <td>
                                                        اعتماد الرئيس المباشر
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input  value="{{$staffServiceAction->operation_done}}" name="operation_done" type="text">
                                                    </td>
                                                    <td>
                                                        <input value="{{$staffServiceAction->approval_direct_manager}}" name="approval_direct_manager" type="text">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="outer__border">
                                            <table>
                                                <tr>
                                                    <td>
                                                        ادارة الشئون الادارية
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        أخلاء طرف المذكور من قسم المستودعات و استلام العهد التي بحوزتة كما يلي
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span> حسب الكشف المرفق<input  <?php if($staffServiceAction->receipt_covenant == 'حسب الكشف المرفق') { echo 'checked';} ?> name="receipt_covenant" value="حسب الكشف المرفق" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>ليس بعهدته شئ<input  <?php if($staffServiceAction->receipt_covenant == 'ليس بعهدته شئ') { echo 'checked';} ?> name="receipt_covenant" value="ليس بعهدته شئ" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        اعتماد ادارة الشئون الادارية
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staffServiceAction->accreditation_Administrative_Affairs}}" name="accreditation_Administrative_Affairs" type="text">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="outer__border">
                                            <table>
                                                <tr>
                                                    <td>
                                                        الادارة الماليه
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        تم اخلاء طرف المذكور واستلام العهد التي بحوزتة كام يلي
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <span>لا ينطبق <input type="radio"  <?php if($staffServiceAction->bank_signature_status == 'لا ينطبق') { echo 'checked';} ?> value="لا ينطبق"  name="bank_signature_status" style="display: inline-block; width: auto;"></span>
                                                        <span>تم إالغاء توقيع البنك(في حالة انتهاء الخدمات)<input  <?php if($staffServiceAction->bank_signature_status == 'تم إالغاء توقيع البنك') { echo 'checked';} ?> value="تم إالغاء توقيع البنك" name="bank_signature_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>ليس لدية عهد مالية <input   <?php if($staffServiceAction->financial_covenant_status == 'ليس لدية عهد مالية') { echo 'checked';} ?> value="ليس لدية عهد مالية" name="financial_covenant_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>تم استلام ما لدية من عهد ماليه وتبلغ (_______جنية)<input   <?php if($staffServiceAction->financial_covenant_status == 'تم استلام ما لدية من عهد ماليه') { echo 'checked';} ?> value="تم استلام ما لدية من عهد ماليه" name="financial_covenant_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        و هي عبارة عن
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staffServiceAction->financial_covenant_value}}" name="financial_covenant_value" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>لا يوجد رصيد <input  <?php if($staffServiceAction->balance_status == 'لا يوجد رصيد') { echo 'checked';} ?> value="لا يوجد رصيد" name="balance_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>   رصيد مدين  بمبلغ(___________جنية)<input  <?php if($staffServiceAction->balance_status == 'رصيد مدين') { echo 'checked';} ?> value="رصيد مدين" name="balance_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        و هو عبارة عن
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staffServiceAction->balance}}" name="balance" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        رصيد دائن بمبلغ(_______جنية) و هو عبارة عن
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staffServiceAction->debit_balance}}" name="debit_balance" type="text">
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="outer__border">
                                            <table>
                                                <tr>
                                                    <td>
                                                        توقيع محاسب الرواتب
                                                    </td>
                                                    <td>
                                                        توقيع رئيس الحسابات
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input disabled type="text">
                                                    </td>
                                                    <td>
                                                        <input disabled type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        توقيع حسابات المستودعات
                                                    </td>
                                                    <td>
                                                        توقيع مدير الحسابات
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input disabled type="text">
                                                    </td>
                                                    <td>
                                                        <input disabled type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        توقيع مشرف حسابات العملاء
                                                    </td>
                                                    <td>
                                                        توقيع مدير الحسابات
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input disabled type="text">
                                                    </td>
                                                    <td>
                                                        <input disabled type="text">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="outer__border">
                                            <table>
                                                <tr>
                                                    <td style="text-align: center;">
                                                        في حالة انتهاء الخدمات
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span>ليس لدية عهد او ممتلكات الشركة<input  <?php if($staffServiceAction->finish_donot_have_covenant == 'ليس لدية عهد او ممتلكات الشركة') { echo 'checked';} ?> value="ليس لدية عهد او ممتلكات الشركة" name="finish_donot_have_covenant" type="radio"  style="display: inline-block; width: auto;"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>لا ينطبق<input value="لا ينطبق"  <?php if($staffServiceAction->finish_donot_have_covenant == 'لا ينطبق') { echo 'checked';} ?> type="radio" name="finish_donot_have_covenant"  style="display: inline-block; width: auto;"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span> تم استلام ممتلكات الشركة حسب البيان التالي </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><textarea name="company_data" rows="5"><?php  echo $staffServiceAction->company_data; ?></textarea></td>

                                                </tr>
                                            </table>
                                        </div>
                                        <div class="outer__border">
                                            <table>
                                                <tr>
                                                    <td>
                                                        قسم الحركة
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>تم استلام السيارة لا  ينطبق <input  <?php if($staffServiceAction->move_department == 'تم استلام السيارة لا  ينطبق') { echo 'checked';} ?> value="تم استلام السيارة لا  ينطبق" name="move_department" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>اخلاء طرف من المكتب لا ينطبق<input  <?php if($staffServiceAction->move_department == 'اخلاء طرف من المكتب لا ينطب') { echo 'checked';} ?> value="اخلاء طرف من المكتب لا ينطب" name="move_department" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        قسم شئون الموظفين
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>تمت مراجعة الاجارات  <input value="تمت مراجعة الاجارات"  <?php if($staffServiceAction->employee_status == 'تمت مراجعة الاجارات') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>اغلائ طرف الهاتف <input value="اغلائ طرف الهاتف" <?php  if($staffServiceAction->employee_status == 'اغلائ طرف الهاتف') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                        <span>لا ينطبق <input value="لا ينطبق" <?php if($staffServiceAction->employee_status == 'لا ينطبق ') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        اعتماد المدير المالي و الاداري
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staffServiceAction->manager_confirm}}" name="manager_confirm" type="text">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <footer class="page__footer">
                                            <p style="font-weight: 600; font-size: 18px; direction: ltr">
                                                <span><img src="../location.png" alt="" /></span>KING FAISAL ST., EL KOM EL AKHDAR STATION, END OF ALY SHIHA ST, HARAM, GIZA- EGYPT.
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

                                        <center>

                                            <button class="btn btn-primary" type="submit">تعديل</button>

                                        </center>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Container-fluid Ends-->

@endsection
