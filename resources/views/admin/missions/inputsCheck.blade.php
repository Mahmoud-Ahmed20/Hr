        <div class="row text-center">
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="select-all" id="select-all" value="select-all" id="flexCheckDefaultd" {{ old('select-all') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultd">
                    تحديد الكل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="direction_of_the_mission" value="direction_of_the_mission" id="flexCheckDefaultd" {{ old('direction_of_the_mission') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultd">
                    جهة مهمة العمل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="duration_of_mission" value="duration_of_mission" id="flexCheckDefaultg" {{ old('duration_of_mission') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultg">
                     المدة
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="date_from" value="date_from" id="flexCheckDefaultg" {{ old('date_from') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaultg">
                    اعتبار من
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="date_to" value="date_to" id="flexCheckDefaulte1" {{ old('date_to') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte1">
                     اعتبار الي
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="mission_specification" value="mission_specification" id="flexCheckDefaulte2" {{ old('mission_specification') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte2">
                     بيان مهمة العمل
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="expense_advance" value="expense_advance" id="flexCheckDefaulte3" {{ old('expense_advance') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte3">
                       سلفة مصاريف بمبلغ
                </label>
            </div>
            <div class="col-lg-4">
                <input class="form-check-input" type="checkbox" name="ticket" value="ticket" id="flexCheckDefaulte4" {{ old('ticket') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefaulte4">
                      تذكرة سفر خط سير
                </label>
            </div>
        </div>
