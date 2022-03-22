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
