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
                        <h3>الموظفين</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/staffs/index'))}}">الموظفين</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل موظفين</li>
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
                            @isset($staff)
                                <div class="card-body">
                                    <form class="card" action="{{url(route('admin/staffs/update', $staff->id))}}" method="post" enctype="multipart/form-data">
                                        @include('flash::message')
                                        @csrf
                                        <div class="digital-add needs-validation">
                                            <header style="text-align: center; margin-bottom: 20px">
                                                <div class="header__logo">
                                                    <h1>
                                                        مصنع تي إم
                                                        <span>للملابس الجاهزة <br />
                                                            والتوريدات الفندقية
                                                        </span>
                                                    </h1>
                                                    <div style="margin: 0 20px; width: 120px">
                                                        <img src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt="logo" />
                                                    </div>
                                                </div>
                                            </header>
                                            <p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p>
                                            <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                                <span>نموذج تحديث بيانات </span> <span>Data Refreshing</span>
                                            </h2>
                                            <div class="outer__border">
                                                <div>
                                                    <h2 class="flex__td"
                                                        style="justify-content: space-around; margin: 0 0 5px 0; border-bottom: 5px solid #222; padding: 5px 0;">
                                                        <span>يجب الاجابة علي جميع الاسئلة الواردة</span>
                                                        <span>Answer all the questions. Do not leave blank</span>
                                                    </h2>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الاسم رباعي</span>
                                                                    <span>Your Full name</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الرقم</span>
                                                                    <span>ID No</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="name" value="{{ $staff->name }}" type="text">
                                                                @error('name')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="id_number" value="{{ $staff->id_number }}" type="text">
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
                                                                    <span>الوظيفة</span>
                                                                    <span>Job title</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>القسم</span>
                                                                    <span>Section</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الجنسية</span>
                                                                    <span>Nationality</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select name="job_id" id="job_id" class="form-control">
                                                                    <option value="{{ $staff->job_id }}">{{optional($staff->job)->name_job}}</option>
                                                                </select>
                                                                @error('job_id')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select name="section_id" id="section_id" class="form-control">
                                                                    <option value="{{ $staff->section_id }}">{{optional($staff->NameSections)->name}}</option>
                                                                </select>
                                                                @error('section_id')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select name="nationality_id" id="nationality_id" class="form-control">
                                                                    <option value="{{ $staff->nationality_id }}">{{optional($staff->nationality)->name_nationality}}</option>
                                                                </select>
                                                                @error('nationality_id')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>رقم الرقم القومي</span>
                                                                    <span>ID / No</span>
                                                                </div>
                                                            </td>
                                                            <td rowspan="6"></td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>تاريخ الميلاد</span>
                                                                    <span>Date of birth</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="card_id" value="{{ optional($staff->cardId)->card_id }}" type="number">
                                                                <input name="cardRow_id" value="{{ optional($staff->cardId)->id }}" type="hidden">
                                                                @error('card_id')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="date_of_birth" value="{{ $staff->date_of_birth }}" type="date">
                                                                @error('date_of_birth')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>مكان الاصدار</span>
                                                                    <span>Place of issue</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الديانة</span>
                                                                    <span>Religion</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="card_place_of_issue" value="{{ optional($staff->cardId)->place_of_issue }}" type="text">
                                                                @error('card_place_of_issue')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="religion" value="{{ $staff->religion }}" type="text">
                                                                @error('religion')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>تاريخ الاصدار</span>
                                                                    <span>Date of issue</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الحالة الاجتماعية</span>
                                                                    <span>Matrital status</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="card_date_of_issue" value="{{ optional($staff->cardId)->date_of_issue }}" type="date">
                                                                @error('card_date_of_issue')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="marital_status" value="{{ $staff->marital_status }}" type="text">
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
                                                                    <span>هاتف المنزل</span>
                                                                    <span>Home phone no</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الجوال</span>
                                                                    <span>Mobile no</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="home_phone" value="{{ $staff->home_phone }}" type="text">
                                                                @error('home_phone')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="mobile" value="{{ $staff->mobile }}" type="text">
                                                                @error('mobile')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>العنوان الحالي</span>
                                                                    <span>Present address</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>البريد</span>
                                                                    <span>Post</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="present_adderss" value="{{ $staff->present_adderss }}" type="text">
                                                                @error('present_adderss')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="post" value="{{ $staff->post }}" type="text">
                                                                @error('post')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="flex__td">
                                                                    <span>
                                                                        <span>نظام المرتب ؟</span><br>
                                                                    </span>
                                                                    <span>
                                                                        <span>
                                                                            بالشهر
                                                                            <input name="salary_system" value="1" type="radio" style="margin: 0 5px; width: auto;" {{ $staff->salary_system == 1 ? 'checked' : '' }}> By Month
                                                                        </span> <br>
                                                                        <span>
                                                                            بالقطعه
                                                                            <input name="salary_system" value="2" type="radio" style="margin: 0 5px; width: auto;" {{ $staff->salary_system == 2 ? 'checked' : '' }}> By Piece
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
                                                                        <span>هل تعول احدا؟</span><br>
                                                                        <span>اذا كانت الاجابة بنعم بين المعلومات التالية</span>
                                                                    </span>
                                                                    <span>
                                                                        <span>لا <input name="have_you_any_dependents" value="0" type="radio" style="margin: 0 5px; width: auto;" {{ $staff->have_you_any_dependents == 0 ? 'checked' : '' }}> No</span> <br>
                                                                        <span>
                                                                            نعم
                                                                            <input name="have_you_any_dependents" value="1" type="radio" style="margin: 0 5px; width: auto;" {{ $staff->have_you_any_dependents == 1 ? 'checked' : '' }}> Yes
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
                                                                    <span>عنوان اقامتهم</span>
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
                                                                    <span>اخر وظيفة مارستها</span>
                                                                    <span>Your Last job</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span style="width: 48%;">
                                                                        <div class="flex__td">
                                                                            <span>من</span>
                                                                            <span>From</span>
                                                                        </div>
                                                                    </span>
                                                                    <span style="width: 48%;">
                                                                        <div class="flex__td">
                                                                            <span>الي</span>
                                                                            <span>To</span>
                                                                        </div>
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>مسمي الوظيفة</span>
                                                                    <span>Job title</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الراتب الاساسي</span>
                                                                    <span>Basic salary</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span style="width: 48%;">
                                                                        <input name="from" value="{{ optional($staff->lastJob)->from }}" type="date">
                                                                        <input name="lastJob_id" value="{{ optional($staff->lastJob)->id }}" type="hidden">
                                                                        @error('from')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </span>
                                                                    <span style="width: 48%;">
                                                                        <input name="to" value="{{ optional($staff->lastJob)->to }}" type="date">
                                                                        @error('to')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input name="job_title_last_job" value="{{ optional($staff->lastJob)->job_title }}" type="text">
                                                                @error('job_title_last_job')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="bisic_salary" value="{{ optional($staff->lastJob)->bisic_salary }}" type="number">
                                                                @error('bisic_salary')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>اسم الشركة</span>
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
                                                                    <span>البدلات</span>
                                                                    <span>Allowance</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="company_name" value="{{ optional($staff->lastJob)->company_name }}" type="text">
                                                                @error('company_name')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <input name="allowance" value="{{ optional($staff->lastJob)->allowance }}" type="number">
                                                                @error('allowance')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الهاتف والعنوان</span>
                                                                    <span>Address & Telephone No</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>تفاصيل عن واجباتك</span>
                                                                    <span>Description of your duties</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>سبب ترك العمل</span>
                                                                    <span>Reason for leaving</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div style="margin-bottom: 5px">
                                                                    <input name="phone" value="{{ optional($staff->lastJob)->phone }}" type="number" placeholder="الهاتف"/>
                                                                    @error('phone')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                <div>
                                                                    <textarea name="address" rows="5" placeholder="العنوان">{{ optional($staff->lastJob)->address }}</textarea>
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
                                                                    <span>رخصة القيادة</span>
                                                                    <span>DRIVING LICENCE</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>نوعها</span>
                                                                    <span>Category</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>رقمها</span>
                                                                    <span>Number</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>تاريخ صدورها</span>
                                                                    <span>Date of issue</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="category" value="{{ optional($staff->drivingLicence)->category }}" type="text">
                                                                <input name="drivingLicence_id" value="{{ optional($staff->drivingLicence)->id }}" type="hidden">
                                                                @error('category')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="number" value="{{ optional($staff->drivingLicence)->number }}" type="number">
                                                                @error('number')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="date_of_issue" value="{{ optional($staff->drivingLicence)->date_of_issue }}" type="date">
                                                                @error('date_of_issue')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>تاريخ انتهائها</span>
                                                                    <span>Expiry date</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>مكان الاصدار</span>
                                                                    <span>Place of issue</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>فصيلة الدم</span>
                                                                    <span>Blood group</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="expiry_date" value="{{ optional($staff->drivingLicence)->expiry_date }}" type="date">
                                                                @error('expiry_date')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="place_of_issue" value="{{ optional($staff->drivingLicence)->place_of_issue }}" type="text">
                                                                @error('place_of_issue')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="blood_group" value="{{ optional($staff->drivingLicence)->blood_group }}" type="text">
                                                                @error('blood_group')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th rowspan="2">
                                                                <span>اخر مؤهل دراسي</span><br>
                                                                <span>Last Qualification</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>اسم المدرسة / الجامعة</span><br>
                                                                <span>Name of school / university</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>المدينة / البلد</span><br>
                                                                <span>City / Country</span>
                                                            </th>
                                                            <th colspan="2">
                                                                مدة الدراسة Duration of study
                                                            </th>
                                                            <th rowspan="2">
                                                                التخصص
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>من</span>
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
                                                            <td>
                                                                <input name="qualification" value="{{ optional($staff->qualification)->qualification }}" type="text">
                                                                <input name="qualification_id" value="{{ optional($staff->qualification)->id }}" type="hidden">
                                                                @error('qualification')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="place_name" value="{{ optional($staff->qualification)->place_name }}" type="text">
                                                                @error('place_name')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <div style="margin-bottom: 5px">
                                                                    <input name="country" value="{{ optional($staff->qualification)->country }}" type="text" placeholder="البلد"/>
                                                                    @error('country')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                <div>
                                                                    <input name="city" value="{{ optional($staff->qualification)->city }}" type="text" placeholder="المدينة"/>
                                                                    @error('city')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input name="from_qualification" value="{{ optional($staff->qualification)->from }}" type="date">
                                                                @error('from_qualification')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="to_qualification" value="{{optional($staff->qualification)->to }}" type="date">
                                                                @error('to_qualification')
                                                                    <span calss="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="specialize" value="{{ optional($staff->qualification)->specialize }}" type="text">
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
                                                                    <span>الراتب الاساسي الحالي</span>
                                                                    <span>Current basic salary</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>اول راتب اساسي</span>
                                                                    <span>First basic salary</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php $currentSalary = $staff->salaries->where('type', 1)->first() ?>
                                                        <?php $previousSalary = $staff->salaries->where('type', 0)->first() ?>
                                                        <td><input name="salaries[1][salary_id]" value="{{ optional($currentSalary)->id }}" type="hidden"></td>
                                                        <td><input name="salaries[0][salary_id]" value="{{ optional($previousSalary)->id }}" type="hidden"></td>
                                                        <tr>
                                                            <td><input name="salaries[1][salary]" value="{{ optional($currentSalary)->salary }}" type="number"></td>
                                                            <td><input name="salaries[0][salary]" value="{{ optional($previousSalary)->salary }}" type="number"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>بدل السكن الحالي</span>
                                                                    <span>Current housing</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>اول بدل سكن</span>
                                                                    <span>First housing</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input name="salaries[1][current_housing]" value="{{ optional($currentSalary)->current_housing }}" type="number"></td>
                                                            <td><input name="salaries[0][current_housing]" value="{{ optional($previousSalary)->current_housing }}" type="number"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>بدل المواصلات الحالي</span>
                                                                    <span>Current transportation</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>اول بدل مواصلات</span>
                                                                    <span>First transportation</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input name="salaries[1][current_transportation]" value="{{ optional($currentSalary)->current_transportation }}" type="number"></td>
                                                            <td><input name="salaries[0][current_transportation]" value="{{ optional($previousSalary)->current_transportation }}" type="number"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>البدلات الاخري</span>
                                                                    <span>Other Allowance</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>البدلات الاخري</span>
                                                                    <span>Other Allowance</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input name="salaries[1][other_allowances]" value="{{ optional($currentSalary)->other_allowances }}" type="number"></td>
                                                            <td><input name="salaries[0][other_allowances]" value="{{ optional($previousSalary)->other_allowances }}" type="number"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>الاجمالي الحالي</span>
                                                                    <span>Current Total salary</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="flex__td">
                                                                    <span>اول اجمالي</span>
                                                                    <span>First Total alary</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text"></td>
                                                            <td><input type="text"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4">
                                                <button class="btn btn-primary" type="submit">تعديل</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $("#section_id").select2({
                delay: 250,
                ajax: {
                    url: "{{ route('admin/get/sections') }}",
                    dataType: 'json',
                    processResults: function (data) {
                        var data = data.map((objsection) => ({
                            id : objsection.id,
                            text: objsection.name,
                        }));
                        return {
                            results: data,
                            pagination: {
                                more: false
                            }
                        };
                    },
                },
            });

            $("#nationality_id").select2({
                delay: 250,
                ajax: {
                    url: "{{ route('admin/get/nationalities')  }}",
                    dataType: 'json',
                    processResults: function (data) {
                        console.log(data)
                        var data = data.map((obj) => ({
                            id : obj.id,
                            text: obj.name_nationality,
                        }));
                        return {
                            results: data,
                            pagination: {
                                more: false
                            }
                        };
                    },
                },
            });

            $("#job_id").select2({
                delay: 250,
                ajax: {
                    url: "{{ route('admin/get/jobs')  }}",
                    dataType: 'json',
                    processResults: function (data) {
                        console.log(data)
                        var data = data.map((obj) => ({
                            id : obj.id,
                            text: obj.name_job,
                        }));
                        return {
                            results: data,
                            pagination: {
                                more: false
                            }
                        };
                    },
                },
            });

        });
    </script>
@endsection
