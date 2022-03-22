

            <th>ID</th>
            <th>تاريخ الاضافه</th>
            <th>الاسم</th>
            @if(in_array('id_number', $inputs)) <th>الرقم</th> @endif
            @if(in_array('job_id', $inputs)) <th>الوظيفة</th> @endif
            @if(in_array('section_id', $inputs)) <th>القسم</th> @endif
            @if(in_array('nationality_id', $inputs)) <th>الجنسية</th> @endif
            @if(in_array('date_of_birth', $inputs)) <th>تاريخ الميلاد</th> @endif
            @if(in_array('religion', $inputs)) <th>الديانة</th> @endif
            @if(in_array('marital_status', $inputs)) <th>الحالة الاجتماعية</th> @endif
            @if(in_array('present_adderss', $inputs)) <th>العنوان الحالي</th> @endif
            @if(in_array('post', $inputs)) <th>البريد</th> @endif
            @if(in_array('mobile', $inputs)) <th>الجوال</th> @endif
            @if(in_array('home_phone', $inputs)) <th>هاتف المنزل</th> @endif
            @if(in_array('salary_system', $inputs)) <th>نظام المرتب</th> @endif
            @if(in_array('have_you_any_dependents', $inputs)) <th>هل تعول احدا</th> @endif
            @if(in_array('dependents_address', $inputs)) <th>عنوانهم</th> @endif

            @if(in_array('card_id', $inputs)) <th>الرقم القومي</th> @endif
            @if(in_array('place_of_issue', $inputs)) <th>مكان الاصدار</th> @endif
            @if(in_array('date_of_issue', $inputs)) <th>تاريخ الاصدار</th> @endif

            @if(in_array('bisic_salary', $inputs)) <th>الراتب الاساسي لاخر وظيفه </th> @endif
            @if(in_array('allowance', $inputs)) <th>البدلات لاخر وظيفه </th> @endif
            @if(in_array('job_title', $inputs)) <th>مسمي الوظيفة لاخر وظيفه </th> @endif
            @if(in_array('company_name', $inputs)) <th>اسم الشركة </th> @endif
            @if(in_array('from', $inputs)) <th>من </th> @endif
            @if(in_array('to', $inputs)) <th>الي</th> @endif
            @if(in_array('phone', $inputs)) <th>الهاتف </th> @endif
            @if(in_array('address', $inputs)) <th>العنوان</th> @endif
            @if(in_array('description_for_your_duties', $inputs)) <th>تفاصيل عن واجباتك لاخر وظيفه</th> @endif
            @if(in_array('reason_for_leaving', $inputs)) <th>سبب ترك العمل لاخر وظيفه</th> @endif

            @if(in_array('category', $inputs)) <th>نوع رخصه القياده</th> @endif
            @if(in_array('number', $inputs)) <th>رقمها</th> @endif
            @if(in_array('date_of_issue_driving', $inputs)) <th>تاريخ اصدار الرخصة</th> @endif
            @if(in_array('expiry_date', $inputs)) <th>تاريخ انتهائها</th> @endif
            @if(in_array('place_of_issue_driving', $inputs)) <th>مكان اصدار الرخصة </th> @endif
            @if(in_array('blood_group', $inputs)) <th>فصيلة الدم</th> @endif

            @if(in_array('qualification', $inputs)) <th>اخر مؤهل دراسي</th> @endif
            @if(in_array('place_name', $inputs)) <th>اسم المدرسة / الجامعة</th> @endif
            @if(in_array('country', $inputs)) <th>البلد</th> @endif
            @if(in_array('city', $inputs)) <th>المدينة </th> @endif
            @if(in_array('specialize', $inputs)) <th>من</th> @endif
            @if(in_array('from_qualification', $inputs)) <th>الي</th> @endif
            @if(in_array('to_qualification', $inputs)) <th>التخصص</th> @endif

            @if(in_array('salary_0', $inputs)) <th>اول راتب اساسي</th> @endif
            @if(in_array('current_housing_0', $inputs)) <th>اول بدل سكن</th> @endif
            @if(in_array('current_transportation_0', $inputs)) <th>اول بدل مواصلات</th> @endif
            @if(in_array('other_allowances_0', $inputs)) <th>البدلات الاخري</th> @endif

            @if(in_array('salary_1', $inputs)) <th>الراتب الاساسي الحالي</th> @endif
            @if(in_array('current_housing_1', $inputs)) <th>بدل السكن الحالي</th> @endif
            @if(in_array('current_transportation_1', $inputs)) <th>بدل المواصلات الحالي</th> @endif
            @if(in_array('other_allowances_1', $inputs)) <th>البدلات الاخري</th> @endif
            <th>العمليات</th>
