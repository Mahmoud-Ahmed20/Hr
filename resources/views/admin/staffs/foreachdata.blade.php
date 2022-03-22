<td>{{$staff->id}}</td>
<td>{{$staff->created_at}}</td>
<td>{{$staff->name}}</td>
@if(in_array('id_number', $inputs)) <td>{{$staff->id_number}}</td> @endif
@if(in_array('job_id', $inputs)) <td>{{optional($staff->job)->name_job}}</td> @endif
@if(in_array('section_id', $inputs)) <td>{{optional($staff->NameSections)->name}}</td> @endif
@if(in_array('nationality_id', $inputs)) <td>{{optional($staff->nationality)->name_nationality}}</td> @endif
@if(in_array('date_of_birth', $inputs)) <td>{{$staff->date_of_birth}}</td> @endif
@if(in_array('religion', $inputs)) <td>{{$staff->religion}}</td> @endif
@if(in_array('marital_status', $inputs)) <td>{{$staff->marital_status}}</td> @endif
@if(in_array('present_adderss', $inputs)) <td>{{$staff->present_adderss}}</td> @endif
@if(in_array('post', $inputs)) <td>{{$staff->post}}</td> @endif
@if(in_array('mobile', $inputs)) <td>{{$staff->mobile}}</td> @endif
@if(in_array('home_phone', $inputs)) <td>{{$staff->home_phone}}</td> @endif
@if(in_array('salary_system', $inputs))
    <td>
        @if ($staff->salary_system == 1)
            {{'بالشهر'}}
        @elseif ($staff->salary_system == 2)
            {{'بالقطعه'}}
        @endif
    </td>
@endif
@if(in_array('have_you_any_dependents', $inputs))
    <td>
        @if ($staff->have_you_any_dependents == 1)
            {{'نعم'}}
        @else
            {{'لا'}}
        @endif
    </td>
@endif
@if(in_array('dependents_address', $inputs)) <td>{{$staff->dependents_address}}</td> @endif

@if(in_array('card_id', $inputs)) <td>{{optional($staff->cardId)->card_id}}</td> @endif
@if(in_array('place_of_issue', $inputs)) <td>{{optional($staff->cardId)->place_of_issue}}</td> @endif
@if(in_array('date_of_issue', $inputs)) <td>{{optional($staff->cardId)->date_of_issue}}</td> @endif

@if(in_array('bisic_salary', $inputs)) <td>{{optional($staff->lastJob)->bisic_salary}}</td> @endif
@if(in_array('allowance', $inputs)) <td>{{optional($staff->lastJob)->allowance}}</td> @endif
@if(in_array('job_title', $inputs)) <td>{{optional($staff->lastJob)->job_title}}</td> @endif
@if(in_array('company_name', $inputs)) <td>{{optional($staff->lastJob)->company_name}}</td> @endif
@if(in_array('from', $inputs)) <td>{{optional($staff->lastJob)->from}}</td> @endif
@if(in_array('to', $inputs)) <td>{{optional($staff->lastJob)->to}}</td> @endif
@if(in_array('phone', $inputs)) <td>{{optional($staff->lastJob)->phone}}</td> @endif
@if(in_array('address', $inputs)) <td>{{optional($staff->lastJob)->address}}</td> @endif
@if(in_array('description_for_your_duties', $inputs)) <td>{{optional($staff->lastJob)->description_for_your_duties}}</td> @endif
@if(in_array('reason_for_leaving', $inputs)) <td>{{optional($staff->lastJob)->reason_for_leaving}}</td> @endif

@if(in_array('category', $inputs)) <td>{{optional($staff->drivingLicence)->category}}</td> @endif
@if(in_array('number', $inputs)) <td>{{optional($staff->drivingLicence)->number}}</td> @endif
@if(in_array('date_of_issue_driving', $inputs)) <td>{{optional($staff->drivingLicence)->date_of_issue}}</td> @endif
@if(in_array('expiry_date', $inputs)) <td>{{optional($staff->drivingLicence)->expiry_date}}</td> @endif
@if(in_array('place_of_issue_driving', $inputs)) <td>{{optional($staff->drivingLicence)->place_of_issue}}</td> @endif
@if(in_array('blood_group', $inputs)) <td>{{optional($staff->drivingLicence)->blood_group}}</td> @endif

@if(in_array('qualification', $inputs)) <td>{{optional($staff->qualification)->qualification}}</td> @endif
@if(in_array('place_name', $inputs)) <td>{{optional($staff->qualification)->place_name}}</td> @endif
@if(in_array('country', $inputs)) <td>{{optional($staff->qualification)->country}}</td> @endif
@if(in_array('city', $inputs)) <td>{{optional($staff->qualification)->city}}</td> @endif
@if(in_array('specialize', $inputs)) <td>{{optional($staff->qualification)->from}}</td> @endif
@if(in_array('specialize', $inputs)) <td>{{optional($staff->qualification)->to}}</td> @endif
@if(in_array('from_qualification', $inputs)) <td>{{optional($staff->qualification)->specialize}}</td> @endif

<?php $previousSalary = $staff->salaries->where('type', 0)->first() ?>
@if(in_array('salary_0', $inputs)) <td>{{ optional($previousSalary)->salary }}</td> @endif
@if(in_array('current_housing_0', $inputs)) <td>{{ optional($previousSalary)->current_housing }}</td> @endif
@if(in_array('current_transportation_0', $inputs)) <td>{{ optional($previousSalary)->current_transportation }}</td> @endif
@if(in_array('other_allowances_0', $inputs)) <td>{{ optional($previousSalary)->other_allowances }}</td> @endif

<?php $currentSalary = $staff->salaries->where('type', 1)->first() ?>
@if(in_array('salary_1', $inputs)) <td>{{ optional($currentSalary)->salary }}</td> @endif
@if(in_array('current_housing_1', $inputs)) <td>{{ optional($currentSalary)->current_housing }}</td> @endif
@if(in_array('current_transportation_1', $inputs)) <td>{{ optional($currentSalary)->current_transportation }}</td> @endif
@if(in_array('other_allowances_1', $inputs)) <td>{{ optional($currentSalary)->other_allowances }}</td> @endif
