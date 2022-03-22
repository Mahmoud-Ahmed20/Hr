@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection

@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        .outer__border {
            border: 5px solid #222;
            padding: 2px;
            margin-bottom: 5px;
        }

        .outer__border>div {
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

        .select_data {
            width: 100%;
            font-size: 17px;
            text-align: center;
        }
    </style>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>اشعار بغياب موظف</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/notice_absence_employee/index'))}}">قائمه اشعار بغياب موظف</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل اشعار بغياب موظف</li>
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
                                <h5> تعديل اشعار بغياب موظف</h5>
                            </div>
                            <div class="card-body">


                                <form class="card" action="{{url(route('admin/notice_absence_employee/update', $current_data->id))}}" method="post" enctype="multipart/form-data">
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
                                    <center>                            <p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p>
                                    </center>                            <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                        اشعار بغياب موظف
                                    </h2>
                                    <h2 style="
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        font-size: 28px;
        font-weight: 700;
      ">
                                        Notice of absence of an employee
                                    </h2>

                                    <center >
                                        <span style="color: orangered" class="error">{{ ($errors->first('staff_number'))?$errors->first('staff_number'). ' - ' : '' }} </span>
                                        <span style="color: orangered" class="error">{{ ($errors->first('staff_id'))?$errors->first('staff_id'). ' - ' : '' }} </span>
                                        <span style="color: orangered" class="error">{{ ($errors->first('section_id'))?$errors->first('section_id'). ' - ' : '' }} </span>
                                        <span style="color: orangered" class="error">{{ ($errors->first('job_id'))?$errors->first('job_id'). ' - ' : '' }} </span>

                                    </center>
                                    <div class="outer__border">
                                        <div>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="flex__td">
                                                            <span>اسم الموظف</span>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="flex__td">
                                                            <span>رقم الموظف</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="select_data" name="staff_id" >
                                                            <option  selected  disabled>-- يرجي تحديد اسم الموظف   ----</option>
                                                            <?php
                                                            foreach ($staffs as $onestaff){
                                                            ?>
                                                            <option  <?php if($current_data->staff_id == $onestaff->id) { echo 'selected';} ?>    value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                            <?php } ?> </select>
                                                    </td>
                                                    <td><input value="{{$current_data->staff_number}}" name="staff_number" type="number" /></td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>

                                                    <td>
                                                        <div class="flex__td">
                                                            <span>القسم</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex__td">
                                                            <span>الوظيفة</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="flex__td">
                                                            <span>التاريخ</span>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="select_data" name="section_id" >
                                                            <option  selected  disabled>-- يرجي تحديد القسم   ----</option>
                                                            <?php
                                                            foreach ($sections as $onesection){
                                                            ?>
                                                            <option   <?php if($current_data->section_id == $onesection->id) { echo 'selected';} ?>   value="{{$onesection->id}}">{{$onesection->name}}</option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="job_id" class="select_data"  >
                                                            <option  selected  disabled>-- يرجي تحديد الوظيفة   ----</option>
                                                            <?php
                                                            foreach ($jobs as $onejob){
                                                            ?>
                                                            <option   <?php if($current_data->job_id == $onejob->id) { echo 'selected';} ?>   value="{{$onejob->id}}">{{$onejob->name_job}}</option>
                                                            <?php } ?></select>
                                                    </td>
                                                    <td>
                                                        <input value="{{$current_data->date}}" name="date" type="date">
                                                    </td>
                                                </tr>

                                            </table>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <h3>
                                                            أقر انا الموضح أسمي أعلاه بأنني قد تغيبت عن العمل في هذا التاريخ و علب هذا إقرار مني بذ لك
                                                        </h3>
                                                    </td>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>


                                    <center> &nbsp;
                                        <button class="btn btn-primary" type="submit">تعديل</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
