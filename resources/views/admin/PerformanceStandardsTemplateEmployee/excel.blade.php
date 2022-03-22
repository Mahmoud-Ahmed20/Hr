<table>
    <thead>
        <tr>
            <th>الاسم</th>
            <th>المسمي الوظيفي</th>
            @if (in_array('understand_business_rules',$inputs))
            <th> القدرة علي استيعاب قواعد و أساليب العمل </th>
            @endif
            @if (in_array('understand_notes',$inputs))
                <th>  ملاحظات القدرة علي استيعاب قواعد وأساليب العمل </th>
            @endif
            @if (in_array('get_work_done',$inputs))
            <th> انجاز العمل بالمستوي و الموعد المطلوب</th>
            @endif
            @if (in_array('get_work_done_notes',$inputs))
            <th> انجاز العمل بالمستوي و الموعد المطلوب ملاحظات</th>
            @endif
            @if (in_array('responding_to_work_pressure',$inputs))
            <th>الاجتهاد و التجاوب مع ضغط الشغل </th>
            @endif
            @if (in_array('responding_to_work_pressure_notes',$inputs))
            ملاحظات الاجتهاد و التجاوب مع ضغط العمل
            @endif
            @if (in_array('initiative_and_innovation_at_work',$inputs))
            <th>المبادرة و الابتكار في العمل </th>
            @endif
            @if (in_array('initiative_and_innovation_at_work_notes',$inputs))
            <th>المبادرة و الابتكار في العمل ملاحظات</th>
            @endif
            @if (in_array('accept_directives_from_managers',$inputs))
            <th>تقبل توجيهات وانتقادات المدراء</th>
            @endif
            @if (in_array('accept_directives_from_managers_notes',$inputs))
            <th>تقبل توجيهات وانتقادات المدراء ملاحظات</th>
            @endif
            @if (in_array('flexibility_and_adaptability',$inputs))
            <th>المرونة و القدرة علي التكيف</th>
            @endif
            @if (in_array('flexibility_and_adaptability_notes',$inputs))
                <th> المرونة و القدرة علي التكلفة ملاحظات</th>
            @endif
            @if (in_array('make_decisions_and_take_responsibility',$inputs))
            <th>اتخاذ القرارات و تحمل المسؤولية</th>
            @endif
            @if (in_array('make_decisions_and_take_responsibility_notes',$inputs))
            <th>  اتخاذ القرارات وتحمل المسؤوليات ملاحظات</th>
            @endif
            @if (in_array('personal_cleanliness',$inputs))
            <th>النظافة الشخصية و المظهر العام</th>
            @endif
            @if (in_array('personal_cleanliness_notes',$inputs))
            <th> ملاحظات النظافة الشخصية و المظهر العام</th>
            @endif
            @if (in_array('adhere_to_corporate_policies',$inputs))
            <th>الالتزام بأنظمة و سياسات الشركة</th>
            @endif
            @if (in_array('adhere_to_corporate_policies_notes',$inputs))
                <th>الالتزام بأنظمة وسياسات الشركة ملاحظات</th>
            @endif
            @if (in_array('teamwork',$inputs))
            <th>العمل بروح الفريق ومهارات العمل الجماعي </th>
            @endif
            @if (in_array('teamwork_notes',$inputs))
                <th>العمل بروح الفريق ومهارات اعمل الجماعي ملاحظات</th>
            @endif


        </tr>


    </thead>
    <tbody>
        @foreach ($Performances as $Performance)
        <tr>
            <td>{{ optional($Performance->staff)->name}}</td>
            <td>{{ $Performance->job_title}}</td>
            @if (in_array('understand_business_rules',$inputs))
            <td>{{ $Performance->understand_business_rules}}</td>
            @endif
            @if (in_array('understand_notes',$inputs))
            <td>{{ $Performance->understand_notes }}</td>
            @endif
            @if (in_array('get_work_done',$inputs))
            <td>{{ $Performance->get_work_done}}</td>
            @endif
            @if (in_array('get_work_done_notes',$inputs))
                <td>{{ $Performance->get_work_done_notes }}</td>
            @endif
            @if (in_array('responding_to_work_pressure',$inputs))
            <td>{{ $Performance->responding_to_work_pressure}}</td>
            @endif
            @if (in_array('responding_to_work_pressure_notes',$inputs))
                <td>{{$Performance->responding_to_work_pressure_notes}}</td>
            @endif
            @if (in_array('initiative_and_innovation_at_work_notes',$inputs))
                <td>{{$Performance->initiative_and_innovation_at_work_notes}}</td>
            @endif
            @if (in_array('initiative_and_innovation_at_work',$inputs))
            <td>{{ $Performance->initiative_and_innovation_at_work}}</td>
            @endif
            @if (in_array('initiative_and_innovation_at_work_notes',$inputs))
                <td>{{ $Performance->initiative_and_innovation_at_work_notes }}</td>
            @endif
            @if (in_array('accept_directives_from_managers',$inputs))
            <td>{{ $Performance->accept_directives_from_managers}}</td>
            @endif
            @if (in_array('accept_directives_from_managers_notes',$inputs))
                <td>{{ $Performance->accept_directives_from_managers_notes }}</td>
            @endif
            @if (in_array('flexibility_and_adaptability',$inputs))
            <td>{{ $Performance->flexibility_and_adaptability}}</td>
            @endif
            @if (in_array('flexibility_and_adaptability_notes',$inputs))
                <td>{{ $Performance->flexibility_and_adaptability_notes }}</td>
            @endif
            @if (in_array('make_decisions_and_take_responsibility',$inputs))
            <td>{{ $Performance->make_decisions_and_take_responsibility}}</td>
            @endif
            @if (in_array('make_decisions_and_take_responsibility_notes',$inputs))
            <td>{{ $Performance->make_decisions_and_take_responsibility_notes }}</td>
            @endif
            @if (in_array('personal_cleanliness',$inputs))
            <td>{{ $Performance->personal_cleanliness}}</td>
            @endif
            @if (in_array('personal_cleanliness_notes',$inputs))
                <td>{{$Performance->personal_cleanliness_notes}}</td>
            @endif
            @if (in_array('adhere_to_corporate_policies',$inputs))
            <td>{{ $Performance->adhere_to_corporate_policies}}</td>
            @endif
            @if (in_array('teamwork',$inputs))
            <td>{{ $Performance->teamwork}}</td>
            @endif
            @if (in_array('teamwork_notes',$inputs))
            <td>{{ $Performance->teamwork_notes }}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
