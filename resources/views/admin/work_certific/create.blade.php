@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection


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

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>




@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>شهاده خبره</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/work_certific/index'))}}">قائمه شهادات الخبره</a>
                        </li>
                        <li class="breadcrumb-item active">اضافه شهاده خبره</li>
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
                        <h5>اضافه شهاده خبره</h5>
                    </div>
                    @include('flash::message')
                    <div class="card-body">

                        <form class="card" action="{{url(route('admin/work_certific/store'))}}" method="post" enctype="multipart/form-data" >
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
                            <p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p>
                            <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                شهادة خبرة
                            </h2>
                            <h2 style="
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        font-size: 28px;
        font-weight: 700;
      ">
                                Work Certific
                            </h2>


                            <center >
                                <span style="color: orangered" class="error">{{ ($errors->first('job_title'))?$errors->first('job_title'). ' - ' : '' }} </span>
                                <span style="color: orangered" class="error">{{ ($errors->first('date'))?$errors->first('date'). ' - ' : '' }} </span>
                                <span style="color: orangered" class="error">{{ ($errors->first('start_work'))?$errors->first('start_work'). ' - ' : '' }} </span>
                                <span style="color: orangered" class="error">{{ ($errors->first('end_work'))?$errors->first('end_work'). ' - ' : '' }} </span>

                            </center>
                            <div class="outer__border">
                                <table>


                                    <thead>
                                    <tr>
                                        <td style="text-align: inherit; display: flex;">
                        <span>
التاريخ                        </span>
                                            &nbsp;
                                            &nbsp;
                                            <span >
                            <input name="date"  type="date">
                      </span>
                                        </td>
                                        <td>
                                            <span> :Date</span>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: inherit;">
                                            <div>
                                                اّذا تفيد شركة 
                                                <select name="staff_id" id="staff_id" style="width: 87%;">
                                                    <option  selected  disabled >-- يرجي تحديد الوظيفه   ----</option>
                                                    @foreach ($staffs as $staff )
                                                        <option  value="{{$staff->id }}">{{ $staff->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('staff_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                بأن السيد/______ <br> جنسيه كان يعمل لدينا بحسب البيانات الواردة أدناه
                                            </div>
                                        </td>
                                        <td>
                                            /.Copany certifies that Mr___________
                                            <br> nationality,wes employed by us according to
                                            <br> the terms listed below
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: inherit; display: flex;">
                        <span>
                            مسمي الموظيفي
                        </span>
                                            &nbsp;
                                            &nbsp;
                                            <span >
                            <input name="job_title"  type="text">
                      </span>
                                        </td>
                                        <td>
                                            :Job Title
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: inherit; display: flex;">
                        <span>
                             تاريخ بداء الخدمة
                        </span>
                                            &nbsp;
                                            &nbsp;
                                            <span >
                            <input name="start_work"  type="date">
                      </span>
                                        </td>
                                        <td>
                                            :Start of work
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: inherit; display: flex;">
                        <span>
                             تاريخ نهاية الخدمة
                        </span>
                                            &nbsp;
                                            &nbsp;
                                            <span >
                             <input name="end_work"  type="date">
                      </span>
                                        </td>
                                        <td>
                                            :End of work
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: inherit; display: flex;">
                                            <div>
                                                هذه الشهادة أصدرت للمذكور بناء علي طلبه لتقديمها لمن يمهمه
                                                <br> ألامر دون أنى مسؤولية علي الشركة.
                                            </div>
                                        </td>
                                        <td>
                                            This certificate is issued upon the employee’s
                                            <br> request to present to whoever is concerned without any liability towards the firm
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: inherit; display: flex;">
                                            <div>
                                                خصائي الموارد البشرية
                                            </div>
                                        </td>
                                        <td>
                                            :HR Specialist
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: inherit; display: flex;">
                                            <div>
                                                رئيس قسم الموارد البشرية و الشؤون الادارية
                                            </div>
                                        </td>
                                        <td>
                                            :HR & Admin .Head
                                        </td>
                                    </tr>
                                    </tbody>


                                </table>
                            </div>

                                <center> &nbsp;
                                 <button class="btn btn-primary" type="submit">اضافه</button>
                                </center>







                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
