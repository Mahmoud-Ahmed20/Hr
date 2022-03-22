<table>
    <thead>
        <tr>

            <th>اسم الموظف</th>
            <th>الوظيفة</th>
            <th>الادارة</th>
            <th>القسم</th>
            <th>تاريخ التعيين</th>
            <th>اسم المسؤول المباشر</th>
            @if (in_array('performance_appraisal_date',$inputs))
            <th>تاريخ تقوم الاداء </th>
            @endif
            @if (in_array('maintain_working_hours',$inputs))
            <th>الحفاظ علي مواعيد العمل</th>
            @endif
            @if (in_array('good_productivity_performance',$inputs))
            <th>جودة انتاجية الاداء</th>
            @endif
            @if (in_array('production_quantity',$inputs))
            <th> كمية الانتاج</th>
            @endif
            @if (in_array('learning_ability',$inputs))
            <th>القدرة علي التعلم</th>
            @endif
            @if (in_array('work_progress',$inputs))
            <th>التقدم في العمل</th>
            @endif
            @if (in_array('adhere_to_the_directives_instructions',$inputs))
            <th> الالتزام بتعليمات المسؤول المباشر </th>
            @endif
            @if (in_array('initiative_and_quick_wit',$inputs))
            <th>المبادرة وسرعة البديهة</th>
            @endif
            @if (in_array('relationship_with_colleagues',$inputs))
            <th>العلاقة مع الزملاء</th>
            @endif
            @if (in_array('ability_to_organize_work',$inputs))
            <th>القدرة علي تنظيم العمل</th>
            @endif
            @if (in_array('take_advantage_of_working_time',$inputs))
            <th>الافادة من وقت العمل</th>
            @endif
            @if (in_array('direct_administrators_recommendation',$inputs))
            <th>توصية المسؤول المباشر</th>
            @endif
            @if (in_array('notes',$inputs))
            <th>ملاحظات المسؤول المباشر</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($UnderTheScabies as $UnderTheScabie)
        <tr>
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





        </tr>
        @endforeach
    </tbody>
</table>
