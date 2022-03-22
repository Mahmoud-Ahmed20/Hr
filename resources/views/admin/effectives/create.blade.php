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
    </style>
@endsection

@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>المهمات</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/missions/index'))}}">المهمات</a>
                        </li>
                        <li class="breadcrumb-item active">اضافه مهمه</li>
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
                                @include('flash::message')

                            </div>
                            <div class="card-body">
                                <form class="card" action="<?php echo e(url(route('admin/effectiveNotice/store'))); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="digital-add needs-validation">
                                        <header style="text-align: center; margin-bottom: 20px">
                                            <div class="header__logo">
                                                <h1>
                                                    مصنع تي إم
                                                    <span
                                                    >للملابس الجاهزة <br />
                                                    والتوريدات الفندقية
                                                    </span>
                                                </h1>
                                                <div style="margin: 0 20px; width: 120px">
                                                    <img src="<?php echo e(asset('admin/assets/images/dashboard/logo.jpg')); ?>" alt="logo" />
                                                </div>
                                            </div>
                                        </header>
                                        <p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p>
                                        <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                            اشعار مباشرة العمل
                                        </h2>
                                        <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                            Effective Date Notice
                                        </h2>
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
                                                            <span>الوظيفة</span>
                                                            <span>Title</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                            <span>رقم الموظف</span>
                                                            <span>ID No</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <select name="staff_id" id="staff_id">
                                                                <option  selected  disabled >-- يرجي تحديد اسم الموظف   ----</option>
                                                                @foreach ($Staff_names as $Staff_name )
                                                                <option  value="{{$Staff_name->id}}">{{$Staff_name->name}}</option>
                                                                @endforeach
                                                              </select>

                                                        </td>
                                                        <td>
                                                            <select name="job_id" id="job_id">
                                                                <option  selected  disabled >-- يرجي تحديد الوظيفه   ----</option>
                                                                @foreach ($jobs as $job )
                                                                <option  value="{{$job->id }}">{{ $job->name_job }}</option>
                                                                @endforeach
                                                              </select>
                                                              @error('job_id')
                                                              <span class="text-danger">{{$message}}</span>
                                                            @enderror                                                        </td>

                                                        <td><input name="id_number" value="<?php echo e(old('id_number')); ?>" type="number" /></td>
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
                                                            <select name="administration_id" id="administration_id">
                                                                <option  selected  disabled>-- يرجي تحديد الادارة   ----</option>
                                                                @foreach ($administrations as $administration )
                                                                <option value="{{$administration->id }}">{{ $administration->name_administration}}</option>
                                                                @endforeach
                                                              </select>
                                                              @error('administration_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                          @enderror                                                        </td>
                                                        <td>
                                                            <select name="section_id" id="section_id">
                                                                <option  selected  disabled >-- يرجي تحديد القسم   ----</option>
                                                                @foreach ($sections as $section )
                                                                <option  value="{{$section->id}}">{{ $section->name}}</option>
                                                                @endforeach
                                                              </select>
                                                              @error('section_id')
                                                              <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                            <span>تاريخ المباشرة</span>
                                                            <span>Starting work at</span>
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
                                                        <td><input name="start_working_at" value="<?php echo e(old('start_working_at')); ?>" type="date" /></td>
                                                        <td>
                                                            <select name="nationality_id" id="nationality_id">
                                                                <option  selected  disabled>----</option>
                                                                @foreach ($nationalitys as $nationality )
                                                                <option value="{{$nationality->id }}">{{ $nationality->name_nationality}}</option>
                                                                @endforeach
                                                              </select>
                                                              @error('nationality_id')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

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
