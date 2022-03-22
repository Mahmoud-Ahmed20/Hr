                <td>{{optional($UnderTheScabie->staff)->name}}</td>
                <td>{{optional($UnderTheScabie->job)->name_job}}</td>
                <td>{{optional($UnderTheScabie->administration)->name_administration}}</td>
                <td>{{optional($UnderTheScabie->section)->name}}</td>
                <td>{{$UnderTheScabie->date_of_being_hired}}</td>
                <td>{{$UnderTheScabie->direct_admin_name}}</td>
                @if (in_array('performance_appraisal_date',$inputs))
                <td>{{ $UnderTheScabie->performance_appraisal_date }}</td>
                @endif
                @if (in_array('maintain_working_hours',$inputs))
                <td>{{ $UnderTheScabie->maintain_working_hours }}</td>
                @endif
                @if (in_array('good_productivity_performance',$inputs))
                <td>{{ $UnderTheScabie->good_productivity_performance }}</td>
                @endif
                @if (in_array('production_quantity',$inputs))
                <td>{{ $UnderTheScabie->production_quantity }}</td>
                @endif
                @if (in_array('learning_ability',$inputs))
                <td>{{ $UnderTheScabie->production_quantity }}</td>
                @endif
                @if (in_array('work_progress',$inputs))
                <td>{{ $UnderTheScabie->work_progress }}</td>
                @endif
                @if (in_array('adhere_to_the_directives_instructions',$inputs))
                <td>{{ $UnderTheScabie->adhere_to_the_directives_instructions }}</td>
                @endif
                @if (in_array('initiative_and_quick_wit',$inputs))
                <td>{{ $UnderTheScabie->initiative_and_quick_wit }}</td>
                @endif
                @if (in_array('relationship_with_colleagues',$inputs))
                <td>{{ $UnderTheScabie->relationship_with_colleagues }}</td>
                @endif
                @if (in_array('ability_to_organize_work',$inputs))
                <td>{{ $UnderTheScabie->relationship_with_colleagues }}</td>
                @endif
                @if (in_array('take_advantage_of_working_time',$inputs))
                <td>{{ $UnderTheScabie->take_advantage_of_working_time }}</td>
                @endif
                @if (in_array('notes',$inputs))
                <td>{{ $UnderTheScabie->notes }}</td>
                @endif



