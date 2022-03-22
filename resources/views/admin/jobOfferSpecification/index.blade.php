@extends('layouts.admin.home')


@section('css')
<style>
    * {
      box-sizing: border-box;
    }
    .modal-dialog table td,
        .modal-dialog table th {
          border: 3px double #222;
          padding: 3px 5px;
          font-size: 20px;
          font-weight: 600;
        }
        .modal-dialog {
            max-width: 70vw!important;
        }
    .outer__border {
      border: 5px solid #222;
      padding: 2px;
      margin-bottom: 5px;
    }
    .outer__border > div {
      border: 1px solid #222;
      padding: 5px 0;
    }
    table {
      width: 100%;
      border-spacing: 0;
    }
    /* table td,
    table th {
      border: 3px double #222;
      padding: 3px 5px;
      font-size: 20px;
      font-weight: 600;
      text-align: initial;
    } */
    .flex__td {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    table input, table textarea {
      width: 100%;
      margin: auto;
      padding: 5px;
      display: block;
    }
    .header__logo {
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }
    .header__logo h1 {
      margin: 0 0 15px 0;
    }
    .header__logo img {
      max-width: 100%;
    }
    .header__logo span {
      display: block;
      font-size: 22px;
      font-weight: 500;
    }
    .page__footer {
      text-align: center;
      margin-top: 20px;
      padding-top: 30px;
      border-top: 2px solid #222;
      direction: ltr;
    }

    .page__footer p {
      font-size: 16px;
      margin: 0;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .page__footer p img {
      margin: 0 3px;
    }

    .page__footer p span {
      display: inline-block;
      width: 18px;
      height: 18px;
      background-color: #149adb;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 3px;
    }

    .page__footer p span img {
      width: 80%;
    }
    .true{
        display: flex;
    }
  </style>
@endsection


@section('content')

<style>
    .dataTables_paginate,
    .dataTables_info {
        display: none;
    }
</style>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3> تفاصيل  </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item active">لوحه التحكم</li>
                    <li class="breadcrumb-item active"> تفاصيل عرض العمل  </li>
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
                    <h5> عرض العمل  </h5>
                </div>
                <div class="card-body">
                    <!-- start poper add admin -->
                    <div class="btn-popup pull-right mr-1">
                        <a href="{{ route('admin/jobOfferSpecification/create') }}">
                            <button class="btn btn-primary"> اضافة عرض </button>
                        </a>
                    </div>
                    <div class="btn-popup pull-right mr-1">
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/jobOfferSpecification/excel',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-excel"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <a href="{{route('admin/jobOfferSpecification/export/pdf',$inputs)}}" style="text-decoration:none;color:white;">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </button>


                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-original-title="test" data-bs-target="#myModalExportPDF">
                            <i class="fas fa-filter"></i>
                        </button>
                        <div class="modal fade" id="myModalExportPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel"></h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" id="form" action="{{url(route('admin/jobOfferSpecification/index'))}}" class="" >
                                            <input name="_method" type="hidden">
                                            {{ csrf_field() }}

                                            @include('admin.jobOfferSpecification.inputsCheck')

                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="submit">تاكيد</button>
                                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">الغاء</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>












                    </div>
                    <!-- end poper add admin -->
                    @isset($jobOffers)
                        <br><br>
                        @include('flash::message')
                        <div class="card-body vendor-table">
                            <table  class="display" id="basic-1">

                                <thead>
                                    <tr>
                                        @include('admin.jobOfferSpecification.headertable')
                                    </tr>
                                </thead>
                                <tbody id="jobOfferRecords">
                                @foreach($jobOffers as $jobOffer)

                                        <tr>
                                                    <!-- foreach data -->
                                                    @include('admin.jobOfferSpecification.foreachdata')
                                                    <!-- end foreach data -->
                                            <td>
                                                <!-- activate row -->
                                                @include('admin.jobOfferSpecification.activate')
                                                <!-- end activate row -->

                                                <!-- delete row -->
                                                @include('admin.jobOfferSpecification.delete')
                                                <!-- end delete row -->

                                                <!-- edit row -->
                                                <button class="btn btn-warning btn-xs" type="button">
                                                    <a href="{{route('admin/jobOfferSpecification/edit', $jobOffer->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-edit" style="color:white;"></i>
                                                    </a>
                                                </button>
                                                <!-- end edit row -->

                                                <!--  print row -->
                                                <button class="btn btn-primary btn-xs mt-1" type="button">
                                                    <a href="{{route('admin/jobOfferSpecification/print' , $jobOffer->id)}}" style="text-decoration:none;color:white;">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </button>
                                                <!-- end print row -->

                                            </td>


                                        </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div style="margin-top: 20px; font-weight: 600; font-size: 16px;">
                                Showing 1 to <span id="showItems"></span> of <span>{{App\Models\JobOfferSpecification::deleteArchive()->count()}}</span> entries
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
        let dataLen = @json($jobOffers);
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
                        url: "{{ route('admin/jobOfferSpecification/getMore') }}",
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
                                                            <td>${data[i].jobOfferSpecifincation}</td>
                                                            <td>${data[i].nationality}</td>
                                                            <td>${data[i].administration}</td>
                                                            <td>${data[i].branch}</td>
                                                            <td>${data[i].qualification}</td>
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

                                                                <!-- edit row -->
                                                                                <button class="btn btn-warning btn-xs" type="button">
                                                                                <a href="${data[i].urlRouteUpdate}, ${data[i].id}" style="text-decoration:none;color:white;">
                                                                                    <i class="fas fa-edit" style="color:white;"></i>
                                                                                </a>
                                                                                </button>
                                                                <!-- end edit row -->
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
                                document.getElementById("jobOfferRecords").innerHTML += records
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
