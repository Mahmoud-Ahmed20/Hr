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
            padding: 5px;
        }
        table {
            width: 100%;
            border-spacing: 0;
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
        .modal-dialog {
            max-width: 80vw!important;
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
        .dataTables_paginate,
        .dataTables_info {
            display: none;
        }
        .modal__body-form table td {
            border: 1px solid #222;
            padding: 10px;
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
                        <h3>الاجراءات الجزائيه</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/penaltys/index'))}}">الاجراءات الجزائيه</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل الاجراءات الجزائيه</li>
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
                            @isset($penalty)
                                <div class="card-body">
                                    <form class="card" action="{{url(route('admin/penaltys/update', $penalty->id))}}" method="post" enctype="multipart/form-data">
                                        @include('flash::message')
                                        @csrf
                                        <div class="digital-add needs-validation">
                                            <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">اجراء حزائي</h2>
                                            <h2 style=" text-transform: uppercase;text-align: center;margin: 0;font-size: 28px;font-weight: 700;" > PENALTY PROCEDURE </h2>
                                            <div class="outer__border">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                            <div class="flex__td">
                                                                <span>الاسم</span>
                                                                <span>Name</span>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="flex__td">
                                                                <span>الرقم</span>
                                                                <span>No</span>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="flex__td">
                                                                <span>الادارة</span>
                                                                <span>Administration</span>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select name="staff_id" id="staff_id">
                                                                    <option  selected  disabled >-- يرجي تحديد الوظيفه   ----</option>
                                                                    @foreach ($staffs as $staff )
                                                                    <option  value="{{$staff->id}}"{{$penalty->staff_id == $staff->id ? "selected" : "" }}>{{ $staff->name }}</option>
                                                                    @endforeach
                                                                  </select>
                                                                  @error('staff_id')
                                                                  <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="number" value="{{$penalty->number}}" type="text" />
                                                                @error('number')
                                                                  <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <select name="administration_id" id="administration_id" style="width: 87%;">
                                                                    <option  selected  disabled>-- يرجي تحديد الادارة   ----</option>
                                                                    @foreach ($administrations as $administration )
                                                                    <option value="{{$administration->id }}" {{$penalty->administration_id == $administration->id ? "selected" : "" }}>{{ $administration->name_administration}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('administration_id')
                                                                  <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                            <div class="flex__td">
                                                                <span>القسم</span>
                                                                <span>Section</span>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="flex__td">
                                                                <span>مسمي الوظيفة</span>
                                                                <span>Job Title</span>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select name="section_id" id="section_id">
                                                                    <option  selected  disabled >-- يرجي تحديد القسم   ----</option>
                                                                    @foreach ($sections as $section )
                                                                    <option  value="{{$section->id}}"{{$penalty->section_id == $section->id ? "selected" : "" }}>{{ $section->name}}</option>
                                                                    @endforeach
                                                                  </select>
                                                                @error('section_id')
                                                                  <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>>
                                                            <td>
                                                                <input name="job_title" value="{{$penalty->job_title}}" type="text" />
                                                                @error('job_title')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                            <div class="flex__td">
                                                                <span>تاريخ التعيين</span>
                                                                <span>Joining Date</span>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="flex__td">
                                                                <span>تاريخ اخر مخالفة</span>
                                                                <span>Last Penalty</span>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input name="joining_date" value="{{$penalty->joining_date}}" type="date" />
                                                                @error('joining_date')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                            <td>
                                                                <input name="last_penalty" value="{{$penalty->last_penalty}}" type="date" />
                                                                @error('last_penalty')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                            <div class="flex__td">
                                                                <span>الموضوع</span>
                                                                <span>Subject</span>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <textarea name="subject" rows="10">{{$penalty->subject}}</textarea>
                                                                @error('subject')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="outer__border">
                                                <div>
                                                    <table>
                                                        <tr>
                                                            <td style="width: 50%">
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span>لفت نظر</span>
                                                                    <span><input name="draw_attention" value="1" type="checkbox" style="width: auto" {{$penalty->draw_attention == 1 ? "checked" : "" }}/></span>
                                                                    <span>Draw Attention</span><br>
                                                                    @error('draw_attention')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span>انذار كتابي ( &nbsp;&nbsp;&nbsp; )</span>
                                                                    <span><input name="penalty" value="1" type="checkbox" style="width: auto" {{ $penalty->penalty == 1 ? "checked" : "" }} /></span>
                                                                    <span>Penalty</span><br>
                                                                    @error('penalty')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span> ايام الخصم </span>
                                                                    <span><input name="deduction" value="{{$penalty->deduction}}" type="number" style="width: auto" /></span>
                                                                    <span>Deduction Days</span><br>
                                                                    @error('deduction')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span>انذار كتابي بالفصل</span>
                                                                    <span><input name="written_warning_by_fired" value="1" type="checkbox" style="width: auto" {{$penalty->written_warning_by_fired == 1 ? "checked" : "" }} /></span>
                                                                    <span>Written warning by Fired</span><br>
                                                                    @error('written_warning_by_fired')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span>اخري</span>
                                                                    <span><input name="others" value="1" type="checkbox" style="width: auto"  {{$penalty->others == 1 ? "checked" : "" }} /></span>
                                                                    <span>Others</span><br>
                                                                    @error('others')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </td>
                                                            <td style="width: 50%">
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span>
                                                                        ايقاف عن العمل لمدة
                                                                    </span>
                                                                    <span>
                                                                        <input name="stopping_from_work_for" value="{{$penalty->stopping_from_work_for}}" type="number" style="width: auto" />
                                                                    </span>
                                                                    <span>
                                                                        Stopping From Work for
                                                                    </span><br>
                                                                    @error('stopping_from_work_for')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span>الحرمان من الزيادة السنوية</span>
                                                                    <span><input name="stopping_the_yearly_increase" value="1" type="checkbox" style="width: auto" {{$penalty->stopping_the_yearly_increase == 1 ? "checked" : "" }} /></span>
                                                                    <span>Stopping The yearly Increase</span><br>
                                                                    @error('stopping_the_yearly_increase')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span>فصل من الخدمة مع التعويض</span>
                                                                    <span><input name="firing_with_a_bying" value="1" type="checkbox" style="width: auto" {{$penalty->firing_with_a_bying == 1 ? "checked" : "" }}/></span>
                                                                    <span>Firing With a bying</span><br>
                                                                    @error('firing_with_a_bying')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                <div style="margin-bottom: 8px" class="flex__td">
                                                                    <span>فصل من الخدمة بدون تعويض</span>
                                                                    <span><input name="firing_without_a_bying" value="1" type="checkbox" style="width: auto" {{$penalty->firing_without_a_bying == 1 ? "checked" : "" }} /></span>
                                                                    <span>Firing Without a bying</span><br>
                                                                    @error('firing_without_a_bying')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </td>
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
