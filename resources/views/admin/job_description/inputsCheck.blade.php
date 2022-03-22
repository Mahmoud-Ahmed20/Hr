
        <div class="row text-center">
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" id="select-all" name="select-all" value="select-all" id="flexCheckDefaults" {{ old('select-all') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    تحديد الكل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="job_title" value="job_title" id="flexCheckDefaults" {{ old('job_title') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    مسمي وظيفي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="staff_id" value="staff_id" id="flexCheckDefaults" {{ old('staff_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    اسم الموظف
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="section_id" value="section_id" id="flexCheckDefaults" {{ old('section_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    القسم
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="administration_id" value="administration_id" id="flexCheckDefaults" {{ old('administration_id') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    الادارة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="direct_manager_name" value="direct_manager_name" id="flexCheckDefaults" {{ old('direct_manager_name') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    اسم الرئيس المباشر
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="follower_occupations" value="follower_occupations" id="flexCheckDefaults" {{ old('follower_occupations') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    الوظائف التابعة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="aim_from_job" value="aim_from_job" id="flexCheckDefaults" {{ old('aim_from_job') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    الهدف من الوظيفة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="functions_and_duties_job" value="functions_and_duties_job" id="flexCheckDefaults" {{ old('functions_and_duties_job') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    المهام و الوواجبات الوظيفة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="special_circumstances" value="special_circumstances" id="flexCheckDefaults" {{ old('special_circumstances') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    ظروف العمل الخاصة بالوظيفة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="job_relations" value="job_relations" id="flexCheckDefaults" {{ old('job_relations') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    العلاقات الوظيفية
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="occupant_specifications" value="occupant_specifications" id="flexCheckDefaults" {{ old('occupant_specifications') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    مواصفات شاغل الوظيفة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="skills_and_language" value="skills_and_language" id="flexCheckDefaults" {{ old('skills_and_language') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaults">
                    المهارات و اللغات
                </label>
            </div>
        </div>
