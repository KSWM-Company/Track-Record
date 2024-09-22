@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <a href="{{url('admins/customer')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.back')</a>
        <div id="panel-1" class="panel">
            <div class="panel-hdr bg-success-600">
                <h2>
                    @lang('lang.customer_infor')
                </h2>
            </div>
            
            <div class="tab-content">
                <div class="tab-pane fade active show" id="customer_infor" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="border-0">{{__('lang.image')}}</td>
                                    @foreach ($data->customerImage as $item)
                                        <td class="border-0">
                                            <div class="img-preview preview-md">
                                                <img src="{{$item->full_path}}" style="padding-left: 5px;" width="100" alt="{{$item->name}}">
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.branch')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->BranchName}}</td>
                                    <td class="border-0">{{__('lang.customer_no')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->customer_no}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.customer_name')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->customer_name}}</td>
                                    <td class="border-0">{{__('lang.business_name')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->business_name}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.email')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->email}}</td>
                                    <td class="border-0">{{__('lang.houes_no')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->houes_no}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.add_streed')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->add_streed}}</td>
                                    <td class="border-0">{{__('lang.vatin')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{number_format($data->vatin,2)}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.address')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->FullCurrentAddress}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.contact')
                        </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.business_type')
                        </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="ui-state-default">
                                    <th>@lang('lang.business_type')</th>
                                    <th>@lang('lang.category')</th>
                                    <th>@lang('lang.sub_category')</th>
                                    <th>@lang('lang.multiply')</th>
                                    <th>@lang('lang.monthly_fee')</th>
                                    <th>@lang('lang.land_filed_fee')</th>
                                    <th>@lang('lang.grand_total')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->customersHavBusiness as $item)
                                    <tr>
                                        <td>{{$item->BusinessTypeName}}</td>
                                        <td>{{$item->CategoryName}}</td>
                                        <td>{{$item->SubCategoryName}}</td>
                                        <td>{{$item->multiply}}</td>
                                        <td>{{number_format($item->monthly_fee,2)}}</td>
                                        <td>{{number_format($item->land_filed_fee,2)}}</td>
                                        <td>{{number_format($item->grand_total,2)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.payment_types')
                        </h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class="border-0">{{__('lang.fee')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->fee}}%</td>
                                    <td class="border-0">{{__('lang.vat')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->vat == '0' ? "No" : "Yes"}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.vat_amount')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{number_format($data->vat_amount,2)}}</td>
                                    <td class="border-0">{{__('lang.total_fee')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{number_format($data->total_fee,2)}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.currency')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->CurrencyName}}</td>
                                    <td class="border-0">{{__('lang.payment_types')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->PaymentTypeName}}</td>
                                </tr>
                                <tr>
                                    <td class="border-0">{{__('lang.collector')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->collector=='0' ? 'No' : "Yes"}}</td>
                                    <td class="border-0">{{__('lang.collection_date')}}</td>
                                    <td class="border-0">:</td>
                                    <td class="border-0">{{$data->CusCollectionDate}}</td>
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