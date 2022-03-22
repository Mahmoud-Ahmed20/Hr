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
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>

            <td>
                @if ($user->is_activate==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
                @if ($user->archive==1)
                    {{'نعم'}}
                @else
                    {{'لا'}}
                @endif
            </td>
            <td>
            {{$user->created_at}}
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
