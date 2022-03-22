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
<button class="btn btn-danger float-left mt-3 text-center" id="print_Button" onclick="printDiv()">
    <i class="mdi mdi-printer ml-1"></i>طباعة
  </button>
        <div dir="rtl" id="print">
            <header  style="text-align: center; margin-bottom: 20px">
                <div class="header__logo">
                  <h1>
                    مصنع تي إم
                    <span style="color: black;"
                      >للملابس الجاهزة <br />
                      والتوريدات الفندقية
                    </span>
                  </h1>
                  <div style="margin: 0 20px; width: 120px">
                    <img src="{{ asset('admin/assets/images/Logo.png') }}" alt="logo" />
                  </div>
                </div>

              </header>
              <p style="text-align: right; font-weight: 600">
                ادارة الموارد البشرية والشؤون الادارية
              </p>
              <h2 style="text-align: center; margin: 0; font-size: 28px; font-weight: 700">
                نموذج إخلاء /النقل /انتهاء الخدمة
            </h2>
            <h2 style="text-transform: uppercase;text-align: center; margin: 0;font-size: 17px;font-weight: 700;">
                Disclaimer form for the third party of the transfer services and the end of the service
            </h2>


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
                                                             <input value="{{$staff->staff->name}}" name="job_number" type="text" readonly>



                                                        </td>
                                                        <td>
                                                            <input type="text" name=""  value="{{ $staff->job->name_job}}" id="" readonly>
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
                                                            <input value="{{$staff->job_number}}" name="job_number" type="number" readonly>
                                                        </td>
                                                        <td>
                                                           <input type="text" name="" value="{{ $staff->section->name }}" id="" readonly>
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
                                                            <input value="{{$staff->work_address}}" name="work_address" type="text" readonly>
                                                        </td>

                                                        <td>
                                                            <div class="flex__td">
                                                                <span> منح إجازة<input  {{ $staff->action_type == 'منح إجاز' ? "checked":"" }}  name="action_type" value="منح إجاز" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                                <span>نقل<input  {{ $staff->action_type == 'نقل'  ? "checked" :"" }} name="action_type" value="نقل" type="radio"  style="display: inline-block; width: auto;"  disabled></span>
                                                                <span>استقالة / انتهاء خدمات<input   {{ $staff->action_type == 'استقالة / انتهاء خدمات'  ? "checked" :"" }}   name="action_type" value="استقالة / انتهاء خدمات" type="radio" style="display: inline-block; width: auto;"  disabled></span>
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
                                                        <input type="text" name="" value="{{$staff->to_staff->name}}" id="" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" value="{{ $staff->document_type }}" id="" readonly>
                                                    
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
                                                        <input value="{{$staff->he_has}}" name="he_has" type="text" readonly>
                                                    </td>
                                                    <td>
                                                        <input value="{{$staff->employee_special_work}}" name="employee_special_work" type="text" readonly>
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
                                                        <input value="{{$staff->equipment_reciver}}" name="equipment_reciver" type="text" readonly>
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
                                                        <input value="{{$staff->code_numbers_note}}" name="code_numbers_note" type="text" readonly>
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
                                                        <input  value="{{$staff->operation_done}}" name="operation_done" type="text" readonly>
                                                    </td>
                                                    <td>
                                                        <input value="{{$staff->approval_direct_manager}}" name="approval_direct_manager" type="text" readonly>
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
                                                        <span> حسب الكشف المرفق<input  <?php if($staff->receipt_covenant == 'حسب الكشف المرفق') { echo 'checked';} ?> name="receipt_covenant" value="حسب الكشف المرفق" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                        <span>ليس بعهدته شئ<input  <?php if($staff->receipt_covenant == 'ليس بعهدته شئ') { echo 'checked';} ?> name="receipt_covenant" value="ليس بعهدته شئ" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        اعتماد ادارة الشئون الادارية
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staff->accreditation_Administrative_Affairs}}" name="accreditation_Administrative_Affairs" type="text" readonly>
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
                                                        <span>لا ينطبق <input type="radio"  {{ $staff->bank_signature_status == 'لا ينطبق' ? "checked":"" }} value="لا ينطبق"  name="bank_signature_status" style="display: inline-block; width: auto;" disabled></span>
                                                        <span>تم إالغاء توقيع البنك(في حالة انتهاء الخدمات)<input {{ $staff->bank_signature_status == 'إالغاء توقيع البنك' ? "checked":"" }}  <?php if($staff->bank_signature_status == 'تم إالغاء توقيع البنك') { echo 'checked';} ?> value="تم إالغاء توقيع البنك" name="bank_signature_status" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>ليس لدية عهد مالية <input   <?php if($staff->financial_covenant_status == 'ليس لدية عهد مالية') { echo 'checked';} ?> value="ليس لدية عهد مالية" name="financial_covenant_status" type="radio"  style="display: inline-block; width: auto;"></span>
                                                        <span>تم استلام ما لدية من عهد ماليه وتبلغ (_______جنية)<input   <?php if($staff->financial_covenant_status == 'تم استلام ما لدية من عهد ماليه') { echo 'checked';} ?> value="تم استلام ما لدية من عهد ماليه" name="financial_covenant_status" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        و هي عبارة عن
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staff->financial_covenant_value}}" name="financial_covenant_value" type="text" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>لا يوجد رصيد <input  <?php if($staff->balance_status == 'لا يوجد رصيد') { echo 'checked';} ?> value="لا يوجد رصيد" name="balance_status" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                        <span>   رصيد مدين  بمبلغ(___________جنية)<input  <?php if($staff->balance_status == 'رصيد مدين') { echo 'checked';} ?> value="رصيد مدين" name="balance_status" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        و هو عبارة عن
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staff->balance}}" name="balance" type="text">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        رصيد دائن بمبلغ(_______جنية) و هو عبارة عن
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staff->debit_balance}}" name="debit_balance" type="text">
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
                                                        <input type="text">
                                                    </td>
                                                    <td>
                                                        <input type="text">
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
                                                        <input type="text">
                                                    </td>
                                                    <td>
                                                        <input type="text">
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
{{--                                                        <input type="text">--}}
                                                    </td>
                                                    <td>
{{--                                                        <input type="text">--}}
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
                                                        <span>ليس لدية عهد او ممتلكات الشركة<input  <?php if($staff->finish_donot_have_covenant == 'ليس لدية عهد او ممتلكات الشركة') { echo 'checked';} ?> value="ليس لدية عهد او ممتلكات الشركة" name="finish_donot_have_covenant" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>لا ينطبق<input value="لا ينطبق"  <?php if($staff->finish_donot_have_covenant == 'لا ينطبق') { echo 'checked';} ?> type="radio" name="finish_donot_have_covenant"  style="display: inline-block; width: auto;" disabled></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span> تم استلام ممتلكات الشركة حسب البيان التالي </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><textarea name="company_data" rows="5" readonly><?php  echo $staff->company_data; ?></textarea></td>

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
                                                        <span>تم استلام السيارة لا  ينطبق <input  <?php if($staff->move_department == 'تم استلام السيارة لا  ينطبق') { echo 'checked';} ?> value="تم استلام السيارة لا  ينطبق" name="move_department" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                        <span>اخلاء طرف من المكتب لا ينطبق<input  <?php if($staff->move_department == 'اخلاء طرف من المكتب لا ينطب') { echo 'checked';} ?> value="اخلاء طرف من المكتب لا ينطب" name="move_department" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        قسم شئون الموظفين
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span>تمت مراجعة الاجارات  <input value="تمت مراجعة الاجارات"  <?php if($staff->employee_status == 'تمت مراجعة الاجارات') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                        <span>اغلائ طرف الهاتف <input value="اغلائ طرف الهاتف" <?php  if($staff->employee_status == 'اغلائ طرف الهاتف') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                        <span>لا ينطبق <input value="لا ينطبق" <?php if($staff->employee_status == 'لا ينطبق ') { echo 'checked';} ?> name="employee_status" type="radio"  style="display: inline-block; width: auto;" disabled></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        اعتماد المدير المالي و الاداري
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input value="{{$staff->manager_confirm}}" name="manager_confirm" type="text" readonly>
                                                    </td>
                                                </tr>
                                            </table>
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

