
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        #emp{
            font-family: 'dejavu sans', sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 50%;
            /* transform: rotate(90deg) */
        }
        #emp td, #emp th{
            border: 1px solid #ddd;
            /* padding: 8px; */
        }
        #emp tr:nth-child(even){
            background-color: #abb4b4;
        }
        #emp th{
            /* padding-top: 12px;
            padding-bottom: 12px; */
            text-align: left;
            background-color: #4CAF50;
            color: #fff;
        }
    </style>
</head>
<body>
    <table id="emp">
        <thead>
            <?php
                $Arabic = new \I18N_Arabic('Glyphs');
                $table_name = $Arabic->utf8Glyphs("الاسم");
                $table_number_id = $Arabic->utf8Glyphs("رقم الموظف");
                $table_job = $Arabic->utf8Glyphs("الوظيفة");
                $table_section = $Arabic->utf8Glyphs("القسم");
                $table_mobile = $Arabic->utf8Glyphs("الجوال");
                $table_nationality = $Arabic->utf8Glyphs("الجنسية");
                $created_at = $Arabic->utf8Glyphs("تاريخ الاضافه");
                $table_date_of_birth = $Arabic->utf8Glyphs("تاريخ الميلاد");
                $table_religion = $Arabic->utf8Glyphs("الديانة");
                $table_matrital_status = $Arabic->utf8Glyphs("الحالة الاجتماعية");
                $table_present_address = $Arabic->utf8Glyphs("العنوان الحالي");
                $table_post = $Arabic->utf8Glyphs("البريد");
                $table_mobile = $Arabic->utf8Glyphs("الجوال");
                $table_home_phone = $Arabic->utf8Glyphs("هاتف المنزل");
                $table_salary_system = $Arabic->utf8Glyphs("نظام المرتب");
                $table_dependents = $Arabic->utf8Glyphs("هل تعول احدا");
                $table_dependents_address = $Arabic->utf8Glyphs("عنوانهم");

                $table_card_id = $Arabic->utf8Glyphs("الرقم القومي");
                $table_place_of_issue = $Arabic->utf8Glyphs("مكان الاصدار");
                $table_date_of_issue = $Arabic->utf8Glyphs("تاريخ الاصدار");

                $table_bisic_salary = $Arabic->utf8Glyphs("الراتب الاساسي لاخر وظيفه");
                $table_allowance = $Arabic->utf8Glyphs("البدلات لاخر وظيفه");
                $table_job_title = $Arabic->utf8Glyphs("مسمي الوظيفة لاخر وظيفه");
                $table_company_name = $Arabic->utf8Glyphs("اسم الشركة");
                $table_from = $Arabic->utf8Glyphs("من");
                $table_to = $Arabic->utf8Glyphs("الي");
                $table_phone = $Arabic->utf8Glyphs("الهاتف");
                $table_address = $Arabic->utf8Glyphs("العنوان");
                $table_description_for_your_duties = $Arabic->utf8Glyphs("تفاصيل عن واجباتك لاخر وظيفه");
                $table_reason_for_leaving = $Arabic->utf8Glyphs("سبب ترك العمل لاخر وظيفه");

                $table_number = $Arabic->utf8Glyphs("الرخصه");
                $table_category = $Arabic->utf8Glyphs("نوع الرخصه");
                $table_place_of_issue_dri = $Arabic->utf8Glyphs("مكان الاصدار");
                $table_date_of_issue_dri = $Arabic->utf8Glyphs("تاريخ الاصدار");
                $table_expiry_date = $Arabic->utf8Glyphs("تاريخ الانتهاء");
                $table_blood_group = $Arabic->utf8Glyphs("فصيله الدم");

                $table_qualification = $Arabic->utf8Glyphs("اخر مؤهل دراسي");
                $table_place_name = $Arabic->utf8Glyphs("اسم المدرسة / الجامعة");
                $table_country = $Arabic->utf8Glyphs("البلد");
                $table_city = $Arabic->utf8Glyphs("المدينة");
                $table_specialize = $Arabic->utf8Glyphs("التخصص");
                $table_from_qualification = $Arabic->utf8Glyphs("من");
                $table_to_qualification = $Arabic->utf8Glyphs("الي");

                $table_previous_salary = $Arabic->utf8Glyphs("اول راتب اساسي");
                $table_previous_current_housing = $Arabic->utf8Glyphs("اول بدل سكن");
                $table_previous_current_transportation = $Arabic->utf8Glyphs("اول بدل مواصلات");

                $table_other_allowances_current = $Arabic->utf8Glyphs("البدلات الاخري");
                $table_current_salary = $Arabic->utf8Glyphs("الراتب الاساسي الحالي");
                $table_current_current_housing = $Arabic->utf8Glyphs("بدل السكن الحالي");
                $table_current_current_transportation = $Arabic->utf8Glyphs("بدل المواصلات الحالي");

                $table_other_allowances = $Arabic->utf8Glyphs("البدلات الاخري");
                $by_month = $Arabic->utf8Glyphs("بالشهر");
                $by_piece = $Arabic->utf8Glyphs("بالقطعه");
                $exists = $Arabic->utf8Glyphs("__لا");
                $not_exists = $Arabic->utf8Glyphs("__نعم");

            ?>

            <tr>
                <td>ID</td>
                <td>{{$created_at}}</td>
                <td>{{$table_name}}</td>
                @if(in_array('id_number', $inputs)) <td>{{$table_number_id}}</td> @endif
                @if(in_array('job_id', $inputs)) <td>{{$table_job}}</td> @endif
                @if(in_array('section_id', $inputs)) <td>{{$table_section}}</td> @endif
                @if(in_array('mobile', $inputs)) <td>{{$table_mobile}}</td> @endif
                @if(in_array('nationality_id', $inputs)) <td>{{$table_nationality}}</td> @endif
                @if(in_array('date_of_birth', $inputs)) <td>{{$table_date_of_birth}}</td> @endif
                @if(in_array('religion', $inputs)) <td>{{$table_religion}}</td> @endif
                @if(in_array('marital_status', $inputs)) <td>{{$table_matrital_status}}</td> @endif
                @if(in_array('present_adderss', $inputs)) <td>{{$table_present_address}}</td> @endif
                @if(in_array('post', $inputs)) <td>{{$table_post}}</td> @endif
                @if(in_array('home_phone', $inputs)) <td>{{$table_home_phone}}</td> @endif
                @if(in_array('salary_system', $inputs)) <td>{{$table_salary_system}}</td> @endif
                @if(in_array('have_you_any_dependents', $inputs)) <td>{{$table_dependents}}</td> @endif
                @if(in_array('dependents_address', $inputs)) <td>{{$table_dependents_address}}</td> @endif

                @if(in_array('card_id', $inputs)) <td>{{$table_card_id}}</td> @endif
                @if(in_array('place_of_issue', $inputs)) <td>{{$table_place_of_issue}}</td> @endif
                @if(in_array('date_of_issue', $inputs)) <td>{{$table_date_of_issue}}</td> @endif

                @if(in_array('number', $inputs)) <td>{{$table_number}}</td> @endif
                @if(in_array('category', $inputs)) <td>{{$table_category}}</td> @endif
                @if(in_array('place_of_issue_driving', $inputs)) <td>{{$table_place_of_issue_dri}}</td> @endif
                @if(in_array('date_of_issue_driving', $inputs)) <td>{{$table_date_of_issue_dri}}</td> @endif
                @if(in_array('expiry_date', $inputs)) <td>{{$table_expiry_date}}</td> @endif
                @if(in_array('blood_group', $inputs)) <td>{{$table_blood_group}}</td> @endif

                @if(in_array('bisic_salary', $inputs)) <td>{{$table_bisic_salary}}</td> @endif
                @if(in_array('allowance', $inputs)) <td>{{$table_allowance}}</td> @endif
                @if(in_array('job_title', $inputs)) <td>{{$table_job_title}}</td> @endif
                @if(in_array('company_name', $inputs)) <td>{{$table_company_name}}</td> @endif
                @if(in_array('from', $inputs)) <td>{{$table_from}}</td> @endif
                @if(in_array('to', $inputs)) <td>{{$table_to}}</td> @endif
                @if(in_array('phone', $inputs)) <td>{{$table_phone}}</td> @endif
                @if(in_array('address', $inputs)) <td>{{$table_address}}</td> @endif
                @if(in_array('description_for_your_duties', $inputs)) <td>{{$table_description_for_your_duties}}</td> @endif
                @if(in_array('reason_for_leaving', $inputs)) <td>{{$table_reason_for_leaving}}</td> @endif

                @if(in_array('qualification', $inputs)) <td>{{$table_qualification}}</td> @endif
                @if(in_array('place_name', $inputs)) <td>{{$table_place_name}}</td> @endif
                @if(in_array('country', $inputs)) <td>{{$table_country}}</td> @endif
                @if(in_array('city', $inputs)) <td>{{$table_city}}</td> @endif
                @if(in_array('specialize', $inputs)) <td>{{$table_specialize}}</td> @endif
                @if(in_array('from_qualification', $inputs)) <td>{{$table_from_qualification}}</td> @endif
                @if(in_array('to_qualification', $inputs)) <td>{{$table_to_qualification}}</td> @endif

                @if(in_array('salary_0', $inputs)) <td>{{$table_previous_salary}}</td> @endif
                @if(in_array('current_housing_0', $inputs)) <td>{{$table_previous_current_housing}}</td> @endif
                @if(in_array('current_transportation_0', $inputs)) <td>{{$table_previous_current_transportation}}</td> @endif
                @if(in_array('other_allowances_0', $inputs)) <td>{{$table_other_allowances}}</td> @endif

                @if(in_array('salary_1', $inputs)) <td>{{$table_current_salary}}</td> @endif
                @if(in_array('current_housing_1', $inputs)) <td>{{$table_current_current_housing}}</td> @endif
                @if(in_array('current_transportation_1', $inputs)) <td>{{$table_current_current_transportation}}</td> @endif
                @if(in_array('other_allowances_1', $inputs)) <td>{{$table_other_allowances_current}}</td> @endif

            </tr>
        </thead>

        <tbody>
            @foreach ($staffs as $staff)
                <?php
                    $name_staff = $Arabic->utf8Glyphs($staff->name);
                    $religion_staff = $Arabic->utf8Glyphs($staff->religion);
                    $marital_status_staff = $Arabic->utf8Glyphs($staff->marital_status);
                    $present_adderss_staff = $Arabic->utf8Glyphs($staff->present_adderss);
                    $dependents_address_staff = $Arabic->utf8Glyphs($staff->dependents_address);
                    $job = $Arabic->utf8Glyphs(optional($staff->job)->name_job);
                    $section = $Arabic->utf8Glyphs(optional($staff->NameSections)->name);
                    $nationality = $Arabic->utf8Glyphs(optional($staff->nationality)->name_nationality);
                    $place_of_issue = $Arabic->utf8Glyphs(optional($staff->cardId)->place_of_issue);
                    $category = $Arabic->utf8Glyphs(optional($staff->drivingLicence)->category);
                    $place_of_issue_deriving = $Arabic->utf8Glyphs(optional($staff->drivingLicence)->place_of_issue);
                    $job_title_last = $Arabic->utf8Glyphs(optional($staff->lastJob)->job_title);
                    $company_name_last = $Arabic->utf8Glyphs(optional($staff->lastJob)->company_name);
                    $address_last = $Arabic->utf8Glyphs(optional($staff->lastJob)->address);
                    $description_for_your_duties_last = $Arabic->utf8Glyphs(optional($staff->lastJob)->description_for_your_duties);
                    $reason_for_leaving_last = $Arabic->utf8Glyphs(optional($staff->lastJob)->reason_for_leaving);
                    $qualification = $Arabic->utf8Glyphs(optional($staff->qualification)->qualification);
                    $place_name = $Arabic->utf8Glyphs(optional($staff->qualification)->place_name);
                    $country = $Arabic->utf8Glyphs(optional($staff->qualification)->country);
                    $city = $Arabic->utf8Glyphs(optional($staff->qualification)->city);
                    $specialize = $Arabic->utf8Glyphs(optional($staff->qualification)->specialize);
                ?>
                <tr>
                    <td>{{$staff->id}}</td>
                    <td>{{$staff->created_at}}</td>
                    <td>{{$name_staff}}</td>
                    @if(in_array('id_number', $inputs)) <td>{{$staff->id_number}}</td> @endif
                    @if(in_array('job_id', $inputs)) <td>{{$job}}</td> @endif
                    @if(in_array('section_id', $inputs)) <td>{{$section}}</td> @endif
                    @if(in_array('mobile', $inputs)) <td>{{$staff->mobile}}</td> @endif
                    @if(in_array('nationality_id', $inputs)) <td>{{$nationality}}</td> @endif
                    @if(in_array('date_of_birth', $inputs)) <td>{{$staff->date_of_birth}}</td> @endif
                    @if(in_array('religion', $inputs)) <td>{{$religion_staff}}</td> @endif
                    @if(in_array('marital_status', $inputs)) <td>{{$marital_status_staff}}</td> @endif
                    @if(in_array('present_adderss', $inputs)) <td>{{$present_adderss_staff}}</td> @endif
                    @if(in_array('post', $inputs)) <td>{{$staff->post}}</td> @endif
                    @if(in_array('home_phone', $inputs)) <td>{{$staff->home_phone}}</td> @endif
                    @if(in_array('salary_system', $inputs))
                        <td>
                            @if ($staff->salary_system == 1)
                                {{ $by_month }}
                            @elseif ($staff->salary_system == 2)
                                {{ $by_piece }}
                            @endif
                        </td>
                    @endif
                    @if(in_array('have_you_any_dependents', $inputs))
                        <td>
                            @if ($staff->have_you_any_dependents == 1)
                                {{ $exists }}
                            @elseif ($staff->have_you_any_dependents == 0)
                                {{ $not_exists }}
                            @endif
                        </td>
                    @endif
                    @if(in_array('dependents_address', $inputs)) <td>{{$staff->dependents_address}}</td> @endif

                    @if(in_array('card_id', $inputs)) <td>{{optional($staff->cardId)->card_id}}</td> @endif
                    @if(in_array('place_of_issue', $inputs)) <td>{{$place_of_issue}}</td> @endif
                    @if(in_array('date_of_issue', $inputs)) <td>{{optional($staff->cardId)->date_of_issue}}</td> @endif

                    @if(in_array('number', $inputs)) <td>{{optional($staff->drivingLicence)->number}}</td> @endif
                    @if(in_array('category', $inputs)) <td>{{$category}}</td> @endif
                    @if(in_array('place_of_issue_driving', $inputs)) <td>{{$place_of_issue_deriving}}</td> @endif
                    @if(in_array('date_of_issue_driving', $inputs)) <td>{{optional($staff->drivingLicence)->date_of_issue}}</td> @endif
                    @if(in_array('expiry_date', $inputs)) <td>{{optional($staff->drivingLicence)->expiry_date}}</td> @endif
                    @if(in_array('blood_group', $inputs)) <td>{{optional($staff->drivingLicence)->blood_group}}</td> @endif

                    @if(in_array('bisic_salary', $inputs)) <td>{{optional($staff->lastJob)->bisic_salary}}</td> @endif
                    @if(in_array('allowance', $inputs)) <td>{{optional($staff->lastJob)->allowance}}</td> @endif
                    @if(in_array('job_title', $inputs)) <td>{{$job_title_last}}</td> @endif
                    @if(in_array('company_name', $inputs)) <td>{{$company_name_last}}</td> @endif
                    @if(in_array('from', $inputs)) <td>{{optional($staff->lastJob)->from}}</td> @endif
                    @if(in_array('to', $inputs)) <td>{{optional($staff->lastJob)->to}}</td> @endif
                    @if(in_array('phone', $inputs)) <td>{{optional($staff->lastJob)->phone}}</td> @endif
                    @if(in_array('address', $inputs)) <td>{{$address_last}}</td> @endif
                    @if(in_array('description_for_your_duties', $inputs)) <td>{{$description_for_your_duties_last}}</td> @endif
                    @if(in_array('reason_for_leaving', $inputs)) <td>{{$reason_for_leaving_last}}</td> @endif

                    @if(in_array('qualification', $inputs)) <td>{{$qualification}}</td> @endif
                    @if(in_array('place_name', $inputs)) <td>{{$place_name}}</td> @endif
                    @if(in_array('country', $inputs)) <td>{{$country}}</td> @endif
                    @if(in_array('city', $inputs)) <td>{{$city}}</td> @endif
                    @if(in_array('specialize', $inputs)) <td>{{$specialize}}</td> @endif
                    @if(in_array('from_qualification', $inputs)) <td>{{optional($staff->qualification)->from}}</td> @endif
                    @if(in_array('to_qualification', $inputs)) <td>{{optional($staff->qualification)->to}}</td> @endif

                    <?php $previousSalary = $staff->salaries->where('type', 0)->first() ?>
                    @if(in_array('salary_0', $inputs)) <td>{{optional($previousSalary)->salary}}</td> @endif
                    @if(in_array('current_housing_0', $inputs)) <td>{{optional($previousSalary)->current_housing}}</td> @endif
                    @if(in_array('current_transportation_0', $inputs)) <td>{{optional($previousSalary)->current_transportation}}</td> @endif
                    @if(in_array('allowances_0', $inputs)) <td>{{optional($previousSalary)->allowances}}</td> @endif

                    <?php $currentSalary = $staff->salaries->where('type', 1)->first() ?>
                    @if(in_array('salary_1', $inputs)) <td>{{optional($currentSalary)->salary}}</td> @endif
                    @if(in_array('current_housing_1', $inputs)) <td>{{optional($currentSalary)->current_housing}}</td> @endif
                    @if(in_array('current_transportation_1', $inputs)) <td>{{optional($currentSalary)->current_transportation}}</td> @endif
                    @if(in_array('allowances_1', $inputs)) <td>{{optional($currentSalary)->allowances}}</td> @endif

                </tr>

            @endforeach
        </tbody>
    </table>
</body>
</html>
