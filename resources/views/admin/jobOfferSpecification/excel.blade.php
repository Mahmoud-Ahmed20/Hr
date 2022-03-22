<table>
    <thead>
        <tr>
            <th>الاسم</th>
            @if (in_array('nationality_id',$inputs))<th>الجنسية</th> @endif
            @if (in_array('branch',$inputs))<th>فرع</th> @endif
            @if (in_array('qualification',$inputs)) <th>المؤهل العلمي</th> @endif
            <th>الوظيفة</th>
            @if (in_array('national_id',$inputs)) <th>الرقم القومي</th> @endif
            @if (in_array('issue_id',$inputs)) <th>مكان الاصدار</th> @endif
            @if (in_array('issue_id_data',$inputs)) <th>تاريخ الاصدار</th> @endif
            @if (in_array('degree_job',$inputs)) <th>الدرجة الوظيفية</th> @endif
            @if (in_array('administration_id',$inputs)) <th>الادارة</th> @endif
            @if (in_array('degree',$inputs)) <th>الدرجه</th> @endif
            @if (in_array('basic_salary_monthly',$inputs)) <th>الراتب الاساسي شهريا</th> @endif
            @if (in_array('basic_salary_Year',$inputs)) <th>الراتب الاساسي سنويا </th> @endif
            @if (in_array('housing_allowance_monthly',$inputs)) <th>بدل سكن شهريا</th> @endif
            @if (in_array('housing_allowance_Year',$inputs)) <th>بدل سكن سنويا</th> @endif
            @if (in_array('switch_connectors_monthly',$inputs)) <th>بدل موصلات شهريا</th> @endif
            @if (in_array('switch_connectors_Year',$inputs)) <th>بدل موصلات سنويا</th> @endif
            @if (in_array('other_allowances_monthly',$inputs)) <th>بدلات اخري شهريا</th> @endif
            @if (in_array('other_allowances_Year',$inputs)) <th>بدلات اخري سنويا</th> @endif
            @if (in_array('yearly_vacation',$inputs)) <th>الاجازة السنوية</th> @endif
            @if (in_array('treatment',$inputs)) <th>العلاج</th> @endif
            @if (in_array('Probation',$inputs)) <th>فترة التجربة</th> @endif
            @if (in_array('year_contract',$inputs))<th>مدة العقد</th>@endif
            <th>التاريخ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobOffers as $jobOffer)
        <tr>
            <td>{{$jobOffer->name}}</td>
            @if (in_array('nationality_id',$inputs))<td>{{optional($jobOffer->nationality)->name_nationality}}</td> @endif
            @if (in_array('branch',$inputs)) <td>{{$jobOffer->branch}}</td> @endif
            @if (in_array('qualification',$inputs)) <td>{{$jobOffer->qualification}}</td> @endif
            <td>{{optional($jobOffer->jobOfferSpecifincation)->name_job}}</td>
            @if (in_array('national_id',$inputs)) <td>{{$jobOffer->national_id}}</td> @endif
            @if (in_array('issue_id',$inputs)) <td>{{$jobOffer->issue_id}}</td> @endif
            @if (in_array('issue_id_data',$inputs)) <td>{{$jobOffer->issue_id_data}}</td> @endif
            @if (in_array('degree_job',$inputs)) <td>{{$jobOffer->degree_job}}</td> @endif
            @if (in_array('administration_id',$inputs)) <td>{{optional($jobOffer->administration)->name_administration}}</td> @endif
            @if (in_array('degree',$inputs)) <td>{{$jobOffer->degree}}</td> @endif
            @if (in_array('basic_salary_monthly',$inputs)) <td>{{optional($jobOffer->jobOfferSalary)->basic_salary_monthly}}</td> @endif
            @if (in_array('basic_salary_Year',$inputs)) <td>{{optional($jobOffer->jobOfferSalary)->basic_salary_Year}}</td> @endif
            @if (in_array('housing_allowance_monthly',$inputs))
        <td>
            @if (optional($jobOffer->jobOfferSalary)->housing_allowance_monthly == null)
                ليس لدية بدل سكن
                @else
                {{optional($jobOffer->jobOfferSalary)->housing_allowance_monthly}}
            @endif
        </td>
        @endif
        @if (in_array('housing_allowance_Year',$inputs))
        <td>
            @if (optional($jobOffer->jobOfferSalary)->housing_allowance_Year == null)
            ليس لدية بدل سكن
        @else
        {{optional($jobOffer->jobOfferSalary)->housing_allowance_Year}}
            @endif
        </td>
        @endif
        @if (in_array('switch_connectors_monthly',$inputs))
        <td>
        @if (optional($jobOffer->jobOfferSalary)->switch_connectors_monthly==null)
            ليس لدية بدل موصلات
        @else
        {{optional($jobOffer->jobOfferSalary)->switch_connectors_monthly}}
        @endif
        </td>
        @endif
        @if (in_array('switch_connectors_Year',$inputs))
        <td>
        @if (optional($jobOffer->jobOfferSalary)->switch_connectors_Year==null)
            ليس لدية بدل موصلات
        @else
        {{optional($jobOffer->jobOfferSalary)->switch_connectors_Year}}
        @endif
        </td>
        @endif
        @if (in_array('other_allowances_monthly',$inputs))
        <td>
            @if (optional($jobOffer->jobOfferSalary)->other_allowances_monthly==null)
            ليس لدية بدلات اخري
            @else
            {{optional($jobOffer->jobOfferSalary)->other_allowances_monthly}}
            @endif
        </td>
        @endif
        @if (in_array('other_allowances_Year',$inputs))
        <td>
            @if (optional($jobOffer->jobOfferSalary)->other_allowances_Year==null)
            ليس لدية بدلات اخري
            @else
            {{optional($jobOffer->jobOfferSalary)->other_allowances_Year}}
            @endif
        </td>
        @endif
        @if (in_array('yearly_vacation',$inputs))
        <td>
            @if ($jobOffer->yearly_vacation==1)
                نعم
            @else
                لا
            @endif
        </td>
        @endif
        @if (in_array('treatment',$inputs))
        <td>
            @if ($jobOffer->treatment==1)
                نعم
            @else
                لا
            @endif
        </td>
        @endif
        @if (in_array('Probation',$inputs))
        <td>
            @if ($jobOffer->Probation==1)
                لدية فترة تجربة
            @else
                ليس لدية فترة تجربة
            @endif
        </td>
        @endif
        @if (in_array('year_contract',$inputs))<td>{{$jobOffer->year_contract}}</td>@endif
    
        <td>{{$jobOffer->date}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
