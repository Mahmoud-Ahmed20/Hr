<table>
    <thead>
        <tr>
            <th>الرقم </th>
            <th> الاسم </th>
            <th>الادارة </th>
            <th>القسم  </th>
            <th>مسمي الوظيفة  </th>
            @if (in_array('last_penalty',$inputs))
            <th> تاريخ اخر مخالفة  </th>
            @endif
            @if (in_array('joining_date',$inputs))
            <th> تاريخ التعيين   </th>
            @endif
            @if (in_array('subject',$inputs))
            <th>  الموضوع   </th>
            @endif
            @if (in_array('draw_attention',$inputs))
            <th>  لفت نظر   </th>
            @endif
            @if (in_array('penalty',$inputs))
            <th>  انذار كتابي  </th>
            @endif
            @if (in_array('deduction',$inputs))
            <th>   ايام الخصم   </th>
            @endif
            @if (in_array('others',$inputs))
            <th>اخري</th>
            @endif
            @if (in_array('stopping_from_work_for',$inputs))
            <th>ايقاف عن العمل لمدة</th>
            @endif
            @if (in_array('stopping_the_yearly_increase',$inputs))
            <th> الحرمان من الزيادة السنوية</th>
            @endif
            @if (in_array('firing_with_a_bying',$inputs))
            <th>فصل من الخدمة مع التعويض </th>
            @endif
            @if (in_array('firing_without_a_bying',$inputs))
            <th>فصل من الخدمة بدون التعويض </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($penaltys as $penalty)
        <tr>
            <td>{{$penalty->number}}</td>
            <td>{{optional($penalty->NameEmploye)->name}}</td>
            <td>{{optional($penalty->EmployeAdministration)->name_administration}}</td>
            <td>{{optional($penalty->NameSections)->name}}</td>
            <td>{{$penalty->job_title}}</td>
            @if(in_array('last_penalty',$inputs))<td>{{$penalty->last_penalty}}</td>@endif
            @if(in_array('joining_date',$inputs))<td>{{$penalty->joining_date}}</td>@endif
            @if(in_array('subject',$inputs))<td>{{$penalty->subject}}</td>@endif
            @if(in_array('draw_attention',$inputs))<td>{{$penalty->draw_attention}}</td>@endif
            @if(in_array('penalty',$inputs))<td>{{$penalty->penalty}}</td>@endif
            @if(in_array('deduction',$inputs))<td>{{$penalty->deduction}}</td>@endif
            @if(in_array('others',$inputs))<td>{{$penalty->others}}</td>@endif
            @if(in_array('stopping_from_work_for',$inputs))<td>{{$penalty->stopping_from_work_for}}</td>@endif
            @if(in_array('stopping_the_yearly_increase',$inputs))<td>{{$penalty->stopping_the_yearly_increase}}</td>@endif
            @if(in_array('firing_with_a_bying',$inputs))<td>{{$penalty->firing_with_a_bying}}</td>@endif
            @if(in_array('firing_without_a_bying',$inputs))<td>{{$penalty->firing_without_a_bying}}</td>@endif
            @endforeach
        </tr>
    </tbody>
</table>
