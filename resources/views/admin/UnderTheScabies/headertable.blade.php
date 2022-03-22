
                    <th>اسم الموظف</th>
                    <th>الوظيفة</th>
                    <th>الادارة</th>
                    <th>القسم</th>
                    <th>تاريخ التعيين</th>
                    <th>اسم المسؤول المباشر</th>
                    @if (in_array('performance_appraisal_date',$inputs))
                    <th>تاريخ تقوم الاداء </th>
                    @endif
                    @if (in_array('maintain_working_hours',$inputs))
                    <th>الحفاظ علي مواعيد العمل</th>
                    @endif
                    @if (in_array('good_productivity_performance',$inputs))
                    <th>جودة انتاجية الاداء</th>
                    @endif
                    @if (in_array('production_quantity',$inputs))
                    <th> كمية الانتاج</th>
                    @endif
                    @if (in_array('learning_ability',$inputs))
                    <th>القدرة علي التعلم</th>
                    @endif
                    @if (in_array('work_progress',$inputs))
                    <th>التقدم في العمل</th>
                    @endif
                    @if (in_array('adhere_to_the_directives_instructions',$inputs))
                    <th> الالتزام بتعليمات المسؤول المباشر </th>
                    @endif
                    @if (in_array('initiative_and_quick_wit',$inputs))
                    <th>المبادرة وسرعة البديهة</th>
                    @endif
                    @if (in_array('relationship_with_colleagues',$inputs))
                    <th>العلاقة مع الزملاء</th>
                    @endif
                    @if (in_array('ability_to_organize_work',$inputs))
                    <th>القدرة علي تنظيم العمل</th>
                    @endif
                    @if (in_array('take_advantage_of_working_time',$inputs))
                    <th>الافادة من وقت العمل</th>
                    @endif
                    @if (in_array('direct_administrators_recommendation',$inputs))
                    <th>توصية المسؤول المباشر</th>
                    @endif
                    @if (in_array('notes',$inputs))
                    <th>ملاحظات المسؤول المباشر</th>
                    @endif
