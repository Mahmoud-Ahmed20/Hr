<table>
    <thead>
        <tr>
            <th>الرقم</th>
            <th>الاسم</th>
            <th>المكان</th>
            <th>التاريخ</th>
            <th>المسمي الوظيفي</th>
            <th> الاداراة</th>
            <th> القسم</th>
            @if (in_array('direction_of_the_mission',$inputs))
            <th>جهه مهمه العمل</th>
            @endif
            @if (in_array('duration_of_mission',$inputs))
            <th> المدة</th>
            @endif
            @if (in_array('date_from',$inputs))
            <th>اعتبار من </th>
            @endif
            @if (in_array('date_to',$inputs))
            <th>اعتبار الي </th>
            @endif
            @if (in_array('mission_specification',$inputs))
            <th> بيان مهمة العمل</th>
            @endif
            @if (in_array('expense_advance',$inputs))
            <th>سلفة مصاريف المهامة</th>
            @endif
            @if (in_array('ticket',$inputs))
            <th>تذكرة سفر خط سير </th>
            @endif


        </tr>


    </thead>
    <tbody>
        @foreach ($missions as $mission)
        <tr>
            <td>{{$mission->number}}</td>
            <td>{{optional($mission->NameEmploye)->name}}</td>
            <td>{{$mission->location}}</td>
            <td>{{$mission->date}}</td>
            <td>{{$mission->job_title}}</td>
            <td>{{optional($mission->Administration)->name_administration}}</td>
            <td>{{optional($mission->NameSections)->name}}</td>
            @if (in_array('date_from',$inputs))
            <td>{{$mission->date_from}}</td>
            @endif
            @if (in_array('date_to',$inputs))
            <td>{{$mission->date_to}}</td>
            @endif
            @if (in_array('direction_of_the_mission',$inputs))
            <td>{{$mission->direction_of_the_mission}}</td>
            @endif
            @if (in_array('duration_of_mission',$inputs))
            <td>{{$mission->duration_of_mission}}</td>
            @endif
            @if (in_array('mission_specification',$inputs))
            <td>{{$mission->mission_specification}}</td>
            @endif
            @if (in_array('expense_advance',$inputs))
            <td>{{$mission->expense_advance}}</td>
            @endif
            @if (in_array('ticket',$inputs))
            <td>{{$mission->ticket}}</td>
            @endif


        </tr>
        @endforeach
    </tbody>
</table>
