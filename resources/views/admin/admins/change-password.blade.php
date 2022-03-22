        
        
        <form class="card" action="{{url(route('admins/change-password', auth()->guard('admin')->user()->id))}}" method="post" enctype="multipart/form-data">
            @include('flash::message')    
            @csrf
            <div class="digital-add needs-validation">
                <div class="form-group">
                    <label for="validationCustom02" class="col-form-label"><span>*</span> كلمة السر القديمة</label>
                    <input class="form-control" id="validationCustom02" name="old_password" type="password" required="">
                    @error('old_password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="validationCustom02" class="col-form-label"><span>*</span> كلمه السر</label>
                    <input class="form-control" id="validationCustom02" name="password" type="password" required="">
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="validationCustom02" class="col-form-label"><span>*</span> تاكيد كلمه السر</label>
                    <input class="form-control" id="validationCustom02" name="password_confirmation" type="password" required="">
                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-primary" type="submit">تعديل</button>
                </div>
            </div>
        </form>