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
                            @lang('lang.survey')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label" for="survey_by">@lang('lang.survey_by') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 survey_disabled field_required " name="survey_by" id="survey_by">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($staff as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="survey_date">@lang('lang.survey_date') <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" id="survey_date" name="survey_date" class="form-control datepicker survey_disabled field_required " value="">
                                    <div class="input-group-append">
                                        <span class="input-group-text fs-xl">
                                            <i class="fal fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="entry_date">@lang('lang.entry_date') <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" id="entry_date" name="entry_date" class="form-control survey_disabled datepicker field_required " value="">
                                    <div class="input-group-append">
                                        <span class="input-group-text fs-xl">
                                            <i class="fal fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="block">@lang('lang.block') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 survey_disabled field_required " name="block" id="block">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($block as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="sector">@lang('lang.sector') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 survey_disabled field_required " name="sector" id="sector">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($sector as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="street_no">@lang('lang.street_no') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 field_required survey_disabled street_no " name="street_no" id="street_no">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($street as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="side_of_street">@lang('lang.side_of_street') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 survey_disabled field_required " name="side_of_street" id="side_of_street">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($SiteofStreet as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="zone_name">@lang('lang.zone_name')</label>
                                <input type="text" id="zone_name" name="zone_name" class="form-control survey_disabled field_required" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="start_piont">@lang('lang.start_piont')</label>
                                <input type="text" id="start_piont" name="start_piont" class="form-control survey_disabled field_required" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="end_piont">@lang('lang.end_piont')</label>
                                <input type="text" id="end_piont" name="end_piont" class="form-control survey_disabled field_required" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="add_street">@lang('lang.add_street')</label>
                                <input type="text" id="add_street" name="add_street" class="form-control survey_disabled field_required" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="province_code">@lang('lang.province') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 survey_disabled field_required " name="province_code" id="province_code">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($province as $item)
                                        <option value="{{$item->code}}">{{$item->khmer}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="district">@lang('lang.district') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 survey_disabled field_required " name="district" id="district">

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="commune">@lang('lang.commune') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 survey_disabled field_required " name="commune" id="commune">

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="village">@lang('lang.village') <span class="text-danger">*</span></label>
                                <select class="form-control w-100 survey_disabled field_required" name="village" id="village">

                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- survey_detail --}}
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.survey_detail')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="order_of_house">@lang('lang.order_of_house') <span class="text-danger">*</span></label>
                                <select class="form-control field_survey_detail_required" name="order_of_house" id="order_of_house">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($HouseOrder as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="devide_order">@lang('lang.devide_order') <span class="text-danger">*</span></label>
                                <select class="form-control field_survey_detail_required" name="devide_order" id="devide_order">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($DevideOrder as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="floor">@lang('lang.floor') <span class="text-danger">*</span></label>
                                <select class="form-control field_survey_detail_required" name="floor" id="floor">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($floor as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="position">@lang('lang.position') <span class="text-danger">*</span></label>
                                <select class="form-control field_survey_detail_required" name="position" id="position">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($position as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label" for="house_no">@lang('lang.house_no')</label>
                                <input type="text" id="house_no" name="house_no" class="form-control field_survey_detail_required" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="survey_name">@lang('lang.survey_name')</label>
                                <input type="text" id="survey_name" name="survey_name" class="form-control field_survey_detail_required" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="business_name">@lang('lang.business_name') <span class="text-danger">*</span></label>
                                <input type="text" id="business_name" name="business_name" class="form-control field_survey_detail_required" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label" for="location_latitude">@lang('lang.latitude')</label>
                                <input type="number" id="location_latitude" name="location_latitude" class="form-control field_survey_detail_required" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="location_longitude">@lang('lang.longitude')</label>
                                <input type="number" id="location_longitude" name="location_longitude" class="form-control field_survey_detail_required" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="link_map">@lang('lang.link_google_map')</label>
                                <input type="text" id="link_map" name="link_map" class="form-control field_survey_detail_required" value="">
                            </div>
                        </div>
                        {{-- add business --}}
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label" for="business_type_id">@lang('lang.business_type') <span class="text-danger">*</span></label>
                                <select class="form-control onChangeBusinessType clear_business_type field_add_business_required" name="business_type_id" id="business_type_id">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($dataBusinessType as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="category_id">@lang('lang.category') <span class="text-danger">*</span></label>
                                <select class="form-control onChangeCategory clear_business_type field_add_business_required" name="category_id" id="category_id">

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="sub_category_id">@lang('lang.sub_category') <span class="text-danger">*</span></label>
                                <select class="form-control onChangeSubCategory clear_business_type field_add_business_required" name="sub_category_id" id="sub_category_id">

                                </select>
                            </div>
                        </div>
                        {{-- Business type --}}
                        <div class="row mb-2">
                            <div class="col-md-2" style="display: none;">
                                <label class="form-label" for="fm_monthly_fee">@lang('lang.monthly_fee') <span class="text-danger">*</span></label>
                                <input type="number" id="fm_monthly_fee" name="monthly_fee" disabled class="form-control field_add_business_required clear_business_type" value="">
                            </div>
                            <div class="col-md-2" style="display: none;">
                                <label class="form-label" for="fm_land_filed_fee">@lang('lang.land_filed_fee') <span class="text-danger">*</span></label>
                                <input type="number" id="fm_land_filed_fee" name="land_filed_fee" disabled class="form-control field_add_business_required clear_business_type" value="">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="fm_total_fee">@lang('lang.total_fee') <span class="text-danger">*</span></label>
                                <input type="number" id="fm_total_fee" name="total_fee" disabled class="form-control field_add_business_required clear_business_type" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="fm_multiply">@lang('lang.multiply') <span class="text-danger">*</span></label>
                                <input type="number" id="fm_multiply" name="multiply" class="form-control field_add_business_required" value="1" min="1">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="fm_grand_total">@lang('lang.grand_total') <span class="text-danger">*</span></label>
                                <input type="number" id="fm_grand_total" name="grand_total" disabled class="form-control field_add_business_required clear_business_type" value="">
                            </div>
                           
                           
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div id="previewImage" class="required_image">
                                    <div class="imgGallery"></div>
                                    <input type="file" id="image_location" name="image_location[]" class="form-control field_survey_detail_required" value="" style="display:none" multiple/>
                                    <label  for="image_location" id="lb_image">Choose Image</button>
                                  </div>
                            </div>
                        </div>
                        {{-- add business --}}
                        <div class="row mb-2">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="text-align: right">
                                <a href="javascript:void(0)" class="btn btn-success btn-sm addToBusinessType"><i class="fal fa-times" aria-hidden="true"></i> Add</a>
                                <a href="javascript:void(0)" class="btn btn-default btn-sm" onclick="ClearSurveyBusinessType()">Clear</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="kswn-table table-bordered">
                                <thead>
                                    <tr class="ui-state-default" style="text-align: center;">
                                        <th>@lang('lang.business_type')</th>
                                        <th>@lang('lang.category')</th>
                                        <th>@lang('lang.sub_category')</th>
                                        <th width="70px">@lang('lang.multiply')</th>
                                        <th width="100px">@lang('lang.total_fee')</th>
                                        <th width="130px">@lang('lang.grand_total')</th>
                                        <th>@lang('lang.action')</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_business_type">
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
                                                <input type="text" id="total_land_filed" name="total_land_filed" disabled class="form-control" value="">
                                            </td>
                                            <td>
                                                <input type="text" id="total_fee" name="total_fee" disabled class="form-control" value="">
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
                    {{-- end survey_detail --}}

                    {{-- location_code --}}
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.location_code')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4" style="text-align: right">
                                <a href="javascript:void(0)" class="btn btn-success btn-sm" id="addSurveyDetail"><i class="fal fa-times" aria-hidden="true"></i> Add Location Code</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="kswn-table table-bordered">
                                <thead>
                                    <tr class="ui-state-default" style="text-align: center;">
                                        <th>@lang('lang.location_code')</th>
                                        <th>@lang('lang.business_name')</th>
                                        <th>@lang('lang.order_of_house')</th>
                                        <th>@lang('lang.devide_order')</th>
                                        <th width="70px">@lang('lang.floor')</th>
                                        <th width="100px">@lang('lang.position')</th>
                                        <th width="130px">@lang('lang.total_amount')</th>
                                        <th>@lang('lang.action')</th>
                                    </tr>
                                </thead>
                                <tbody id="tab_survey_location_code">
                                    @for ($i = 1; $i < 2; $i++)
                                        <tr>
                                            <th>
                                                <input type="text" id="survey_location_code" name="survey_location_code" class="form-control survey_location_code" value="">
                                            </th>
                                            <th>
                                                <input type="text" id="business_name" name="business_name" class="form-control business_name" value="">
                                            </th>
                                            <th>
                                                <input type="text" id="order_of_house" name="order_of_house" class="form-control order_of_house" value="">
                                            </th>
                                            <th>
                                                <input type="text" id="devide_order" name="devide_order" class="form-control devide_order" value="">
                                            </th>
                                            <th>
                                                <input type="text" id="floor" name="floor" class="form-control floor" value="">
                                            </th>
                                            <th>
                                                <input type="text" id="position" name="position" class="form-control position" value="">
                                            </th>
                                            <th>
                                                <input type="text" id="total_amount" name="total_amount" class="form-control total_amount" value="">
                                            </th>
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
                                        <th colspan="6" style="text-align: right;">@lang('lang.grand_total')</th>
                                        <th><input type="text" value="0" id="sum_total_amount" class="form-control total_fee" disabled></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div style="text-align: right;">
                                    <a href="{{url('admins/survey')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                    <a href="javascript:;" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSubmitSurvey">@lang('lang.submit')</a>
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
        var surveyBusinessType = [];
        var surveyLocationCode = [];
        var total_fee_business_type = 0;
        $(function(){
            if (localStorage.getItem("surveyBusinessType"))
            {
                surveyBusinessType = JSON.parse(localStorage.getItem("surveyBusinessType"));
                ShowSurveyBusinessType();
            }
            if (localStorage.getItem("surveyLocationCode"))
            {
                surveyLocationCode = JSON.parse(localStorage.getItem("surveyLocationCode"))
                showSurveyLocationCode();
            }

            $(".addToBusinessType").on('click',function(){
                let numRequired = 0;
                $(".field_required").each(function(e){
                    if($(this).val() == null || $(this).val() == ""){
                        $(this).css("border-color","red");
                        numRequired++;
                    }
                });  
                $(".field_add_business_required").each(function(e){
                    if($(this).val() == null || $(this).val() == ""){
                        $(this).css("border-color","red");
                        numRequired++;
                    }
                });
                if (numRequired > 0) {
                    toastr.warning("@lang('lang.input_require')", "@lang('lang.message_title')");
                }else{

                    let business_type = $("#business_type_id option:selected").text();
                    let business_type_id = $("#business_type_id option:selected").val();
                    let category = $("#category_id option:selected").text();
                    let category_id = $("#category_id option:selected").val();
                    let sub_category = $("#sub_category_id option:selected").text();
                    let sub_category_id = $("#sub_category_id option:selected").val();
                    let multiply = $("#fm_multiply").val();
                    let monthly_fee = $("#fm_monthly_fee").val();
                    let land_filed_fee = $("#fm_land_filed_fee").val();
                    let total_fee = $("#fm_total_fee").val();
                    let grand_total = $("#fm_grand_total").val();

                    // create JavaScript Object
                    let item = {
                        business_type: business_type,
                        business_type_id: business_type_id,
                        category: category,
                        category_id: category_id,
                        sub_category: sub_category,
                        sub_category_id: sub_category_id,
                        multiply: multiply,
                        monthly_fee: monthly_fee,
                        land_filed_fee: land_filed_fee,
                        total_fee: total_fee,
                        grand_total: parseInt(multiply) * (parseInt(monthly_fee) + parseInt(land_filed_fee))

                    }
                    surveyBusinessType.push(item);
                    $(".survey_disabled").prop('disabled', true);
                    $(".clear_business_type").val("");
                    SetLocalStorageBusinessType();
                    ShowSurveyBusinessType();
                    clearCalculatorFee();
                }
            });
             // clear field add business required 
            $(".field_add_business_required").on('focus',function(){
                $(this).css("border-color","#1e9ff2");
            });
            $(".field_add_business_required").on('focusout',function(){
                $(this).css("border-color","#d8d2d2");
            });

            $("#addSurveyDetail").on('click',async function() {
                let numRequired = 0;
                let imgSrc = $('.image-preview img');
                $(".field_survey_detail_required").each(function(e){
                    if($(this).val() == null || $(this).val() == ""){
                        $(this).css("border-color","red");
                        numRequired++;
                    }
                });
                if (imgSrc.length < 1) {
                    $(".required_image").css("border","1px solid red");
                    numRequired++;
                }
                if (numRequired > 0) {
                    toastr.warning("@lang('lang.input_require')", "@lang('lang.message_title')");
                }else{
                    let file_img =  $("#image_location")[0].files;

                    if (file_img.length == 0) {
                        toastr.error("Please input image", "Location image is empty!");
                        return;
                    }
                    // get image on attr img
                    let image_location = [];
                    imgSrc.each(function(){
                        let srcValue = $(this).attr('src');
                        image_location.push(srcValue);
                    });
                    dataStoreSurveyDetail(image_location);
                   
                }
            });
            // preview image
            $('#image_location').on('change', function(event) {
                handleImageUpload(event.target.files, '.imgGallery'); // class for display image
                // class required
                $(".required_image").removeAttr('style');
            });
            // clear field survey detail required 
            $(".field_survey_detail_required").on('focus',function(){
                $(this).css("border-color","#1e9ff2");
            });
            $(".field_survey_detail_required").on('focusout',function(){
                $(this).css("border-color","#d8d2d2");
            });

            function dataStoreSurveyDetail(image_location){
                // let image_location = $("#image_location")[0].files;
                 
                let block = $("#block").val();
                let sector = $("#sector").val();
                let street_no = $("#street_no").val();
                let side_of_street = $("#side_of_street").val();

                let order_of_house = $("#order_of_house").val();
                let devide_order = $("#devide_order").val();
                let floor = $("#floor").val();
                let position = $("#position").val();

                let house_no = $("#house_no").val();
                let survey_name = $("#survey_name").val();
                let business_name = $("#business_name").val();
                let location_latitude = $("#location_latitude").val();
                let location_longitude = $("#location_longitude").val();
                let link_map = $("#link_map").val();
                let total_amount = $("#sum_grand_total").val();
                let location_code = block + sector + street_no + side_of_street + order_of_house + devide_order + floor + position;

                // update survey is already present
                //    Check field
                if (block == '' || sector == '' || street_no == '' || side_of_street == '' || order_of_house == '' || devide_order == '' || floor == '' || position == '') {
                    toastr.error("Please check field Location", "Please fill in the field");
                    return;
                }
                // check businessType
                if(!JSON.parse(localStorage.getItem("surveyBusinessType")))
                {
                    toastr.error("@lang('lang.business_type_empty')", "@lang('lang.message_title')");
                    return;
                }
                // check dulicate location code with local
                if(JSON.parse(localStorage.getItem("surveyLocationCode"))){
                    for (let locationCode of JSON.parse(localStorage.getItem("surveyLocationCode"))) {
                        if(locationCode.location_code == location_code)
                        {
                            toastr.error("@lang('lang.location_code_have_already')", "@lang('lang.message_title')");
                            return;
                        }
                    }
                };
                // check dulicate location code with database
                $.ajax({
                    type: "GET",
                    url: `{{url('admins/survey/check_dulicate_location/${location_code}')}}`,
                    success: function (response) {
                        if (response == 1) {
                            toastr.error("@lang('lang.location_code_have_already')", "Dulicate Location code on Database");
                            return;
                        }

                        // create JavaScript Object
                        let nameBusinessType = JSON.parse(localStorage.getItem("surveyBusinessType"));
                        let StrNameBusiness = '';
                        for (let i=0; i < nameBusinessType.length; i++) {
                            StrNameBusiness += i==0 ? nameBusinessType[i].business_type_id : ','+ nameBusinessType[i].business_type_id;
                        }
                        let items = {
                            location_code : location_code,
                            location_latitude : location_latitude,
                            location_longitude : location_longitude,
                            link_map : link_map,
                            business_name : StrNameBusiness,
                            order_of_house : order_of_house,
                            devide_order : devide_order,
                            floor : floor,
                            position : position,
                            house_no : house_no,
                            survey_name : survey_name,
                            business_name : business_name,
                            image_location: image_location,
                            total_amount : total_amount,
                            businessType: JSON.parse(localStorage.getItem("surveyBusinessType"))
                        };
                        surveyLocationCode.push(items);
                        SetLocalStorageLocationCode();
                        showSurveyLocationCode();
                    }
                });
            }

            //function on change business type
            $('.onChangeBusinessType').on('change',function(){
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
                        $('#sub_category_id').empty();
                        $('#category_id').append('<option>Please Select</option>');
                        $.each(response.data, function(index, item)
                        {
                            $('#category_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        clearCalculatorFee();
                    }
                });
            });
            // function on Change Category
            $('.onChangeCategory').on('change',function(){
                var cagegory_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/survey/category/onchange')}}",
                    data: {
                        cagegory_id : cagegory_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option>Please Select</option>');
                        $.each(response.data, function(index, item)
                        {
                            $('#sub_category_id').append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                        clearCalculatorFee();
                    }
                });
            });

            // function on change subcagory
            $('.onChangeSubCategory').on('change',function(){
                var sub_cagegory_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/survey/sub-category/onchange')}}",
                    data: {
                        sub_cagegory_id : sub_cagegory_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        calculatorFee(response.data);
                        $(".field_add_business_required").each(function(){
                        if($(this).val() !="" || $(this).val() != null){
                            $(this).css("border-color","#d8d2d2");
                        }
                    });
                    }
                });
            });

            function calculatorFee(response){
                $("#fm_multiply").val(1);
                $('#fm_monthly_fee').val(response.monthly_fee);
                $('#fm_land_filed_fee').val(response.land_filed_fee);
                $('#fm_total_fee').val(response.total_fee);
                $('#fm_grand_total').val(response.total_fee);
                total_fee_business_type = response.total_fee;
            }
            function clearCalculatorFee(){
                $('#fm_monthly_fee').val(null);
                $('#fm_land_filed_fee').val(null);
                $('#fm_total_fee').val(null);
                $('#fm_grand_total').val(null);
                $('#fm_multiply').val(1);
                total_fee_business_type = 0;
            }

            // function on change multiply
            $("#fm_multiply").on('change',function(){
                var multiply = $("#fm_multiply").val();
                let grand_total = multiply * total_fee_business_type;
                $('#fm_total_fee').val(total_fee_business_type);
                $('#fm_grand_total').val(grand_total);
            });

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

            $("#btnSubmitSurvey").on("click",function(){
                SaveDataSurve();
            });

            $("#sortable tbody").delegate(".removeRecord", "click", function(){
                deleteItem();
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

        function SaveDataSurve(){  
            let numRequired = 0;
            $(".field_required").each(function(e){
                if($(this).val() == null || $(this).val() == ""){
                    $(this).css("border-color","red");
                     numRequired++;
                }
            });            
            if (numRequired > 0) {
                toastr.warning("@lang('lang.input_require')", "@lang('lang.message_title')");
            }else{

                let data = {
                    surveyDetail : JSON.parse(localStorage.getItem("surveyLocationCode")),
                    survey_by : $("#survey_by").val(),
                    survey_date : $("#survey_date").val(),
                    entry_date : $("#entry_date").val(),
                    block : $("#block").val(),
                    sector : $("#sector").val(),
                    street_no : $("#street_no").val(),
                    side_of_street : $("#side_of_street").val(),
                    zone_name : $("#zone_name").val(),
                    start_piont : $("#start_piont").val(),
                    end_piont : $("#end_piont").val(),
                    add_street : $("#add_street").val(),
                    province : $("#province_code").val(),
                    district : $("#district").val(),
                    commune : $("#commune").val(),
                    village : $("#village").val(),
                    total_amount : $("#sum_total_amount").val(),
                };
                if (JSON.parse(localStorage.getItem("surveyLocationCode")) == null) {
                    toastr.error("Please add location", "Empty Location Code");
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: "{{url('admins/survey')}}",
                    dataType: "JSON",
                    data: data,
                    success: function (response) {
                        console.log(response);
                        if (response.message=='successfull') {
                            toastr.success("@lang('lang.data_has_been_save_success')", "@lang('lang.message_title')");
                        }
                        localStorage.clear();
                        window.location.replace("{{ URL('admins/survey') }}");
                    }
                });
            }
        }
        // clear field required 
        $(".field_required").on('focus',function(){
            $(this).css("border-color","#1e9ff2");
        });  
        $(".field_required").on('focusout',function(){
            $(this).css("border-color","#d8d2d2");
        });

        function ShowSurveyBusinessType() {
            $("#tbl_business_type").empty();
            if (JSON.parse(localStorage.getItem("surveyBusinessType"))) {
                let sum_grand_total = 0;
                for (var [index, item] of surveyBusinessType.entries()) {
                    var row = "<tr class='section-row' style='text-align: center'>"+
                        // '<td>'+
                        //     '<input type="text" id="business_location_code" name="business_location_code" class="form-control business_location_code" value="'+item.business_location_code+'" disabled>'+
                        // '</td>'+
                        '<td>'+
                            '<input type="text" id="business_type" name="business_type" class="form-control business_type" value="'+item.business_type+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="category_id" name="category_id" class="form-control category_id" value="'+item.category+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="sub_category_id" name="sub_category_id" class="form-control sub_category_id" value="'+item.sub_category+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="multiply" name="multiply" class="form-control multiply" value="'+item.multiply+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="total_fee" name="total_fee" class="form-control total_fee" value="'+item.total_fee+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="total_land_filed" name="total_land_filed" class="form-control total_land_filed" value="'+item.grand_total+'" disabled>'+
                        '</td>'+
                        "<td>"+`<button class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 removeRecord' title='Delete Record' onclick='removeItemBusinessType(${index})'><span><i class='fal fa-times'></i></span></button></td>`+
                    "</tr>";
                    $("#tbl_business_type").append(row);
                    sum_grand_total += Number(item.grand_total);
                }
                $("#sum_grand_total").val(sum_grand_total);
            }
        }

        function showSurveyLocationCode() {
            $("#tab_survey_location_code").empty();
            if (localStorage.getItem("surveyLocationCode")) {
                let sum_total_amount = 0;
                for (let [index, item]  of JSON.parse(localStorage.getItem("surveyLocationCode")).entries()) {
                    var row = "<tr class='section-row' style='text-align: center'>"+
                        '<td>'+
                            '<input type="text" id="survey_location_code" name="survey_location_code" class="form-control survey_location_code" value="'+item.location_code+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="business_type" name="business_type" class="form-control business_type" value="'+item.business_name+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="order_of_house" name="order_of_house" class="form-control order_of_house" value="'+item.order_of_house+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="devide_order" name="devide_order" class="form-control devide_order" value="'+item.devide_order+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="floor" name="floor" class="form-control floor" value="'+item.floor+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="position" name="position" class="form-control position" value="'+item.position+'" disabled>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" id="position" name="position" class="form-control position" value="'+item.total_amount+'" disabled>'+
                        '</td>'+
                        "<td>"+`<button class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 removeRecord' title='Delete Record' onclick='removeItemLocationCode(${index})''><span><i class='fal fa-times'></i></span></button></td>`+
                    "</tr>";
                    $("#tab_survey_location_code").append(row);
                    sum_total_amount += Number(item.total_amount);
                }
                $("#sum_total_amount").val(sum_total_amount);
            }
        }

        function removeItemBusinessType(index){
            if (index > -1) {
                surveyBusinessType.splice(index, 1);
            }
            SetLocalStorageBusinessType();
            ShowSurveyBusinessType();
        }
        function removeItemLocationCode(index){
            if (index > -1) {
                surveyLocationCode.splice(index, 1);
            }
            SetLocalStorageLocationCode(1);
            showSurveyLocationCode();
        }

        function ClearSurveyBusinessType(){
           localStorage.removeItem("surveyBusinessType");
           surveyBusinessType = [];
           $("#sum_grand_total").val(0);
            ShowSurveyBusinessType();
        }
        function ClearlocalStorageBusinessType(){
            localStorage.removeItem('surveyBusinessType');
            if(localStorage.getItem("surveyBusinessType") == null){
                surveyBusinessType = [];
                $("#tbl_business_type").empty();
                $("#sum_grand_total").val(0);

                $(".field_survey_detail_required").each(function(e){
                    $(this).val("");
                });
                $('.image-preview').remove();
            }
        }
        function deleteItem(){
            $("#sortable tbody").delegate(".removeRecord", "click", function(){
                var tr = $("#sortable tbody tr").length;
                if(tr > 1){
                    var tr = $(this).parent().parent();
                    tr.remove();
                }
            });
        }

        function SetLocalStorageBusinessType() {
            if (window.localStorage)
            {
                localStorage.setItem("surveyBusinessType", JSON.stringify(surveyBusinessType));
            }
        }

        function SetLocalStorageLocationCode(remove_item = 0) {
            if (window.localStorage)
            {
                localStorage.setItem("surveyLocationCode", JSON.stringify(surveyLocationCode));
                if (remove_item == 0)  {
                    ClearlocalStorageBusinessType();
                }
            }
        }
    </script>
@endsection
