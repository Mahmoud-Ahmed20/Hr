<table>
    <thead>
        <tr>
            <th>الاسم</th>
            <th>التاريخ</th>
            <th>رقم الموظف</th>
            <th>القسم</th>
            <th>الوظيفة</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notice_absence_employee as $one_notice_absence_employee)
        <tr>
            <td>{{$one_notice_absence_employee->staff->name}}</td>
            <td>{{$one_notice_absence_employee->date}}</td>
            <td>{{$one_notice_absence_employee->staff_number}}</td>
            <td>{{$one_notice_absence_employee->section->name}}</td>
            <td>{{$one_notice_absence_employee->job->name_job}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
