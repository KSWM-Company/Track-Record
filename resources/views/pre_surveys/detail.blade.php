@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <a href="{{url('admins/survey')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.back')</a>
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.survey')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.survey_by'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->staff->name}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="survey_date">@lang('lang.survey_date'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->survey_date}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="entry_date">@lang('lang.entry_date'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->entry_date}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="entry_date">Amount: </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->total_amount}}</strong>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="tran_no">@lang('lang.block'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->block}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.sector'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->sector}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.street_no'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->street_no}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.side_of_street'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->side_of_street}}</strong>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.zone_name'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->zone_name}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.start_piont'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->start_piont}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.end_piont'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->end_piont}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.add_street'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->add_street}}</strong>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.province'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->provinces->english}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.district'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->districts->english}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.commune'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->communes->english}}</strong>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.village'): </label>
                                <strong> {{$data['survey'] == null?'':$data['survey']->villages->english}}</strong>
                            </div>
                        </div>
                    </div>

                    @foreach ($data['survey_detail'] as $key=>$value)
                        {{-- location_code --}}
                        <div class="panel-hdr bg-success-600">
                            <h2>
                                @lang('lang.location_code')
                            </h2>
                        </div>
                        <div class="panel-content">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.location_code'): </label>
                                    <strong> {{$value->location_code}}</strong>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.business_name'): </label>
                                    <strong> {{$value->business_name}}</strong>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">Amount: </label>
                                    <strong> {{$value->total_amount}}</strong>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.house_no'): </label>
                                    <strong> {{$value->house_no}}</strong>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.order_of_house'): </label>
                                    <strong> {{$value->order_of_house}}</strong>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.survey_name'): </label>
                                    <strong> {{$value->survey_name}}</strong>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.devide_order'): </label>
                                    <strong> {{$value->devide_order}}</strong>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.floor'): </label>
                                    <strong> {{$value->floor}}</strong>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.position'): </label>
                                    <strong> {{$value->position}}</strong>
                                </div>
                            </div>

                            {{-- Business type --}}
                            <br>
                            <div class="row mb-2">
                                <div class="table-responsive">
                                    <table class="kswn-table table-bordered">
                                        <thead>
                                            <tr class="ui-state-default" style="text-align: center;">
                                                <th>@lang('lang.business_type')</th>
                                                <th>@lang('lang.category')</th>
                                                <th>@lang('lang.sub_category')</th>
                                                <th>@lang('lang.multiply')</th>
                                                <th style="width: 130px !important;">@lang('lang.total_fee')</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_business_type">
                                            @foreach ($value->survey_business_type as $key=>$value_business)
                                                <tr>
                                                    <td>{{$value_business->BusinessTypeName}}</td>
                                                    <td>{{$value_business->CategoryName}}</td>
                                                    <td>{{$value_business->SubCategoryName}}</td>
                                                    <td>{{$value_business->multiply}}</td>
                                                    <td>{{$value_business->grand_total}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="row mb-2">
                                @foreach ($value->survey_image_location as $key=>$value_image)
                                        <div class="img-preview preview-md">
                                            <img src="{{$value_image->path_name}}" style="padding-left: 5px;" width="100" alt="{{$value_image->name}}">
                                        </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
