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
                            </div>
                            <div class="card-body">
                                <form class="card" action="{{url(route('admin/missions/store'))}}" method="post" enctype="multipart/form-data">
                                    @include('flash::message')
                                    @csrf
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
                                                    <img src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt="logo" />
                                                </div>
                                            </div>
                                        </header>
                                        <p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p>
                                        <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">تكليف بمهمة عمل</h2>
                                        <h2 style="text-transform: uppercase;text-align: center;margin: 0;font-size: 28px;font-weight: 700;">Job Mission Request</h2>
                                        <div class="flex__td" style="justify-content: center">
                                            <div class="flex__td" style="margin: 0 15px">
                                                <span>داخلي</span>
                                                <span><input name="location" value="داخلي" type="radio" {{ old('location') ? "checked" : "" }}/></span>
                                                <span>Local</span>
                                            </div>
                                            <div class="flex__td" style="margin: 0 15px">
                                                <span>خارجي</span>
                                                <span><input name="location" value="خارجي" type="radio" {{ old('location') ? "checked" : "" }}/></span>
                                                @error('location')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <span>Inter</span>
                                            </div>
                                        </div>

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
                                                            <span>الرقم</span>
                                                            <span>No</span>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <div class="flex__td">
                                                            <span>التاريخ</span>
                                                            <span>Date</span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <select name="Staff_id" id="Staff_id">
                                                                <option  selected  disabled >-- يرجي تحديد اسم الموظف   ----</option>
                                                                @foreach ($Staff_names as $Staff_name )
                                                                <option  value="{{$Staff_name->id}}">{{$Staff_name->name}}</option>
                                                                @endforeach
                                                              </select>

                                                        </td>
                                                        @error('Staff_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <td><input name="number" value="{{ old('number') }}" type="text" /></td>
                                                        @error('number')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <td><input name="date" value="{{ old('date') }}" type="date" /></td>
                                                        @error('date')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                        <div class="flex__td">
                                                            <span>مسمي الوظيفة</span>
                                                            <span>Title</span>
                                                        </div>
                                                        </td>
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
                                                        <td><input name="job_title" value="{{ old('job_title') }}" type="text" /></td>
                                                        @error('job_title')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <td>
                                                            <select name="administration_id" id="administration_id">
                                                                <option  selected  disabled>-- يرجي تحديد الادارة   ----</option>
                                                                @foreach ($administrations as $administration )
                                                                <option value="{{$administration->id }}">{{ $administration->name_administration}}</option>
                                                                @endforeach
                                                              </select>
                                                              @error('administration_id')
                                                            <span class="text-danger">{{$message}}</span>
                                                          @enderror
                                                          </td>
                                                        <td>
                                                            <select name="section_id" id="section_id">
                                                                <option  selected  disabled >-- يرجي تحديد القسم   ----</option>
                                                                @foreach ($sections as $section )
                                                                <option  value="{{$section->id}}">{{ $section->name}}</option>
                                                                @endforeach
                                                              </select>
                                                        </td>
                                                        @error('section_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                        <div class="flex__td">
                                                            <span>جهة مهمة العمل</span>
                                                            <span>Direction Of The Mission</span>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <div class="flex__td">
                                                            <span>المدة</span>
                                                            <span>Duration Of Mission</span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="direction_of_the_mission" value="{{ old('direction_of_the_mission') }}" type="text" /></td>
                                                        @error('direction_of_the_mission')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <td><input name="duration_of_mission" value="{{ old('duration_of_mission') }}" type="number" /></td>
                                                        @error('duration_of_mission')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td>
                                                        <div class="flex__td">
                                                            <span>اعتبارا من</span>
                                                            <span>Date From</span>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <div class="flex__td">
                                                            <span>اعتبارا الي</span>
                                                            <span>Date to</span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="date_from" value="{{ old('date_from') }}" type="date" /></td>
                                                        @error('date_from')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <td><input name="date_to" value="{{ old('date_to') }}" type="date" /></td>
                                                        @error('date_to')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
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
                                                            <span>بيان مهمة العمل</span>
                                                            <span>Mission specification</span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><textarea name="mission_specification" rows="5">{{ old('mission_specification') }}</textarea></td>
                                                        @error('mission_specification')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="outer__border">
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="flex__td" style="justify-content: flex-start">
                                                                <span><input type="checkbox" style="width: auto" /></span>
                                                                <span style="margin: 0 10px">سلفة مصاريف بمبلغ</span>
                                                                <span><input name="expense_advance" value="{{ old('expense_advance') }}" type="number" style="width: auto" /></span>
                                                                @error('expense_advance')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                                <span style="margin: 0 10px">ريال</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                        <div class="flex__td" style="justify-content: flex-start">
                                                            <span><input type="checkbox" style="width: auto" /></span>
                                                            <span style="margin: 0 10px">تذكرة سفر خط سير</span>
                                                            <span style="width: 50%; margin: 0 10px">
                                                                <input name="ticket" value="{{ old('ticket') }}" type="text"/>
                                                                @error('ticket')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </span>
                                                            <span>Tacit</span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                        <div class="flex__td" style="justify-content: flex-start">
                                                            <span><input type="checkbox" style="width: auto" /></span>
                                                            <span style="margin: 0 10px">التاشيرات</span>
                                                            <span style="width: 20%; margin: 0 10px">
                                                                <input name="visas[1][name]" value="{{ old('visas[1][name]') }}" type="text"/>
                                                            </span>
                                                            <span style="width: 20%; margin: 0 10px">
                                                                <input name="visas[2][name]" value="{{ old('visas[2][name]') }}" type="text"/>
                                                            </span>
                                                            <span style="width: 20%; margin: 0 10px">
                                                                <input name="visas[3][name]" value="{{ old('visas[3][name]') }}" type="text"/>
                                                            </span>
                                                            <span>Visas</span>
                                                        </div>
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
