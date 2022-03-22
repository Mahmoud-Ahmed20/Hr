<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>تاريخ الاضافه</th>
            <th>الاسم</th>
            <th>الوظيفه</th>
        </tr>


    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->created_at}}</td>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->position_applied_of}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
