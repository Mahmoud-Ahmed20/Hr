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
      }
      .flex__td {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      table input disabled, table textarea {
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
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
  <i class="mdi mdi-printer ml-1"></i>طباعة
</button>
<div class=" main-content-body-invoice" id="print">
    <header>
        <div class="logo flex__items" style="justify-content: flex-end;">
            <h1 style="text-align: center; margin: 0 20px">
                مصنع تي إم
                <span style="font-size: 22px; font-weight: 500; display: block">للملابس الجاهزة <br />
                    والتوريدات الفندقية</span>
            </h1>
            <img src="{{asset('admin/assets/images/logo.png')}}" alt="logo" />
        </div>
    </header>
    @isset($mission)

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
            <h2>نموذج انهاء مهمة عمل Mission Accomplishment</h2>
        </header>

        <div class="outer__border">
            <div>
                <table>
                    <tr>
                        <td>
                            <div class="flex__td">
                                <span>بيانات الموظف</span>
                                <span>Employ date</span>
                            </div>
                        </td>
                    </tr>
                </table>
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
                                <span>تاريخ التعيين</span>
                                <span>Growing date</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select disabled name="staff_id" id="staff_id">
                                <option>-- اسم الموظف ----</option>
                                @isset($Staffs)
                                    @foreach ($Staffs as $staff )
                                        <option value="{{$staff->id}}" {{ $mission->staff_id == $staff->id ? 'selected' : "" }}>{{$staff->name}}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('Staff_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                        <td>
                            <input disabled name="number" value="{{ $mission->number }}" type="text" />
                            @error('number')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                        <td>
                            <input disabled name="work_date" value="{{ $mission->work_date }}" type="date" />
                            @error('work_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <div class="flex__td">
                                <span>مسمي الوظيفة</span>
                                <span>Job title</span>
                            </div>
                        </td>
                        <td>
                            <span>الادارة</span>
                            <span>Department</span>
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
                            <select disabled name="job_id" id="job_id">
                                <option>-- الوظيفه ----</option>
                                @isset($jobs)
                                    @foreach ($jobs as $job )
                                        <option value="{{$job->id}}" {{ $mission->job_id == $job->id ? 'selected' : "" }}>{{$job->name_job}}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('job_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                        <td>
                            <select disabled name="administration_id" id="administration_id">
                                <option>-- الاداره ----</option>
                                @isset($administrations)
                                    @foreach ($administrations as $administration )
                                        <option value="{{$administration->id}}" {{ $mission->administration_id == $administration->id ? 'selected' : "" }}>{{$administration->name_administration}}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('administration_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                        <td>
                            <select disabled name="section_id" id="section_id">
                                <option>-- القسم ----</option>
                                @isset($sections)
                                    @foreach ($sections as $section )
                                        <option value="{{$section->id}}" {{ $mission->section_id == $section->id ? 'selected' : "" }}>{{$section->name}}</option>
                                    @endforeach
                                @endisset
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
                                <span>جهة المهمة الي</span>
                                <span>Direction Of the mission</span>
                            </div>
                        </td>
                        <td>
                            <div class="flex__td">
                                <span>المدة</span>
                                <span>Duration of mission</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input disabled name="duration_of_mission" value="{{ $mission->duration_of_mission }}" type="text">
                            @error('duration_of_mission')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                        <td>
                            <input disabled name="direction_of_the_mission" value="{{ $mission->direction_of_the_mission }}" type="text">
                            @error('direction_of_the_mission')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <div class="flex__td">
                                <span>تاريخ المغادرة</span>
                                <span>Leaving Date</span>
                            </div>
                        </td>
                        <td>
                            <div class="flex__td">
                                <span>تاريخ المباشرة</span>
                                <span>Starting work at</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input disabled name="leaving_date" value="{{ $mission->leaving_date }}" type="date">
                            @error('leaving_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </td>
                        <td>
                            <input disabled name="start_working_at" value="{{ $mission->start_working_at }}" type="date">
                            @error('start_working_at')
                                <span class="text-danger">{{ $message }}</span>
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
                        <td>
                            <div class="flex__td">
                                <span>تفاصيل المهمة </span>
                                <span>Mission Details</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea disabled name="mission_details" rows="10">{{ $mission->mission_details }}</textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="outer__border">
            <div>
                <table>
                    <tr>
                        <td colspan="2">
                            <div class="flex__td">
                                <span>المهام المنجزة</span>
                                <span>Results</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea disabled name="results" rows="10">{{ $mission->results }}</textarea></td>
                    </tr>
                </table>
            </div>
        </div>

    @endisset
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
