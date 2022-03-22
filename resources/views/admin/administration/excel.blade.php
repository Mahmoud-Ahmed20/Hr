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
        @foreach ($administrations as $administration)
        <tr>
            <td>{{$administration->id}}</td>
            <td>{{$administration->name_administration}}</td>
            <td>
                @if ($administration->is_activate==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
                @if ($administration->archive==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
            {{$administration->created_at}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
