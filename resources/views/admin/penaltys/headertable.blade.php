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










