                    <th>الاسم</th>
                    <th> المؤهل العام </th>
                    <th>الوظيفه</th>
                    @if (in_array('section_id',$inputs))
                    <th>القسم</th>
                    @endif
                    <th>تاريخ المقابلة</th>
                    @if (in_array('interview_status',$inputs))
                    <th>حاله المقابله</th>
                    @endif
                    @if (in_array('extierior',$inputs))
                    <th> المظهر الخارجي</th>
                    @endif
                    @if (in_array('personal',$inputs))
                    <th>  الشخصية</th>
                    @endif
                    @if (in_array('team_work',$inputs))
                    <th>  العمل الجماعي</th>
                    @endif
                    @if (in_array('initiatire',$inputs))
                    <th>المبادرة</th>
                    @endif
                    @if (in_array('english',$inputs))
                    <th>اللغة الانجليزية</th>
                    @endif
                    @if (in_array('ambition',$inputs))
                    <th>الطموح  </th>
                    @endif
                    @if (in_array('make_decision',$inputs))
                    <th>اتخاذ القرار</th>
                    @endif
                    @if (in_array('experience',$inputs))
                    <th>الخبرة</th>
                    @endif
                    @if (in_array('skills',$inputs))
                    <th>المهارات</th>
                    @endif
                    @if (in_array('qualification_skills',$inputs))
                    <th>المؤهل العالمي</th>
                    @endif
                    @if (in_array('notes',$inputs))
                    <th>الملاحظات</th>
                    @endif








