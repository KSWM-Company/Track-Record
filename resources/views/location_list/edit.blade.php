@extends('layouts.admin')
@section('style')
    <style>
        .imgGallery{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
    </style>
@endsection
@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admins/dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item">@lang('lang.survey')</li>
        <li class="breadcrumb-item active">@lang('lang.edit')</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block">
            <a href="{{url('admins/location-list')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.back')</a>
        </li>
    </ol>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.infor_request')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="request_by">@lang('lang.request_by') <span class="text-danger">*</span></label>
                                <input type="text" id="request_by" name="request_by" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="request_date">@lang('lang.request_date') <span class="text-danger">*</span></label>
                                <input type="date" id="request_date" name="request_date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label class="form-label" for="reson">@lang('lang.reson')</label>
                                <textarea class="form-control" name="reson" id="reson" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.old_location_code')
                        </h2>
                    </div>
                    <form>
                        @csrf
                        <div class="panel-content">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="order_of_house">@lang('lang.order_of_house') <span class="text-danger">*</span></label>
                                    <input type="text" id="" name="" class="form-control" value="{{$data->order_of_house}}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="devide_order">@lang('lang.devide_order') <span class="text-danger">*</span></label>
                                    <input type="text" id="" name="" class="form-control" value="{{$data->devide_order}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 ">
                                    <label class="form-label" for="floor">@lang('lang.floor') <span class="text-danger">*</span></label>
                                    <input type="text" id="" name="" class="form-control" value="{{$data->floor}}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="house_no">@lang('lang.house_no')</label>
                                    <input type="sector" id="" name="" class="form-control" value="{{$data->house_no}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="survey_name">@lang('lang.survey_name')</label>
                                    <input type="" id="" name="" class="form-control" value="{{$data->survey_name}}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="business_name">@lang('lang.business_name')</label>
                                    <input type="text" id="" name="" class="form-control" value="{{$data->business_name}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label class="form-label" for="total_amount">@lang('lang.total_amount')</label>
                                    <input type="text" id="" name="" class="form-control" value="{{$data->total_amount}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="longitude">@lang('lang.longitude')</label>
                                    <input type="text" id="location_longitude" name="longitude" class="form-control survey_required" value="{{$data->location_longitude}}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="latitude">@lang('lang.latitude') <span class="text-danger">*</span></label>
                                    <input type="text" id="latitude" name="latitude" class="form-control survey_required" value="{{$data->location_latitude}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label class="form-label" for="link_google_map">@lang('lang.link_google_map') <span class="text-danger">*</span></label>
                                    <input type="text" id="link_google_map" name="link_google_map" class="form-control survey_required" value="{{$data->link_map}}" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.new_location_code')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="order_of_house">@lang('lang.order_of_house') <span class="text-danger">*</span></label>
                                <input type="text" id="order_of_house" name="" class="form-control" value="" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="devide_order">@lang('lang.devide_order') <span class="text-danger">*</span></label>
                                <input type="text" id="devide_order" name="" class="form-control" value="" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 ">
                                <label class="form-label" for="floor">@lang('lang.floor') <span class="text-danger">*</span></label>
                                <input type="text" id="floor" name="" class="form-control" value="" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="house_no">@lang('lang.house_no')</label>
                                <input type="sector" id="house_no" name="" class="form-control" value="" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="survey_name">@lang('lang.survey_name')</label>
                                <input type="" id="survey_name" name="" class="form-control" value="" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="business_name">@lang('lang.business_name')</label>
                                <input type="text" id="business_name" name="" class="form-control" value="" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label class="form-label" for="total_amount">@lang('lang.total_amount')</label>
                                <input type="text" id="total_amount" name="" class="form-control" value="" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="longitude">@lang('lang.longitude')</label>
                                <input type="text" id="location_longitude" name="longitude" class="form-control survey_required" value="" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="latitude">@lang('lang.latitude') <span class="text-danger">*</span></label>
                                <input type="text" id="location_latitude" name="latitude" class="form-control survey_required" value="" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label class="form-label" for="link_google_map">@lang('lang.link_google_map') <span class="text-danger">*</span></label>
                                <input type="text" id="link_map" name="link_google_map" class="form-control survey_required" value="" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div style="text-align: right;">
                                    <a href="javascript:void(0)" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSubmitSurvey">@lang('lang.submit')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  Old Businuss Type  --}}
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.old_business_type')
                        </h2>
                    </div>
                    <form>
                        @csrf
                        <div class="panel-content">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="business_type_name">@lang('lang.business_type') <span class="text-danger">*</span></label>
                                        @foreach($businessTypes as $key => $data)
                                            <input type="text" id="business_type_name" name="" class="form-control" value="{{$data->business_type_name}}" disabled>
                                        @endforeach
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="categorie_name">@lang('lang.category') <span class="text-danger">*</span></label>
                                        @foreach($businessTypes as $key => $data)
                                            <input type="text" id="categorie_name" name="" class="form-control" value="{{$data->categorie_name}}" disabled>
                                        @endforeach
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 ">
                                    <label class="form-label" for="sub_categorie_name">@lang('lang.sub_category') <span class="text-danger">*</span></label>
                                        @foreach($businessTypes as $key => $data)
                                            <input type="text" id="sub_categorie_name" name="" class="form-control" value="{{$data->sub_categorie_name}}" disabled>
                                        @endforeach
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="create_by">@lang('lang.create_by')</label>
                                        @foreach($businessTypes as $key => $data)
                                            <input type="text" id="create_by" name="" class="form-control" value="{{$data->created_by_name}}" disabled>
                                        @endforeach
                                </div>
                            </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="multiply">@lang('lang.multiply')</label>
                                    @foreach($businessTypes as $key => $data)
                                        <input type="text" id="multiply" name="" class="form-control" value="{{$data->multiply}}" disabled>
                                    @endforeach
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="land_filed_fee">@lang('lang.land_filed_fee')</label>
                                    @foreach($businessTypes as $key => $data)
                                        <input type="text" id="land_filed_fee" name="" class="form-control" value="{{$data->land_filed_fee}}" disabled>
                                    @endforeach
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="multiply">@lang('lang.multiply')</label>
                                    @foreach($businessTypes as $key => $data)
                                        <input type="text" id="multiply" name="" class="form-control" value="{{$data->monthly_fee}}" disabled>
                                    @endforeach
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="grand_total">@lang('lang.grand_total')</label>
                                    @foreach($businessTypes as $key => $data)
                                        <input type="text" id="grand_total" name="" class="form-control" value="{{$data->grand_total}}" disabled>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                 </form>
            </div>
        </div>
    </div>

    {{--  New Businuss Type  --}}
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.new_business_type')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="business_type_name">@lang('lang.business_type') <span class="text-danger">*</span></label>
                                <input type="text" id="business_type_name" name="" class="form-control" value="" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="categorie_name">@lang('lang.category') <span class="text-danger">*</span></label>
                                <input type="text" id="categorie_name" name="" class="form-control" value="" >
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 ">
                                <label class="form-label" for="sub_categorie_name">@lang('lang.sub_category') <span class="text-danger">*</span></label>
                                <input type="text" id="sub_categorie_name" name="" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="create_by">@lang('lang.create_by')</label>
                                <input type="text" id="create_by" name="" class="form-control" value="">
                            </div>
                        </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label" for="multiply">@lang('lang.multiply')</label>
                            <input type="text" id="multiply" name="" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="land_filed_fee">@lang('lang.land_filed_fee')</label>
                            <input type="text" id="land_filed_fee" name="" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label" for="multiply">@lang('lang.multiply')</label>
                            <input type="text" id="multiply" name="" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="grand_total">@lang('lang.grand_total')</label>
                            <input type="text" id="grand_total" name="" class="form-control" value="">
                        </div>
                    </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div style="text-align: right;">
                                    <a href="javascript:void(0)" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSubmitSurvey">@lang('lang.submit')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
