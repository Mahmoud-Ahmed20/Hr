<table>
    <thead>
        <tr>
            <th>الموظف</th>
            <th>الوظيفه</th>
            <th>القسم</th>
            <th>نوع الاجراء</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($staffServiceActions as $OnestaffsActions)
        <tr>
            <td>{{(($OnestaffsActions->staff)? $OnestaffsActions->staff->name : '')}} </td>
            <td>{{(($OnestaffsActions->job)?$OnestaffsActions->job->name_job :'')}}</td>
            <td>{{(($OnestaffsActions->section)? $OnestaffsActions->section->name : '')}} </td>
            <td>{{($OnestaffsActions->action_type)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
