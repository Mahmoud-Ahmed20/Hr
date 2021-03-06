@extends('layouts.admin.home')
<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection
<!-- content -->
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
    </style>
@endsection
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">


                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>????????????????</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">???????? ????????????</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/staffs/index'))}}">?????????? ????????????????</a>
                        </li>
                        <li class="breadcrumb-item active">?????????? ????????</li>
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
                                <i class="mdi mdi-printer ml-1"></i>??????????
                            </button>
                        </h5>
                    </div>
                    <div class="card-body" >
                        <div class=" main-content-body-invoice" id="print">
                            @isset($staff)
                                <header style="text-align: center; margin-bottom: 20px">
                                    <div class="header__logo">
                                        <h1>
                                            ???????? ???? ????
                                            <span>?????????????? ?????????????? <br />
                                                ???????????????????? ????????????????
                                            </span>
                                        </h1>
                                        <div style="margin: 0 20px; width: 120px">
                                            <img src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt="logo" />
                                        </div>
                                    </div>
                                </header>
                                <p style="font-weight: 700">?????????? ?????????????? ?????????????? ?????????????? ????????????????</p>
                                <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                    <span>?????????? ?????????? ???????????? </span> <span>Data Refreshing</span>
                                </h2>
                                <div class="outer__border">
                                    <div>
                                        <h2 class="flex__td"
                                            style="justify-content: space-around; margin: 0 0 5px 0; border-bottom: 5px solid #222; padding: 5px 0;">
                                            <span>?????? ?????????????? ?????? ???????? ?????????????? ??????????????</span>
                                            <span>Answer all the questions. Do not leave blank</span>
                                        </h2>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????? ??????????</span>
                                                        <span>Your Full name</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????????</span>
                                                        <span>ID No</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="name" value="{{ $staff->name }}" type="text" disabled>
                                                    @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="id_number" value="{{ $staff->id_number }}" type="text">
                                                    @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????????????</span>
                                                        <span>Job title</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????????</span>
                                                        <span>Section</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????????????</span>
                                                        <span>Nationality</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="job_title" value="{{ optional($staff->job)->name_job }}" type="text">
                                                    @error('job_title')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="section" value="{{optional($staff->NameSections)->name}}" type="text">
                                                    @error('section')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="nationality" value="{{optional($staff->nationality)->name_nationality}}" type="text">
                                                    @error('nationality')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ?????????? ????????????</span>
                                                        <span>ID / No</span>
                                                    </div>
                                                </td>
                                                <td rowspan="6"></td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????? ??????????????</span>
                                                        <span>Date of birth</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="card_id" value="{{ optional($staff->cardId)->card_id }}" type="number">
                                                    <input disabled name="cardRow_id" value="{{ optional($staff->cardId)->id }}" type="hidden">
                                                    @error('card_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="date_of_birth" value="{{ $staff->date_of_birth }}" type="date">
                                                    @error('date_of_birth')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????? ??????????????</span>
                                                        <span>Place of issue</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????????????</span>
                                                        <span>Religion</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="card_place_of_issue" value="{{ optional($staff->cardId)->place_of_issue }}" type="text">
                                                    @error('card_place_of_issue')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="religion" value="{{ $staff->religion }}" type="text">
                                                    @error('religion')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????? ??????????????</span>
                                                        <span>Date of issue</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????????? ????????????????????</span>
                                                        <span>Matrital status</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="card_date_of_issue" value="{{ optional($staff->cardId)->date_of_issue }}" type="date">
                                                    @error('card_date_of_issue')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="marital_status" value="{{ $staff->marital_status }}" type="text">
                                                    @error('marital_status')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????? ????????????</span>
                                                        <span>Home phone no</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>????????????</span>
                                                        <span>Mobile no</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="home_phone" value="{{ $staff->home_phone }}" type="text">
                                                    @error('home_phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="mobile" value="{{ $staff->mobile }}" type="text">
                                                    @error('mobile')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????????? ????????????</span>
                                                        <span>Present address</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>????????????</span>
                                                        <span>Post</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="present_adderss" value="{{ $staff->present_adderss }}" type="text">
                                                    @error('present_adderss')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="post" value="{{ $staff->post }}" type="text">
                                                    @error('post')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="flex__td">
                                                        <span>
                                                            <span>???????? ???????????? ??</span><br>
                                                        </span>
                                                        <span>
                                                            <span>
                                                                ????????????
                                                                <input disabled name="salary_system" value="1" type="radio" style="margin: 0 5px; width: auto;" {{ $staff->salary_system == 1 ? 'checked' : '' }}> By Month
                                                            </span> <br>
                                                            <span>
                                                                ??????????????
                                                                <input disabled name="salary_system" value="2" type="radio" style="margin: 0 5px; width: auto;" {{ $staff->salary_system == 2 ? 'checked' : '' }}> By Piece
                                                                @error('salary_system')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </span>
                                                        </span>
                                                        <span dir="ltr">
                                                            <span>Salary System ?</span><br>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="flex__td">
                                                        <span>
                                                            <span>???? ???????? ??????????</span><br>
                                                            <span>?????? ???????? ?????????????? ???????? ?????? ?????????????????? ??????????????</span>
                                                        </span>
                                                        <span>
                                                            <span>???? <input disabled name="have_you_any_dependents" value="0" type="radio" style="margin: 0 5px; width: auto;" {{ $staff->have_you_any_dependents == 0 ? 'checked' : '' }}> No</span> <br>
                                                            <span>
                                                                ??????
                                                                <input disabled name="have_you_any_dependents" value="1" type="radio" style="margin: 0 5px; width: auto;" {{ $staff->have_you_any_dependents == 1 ? 'checked' : '' }}> Yes
                                                                @error('have_you_any_dependents')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </span>
                                                        </span>
                                                        <span dir="ltr">
                                                            <span>Have you and dependents ?</span><br>
                                                            <span>If answer is yes Please state following</span>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="flex__td">
                                                        <span>?????????? ??????????????</span>
                                                        <span>Their residence address</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <textarea name="dependents_address" rows="5">{{ $staff->dependents_address }}</textarea>
                                                    @error('dependents_address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="flex__td" style="justify-content: space-around;">
                                                        <span>?????? ?????????? ??????????????</span>
                                                        <span>Your Last job</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span style="width: 48%;">
                                                            <div class="flex__td">
                                                                <span>????</span>
                                                                <span>From</span>
                                                            </div>
                                                        </span>
                                                        <span style="width: 48%;">
                                                            <div class="flex__td">
                                                                <span>??????</span>
                                                                <span>To</span>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????? ??????????????</span>
                                                        <span>Job title</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????????? ??????????????</span>
                                                        <span>Basic salary</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span style="width: 48%;">
                                                            <input disabled name="from" value="{{ optional($staff->lastJob)->from }}" type="date">
                                                            <input disabled name="lastJob_id" value="{{ optional($staff->lastJob)->id }}" type="hidden">
                                                            @error('from')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </span>
                                                        <span style="width: 48%;">
                                                            <input disabled name="to" value="{{ optional($staff->lastJob)->to }}" type="date">
                                                            @error('to')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input disabled name="job_title_last_job" value="{{ optional($staff->lastJob)->job_title }}" type="text">
                                                    @error('job_title_last_job')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="bisic_salary" value="{{ optional($staff->lastJob)->bisic_salary }}" type="number">
                                                    @error('bisic_salary')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ????????????</span>
                                                        <span>Name of company</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????????????</span>
                                                        <span>Allowance</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="company_name" value="{{ optional($staff->lastJob)->company_name }}" type="text">
                                                    @error('company_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td></td>
                                                <td>
                                                    <input disabled name="allowance" value="{{ optional($staff->lastJob)->allowance }}" type="number">
                                                    @error('allowance')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????????? ????????????????</span>
                                                        <span>Address & Telephone No</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????????? ???? ??????????????</span>
                                                        <span>Description of your duties</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ?????? ??????????</span>
                                                        <span>Reason for leaving</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div style="margin-bottom: 5px">
                                                        <input disabled name="phone" value="{{ optional($staff->lastJob)->phone }}" type="number" placeholder="????????????"/>
                                                        @error('phone')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <textarea name="address" rows="5" placeholder="??????????????">{{ optional($staff->lastJob)->address }}</textarea>
                                                        @error('address')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <textarea name="description_for_your_duties" rows="5">{{ optional($staff->lastJob)->description_for_your_duties }}</textarea>
                                                    @error('description_for_your_duties')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <textarea name="reason_for_leaving" rows="5">{{ optional($staff->lastJob)->reason_for_leaving }}</textarea>
                                                    @error('reason_for_leaving')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td colspan="3">
                                                    <div class="flex__td">
                                                        <span>???????? ??????????????</span>
                                                        <span>DRIVING LICENCE</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????????</span>
                                                        <span>Category</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????????</span>
                                                        <span>Number</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????? ????????????</span>
                                                        <span>Date of issue</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="category" value="{{ optional($staff->drivingLicence)->category }}" type="text">
                                                    <input disabled name="drivingLicence_id" value="{{ optional($staff->drivingLicence)->id }}" type="hidden">
                                                    @error('category')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="number" value="{{ optional($staff->drivingLicence)->number }}" type="number">
                                                    @error('number')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="date_of_issue" value="{{ optional($staff->drivingLicence)->date_of_issue }}" type="date">
                                                    @error('date_of_issue')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????? ????????????????</span>
                                                        <span>Expiry date</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????? ??????????????</span>
                                                        <span>Place of issue</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????? ????????</span>
                                                        <span>Blood group</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="expiry_date" value="{{ optional($staff->drivingLicence)->expiry_date }}" type="date">
                                                    @error('expiry_date')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="place_of_issue" value="{{ optional($staff->drivingLicence)->place_of_issue }}" type="text">
                                                    @error('place_of_issue')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="blood_group" value="{{ optional($staff->drivingLicence)->blood_group }}" type="text">
                                                    @error('blood_group')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <th rowspan="2">
                                                    <span>?????? ???????? ??????????</span><br>
                                                    <span>Last Qualification</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>?????? ?????????????? / ??????????????</span><br>
                                                    <span>Name of school / university</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>?????????????? / ??????????</span><br>
                                                    <span>City / Country</span>
                                                </th>
                                                <th colspan="2">
                                                    ?????? ?????????????? Duration of study
                                                </th>
                                                <th rowspan="2">
                                                    ????????????
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>????</span>
                                                        <span>From</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>??????</span>
                                                        <span>To</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input disabled name="qualification" value="{{ optional($staff->qualification)->qualification }}" type="text">
                                                    <input disabled name="qualification_id" value="{{ optional($staff->qualification)->id }}" type="hidden">
                                                    @error('qualification')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="place_name" value="{{ optional($staff->qualification)->place_name }}" type="text">
                                                    @error('place_name')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <div style="margin-bottom: 5px">
                                                        <input disabled name="country" value="{{ optional($staff->qualification)->country }}" type="text" placeholder="??????????"/>
                                                        @error('country')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <input disabled name="city" value="{{ optional($staff->qualification)->city }}" type="text" placeholder="??????????????"/>
                                                        @error('city')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <input disabled name="from_qualification" value="{{ optional($staff->qualification)->from }}" type="date">
                                                    @error('from_qualification')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="to_qualification" value="{{optional($staff->qualification)->to }}" type="date">
                                                    @error('to_qualification')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input disabled name="specialize" value="{{ optional($staff->qualification)->specialize }}" type="text">
                                                    @error('specialize')
                                                        <span calss="text-danger">{{$message}}</span>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????????? ?????????????? ????????????</span>
                                                        <span>Current basic salary</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ???????? ??????????</span>
                                                        <span>First basic salary</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $currentSalary = $staff->salaries->where('type', 1)->first() ?>
                                            <?php $previousSalary = $staff->salaries->where('type', 0)->first() ?>
                                            <td><input disabled name="salaries[1][salary_id]" value="{{ optional($currentSalary)->id }}" type="hidden"></td>
                                            <td><input disabled name="salaries[0][salary_id]" value="{{ optional($previousSalary)->id }}" type="hidden"></td>
                                            <tr>
                                                <td><input disabled name="salaries[1][salary]" value="{{ optional($currentSalary)->salary }}" type="number"></td>
                                                <td><input disabled name="salaries[0][salary]" value="{{ optional($previousSalary)->salary }}" type="number"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ?????????? ????????????</span>
                                                        <span>Current housing</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ?????? ??????</span>
                                                        <span>First housing</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input disabled name="salaries[1][current_housing]" value="{{ optional($currentSalary)->current_housing }}" type="number"></td>
                                                <td><input disabled name="salaries[0][current_housing]" value="{{ optional($previousSalary)->current_housing }}" type="number"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ?????????????????? ????????????</span>
                                                        <span>Current transportation</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ?????? ??????????????</span>
                                                        <span>First transportation</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input disabled name="salaries[1][current_transportation]" value="{{ optional($currentSalary)->current_transportation }}" type="number"></td>
                                                <td><input disabled name="salaries[0][current_transportation]" value="{{ optional($previousSalary)->current_transportation }}" type="number"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????????? ????????????</span>
                                                        <span>Other Allowance</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????????????? ????????????</span>
                                                        <span>Other Allowance</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input disabled name="salaries[1][other_allowances]" value="{{ optional($currentSalary)->other_allowances }}" type="number"></td>
                                                <td><input disabled name="salaries[0][other_allowances]" value="{{ optional($previousSalary)->other_allowances }}" type="number"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>???????????????? ????????????</span>
                                                        <span>Current Total salary</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>?????? ????????????</span>
                                                        <span>First Total alary</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input disabled type="text"></td>
                                                <td><input disabled type="text"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endisset
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
