<table>
    <thead>
        <tr>
            <th>الكود</th>
            <th>الاسم</th>
            <th>الرقم</th>
            <th>تاريخ التعيين</th>
            <th>الادارة</th>
            <th>القسم</th>
            <th>الوظيفه</th>
            <th>جهه مهمه العمل</th>
            <th>المده</th>
            <th>تاريخ البدء</th>
            <th>تاريخ المغادره</th>
            <th>تفاصيل المهمه</th>
            <th>المهام المنجزه</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($missions as $mission)
            <tr>
                <td>{{$mission->id}}</td>
                <td>{{optional($mission->staff)->name}}</td>
                <td>{{$mission->number}}</td>
                <td>{{$mission->work_date}}</td>
                <td>{{optional($mission->administration)->name_administration}}</td>
                <td>{{optional($mission->Section)->name}}</td>
                <td>{{optional($mission->job)->name_job}}</td>
                <td>{{$mission->direction_of_the_mission}}</td>
                <td>{{$mission->duration_of_mission}}</td>
                <td>{{$mission->start_working_at}}</td>
                <td>{{$mission->leaving_date}}</td>
                <td>{{$mission->mission_details}}</td>
                <td>{{$mission->results}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
