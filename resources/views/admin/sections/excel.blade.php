<table>
    <thead>
        <tr>
            <th>الكود</th>
            <th>الاسم</th>
            <th>مفعل</th>
            <th>ارشيف</th>
            <th>تاريخ الاضافه</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sections as $section)
        <tr>
            <td>{{$section->id}}</td>
            <td>{{$section->name}}</td>
            <td>
                @if ($section->is_activate==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
                @if ($section->archive==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
            {{$section->created_at}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
