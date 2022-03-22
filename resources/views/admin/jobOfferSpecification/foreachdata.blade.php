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
