        <td>{{$evaluate->name}}</td>
        <td>{{$evaluate->qualification}}</td>
        <td>{{optional($evaluate->Job)->name_job}}</td>
        @if (in_array('section_id',$inputs))
        <td>{{optional($evaluate->Section)->name}}</td>
        @endif
        <td>{{$evaluate->interview_date}}</td>
        @if (in_array('interview_status',$inputs))
        <td>{{$evaluate->interview_status}}</td>
        @endif
        @if (in_array('extierior',$inputs))
        <td>{{$evaluate->extierior}}</td>
        @endif
        @if (in_array('personal',$inputs))
        <td>{{$evaluate->personal}}</td>
        @endif
        @if (in_array('team_work',$inputs))
        <td>{{$evaluate->team_work}}</td>
        @endif
        @if (in_array('initiatire',$inputs))
        <td>{{$evaluate->initiatire}}</td>
        @endif
        @if (in_array('english',$inputs))
        <td>{{$evaluate->english}}</td>
        @endif
        @if (in_array('ambition',$inputs))
        <td>{{$evaluate->ambition}}</td>
        @endif
        @if (in_array('make_decision',$inputs))
        <td>{{$evaluate->make_decision}}</td>
        @endif
        @if (in_array('experience',$inputs))
        <td>{{$evaluate->experience}}</td>
        @endif
        @if (in_array('skills',$inputs))
        <td>{{$evaluate->experience}}</td>
        @endif
        @if (in_array('qualification_skills',$inputs))
        <td>{{$evaluate->qualification_skills}}</td>
        @endif
        @if (in_array('notes',$inputs))
        <td>{{$evaluate->notes}}</td>
        @endif

