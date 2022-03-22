<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>تاريخ الاضافه</th>
            <th>الاسم</th>
            <th>الرقم الوظيفي</th>
            <th>المسمي الوظيفي</th>
            <th>الجنسية</th>
            <th>تاريخ ووقت البدء</th>
            <th>مدة المهمة</th>
            <th>موقع المهمة</th>
            <th>وسيلة السفر</th>
        </tr>


    </thead>
    <tbody>
        @foreach ($business_trip_and_transfer_requests as $oneItem)
        <tr>
            <td>{{$oneItem->id}}</td>
            <td>{{$oneItem->created_at}}</td>
            <td>{{($oneItem->Staff)?$oneItem->Staff->name : ''}}</td>
            <td>{{$oneItem->id_no}}</td>
            <td>{{$oneItem->position}}</td>
            <td>{{($oneItem->nationalityRow)?$oneItem->nationalityRow->name_nationality:''}}</td>
            <td>{{$oneItem->start_date}}</td>
            <td>{{$oneItem->period_of_stay}}</td>
            <td>{{$oneItem->destination}}</td>
            <td>{{$oneItem->means_of_transportation}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
