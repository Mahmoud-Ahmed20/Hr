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
                        <h3>الوصف الوظيفي</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/job_description/index'))}}">قائمة الوصف الوظيفي</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل الوصف الوظيفي</li>
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
                        <h5>
                            <button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
                                <i class="mdi mdi-printer ml-1"></i>طباعة
                            </button>
                            </h5>
                    </div>
                    <div class="card-body" >


                         <div id="print">
                             <header style="text-align: center; margin-bottom: 5px">
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
                                <h2 style="margin-bottom: 15px; font-weight: 600">
                                    Business Trip and transfer Request Form
                                </h2>



                                <div class="flex__td" style="font-weight: 600">
        <span style="border-bottom: 2px solid #222"
        >يتم تعبئة النموذج قبل 3 ايام لمهمة داخلية واسبوعين لمهمة خارجية</span
        >
                                    <span
                                    >To be filled 3 days & 2 weeks prior to local & overseas trips</span
                                    >

                                </div>
                                <h3
                                    style="
          margin: 0 auto 0 0;
          border-bottom: 2px solid #222;
          width: fit-content;
        "
                                >
                                    respectively
                                </h3>
                            </header>


                            <div class="outer__border">
                                <div>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>اسم الموظف</span>
                                                    <span>Name</span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="flex__td">
                                                    <span>مسمي الوظيفة</span>
                                                    <span>Job title</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{($onestaff)?$onestaff->name:''}}

                                            </td>
                                            <td>{{$employe->job_title}}</td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>

                                            <td>
                                                <div class="flex__td">
                                                    <span>الادارة</span>
                                                    <span>Department</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex__td">
                                                    <span>القسم</span>
                                                    <span>Section</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{($oneadministration)?$oneadministration->name_administration : ''}}
                                            </td>
                                            <td>
{{--                                                {{dd(var_dump($onesection))}}--}}
                                            {{($onesection)?$onesection->name : ''}}
                                            </td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>اسم الرئيس المباشر</span>
                                                    <span> Direct Manager Name</span>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>{{$employe->direct_manager_name}}</td>
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
                                                    <span>الوظائف التابعة</span>
                                                    <span>The Follower Occupations</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{$employe->follower_occupations}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span> الهدف من الوظيفة</span>
                                                    <span>The aim from the job</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{$employe->aim_from_job}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>  المهام و الوواجبات الوظيفة </span>
                                                    <span>Functions and duties of job</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><?php echo $employe->functions_and_duties_job ; ?></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>ظروف العمل الخاصة بالوظيفة</span>
                                                    <span>The special circumstances of the work</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><?php echo $employe->special_circumstances ; ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>العلاقات الوظيفية</span>
                                                    <span>Job Relations</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{$employe->job_relations}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span>مواصفات شاغل الوظيفة</span>
                                                    <span>Occupant specifications the job</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{$employe->occupant_specifications}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex__td">
                                                    <span> المهارات و اللغات </span>
                                                    <span>Skills and language</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                {{$employe->skills_and_language}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
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
