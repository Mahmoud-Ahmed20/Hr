@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection

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

@endsection




@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>?????????? ??????????????</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">???????? ????????????</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/job_description/index'))}}"> ?????????? ?????????? ??????????????  </a>
                        </li>
                        <li class="breadcrumb-item active">?????????? ?????? ??????????</li>
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
                        <h5>?????????? ?????? ??????????</h5>
                    </div>
                    @include('flash::message')
                    <div class="card-body">

                        <form class="card" action="{{url(route('admin/job_description/store'))}}" method="post" enctype="multipart/form-data" >
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
<center>                            <p style="font-weight: 700">?????????? ?????????????? ?????????????? ?????????????? ????????????????</p>
</center>                            <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                ?????? ??????????
                            </h2>
                            <h2 style="
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        font-size: 28px;
        font-weight: 700;
      ">
                                Job Description
                            </h2>


                            <center >
                                <span style="color: orangered" class="error">{{ ($errors->first('job_title'))?$errors->first('job_title'). ' - ' : '' }} </span>
                                <span style="color: orangered" class="error">{{ ($errors->first('staff_id'))?$errors->first('staff_id'). ' - ' : '' }} </span>
                                <span style="color: orangered" class="error">{{ ($errors->first('section_id'))?$errors->first('section_id'). ' - ' : '' }} </span>
                                <span style="color: orangered" class="error">{{ ($errors->first('department_id'))?$errors->first('department_id'). ' - ' : '' }} </span>

                            </center>
                            <div class="outer__border">
                                <div>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>?????? ????????????</span>
                                                    <span>Name</span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="flex__td">
                                                    <span>???????? ??????????????</span>
                                                    <span>Job title</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select  class="select_data" name="staff_id" >
                                                    <option  selected  disabled>-- ???????? ?????????? ?????? ????????????   ----</option>
                                                    <?php
                                                    foreach ($staffs as $onestaff){
                                                    ?>
                                                    <option     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td><input name="job_title" type="text" /></td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>

                                            <td>
                                                <div class="flex__td">
                                                    <span>??????????????</span>
                                                    <span>Department</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex__td">
                                                    <span>??????????</span>
                                                    <span>Section</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="select_data" name="administration_id" >
                                                    <option  selected  disabled>-- ???????? ?????????? ??????????????   ----</option>
                                                    <?php
                                                    foreach ($administrations as $oneadministration){
                                                    ?>
                                                    <option     value="{{$oneadministration->id}}">{{$oneadministration->name_administration}}</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="select_data" name="section_id" >
                                                    <option  selected  disabled>-- ???????? ?????????? ??????????   ----</option>
                                                    <?php
                                                    foreach ($sections as $oneSection){
                                                    ?>
                                                    <option     value="{{$oneSection->id}}">{{$oneSection->name}}</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>?????? ???????????? ??????????????</span>
                                                    <span> Direct Manager Name</span>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><input name="direct_manager_name" type="text" /></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="outer__border">
                                <div>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>?????????????? ??????????????</span>
                                                    <span>The Follower Occupations</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input name="follower_occupations" type="text" /></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span> ?????????? ???? ??????????????</span>
                                                    <span>The aim from the job</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="aim_from_job" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>  ???????????? ?? ?????????????????? ?????????????? </span>
                                                    <span>Functions and duties of job</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><textarea name="functions_and_duties_job" rows="5"></textarea></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>???????? ?????????? ???????????? ????????????????</span>
                                                    <span>The special circumstances of the work</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><textarea name="special_circumstances" rows="3"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>???????????????? ????????????????</span>
                                                    <span>Job Relations</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="job_relations" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>?????????????? ???????? ??????????????</span>
                                                    <span>Occupant specifications the job</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="occupant_specifications" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span> ???????????????? ?? ???????????? </span>
                                                    <span>Skills and language</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="skills_and_language" type="text">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                                <center> &nbsp;
                                 <button class="btn btn-primary" type="submit">??????????</button>
                                </center>

{{--                            </div>--}}





                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
