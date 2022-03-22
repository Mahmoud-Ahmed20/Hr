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
  </style>
@endsection
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>تفاصيل عرض العمل </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">لوحه التحكم</li>
                        <li class="breadcrumb-item active">  <a style="text-decoration:none;color:black;" href="{{ url(route('admin/jobOfferSpecification/index')) }}">
                            تفاصيل عرض العمل </a>
                          </li>
                        <li class="breadcrumb-item active">اضافه عرض عمل </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->






    <div dir="rtl">
        @include('flash::message')

        <h2
        style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
      >
        تفاصيل عرض العمل
      </h2>
      <h2
        style="text-align: center; margin: 0; font-size: 28px; font-weight: 700"
      >
        Job Offer Specfication
      </h2>

      <div class="outer__border">
            @include('flash::message')
            <form action="{{ url(route('admin/jobOfferSpecification/store')) }}" method="post">
                @csrf
                <table>
                    <tr>
                      <th>الاسم</th>
                      <th>الجنسية</th>
                      <th>التاريخ</th>
                    </tr>
                    <tr>

                      <td><input type="text" name="name" value="{{ old('name') }}"  >
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                      <td>
                        <select name="nationality_id" id="nationality_id" class="form-control">
                            <option  selected  disabled>----</option>
                          </select>
                          @error('nationality_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </td>
                      <td><input type="date"  name="date" value="{{ old('date') }}"  >
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                    </tr>
                    <tr>
                      <th>رقم بطاقة الرقم القومي</th>
                      <th>مكان الاصدار</th>
                      <th>تاريخ الاصدار</th>
                    </tr>
                    <tr>
                      <td><input type="number" name="national_id" value="{{ old('national_id') }}" >
                        @error('national_id')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                      <td><input type="text" name="issue_id" value="{{ old('issue_id') }}">
                        @error('issue_id')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                      <td><input type="date" name="issue_id_data" value="{{ old('issue_id_data') }}">
                        @error('issue_id_data')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                    </tr>
                    <tr>
                      <th>الوظيفة</th>
                      <th>الدرجة</th>
                      <th>المؤهل العلمي</th>
                    </tr>
                    <tr>
                      <td>
                        <select id="job_id" name="job_id" class="form-control">
                            <option>اختر وظيفه</option>
                        </select>
                          @error('job_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                      </td>
                      <td><input type="text" name="degree_job" value="{{old('degree_job')}}" >
                        @error('degree_job')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                      <td><input type="text" name="qualification" value="{{ old('qualification') }}" >
                        @error('qualification')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                    </tr>
                    <tr>
                      <th>الادارة</th>
                      <th>الفرع</th>
                      <th>الدرجة</th>
                    </tr>
                    <tr>
                      <td>
                        <select name="administration_id" id="administration_id">
                            <option  selected  disabled>-- يرجي تحديد الادارة   ----</option>
                          </select>
                          @error('administration_id')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                      </td>
                      <td><input type="text" name="branch" value="{{ old('branch') }}">
                        @error('branch')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                      <td><input type="text" name="degree" value="{{ old('degree') }}">
                        @error('degree')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </td>
                    </tr>
                    <tr>
                        <th colspan="2">مدة العقد</th>
                        <th>تاريخ مباشرة العمل : فور انتهاء التعيين اوا اجراءات اخري</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="flex__td">
                                <span>سنة ميلادية <input type="radio" name="year_contract" value="سنة ميلادية" style="display: inline-block; width: auto;" {{ old('year_contract') == "سنة ميلادية" ? "checked" : "" }}></span>
                                <span>سنتين ميلاديتين <input type="radio" name="year_contract" value="سنتين ميلاديتين" style="display: inline-block; width: auto;" {{ old('year_contract') == "سنتين ميلاديتين" ? "checked" : "" }}></span>
                                <span>عقد <input type="radio" name="year_contract" value="عقد" style="display: inline-block; width: auto;" {{ old('year_contract') == "" ? "checked" : "عقد" }}></span>
                                @error('year_contract')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>

                        </td>

                    </tr>
                  </table>
                  <table>
                      <tr>
                          <th>الراتب والعلاوات</th>
                          <th>شهريا</th>
                          <th>سنويا</th>
                      </tr>
                      <tr>
                          <td>الراتب الاساسي</td>
                          <td><input type="text" id="basic_salary_monthly"  name="basic_salary_monthly" value="{{ old('basic_salary_monthly') }}" >
                            @error('basic_salary_monthly')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </td>
                          <td><input type="text"  id="basic_salary_Year"  name="basic_salary_Year" value="{{ old('basic_salary_Year') }}" >
                            @error('basic_salary_Year')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </td>
                      </tr>
                      <tr>
                          <td>بدل سكن</td>
                          <td><input type="text" id="housing_allowance_monthly"  name="housing_allowance_monthly" value="{{old('housing_allowance_monthly')}}" ></td>
                          <td><input type="text" id="housing_allowance_Year" name="housing_allowance_Year" value="{{old('housing_allowance_Year')}}" ></td>
                          @error('housing_allowance_monthly')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                        </tr>
                      <tr>
                          <td>بدل مواصلات</td>
                          <td><input type="text" id="switch_connectors_monthly" name="switch_connectors_monthly" value="{{old('switch_connectors_monthly')}}" ></td>
                          <td><input type="text" id="switch_connectors_Year" name="switch_connectors_Year" value="{{old('switch_connectors_Year')}}"></td>
                          @error('switch_connectors_monthly')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                        </tr>
                      <tr>
                          <td>بدلات اخري</td>
                          <td><input type="text" id="other_allowances_monthly" name="other_allowances_monthly" value="{{old('other_allowances_monthly')}}" ></td>
                          <td><input type="text" id="other_allowances_Year" name="other_allowances_Year" value="{{old('other_allowances_Year')}}"></td>
                          @error('other_allowances_monthly')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                        </tr>
                      <tr>
                          <td>الاجمالي</td>
                          <td><input  type="text" id="total_monthly"  readonly></td>
                          <td><input type="text"  id="total_Year" readonly></td>
                        </tr>
                      <caption style="text-align: center;">
                        <h2 style="margin: 0;">مميزات وشروط العمل</h2>
                    </caption>
                  </table>
                  <table>

                    <tr>
                        <td colspan="3" style="display: flex;">
                            <div class="form-check">
                                    الاجازة السنوية فقط (30) يوما مدفوعة الاجر عن كل (سنة) ميلادية خدمة
                                    <span>لا <input type="radio"  name="yearly_vacation" value="0" style="display: inline-block; width: auto;" {{ old('yearly_vacation') == "0" ? "checked" : "" }}></span>
                                    <span> نعم <input type="radio" name="yearly_vacation" value="1" style="display: inline-block; width: auto;" {{ old('yearly_vacation') == "1" ? "checked" : "" }}></span>
                            </div>
                            @error('yearly_vacation')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                            </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            العلاج: يكون العلاج مجانا للموظف (حسب نظام الشركة)
                            <span>لا <input type="radio"  name="treatment" value="0" style="display: inline-block; width: auto;" {{ old('treatment') == "0" ? "checked" : "" }}></span>
                            <span> نعم <input type="radio" name="treatment" value="1" style="display: inline-block; width: auto;" {{ old('treatment') == "1" ? "checked" : "" }}></span>
                            @error('treatment')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            فترة التجربة : (90) يوما حسب نظام العمل والعمال اعتبارا من تاريخ مباشرة العمل
                            <span>لا <input type="radio"  name="Probation" value="0" style="display: inline-block; width: auto;" {{ old('Probation') == "0" ? "checked" : "" }}></span>
                            <span> نعم <input type="radio" name="Probation" value="1" style="display: inline-block; width: auto;" {{ old('Probation') == "1" ? "checked" : "" }}></span>
                            @error('Probation')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">يعتبر هذا العرض لاغيا في حالة عدم مباشرة العمل في التاريخ المحدد ادناه</td>
                    </tr>
                </table>





                  <div class="form-group mt-4" style="display: flex">
                    <button class="btn btn-primary" type="submit">اضافه</button>
                </div>
            </form>


      </div>
    </div>

@endsection
@section('script')
<script>
    var Basic_Salary_Monthly =document.getElementById('basic_salary_monthly');
    var Basic_Salary_Year = document.getElementById('basic_salary_Year');
    var Housing_Allowance_Monthly = document.getElementById('housing_allowance_monthly');
    var Housing_Allowance_Year = document.getElementById('housing_allowance_Year')
    var Switch_Connectors_Monthly= document.getElementById('switch_connectors_monthly');
    var Switch_Connectors_Year = document.getElementById('switch_connectors_Year');
    var Other_Allowances_Monthly= document.getElementById('other_allowances_monthly');
    var Other_Allowances_Year = document.getElementById('other_allowances_Year');
    const inputsMonthAlert = [Housing_Allowance_Monthly, Housing_Allowance_Year, Switch_Connectors_Monthly, Switch_Connectors_Year, Other_Allowances_Monthly, Other_Allowances_Year];
    const inputsSumSalaries = [...inputsMonthAlert, Basic_Salary_Monthly, Basic_Salary_Year];
    inputsMonthAlert.map(el => {
        el.addEventListener('focus', SalariesAndBonuses);
    })
    inputsSumSalaries.map(el => {
        el.addEventListener('keyup', SalariesAndBonuses)
    })
    function SalariesAndBonuses(){
        var Basic_Salary_Monthly_Val =parseFloat(Basic_Salary_Monthly.value);
        var Basic_Salary_Year_Val = parseFloat(Basic_Salary_Year.value);
        var Housing_Allowance_Monthly_Val = parseFloat(housing_allowance_monthly.value);
        var Housing_Allowance_Year_Val = parseFloat(housing_allowance_Year.value)
        var Switch_Connectors_Monthly_Val = parseFloat(switch_connectors_monthly.value);
        var Switch_Connectors_Year_Val = parseFloat(switch_connectors_Year.value);
        var Other_Allowances_Monthly_Val = parseFloat(Other_Allowances_Monthly.value);
        var Other_Allowances_Year_Val = parseFloat(Other_Allowances_Year.value);
        if( (typeof Basic_Salary_Monthly_Val === 'undefined' || !Basic_Salary_Monthly_Val) && (typeof Basic_Salary_Year_Val === 'undefined' || !Basic_Salary_Year_Val)){
            console.log('sk;jgsdfhglksdjfgs');
            alert('يرجي ادخال الراتب الاساسي');
            Basic_Salary_Monthly.focus()
        } else {
            var Monthly = (Basic_Salary_Monthly_Val || 0) + (Housing_Allowance_Monthly_Val || 0) +(Switch_Connectors_Monthly_Val || 0)+(Other_Allowances_Monthly_Val || 0);
    var Year = (Basic_Salary_Year_Val || 0) + (Housing_Allowance_Year_Val || 0) + (Switch_Connectors_Year_Val || 0)+(Other_Allowances_Year_Val || 0);
    sumq = parseFloat(Monthly).toFixed(2);
    sumt = parseFloat(Year).toFixed(2);
    document.getElementById("total_monthly").value = sumq;
    document.getElementById("total_Year").value = sumt;
        }
    }
</script>

<script>
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
<script>
      $("#nationality_id").select2({
        delay: 250,
        ajax: {
            url: "{{ route('admin/jobOfferSpecification/nationality_get')  }}",
            dataType: 'json',
            processResults: function (data) {
                console.log(data)
                var data = data.map((obj) => ({
                    id : obj.id,
                    text: obj.name_nationality,
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
