@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection

@section('content')
    <style>
        .modal-dialog {
            width: 80vw;
            max-width: 80vw;
            direction: rtl;
        }
        .modal__body {
            padding: 10px;
        }
        .modal__body .outer__border {
        border: 5px solid #222;
        padding: 2px;
        margin-bottom: 5px;
        }
        .modal__body .outer__border > div {
        border: 1px solid #222;
        padding: 5px 0;
        }
        .modal__body table {
        width: 100%;
        border-spacing: 0;
        }
        .modal__body table td,
        .modal__body table th {
        border: 1px solid #222;
        padding: 3px 5px;
        font-size: 20px;
        font-weight: 600;
        }
        .modal__body .flex__td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5px;
        }
        .modal__body table input {
        width: 95%;
        margin: auto;
        padding: 5px;
        }
    </style>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>طلبات الاجازه</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/vacations/index'))}}">طلبات الاجازه</a>
                        </li>
                        <li class="breadcrumb-item active">تعديل طلب اجازه</li>
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
                            <div class="card-body">
                                <form class="card" action="{{url(route('admin/vacations/update', $vacation->id))}}" method="post">
                                    @include('flash::message')    
                                    @csrf
                                    <div class="digital-add needs-validation modal__body" style="direction:rtl;">
                                        <header>
                                            <div class="flex__td">
                                                <h1>Vacation Request</h1>
                                                <img src="{{asset('admin/assets/images/dashboard/logo.jpg')}}" alt="logo" />
                                            </div>
                                            <div class="flex__td">
                                                <span>
                                                    التاريخ 
                                                    <input class="form-control" name="request_date" value="{{ $vacation->request_date }}" type="date" style="width: auto" />
                                                    @error('request_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </span>
                                                <h2>
                                                    (يتم تعبئة الطلب قبل شهر واحد للاجازة السنوية علي الاقل من تاريخ
                                                    السفر)
                                                </h2>
                                            </div>
                                            <div class="flex__td">
                                                <span class="flex__td" style="width: 48%">
                                                    الاسم 
                                                    <select name="staff_id" id="staff_id" class="form-control">
                                                        <option value="{{$vacation->staff_id}}">{{optional($vacation->staff)->name}}</option>
                                                    </select>
                                                    @error('staff_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </span>
                                                <span class="flex__td" style="width: 48%">
                                                    الرقم الوظيفي 
                                                    <input class="form-control" name="job_number" value="{{ $vacation->job_number }}" type="text" style="width: 85%"/>
                                                    @error('job_number')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="flex__td">
                                                <span class="flex__td" style="width: 48%" >
                                                    المسمي الوظيفي
                                                    <input class="form-control" name="job_title" value="{{ $vacation->job_title }}" type="text" style="width: 85%"/>
                                                    @error('job_title')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </span>
                                            </div>
                                        </header>
                                        <div class="outer__border">
                                            <div>
                                                <table>
                                                    <div>
                                                        <h2 class="text-center" style="margin: 0">طلب الاجازة</h2>
                                                    </div>
                                                    <tr>
                                                        <td style="border-right: 0; border-left: 0">
                                                            <div class="flex__td">
                                                                <span>سبب الاجازة</span>
                                                                <span><input value="سنوية" style="width: auto" name="reason_for_leave" type="radio" {{ $vacation->reason_for_leave && $vacation->reason_for_leave == "سنوية" ? "checked" : "" }}/> سنوية</span>
                                                                <span><input value="غير مدفوعة" style="width: auto" name="reason_for_leave" type="radio" {{ $vacation->reason_for_leave && $vacation->reason_for_leave == "غير مدفوعة" ? "checked" : "" }}/> غير مدفوعة</span>
                                                                <span><input value="مرضية" style="width: auto" name="reason_for_leave" type="radio" {{ $vacation->reason_for_leave && $vacation->reason_for_leave == "مرضية" ? "checked" : "" }}/> مرضية</span>
                                                                <span><input value="حج" style="width: auto" name="reason_for_leave" type="radio" {{ $vacation->reason_for_leave && $vacation->reason_for_leave == "حج" ? "checked" : "" }}/> حج</span>
                                                                <span><input value="زواج" style="width: auto" name="reason_for_leave" type="radio" {{ $vacation->reason_for_leave && $vacation->reason_for_leave == "زواج" ? "checked" : "" }}/> زواج</span>
                                                                <span><input value="مولود" style="width: auto" name="reason_for_leave" type="radio" {{ $vacation->reason_for_leave && $vacation->reason_for_leave == "مولود" ? "checked" : "" }}/> مولود</span>
                                                                <span><input value="دراسية" style="width: auto" name="reason_for_leave" type="radio" {{ $vacation->reason_for_leave && $vacation->reason_for_leave == "دراسية" ? "checked" : "" }}/> دراسية</span>
                                                                @error('reason_for_leave')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-right: 0; border-left: 0">
                                                            <div class="flex__td">
                                                                <span>  
                                                                    هاتف 
                                                                    <input class="form-control" name="phone" value="{{ $vacation->phone }}" type="text" />
                                                                    @error('phone')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                                <span>
                                                                    اول يوم من الاجازة
                                                                    <input class="form-control" name="first_day_off" value="{{ $vacation->first_day_off }}" type="date" style="width: auto" />
                                                                    @error('first_day_off')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                                <span>
                                                                    اخر يوم من الاجازة
                                                                    <input class="form-control" name="last_date_off" value="{{ $vacation->last_date_off }}" type="date" style="width: auto"/>
                                                                    @error('last_date_off')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                                <span>
                                                                    عدد الايام 
                                                                    <input class="form-control" name="all_days" value="{{ $vacation->all_days }}" type="text" style="width: auto"/>
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <span>
                                                                    العنوان اثناء الاجازة
                                                                    <input class="form-control" name="address_in_vacation" value="{{ $vacation->address_in_vacation }}" type="text" style="width: 90%"/>
                                                                    @error('address_in_vacation')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <div>
                                                        <h2 class="text-center" style="margin: 0">الخدمة المطلوبة</h2>
                                                    </div>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span style="width: 20%; text-align: center">البلد</span>
                                                                <span style="width: 75%; text-align: center">التفصيل</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span style="width: 20%">تاشيرة خروج وعودة</span>
                                                                <span style="width: 75%; text-align: center">
                                                                    <input class="form-control" name="exit_and_return_visa" value="{{ $vacation->required_service['exit_and_return_visa'] }}" type="text"/>
                                                                    @error('exit_and_return_visa')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                            <div class="flex__td">
                                                                <span style="width: 20%">تاشيرة بلد</span>
                                                                <span style="width: 75%; text-align: center">
                                                                    <input class="form-control" name="country_visa" value="{{ $vacation->required_service['country_visa'] }}" type="text"/>
                                                                    @error('country_visa')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                            <div class="flex__td">
                                                                <span style="width: 20%">حجز الطيران / تذاكر</span>
                                                                <span style="width: 75%; text-align: center">
                                                                    <input class="form-control" name="ticket_reservation" value="{{ $vacation->required_service['ticket_reservation'] }}" type="text"/>
                                                                    @error('ticket_reservation')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                            <div class="flex__td">
                                                                <span style="width: 20%">تعويض التذكرة</span>
                                                                <span style="width: 75%; text-align: center">
                                                                    <input class="form-control" name="ticket_reimbursement" value="{{ $vacation->required_service['ticket_reimbursement'] }}" type="text"/>
                                                                    @error('ticket_reimbursement')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                            <div class="flex__td">
                                                                <div style="width: 30%">
                                                                    <span>تاريخ السفر</span>
                                                                    <span>
                                                                        <input class="form-control" name="date_travel" value="{{ $vacation->required_service['date_travel'] }}" type="date" style="width: auto" />
                                                                        @error('date_travel')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                                <div style="width: 30%">
                                                                    <span>الخطوط الجوية</span>
                                                                    <span>
                                                                        <input class="form-control" name="air_line" value="{{ $vacation->required_service['air_line'] }}" type="text" style="width: auto" />
                                                                        @error('air_line')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                                <div style="width: 30%">
                                                                    <span>الخط</span>
                                                                    <span>
                                                                        <input class="form-control" name="line" value="{{ $vacation->required_service['line'] }}" type="text" style="width: auto" />
                                                                        @error('line')
                                                                            <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                            <div class="flex__td">
                                                                <div style="text-align: center; width: 30%">الاسم</div>
                                                                <div style="text-align: center; width: 15%">العمر</div>
                                                                <div style="text-align: center; width: 30%">الاسم</div>
                                                                <div style="text-align: center; width: 15%">العمر</div>
                                                            </div>

                                                            <div class="flex__td">
                                                                @if($person_val = $vacation->persons()->where('person_id', 1)->first())
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span>الموظف</span>
                                                                            <span style="width: 85%">
                                                                                <input class="form-control" name="persons[1][name]" value="{{ $person_val->name }}" type="text" />
                                                                                <input name="persons[1][person_id]" value="1" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[1][age]" value="{{ $person_val->age }}" type="number" />
                                                                    </div>
                                                                @else
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span>الموظف</span>
                                                                            <span style="width: 85%">
                                                                                <input class="form-control" name="persons[1][name]" value="{{ old('persons.1.name') }}" type="text" />
                                                                                <input name="persons[1][person_id]" value="1" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[1][age]" value="{{ old('persons.1.age') }}" type="number" />
                                                                    </div>
                                                                @endif
                                                                @if($person_2_val = $vacation->persons()->where('person_id', 2)->first())
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span>زوجة</span>
                                                                            <span style="width: 85%">
                                                                                <input class="form-control" name="persons[2][name]" value="{{ $person_2_val->name }}" type="text" />
                                                                                <input name="persons[2][person_id]" value="2" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[2][age]" value="{{ $person_2_val->age }}" type="number" />
                                                                    </div>
                                                                @else
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span>الموظف</span>
                                                                            <span style="width: 85%">
                                                                                <input class="form-control" name="persons[2][name]" value="{{ old('persons.2.name') }}" type="text" />
                                                                                <input name="persons[2][person_id]" value="2" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[2][age]" value="{{ old('persons.2.age') }}" type="number" />
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <div class="flex__td">
                                                                @if($person_3_val = $vacation->persons()->where('person_id', 3)->first())
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span>اطفال</span>
                                                                            <span style="width: 85%">
                                                                                1- <input class="form-control" name="persons[3][name]" value="{{ $person_3_val->name }}" style="width: 90%" type="text"/>
                                                                                <input name="persons[3][person_id]" value="3" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[3][age]" value="{{ $person_3_val->age }}" type="number" />
                                                                    </div>
                                                                @else
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span style="width: 85%">
                                                                                1- <input class="form-control" name="persons[3][name]" value="{{ old('persons.3.name') }}" type="text" />
                                                                                <input name="persons[3][person_id]" value="3" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[3][age]" value="{{ old('persons.3.age') }}" type="number" />
                                                                    </div>
                                                                @endif
                                                                @if($person_4_val = $vacation->persons()->where('person_id', 4)->first())
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span>&nbsp;</span>
                                                                            <span style="width: 85%">
                                                                                2- <input class="form-control" name="persons[4][name]" value="{{ $person_4_val->name }}" style="width: 90%" type="text"/>
                                                                                <input name="persons[4][person_id]" value="4" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[4][age]" value="{{ $person_4_val->age }}" type="number" />
                                                                    </div>
                                                                @else
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span style="width: 85%">
                                                                                2- <input class="form-control" name="persons[4][name]" value="{{ old('persons.4.name') }}" type="text" />
                                                                                <input name="persons[4][person_id]" value="4" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[4][age]" value="{{ old('persons.4.age') }}" type="number" />
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <div class="flex__td">
                                                                @if($person_5_val = $vacation->persons()->where('person_id', 5)->first())
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span>&nbsp;</span>
                                                                            <span style="width: 85%">
                                                                                3- <input class="form-control" name="persons[5][name]" value="{{ $person_5_val->name }}" style="width: 90%" type="text"/>
                                                                                <input name="persons[5][person_id]" value="5" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[5][age]" value="{{ $person_5_val->age }}" type="number" />
                                                                    </div>
                                                                @else
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span style="width: 85%">
                                                                                3- <input class="form-control" name="persons[5][name]" value="{{ old('persons.5.name') }}" type="text" />
                                                                                <input name="persons[5][person_id]" value="5" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[5][age]" value="{{ old('persons.5.age') }}" type="number" />
                                                                    </div>
                                                                @endif
                                                                @if($person_6_val = $vacation->persons()->where('person_id', 6)->first())
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span>&nbsp;</span>
                                                                            <span style="width: 85%">
                                                                                4- <input class="form-control" name="persons[6][name]" value="{{ $person_6_val->name }}" style="width: 90%" type="text"/>
                                                                                <input name="persons[6][person_id]" value="6" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[6][age]" value="{{ $person_6_val->age }}" type="number" />
                                                                    </div>
                                                                @else
                                                                    <div style="text-align: center; width: 30%">
                                                                        <div class="flex__td">
                                                                            <span style="width: 85%">
                                                                                3- <input class="form-control" name="persons[6][name]" value="{{ old('persons.6.name') }}" type="text" />
                                                                                <input name="persons[6][person_id]" value="6" type="hidden" />
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="text-align: center; width: 15%">
                                                                        <input class="form-control" name="persons[6][age]" value="{{ old('persons.6.age') }}" type="number" />
                                                                    </div>
                                                                @endif
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>ملاحظات</span>
                                                                <span style="width: 95%">
                                                                    <input class="form-control" name="notes_one" value="{{ $vacation->required_service['notes_one'] }}" style="width: 99%" type="text"/>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <div>
                                                        <h2 class="text-center" style="margin: 0">قسم الموارد البشرية والشؤون الادارية</h2>
                                                    </div>
                                                    <tr>
                                                        <td style="width: 50%">
                                                        <div class="flex__td">
                                                            <span>تاريخ العودة السابقة</span>
                                                            <span style="width: 50%">
                                                                <input class="form-control" name="previous_return_date" value="{{ $vacation->human_resources['previous_return_date'] }}" type="date" />
                                                                @error('previous_return_date')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </span>
                                                        </div>
                                                        </td>
                                                        <td style="width: 50%">
                                                        <div class="flex__td">
                                                            <span>الاجازة المستحقة(مدفوعة)</span>
                                                            <span>
                                                                <input class="form-control" name="paid_leave" value="{{ $vacation->human_resources['paid_leave'] }}" type="number" />
                                                                @error('paid_leave')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </span>
                                                            <span>(ايام)</span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <div class="flex__td">
                                                            <span>تم صرف اجازة غير مدفوعة في هذه السنة</span>
                                                            <span>
                                                                <input class="form-control" name="unpaid_leave_per_year" value="{{ $vacation->human_resources['unpaid_leave_per_year'] }}" type="number" />
                                                                @error('unpaid_leave_per_year')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </span>
                                                            <span>(ايام)</span>
                                                        </div>
                                                        </td>
                                                        <td style="width: 50%">
                                                        <div class="flex__td">
                                                            <span>الاجازة المستحقة(غير مدفوعة)</span>
                                                            <span>
                                                                <input class="form-control" name="unpaid_leave" value="{{ $vacation->human_resources['unpaid_leave'] }}" type="number" />
                                                                @error('unpaid_leave')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </span>
                                                            <span>(ايام)</span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="2">
                                                            <div class="flex__td">
                                                                <span>ملاحظات</span>
                                                                <span style="width: 95%">
                                                                    <textarea name="notes_tow" style="width: 99%; resize: none" rows="3" >
                                                                        {{ $vacation->human_resources['notes_tow'] }}
                                                                    </textarea>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>العطلات والاعياد</span>
                                                                <span>
                                                                    <input class="form-control" name="holidays" value="{{ $vacation->human_resources['holidays'] }}" type="number" />
                                                                    @error('holidays')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                                <span>(ايام)</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <div class="flex__td">
                                                            <span>الاجمالي</span>
                                                            <span><input type="text" /></span>
                                                            <span>(ايام)</span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>هل الجواز ساري المفعول؟</span>
                                                                <span>
                                                                    نعم 
                                                                    <input name="is_the_passport_valid" value="1" type="radio" style="width: auto" {{ $vacation->human_resources['is_the_passport_valid'] == 1 ? "checked" : "" }}/>
                                                                </span>
                                                                <span>
                                                                    لا 
                                                                    <input name="is_the_passport_valid" value="0" type="radio" style="width: auto" {{ $vacation->human_resources['is_the_passport_valid'] == 0 ? "checked" : "" }}/>
                                                                </span>
                                                                @error('is_the_passport_valid')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>هل تغطي الاقامة مدة التاشيرة؟</span>
                                                                <span>
                                                                    نعم 
                                                                    <input name="cover_the_duration_of_the_visa" value="1" type="radio" style="width: auto" {{ $vacation->human_resources['cover_the_duration_of_the_visa'] == 1 ? "checked" : "" }}/>
                                                                </span>
                                                                <span>
                                                                    لا 
                                                                    <input name="cover_the_duration_of_the_visa" value="0" type="radio" style="width: auto" {{ $vacation->human_resources['cover_the_duration_of_the_visa'] == 0 ? "checked" : "" }}/>
                                                                </span>
                                                                @error('cover_the_duration_of_the_visa')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="flex__td">
                                                                <span>هل الاقامة سارية المفعول؟</span>
                                                                <span>
                                                                    نعم 
                                                                    <input name="is_the_residence_permit_valid" value="1" type="radio" style="width: auto" {{ $vacation->human_resources['is_the_residence_permit_valid'] == 1 ? "checked" : "" }}/>
                                                                </span>
                                                                <span>
                                                                    لا 
                                                                    <input name="is_the_residence_permit_valid" value="0" type="radio" style="width: auto" {{ $vacation->human_resources['is_the_residence_permit_valid'] == 0 ? "checked" : "" }}/>
                                                                </span>
                                                                @error('is_the_residence_permit_valid')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="flex__td">
                                                                <!-- <span>اعتماد من قبل</span>
                                                                <span style="width: 90%"><input type="text" /></span> -->
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
</script>
@endsection