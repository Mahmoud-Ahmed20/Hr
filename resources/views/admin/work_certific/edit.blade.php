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
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>?????????? ????????</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">???????? ????????????</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/work_certific/index'))}}">?????????? ???????????? ????????????</a>
                        </li>
                        <li class="breadcrumb-item active">?????????? ?????????? ????????</li>
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
                                <h5> ?????????? ?????????? ????????</h5>
                            </div>
                            <div class="card-body">


                                <form class="card" action="{{url(route('admin/work_certific/update', $current_data->id))}}" method="post" enctype="multipart/form-data">
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
                                    <p style="font-weight: 700">?????????? ?????????????? ?????????????? ?????????????? ????????????????</p>
                                    <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                        ?????????? ????????
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
??????????????                        </span>
                                                    &nbsp;
                                                    &nbsp;
                                                    <span >
                            <input value="{{$current_data->date}}" name="date"  type="date">
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
                                                        ???????? ???????? ????????
                                                        <select name="staff_id" id="staff_id" style="width: 87%;">
                                                            <option disabled >-- ???????? ?????????? ??????????????   ----</option>
                                                            @foreach ($staffs as $staff )
                                                                <option  value="{{$staff->id }}" {{ $current_data->staff_id == $staff->id ? "selected" : ""}}>{{ $staff->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('staff_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        ?????? ??????????/______ <br> ?????????? ?????? ???????? ?????????? ???????? ???????????????? ?????????????? ??????????
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
                            ???????? ????????????????
                        </span>
                                                    &nbsp;
                                                    &nbsp;
                                                    <span >
                            <input value="{{$current_data->job_title}}" name="job_title"  type="text">
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
                             ?????????? ???????? ????????????
                        </span>
                                                    &nbsp;
                                                    &nbsp;
                                                    <span >
                            <input value="{{$current_data->start_work}}" name="start_work"  type="date">
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
                             ?????????? ?????????? ????????????
                        </span>
                                                    &nbsp;
                                                    &nbsp;
                                                    <span >
                             <input value="{{$current_data->end_work}}" name="end_work"  type="date">
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
                                                        ?????? ?????????????? ?????????? ?????????????? ???????? ?????? ???????? ???????????????? ?????? ??????????
                                                        <br> ?????????? ?????? ?????? ?????????????? ?????? ????????????.
                                                    </div>
                                                </td>
                                                <td>
                                                    This certificate is issued upon the employee???s
                                                    <br> request to present to whoever is concerned without any liability towards the firm
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tbody>
                                            <tr>
                                                <td style="text-align: inherit; display: flex;">
                                                    <div>
                                                        ?????????? ?????????????? ??????????????
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
                                                        ???????? ?????? ?????????????? ?????????????? ?? ???????????? ????????????????
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
                                        <button class="btn btn-primary" type="submit">??????????</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
