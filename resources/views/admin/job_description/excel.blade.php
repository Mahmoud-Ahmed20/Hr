<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>تاريخ الاضافه</th>
            <th>الاسم</th>
            <th>مسمي الوظيفة</th>
            <th>القسم</th>
            <th>الادارة</th>
        </tr>


    </thead>
    <tbody>
    @foreach ($job_description as $oneJobDEscription)
        <tr>
            <td>{{$oneJobDEscription->id}}</td>
            <td>{{$oneJobDEscription->created_at}}</td>
            <td>{{$oneJobDEscription->staff->name}}</td>
            <td>{{$oneJobDEscription->job_title}}</td>
            <td>{{$oneJobDEscription->section->name}}</td>
            <td>{{$oneJobDEscription->administration->name_administration}}</td>

        </tr>

    @endforeach
    </tbody>
</table>
