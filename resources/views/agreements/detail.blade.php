@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle bg-trans-gradient waves-effect waves-themed" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Agreement
                    </button>
                    <div class="dropdown-menu dropdown-menu-animated" x-placement="bottom-start" style="position: absolute; will-change: top, left; top: 36px; left: 0px;">
                        <button class="dropdown-item" type="button">Print</button>
                        <button class="dropdown-item" type="button">Invoice</button>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="customer_infor" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="border-0">{{__('lang.location_code')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->location_code}}</td>
                                    <td class="border-0">{{__('lang.customer_name')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->customer_name}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.business_name')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->business_name}}</td>
                                    <td class="border-0">{{__('lang.address')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->FullCurrentAddress}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.contact_person')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->contact_person}}</td>
                                    <td class="border-0">{{__('lang.sex')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->sex}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.phone_number')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->phone_number}}</td>
                                    <td class="border-0">{{__('lang.title')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->title}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.fee')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->fee}}%</td>
                                    <td class="border-0">{{__('lang.vat')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->vat}}%</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.vat_amount')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->vat_amount}}</td>
                                    <td class="border-0">{{__('lang.total_fee')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->total_fee}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.currency')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->currecy_name}}</td>
                                    <td class="border-0">{{__('lang.collection_day')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->collection_day}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.staff')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->staff_name}}</td>
                                    <td class="border-0">{{__('lang.make_at')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->make_at}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.from')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->from}}</td>
                                    <td class="border-0">{{__('lang.to')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->to}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.month_of_agr')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->month_of_agr}}</td>
                                    <td class="border-0">{{__('lang.agreement_date')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->agreement_date}}</td>
                                </tr>

                                <tr>
                                    <td class="border-0">{{__('lang.waste_collect_per_week')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->waste_collect_per_week}}</td>
                                    <td class="border-0"></td>
                                    {{-- <td class="border-0"></td> --}}
                                    {{-- <td class="border-0">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="defaultInline1">
                                            <label class="custom-control-label" for="defaultInline1">Unchecked</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="defaultInline2" checked="">
                                            <label class="custom-control-label" for="defaultInline2">Checked</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="defaultInlined" disabled="">
                                            <label class="custom-control-label" for="defaultInlined">Disabled</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="defaultInline3" checked="" disabled="">
                                            <label class="custom-control-label" for="defaultInline3">Checked &amp; disabled</label>
                                        </div>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection