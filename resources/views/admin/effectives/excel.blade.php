<table>
    <thead>
        <tr>
            <th>الكود</th>
            <th>رقم الموظف</th>
            <th>الاسم</th>
            <th>الوظيفه</th>
            <th>الادارة</th>
            <th>القسم</th>
            <th>الجنسيه</th>
            <th>تاريخ بدايه العمل</th>
            <th>تاريخ الاضافه</th>
        </tr>


    </thead>
    <tbody>
        @foreach ($effectives as $effective)
        <tr>
            <td>{{$effective->id}}</td>
            <td>{{$effective->id_number}}</td>
            <td>{{optional($effective->NameEmploye)->name}}</td>
            <td>{{optional($effective->jobEmploye)->name_job}}</td>
            <td>{{optional($effective->administrationEmploye)->name_administration}}</td>
            <td>{{optional($effective->sectionEmploye)->name}}</td>
            <td>{{optional($effective->nationalityEmploye)->name_nationality}}</td>
            <td>{{$effective->start_working_at}}</td>
            <td>{{$effective->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
