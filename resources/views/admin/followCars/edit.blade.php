    <button type="button" class="btn btn-warning mt-1" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaledit-{{ $car->id }}">
        <i class="fas fa-edit" style="color:white;"></i>
    </button>
    <div class="modal fade" id="myModaledit-{{ $car->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">تعديل</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body mt-3">
                    <form class="card" action="{{url(route('admin/followCars/update', $car->id ))}}" method="post" enctype="multipart/form-data">
                        @include('flash::message')
                        @csrf
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> نوع السياره </label>
                                <input class="form-control" id="validationCustom01" name="car_type" value="{{ $car->car_type }}" type="text" required="">
                                @error('car_type')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> رقم اللوحه </label>
                                <input class="form-control" id="validationCustomtitle" name="plate_number" value="{{ $car->plate_number }}" type="text" required="">
                                @error('plate_number')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validationCustom021" class="col-form-label"><span>*</span> اللون </label>
                                <input class="form-control" id="validationCustom021" name="color" value="{{ $car->color }}" type="text" required="">
                                @error('color')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validationCustom022" class="col-form-label"><span>*</span> الموديل </label>
                                <input class="form-control" id="validationCustom022" name="model" value="{{ $car->model }}" type="text" required="">
                                @error('model')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validationCustom023" class="col-form-label"><span>*</span> اسم المالك </label>
                                <input class="form-control" id="validationCustom023" name="owner_name" value="{{ $car->owner_name }}" type="text" required="">
                                @error('owner_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validationCustom0221" class="col-form-label"><span>*</span> تاريخ انتهاء الرخصه </label>
                                <input class="form-control" id="validationCustom0221" name="license_expiration" value="{{ $car->license_expiration }}" type="date" autocomplete="off" required="">
                                @error('license_expiration')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validationCustom0222" class="col-form-label"><span>*</span> تاريخ انتهاء التامين </label>
                                <input class="form-control" id="validationCustom0222" name="insurance_expiry" value="{{ $car->insurance_expiry }}" type="date" autocomplete="off" required="">
                                @error('insurance_expiry')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="validationCustom0223" class="col-form-label"><span>*</span> تاريخ انتهاء تفويض القياده </label>
                                <input class="form-control" id="validationCustom0223" name="driving_auth_expiry_1" value="{{ $car->driving_auth_expiry_1 }}" type="date" autocomplete="off" required="">
                                @error('driving_auth_expiry_1')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="validationCustom0223" class="col-form-label"><span>*</span> اسم سائق السياره </label>
                                <input class="form-control" id="validationCustom0223" name="driver_name" value="{{ $car->driver_name }}" type="text" required="">
                                @error('driver_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-primary" type="submit">تعديل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
