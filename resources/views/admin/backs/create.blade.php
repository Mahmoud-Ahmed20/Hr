@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection

@section('css')
    <style>
        * {
            -webkit-print-color-adjust: exact !important;
        }
        .flex__items {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 20px;
        }
        .section__title {
            background-color: #222;
            margin: 15px 0;
            padding: 3px 0;
            color: #fff;
            text-align: center;
        }
        .span__check {
            width: 15px;
            height: 15px;
            border: 2px solid #222;
            display: inline-block;
            background-color: #fff;
            margin: 0 10px;
        }
        .page__footer p span img {
        width: 80%;
        }
        .modal-dialog {
            max-width: 80vw!important;
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
                        <h3>الرجوع الي العمل</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/backs/index'))}}">الرجوع الي العمل</a>
                        </li>
                        <li class="breadcrumb-item active">اضافه</li>
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
                                <h5>اضافه</h5>
                            </div>
                            <div class="card-body">
                                <form class="card" action="{{url(route('admin/backs/store'))}}" method="post" enctype="multipart/form-data">
                                    @include('flash::message')
                                    @csrf
                                    <div class="digital-add needs-validation">
                                        <header class="flex__items">
                                            <div style="text-align: center">
                                                <h2 style="margin: 0">نموذج تبليغ العودة للعمل</h2>
                                                <h2 style="margin: 5px 0">Back to Work Form</h2>
                                            </div>
                                            <div class="logo flex__items">
                                                <h1 style="text-align: center; margin: 0 20px">
                                                مصنع تي إم
                                                <span style="font-size: 22px; font-weight: 500; display: block"
                                                    >للملابس الجاهزة <br />
                                                    والتوريدات الفندقية</span
                                                >
                                                </h1>
                                                <img src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt="logo" />
                                            </div>
                                        </header>
                                        <div class="flex__items" style="margin: 20px 0 40px">
                                            <span>التاريخ/Date:<input name="date" value="{{ old('date') }}" type="date" /></span>
                                            @error('date')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <p style="margin: 0">
                                                (<span>Completed upon return to work/يتم تعبئة الطلب فور عودة الموظف ومباشرته للعمل</span>)
                                            </p>
                                        </div>
                                        <div class="flex__items" style="flex-wrap: wrap">
                                            <div style="width: 50%">الاسم:
                                                             <select name="Staff_id" id="Staff_id">
                                                                <option  selected  disabled >-- يرجي تحديد اسم الموظف   ----</option>
                                                                @foreach ($Staff_names as $Staff_name )
                                                                <option  value="{{$Staff_name->id}}">{{$Staff_name->name}}</option>
                                                                @endforeach
                                                              </select>
                                                            @error('Staff_id')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                            <div style="width: 50%">الرقم الوظيفي:<input name="job_number" value="{{ old('job_number') }}" type="number" /></div>
                                            @error('job_number')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <div style="width: 50%">المسمي الوظيفي:<input name="job_title" value="{{ old('job_title') }}" type="text" /></div>
                                            @error('job_title')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <h2 class="section__title">البيانات الفعلية للاجازة</h2>
                                        <div class="flex__items" style="direction:rtl;">
                                            <span>سبب الاجازة</span>
                                            <span><input value="سنوية" style="width: auto" name="reason_for_leave" type="radio" {{ old('reason_for_leave') && old('reason_for_leave') == "سنوية" ? "checked" : "" }}/> سنوية</span>
                                            <span><input value="غير مدفوعة" style="width: auto" name="reason_for_leave" type="radio" {{ old('reason_for_leave') && old('reason_for_leave') == "غير مدفوعة" ? "checked" : "" }}/> غير مدفوعة</span>
                                            <span><input value="مرضية" style="width: auto" name="reason_for_leave" type="radio" {{ old('reason_for_leave') && old('reason_for_leave') == "مرضية" ? "checked" : "" }}/> مرضية</span>
                                            <span><input value="حج" style="width: auto" name="reason_for_leave" type="radio" {{ old('reason_for_leave') && old('reason_for_leave') == "حج" ? "checked" : "" }}/> حج</span>
                                            <span><input value="زواج" style="width: auto" name="reason_for_leave" type="radio" {{ old('reason_for_leave') && old('reason_for_leave') == "زواج" ? "checked" : "" }}/> زواج</span>
                                            <span><input value="مولود" style="width: auto" name="reason_for_leave" type="radio" {{ old('reason_for_leave') && old('reason_for_leave') == "مولود" ? "checked" : "" }}/> مولود</span>
                                            <span><input value="دراسية" style="width: auto" name="reason_for_leave" type="radio" {{ old('reason_for_leave') && old('reason_for_leave') == "دراسية" ? "checked" : "" }}/> دراسية</span>
                                            @error('reason_for_leave')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="flex__items" style="margin-bottom: 16px; flex-wrap: wrap">
                                            <div style="margin-bottom: 16px; width: 48%">
                                                تاريخ بدا الاجازة / First day of vacation:<input name="first_day_off" value="{{ old('first_day_off') }}" type="date" />
                                                @error('first_day_off')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div style="margin-bottom: 16px; width: 48%">
                                                تاريخ انتهاء الاجازة / Last day:<input name="last_date_off" value="{{ old('last_date_off') }}" type="date" />
                                                @error('last_date_off')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div style="margin-bottom: 16px; width: 48%">
                                                تاريخ مباشرة العمل / Date work resumed:<input name="date_word_resumed" value="{{ old('date_word_resumed') }}" type="date" />
                                                @error('date_word_resumed')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div style="margin-bottom: 16px; width: 48%">
                                                عدد ايام الاجازة الفعلية / No. of actual vacation days:<input name="no_of_actual_vacation_days" value="{{ old('no_of_actual_vacation_days') }}" type="number" />
                                                @error('no_of_actual_vacation_days')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <h2 class="section__title">قسم الموارد البشرية والشؤون الادارية</h2>
                                        <p class="flex__items">
                                            اجمالي عدد ايام الاجازة الفعلية:
                                            <input name="hr_total_no_actual_vacation_days" value="{{ old('hr_total_no_actual_vacation_days') }}" type="number" /> (ايام)
                                            @error('hr_total_no_actual_vacation_days')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </p>
                                        <p class="flex__items" style="margin-bottom: 80px;">
                                            فرق الايام بين بين المخطط والفعلي (ان وجد) Difference between planned and
                                            actual vacation days, if any
                                            <input name="hr_difference_between_vacation_days" value="{{ old('hr_difference_between_vacation_days') }}" type="number" />
                                            @error('hr_difference_between_vacation_days')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            (ايام /days)
                                        </p>

                                        <div class="form-group mt-4">
                                            <button class="btn btn-primary" type="submit">اضافه</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Container-fluid Ends-->
@endsection
