    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaledit-{{ $administration->id }}">
        <i class="fas fa-edit" style="color:white;"></i>
    </button>
    <div class="modal fade" id="myModaledit-{{ $administration->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">تعديل</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body mt-3">
                    <form class="card" action="{{url(route('admin/administration/update', $administration->id ))}}" method="post">
                        @include('flash::message')
                        @csrf
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>  اسم الادارة </label>
                                <input class="form-control" id="validationCustom01" name="name_administration" value="{{ $administration->name_administration }}" type="text" required="">
                                @error('car_type')
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
    
