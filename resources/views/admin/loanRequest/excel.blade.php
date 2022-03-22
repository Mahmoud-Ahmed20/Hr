<table>
    <thead>
        <tr>
            <th>الاسم</th>
            <th>الرقم</th>
            <th>الاداره</th>
            <th>الوظيفه</th>
            <th>القسم</th>
            <th>بداية العمل</th>
            <th>الراتب الاساسي</th>
            <th>قيمه السلفة</th>
            <th>موافقة المدير المباشر</th>
            <th>ملاحظات المدير المباشر</th>
            <th>موافقة شؤون الموظفين</th>
            <th>ملاحظات شؤون الموظفين</th>
            <th>موافقة قسم المحاسبه</th>
            <th>ملاحظات قسم المحاسبه</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($LoanRequests as $LoanRequest)
        <tr>
            <td>{{optional($LoanRequest->staff)->name}}</td>
            <td>{{$LoanRequest->number}}</td>
            <td>{{optional($LoanRequest->administration)->name_administration}}</td>
            <td>{{optional($LoanRequest->job)->name_job}}</td>
            <td>{{optional($LoanRequest->section)->name}}</td>
            <td>{{$LoanRequest->going_date}}</td>
            <td>{{$LoanRequest->basic_salary}}</td>
            <td>{{$LoanRequest->advance_value}}</td>
            <td>{{$LoanRequest->direct_manager == 1 ? 'نعم' : 'لا' }} </td>
            <td>{{$LoanRequest->direct_manager_nots}}</td>
            <td>{{$LoanRequest->hr == 1 ? 'نعم' : 'لا' }} </td>
            <td>{{$LoanRequest->hr_nots}}</td>
            <td>{{$LoanRequest->the_accountant == 1 ? 'نعم' : 'لا' }} </td>
            <td>{{$LoanRequest->the_accountant_nots}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
