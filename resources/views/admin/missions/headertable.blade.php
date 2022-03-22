
                    <th>الرقم</th>
                    <th>الاسم</th>
                    <th>المكان</th>
                    <th>التاريخ</th>
                    <th>المسمي الوظيفي</th>
                    <th> الاداراة</th>
                    <th> القسم</th>
                    @if (in_array('direction_of_the_mission',$inputs))
                    <th>جهه مهمه العمل</th>
                    @endif
                    @if (in_array('duration_of_mission',$inputs))
                    <th> المدة</th>
                    @endif
                    @if (in_array('date_from',$inputs))
                    <th>اعتبار من </th>
                    @endif
                    @if (in_array('date_to',$inputs))
                    <th>اعتبار الي </th>
                    @endif
                    @if (in_array('mission_specification',$inputs))
                    <th> بيان مهمة العمل</th>
                    @endif
                    @if (in_array('expense_advance',$inputs))
                    <th>سلفة مصاريف المهامة</th>
                    @endif
                    @if (in_array('ticket',$inputs))
                    <th>تذكرة سفر خط سير </th>
                    @endif
