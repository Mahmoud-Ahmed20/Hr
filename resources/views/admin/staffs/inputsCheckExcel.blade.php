        <div class="row text-center">
            <!-- <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="name" value="name" id="flexCheckDefaulta0" checked>
                <label class="form-check-label" for="flexCheckDefaulta0">
                    الاسم
                </label>
            </div> -->
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" id="select-all" name="select-all" value="select-all" id="flexCheckDefaults" {{ old('select-all') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    تحديد الكل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="id_number" value="id_number" id="flexCheckDefaults0" {{ old('id_number') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults0">
                    الرقم
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="job_id" value="job_id" id="flexCheckDefaultd0" {{ old('job_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultd0">
                    الوظيفه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="section_id" value="section_id" id="flexCheckDefaultf0" {{ old('section_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultf0">
                    القسم
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="nationality_id" value="nationality_id" id="flexCheckDefaultg0" {{ old('nationality_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultg0">
                    الجنسيه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="date_of_birth" value="date_of_birth" id="flexCheckDefaulte10" {{ old('date_of_birth') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte10">
                    تاريخ الميلاد
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="religion" value="religion" id="flexCheckDefaulte20" {{ old('religion') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte20">
                    الديانه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="marital_status" value="marital_status" id="flexCheckDefaulte30" {{ old('marital_status') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte30">
                    الحاله الاجتماعيه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="present_adderss" value="present_adderss" id="flexCheckDefaulte40" {{ old('present_adderss') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte40">
                    العنوان
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="post" value="post" id="flexCheckDefaulte50" {{ old('post') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte50">
                    البريد
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="mobile" value="mobile" id="flexCheckDefaulte60" {{ old('mobile') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte60">
                    الهاتف
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="home_phone" value="home_phone" id="flexCheckDefaulte70" {{ old('home_phone') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte70">
                    الهاتف المنزلي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="salary_system" value="salary_system" id="flexCheckDefaulte80" {{ old('salary_system') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte80">
                    انظمه المرتب
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="have_you_any_dependents" value="have_you_any_dependents" id="flexCheckDefaulte90" {{ old('have_you_any_dependents') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte90">
                    اعاله اشخاص
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="dependents_address" value="dependents_address" id="flexCheckDefaulte100" {{ old('dependents_address') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte100">
                    عنوان اقامه الاشخاص الاعاله
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="card_id" value="card_id" id="flexCheckDefaulte110" {{ old('card_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte110">
                    البطاقه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="place_of_issue" value="place_of_issue" id="flexCheckDefaulte120" {{ old('place_of_issue') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte120">
                    مكان اصدار البطاقه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="date_of_issue" value="date_of_issue" id="flexCheckDefaulte130" {{ old('date_of_issue') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte130">
                    تاريخ اصدار البطاقه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="number" value="number" id="flexCheckDefaulte140" {{ old('number') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte140">
                    الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="category" value="category" id="flexCheckDefaulte150" {{ old('category') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte150">
                    نوع الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="place_of_issue_driving" value="place_of_issue_driving" id="flexCheckDefaulte160" {{ old('place_of_issue_driving') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte160">
                    مكان اصدار الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="date_of_issue_driving" value="date_of_issue_driving" id="flexCheckDefaulte170" {{ old('date_of_issue_driving') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte170">
                    تاريخ اصدار الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="expiry_date" value="expiry_date" id="flexCheckDefaulte180" {{ old('expiry_date') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte180">
                    تاريخ انتهاء الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="blood_group" value="blood_group" id="flexCheckDefaulte190" {{ old('blood_group') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte190">
                    فصيله الدم
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="job_title" value="job_title" id="flexCheckDefaulte200" {{ old('job_title') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte200">
                    اخر وظيفه مارستها
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="from" value="from" id="flexCheckDefaulte210" {{ old('from') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte210">
                    من
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="to" value="to" id="flexCheckDefaulte220" {{ old('to') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte220">
                    الي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="bisic_salary" value="bisic_salary" id="flexCheckDefaulte230" {{ old('bisic_salary') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte230">
                    الراتب لاخر وظيفه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="allowance" value="allowance" id="flexCheckDefaulte240" {{ old('allowance') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte240">
                    البدلات
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="company_name" value="company_name" id="flexCheckDefaulte250" {{ old('company_name') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte250">
                    اسم الشركه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="phone" value="phone" id="flexCheckDefaulte260" {{ old('phone') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte260">
                    رقم الشركه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="address" value="address" id="flexCheckDefaulte270" {{ old('address') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte270">
                    عنوان الشركه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="reason_for_leaving" value="reason_for_leaving" id="flexCheckDefaulte280" {{ old('reason_for_leaving') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte280">
                    سبب ترك العمل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="description_for_your_duties" value="description_for_your_duties" id="flexCheckDefaulte290" {{ old('description_for_your_duties') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte290">
                    تفاصيل عن واجبات اخر وظيفه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="qualification" value="qualification" id="flexCheckDefaulte300" {{ old('qualification') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte300">
                    المؤهل الدراسي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="place_name" value="place_name" id="flexCheckDefaulte310" {{ old('place_name') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte310">
                    مكان اصدار المؤهل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="country" value="country" id="flexCheckDefaulte320" {{ old('country') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte320">
                    بلد اصدار المؤهل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="city" value="city" id="flexCheckDefaulte330" {{ old('city') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte330">
                    مدينه اصدار المؤهل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="from_qualification" value="from_qualification" id="flexCheckDefaulte340" {{ old('from_qualification') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte340">
                    من
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="to_qualification" value="to_qualification" id="flexCheckDefaulte350" {{ old('to_qualification') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte350">
                    الي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="specialize" value="specialize" id="flexCheckDefaulte360" {{ old('specialize') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte360">
                    التخصص
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="salary_0" value="salary_0" id="flexCheckDefaulte370" {{ old('salary_0') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte370">
                    اول راتب اساسي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="current_housing_0" value="current_housing_0" id="flexCheckDefaulte380" {{ old('current_housing_0') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte380">
                    اول بدل سكن
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="current_transportation_0" value="current_transportation_0" id="flexCheckDefaulte390" {{ old('current_transportation_0') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte390">
                    اول بدل موصلات
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="other_allowances_0" value="other_allowances_0" id="flexCheckDefaulte400" {{ old('other_allowances_0') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte400">
                    البدلات الاخري
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="salary_1" value="salary_1" id="flexCheckDefaulte410" {{ old('salary_1') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte410">
                    الراتب الاساسي الحالي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="current_housing_1" value="current_housing_1" id="flexCheckDefaulte420" {{ old('current_housing_1') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte420">
                    بدل السكن الحالي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="current_transportation_1" value="current_transportation_1" id="flexCheckDefaulte430" {{ old('current_transportation_1') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte430">
                    بدل الموصلات الحالي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="other_allowances_1" value="other_allowances_1" id="flexCheckDefaulte440" {{ old('other_allowances_1') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte440">
                    البدلات الاخري
                </label>
            </div>
        </div>
