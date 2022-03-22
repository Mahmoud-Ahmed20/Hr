@extends('layouts.admin.home')
<!-- title page -->
@section('title')
    Job Offer Specification
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
      text-align: initial;
    }
    .flex__td {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    table input disabled, table textarea disabled {
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
                        <li class="breadcrumb-item active">طباعه نموذج سلفة</li>

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
                      <button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
                        <i class="mdi mdi-printer ml-1"></i>طباعة
                      </button>
                    </div>
                    <div class="card-body">
                      <div dir="rtl" id="print">
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
                                              <select disabled name="staff_id" id="staff_id" class="form-control">
                                                  <option value="{{$LoanRequest->staff_id}}">{{optional($LoanRequest->staff)->name}}</option>
                                              </select disabled>
                                              @error('staff_id')
                                                  <span class="text-danger">{{$message}}</span>
                                              @enderror
                                          </td>
                                          <td><input disabled name="number" value="{{$LoanRequest->number}}" type="text" /></td>
                                          <td>
                                              <select disabled id="job_id" name="job_id" class="form-control">
                                                  <option value="{{$LoanRequest->job_id}}">{{optional($LoanRequest->job)->name_job}}</option>
                                              </select disabled>
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
                                              <select disabled name="section_id" id="section_id" class="form-control">
                                                  <option value="{{$LoanRequest->section_id}}">{{optional($LoanRequest->section)->name}}</option>
                                              </select disabled>
                                              @error('section_id')
                                                  <span class="text-danger">{{$message}}</span>
                                              @enderror
                                          </td>
                                          <td>
                                              <select disabled name="administration_id" id="administration_id" class="form-control">
                                                  <option value="{{$LoanRequest->administration_id}}">{{optional($LoanRequest->administration)->name_administration}}</option>
                                              </select disabled>
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
                                          <td><input disabled name="going_date" value="{{ $LoanRequest->going_date }}" type="date" /></td>
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
                                          <td><input disabled name="basic_salary" value="{{ $LoanRequest->basic_salary }}" type="text" /></td>
                                          <td><input disabled name="advance_value" value="{{ $LoanRequest->advance_value }}" type="text" /></td>
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
                                          <td><input disabled type="text" /></td>
                                          <td><input disabled type="text" /></td>
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
                                          <td><input disabled type="text" /></td>
                                          <td><input disabled type="text" /></td>
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
                                          <td><input disabled type="text" /></td>
                                          <td><input disabled type="text" /></td>
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
                                          <td><input disabled type="text" /></td>
                                          <td><input disabled type="text" /></td>
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
                                          <td><input disabled type="text" /></td>
                                          <td><input disabled type="text" /></td>
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
                                                    <input disabled type="radio" name="direct_manager" value="1" {{ $LoanRequest->direct_manager == 1 ? "checked" : "" }} style="display: inline-block; width: auto"/> 
                                                    Approved
                                                </span>
                                                <span style="margin: 0 5px">
                                                    لا اوافق
                                                    <input disabled type="radio" name="direct_manager" value="0" {{ $LoanRequest->direct_manager == 0 ? "checked" : "" }} style="display: inline-block; width: auto"/>
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
                                        <textarea disabled name="direct_manager_nots" style="resize: none" rows="5">{{ $LoanRequest->direct_manager_nots }}</textarea disabled>
                                    </td>
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
                                      <span>التوقيع</span>
                                      <span>Signature</span>
                                    </div>
                                  </th>
                                  <th>
                                    <div class="flex__td">
                                      <span>التاريخ</span>
                                      <span>Date</span>
                                    </div>
                                  </th>
                                </tr>
                                <tr>
                                  <td><input disabled type="text" /></td>
                                  <td><input disabled type="text" /></td>
                                  <td><input disabled type="text" /></td>
                                </tr>
                                <tr>
                                  <th colspan="2">الاسم حسب البطاقة/الاقامة</th>
                                  <th>رقم البطاقة/الاقامة</th>
                                </tr>
                                <tr>
                                  <td colspan="2"><input disabled type="text" /></td>
                                  <td colspan="2"><input disabled type="text" /></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="flex__td">
                                            <span>شؤون الموظفين</span>
                                            <div class="flex__td">
                                                <span style="margin: 0 5px">
                                                    اوافق
                                                    <input disabled type="radio" name="hr" value="1" {{ $LoanRequest->hr == 1 ? "checked" : "" }} style="display: inline-block; width: auto"/> 
                                                    Approved
                                                </span >
                                                <span style="margin: 0 5px" >
                                                    لا اوافق
                                                    <input disabled type="radio" name="hr" value="0" {{ $LoanRequest->hr == 0 ? "checked" : "" }} style="display: inline-block; width: auto"/>
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
                                        <textarea disabled name="hr_nots" style="resize: none" rows="5">{{ $LoanRequest->hr_nots }}</textarea disabled>
                                    </td>
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
                                      <span>التوقيع</span>
                                      <span>Signature</span>
                                    </div>
                                  </th>
                                  <th>
                                    <div class="flex__td">
                                      <span>التاريخ</span>
                                      <span>Date</span>
                                    </div>
                                  </th>
                                </tr>
                                <tr>
                                  <td><input disabled type="text" /></td>
                                  <td><input disabled type="text" /></td>
                                  <td><input disabled type="text" /></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="flex__td">
                                            <span>قسم المحاسبة</span>
                                            <div class="flex__td">
                                                <span style="margin: 0 5px">
                                                    اوافق
                                                    <input disabled type="radio" name="the_accountant" value="1" {{ $LoanRequest->the_accountant == 1 ? "checked" : "" }} style="display: inline-block; width: auto"/>
                                                    Approved
                                                </span>
                                                <span style="margin: 0 5px">
                                                    لا اوافق
                                                    <input disabled type="radio" name="the_accountant" value="0" {{ $LoanRequest->the_accountant == 0 ? "checked" : "" }} style="display: inline-block; width: auto"/>
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
                                        <textarea disabled name="the_accountant_nots" style="resize: none" rows="5"> {{ $LoanRequest->the_accountant_nots }}</textarea disabled>
                                    </td>
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
                                      <span>التوقيع</span>
                                      <span>Signature</span>
                                    </div>
                                  </th>
                                  <th>
                                    <div class="flex__td">
                                      <span>التاريخ</span>
                                      <span>Date</span>
                                    </div>
                                  </th>
                                </tr>
                                <tr>
                                  <td><input disabled type="text" /></td>
                                  <td><input disabled type="text" /></td>
                                  <td><input disabled type="text" /></td>
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
                                      <span>
                                        <input disabled
                                          type="checkbox"
                                          style="width: auto; display: inline-block"
                                        />
                                        اوافق علي السلفة علي ان تسدد خلال
                                      </span>
                                      <span><input disabled type="text" /></span>
                                      <span dir="ltr"
                                        ><input disabled
                                          type="checkbox"
                                          style="width: auto; display: inline-block"
                                        />
                                        I Approve this loan to be paid during
                                      </span>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="flex__td">
                                      <span>
                                        <input disabled
                                          type="checkbox"
                                          style="width: auto; display: inline-block"
                                        />
                                        غير موافق بسبب
                                      </span>
                                      <span><input disabled type="text" /></span>
                                      <span dir="ltr"
                                        ><input disabled
                                          type="checkbox"
                                          style="width: auto; display: inline-block"
                                        />
                                        I don't approve
                                      </span>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="flex__td">
                                      <span>
                                        <input disabled
                                          type="checkbox"
                                          style="width: auto; display: inline-block"
                                        />
                                        تؤجل السلفة لمدة
                                      </span>
                                      <span><input disabled type="text" /></span>
                                      <span dir="ltr"
                                        ><input disabled
                                          type="checkbox"
                                          style="width: auto; display: inline-block"
                                        />
                                        Adjourning to
                                      </span>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <th>
                                    <h2 style="margin: 0">مدير الموارد البشرية والشؤون الادارية</h2>
                                    <h2 style="margin: 0 0 15px 0">HR & Admin Manager</h2>
                                  </th>
                                </tr>
                                <tr>
                                  <td>
                                    <div class="flex__td">
                                      <span>التوقيع</span>
                                      <span>Signature</span>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><input disabled type="text" /></td>
                                </tr>
                                <tr>
                                  <div class="flex__td">
                                    <span>التاريخ</span>
                                    <span>Date</span>
                                  </div>
                                </tr>
                                <tr>
                                  <td><input disabled type="text" /></td>
                                </tr>
                              </table>
                            </div>
                          </div>

                          <div class="outer__border">
                            <div>
                              <table>
                                <tr>
                                  <td>
                                    <p>
                                      اقر انا الموقع ادناه استلمت مبلغا وقدره
                                      <input disabled type="text" style="display: inline-block; width: auto" />
                                      ريال فقط لا غير كسلفة يتم تسديدها حسب التعهد اعلاه او حسب النظام
                                      الداخلي للشركة وتعميد صاحب الصلاحية
                                    </p>
                                    <div class="flex__td">
                                      <span
                                        >الاسم :
                                        <input disabled type="text" style="width: auto; display: inline-block"
                                      /></span>
                                    </div>
                                    <div class="flex__td" style="margin: 10px 0">
                                      <span
                                        >التوقيع :
                                        <input disabled type="text" style="width: auto; display: inline-block"
                                      /></span>
                                    </div>
                                    <div class="flex__td">
                                      <span
                                        >التاريخ :
                                        <input disabled type="text" style="width: auto; display: inline-block"
                                      /></span>
                                    </div>
                                  </td>
                                  <td dir="ltr">
                                    <p>
                                      I am the under signed affirm that I have received te\he amount
                                      of
                                      <input disabled type="text" style="display: inline-block; width: auto" />
                                      SR. as a loan to be paid as a.m. info or as the internal company
                                      procedure's or as baptizing
                                    </p>
                                    <div class="flex__td">
                                      <span
                                        >Name :
                                        <input disabled type="text" style="width: auto; display: inline-block"
                                      /></span>
                                    </div>
                                    <div class="flex__td" style="margin: 10px 0">
                                      <span
                                        >Signature :
                                        <input disabled type="text" style="width: auto; display: inline-block"
                                      /></span>
                                    </div>
                                    <div class="flex__td">
                                      <span
                                        >Date :
                                        <input disabled type="text" style="width: auto; display: inline-block"
                                      /></span>
                                    </div>
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
