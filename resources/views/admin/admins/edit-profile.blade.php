    
    
    <form class="card" action="{{url(route('admins/info-update', auth()->guard('admin')->user()->id))}}" method="post" enctype="multipart/form-data">
        @include('flash::message')    
        @csrf
        <div class="digital-add needs-validation">
            <div class="form-group">
                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> الاسم</label>
                <input class="form-control" value="{{$admin->name}}" id="validationCustom01" name="name" type="text" required="">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> الايميل</label>
                <input class="form-control" value="{{$admin->email}}" id="validationCustomtitle" name="email" type="email" required="">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="validationCustom02" class="col-form-label"><span>*</span> الهاتف</label>
                <input class="form-control" value="{{$admin->phone}}" id="validationCustom02" name="phone" type="number" required="">
                @error('phone')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="validationCustom02" class="col-form-label">رفع صوره</label>
                <input name="photo" type="file" class="form-control" id="inputGroupFile02">
            </div>
            <div class="form-group mt-4">
                <button class="btn btn-primary" type="submit">تعديل</button>
            </div>
        </div>
    </form>