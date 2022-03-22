
        <div class="row text-center">
            <!-- <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="name" value="name" id="flexCheckDefaulta" checked>
                <label class="form-check-label" for="flexCheckDefaulta">
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
                <input class="form-check-input" type="checkbox" name="id_number" value="id_number" id="flexCheckDefaults" {{ old('id_number') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    الرقم
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="job_id" value="job_id" id="flexCheckDefaultd" {{ old('job_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultd">
                    الوظيفه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="section_id" value="section_id" id="flexCheckDefaultf" {{ old('section_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultf">
                    القسم
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="nationality_id" value="nationality_id" id="flexCheckDefaultg" {{ old('nationality_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultg">
                    الجنسيه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="date_of_birth" value="date_of_birth" id="flexCheckDefaulte1" {{ old('date_of_birth') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte1">
                    تاريخ الميلاد
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="religion" value="religion" id="flexCheckDefaulte2" {{ old('religion') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte2">
                    الديانه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="marital_status" value="marital_status" id="flexCheckDefaulte3" {{ old('marital_status') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte3">
                    الحاله الاجتماعيه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="present_adderss" value="present_adderss" id="flexCheckDefaulte4" {{ old('present_adderss') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte4">
                    العنوان
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="post" value="post" id="flexCheckDefaulte5" {{ old('post') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte5">
                    البريد
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="mobile" value="mobile" id="flexCheckDefaulte6" {{ old('mobile') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte6">
                    الهاتف
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="home_phone" value="home_phone" id="flexCheckDefaulte7" {{ old('home_phone') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte7">
                    الهاتف المنزلي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="salary_system" value="salary_system" id="flexCheckDefaulte8" {{ old('salary_system') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte8">
                    انظمه المرتب
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="have_you_any_dependents" value="have_you_any_dependents" id="flexCheckDefaulte9" {{ old('have_you_any_dependents') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte9">
                    اعاله اشخاص
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="dependents_address" value="dependents_address" id="flexCheckDefaulte10" {{ old('dependents_address') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte10">
                    عنوان اقامه الاشخاص الاعاله
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="card_id" value="card_id" id="flexCheckDefaulte11" {{ old('card_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte11">
                    البطاقه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="place_of_issue" value="place_of_issue" id="flexCheckDefaulte12" {{ old('place_of_issue') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte12">
                    مكان اصدار البطاقه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="date_of_issue" value="date_of_issue" id="flexCheckDefaulte13" {{ old('date_of_issue') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte13">
                    تاريخ اصدار البطاقه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="number" value="number" id="flexCheckDefaulte14" {{ old('number') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte14">
                    الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="category" value="category" id="flexCheckDefaulte15" {{ old('category') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte15">
                    نوع الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="place_of_issue_driving" value="place_of_issue" id="flexCheckDefaulte16" {{ old('place_of_issue_driving') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte16">
                    مكان اصدار الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="date_of_issue_driving" value="date_of_issue" id="flexCheckDefaulte17" {{ old('date_of_issue_driving') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte17">
                    تاريخ اصدار الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="expiry_date" value="expiry_date" id="flexCheckDefaulte18" {{ old('expiry_date') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte18">
                    تاريخ انتهاء الرخصه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="blood_group" value="blood_group" id="flexCheckDefaulte19" {{ old('blood_group') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte19">
                    فصيله الدم
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="job_title" value="job_title" id="flexCheckDefaulte20" {{ old('job_title') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte20">
                    اخر وظيفه مارستها
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="from" value="from" id="flexCheckDefaulte21" {{ old('from') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte21">
                    من
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="to" value="to" id="flexCheckDefaulte22" {{ old('to') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte22">
                    الي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="bisic_salary" value="bisic_salary" id="flexCheckDefaulte23" {{ old('bisic_salary') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte23">
                    الراتب لاخر وظيفه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="allowance" value="allowance" id="flexCheckDefaulte24" {{ old('allowance') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte24">
                    البدلات
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="company_name" value="company_name" id="flexCheckDefaulte25" {{ old('company_name') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte25">
                    اسم الشركه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="phone" value="phone" id="flexCheckDefaulte26" {{ old('phone') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte26">
                    رقم الشركه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="address" value="address" id="flexCheckDefaulte27" {{ old('address') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte27">
                    عنوان الشركه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="reason_for_leaving" value="reason_for_leaving" id="flexCheckDefaulte28" {{ old('reason_for_leaving') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte28">
                    سبب ترك العمل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="description_for_your_duties" value="description_for_your_duties" id="flexCheckDefaulte29" {{ old('description_for_your_duties') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte29">
                    تفاصيل عن واجبات اخر وظيفه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="qualification" value="qualification" id="flexCheckDefaulte30" {{ old('qualification') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte30">
                    المؤهل الدراسي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="place_name" value="place_name" id="flexCheckDefaulte31" {{ old('place_name') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte31">
                    مكان اصدار المؤهل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="country" value="country" id="flexCheckDefaulte32" {{ old('country') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte32">
                    بلد اصدار المؤهل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="city" value="city" id="flexCheckDefaulte33" {{ old('city') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte33">
                    مدينه اصدار المؤهل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="from_qualification" value="from_qualification" id="flexCheckDefaulte34" {{ old('from_qualification') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte34">
                    من
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="to_qualification" value="to_qualification" id="flexCheckDefaulte35" {{ old('to_qualification') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte35">
                    الي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="specialize" value="specialize" id="flexCheckDefaulte36" {{ old('specialize') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte36">
                    التخصص
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="salary_0" value="salary" id="flexCheckDefaulte37" {{ old('salary_0') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte37">
                    اول راتب اساسي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="current_housing_0" value="current_housing" id="flexCheckDefaulte38" {{ old('current_housing_0') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte38">
                    اول بدل سكن
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="current_transportation_0" value="current_transportation" id="flexCheckDefaulte39" {{ old('current_transportation_0') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte39">
                    اول بدل موصلات
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="other_allowances_0" value="other_allowances" id="flexCheckDefaulte40" {{ old('other_allowances_0') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte40">
                    البدلات الاخري
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="salary_1" value="salary" id="flexCheckDefaulte41" {{ old('salary_1') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte41">
                    الراتب الاساسي الحالي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="current_housing_1" value="current_housing" id="flexCheckDefaulte42" {{ old('current_housing_1') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte42">
                    بدل السكن الحالي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="current_transportation_1" value="current_transportation" id="flexCheckDefaulte43" {{ old('current_transportation_1') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte43">
                    بدل الموصلات الحالي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="other_allowances_1" value="other_allowances" id="flexCheckDefaulte44" {{ old('other_allowances_1') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte44">
                    البدلات الاخري
                </label>
            </div>
        </div>
