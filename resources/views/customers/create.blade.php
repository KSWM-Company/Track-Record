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
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.location_code')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="tran_no">@lang('lang.block') <span class="text-danger">*</span></label>
                                <select class="form-control search_required" name="block" id="block">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($block as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.sector') <span class="text-danger">*</span></label>
                                <select class="form-control search_required" name="sector" id="sector">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($sector as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.street_no') <span class="text-danger">*</span></label>
                                <select class="form-control search_required" name="street_no" id="street_no">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($street as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.side_of_street') <span class="text-danger">*</span></label>
                                <select class="form-control search_required" name="side_of_street" id="side_of_street">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($SiteofStreet as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.order_of_house') <span class="text-danger">*</span></label>
                                <select class="form-control search_required" name="order_of_house" id="order_of_house">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($HouseOrder as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.devide_order') <span class="text-danger">*</span></label>
                                <select class="form-control search_required" name="devide_order" id="devide_order">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($DevideOrder as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.floor') <span class="text-danger">*</span></label>
                                <select class="form-control search_required" name="floor" id="floor">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($floor as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="single-default">@lang('lang.position') <span class="text-danger">*</span></label>
                                <select class="form-control search_required" name="position" id="position">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($position as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="survey_name">@lang('lang.survey_name')</label>
                                <input type="text" id="survey_name" name="survey_name" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="type">@lang('lang.type')</label>
                                <input type="text" id="type" name="type" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="survey_by">@lang('lang.survey_by')</label>
                                <input type="text" id="survey_by" name="survey_by" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="survey_date">@lang('lang.survey_date')</label>
                                <div class="input-group">
                                    <input type="date" id="survey_date" name="survey_date" class="form-control" value="">
                                    {{-- <div class="input-group-append">
                                        <span class="input-group-text fs-xl">
                                            <i class="fal fa-calendar-check"></i>
                                        </span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="mb-2" style="text-align: right;">
                            <a href="javascript:" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSearchLocation">
                                <i class="ft-plus"></i>@lang('lang.search_location_code_in_survey')
                            </a>
                        </div>
                    </div>

                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.customers')
                        </h2>
                    </div>
                    <form>
                        @csrf
                        <div class="panel-content">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="customer_name">@lang('lang.customer_name') <span class="text-danger">*</span></label>
                                    <input type="text" id="customer_name" name="customer_name" class="form-control customer_required" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="business_name">@lang('lang.business_name') <span class="text-danger">*</span></label>
                                    <input type="text" id="business_name" name="business_name" class="form-control customer_required " value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="email">@lang('lang.email')</label>
                                    <input type="email" id="email" name="email" class="form-control" value="">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="form-label" for="zone_name">@lang('lang.zone_name')</label>
                                    <input type="zone_name" id="zone_name" name="zone_name" class="form-control" value="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.house_no')</label>
                                    <input type="text" id="house_no" name="house_no" class="form-control" value="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.add_street')</label>
                                    <input type="text" id="add_street" name="add_street" class="form-control" value="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="vatin">@lang('lang.vatin')</label>
                                    <input type="text" id="vatin" name="vatin" class="form-control" value="">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.province') <span class="text-danger">*</span></label>
                                    <select class="select2 form-control customer_required" name="province_code" id="province_code">
                                        <option value="">-- @lang('lang.select') --</option>
                                        @foreach ($province as $item)
                                            <option value="{{$item->code}}">{{$item->khmer}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.district') <span class="text-danger">*</span></label>
                                    <select class="select2 form-control customer_required" name="district" id="district">

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.commune') <span class="text-danger">*</span></label>
                                    <select class="select2 form-control customer_required" name="commune" id="commune">

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.village') <span class="text-danger">*</span></label>
                                    <select class="select2 form-control customer_required" name="village" id="village">

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="location_latitude">@lang('lang.latitude') <span class="text-danger">*</span></label>
                                    <input type="text" id="location_latitude" name="location_latitude" class="form-control customer_required" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="location_longitude">@lang('lang.longitude')</label>
                                    <input type="text" id="location_longitude" name="location_longitude" class="form-control customer_required" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="link_google_map">@lang('lang.link_google_map') <span class="text-danger">*</span></label>
                                    <input type="text" id="link_google_map" name="link_google_map" class="form-control customer_required" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div id="previewImage">
                                        <div class="imgGallery"></div>
                                        <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple style="display:none">
                                        <label  for="chooseFile" id="lb_image" >Choose Image</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-hdr bg-success-600">
                            <h2>
                                @lang('lang.contact')
                            </h2>
                        </div>
                        <div class="panel-content">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="contact_person">@lang('lang.contact_person')</label>
                                    <input type="text" id="contact_person" name="contact_person" class="form-control" value="">
                                </div>
                                <div class="col-md-4" data-select2-id="35">
                                    <label class="form-label" for="single-default">@lang('lang.sex')</label>
                                    <select class="select2 form-control w-100  select2-hidden-accessible" name="sex" id="sex" data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                        <option value="Female">@lang('lang.female')</option>
                                        <option value="Male">@lang('lang.male')</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="phone_number">@lang('lang.phone_number')</label>
                                    <input type="number" id="phone_number" name="phone_number" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="title">@lang('lang.title')</label>
                                    <input type="text" id="title" name="title" class="form-control" value="">
                                </div>
                            </div>
                        </div>

                        <div class="panel-hdr bg-success-600">
                            <h2>
                                @lang('lang.business_type')
                            </h2>
                        </div>
                        <div class="panel-content">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.business_type') <span class="text-danger">*</span></label>
                                    <select class="form-control changeBusinessType business_type business_type_required clear_business_type" name="business_type_id" id="business_type_id">
                                        <option value="">Please Select</option>
                                        @foreach ($dataBusinessType as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.category') <span class="text-danger">*</span></label>
                                    <select class="form-control onChangeCategory business_type_required clear_business_type" name="category_id" id="category_id">
                                        <option value="">Please Select</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.sub_category') <span class="text-danger">*</span></label>
                                    <select class="form-control changeSubCategory business_type_required clear_business_type" name="sub_category_id" id="sub_category_id">

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.multiply') <span class="text-danger">*</span></label>
                                    <input type="number" id="multiply" name="multiply" class="form-control business_type_required clear_business_type" value="1">
                                </div>
                                <input type="hidden" id="monthly_fee" name="monthly_fee" disabled class="form-control business_type_required clear_business_type" value="">
                                <input type="hidden" id="land_filed_fee" name="land_filed_fee" disabled class="form-control business_type_required clear_business_type" value="">
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.total_fee') <span class="text-danger">*</span></label>
                                    <input type="number" id="total_fee" name="total_fee" disabled class="form-control clear_business_type" value="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="single-default">@lang('lang.grand_total') <span class="text-danger">*</span></label>
                                    <input type="number" id="grand_total" name="grand_total" disabled class="form-control clear_business_type" value="">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4" style="text-align: right">
                                    <a href="javascript:void(0)" class="btn btn-success btn-sm addToBusinessType"><i class="fal fa-times" aria-hidden="true"></i> Add</a>
                                    <a href="javascript:void(0)" class="btn btn-default btn-sm" onclick="ClearLocalStorageCustomer()">Clear All</a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="kswn-table table-bordered">
                                    <thead>
                                        <tr class="ui-state-default" style="text-align: center;">
                                            <th width="300px">@lang('lang.business_type')</th>
                                            <th width="300px">@lang('lang.category')</th>
                                            <th width="300px">@lang('lang.sub_category')</th>
                                            <th width="300px">@lang('lang.multiply')</th>
                                            <th width="200px">@lang('lang.total_fee')</th>
                                            <th width="200px">@lang('lang.grand_total')</th>
                                            <th width="200px">@lang('lang.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_customer_business_type">
                                        @for ($i = 1; $i < 2; $i++)
                                            <tr>
                                                <th>
                                                    <input type="text" id="business_type" name="business_type" class="form-control business_type" value="" disabled>
                                                </th>
                                                <td>
                                                    <input type="text" id="category_id" name="category_id" class="form-control" value="" disabled>
                                                </td>
                                                <td>
                                                    <input type="text" id="sub_category_id" name="sub_category_id" class="form-control" value="" disabled>
                                                </td>
                                                <td>
                                                    <input type="text" id="multiply" name="multiply" class="form-control" value="" disabled>
                                                </td>
                                                <td>
                                                    <input type="text" id="total_fee" name="total_fee" disabled class="form-control" value="">
                                                </td>
                                                <td>
                                                    <input type="text" id="grand_total" name="grand_total" disabled class="form-control" value="">
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 removeRecord" title='Delete Record'>
                                                        <span><i class="fal fa-times"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                    <thead>
                                        <tr class="ui-state-default">
                                            <th colspan="5" style="text-align: right;">@lang('lang.grand_total')</th>
                                            <th><input type="text" value="0" id="sum_grand_total" class="form-control total_fee" disabled></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="panel-hdr bg-success-600">
                            <h2>
                                @lang('lang.payment_types')
                            </h2>
                        </div>
                        <div class="panel-content">
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.fee') <span class="text-danger">*</span></label>
                                    <input type="number" id="fee" name="fee" class="form-control customer_required" value="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.vat')</label>
                                    <select class="select2 form-control" name="vat" id="vat">
                                        <option value="0">No VAT</option>
                                        <option value="1">Include VAT</option>
                                        <option value="2">Exclude VAT</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.vat_amount') <span class="text-danger">*</span></label>
                                    <input type="number" id="vat_amount" name="vat_amount" class="form-control customer_required" value="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="single-default">@lang('lang.total_fee') <span class="text-danger">*</span></label>
                                    <input type="number" id="cus_total_fee" name="cus_total_fee" class="form-control customer_required" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label class="form-label" for="currency">@lang('lang.currency')<span class="text-danger">*</span></label>
                                    <select class="select2 form-control customer_required" name="currency" id="currency">
                                        @foreach ($currency as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="payment_type">@lang('lang.payment_types') <span class="text-danger">*</span></label>
                                    <select class="select2 form-control customer_required" name="payment_type" id="payment_type">
                                        @foreach ($paymentType as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="collector">@lang('lang.collector')</label>
                                    <select class="select2 form-control" name="collector" id="collector">
                                        @foreach ($collector as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="collection_date">@lang('lang.collection_date') <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="date" id="collection_date" name="collection_date" class="form-control customer_required" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div style="text-align: right;">
                                        <a href="{{url('admins/customer')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                        {{-- <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="">@lang('lang.submit')</button> --}}
                                        <a href="javascript:void(0)" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSubmitCustomer">@lang('lang.submit')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('customers.load_data') --}}
@endsection
@section('script')
    <script>
        var businessType = [];
        $(function(){
            if (localStorage.getItem("businessType"))
            {
                businessType = JSON.parse(localStorage.getItem("businessType"));
                ShowBusinessType();
            }
            //function on change province
            $("#province_code").on("change", function(){
                let id = $("#province_code").val() ?? $("#province_code").val();
                let optionSelect = "Province";
                $('#district').html('<option selected disabled> -- @lang("lang.select") --</option>');
                $('#commune').html('<option selected disabled> -- @lang("lang.select") --</option>');
                $('#village').html('<option selected disabled> -- @lang("lang.select") --</option>');
                showProvince(id, optionSelect);
            });
            $("#district").on("change", function(){
                let id = $("#district").val() ?? $("#district").val();
                let optionSelect = "District";
                $('#commune').html('<option selected disabled> -- @lang("lang.select") --</option>');
                $('#village').html('<option selected disabled> -- @lang("lang.select") --</option>');
                showProvince(id, optionSelect);
            });
            $("#commune").on("change", function(){
                let id = $("#commune").val() ?? $("#commune").val();
                let optionSelect = "Commune";
                $('#village').html('<option selected disabled> -- @lang("lang.select") --</option>');
                showProvince(id, optionSelect);
            });

            //function on change business type
            $('.changeBusinessType').on('change',function(){
                var business_type_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/business_type/onchange')}}",
                    data: {
                        business_type_id : business_type_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#category_id').empty();
                        $.each(response.data, function(index, item)
                        {
                            $('#category_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                    }
                });
            });
            // function on Change Category
            $('.onChangeCategory').on('change',function(){
                var cagegory_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/customer/category/onchange')}}",
                    data: {
                        cagegory_id : cagegory_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option value="">Please Select</option>');
                        $.each(response.data, function(index, item)
                        {
                            $('#sub_category_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                            $('#total_fee').val(item.total_fee);
                            $('#grand_total').val(item.total_fee);
                        });
                    }
                });
            });

            // function on change subcagory
            $('.changeSubCategory').on('change',function(){
                var sub_cagegory_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/customer/sub-category/change')}}",
                    data: {
                        sub_cagegory_id : sub_cagegory_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#total_fee').empty();
                        $('#grand_total').empty();
                        $.each(response.data, function(index, item)
                        {
                            calculatorFee(response.data);
                        });
                    }
                });
            });
            function calculatorFee(response){
                $("#multiply").val(1);
                $('#total_fee').val(response.total_fee);
                $('#land_filed_fee').val(response.land_filed_fee);
                $('#monthly_fee').val(response.monthly_fee);
                $('#grand_total').val(response.total_fee);
            }
            //functon search location code in survey
            $("#btnSearchLocation").on('click',function(){
                let numRequired = 0;
                $(".search_required").each(function(e){
                    if($(this).val()==""){ numRequired++;}
                });
                if (numRequired > 0) {
                    toastr.warning("@lang('lang.input_require')", "@lang('lang.message_title')");
                    $(".search_required").each(function(){
                        if($(this).val()==""){
                            $(this).css("border-color","red");
                        }
                    });
                } else {
                    let block = $("#block").val();
                    let sector = $("#sector").val();
                    let street_no = $("#street_no").val();
                    let side_of_street = $("#side_of_street").val();
                    let order_of_house = $("#order_of_house").val();
                    let devide_order = $("#devide_order").val();
                    let floor = $("#floor").val();
                    let position = $("#position").val();
                    let locationCode = block + sector + street_no + side_of_street + order_of_house + devide_order + floor + position;
                    $.ajax({
                        type: "GET",
                        url: "{{url('admins/customer/search/location-code')}}",
                        data: {
                            location_code:locationCode
                        },
                        dataType: "JSON",
                        success: function (response) {
                            if (response.data.dataSurvey) {
                                Swal.fire({
                                    title: "@lang('lang.the_have_customer_already')",
                                    text: "Survey Name"+" : "+ response.data.dataSurvey.survey_name,
                                    icon: "success"
                                });
                                $("#survey_name").val(response.data.dataSurvey.survey_name);
                                $("#type").val(response.data.dataSurvey.business_name);
                                $("#survey_by").val(response.data.dataSurvey.survey_by);
                                $("#survey_date").val(response.data.dataSurvey.survey_date);
                                $("#business_name").val(response.data.dataSurvey.business_name);
                                // $("#chooseFile").val(response.data.path_name);
                            }else{
                                toastr.error("@lang('This Location cod can Not Yet Customer')", "@lang('lang.message_title')");
                                // Swal.fire({
                                //     title: 'This Location cod can Not Yet Customer?',
                                //     icon: 'warning',
                                // });
                            }
                        }
                    });
                }
            });
            $(".search_required").on('focus',function(){
                $(this).css("border-color","#1e9ff2");
            });
            $(".search_required").on('focusout',function(){
                $(this).css("border-color","#d8d2d2");
            });
            //function add to business type
            $(".addToBusinessType").on('click',function(){
                let numRequired = 0;
                $(".business_type_required").each(function(e){
                    if($(this).val()==""){ numRequired++;}
                });
                if (numRequired>0) {
                    $(".business_type_required").each(function(){
                        if($(this).val()==""){
                            $(this).css("border-color","red");
                        }
                    });
                } else {
                    let business_type_id = $("#business_type_id").val();
                    let category_id = $("#category_id").val();
                    let sub_category_id = $("#sub_category_id").val();

                    let business_type = $("#business_type_id option:selected").text();
                    let category = $("#category_id option:selected").text();
                    let sub_category = $("#sub_category_id option:selected").text();
                    let multiply = $("#multiply").val();
                    let monthly_fee = $("#monthly_fee").val();
                    let land_filed_fee = $("#land_filed_fee").val();
                    let total_fee = $("#total_fee").val();
                    let grand_total = $("#grand_total").val();

                    // create JavaScript Object
                    let item = {
                        business_type_id : business_type_id,
                        category_id : category_id,
                        sub_category_id : sub_category_id,
                        business_type: business_type,
                        category: category,
                        sub_category: sub_category,
                        multiply: multiply,
                        monthly_fee: monthly_fee,
                        land_filed_fee: land_filed_fee,
                        total_fee: total_fee,
                        grand_total: grand_total,
                    };
                    businessType.push(item);
                    SetLocalStorageBusinessType();
                    ShowBusinessType();
                    ClearAllBusinessTeyp();
                }
            });

            $(".customer_required").on('focus',function(){
                $(this).css("border-color","#1e9ff2");
            });
            $(".customer_required").on('focusout',function(){
                $(this).css("border-color","#d8d2d2");
            });
            // function on change multiply
            $("#multiply").on('change',function(){
                var multiply = $(this).val();
                var total_fee = $("#total_fee").val();
                var GrantAmount = multiply * total_fee;
                $("#grand_total").val(GrantAmount);
            });

            $("#btnSubmitCustomer").on("click",function(){
                SaveDataCustomer();
            });
            $('#chooseFile').on('change', function(event) {
                handleImageUpload(event.target.files, '.imgGallery');
                // multiImgPreview(this, 'div.imgGallery');
            });
        });

        function showProvince(id, optionSelect){
            let url = "";
            let data = {
                "_token": "{{ csrf_token() }}",
            };

            // Address
            if (optionSelect == "Province") {
                url = "{{url('admins/survey/district')}}"
                data.province_code = id
            }else if (optionSelect == "District") {
                url = "{{url('admins/survey/commune')}}"
                data.district_code = id
            }else if (optionSelect == "Commune") {
                url = "{{url('admins/survey/village')}}"
                data.commune_code = id
            };

            $.ajax({
                type: "POST",
                url,
                data,
                dataType: "JSON",
                success: function (response) {
                    var data = response.data;
                    if (data != '') {
                        let option = {value: "",text: ""}
                        $.each(data, function(i, item) {
                            option = {
                                value: item.code,
                                text: item.khmer,
                            }
                            if (optionSelect == "Province") {
                                $('#district').append($('<option>', option));
                            }else if(optionSelect == "District"){
                                $('#commune').append($('<option>', option));
                            }else if (optionSelect == "Commune") {
                                $('#village').append($('<option>', option));
                            }
                        });
                    }
                }
            });
        }

        function SetLocalStorageBusinessType() {
            if (window.localStorage)
            {
                localStorage.setItem("businessType", JSON.stringify(businessType));
            }
        }
        // Multiple images preview with JavaScript //SH replace new code
        function multiImgPreview(input, imgPreviewPlaceholder) {
            if (input.files) {
                let filesArray = Array.from(input.files);

                // Function to update the input's files property
                function updateInputFiles() {
                    const dataTransfer = new DataTransfer();
                    filesArray.forEach(file => dataTransfer.items.add(file));
                    input.files = dataTransfer.files;
                }

                for (let i = 0; i < filesArray.length; i++) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        let imgContainer = $('<div class="preview-image"></div>');
                        let img = $('<img>').attr('src', e.target.result);
                        let removeBtn = $('<button class="remove-btn">&times;</button>');

                        removeBtn.on('click', function() {
                            imgContainer.remove();
                            // Remove the file from the array
                            filesArray.splice(i, 1);
                            // Update the input's files
                            updateInputFiles();
                        });

                        imgContainer.append(img).append(removeBtn);
                        $(imgPreviewPlaceholder).append(imgContainer);
                    };

                    reader.readAsDataURL(filesArray[i]);
                }
            }
        }

        function SaveDataCustomer(){
            let arrImage = [];
            $('.imgGallery img').each(function(){
                // Get the src attribute value of each img element and display it
                var srcValue = $(this).attr('src');
                arrImage.push({"path_name":srcValue});
            });

            let numRequired = 0;
            $(".customer_required").each(function(e){
                if($(this).val()==""){ numRequired++;}
            });
            if (numRequired>0) {
                toastr.warning("@lang('lang.input_require')", "@lang('lang.message_title')");
                $(".customer_required").each(function(){
                    if($(this).val()==""){
                        $(this).css("border-color","red");
                    }
                });
            }else{
                let block = $("#block").val();
                let sector = $("#sector").val();
                let street_no = $("#street_no").val();
                let side_of_street = $("#side_of_street").val();
                let order_of_house = $("#order_of_house").val();
                let devide_order = $("#devide_order").val();
                let floor = $("#floor").val();
                let position = $("#position").val();
                let locationCode = block + sector + street_no + side_of_street + order_of_house + devide_order + floor + position;
                if (locationCode) {
                    $.ajax({
                        type: "POST",
                        url: "{{url('admins/customer')}}",
                        data: {
                            businessType : JSON.parse(localStorage.getItem("businessType")),
                            arrImage : arrImage,
                            location_code : locationCode,
                            customer_name : $("#customer_name").val(),
                            business_name : $("#business_name").val(),
                            email : $("#email").val(),
                            zone_name : $("#zone_name").val(),
                            house_no : $("#house_no").val(),
                            add_street : $("#add_street").val(),
                            vatin : $("#vatin").val(),
                            province : $("#province_code").val(),
                            district : $("#district").val(),
                            commune : $("#commune").val(),
                            village : $("#village").val(),
                            link_map : $("#link_google_map").val(),
                            location_latitude : $("#location_latitude").val(),
                            location_longitude : $("#location_longitude").val(),
                            contact_person : $("#contact_person").val(),
                            sex : $("#sex").val(),
                            phone_number : $("#phone_number").val(),
                            title : $("#title").val(),
                            fee : $("#fee").val(),
                            vat : $("#vat").val(),
                            vat_amount : $("#vat_amount").val(),
                            total_fee : $("#cus_total_fee").val(),
                            currency : $("#currency").val(),
                            payment_type : $("#payment_type").val(),
                            collector : $("#collector").val(),
                            collection_date : $("#collection_date").val(),
                        },
                        dataType: "JSON",
                        success: function (response) {
                            if (response.message=='successfull') {
                                toastr.success("@lang('lang.data_has_been_save_success')", "@lang('lang.message_title')");
                            }
                            window.location.replace("{{ URL('admins/customer') }}");
                            localStorage.clear();
                        }
                    });
                }else{
                    toastr.warning("@lang('lang.input_require')", "@lang('lang.message_title')");
                }
            }
        }

        function ClearLocalStorageCustomer(){
            localStorage.clear();
            $("#sum_grand_total").val(0);
        }
        function ClearAllBusinessTeyp(){
            $(".clear_business_type").val("");
        }
        function removeBusinessType(index){
            if (index > -1) {
                businessType.splice(index, 1);
            }
            SetLocalStorageBusinessType();
            ShowBusinessType();
        }
        function ShowBusinessType() {
            $("#tbl_customer_business_type").empty();
            if (JSON.parse(localStorage.getItem("businessType"))) {
                let sum_grand_total = 0;
                for (var [index, item] of businessType.entries()) {
                    var row = "<tr class='section-row' style='text-align: center'>"+
                        '<td>'+
                            '<input type="text" id="business_type" name="business_type" class="form-control business_type" data-business-type-id="'+item.business_type_id+'" value="'+item.business_type+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="category_id" name="category_id" class="form-control category" data-category-id="'+item.category_id+'" value="'+item.category+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="sub_category_id" name="sub_category_id" class="form-control sub_category" data-sub-category-id="'+item.sub_category_id+'" value="'+item.sub_category+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="multiply" name="multiply" class="form-control multiply" value="'+item.multiply+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="total_fee" name="total_fee" class="form-control total_fee" value="'+item.total_fee+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="grand_total" name="grand_total" class="form-control grand_total" value="'+item.grand_total+'" disabled>'+
                        '</td>'+
                        "<td>"+
                            '<input type="hidden" id="monthly_fee" name="monthly_fee" class="form-control monthly_fee" value="'+item.monthly_fee+'">'+
                            '<input type="hidden" id="land_filed_fee" name="land_filed_fee" class="form-control land_filed_fee" value="'+item.land_filed_fee+'">'+
                            `<button class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 removeRecord' title='Delete Record' onclick='removeBusinessType(${index})''><span><i class='fal fa-times'></i></span></button>
                        </td>`+
                    "</tr>";
                    $("#tbl_customer_business_type").append(row);
                    sum_grand_total += Number(item.grand_total);
                }
                $("#sum_grand_total").val(sum_grand_total);
            }
        }
    </script>
@endsection
