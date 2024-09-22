@extends('layouts.admin')
@section('content')
    <ul class="nav nav-pills" role="tablist">
        <li class="nav-item"><a class="nav-link active tab-tables" data-toggle="tab" data-permiss="1" href="#tab_request">@lang('lang.request')</a></li>
        <li class="nav-item"><a class="nav-link tab-tables" data-toggle="tab" data-permiss="2" href="#tab_approve">@lang('lang.approve')</a></li>
    </ul>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Customers Chang Request <span class="fw-300"><i>Table</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <a href="{{url('admins/customer/chang/request/create')}}" class="btn btn-outline-success btn-sm mr-1"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="">
                            <div class="tab-content py-3">
                                <div class="tab-pane fade active show" id="tab_request" role="tabpanel">
                                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                        <thead class="table table-bordered table-hover table-striped w-100">
                                            <tr>
                                                <th>#</th>
                                                <th>@lang('lang.request_by')</th>
                                                <th>@lang('lang.request_date')</th>
                                                <th>@lang('lang.reson')</th>
                                                <th>@lang('lang.customer_name')</th>
                                                <th>@lang('lang.business_name')</th>
                                                <th>@lang('lang.fee')</th>
                                                <th>@lang('lang.vat_amount')</th>
                                                <th>@lang('lang.total_fee')</th>
                                                <th>@lang('lang.status')</th>
                                                <th>@lang('lang.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataRequest as $key=>$item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td><a href="{{url('admins/customer/change/request/detail',$item->id)}}">{{$item->request_by}}</a></td>
                                                    <td>{{Carbon\Carbon::parse($item->request_date)->format('d-M-Y')}}</td>
                                                    <td><a href="{{url('admins/customer/change/request/detail',$item->id)}}">{{$item->reson}}</a></td>
                                                    <td>{{$item->customer_name}}</td>
                                                    <td>{{$item->business_name}}</td>
                                                    <td>{{number_format($item->fee)}}%</td>
                                                    <td>{{number_format($item->vat_amount)}} {{$item->currency}}</td>
                                                    <td>{{number_format($item->total_fee)}} {{$item->currency}}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-success btn-sm btn-pills waves-effect waves-themed dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{$item->status}}
                                                            </button>
                                                            <div class="dropdown-menu dropdown-sm" id="btn_approve" x-placement="bottom-start" style="position: absolute; top: 36px; left: 0px; will-change: top, left;">
                                                                <a class="dropdown-item" data-status="Approve" data-id="{{$item->id}}">Approve</a>
                                                                <a class="dropdown-item" data-status="Reject" data-id="{{$item->id}}">Reject</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class='dropdown d-inline-block'>
                                                            <a href='#' class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                                <i class="fal fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class='dropdown-menu'>
                                                                <a href="{{url('admins/customer/change/request/detail',$item->id)}}" class="dropdown-item  border-success bg-transparent text-success">
                                                                    <span><i class="fal fa-show"></i> @lang('lang.show')</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="tab_approve" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="dt-basic-approve" class="table table-bordered table-hover table-striped w-100">
                                            <thead>
                                                <tr>
                                                    <th>@lang('lang.customer_no')</th>
                                                    <th>@lang('lang.branch')</th>
                                                    <th>@lang('lang.customer_name')</th>
                                                    <th>@lang('lang.business_name')</th>
                                                    <th>@lang('lang.email')</th>
                                                    <th>@lang('lang.fee')</th>
                                                    <th>@lang('lang.vat_amount')</th>
                                                    <th>@lang('lang.total_fee')</th>
                                                    <th>@lang('lang.approve_date')</th>
                                                    <th>@lang('lang.approve_by')</th>
                                                    <th>@lang('lang.status')</th>
                                                    <th>@lang('lang.action')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td><a href="{{url('admins/customer/detail',$item->id)}}">{{$item->customer_no}}</a></td>
                                                        <td>{{$item->name_kh}}</td>
                                                        <td><a href="{{url('admins/customer/detail',$item->id)}}">{{$item->customer_name}}</a></td>
                                                        <td>{{$item->business_name}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>{{number_format($item->fee)}}%</td>
                                                        <td>{{number_format($item->vat_amount)}}</td>
                                                        <td>{{number_format($item->total_fee)}}</td>
                                                        <td>{{Carbon\Carbon::parse($item->approved_date)->format('d-M-Y')}}</td>
                                                        <td>{{$item->approved_by}}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-success btn-sm btn-pills waves-effect waves-themed">
                                                                    {{$item->status}}
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class='dropdown'>
                                                                <a href='#' class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                                    <i class="fal fa-ellipsis-v"></i>
                                                                </a>
                                                                <div class='dropdown-menu'>
                                                                    <a href="{{url('admins/customer/change/request/detail',$item->id)}}" class="dropdown-item border-success bg-transparent text-success">
                                                                        <span><i class="fal fa-show"></i> @lang('lang.show')</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function(){
            $('body').on('click', '#btn_approve a', function() {
                let status = $(this).data('status');
                let id = $(this).attr('data-id');
                if (status == "Approve") {
                    $.confirm({
                        title: '@lang("lang.approve")',
                        contentClass: 'text-center',
                        type: 'purple',
                        content: ''+
                            '<form method="post">'+
                                '<div class="form-group">'+
                                    '<div class="form-group">'+
                                        '<label>@lang("lang.approve_date") <span class="text-danger">*</span></label>'+
                                        '<input type="date" class="form-control approve_date required" value="">'+
                                        '<input type="hidden" class="form-control status" value="'+status+'">'+
                                        '<input type="hidden" class="form-control id" value="'+id+'">'+
                                    '</div>'+
                                    '<label>@lang("lang.reson")</label>'+
                                    '<textarea class="form-control reason"></textarea>'+
                                '</div>'+
                            '</form>',
                        buttons: {
                            confirm: {
                                text: 'Submit',
                                btnClass: 'btn-blue',
                                action: function() {
                                    var id = this.$content.find('.id').val();
                                    var status = this.$content.find('.status').val();
                                    var approve_date = this.$content.find('.approve_date').val();
                                    var reason = this.$content.find('.reason').val();
                                    if (!approve_date) {
                                        $.alert({
                                            title: '<span class="text-danger">@lang("lang.requiered")</span>',
                                            content: 'Please input approve date.',
                                        });
                                        return false;
                                    }
                                    axios.post('{{ URL("admins/customer/approve") }}', {
                                        'id': id,
                                        'status': status,
                                        'approve_date': approve_date,
                                        'reason': reason
                                    }).then(function(response) {
                                        if (response.data.message == 'successfull') {
                                            toastr.success("@lang('lang.data_has_been_save_success')", "@lang('lang.message_title')");
                                            window.location.reload();
                                        }
                                    });
                                }
                            },
                            cancel: {
                                text: 'Cancel',
                                btnClass: 'btn-secondary btn-sm',
                            },
                        }
                    });
                }
                if(status == 'Reject'){
                    $.confirm({
                        title: '@lang("lang.reject")',
                        contentClass: 'text-center',
                        type: 'red',
                        typeAnimated: true,
                        content: ''+
                            '<form method="post">'+
                                '<div class="form-group">'+
                                    '<div class="form-group">'+
                                        '<label>@lang("lang.reject_date") <span class="text-danger">*</span></label>'+
                                        '<input type="date" class="form-control reject_date" value="">'+
                                        '<input type="hidden" class="form-control status" value="'+status+'">'+
                                        '<input type="hidden" class="form-control id" value="'+id+'">'+
                                    '</div>'+
                                    '<label>@lang("lang.reson")</label>'+
                                    '<textarea class="form-control reason"></textarea>'+
                                '</div>'+
                            '</form>',
                        buttons: {
                            confirm: {
                                text: 'Submit',
                                btnClass: 'btn-blue',
                                action: function() {
                                    var id = this.$content.find('.id').val();
                                    var status = this.$content.find('.status').val();
                                    var reject_date = this.$content.find('.reject_date').val();
                                    var reason = this.$content.find('.reason').val();
                                    if (!reject_date) {
                                        $.alert({
                                            title: '<span class="text-danger">@lang("lang.requiered")</span>',
                                            content: 'Please input reject date.',
                                        });
                                        return false;
                                    }
                                    axios.post('{{ URL("admins/customer/approve") }}', {
                                        'id': id,
                                        'status': status,
                                        'reject_date': reject_date,
                                        'reason': reason
                                    }).then(function(response) {
                                        if (response.data.message == 'successfull') {
                                            toastr.success("@lang('lang.data_has_been_save_success')", "@lang('lang.message_title')");
                                            window.location.reload();
                                        }
                                    });
                                }
                            },
                            cancel: {
                                text: 'Cancel',
                                btnClass: 'btn-secondary btn-sm',
                            },
                        }
                    });
                }
            });
        });
    </script>
@endsection
