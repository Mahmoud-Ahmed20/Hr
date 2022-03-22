
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaldelete-{{ $one_work_certific->id}}">
        <i class="fas fa-trash-alt"></i>
    </button>
    <div class="modal fade" id="myModaldelete-{{ $one_work_certific->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد الحذف</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{url(route('admin/work_certific/delete',$one_work_certific->id))}}" class="" >
                        <input name="_method" type="hidden">
                        {{ csrf_field() }}
                        <p>هل انت متاكد من حذف هذه البيانات ؟</p>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">تاكيد</button>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
