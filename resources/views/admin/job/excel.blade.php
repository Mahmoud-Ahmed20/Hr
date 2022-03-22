<table>
    <thead>
        <tr>
            <th>الكود</th>
            <th>الوظيفه</th>
            <th>الادارة</th>
            <th>مفعل</th>
            <th>ارشيف</th>
            <th>تاريخ الاضافه</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobs as $job)
        <tr>
            <td>{{$job->id}}</td>
            <td>{{$job->name_job}}</td>
            <td>{{optional($job->administration)->name_administration}}</td>
            <td>
                @if ($job->is_activate==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
                @if ($job->archive==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
            {{$job->created_at}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
