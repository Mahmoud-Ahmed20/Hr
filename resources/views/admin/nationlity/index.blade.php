@extends('layouts.admin.home')


@section('content')
<style>
    .dataTables_paginate,
    .dataTables_info {
        display: none;
    }
    .dataTables_paginate,
    .dataTables_info, .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter {
        display: none;
    }
    .search_input {
        display: flex;
        align-items: center;
    }
    .search_input input {
        width: auto;
        margin-inline-start: 10px;
    }
</style>

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>الجنسيات</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active"> الجنسيات </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row product-adding">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5> الجنسيات </h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->

                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">اضافه جنسيه</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافه جنسيه</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="card" action="{{ url(route('admin/nationality/store')) }}" method="post" >
                                            @csrf
                                            <div class="digital-add needs-validation">
                                                <div class="form-group">
                                                    <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>  اسم الجنسيه </label>
                                                    <input class="form-control" id="validationCustom01" name="name_nationality" value="{{ old('name_nationality') }}" type="text" required="">
                                                    @error('name_nationality')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mt-4">
                                                    <button class="btn btn-primary" type="submit">اضافه</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button class="btn btn-primary" type="button">Save</button>
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/nationalities/export/excel')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/nationalities/export/pdf')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>
                    </div>
                    <div class="search_input">
                        <label for="search">Search : </label>
                        <input type="text" class="form-control" id="data_search">
                    </div>
                    <!-- end poper add admin -->
                    @isset($nationalitys)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table  class="display" id="basic-1">

                                <thead>
                                    <tr>

                                        <th>الاسم</th>
                                        <th>العمليات</th>

                                    </tr>
                                </thead>
                                <tbody id="nationalityRecords">
                                @foreach($nationalitys as $nationality)
                                        <tr>
                                            <td>{{$nationality->name_nationality}}</td>
                                            <td>

                                                <!-- activate row -->
                                                @include('admin.nationlity.activate')
                                                <!-- end activate row -->

                                                <!-- edit row -->
                                                @include('admin.nationlity.edit')
                                                <!-- end edit row -->
                                                
                                                <!-- delete row -->
                                                @include('admin.nationlity.delete')
                                                <!-- end delete row -->

                                                <!-- show row -->
                                                {{-- <button class="btn btn-primary btn-xs" type="button">
                                                    <a href="{{route('admin/employees/print', $administration->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </button> --}}
                                                <!-- end show row -->

                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\Nationality::deleteArchive()->count()}}</span> entries
                            </div>
                            <div class="ltn__pagination-area text-center mt-5">
                                <div class="ltn__pagination">
                                    <div id="load_more">
                                        <button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id="'.$last_id.'" id="load_more_button">عرض المزيد</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@section('script')
    <script>
        let dataLen = @json($nationalitys);
        let showItems = document.getElementById("showItems")
        showItems.innerHTML = dataLen.data.length
        let length = dataLen.data.length
        console.log('showItems', Number(showItems.innerHTML));
        $(document).ready(function() {

            $(document).on('click', '#load_more_button', function() {
                let records = ``
                var _token = $('input[name="_token"]').val();
                var id = $(this).attr('data-id');
                let lastId = ''
                $('#load_more_button').html('<b>... جاري التحميل</b>');
                load_data(id, _token);

                function load_data(id = "", _token) {
                    $.ajax({
                        url: "{{ route('admin/nationality/getMore') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                for (let i = 0; i < data.length; i++) {
                                    lastId = data[i].id
                                    records +=
                                                `
                                                    <tr>
                                                        <td>${data[i].name_nationality}</td>
                                                        <td>
                                                            <!-- activate row -->
                                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-original-title="test"  data-bs-target="#myModalactivate-${data[i].id}">
                                                                    ${ data[i].is_activate == 1 ?' <i class="fas fa-lock-open"></i>' : '<i class="fas fa-lock"></i>' }
                                                                </button>
                                                                <div class="modal fade" id="myModalactivate-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد العمليه</h5>
                                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form role="form" action="${data[i].urlRouteActivate}" class="" >
                                                                                    <input name="_method" type="hidden">
                                                                                    {{ csrf_field() }}
                                                                                    <p>هل انت متاكد من تعديل هذه البيانات ؟</p>
                                                                                    <div class="modal-footer">
                                                                                        <button class="btn btn-primary" type="submit">تاكيد</button>
                                                                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <!-- end activate row -->

                                                            <!-- edit row -->
                                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaledit-${data[i].id}">
                                                                    <i class="fas fa-edit" style="color:white;"></i>
                                                                </button>
                                                                <div class="modal fade" id="myModaledit-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">تعديل</h5>
                                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                            </div>
                                                                            <div class="modal-body mt-3">
                                                                                <form class="card" action="${data[i].urlRouteUpdate}" method="post">
                                                                                    @include('flash::message')
                                                                                    @csrf
                                                                                    <div class="digital-add needs-validation">
                                                                                        <div class="form-group">
                                                                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>  اسم الادارة </label>
                                                                                            <input class="form-control" id="validationCustom01" name="name_nationality" value="${data[i].name_nationality}" type="text" required="">
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
                                                            <!-- end edit row -->

                                                            <!-- delete row -->
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaldelete-${data[i].id}">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                                <div class="modal fade" id="myModaldelete-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد الحذف</h5>
                                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form role="form" action="${data[i].urlRouteDelete}" class="" >
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
                                                            <!-- end delete row -->
                                                        </td>
                                                    </tr>
                                                `
                                }
                                let btnData = `<button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id=${lastId} id="load_more_button">عرض المزيد</button>`
                                document.getElementById("nationalityRecords").innerHTML += records
                                length += data.length
                                showItems.innerHTML = Number(length)
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnData
                            } else if (data.length === 0) {
                                let btnNoData = `<button type="button" name="load_more_button" class="w-auto btn btn-primary form-control px-5">لا يوجد بيانات اخري</button>`
                                $('#load_more_button').remove();
                                document.getElementById("load_more").innerHTML = btnNoData
                            }
                        }
                    })
                }
            });

            $(document).on('keyup', '#data_search', function(){
                var query = $(this).val();
                var _token = $('input[name="_token"]').val();
                let records = ``
                event.preventDefault();
                $.ajax({
                    url:"{{ route('admin/nationalities/search') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success:function(data){
                        if (data.length > 0) {
                            for (let i = 0; i < data.length; i++) {
                                if(data[i].searchButton == 1){
                                    printSearchButton = 1;
                                }else{
                                    printSearchButton = 0;
                                }
                                records +=
                                            `
                                                <tr>
                                                    <td>${data[i].name_nationality}</td>
                                                    <td>
                                                        <!-- activate row -->
                                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-original-title="test"  data-bs-target="#myModalactivate-${data[i].id}">
                                                                ${ data[i].is_activate == 1 ?' <i class="fas fa-lock-open"></i>' : '<i class="fas fa-lock"></i>' }
                                                            </button>
                                                            <div class="modal fade" id="myModalactivate-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد العمليه</h5>
                                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" action="${data[i].urlRouteActivate}" class="" >
                                                                                <input name="_method" type="hidden">
                                                                                {{ csrf_field() }}
                                                                                <p>هل انت متاكد من تعديل هذه البيانات ؟</p>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn btn-primary" type="submit">تاكيد</button>
                                                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!-- end activate row -->

                                                        <!-- edit row -->
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaledit-${data[i].id}">
                                                                <i class="fas fa-edit" style="color:white;"></i>
                                                            </button>
                                                            <div class="modal fade" id="myModaledit-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">تعديل</h5>
                                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                        </div>
                                                                        <div class="modal-body mt-3">
                                                                            <form class="card" action="${data[i].urlRouteUpdate}" method="post">
                                                                                @include('flash::message')
                                                                                @csrf
                                                                                <div class="digital-add needs-validation">
                                                                                    <div class="form-group">
                                                                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>  اسم الادارة </label>
                                                                                        <input class="form-control" id="validationCustom01" name="name_nationality" value="${data[i].name_nationality}" type="text" required="">
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
                                                        <!-- end edit row -->

                                                        <!-- delete row -->
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModaldelete-${data[i].id}">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                            <div class="modal fade" id="myModaldelete-${data[i].id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title f-w-600" id="exampleModalLabel">تاكيد الحذف</h5>
                                                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form role="form" action="${data[i].urlRouteDelete}" class="" >
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
                                                        <!-- end delete row -->
                                                    </td>
                                                </tr>
                                            `
                            }
                            document.getElementById("nationalityRecords").style.display = null
                            document.getElementById("nationalityRecords").innerHTML = records
                            $('#load_more_button').remove();
                            $('#load_more_button_remove').remove();
                            if(printSearchButton == 1){
                                let btnData = `<button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id='.$last_id.' id="load_more_button">Get More</button>`
                                document.getElementById("load_more").innerHTML = btnData
                            }
                            length = data.length
                            showItems.innerHTML = Number(length)
                        } else if (data.length === 0) {
                            $('#load_more_button').remove();
                            length = data.length
                            showItems.innerHTML = Number(length)
                            document.getElementById("nationalityRecords").style.display = 'none'
                            let btnNoData = `<button type="button" name="load_more_button" class="w-auto btn btn-primary form-control px-5" id="load_more_button_remove">Not Found Data</button>`
                            document.getElementById("load_more").innerHTML = btnNoData
                        }
                    }
                })
            });

        });
    </script>
@endsection
