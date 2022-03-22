<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>الاسم</th>
            <th>المسمي الوظيفي</th>
            <th>سبب الاجازه</th>
            <th>اول يوم</th>
            <th>اخر يوم</th>
            <th>الهاتف</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vacations as $vacation)
        <tr>
            <td>{{$vacation->id}}</td>
            <td>{{optional( $vacation->staff)->name}}</td>
            <td>{{$vacation->job_title}}</td>
            <td>{{$vacation->reason_for_leave}}</td>
            <td>{{$vacation->first_day_off}}</td>
            <td>{{$vacation->last_date_off}}</td>
            <td>{{$vacation->phone}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
