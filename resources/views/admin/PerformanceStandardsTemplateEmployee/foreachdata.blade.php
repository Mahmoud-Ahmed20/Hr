                        <td>{{ optional($Performance->staff)->name}}</td>
                        <td>{{ $Performance->job_title}}</td>
                        @if (in_array('understand_business_rules',$inputs))
                        <td>{{ $Performance->understand_business_rules}}</td>
                        @endif
                        @if (in_array('understand_notes',$inputs))
                        <td>{{ $Performance->understand_notes }}</td>
                        @endif
                        @if (in_array('get_work_done',$inputs))
                        <td>{{ $Performance->get_work_done}}</td>
                        @endif
                        @if (in_array('get_work_done_notes',$inputs))
                            <td>{{ $Performance->get_work_done_notes }}</td>
                        @endif
                        @if (in_array('responding_to_work_pressure',$inputs))
                        <td>{{ $Performance->responding_to_work_pressure}}</td>
                        @endif
                        @if (in_array('responding_to_work_pressure_notes',$inputs))
                            <td>{{$Performance->responding_to_work_pressure_notes}}</td>
                        @endif
                        @if (in_array('initiative_and_innovation_at_work_notes',$inputs))
                            <td>{{$Performance->initiative_and_innovation_at_work_notes}}</td>
                        @endif
                        @if (in_array('initiative_and_innovation_at_work',$inputs))
                        <td>{{ $Performance->initiative_and_innovation_at_work}}</td>
                        @endif
                        @if (in_array('initiative_and_innovation_at_work_notes',$inputs))
                            <td>{{ $Performance->initiative_and_innovation_at_work_notes }}</td>
                        @endif
                        @if (in_array('accept_directives_from_managers',$inputs))
                        <td>{{ $Performance->accept_directives_from_managers}}</td>
                        @endif
                        @if (in_array('accept_directives_from_managers_notes',$inputs))
                            <td>{{ $Performance->accept_directives_from_managers_notes }}</td>
                        @endif
                        @if (in_array('flexibility_and_adaptability',$inputs))
                        <td>{{ $Performance->flexibility_and_adaptability}}</td>
                        @endif
                        @if (in_array('flexibility_and_adaptability_notes',$inputs))
                            <td>{{ $Performance->flexibility_and_adaptability_notes }}</td>
                        @endif
                        @if (in_array('make_decisions_and_take_responsibility',$inputs))
                        <td>{{ $Performance->make_decisions_and_take_responsibility}}</td>
                        @endif
                        @if (in_array('make_decisions_and_take_responsibility_notes',$inputs))
                        <td>{{ $Performance->make_decisions_and_take_responsibility_notes }}</td>
                        @endif
                        @if (in_array('personal_cleanliness',$inputs))
                        <td>{{ $Performance->personal_cleanliness}}</td>
                        @endif
                        @if (in_array('personal_cleanliness_notes',$inputs))
                            <td>{{$Performance->personal_cleanliness_notes}}</td>
                        @endif
                        @if (in_array('adhere_to_corporate_policies',$inputs))
                        <td>{{ $Performance->adhere_to_corporate_policies}}</td>
                        @endif
                        @if (in_array('teamwork',$inputs))
                        <td>{{ $Performance->teamwork}}</td>
                        @endif
                        @if (in_array('teamwork_notes',$inputs))
                        <td>{{ $Performance->teamwork_notes }}</td>
                        @endif



