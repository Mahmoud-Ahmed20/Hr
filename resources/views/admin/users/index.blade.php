@extends('layouts.admin.home')

<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection

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
                            <h3>المستخدمين</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">لوحه التحكم</li>
                            <li class="breadcrumb-item active">قائمه المستخدمين</li>
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
                            <h5>قائمه المستخدمين</h5>
                        </div>
                        <div class="card-body">
                            <!-- start poper add admin -->
                            <div class="btn-popup pull-right">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">اضافه مستخدم</button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافه مستخدم</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="card" action="{{url(route('admin/users/store'))}}" method="post" >
                                                    @csrf
                                                    <div class="digital-add needs-validation">
                                                        <div class="form-group">
                                                            <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>الاسم</label>
                                                            <input class="form-control" id="validationCustom01" name="name" value="{{ old('name') }}" type="text" required="">
                                                            @error('name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="validationCustom0144" class="col-form-label pt-0"><span>*</span>رقم الهاتف</label>
                                                            <input class="form-control" id="validationCustom0144" name="phone" value="{{ old('phone') }}" type="text" required="">
                                                            @error('phone')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span> الايميل</label>
                                                            <input class="form-control" id="validationCustomtitle" name="email" value="{{ old('email') }}" type="email" required="">
                                                            @error('email')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="validationCustom02" class="col-form-label"><span>*</span> كلمه السر</label>
                                                            <input class="form-control" id="validationCustom02" name="password" value="{{ old('password') }}" type="password" required="">
                                                            @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="validationCustom02" class="col-form-label"><span>*</span> تاكيد كلمه السر</label>
                                                            <input class="form-control" id="validationCustom02" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" required="">
                                                            @error('password_confirmation')
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
                            <!-- end poper add admin -->
                            <div class="btn-popup pull-right mr-1">
                                <button type="button" class="btn btn-primary">
                                    <a href="{{route('admin/users/export/excel')}}" style="text-decoration:none;color:white;">
                                        <i class="fas fa-file-excel"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <a href="{{route('admin/users/export/pdf')}}" style="text-decoration:none;color:white;">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </button>
                            </div>
                            <div class="search_input">
                                <label for="search">Search : </label>
                                <input type="text" class="form-control" id="data_search">
                            </div>
                            @isset($users)
                                <br><br>
                                @include('flash::message')
                                <div class="card-body vendor-table">
                                    <table  class="display" id="basic-1">

                                        <thead>
                                            <tr>
                                                <th>الايميل</th>
                                                <th>الهاتف</th>
                                                <th>الاسم</th>
                                                <th>الاجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="userRecords">
                                            {{ csrf_field() }}
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>

                                                        <!-- activate row -->
                                                        @include('admin.users.activate')
                                                        <!-- end activate row -->

                                                        <!-- delete row -->
                                                        @include('admin.users.delete')
                                                        <!-- end delete row -->

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                        Showing 1 to <span id="showItems"></span> of <span>{{App\Models\User::notArchive()->count()}}</span> entries
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
        let dataLen = @json($users);
        let showItems = document.getElementById("showItems")
        showItems.innerHTML = dataLen.data.length
        let length = dataLen.data.length
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
                        url: "{{ route('admin/users/getMore') }}",
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
                                                            <td>${data[i].email}</td>
                                                            <td>${data[i].phone}</td>
                                                            <td>${data[i].name}</td>
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
                                document.getElementById("userRecords").innerHTML += records
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
                    url:"{{ route('admin/users/search') }}",
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
                                                    <td>${data[i].email}</td>
                                                    <td>${data[i].phone}</td>
                                                    <td>${data[i].name}</td>
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
                            document.getElementById("userRecords").style.display = null
                            document.getElementById("userRecords").innerHTML = records
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
                            document.getElementById("userRecords").style.display = 'none'
                            let btnNoData = `<button type="button" name="load_more_button" class="w-auto btn btn-primary form-control px-5" id="load_more_button_remove">Not Found Data</button>`
                            document.getElementById("load_more").innerHTML = btnNoData
                        }
                    }
                })
            });
        });
    </script>
@endsection
