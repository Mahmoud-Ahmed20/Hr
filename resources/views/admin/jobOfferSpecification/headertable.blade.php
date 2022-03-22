
                                        <th>الاسم</th>
                                        @if (in_array('nationality_id',$inputs))<th>الجنسية</th> @endif
                                        @if (in_array('branch',$inputs))<th>فرع</th> @endif
                                        @if (in_array('qualification',$inputs)) <th>المؤهل العلمي</th> @endif
                                        <th>الوظيفة</th>
                                        @if (in_array('national_id',$inputs)) <th>الرقم القومي</th> @endif
                                        @if (in_array('issue_id',$inputs)) <th>مكان الاصدار</th> @endif
                                        @if (in_array('issue_id_data',$inputs)) <th>تاريخ الاصدار</th> @endif
                                        @if (in_array('degree_job',$inputs)) <th>الدرجة الوظيفية</th> @endif
                                        @if (in_array('administration_id',$inputs)) <th>الادارة</th> @endif
                                        @if (in_array('degree',$inputs)) <th>الدرجه</th> @endif
                                        @if (in_array('basic_salary_monthly',$inputs)) <th>الراتب الاساسي شهريا</th> @endif
                                        @if (in_array('basic_salary_Year',$inputs)) <th>الراتب الاساسي سنويا </th> @endif
                                        @if (in_array('housing_allowance_monthly',$inputs)) <th>بدل سكن شهريا</th> @endif
                                        @if (in_array('housing_allowance_Year',$inputs)) <th>بدل سكن سنويا</th> @endif
                                        @if (in_array('switch_connectors_monthly',$inputs)) <th>بدل موصلات شهريا</th> @endif
                                        @if (in_array('switch_connectors_Year',$inputs)) <th>بدل موصلات سنويا</th> @endif
                                        @if (in_array('other_allowances_monthly',$inputs)) <th>بدلات اخري شهريا</th> @endif
                                        @if (in_array('other_allowances_Year',$inputs)) <th>بدلات اخري سنويا</th> @endif
                                        @if (in_array('yearly_vacation',$inputs)) <th>الاجازة السنوية</th> @endif
                                        @if (in_array('treatment',$inputs)) <th>العلاج</th> @endif
                                        @if (in_array('Probation',$inputs)) <th>فترة التجربة</th> @endif
                                        @if (in_array('year_contract',$inputs))<th>مدة العقد</th>@endif
                                        <th>التاريخ</th>
                                        <th>العمليات</th>
