<table>
    <thead>
        <tr>
            <th>الكود</th>
            <th>الاسم</th>
            <th>التاريخ</th>
            <th>الرقم الوظيفي</th>
            <th>المسمي الوظيفي</th>
            <th>سبب الاجازه</th>
            <th> تاريخ بدايه الاجازه</th> 
            <th> تاريخ انتهاء الاجازه  </th> 
            <th> تاريخ مباشره العمل  </th> 
            <th>  عدد ايام الاجازه الفعليه</th> 
            <th> اجمالي عدد ايام الاجازه الفعليه</th> 
            <th>فرق الايام بين المخطط والفعلي</th> 
           
        </tr>


    </thead>
    <tbody>
        @foreach ($backs as $back)
        <tr>
            <td>{{$back->id}}</td>
            <td>{{optional($back->NameEmployeBackToWork)->name}}</td>
            <td>{{$back->date}}</td>
            <td>{{$back->job_number}}</td>
            <td>{{$back->job_title}}</td>
            <td>{{$back->reason_for_leave}}</td>
            <td>{{$back->first_day_off}}</td>
            <td>{{$back->last_date_off}}</td>
            <td>{{$back->date_word_resumed}}</td>
            <td>{{$back->no_of_actual_vacation_days}}</td>
            <td>{{$back->hr_total_no_actual_vacation_days}}</td>
            <td>{{$back->hr_difference_between_vacation_days}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
