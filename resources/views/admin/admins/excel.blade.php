<table>
    <thead>
        <tr>
            <th>الكود</th>
            <th>الاسم</th>
            <th>الايميل</th>
            <th>الجوال</th>
            <th>مفعل</th>
            <th>ارشيف</th>
            <th>تاريخ الاضافه</th>


        </tr>


    </thead>
    <tbody>
        @foreach ($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->phone}}</td>

            <td>
                @if ($admin->is_activate==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
                @if ($admin->archive==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
            {{$admin->created_at}}
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
