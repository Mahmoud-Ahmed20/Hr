
        <div class="row text-center">
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="select-all" id="select-all" value="select-all" id="flexCheckDefaultd" {{ old('select-all') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultd">
                    تحديد الكل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="job_title" value="job_title" id="flexCheckDefaultd" {{ old('job_title') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultd">
                      مسمي وظيفي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="joining_date" value="joining_date" id="flexCheckDefaultg" {{ old('joining_date') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultg">
                    تاريخ التعيين
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="last_penalty" value="last_penalty" id="flexCheckDefaultg" {{ old('last_penalty') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultg">
                    تاريخ اخر مخالفة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="subject" value="subject" id="flexCheckDefaulte1" {{ old('subject') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte1">
                     الموضوع
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="draw_attention" value="draw_attention" id="flexCheckDefaulte2" {{ old('draw_attention') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte2">
                     لفت نظر
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="penalty" value="penalty" id="flexCheckDefaulte3" {{ old('penalty') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte3">
                      انذار كتابي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="deduction" value="deduction" id="flexCheckDefaulte4" {{ old('deduction') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte4">
                      ايام الخصم
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="others" value="others" id="flexCheckDefaulte5" {{ old('others') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte5">
                      اخري
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="stopping_from_work_for" value="stopping_from_work_for" id="flexCheckDefaulte6" {{ old('stopping_from_work_for') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte6">
                    ايقاف عن العمل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="stopping_the_yearly_increase" value="stopping_the_yearly_increase" id="flexCheckDefaulte7" {{ old('stopping_the_yearly_increase') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte7">
                     الحرمان من الزيادة السنوية
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="firing_with_a_bying" value="firing_with_a_bying" id="flexCheckDefaulte8" {{ old('firing_with_a_bying') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte8">
                    فصل من الخدمة مع التعويض
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="firing_without_a_bying" value="firing_without_a_bying" id="flexCheckDefaulte9" {{ old('firing_without_a_bying') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte9">
                      فصل من الخدمة بدون تعويض
                </label>
            </div>
        </div>
