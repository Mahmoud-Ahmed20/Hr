<table>
    <thead>
        <tr>
            <th>الكود</th>
            <th>الجنسيه</th>
            <th>مفعل</th>
            <th>ارشيف</th>
            <th>تاريخ الاضافه</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nationalities as $nationality)
        <tr>
            <td>{{$nationality->id}}</td>
            <td>{{$nationality->name_nationality}}</td>
            <td>
                @if ($nationality->is_activate==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
                @if ($nationality->archive==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
            {{$nationality->created_at}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
