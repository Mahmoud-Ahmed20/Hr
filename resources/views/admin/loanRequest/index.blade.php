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
                    <h3> طلابات السلفة</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active"> طلبات السلفة </li>
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
                    <h5> طلب سلفة </h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->

                    <div class="btn-popup pull-right">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/loanrequests/create')}}" style="text-decoration:none;color:white;">
                                اضافه طلب سلفه
                            </a>
                        </button>
                    </div>
                    <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/loanrequests/excel')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/loanrequests/pdf')}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>

                    </div>

                    <!-- end poper add admin -->
                    @isset($LoanRequests)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table  class="display" id="basic-1">

                                <thead>
                                    <tr>

                                        <th>الاسم</th>
                                        <th>الراتب الاساسي</th>
                                        <th>قيمة السلفه</th>
                                        <th>المدير المباشر</th>
                                        <th>شؤون الموظفين</th>
                                        <th>قسم المحاسبة</th>
                                        <th>العمليات</th>

                                    </tr>
                                </thead>
                                <tbody id="loanRequestsRecords">
                                @foreach($LoanRequests as $LoanRequest)

                                        <tr>


                                            <td>{{optional($LoanRequest->staff)->name}}</td>
                                            <td>{{$LoanRequest->basic_salary}}</td>
                                            <td>{{$LoanRequest->advance_value}}</td>
                                            <td>{{$LoanRequest->direct_manager == 1 ? "موافق" : "غير موافق"}}</td>
                                            <td>{{$LoanRequest->hr == 1 ? "موافق" : "غير موافق"}}</td>
                                            <td>{{$LoanRequest->the_accountant == 1 ? "موافق" : "غير موافق"}}</td>
                                            <td>

                                                <!-- activate row -->
                                                @include('admin.loanRequest.activate')
                                                <!-- end activate row -->

                                                <!-- edit row -->
                                                <button class="btn btn-warning btn-xs" type="button">
                                                    <a href="{{route('admin/loanrequests/edit', $LoanRequest->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                </button>
                                                <!-- end edit row -->

                                                <!-- delete row -->
                                                @include('admin.loanRequest.delete')
                                                <!-- end delete row -->

                                                <!-- show row -->
                                                <button class="btn btn-primary btn-xs" type="button">
                                                    <a href="{{route('admin/loanRequests/print', $LoanRequest->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </button>
                                                <!-- end show row -->

                                            </td>


                                        </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\LoanRequests::count()}}</span> entries
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
        let dataLen = @json($LoanRequests);
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
                        url: "{{ route('admin/loanrequests/getMore') }}",
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
                                                        <td>${data[i].name}</td>
                                                        <td>${data[i].basic_salary}</td>
                                                        <td>${data[i].advance_value}</td>
                                                        <td>${data[i].direct_manager == 1 ? "موافق" : "غير موافق"}</td>
                                                        <td>${data[i].hr == 1 ? "موافق" : "غير موافق"}</td>
                                                        <td>${data[i].the_accountant == 1 ? "موافق" : "غير موافق"}</td>
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
                                                                <button class="btn btn-warning btn-xs" type="button">
                                                                    <a href="${data[i].urlRouteEdit}" style="text-decoration:none;color:white;">
                                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                                    </a>
                                                                </button>
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

                                                            <!--  print row -->
                                                                    <button class="btn btn-primary btn-xs mt-1" type="button">
                                                                        <a href="${data[i].urlRoutePrint}" style="text-decoration:none;color:white;">
                                                                            <i class="fas fa-print"></i>
                                                                        </a>
                                                                    </button>
                                                            <!-- end print row -->

                                                        </td>
                                                    </tr>
                                                `
                                }
                                let btnData = `<button type="button" name="load_more_button" class="w-auto btn btn-info form-control px-5" data-id=${lastId} id="load_more_button">عرض المزيد</button>`
                                document.getElementById("loanRequestsRecords").innerHTML += records
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
        });
    </script>
@endsection
