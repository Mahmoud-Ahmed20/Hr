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
                        <h3>طلبات  نقل او رحلات عمل</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">
                            <a style="text-decoration:none;color:black;" href="{{url(route('admin/business_trip_and_transfer_requests/index'))}}">طلبات  نقل او رحلات عمل</a>
                        </li>
                        <li class="breadcrumb-item active">اضافه طلب  نقل او رحله عمل</li>
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
                        <h5>اضافه طلب  نقل او رحله عمل</h5>
                    </div>
                    @include('flash::message')
                    <div class="card-body">

                        <form class="card" action="{{url(route('admin/business_trip_and_transfer_requests/store'))}}" method="post" enctype="multipart/form-data" >
                            @csrf

                            <center >
                                <span style="color: orangered" class="error">{{ ($errors->first('name'))?$errors->first('name'). ' - ' : '' }} </span>
                                <span style="color: orangered" class="error">{{ ($errors->first('id_no'))?$errors->first('id_no'). ' - ' : '' }} </span>
{{--                                <span style="color: orangered" class="error">{{ ($errors->first('Travel_Residence_details_from'))?$errors->first('Travel_Residence_details_from'). ' - ' : '' }} </span>--}}

                            </center>

                                <header style="text-align: center; margin-bottom: 5px">
                                    <div class="header__logo">
                                        <h1>
                                            مصنع تي إم
                                            <span
                                            >للملابس الجاهزة <br />
            والتوريدات الفندقية
          </span>
                                        </h1>
                                        <div style="margin: 0 20px; width: 120px">
                                            <img src="{{asset('/admin/assets/images/Logo.png')}}" alt="logo" />
                                        </div>
                                    </div>
                                    <h2 style="margin-bottom: 15px; font-weight: 600">
                                        Business Trip and transfer Request Form
                                    </h2>
                                    <div class="flex__td" style="font-weight: 600">
        <span style="border-bottom: 2px solid #222"
        >يتم تعبئة النموذج قبل 3 ايام لمهمة داخلية واسبوعين لمهمة خارجية</span
        >
                                        <span
                                        >To be filled 3 days & 2 weeks prior to local & overseas trips</span
                                        >
                                    </div>
                                    <h3
                                        style="
          margin: 0 auto 0 0;
          border-bottom: 2px solid #222;
          width: fit-content;
        "
                                    >
                                        respectively
                                    </h3>
                                </header>

                                <div class="outer__border">
                                    <div>
                                        <table>
                                            <tr>
                                                <td style="width: 50%">
                                                    <div class="flex__td">
                                                        <span>الرقم الوظيفي</span>
                                                        <span>I.D. No</span>
                                                    </div>
                                                </td>
                                                <td style="width: 50%">
                                                    <div class="flex__td">
                                                        <span>الاسم</span>
                                                        <span>Name</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input name="id_no" type="text" /></td>


                                                <td>


                                                    <select  class="select_data" name="name" id="staff_id">
                                                        <option  selected  disabled>-- يرجي تحديد اسم الموظف   ----</option>
                                                        <?php
                                                        foreach ($staffs as $onestaff){
                                                        ?>
                                                        <option     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                        <?php } ?>
                                                    </select>


