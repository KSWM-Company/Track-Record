@extends('layouts.admin')
@section('content')
@include('loading.loading')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Customers
                </h2>
                <button class="btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1" tabindex="0" aria-controls="dt-basic-example" type="button" title="Generate PDF"><span>PDF</span></button>
                <button class="btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1" tabindex="0" aria-controls="dt-basic-example" type="button" title="Generate Excel"><span>Excel</span></button>
                <button class="btn buttons-csv buttons-html5 btn-outline-primary btn-sm mr-1" tabindex="0" aria-controls="dt-basic-example" type="button" title="Generate CSV"><span>CSV</span></button>
            </div>
            {!! Toastr::message() !!}
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="table-responsive">
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline">
                            <thead class="table table-bordered table-hover table-striped w-100">
                                <tr>
                                    <th>@lang('lang.customer_no')</th>
                                    <th>@lang('lang.branch')</th>
                                    <th>@lang('lang.customer_name')</th>
                                    <th>@lang('lang.business_name')</th>
                                    <th>@lang('lang.email')</th>
                                    <th>@lang('lang.fee')</th>
                                    <th>@lang('lang.vat_amount')</th>
                                    <th>@lang('lang.total_fee')</th>
                                    <th>@lang('lang.collection_date')</th>
                                    <th>@lang('lang.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td><a href="{{url('admins/customer/detail',$item->id)}}">{{$item->customer_no}}</a></td>
                                        <td>{{$item->BranchName}}</td>
                                        <td><a href="{{url('admins/customer/detail',$item->id)}}">{{$item->customer_name}}</a></td>
                                        <td>{{$item->business_name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{number_format($item->fee)}}%</td>
                                        <td>{{number_format($item->vat_amount,2)}}</td>
                                        <td>{{number_format($item->total_fee,2)}}</td>
                                        <td>{{$item->CusCollectionDate}}</td>
                                        <td rowspan="1" colspan="1">
                                            <div class='dropdown d-inline-block'>
                                                <a href='#' class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                    <i class="fal fa-ellipsis-v"></i>
                                                </a>
                                                <div class='dropdown-menu'>
                                                    <a href="{{url('admins/customer/detail',$item->id)}}" class="dropdown-item  border-success bg-transparent text-success">
                                                        <span><i class="fal fa-show"></i> @lang('lang.show')</span>
                                                    </a>
                                                    <a href="{{url('admins/agreement',$item->id)}}" target="_blank" class="dropdown-item  border-success bg-transparent text-success">
                                                        <span><i class="fal fa-show"></i> @lang('lang.agreement')</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>@lang('lang.customer_no')</th>
                                    <th>@lang('lang.branch')</th>
                                    <th>@lang('lang.customer_name')</th>
                                    <th>@lang('lang.business_name')</th>
                                    <th>@lang('lang.email')</th>
                                    <th>@lang('lang.fee')</th>
                                    <th>@lang('lang.vat_amount')</th>
                                    <th>@lang('lang.total_fee')</th>
                                    <th>@lang('lang.collection_date')</th>
                                    <th>@lang('lang.action')</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    const deleteData = (id)=>{
        Swal.fire({
            title: "@lang('lang.are_you_sure')",
            text: "@lang('lang.are_you_sure_want_to_delete')",
            type: "warning",
            showCancelButton: `@lang('lang.cancel')`,
            confirmButtonText: `@lang('lang.deleted')`,
        }).then(function(result)
        {
            if (result.value)
            {
                $.ajax({
                    type: "DELETE",
                    url: `{{url('admins/customer/${id}')}}`,
                    success: function (respond) {
                        if (respond.mg == "success") {
                            Swal.fire("Deleted!", "Your file has been deleted.","success");
                            window.location.reload();
                        }
                    }
                });
            }
        });
    }
</script>
@endsection
