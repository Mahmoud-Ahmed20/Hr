<table>
    <thead>
        <tr>
            <th>الموظف</th>
            <th>المسمي الموظيفي</th>
            <th>التاريخ</th>
            <th>تاريخ بداء الخدمة</th>
            <th>تاريخ نهاية الخدمة</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($work_certific as $one_work_certific)
        <tr>
            <td>{{($one_work_certific->staff)?$one_work_certific->staff->name : ''}}</td>
            <td>{{$one_work_certific->job_title}}</td>
            <td>{{$one_work_certific->date}}</td>
            <td>{{$one_work_certific->start_work}}</td>
            <td>{{$one_work_certific->end_work}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