{{--                                                    <input name="name" type="text" />--}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>الجنسية</span>
                                                        <span>Nationality</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>المسمي الوظيفي</span>
                                                        <span>Position</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>

                                                    <select  class="select_data" name="nationality" id="staff_id">
                                                        <option  selected  disabled>-- يرجي تحديد الجنسيه   ----</option>
                                                        <?php
                                                        foreach ($nationaliities as $onenationality){
                                                        ?>
                                                        <option     value="{{$onenationality->id}}">{{$onenationality->name_nationality}}</option>
                                                        <?php } ?>
                                                    </select>
                                                </td>


{{--                                                    <input name="nationality" type="text" />--}}
                                                <td><input name="position" type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="flex__td" style="font-weight: 600; margin-top: 8px">
                                                        <span>تفاصيل المهمة</span>
                                                        <span>Business Leave Details</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>موقع العمل الحالي</span>
                                                        <span>The current work site</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>تاريخ ووقت البدء</span>
                                                        <span>Start Date</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input name="current_work_site" type="text" /></td>
                                                <td><input name="start_date" type="date" /></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>موقع المهمة</span>
                                                        <span>Destination</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>مدة المهمة</span>
                                                        <span>Period of Stay</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input name="destination" type="text" /></td>
                                                <td><input name="period_of_stay" type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td rowspan="2">&nbsp;</td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>وسيلة السفر</span>
                                                        <span>Means of Transportation</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input name="means_of_transportation" type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="flex__td">
                                                        <span>اسباب المهمة</span>
                                                        <span>Reasons for Business Leave</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><textarea name="reasons_for_business_leave" rows="5"></textarea></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="outer__border">
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="9">
                                                    <div class="flex__td">
                                                        <span>تفاصيل السفر والاقامة</span>
                                                        <span>Travel & Residence details</span>
                                                    </div>


                                                </td>

                                            </tr>
                                            <tr>
                                                <th rowspan="2">
                                                    <span>Remarks</span><br />
                                                    <span>الملاحظات</span>
                                                </th>
                                                <th colspan="2">
              <span class="flex__td" style="justify-content: space-around;">
                <span>الاقامة</span>
                <span>Stay</span>
              </span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>Visas</span><br />
                                                    <span>التاشيرات اللازمة</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>Airlines</span><br />
                                                    <span>خطوط الطيران</span>
                                                </th>
                                                <th colspan="2">
              <span class="flex__td">
                <span>السفر</span>
                <span>Travel</span>
              </span>
                                                </th>
                                                <th rowspan="2">
                                                    <div class="flex__td" style="justify-content: space-around">
                                                        <span>التاريخ</span>
                                                        <span>date</span>
                                                    </div>
                                                </th>
                                                <th rowspan="2">
                                                    <div class="flex__td">
                                                        <span> <input onclick="addRowResidencedetails(this.form);" type="button" value="<?php echo "إضافه / Add"; ?>" class="btn btn-success" /></span>
                                                    </div>

                                                </th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>المدة</span>
                                                        <span>Period</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>موقع الاقامة</span>
                                                        <span>Place</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>الي</span>
                                                        <span>To</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>من</span>
                                                        <span>From</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tbody id="itemRowsResidencedetails">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="outer__border">
                                    <div>
                                        <table>
                                            <tr>
                                                <th>
                                                    <span>Remarks</span><br>
                                                    <span>الملاحظات</span>
                                                </th>
                                                <th style="width: 250px;">
                                                    <span>Req. Amount in Saudi Riyals</span><br>
                                                    <span>المبلغ المطلوب بالريال السعودي</span>
                                                </th>
                                                <th style="width: 250px;">
                                                    <span>Req. Amount in Foreign Currency</span><br>
                                                    <span>المبلغ المطلوب بالعملة الاجنبية</span>
                                                </th>
                                                <th>
                                                    <span>Expenses Details</span><br>
                                                    <span>وصف المصورفات</span>
                                                </th>
                                                <th style="width: 70px;">
                                                    <span>No</span><br>
                                                    <span>الرقم</span>
                                                </th>
                                                <th>
                                                    <div class="flex__td">
                                                        <span> <input onclick="addRowExpensesdetails();" type="button" value="<?php echo "إضافه / Add"; ?>" class="btn btn-success" /></span>
                                                    </div>

                                                </th> </tr>
                                            <tbody id="itemRowsExpensesdetails">

                                            </tbody>

                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input disabled  id="expensestotal_saudi" type="text">
                                                    <input  name="expensestotal_saudi_val" id="expensestotal_saudi_val" type="hidden">
                                                </td>
                                                <td>
                                                    <input disabled  id="expensestotal_foreign" type="text">
                                                    <input  name="expensestotal_foreign_val" id="expensestotal_foreign_val" type="hidden">
                                                </td>
                                                <td colspan="3">
                                                    <div class="flex__td">
                                                        <span>المجموع الكلي</span>
                                                        <span>Total Amount</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="outer__border">
                                    <div>
                                        <table>
                                            <tr>
                                                <th rowspan="3">
                                                    <span>تاشيرة خروج وعودة</span><br>
                                                    <span>Exit & Re-Entry Visa</span>
                                                </th>
                                                <th>
                                                    <span>التفاصيل</span><br>
                                                    <span>التفاصيل</span>
                                                </th>
                                                <th>
                                                    <div class="flex__td">
                                                        <span>متطلبات خاصة</span>
                                                        <span>Special Req</span>
                                                    </div>
                                                </th>
                                                <th colspan="2">
                                                    <div class="flex__td">
                                                        <span>عضوية الاميال</span>
                                                        <span>Travel Membership</span>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td><input type="text"></td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>حجز فندق</span>
                                                        <span>Hotwl Reservation</span>
                                                    </div>
                                                </td>
                                                <th rowspan="2">
                                                    <span>Member Card No</span><br>
                                                    <span>رقم بطاقة العضوية</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>Airlines</span><br>
                                                    <span>الخطوط الجوية</span>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td><input type="text"></td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>حجز سيارة سياحية</span>
                                                        <span>Car Rental</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>نعم</span>
                                                        <span><input type="checkbox"></span>
                                                        <span>Yes</span>
                                                    </div>
                                                </td>
                                                <td><input type="text"></td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>مساعدة عند الوصول</span>
                                                        <span>Meet & Assist</span>
                                                    </div>
                                                </td>
                                                <td><input type="text"></td>
                                                <td><input type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>لا</span>
                                                        <span><input type="checkbox"></span>
                                                        <span>No</span>
                                                    </div>
                                                </td>
                                                <td><input type="text"></td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>سلفة</span>
                                                        <span>Down Payment</span>
                                                    </div>
                                                </td>
                                                <td><input type="text"></td>
                                                <td><input type="text"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text"></td>
                                                <td><input type="text"></td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>اخري</span>
                                                        <span>others</span>
                                                    </div>
                                                </td>
                                                <td><input type="text"></td>
                                                <td><input type="text"></td>
                                            </tr>
                                        </table>
                                        <div style="font-weight: 600; margin: 10px 0; font-size: 20px; align-items: flex-start;" class="flex__td">
                                            <div style="width: 48%;">
                                                <span style="border-bottom: 2px solid #222;">ملاحظة: </span> في حالة اختلاف ايام السفر يرجي التصفية بنموذج بيان تسوية لمهمة الانتداب عند العودة من المهمة بمدة اقصاها (3) ايام
                                            </div>
                                            <div style="width: 48%;" dir="ltr">
                                                <span style="border-bottom: 2px solid #222;">Note: </span> In case of any change in requested days, please settle by Travel Expenses Settlement From with(3) days after arriavl
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="outer__border">
                                    <div>
                                        <table>
                                            <tr>
                                                <th>
                                                    <span>General Manager</span><br>
                                                    <span>المدير المباشر</span>
                                                </th>
                                                <th>
                                                    <span>Fin & Admin Manager</span><br>
                                                    <span>المدير المالي والاداري</span>
                                                </th>
                                                <th>
                                                    <span>Accounts</span><br>
                                                    <span>المحاصب</span>
                                                </th>
                                                <th>
                                                    <span>Dept. Manager</span><br>
                                                    <span>مدير الادارة</span>
                                                </th>
                                                <th>
                                                    <span>Direct Suppervisor</span><br>
                                                    <span>الرئيس المباشر</span>
                                                </th>
                                                <th>
                                                    <span>Employee</span><br>
                                                    <span>الموظف</span>
                                                </th>
                                                <th >
                                                    <div class="flex__td">
                                                        <span> <input onclick="addRowManagerdetails();" type="button" value="<?php echo "إضافه / Add"; ?>" class="btn btn-success" /></span>
                                                    </div>

                                                </th>
                                            </tr>
                                            <tbody id="itemRowsManagerdetails">

                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <div class="outer__border">
                                    <div>
                                        <table>
                                            <tr>
                                                <td>صورة لدي الموظف الموارد البشرية</td>
                                                <td dir="ltr">Copy for HR Speicalist</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input name="photo" type="file">
                                                </td>
{{--                                                <td></td>--}}
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                                <center> &nbsp;
                                 <button class="btn btn-primary" type="submit">اضافه</button>
                                </center>

{{--                            </div>--}}





                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#Basic_Datatab').click();
        });

        var rowNum = 1;

        function addRowResidencedetails(frm) {
            rowNum++;
            var row = ' <tr id="rowNum'+rowNum+'"> <td><input name="Travel_Residence_details_remarks[]" type="text"></td><td><input name="Travel_Residence_details_period[]" type="text"></td><td><input  name="Travel_Residence_details_place[]" type="text"></td><td><input name="Travel_Residence_details_visas[]" type="text"></td><td><input name="Travel_Residence_details_airlines[]" type="text"></td><td><input name="Travel_Residence_details_to[]" type="text"></td><td><input name="Travel_Residence_details_from[]" type="text"></td><td><input required  name="Travel_Residence_details_date[]" type="date"></td><td><input type="button" value="<?php echo "Remove"; ?>" onclick="removeRowResidencedetails(' + rowNum + ');" class="btn btn-danger" /></td></tr>';
            jQuery('#itemRowsResidencedetails').append(row);
        }

        function removeRowResidencedetails(rnum) {
            jQuery('#rowNum' + rnum).remove();
        }
    </script>
    <script type="text/javascript">


        var rowNumExpenses = 1;

        function addRowExpensesdetails() {
            rowNumExpenses++;
            var row = ' <tr id="rowNumExpenses'+rowNumExpenses+'"> <td><input name="expenses_remarks[]" type="text"></td><td><input onchange="getTotalExpenses()" class="expenses_amount_saudi"  name="expenses_amount_saudi[]" type="text"></td><td><input onchange="getTotalExpenses()"  class="expenses_amount_foreign" name="expenses_amount_foreign[]" type="text"></td><td><input name="expenses_details[]" type="text"></td><td><input required name="expenses_no[]" type="text"></td><td><input type="button" value="<?php echo "Remove"; ?>" onclick="removeRowExpensesdetails(' + rowNumExpenses + ');" class="btn btn-danger" /></td></tr>';
            jQuery('#itemRowsExpensesdetails').append(row);
        }

        function removeRowExpensesdetails(rnum) {
            jQuery('#rowNumExpenses' + rnum).remove();
        }

        function getTotalExpenses(){


            const textID = document.querySelectorAll('.expenses_amount_saudi');
            let total_saudi = 0;
            let zero = 0;

            textID.forEach(el => (el.value > 0 ) ? total_saudi += +el.value : total_saudi += +zero);



            const textIDforeign = document.querySelectorAll('.expenses_amount_foreign');
            let total_foreign = 0;

            textIDforeign.forEach(el => (el.value > 0 ) ? total_foreign += +el.value : total_foreign += +zero);





$('#expensestotal_saudi_val').val(total_saudi);
$('#expensestotal_saudi').val(total_saudi);
$('#expensestotal_foreign_val').val(total_foreign);
$('#expensestotal_foreign').val(total_foreign);
        }
    </script>
    <script type="text/javascript">


        var rowNumManager = 1;

        function addRowManagerdetails() {
            rowNumManager++;
            var row = ' <tr id="rowNumManager'+rowNumManager+'">  <td><input name="manager_general_manager[]" type="text"></td> <td><input name="manager_admin_manager[]" type="text"></td><td><input name="manager_accounts[]" type="text"></td><td><input name="manager_dept_manager[]" type="text"></td><td><input name="manager_direct_suppervisor[]" type="text"></td><td><input name="manager_employee[]" type="text"></td><td><input type="button" value="<?php echo "Remove"; ?>" onclick="removeRowManagerdetails(' + rowNumManager + ');" class="btn btn-danger" /></td></tr>';
            jQuery('#itemRowsManagerdetails').append(row);
        }

        function removeRowManagerdetails(rnum) {
            jQuery('#rowNumManager' + rnum).remove();
        }

    </script>


@endsection
