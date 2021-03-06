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
                        <h3> ?????????? ??????</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">???????? ????????????</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/staffServiceActions/index'))}}"> ?????????? ??????</a>
                        </li>
                        <li class="breadcrumb-item active">?????????? ?????????? ??????</li>
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
                                <h5> ?????????? ?????????? ??????</h5>
                            </div>
                            <div class="card-body">


                                <form class="card" action="{{url(route('admin/staffServiceActions/update', $staffServiceAction->id))}}" method="post" enctype="multipart/form-data">
                                    @include('flash::message')
                                    @csrf





                                        <header style="text-align: center; margin-bottom: 20px">
                                            <div class="header__logo">
                                                <h1>
                                                    ???????? ???? ????
                                                    <span>?????????????? ?????????????? <br />
            ???????????????????? ????????????????
          </span>
                                                </h1>
                                                <div style="margin: 0 20px; width: 120px">
                                                    <img src="{{asset('/admin/assets/images/Logo.png')}}" alt="logo" />
                                                </div>
                                            </div>
                                        </header>
                                        <center><p style="font-weight: 700">?????????? ?????????????? ?????????????? ?????????????? ????????????????</p></center>
                                        <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                            ?????????? ?????????? ??????
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
                                                            ?????? ????????????
                                                        </td>

                                                        <td>
                                                            ??????????????
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select  class="select_data" name="staff_id" >
                                                                <option  selected   disabled>-- ???????? ?????????? ?????? ????????????   ----</option>
                                                                <?php
                                                                foreach ($staffs as $onestaff){
                                                                ?>
                                                                <option    <?php if($staffServiceAction->staff_id == $onestaff->id) { echo 'selected';} ?>  value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="select_data" name="job_id" id="job_id">
                                                                <option      disabled>-- ???????? ?????????? ??????????????    ----</option>
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
                                                                <span>?????????? ??????????????</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>??????????</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="{{$staffServiceAction->job_number}}" name="job_number" type="number">
                                                        </td>
                                                        <td>
                                                            <select name="section_id" class="select_data" name="section_id" id="administration_id">
                                                                <option selected     disabled>-- ???????? ?????????? ??????????   ----</option>
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
                                                                <span> ???????? ??????????</span>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input value="{{$staffServiceAction->work_address}}" name="work_address" type="text">
                                                        </td>

                                                        <td>
                                                            <div class="flex__td">

                                                                <span> ?????? ??????????<input  <?php if($staffServiceAction->action_type == '?????? ????????') { echo 'checked';} ?> name="action_type" value="?????? ????????" type="radio"  style="display: inline-block; width: auto;"></span>
                                                                <span>??????<input  <?php if($staffServiceAction->action_type == '??????') { echo 'checked';} ?> name="action_type" value="??????" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                                <span>?????????????? / ???????????? ??????????<input  <?php if($staffServiceAction->action_type == '?????????????? / ???????????? ??????????') { echo 'checked';} ?> name="action_type" value="?????????????? / ???????????? ??????????" type="radio" style="display: inline-block; width: auto;" ></span>
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
                                                            ?????? ???? ???????????? : ?????????????? ?????????????? ?????????? ?? ???????? ?????? ???????????? ?????????????? ?????? (_____) ???????????? (_________).?????????????? ???? ?????????? (______)?????????? ?????? ???? ?????????????? ?????????????????? ???????? ?????????? ???????? ?????? ??????
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            ???????? ??????????
                                                        </td>
                                                    </tr>
                                                </table>
                                        </div>
                                        <div class="outer__border">
                                            <table>
                                                <tr>
                                                    <td>
                                                        ?????? ???????? ???????? ?????? ????????????
                                                    </td>
                                                    <td>
                                                        ?????? ?????????? ??????????????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select name="to_staff_id" class="select_data">
                                                            <option selected   disabled>-- ???????? ?????????? ???????????? ???????????? ????????    ----</option>
                                                            <?php
                                                            foreach ($staffs as $onestaff){
                                                            ?>
                                                            <option <?php if($staffServiceAction->to_staff_id == $onestaff->id) { echo 'selected';} ?>     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                            <?php } ?></select>
                                                    </td>
                                                    <td>
                                                        <select name="document_type" class="select_data">
                                                            <option  value=""  <?php if($staffServiceAction->document_type == '') { echo 'selected';} ?>  disabled>-- ???????? ?????????? ??????????????    ----</option>
                                                            <option value="????????????????"  <?php if($staffServiceAction->document_type == '????????????????') { echo 'selected';} ?>  >???????????????? </option>
                                                            <option value="??????????"  <?php if($staffServiceAction->document_type == '??????????') { echo 'selected';} ?>  >??????????</option>
                                                            <option value="??????????????" <?php if($staffServiceAction->document_type == '??????????????') { echo 'selected';} ?>  >??????????????</option>
                                                            <option  value="????????????" <?php if($staffServiceAction->document_type == '????????????') { echo 'selected';} ?>  >????????????</option>
                                                            <option   value="???????? ??????????" <?php if($staffServiceAction->document_type == '???????? ??????????') { echo 'selected';} ?> >???????? ??????????</option>
                                                            <option  value="??????????" <?php if($staffServiceAction->document_type == '??????????') { echo 'selected';} ?> >??????????</option>
                                                            <option  value="??????" <?php if($staffServiceAction->document_type == '??????') { echo 'selected';} ?> >??????</option>
                                                            <option  value="???????? ??????" <?php if($staffServiceAction->document_type == '???????? ??????') { echo 'selected';} ?> >???????? ??????</option>
                                                            <option   value="???????? " <?php if($staffServiceAction->document_type == '????????') { echo 'selected';} ?> >???????? </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ???????? ???????????? ??????
                                                    </td>
                                                    <td>
                                                        ?????? ???????????? ???????????? ?????? ?????????????? ???????????????? ???????????? ???? .
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select  class="select_data" name="he_has" >
                                                            <option  selected  disabled>-- ???????? ?????????? ???????????? ???????????? ????????    ----</option>
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
                                                            <option  selected  disabled>-- ???????? ?????????? ????????????  ????????????    ----</option>
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
                                                        ?????? ???????????? ?????????????? ?? ?????????? ?? ?????????????? ?????????????? ???? ??????
                                                    </td>
                                                    <td>
                                                        ?????????? ??????????????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select  class="select_data" name="equipment_reciver" >
                                                            <option  selected  disabled>-- ???????? ?????????? ????????????  ?????????????? ??????????????    ----</option>
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
                                                        ???? ?????????? ?????????? ???????????? ???????????? ?? ???????????? ?? ?????????????? ?? ?????????????? ????????
                                                    </td>
                                                    <td>
                                                        ?????????? ??????????????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="select_data" name="code_numbers_note"  >
                                                            <option  selected   disabled>-- ???????? ?????????? ?????? ????????????  ???????????? ?????????? ???????????? ----</option>
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
                                                        ?????? ???????????? ?????????????? ?? ?????????????? ??????????
                                                    </td>
                                                    <td>
                                                        ???????????? ???????????? ??????????????
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
                                                        ?????????? ???????????? ????????????????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ?????????? ?????? ?????????????? ???? ?????? ???????????????????? ?? ???????????? ?????????? ???????? ???????????? ?????? ??????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span> ?????? ?????????? ????????????<input  <?php if($staffServiceAction->receipt_covenant == '?????? ?????????? ????????????') { echo 'checked';} ?> name="receipt_covenant" value="?????? ?????????? ????????????" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>?????? ???????????? ????<input  <?php if($staffServiceAction->receipt_covenant == '?????? ???????????? ????') { echo 'checked';} ?> name="receipt_covenant" value="?????? ???????????? ????" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ???????????? ?????????? ???????????? ????????????????
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
                                                        ?????????????? ??????????????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ???? ?????????? ?????? ?????????????? ?????????????? ?????????? ???????? ???????????? ?????? ??????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>

                                                        <span>???? ?????????? <input type="radio"  <?php if($staffServiceAction->bank_signature_status == '???? ??????????') { echo 'checked';} ?> value="???? ??????????"  name="bank_signature_status" style="display: inline-block; width: auto;"></span>
                                                        <span>???? ???????????? ?????????? ??????????(???? ???????? ???????????? ??????????????)<input  <?php if($staffServiceAction->bank_signature_status == '???? ???????????? ?????????? ??????????') { echo 'checked';} ?> value="???? ???????????? ?????????? ??????????" name="bank_signature_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>?????? ???????? ?????? ?????????? <input   <?php if($staffServiceAction->financial_covenant_status == '?????? ???????? ?????? ??????????') { echo 'checked';} ?> value="?????? ???????? ?????? ??????????" name="financial_covenant_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>???? ???????????? ???? ???????? ???? ?????? ?????????? ?????????? (_______????????)<input   <?php if($staffServiceAction->financial_covenant_status == '???? ???????????? ???? ???????? ???? ?????? ??????????') { echo 'checked';} ?> value="???? ???????????? ???? ???????? ???? ?????? ??????????" name="financial_covenant_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ?? ???? ?????????? ????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staffServiceAction->financial_covenant_value}}" name="financial_covenant_value" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>???? ???????? ???????? <input  <?php if($staffServiceAction->balance_status == '???? ???????? ????????') { echo 'checked';} ?> value="???? ???????? ????????" name="balance_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>   ???????? ????????  ??????????(___________????????)<input  <?php if($staffServiceAction->balance_status == '???????? ????????') { echo 'checked';} ?> value="???????? ????????" name="balance_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ?? ???? ?????????? ????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staffServiceAction->balance}}" name="balance" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ???????? ???????? ??????????(_______????????) ?? ???? ?????????? ????
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
                                                        ?????????? ?????????? ??????????????
                                                    </td>
                                                    <td>
                                                        ?????????? ???????? ????????????????
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
                                                        ?????????? ???????????? ????????????????????
                                                    </td>
                                                    <td>
                                                        ?????????? ???????? ????????????????
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
                                                        ?????????? ???????? ???????????? ??????????????
                                                    </td>
                                                    <td>
                                                        ?????????? ???????? ????????????????
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
                                                        ???? ???????? ???????????? ??????????????
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <span>?????? ???????? ?????? ???? ?????????????? ????????????<input  <?php if($staffServiceAction->finish_donot_have_covenant == '?????? ???????? ?????? ???? ?????????????? ????????????') { echo 'checked';} ?> value="?????? ???????? ?????? ???? ?????????????? ????????????" name="finish_donot_have_covenant" type="radio"  style="display: inline-block; width: auto;"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>???? ??????????<input value="???? ??????????"  <?php if($staffServiceAction->finish_donot_have_covenant == '???? ??????????') { echo 'checked';} ?> type="radio" name="finish_donot_have_covenant"  style="display: inline-block; width: auto;"></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span> ???? ???????????? ?????????????? ???????????? ?????? ???????????? ???????????? </span>
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
                                                        ?????? ????????????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>???? ???????????? ?????????????? ????  ?????????? <input  <?php if($staffServiceAction->move_department == '???? ???????????? ?????????????? ????  ??????????') { echo 'checked';} ?> value="???? ???????????? ?????????????? ????  ??????????" name="move_department" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>?????????? ?????? ???? ???????????? ???? ??????????<input  <?php if($staffServiceAction->move_department == '?????????? ?????? ???? ???????????? ???? ????????') { echo 'checked';} ?> value="?????????? ?????? ???? ???????????? ???? ????????" name="move_department" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ?????? ???????? ????????????????
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>?????? ???????????? ????????????????  <input value="?????? ???????????? ????????????????"  <?php if($staffServiceAction->employee_status == '?????? ???????????? ????????????????') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>?????????? ?????? ???????????? <input value="?????????? ?????? ????????????" <?php  if($staffServiceAction->employee_status == '?????????? ?????? ????????????') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                        <span>???? ?????????? <input value="???? ??????????" <?php if($staffServiceAction->employee_status == '???? ?????????? ') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        ???????????? ???????????? ???????????? ?? ??????????????
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

                                            <button class="btn btn-primary" type="submit">??????????</button>

                                        </center>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Container-fluid Ends-->

@endsection
