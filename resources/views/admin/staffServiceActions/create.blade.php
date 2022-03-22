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

    .select_data {
        width: 100%;
        font-size: 17px;
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
                        <h3> إخلاء طرف</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active"><a style="text-decoration:none;color:black;" href="{{url(route('admin/staffServiceActions/index'))}}">قائمه إخلاء طرف</a></li>
                        <li class="breadcrumb-item active">اضافه إخلاء طرف</li>
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
                        <h5>اضافه إخلاء طرف</h5>
                    </div>
                    @include('flash::message')
                    <div class="card-body">


                        <form class="card" action="{{url(route('admin/staffServiceActions/store'))}}" method="post" enctype="multipart/form-data" >
                            @csrf


                            <div class="tab">
                                <button hidden id="Basic_Datatab" class="tablinks" onclick="openCity(event, 'Basic_Data')">البيانات الاساسيه</button>
                            </div>
                            <div id="Basic_Data" class="tabcontent">


                                <header style="text-align: center; margin-bottom: 20px">
                                    <div class="header__logo">
                                        <h1>
                                            مصنع تي إم
                                            <span>للملابس الجاهزة <br />
            والتوريدات الفندقية
          </span>
                                        </h1>
                                        <div style="margin: 0 20px; width: 120px">
                                            <img src="{{asset('/admin/assets/images/Logo.png')}}" alt="logo" />
                                        </div>
                                    </div>
                                </header>
                                <center><p style="font-weight: 700">ادارة الموارد البشرية والشؤون الادارية</p></center>
                                <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                                    نموذج إخلاء طرف
                                </h2>
                                <h2 style="
        text-transform: uppercase;
        text-align: center;
        margin: 0;
        font-size: 17px;
        font-weight: 700;
      ">
                                    Disclaimer form for the third party of the transfer services and the end of the service
                                </h2>
                                <center >
                                    <span style="color: orangered" class="error">{{ ($errors->first('staff_id'))?$errors->first('staff_id'). ' - ' : '' }} </span>
                                    <span style="color: orangered" class="error">{{ ($errors->first('job_id')?$errors->first('job_id')  . '  - ' : '')}} </span>
                                    <span style="color: orangered" class="error">{{ ($errors->first('section_id'))?$errors->first('section_id'). '  - ' :  ' ' }} </span>
                                    <span style="color: orangered" class="error">{{ ($errors->first('action_type'))?$errors->first('action_type'). '  - ' :  ' ' }} </span>
                                    {{--                                <span style="color: orangered" class="error">{{ ($errors->first('family_name'))?$errors->first('family_name'). '  - ' :  ' ' }} </span>--}}
                                    {{--                                <span style="color: orangered" class="error">{{ ($errors->first('birth'))?$errors->first('birth'). '  - ' :  ' ' }} </span>--}}
                                    {{--                                <span style="color: orangered" class="error">{{ ($errors->first('place_of_birth'))?$errors->first('place_of_birth'). '  - ' :  ' ' }} </span>--}}
                                    {{--                                <span style="color: orangered" class="error">{{ ($errors->first('nationality'))?$errors->first('nationality'). '  - ' :  ' ' }} </span>--}}
                                    {{--                                <span style="color: orangered" class="error">{{ ($errors->first('religion'))?$errors->first('religion'). '  - ' :  ' ' }} </span>--}}

                                </center>
                                <div class="outer__border">
                                    <div>
                                        <table>
                                            <tr>
                                                <td>
                                                    اسم الموظف
                                                </td>

                                                <td>
                                                    الوظيفة
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select  class="select_data" name="staff_id" id="staff_id">
                                                        <option  selected  disabled>-- يرجي تحديد اسم الموظف   ----</option>
                                                    <?php
                                                        foreach ($staffs as $onestaff){
                                                        ?>
                                                        <option     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="select_data" name="job_id" id="job_id">
                                                        <option  selected  disabled>-- يرجي تحديد الوظيفة    ----</option>
                                                        <?php
                                                        foreach ($jobs as $oneJob){
                                                        ?>
                                                        <option    value="{{$oneJob->id}}">{{$oneJob->name_job}}</option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>

                                                <td>
                                                    <div class="flex__td">
                                                        <span>الرقم الوظيفي</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex__td">
                                                        <span>القسم</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="job_number" type="number">
                                                </td>
                                                <td>
                                                    <select name="section_id" class="select_data" name="section_id" id="administration_id">
                                                        <option  selected  disabled>-- يرجي تحديد القسم   ----</option>
                                                        <?php
                                                        foreach ($sections as $oneSection){
                                                        ?>
                                                        <option    value="{{$oneSection->id}}">{{$oneSection->name}}</option>
                                                        <?php } ?> </select>
                                                </td>
                                            </tr>
                                        </table>
                                        <table>
                                            <tr>

                                                <td>
                                                    <div class="flex__td">
                                                        <span> موقع العمل</span>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <input name="work_address" type="text">
                                                </td>

                                                <td>
                                                    <div class="flex__td">
                                                        <span> منح إجازة<input name="action_type" value="منح إجاز" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>نقل<input name="action_type" value="نقل" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                        <span>استقالة / انتهاء خدمات<input name="action_type" value="استقالة / انتهاء خدمات" type="radio" style="display: inline-block; width: auto;" ></span>
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="outer__border">
                                    <table>
                                        <table>
                                            <tr>
                                                <td>
                                                    حيث تم اعتماد : الموضحة بياناته أعلاه و بناء علي القرار الاداري رقم (_____) بتاريخ (_________).اعتبارا من تاريخ (______)وعلية فقد تم استكمال الاجراءات حيال إخلاء طرفة كما يلي
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    موقع العمل
                                                </td>
                                            </tr>
                                        </table>
                                </div>
                                <div class="outer__border">
                                    <table>
                                        <tr>
                                            <td>
                                                سلم مهام عمله الي الموظف
                                            </td>
                                            <td>
                                                سلم وثائق المؤسسة
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="to_staff_id" class="select_data">
                                                    <option  selected  disabled>-- يرجي تحديد الموظف المنوب إليه    ----</option>
                                                    <?php
                                                    foreach ($staffs as $onestaff){
                                                    ?>
                                                    <option     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                    <?php } ?></select>
                                            </td>
                                            <td>
                                                <select name="document_type" class="select_data">
                                                    <option value=""  selected  disabled>-- يرجي تحديد الوثائق    ----</option>
                                                    <option value="كتالوجات" selected >كتالوجات </option>
                                                    <option value="ملفات"   >ملفات</option>
                                                    <option value="مراسلات"  >مراسلات</option>
                                                    <option  value="مفاتيح" >مفاتيح</option>
                                                    <option   value="مواد دعاية">مواد دعاية</option>
                                                    <option  value="أدوات" >أدوات</option>
                                                    <option  value="عدد" >عدد</option>
                                                    <option  value="كروت عمل" >كروت عمل</option>
                                                    <option   value="أخري ">أخري </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                التي بحوزته الي
                                            </td>
                                            <td>
                                                قام بتدريب الموظف علي الاعمال التخصصية المناط به .
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="he_has" class="select_data">
                                                    <option  selected  disabled>-- يرجي تحديد الموظف المسلم إليه    ----</option>
                                                    <?php
                                                    foreach ($staffs as $onestaff){
                                                    ?>
                                                    <option     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                    <?php } ?></select>

{{--                                                <input name="he_has" type="text">--}}
                                            </td>
                                            <td>
                                                <select name="employee_special_work" class="select_data">
                                                    <option  selected  disabled>-- يرجي تحديد الموظف  المدرب    ----</option>
                                                    <?php
                                                    foreach ($staffs as $onestaff){
                                                    ?>
                                                    <option     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                    <?php } ?></select>

{{--                                                <input name="employee_special_work" type="text">--}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                قام بتسليم المعدات و العدد و الادوات المسلمه له الي
                                            </td>
                                            <td>
                                                توقيع المستلم
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="equipment_reciver" class="select_data">
                                                    <option  selected  disabled>-- يرجي تحديد الموظف  المستلم للمعدات    ----</option>
                                                    <?php
                                                    foreach ($staffs as $onestaff){
                                                    ?>
                                                    <option     value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                    <?php } ?></select>

{{--                                                <input name="equipment_reciver" type="text">--}}
                                            </td>
                                            <td>
{{--                                                <input type="text">--}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                تم تسليم ارقام الشفره الخاصة ب الالات و الاجهزة و الخزائن اخري
                                            </td>
                                            <td>
                                                توقيع المستلم
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="code_numbers_note"  class="select_data"  >
                                                    <option  selected   disabled>-- يرجي تحديد اسم الموظف  لتسليم ارقام الشفره ----</option>
                                                    <?php
                                                    foreach ($staffs as $onestaff){
                                                    ?>
                                                    <option    value="{{$onestaff->id}}">{{$onestaff->name}}</option>
                                                    <?php } ?>
                                                </select>
{{--                                                <input name="code_numbers_note" type="text">--}}
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                تمت عمليات التسليم و التدريب عالية
                                            </td>
                                            <td>
                                                اعتماد الرئيس المباشر
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="operation_done" type="text">
                                            </td>
                                            <td>
                                                <input name="approval_direct_manager" type="text">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="outer__border">
                                    <table>
                                        <tr>
                                            <td>
                                                ادارة الشئون الادارية
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                أخلاء طرف المذكور من قسم المستودعات و استلام العهد التي بحوزتة كما يلي
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span> حسب الكشف المرفق<input name="receipt_covenant" value="حسب الكشف المرفق" type="radio"  style="display: inline-block; width: auto;"></span>
                                                <span>ليس بعهدته شئ<input name="receipt_covenant" value="ليس بعهدته شئ" type="radio"  style="display: inline-block; width: auto;" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                اعتماد ادارة الشئون الادارية
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input  name="accreditation_Administrative_Affairs" type="text">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="outer__border">
                                    <table>
                                        <tr>
                                            <td>
                                                الادارة الماليه
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                تم اخلاء طرف المذكور واستلام العهد التي بحوزتة كام يلي
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>لا ينطبق <input type="radio" value="لا ينطبق"  name="bank_signature_status" style="display: inline-block; width: auto;"></span>
                                                <span>تم إالغاء توقيع البنك(في حالة انتهاء الخدمات)<input value="تم إالغاء توقيع البنك" name="bank_signature_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>ليس لدية عهد مالية <input value="ليس لدية عهد مالية" name="financial_covenant_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                <span>تم استلام ما لدية من عهد ماليه وتبلغ (_______جنية)<input value="تم استلام ما لدية من عهد ماليه" name="financial_covenant_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                و هي عبارة عن
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="financial_covenant_value" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>لا يوجد رصيد <input value="لا يوجد رصيد" name="balance_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                <span>   رصيد مدين  بمبلغ(___________جنية)<input value="رصيد مدين" name="balance_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                و هو عبارة عن
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="balance" type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                رصيد دائن بمبلغ(_______جنية) و هو عبارة عن
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="debit_balance" type="text">
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="outer__border">
                                    <table>
                                        <tr>
                                            <td>
                                                توقيع محاسب الرواتب
                                            </td>
                                            <td>
                                                توقيع رئيس الحسابات
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input disabled type="text">
                                            </td>
                                            <td>
                                                <input disabled type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                توقيع حسابات المستودعات
                                            </td>
                                            <td>
                                                توقيع مدير الحسابات
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input disabled type="text">
                                            </td>
                                            <td>
                                                <input disabled type="text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                توقيع مشرف حسابات العملاء
                                            </td>
                                            <td>
                                                توقيع مدير الحسابات
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input  disabled type="text">
                                            </td>
                                            <td>
                                                <input disabled type="text">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="outer__border">
                                    <table>
                                        <tr>
                                            <td style="text-align: center;">
                                                في حالة انتهاء الخدمات
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span>ليس لدية عهد او ممتلكات الشركة<input value="ليس لدية عهد او ممتلكات الشركة" name="finish_donot_have_covenant" type="radio"  style="display: inline-block; width: auto;"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>لا ينطبق<input value="لا ينطبق" type="radio" name="finish_donot_have_covenant"  style="display: inline-block; width: auto;"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span> تم استلام ممتلكات الشركة حسب البيان التالي </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><textarea name="company_data" rows="5"></textarea></td>

                                        </tr>
                                    </table>
                                </div>
                                <div class="outer__border">
                                    <table>
                                        <tr>
                                            <td>
                                                قسم الحركة
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>تم استلام السيارة لا  ينطبق <input value="تم استلام السيارة لا  ينطبق" name="move_department" type="radio"  style="display: inline-block; width: auto;"></span>
                                                <span>اخلاء طرف من المكتب لا ينطبق<input value="اخلاء طرف من المكتب لا ينطب" name="move_department" type="radio"  style="display: inline-block; width: auto;" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                قسم شئون الموظفين
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>تمت مراجعة الاجارات  <input value="تمت مراجعة الاجارات" name="employee_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                <span>اغلائ طرف الهاتف <input value="اغلائ طرف الهاتف" name="employee_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                                <span>لا ينطبق <input value="لا ينطبق" name="employee_status" type="radio"  style="display: inline-block; width: auto;" ></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                اعتماد المدير المالي و الاداري
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input name="manager_confirm" type="text">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <footer class="page__footer">
                                    <p style="font-weight: 600; font-size: 18px; direction: ltr">
                                        <span><img src="../location.png" alt="" /></span>KING FAISAL ST., EL KOM EL AKHDAR STATION, END OF ALY SHIHA ST, HARAM, GIZA- EGYPT.
                                    </p>
                                    <p>
                                        <span><img src="../telephone.png" alt="" /></span>+2 33840003 - 33840530
                                        <img src="../whatsapp.png" alt="" /> 01099977100 - 01000080770
                                    </p>
                                    <p><img src="../facebook.png" alt="" />facebook.com/tmuniform</p>
                                    <p>
                                        <span><img src="../global.png" alt="" /></span>www.tmuniform.com
                                    </p>
                                    <p>sales@tmuniform.com - export@tmuniform.com - gm@tmuniform.com</p>
                                    <p>
                                        All rights reserved to tmuniform.com
                                        <span id="footer-date" style="background-color: inherit"></span>
                                    </p>
                                </footer>

                                <center>

                                    <button class="btn btn-primary" type="submit">اضافه</button>

                                </center>
                            </div>



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

        function addRowDependances(frm) {
            rowNum++;
            var row = '<tr id="rowNum' + rowNum + '">' +'<td>'+
                '<input name="dependents_name[]" type="text" />'+
                '</td>'+
                '<td>'+
                '<input name="dependents_age[]" type="text" />'+
                '</td>'+
                '<td>'+
                '<input name="dependents_relation[]" type="text" />'+
                ' </td>'+


                '<td>'+
                '<input type="button" value="<?php echo "Remove"; ?>" onclick="removeRowDependances(' + rowNum + ');" class="btn btn-danger" />'+
                '</td>'
            '</tr>';
            jQuery('#itemRowsDependances').append(row);
        }

        function removeRowDependances(rnum) {
            jQuery('#rowNum' + rnum).remove();
        }
    </script>
    <script type="text/javascript">
        var company_rowNum = 1;

        function addRowcompany_row(frm) {
            company_rowNum++;
            var row = '<tr id="company_rowNum' + company_rowNum + '">' +'<td>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removecompany_row(' + company_rowNum + ');" class="btn btn-danger" /></td>'+
                '  <td> <div class="flex__td">             <span> <div class="flex__td"> <span>من</span><span><input name="company_from[]" type="date" style="width: auto" /></span><span>from</span></div></span><span><div class="flex__td"><span>الي</span><span><input name="company_to[]" type="date" style="width: auto" /></span><span>To</span></div></span></div></td><td><div class="flex__td"><span>مسمي الوظيفة</span><span><input name="company_job_title[]" type="text" style="width: auto" /></span><span dir="ltr"> Job title </span></div></td><td><div class="flex__td"><span>الراتب</span><span><input name="company_salary[]" type="text" style="width: auto" /></span><span dir="ltr">Salary</span></div><div class="flex__td"><span>البدلات</span><span><input name="company_allowance[]" type="text" style="width: auto" /></span><span dir="ltr">Allowance</span></div></td></tr><tr id="company_rowNum1' + company_rowNum + '"><td><div class="flex__td" style="flex-wrap: wrap"><span>اسم الشركة/صاحب العمل</span><span dir="ltr">Name of co/org</span><span style="width: 100%"> <input name="company_name_of_org[]" type="text" /></span></div><div class="flex__td" style="flex-wrap: wrap"><span>الهاتف </span><span dir="ltr">Telephone No</span><span style="width: 100%"><input name="company_telephone[]" type="text" /></span></div><div class="flex__td" style="flex-wrap: wrap"><span>العنوان</span><span dir="ltr">Address</span><span style="width: 100%"><input name="company_address[]" type="text" /></span></div></td><td><div class="flex__td" style="flex-wrap: wrap"><span>تفاصيل عن واجباتك</span><span dir="ltr">Description of your duties</span><span style="width: 100%; text-align: center"><textarea name="company_description[]" style="width: 95%" rows="10"></textarea></span></div></td><td><div class="flex__td" style="flex-wrap: wrap"><span>سبب ترك العمل</span><span dir="ltr">Reason for Quit</span><span style="width: 100%; text-align: center"><textarea name="company_reason_for_quit[]" style="width: 95%" rows="10"></textarea></span></div></td></tr>'
            '</tr>';
            jQuery('#itemCompany_row').append(row);
        }

        function removecompany_row(rnum) {
            // alert(rnum)
            jQuery('#company_rowNum' + rnum).remove();
            jQuery('#company_rowNum1' + rnum).remove();
        }
    </script>
    <script type="text/javascript">
        var language_rowNum = 1;

        function addRowlanguage_row(frm) {
            language_rowNum++;
            var row = '<tr id="language_rowNum' + language_rowNum + '">' +'<th>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removelanguage_row(' + language_rowNum + ');" class="btn btn-danger" /> <input type="text" placeholder="اسم اللغة" name="language_name[]" > </th><td><input name="language_speaking_ex[]" type="text" /></td><td><input name="language_speaking_g[]" type="text" /></td><td><input name="language_speaking_f[]" type="text" /></td><td><input name="language_reading_ex[]" type="text" /></td><td><input name="language_reading_g[]" type="text" /></td><td><input name="language_reading_f[]" type="text" /></td><td><input name="language_writing_ex[]" type="text" /></td><td><input name="language_writing_g[]" type="text" /></td><td><input name="language_writing_f[]" type="text" /></td><td><input name="language_typing_speed[]" type="text" /></td><td><input name="language_other_skills[]" type="text" /></td></tr>';
            jQuery('#itemlanguage_row').append(row);
        }

        function removelanguage_row(rnum) {
            // alert(rnum)
            jQuery('#language_rowNum' + rnum).remove();
        }
    </script>
    <script type="text/javascript">
        var course_rowNum = 1;

        function addRowcourse_row(frm) {
            course_rowNum++;
            var row = '<tr id="course_rowNum' + course_rowNum + '">' +'<td>    <input type="button" value="<?php echo "Remove"; ?>" onclick="removecourse_row(' + course_rowNum + ');" class="btn btn-danger" /></td>'+

                '<td><input name="course_name[]" type="text" /></td> <td><input name="course_name_of_institute[]" type="text" /></td><td><input name="course_city[]" type="text" /></td><td><input name="course_from[]" type="date" /></td><td><input name="course_to[]" type="date" /></td><td colspan="2"><input name="course_specialize[]" type="text" /></td></tr>';
            jQuery('#itemcourse_row').append(row);
        }

        function removecourse_row(rnum) {
            // alert(rnum)
            jQuery('#course_rowNum' + rnum).remove();
        }
    </script>
    <script>
        function openCity(evt, cityName) {
            evt.preventDefault();
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

@endsection
