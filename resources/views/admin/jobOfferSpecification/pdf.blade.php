
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
                $number = $Arabic->utf8Glyphs("الكود");
                $name = $Arabic->utf8Glyphs("الاسم");
                $nationality = $Arabic->utf8Glyphs("الجنسيه");
                $date = $Arabic->utf8Glyphs("التاريخ");
                $national_id = $Arabic->utf8Glyphs("الرقم القومي");
                $issue_id = $Arabic->utf8Glyphs("مكان الاصدار");
                $issue_id_data = $Arabic->utf8Glyphs("تاريخ الاصدار");
                $job = $Arabic->utf8Glyphs("الوظيفة");
                $degree_job = $Arabic->utf8Glyphs("الدرجه الوظيفية");
                $qualification = $Arabic->utf8Glyphs("المؤهل العلمي");
                $administration_ar = $Arabic->utf8Glyphs("الادارة");
                $branch_ar = $Arabic->utf8Glyphs("الفرع");
                $degree_ar = $Arabic->utf8Glyphs("الدرجه");
                $year_contract_ar = $Arabic->utf8Glyphs("مده العقد");
                $basic_salary_monthly_ar = $Arabic->utf8Glyphs("الراتب الاساسي شهريا");
                $basic_salary_Year_ar = $Arabic->utf8Glyphs("الراتب الاساسي سنويا");
                $housing_allowance_monthly_ar = $Arabic->utf8Glyphs("بدل سكن شهريا");
                $housing_allowance_Year_ar = $Arabic->utf8Glyphs("بدل سكن سنويا");
                $switch_connectors_monthly_ar = $Arabic->utf8Glyphs("بدل موصلات شهريا");
                $switch_connectors_Year_ar = $Arabic->utf8Glyphs("بدل موصلات سنويا");
                $other_allowances_monthly_ar = $Arabic->utf8Glyphs("بدلات اخري شهريا");
                $other_allowances_Year_ar = $Arabic->utf8Glyphs("بدلات اخري سنويا ");
                $yearly_vacation_ar = $Arabic->utf8Glyphs("الاجازات السنوي");
                $treatment_ar = $Arabic->utf8Glyphs("العلاج");
                $Probation_ar = $Arabic->utf8Glyphs("فتره التجربه");
                $no = $Arabic->utf8Glyphs("غير مفعل");
                $yes = $Arabic->utf8Glyphs("مفعل");
                $not_housing = $Arabic->utf8Glyphs("ليس لدية بدل سكن");
                $not_switch = $Arabic->utf8Glyphs("ليس لدية بدل موصلات");
                $not_other_allowances= $Arabic->utf8Glyphs("ليس لدية بدلات اخري ");

            ?>
            <tr>
                <td>{{$number}}</td>
                <td>{{$name}}</td>
                 @if(in_array('nationality_id',$inputs))<td>{{$nationality}}</td>@endif
                <td>{{$date}}</td>
                 @if (in_array('national_id',$inputs))<td>{{$national_id}}</td> @endif
                 @if (in_array('issue_id',$inputs))<td>{{$issue_id}}</td>@endif
               @if (in_array('issue_id_data',$inputs)) <td>{{$issue_id_data}}</td> @endif
               @if (in_array('job_id',$inputs)) <td>{{$job}}</td> @endif
               @if (in_array('degree_job',$inputs)) <td>{{$degree_job}}</td> @endif
               @if (in_array('qualification',$inputs)) <td>{{$qualification}}</td> @endif
               @if (in_array('administration_id',$inputs)) <td>{{$administration_ar}}</td> @endif
               @if (in_array('branch',$inputs)) <td>{{$branch_ar}}</td> @endif
               @if (in_array('degree',$inputs)) <td>{{$degree_ar}}</td> @endif
               @if (in_array('basic_salary_monthly',$inputs)) <td>{{$basic_salary_monthly_ar}}</td> @endif
               @if (in_array('basic_salary_Year',$inputs)) <td>{{$basic_salary_Year_ar}}</td> @endif
               @if (in_array('housing_allowance_monthly',$inputs)) <td>{{$housing_allowance_monthly_ar}}</td> @endif
               @if (in_array('housing_allowance_Year',$inputs)) <td>{{$housing_allowance_Year_ar}}</td> @endif
               @if (in_array('switch_connectors_Year',$inputs)) <td>{{$switch_connectors_Year_ar}}</td> @endif
               @if (in_array('switch_connectors_monthly',$inputs)) <td>{{$switch_connectors_monthly_ar}}</td> @endif
               @if (in_array('other_allowances_monthly',$inputs)) <td>{{$other_allowances_monthly_ar}}</td> @endif
               @if (in_array('other_allowances_Year',$inputs)) <td>{{$other_allowances_Year_ar}}</td> @endif
               @if (in_array('yearly_vacation',$inputs)) <td>{{$yearly_vacation_ar}}</td> @endif
               @if (in_array('treatment',$inputs)) <td>{{$treatment_ar}}</td> @endif
               @if (in_array('Probation',$inputs)) <td>{{$Probation_ar}}</td> @endif
               @if (in_array('year_contract',$inputs))<td>{{$year_contract_ar}}</td>@endif
            </tr>
        </thead>
        <tbody>
            @foreach($jobOffers as $jobOffer)
                <?php
                    $name_Employess = $Arabic->utf8Glyphs($jobOffer->name);
                    $nationality=$Arabic->utf8Glyphs(optional($jobOffer->nationality)->name_nationality);
                    $issue_id_Employess = $Arabic->utf8Glyphs($jobOffer->issue_id);
                    $job_Employess=$Arabic->utf8Glyphs(optional($jobOffer->jobOfferSpecifincation)->name_job);
                    $degree_job_Employess = $Arabic->utf8Glyphs($jobOffer->degree_job);
                    $qualification_Employess = $Arabic->utf8Glyphs($jobOffer->qualification);
                    $administration=$Arabic->utf8Glyphs(optional($jobOffer->administration)->name_administration);
                    $branch = $Arabic->utf8Glyphs($jobOffer->branch);
                    $degree = $Arabic->utf8Glyphs($jobOffer->degree);
                    $year_contract = $Arabic->utf8Glyphs($jobOffer->year_contract);


               ?>
                <tr>
                    <td>{{ $jobOffer->id }}</td>
                    <td>{{$name_Employess}}</td>
                    @if (in_array('nationality_id',$inputs))<td>{{$nationality}}</td>@endif
                    <td>{{$jobOffer->date}}</td>
                    @if (in_array('national_id',$inputs))<td>{{$jobOffer->national_id}}</td> @endif
                    @if (in_array('issue_id',$inputs))<td>{{$issue_id_Employess}}</td>@endif
                    @if (in_array('issue_id_data',$inputs))<td>{{$jobOffer->issue_id_data}}</td> @endif
                    @if (in_array('job_id',$inputs))<td>{{$job_Employess}}</td> @endif
                    @if (in_array('degree_job',$inputs))<td>{{$degree_job_Employess}}</td> @endif
                    @if (in_array('qualification',$inputs))<td>{{$qualification_Employess}}</td> @endif
                    @if (in_array('administration_id',$inputs))<td>{{$administration}}</td> @endif
                    @if (in_array('branch',$inputs))<td>{{$branch}}</td> @endif
                    @if (in_array('degree',$inputs))<td>{{$degree}}</td> @endif
                    @if (in_array('basic_salary_monthly',$inputs))<td>{{optional($jobOffer->jobOfferSalary)->basic_salary_monthly}} </td> @endif
                    @if (in_array('basic_salary_Year',$inputs))<td>{{optional($jobOffer->jobOfferSalary)->basic_salary_Year}} </td> @endif

                    @if (in_array('housing_allowance_monthly',$inputs))
                    <td>
                        @if (optional($jobOffer->jobOfferSalary)->housing_allowance_monthly== null)
                            {{$not_housing}}
                        @else

                        @endif
                        {{optional($jobOffer->jobOfferSalary)->housing_allowance_monthly}}
                    </td>
                    @endif
                    @if (in_array('housing_allowance_Year',$inputs))
                    <td>
                        @if (optional($jobOffer->jobOfferSalary)->housing_allowance_Year== null)
                            {{$not_housing}}
                        @else

                        @endif
                        {{optional($jobOffer->jobOfferSalary)->housing_allowance_Year}}
                    </td>
                    @endif

                    @if (in_array('switch_connectors_Year',$inputs))
                    <td>
                        @if (optional($jobOffer->jobOfferSalary)->switch_connectors_Year== null)
                            {{$not_switch}}
                        @else

                        @endif
                        {{optional($jobOffer->jobOfferSalary)->switch_connectors_Year}}
                    </td>
                    @endif
                    @if (in_array('switch_connectors_monthly',$inputs))
                    <td>
                        @if (optional($jobOffer->jobOfferSalary)->switch_connectors_monthly== null)
                            {{$not_switch}}
                        @else

                        @endif
                        {{optional($jobOffer->jobOfferSalary)->switch_connectors_monthly}}
                    </td>
                    @endif
                    @if (in_array('other_allowances_monthly',$inputs))
                    <td>
                        @if (optional($jobOffer->jobOfferSalary)->other_allowances_monthly== null)
                            {{$not_other_allowances}}
                        @else

                        @endif
                        {{optional($jobOffer->jobOfferSalary)->other_allowances_monthly}}
                    </td>
                    @endif
                    @if (in_array('other_allowances_Year',$inputs))
                    <td>
                        @if (optional($jobOffer->jobOfferSalary)->other_allowances_Year== null)
                            {{$not_other_allowances}}
                        @else

                        @endif
                        {{optional($jobOffer->jobOfferSalary)->other_allowances_Year}}
                    </td>
                    @endif

                    @if (in_array('yearly_vacation',$inputs))
                        <td>
                        @if ($jobOffer->yearly_vacation==1)
                            {{$yes}}
                        @else
                            {{$no}}
                        @endif
                       </td>
                    @endif

                       @if (in_array('treatment',$inputs))
                     <td>
                        @if ($jobOffer->treatment==1)
                                {{$yes}}
                         @else
                                {{$no}}
                        @endif
                        </td>
                       @endif
                        @if (in_array('Probation',$inputs))
                     <td>
                            @if ($jobOffer->Probation==1)
                                 {{$yes}}
                             @else
                                 {{$no}}
                            @endif
                     </td>
                        @endif


                @if (in_array('year_contract',$inputs))<td>{{$year_contract}}</td>@endif

                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
