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
      text-align: initial;
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
      display: block;
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
    .true{
        display: flex;
    }
    .line{
        background: black;
        width: 237px;
        height: 2px;
        margin: auto;
        margin-top: 12px;
    }
    .center{
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
                        <h3>طلب سلفة </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration: none;color:black;" href="{{url(route('admin/loanRequests/index'))}}">طلبات السلفة</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل  السلفة </li>

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
                                <h5>تعديل سلفة</h5>
                            </div>
                            @include('flash::message')
                            <div class="card-body">
                                @isset($LoanRequest)
                                    <form class="card" action="{{ url(route('admin/loanRequests/update', $LoanRequest->id)) }}" method="post" >
                                        @csrf
                                        <div class="digital-add needs-validation">

                                            <header style="text-align: center; margin-bottom: 20px">
                                                <div class="header__logo">
                                                    <h1>
                                                        مصنع تي إم
                                                        <span style="color:black;"
                                                        >للملابس الجاهزة <br />
                                                        والتوريدات الفندقية
                                                        </span>
                                                    </h1>
                                                    <div style="margin: 0 20px; width: 120px">
                                                        <img src="{{ asset('admin/assets/images/Logo.png') }}" alt="logo" />
                                                    </div>
                                                </div>
                                            </header>
                                            <p style="text-align: right; font-weight: 600;">
                                                ادارة الموارد البشرية والشؤون الادارية
                                            </p>
                                            <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">طلب سلفة</h2>
                                            <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">Loan request</h2>

                                            <div class="outer__border">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الاسم</span>
                                                                <span>Name</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الرقم</span>
                                                                <span>No</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الوظيفه</span>
                                                                <span>Job</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select name="staff_id" id="staff_id" class="form-control">
                                                                    <option value="{{$LoanRequest->staff_id}}">{{optional($LoanRequest->staff)->name}}</option>
                                                                </select>
                                                                @error('staff_id')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td><input name="number" value="{{$LoanRequest->number}}" type="text" /></td>
                                                            <td>
                                                                <select id="job_id" name="job_id" class="form-control">
                                                                    <option value="{{$LoanRequest->job_id}}">{{optional($LoanRequest->job)->name_job}}</option>
                                                                </select>
                                                                @error('job_id')
                                                                <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>القسم</span>
                                                                <span>Section</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div>
                                                                    <span>الادارة</span>
                                                                    <span>Department</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select name="section_id" id="section_id" class="form-control">
                                                                    <option value="{{$LoanRequest->section_id}}">{{optional($LoanRequest->section)->name}}</option>
                                                                </select>
                                                                @error('section_id')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select name="administration_id" id="administration_id" class="form-control">
                                                                    <option value="{{$LoanRequest->administration_id}}">{{optional($LoanRequest->administration)->name_administration}}</option>
                                                                </select>
                                                                @error('administration_id')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>بداية العمل</span>
                                                                <span>Going date</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div>
                                                                    <span>التوقيع</span>
                                                                    <span>Signature</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td><input name="going_date" value="{{ $LoanRequest->going_date }}" type="date" /></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="outer__border">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الراتب الاساسي</span>
                                                                <span>Basic salary</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>قيمة السلفة</span>
                                                                <span>Loan explication</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td><input name="basic_salary" value="{{ $LoanRequest->basic_salary }}" type="text" /></td>
                                                            <td><input name="advance_value" value="{{ $LoanRequest->advance_value }}" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>ضامن اول First warrantor</th>
                                                            <th>ضامن ثاني Second warrantor</th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الاسم</span>
                                                                <span>Name</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الاسم</span>
                                                                <span>Name</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" /></td>
                                                            <td><input type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الوظيفة</span>
                                                                <span>title</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الوظيفة</span>
                                                                <span>title</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" /></td>
                                                            <td><input type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الراتب</span>
                                                                <span>Salary</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>الراتب</span>
                                                                <span>Salary</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" /></td>
                                                            <td><input type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>التوقيع</span>
                                                                <span>Signature</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>التوقيع</span>
                                                                <span>Signature</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="text" /></td>
                                                            <td><input type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>بداية العمل</span>
                                                                <span>Going date</span>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="flex__td">
                                                                <span>بداية العمل</span>
                                                                <span>Going date</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="date" /></td>
                                                            <td><input type="date" /></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="outer__border">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="flex__td">
                                                                    <span>المدير المباشر</span>
                                                                    <div class="flex__td">
                                                                        <span style="margin: 0 5px" >
                                                                            اوافق
                                                                            <input type="radio" name="direct_manager" value="1" {{ $LoanRequest->direct_manager == 1 ? "checked" : "" }} style="display: inline-block; width: auto"/> 
                                                                            Approved
                                                                        </span>
                                                                        <span style="margin: 0 5px">
                                                                            لا اوافق
                                                                            <input type="radio" name="direct_manager" value="0" {{ $LoanRequest->direct_manager == 0 ? "checked" : "" }} style="display: inline-block; width: auto"/>
                                                                            Not Approved
                                                                        </span>
                                                                    </div>
                                                                    <span>Responsible Manager</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="flex__td">
                                                                    <span>ملاحظات</span>
                                                                    <span>Notes</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <textarea name="direct_manager_nots" style="resize: none" rows="5">{{ $LoanRequest->direct_manager_nots }}</textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="flex__td">
                                                                    <span>شؤون الموظفين</span>
                                                                    <div class="flex__td">
                                                                        <span style="margin: 0 5px">
                                                                            اوافق
                                                                            <input type="radio" name="hr" value="1" {{ $LoanRequest->hr == 1 ? "checked" : "" }} style="display: inline-block; width: auto"/> 
                                                                            Approved
                                                                        </span >
                                                                        <span style="margin: 0 5px" >
                                                                            لا اوافق
                                                                            <input type="radio" name="hr" value="0" {{ $LoanRequest->hr == 0 ? "checked" : "" }} style="display: inline-block; width: auto"/>
                                                                            Not Approved
                                                                        </span>
                                                                    </div>
                                                                    <span>Personal Dept</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="flex__td">
                                                                <span>ملاحظات</span>
                                                                <span>Notes</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <textarea name="hr_nots" style="resize: none" rows="5">{{ $LoanRequest->hr_nots }}</textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="flex__td">
                                                                    <span>قسم المحاسبة</span>
                                                                    <div class="flex__td">
                                                                        <span style="margin: 0 5px">
                                                                            اوافق
                                                                            <input type="radio" name="the_accountant" value="1" {{ $LoanRequest->the_accountant == 1 ? "checked" : "" }} style="display: inline-block; width: auto"/>
                                                                            Approved
                                                                        </span>
                                                                        <span style="margin: 0 5px">
                                                                            لا اوافق
                                                                            <input type="radio" name="the_accountant" value="0" {{ $LoanRequest->the_accountant == 0 ? "checked" : "" }} style="display: inline-block; width: auto"/>
                                                                            Not Approved
                                                                        </span>
                                                                    </div>
                                                                    <span>Account Section</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="flex__td">
                                                                    <span>ملاحظات</span>
                                                                    <span>Notes</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <textarea name="the_accountant_nots" style="resize: none" rows="5"> {{ $LoanRequest->the_accountant_nots }}</textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="page__footer">
                                                <p style="font-weight: 600; font-size: 18px; direction: ltr">
                                                <span><img src="{{ asset('admin/assets/images/location.png') }}" alt="" /></span>KING FAISAL ST., EL KOM
                                                EL AKHDAR STATION, END OF ALY SHIHA ST, HARAM, GIZA- EGYPT.
                                                </p>
                                                <p>
                                                <span><img src="{{asset('admin/assets/images/telephone.png')}}" alt="" /></span>+2 33840003 - 33840530
                                                <img src="{{ asset('admin/assets/images/whatsapp.png') }}" alt="" /> 01099977100 - 01000080770
                                                </p>
                                                <p><img src="{{ asset('admin/assets/images/facebook.png') }}" alt="" />facebook.com/tmuniform</p>
                                                <p>
                                                <span><img src="{{ asset('admin/assets/images/global.png') }}" alt="" /></span>www.tmuniform.com
                                                </p>
                                                <p>sales@tmuniform.com - export@tmuniform.com - gm@tmuniform.com</p>
                                                <p>
                                                All rights reserved to tmuniform.com
                                                <span id="footer-date" style="background-color: inherit"></span>
                                                </p>
                                            </div>

                                            <div class="form-group mt-4">
                                                <button class="btn btn-primary" type="submit">تعديل</button>
                                            </div>
                                        </div>
                                    </form>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')

<script>

    $("#staff_id").select2({
        delay: 250,
        ajax: {
            url: "{{ route('admin/get/staffs') }}",
            dataType: 'json',
            processResults: function (data) {
                var data = data.map((objStaff) => ({
                    id : objStaff.id,
                    text: objStaff.name,
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

    $("#administration_id").select2({
        delay: 250,
        ajax: {
            url: "{{ route('admin/jobOfferSpecification/administrations_get')  }}",
            dataType: 'json',
            processResults: function (data) {
                var data = data.map((obj) => ({
                    id : obj.id,
                    text: obj.name_administration,
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
    
    $("#administration_id").change(function (e) {
        e.preventDefault();
        var administration_id = $("#administration_id").val();
        if (administration_id){
            $.ajax({
                url: "{{url('/administration/jobs?administration_id=')}}"+administration_id,
                type: 'get',
                success: function (data) {
                    if(data.length > 0){
                        let cartona='<option value="">اختر وظيفه</option>';
                        $("#job_id").empty();
                        $.each(data, function (index, model) {
                        cartona += '<option value="'+model.id+'">'+model.name_job+'</option>'
                        });
                        document.getElementById('job_id').innerHTML = cartona
                    }else{
                        $("#job_id").empty();
                        $("#job_id").append('<option value="">اختر وظيفه</option>');
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) { // error callback
                    alert(errorMessage);
                }
            });
        }else{
            $("#job_id").empty();
            $("#job_id").append('<option value="">اختر وظيفه</option>');
        }
    });
</script>

@endsection
