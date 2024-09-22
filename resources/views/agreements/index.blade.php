@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Agreement
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('admins/agreement/create')}}" class="btn btn-outline-success btn-sm mr-1"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead class="table table-bordered table-hover table-striped w-100">
                            <tr>
                                <th>@lang('lang.agreement_no')</th>
                                <th>@lang('lang.customer_no')</th>
                                <th>@lang('lang.branch')</th>
                                <th>@lang('lang.customer_name')</th>
                                <th>@lang('lang.business_name')</th>
                                <th>@lang('lang.fee')</th>
                                <th>@lang('lang.vat_amount')</th>
                                <th>@lang('lang.total_fee')</th>
                                <th>@lang('lang.agreement_date')</th>
                                <th>@lang('lang.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td><a href="{{url('admins/agreement/detail',$item->id)}}">{{$item->agreement_no}}</a></td>
                                    <td><a href="{{url('admins/agreement/detail',$item->id)}}">{{$item->customer_no}}</a></td>
                                    <td>{{Helper::getLang() == 'en' ? $item->name_en : $item->name_kh}}</td>
                                    <td><a href="{{url('admins/agreement/detail',$item->id)}}">{{$item->customer_name}}</a></td>
                                    <td>{{$item->business_name}}</td>
                                    <td>{{$item->fee}}%</td>
                                    <td>{{$item->vat_amount}}</td>
                                    <td>{{$item->total_fee}}</td>
                                    <td>{{$item->agreement_date}}</td>
                                    <td>
                                        <a href="{{url('admins/agreement/detail',$item->id)}}" class="border-success bg-transparent text-success">
                                            <span>@lang('lang.show')</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>@lang('lang.agreement_no')</th>
                                <th>@lang('lang.customer_no')</th>
                                <th>@lang('lang.branch')</th>
                                <th>@lang('lang.customer_name')</th>
                                <th>@lang('lang.business_name')</th>
                                <th>@lang('lang.fee')</th>
                                <th>@lang('lang.vat_amount')</th>
                                <th>@lang('lang.total_fee')</th>
                                <th>@lang('lang.agreement_date')</th>
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
@endsection
