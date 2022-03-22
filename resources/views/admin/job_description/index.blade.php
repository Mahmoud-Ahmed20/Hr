@extends('layouts.admin.home')
@section('css')
    <style>
        .dataTables_paginate,
        .dataTables_info {
            display: none;
        }
        .modal-dialog {
            max-width: 70vw!important;
        }

    </style>
@endsection
<!-- title page -->
@section('title')
    Multikart - Premium Admin Template
@endsection

@section('content')
    <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>وصف وظيفي</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">لوحه التحكم</li>
                            <li class="breadcrumb-item active">قائمة وصف وظيفي</li>
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
                            <h5>قائمة وصف وظيفي</h5>
                        </div>
                        <div class="card-body">
                            <!-- start poper add admin -->

                            <div class="btn-popup pull-right">
                                <button type="button" class="btn btn-primary">
                                    <a href="{{route('admin/job_description/export/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                        <i class="fas fa-file-excel"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <a href="{{route('admin/job_description/export/pdf',$inputs)}}" style="text-decoration:none;color:white;">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                </button>
                            <a class="btn btn-primary" href="{{url(route('admin/job_description/create'))}}">اضافه وصف وظيفي</a>
                            </div>
                            <!-- end poper add admin -->
                            <div class="btn-popup pull-right mr-1">
                                    <!---filter ---->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModalExportPDF">
                                        <i class="fas fa-filter"></i>
                                    </button>
                                    <div class="modal fade" id="myModalExportPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title f-w-600" id="exampleModalLabel">PDF تصدير</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" id='form' action="{{url(route('admin/job_description/index'))}}" class="" >
                                                        <input name="_method" type="hidden">
                                                        {{ csrf_field() }}
                                                        @include('admin.job_description.inputsCheck')
                                                        <div class="modal-footer">
                                                            <button class="btn btn-primary" type="submit">تاكيد</button>
                                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--- end filter ---->
                            </div>



                            @isset($job_description)
                                <br><br>
                                @include('flash::message')
                               <div class="card-body vendor-table">
                            <table  class="display" id="basic-1">

                                <thead>
                                    <tr>
                                        @include('admin.job_description.headertable')
                                    </tr>
                                </thead>
                                <tbody id="jobOfferRecords">
                                @foreach($job_description as $one_job_description)

                                        <tr>
                                                    <!-- foreach data -->
                                                    @include('admin.job_description.foreachdata')
                                                    <!-- end foreach data -->
                                            <td>
                                                <!-- activate row -->
                                                {{-- @include('admin.jobOfferSpecification.activate') --}}
                                                <!-- end activate row -->

                                                <!-- delete row -->
                                                @include('admin.job_description.delete')
                                                <!-- end delete row -->

                                                <!-- edit row -->
                                                <button class="btn btn-warning btn-xs" type="button">
                                                    <a href="{{route('admin/job_description/edit', $one_job_description->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                </button>
                                                <!-- end edit row -->

                                                <!--  print row -->
                                                {{-- <button class="btn btn-primary btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/jobOfferSpecification/print' , $one_job_description->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </button> --}}
                                                <!-- end print row -->

                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\JobOfferSpecification::deleteArchive()->count()}}</span> entries
                            </div>
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
        let dataLen = @json($job_description);
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
                        url: "{{ route('admin/job_description/getMore') }}",
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


                                                <td>${data[i].staff.name}</td>
                                                <td>${data[i].job_title}</td>
                                                <td>${data[i].section.name}</td>
                                                <td>${data[i].administration.name_administration}</td>

                                                            <td>

                                                                <!-- activate row -->

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
  <!-- show row -->
  <button class="btn btn-primary btn-xs mt-1" type="button">
                                                                    <a href="${data[i].urlRoutePrint}" style="text-decoration:none;color:white;">
                                                                        <i class="fas fa-print"></i>
                                                                    </a>
                                                                </button>
                                                                <button class="btn btn-warning mt-1 btn-xs" type="button">
                                                                    <a href="edit/${data[i].id}" style="text-decoration:none;color:white;">
                                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                                    </a>
                                                                </button>
                                                            <!-- end show row -->
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
                                document.getElementById("employeRecords").innerHTML += records
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
      <script>
        $(document).ready(function(){
            $("#form #select-all").click(function(){
                $("#form input[type='checkbox']").prop('checked',this.checked);
            });
        });
    </script>
@endsection
