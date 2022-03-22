
        <div class="row text-center">
             {{-- <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="select-all" value="select-all" {{ old('select-all') ? 'checked' : '' }} id="flexCheckDefaulta" checked>
                <label class="form-check-label" for="flexCheckDefaulta">
                    تحديد الكل
                </label>
            </div>  --}}
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="select-all" id="select-all" value="select-all" id="flexCheckDefaultd" {{ old('select-all') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultd">
                    تحديد الكل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="year_contract" value="year_contract" id="flexCheckDefaultd" {{ old('job_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultd">
                     مدة العقد
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="nationality_id" value="nationality_id" id="flexCheckDefaultg" {{ old('nationality_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultg">
                    الجنسيه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="administration_id" value="administration_id" id="flexCheckDefaultg" {{ old('administration_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultg">
                    الادارة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="national_id" value="national_id" id="flexCheckDefaulte1" {{ old('national_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte1">
                    رقم البطاقة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="issue_id" value="issue_id" id="flexCheckDefaulte2" {{ old('issue_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte2">
                    مكان الاصدار
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="issue_id_data" value="issue_id_data" id="flexCheckDefaulte3" {{ old('issue_id_data') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte3">
                     تاريخ الاصدار
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="degree_job" value="degree_job" id="flexCheckDefaulte4" {{ old('degree_job') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte4">
                     الدرجه الوظيفية
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="qualification" value="qualification" id="flexCheckDefaulte5" {{ old('qualification') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte5">
                    المؤهل العلمي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="branch" value="branch" id="flexCheckDefaulte6" {{ old('branch') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte6">
                    الفرع
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="degree" value="degree" id="flexCheckDefaulte7" {{ old('degree') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte7">
                     الدرجه
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="yearly_vacation" value="yearly_vacation" id="flexCheckDefaulte8" {{ old('yearly_vacation') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte8">
                     الاجازه السنوية
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="treatment" value="treatment" id="flexCheckDefaulte9" {{ old('treatment') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte9">
                      العلاج
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="Probation" value="Probation" id="flexCheckDefaulte10" {{ old('Probation') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte10">
                    فترة التجربة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="basic_salary_monthly" value="basic_salary_monthly" id="flexCheckDefaulte11" {{ old('basic_salary_monthly') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte11">
                    الراتب الااساسي  شهري
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="basic_salary_Year" value="basic_salary_Year" id="flexCheckDefaulte12" {{ old('basic_salary_Year') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte12">
                      الاراتب الااساسي سنويا
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="housing_allowance_monthly" value="housing_allowance_monthly" id="flexCheckDefaulte13" {{ old('housing_allowance_monthly') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte13">
                      بدل السكن شهري
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="housing_allowance_Year" value="housing_allowance_Year" id="flexCheckDefaulte14" {{ old('housing_allowance_Year') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte14">
                    بدل السكن سنويا
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="switch_connectors_monthly" value="switch_connectors_monthly" id="flexCheckDefaulte15" {{ old('switch_connectors_monthly') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte15">
                     بدل موصلات شهري
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="switch_connectors_Year" value="switch_connectors_Year" id="flexCheckDefaulte16" {{ old('switch_connectors_Year') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte16">
                      بدل موصلات سنويا
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="other_allowances_Year" value="other_allowances_Year" id="flexCheckDefaulte17" {{ old('other_allowances_Year') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte17">
                        بدلات اخري سنويا
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="other_allowances_monthly" value="other_allowances_monthly" id="flexCheckDefaulte18" {{ old('other_allowances_monthly') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte18">
                      بدلات اخري شهري
                </label>
            </div>
        </div>
