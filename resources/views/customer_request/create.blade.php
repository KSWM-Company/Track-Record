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
    <div class="row mb-2">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="search">
                                <i class="uil uil-search"></i>
                                <input spellcheck="false" id="customer_search" class="form-control customer_required_search customer_no" type="text" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="javascript:void(0)" class="btn btn-outline-success" id="btnSearch">@lang('lang.search')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
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
                                <select class="form-control customer_required" name="request_by" id="request_by">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($collector as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="request_date">@lang('lang.request_date') <span class="text-danger">*</span></label>
                                <input type="date" id="request_date" name="request_date" class="form-control customer_required" value="">
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
                            @lang('lang.old_customers')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="customer_name">@lang('lang.customer_name') <span class="text-danger">*</span></label>
                                <input type="text" id="customer_name" name="customer_name" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="business_name">@lang('lang.business_name') <span class="text-danger">*</span></label>
                                <input type="text" id="business_name" name="business_name" class="form-control " value="" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="email">@lang('lang.email')</label>
                                <input type="email" id="email" name="email" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="zone_name">@lang('lang.zone_name')</label>
                                <input type="" id="zone_name" name="zone_name" class="form-control" value="" disabled>
                            </div>
                        </div>
                       <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label" for="house_no">@lang('lang.house_no')</label>
                                <input type="text" id="house_no" name="house_no" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="add_street">@lang('lang.add_street')</label>
                                <input type="text" id="add_street" name="add_street" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="vatin">@lang('lang.vatin')</label>
                                <input type="text" id="vatin" name="vatin" class="form-control" value="" disabled>
                            </div>
                       </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="province_code">@lang('lang.province') <span class="text-danger">*</span></label>
                                <input type="text" id="province_code" name="province_code" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="district">@lang('lang.district') <span class="text-danger">*</span></label>
                                <input type="text" id="district" name="district" class="form-control" value="" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="commune">@lang('lang.commune') <span class="text-danger">*</span></label>
                                <input type="text" id="commune" name="commune" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="village">@lang('lang.village') <span class="text-danger">*</span></label>
                                <input type="text" id="village" name="village" class="form-control" value="" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="longitude">@lang('lang.longitude')</label>
                                <input type="text" id="location_latitude" name="location_latitude" class="form-control " value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="latitude">@lang('lang.latitude') <span class="text-danger">*</span></label>
                                <input type="text" id="location_longitude" name="location_longitude" class="form-control " value="" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label class="form-label" for="link_google_map">@lang('lang.link_google_map') <span class="text-danger">*</span></label>
                                <input type="text" id="link_google_map" name="link_google_map" class="form-control " value="" disabled>
                            </div>
                        </div>
                        <div class="">
                            <div class="img-preview preview-md">
                                <img src="" id="image_customer_location" style="padding-left: 5px;" width="100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.new_customers')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="customer_name">@lang('lang.customer_name')</label>
                                <input type="text" id="new_customer_name" name="new_customer_name" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="business_name">@lang('lang.business_name')</label>
                                <input type="text" id="new_business_name" name="new_business_name" class="form-control" value="">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="email">@lang('lang.email')</label>
                                <input type="email" id="new_email" name="new_email" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="zone_name">@lang('lang.zone_name')</label>
                                <input type="new_zone_name" id="new_zone_name" name="zone_name" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label" for="single-default">@lang('lang.house_no')</label>
                                <input type="text" id="new_house_no" name="new_house_no" class="form-control" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="single-default">@lang('lang.add_street')</label>
                                <input type="text" id="new_add_street" name="new_add_street" class="form-control" value="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="vatin">@lang('lang.vatin')</label>
                                <input type="text" id="new_vatin" name="new_vatin" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.province')</label>
                                <select class="select2 form-control" name="new_province_code" id="new_province_code">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($province as $item)
                                        <option value="{{$item->code}}">{{$item->khmer}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.district')</label>
                                <select class="select2 form-control" name="new_district" id="new_district">

                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.commune')</label>
                                <select class="select2 form-control" name="new_commune" id="new_commune">

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.village')</label>
                                <select class="select2 form-control" name="new_village" id="new_village">

                                </select>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="latitude">@lang('lang.latitude')</label>
                                <input type="text" id="new_location_latitude" name="new_location_latitude" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="longitude">@lang('lang.longitude')</label>
                                <input type="text" id="new_location_longitude" name="new_location_longitude" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label class="form-label" for="link_google_map">@lang('lang.link_google_map')</label>
                                <input type="text" id="new_link_google_map" name="new_link_google_map" class="form-control" value="">
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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.business_type')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="mb-1" style="text-align: right;">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm addToBusinessType"><i class="fal fa-times" aria-hidden="true"></i> Add</a>
                        </div>
                        <div class="table-responsive">
                            <table class="kswn-table table-bordered" id="tbl_customer_business_type">
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
                                <tbody>
                                </tbody>
                            </table>
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
                            @lang('lang.old_payment_type')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="fee">@lang('lang.fee')</label>
                                <input type="text" id="fee" name="fee" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="total_fee">@lang('lang.total_fee')</label>
                                <input type="text" id="total_fee" name="total_fee" class="form-control" value="" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="vat">@lang('lang.vat')</label>
                                <input type="text" id="vat" name="vat" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="vat_amount">@lang('lang.vat_amount')</label>
                                <input type="text" id="vat_amount" name="vat_amount" class="form-control" value="" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="currency">@lang('lang.currency')</label>
                                <input type="text" id="currencies" name="currencies" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="payment_type">@lang('lang.payment_types')</label>
                                <input type="text" id="payment_type" name="payment_type" class="form-control" value="" disabled>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="collector">@lang('lang.collector')</label>
                                <input type="text" id="collector" name="collector" class="form-control" value="" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="collection_date">@lang('lang.collection_date')</label>
                                <input type="text" id="collection_date" name="collection_date" class="form-control" value="" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.new_payment_type')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="fee">@lang('lang.fee')</label>
                                <input type="text" id="new_fee" name="new_fee" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="new_total_fee">@lang('lang.total_fee')</label>
                                <input type="text" id="new_total_fee" name="new_total_fee" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.vat')</label>
                                <select class="form-control" name="new_vat" id="new_vat">
                                    <option value="0">No VAT</option>
                                    <option value="1">Include VAT</option>
                                    <option value="2">Exclude VAT</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="vat_amount">@lang('lang.vat_amount')</label>
                                <input type="text" id="new_vat_amount" name="new_vat_amount" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="currency">@lang('lang.currency')</label>
                                <select class="form-control" name="new_currency" id="new_currency">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($currency as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="payment_type">@lang('lang.payment_types')</label>
                                <select class="form-control" name="new_payment_type" id="new_payment_type">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($paymentType as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="collector">@lang('lang.collector')</label>
                                <select class="form-control" name="new_collector" id="new_collector">
                                    @foreach ($collector as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="collection_date">@lang('lang.collection_date')</label>
                                <div class="input-group">
                                    <input type="date" id="new_collection_date" name="new_collection_date" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-12">
                    <div style="text-align: right;">
                        <input type="hidden" value="" id="location_code">
                        <input type="hidden" value="" id="customer_id">
                        <input type="hidden" value="" id="branch_id">
                        <a href="javascript:void(0)" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSubmit">@lang('lang.submit')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function(){
            var dataBusinessType = {!! \App\Models\BusinessType::get(); !!};
            var path = "{{ url('admins/customer/chang/request/autocomplet') }}";
            $('#customer_search').typeahead({
                source: function (query, process) {
                    return $.get(path, {
                        query: query
                    }, function (response) {
                        return process(response);
                    });
                }
            });
            $("#btnSubmit").on('click',function(){
                saveCustomerChaneRequest();
            });
            // preview image
            $('#chooseFile').on('change', function(event) {
                handleImageUpload(event.target.files, '.imgGallery');
            });
            $("#btnSearch").on('click',function(){
                let numRequired = 0;
                $(".customer_required_search").each(function(e){
                    if($(this).val()==""){ numRequired++;}
                });            
                if (numRequired>0) {
                    toastr.warning("@lang('lang.input_require')", "@lang('lang.message_title')");
                    $(".customer_required_search").each(function(){
                        if($(this).val()==""){
                            $(this).css("border-color","red");
                        }
                    });
                }else{
                    var search = $("#customer_search").val();
                    $.ajax({
                        type: "GET",
                        url: "{{url('admins/customer/chang/request/filter')}}",
                        data: {
                            search : search
                        },
                        dataType: "JSON",
                        success: function (response) {
                            if (response.data) {
                                if (response.customerFile != '') {
                                    $.each(response.customerFile, function(i, item) {
                                        var imagePath = item.full_path ? item.full_path : "{{asset('admin/img/defuals/2023-10-12_10-04-19-removebg-preview.png')}}";
                                        $('#image_customer_location').attr('src', imagePath);
                                    });
                                }
                                
                                $("#customer_id").val(response.data.id)
                                $("#branch_id").val(response.data.branch_id)
                                $("#location_code").val(response.data.location_code)
                                $("#customer_name").val(response.data.customer_name)
                                $("#business_name").val(response.data.business_name)
                                $("#email").val(response.data.email)
                                $("#zone_name").val(response.data.zone_name)
                                $("#house_no").val(response.data.houes_no)
                                $("#add_street").val(response.data.add_streed)
                                $("#vatin").val(response.data.vatin)
                                $("#vat").val(response.data.vat)
                                $("#currencies").val(response.data.currencies_name)
                                $("#payment_type").val(response.data.payment_types)
                                $("#collector").val(response.data.collector_name)
                                $("#collection_date").val(response.data.collection_date)
                                $("#vat_amount").val(response.data.vat_amount)
                                $("#fee").val(response.data.fee)
                                $("#total_fee").val(response.data.total_fee)
                                $("#province_code").val(response.data.province_name_khmer)
                                $("#district").val(response.data.district_name_khmer)
                                $("#commune").val(response.data.commune_name_khmer)
                                $("#village").val(response.data.village_name_khmer)
                                $("#location_latitude").val(response.data.location_latitude)
                                $("#location_longitude").val(response.data.location_longitude)
                                $("#link_google_map").val(response.data.google_map)
                            }
                            if (response.dataCustomerBusinessType) {
                                let data = response.dataCustomerBusinessType;
                                var tr = "";
                                if (data.length > 0) {
                                    data.map((row,index) => {
                                        tr += '<tr class="odd row_'+index+'">'+
                                            '<td>';
                                                if (response.businessTypes && response.businessTypes.length > 0) {
                                                    tr += `<select style="width: 300px" class="form-control business_type" name="business_type_id" id="business_type_id_${index}">`+
                                                        '<option selected disabled>-- Select --</option>';
                                                        response.businessTypes.forEach(item => {
                                                            tr += `<option value="${item.id}" ${item.id == row.business_type_id ? 'selected' : ''}>${item.name}</option>`;
                                                        });
                                                    tr += '</select>';
                                                }
                                            tr += '</td>'+
                                            '<td>';
                                                if (response.categories && response.categories.length > 0) {
                                                    tr += `<select style="width: 300px" class="form-control category" name="category_id" id="category_id_${index}">`+
                                                        '<option selected disabled>-- Select --</option>';
                                                        response.categories.forEach(item => {
                                                            tr += `<option value="${item.id}" ${item.id == row.category_id ? 'selected' : ''}>${item.name}</option>`;
                                                        });
                                                    tr += '</select>';
                                                }
                                            tr += '</td>'+
                                            '<td>';
                                                if (response.sub_categories && response.sub_categories.length > 0) {
                                                    tr += `<select style="width: 300px" class="form-control sub_category" name="sub_category_id" id="sub_category_id_${index}">`+
                                                        '<option selected disabled>-- Select --</option>';
                                                        response.sub_categories.forEach(item => {
                                                            tr += `<option value="${item.id}" ${item.id == row.sub_category_id ? 'selected' : ''}>${item.name}</option>`;
                                                        });
                                                    tr += '</select>';
                                                }
                                            tr += '</td>'+
                                            `<td><input style="width: 100px" type="text" id="multiply_${index}" name="multiply" class="form-control multiply" value="${row.multiply}"></td>`+
                                            `<td><input style="width: 100px" type="text" id="total_fee_${index}" name="total_fee" class="form-control total_fee" value="${row.grand_total}"></td>`+
                                            `<td><input style="width: 100px" type="text" id="grand_total_${index}" name="grand_total" class="form-control grand_total" value="${row.grand_total}"></td>`+
                                            "<td>"+
                                                `<input type="hidden" id="monthly_fee_${index}" name="monthly_fee" class="form-control monthly_fee" value="${row.monthly_fee}">`+
                                                `<input type="hidden" id="land_filed_fee_${index}" name="land_filed_fee" class="form-control land_filed_fee" value="${row.land_filed_fee}">`+
                                                `<button class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record' onclick='removeBusinessType(${index})'><span><i class='fal fa-times'></i></span></button>`+
                                            '</td>'+
                                        '</tr>';
                                        
                                        
                                        //function on change business type
                                        $(document).on('change', `#business_type_id_${index}`, function() {
                                            var business_type_id = $(this).val();
                                            $.ajax({
                                                type: "POST",
                                                url: "{{url('/admins/business_type/onchange')}}",
                                                data: {
                                                    business_type_id : business_type_id
                                                },
                                                dataType: "JSON",
                                                success: function (response) {
                                                    $(`#category_id_${index}`).empty();
                                                    $(`#category_id_${index}`).append('<option value="">Please Select</option>');
                                                    $.each(response.data, function(i, item) {
                                                        $(`#category_id_${index}`).append(`<option value="${item.id}">${item.name}</option>`);
                                                    });
                                                }
                                            });
                                        });
                                        // function on Change Category
                                        $(document).on('change', `#category_id_${index}`, function() {
                                            var cagegory_id = $(this).val();
                                            $.ajax({
                                                type: "POST",
                                                url: "{{url('/admins/customer/category/onchange')}}",
                                                data: {
                                                    cagegory_id : cagegory_id
                                                },
                                                dataType: "JSON",
                                                success: function (response) {
                                                    $(`#sub_category_id_${index}`).empty();
                                                    $(`#sub_category_id_${index}`).append('<option value="">Please Select</option>');
                                                    $.each(response.data, function(i, item)
                                                    {
                                                        $(`#sub_category_id_${index}`).append(`<option value="${item.id}">${item.name}</option>`);
                                                        $(`#total_fee_${index}`).val(item.total_fee);
                                                        $(`#grand_total_${index}`).val(item.total_fee);
                                                    });
                                                }
                                            });
                                        });

                                        // function on change subcagory
                                        $(document).on('change', `#sub_category_id_${index}`, function() {
                                            var sub_cagegory_id = $(this).val();
                                            $.ajax({
                                                type: "POST",
                                                url: "{{url('/admins/customer/sub-category/change')}}",
                                                data: {
                                                    sub_cagegory_id : sub_cagegory_id
                                                },
                                                dataType: "JSON",
                                                success: function (response) {
                                                    $(`#total_fee_${index}`).empty();
                                                    $(`#grand_total_${index}`).empty();
                                                    $.each(response.data, function(i, item)
                                                    {
                                                        calculatorFee(response.data);
                                                    });
                                                }
                                            });
                                        });
                                        function calculatorFee(response){
                                            $(`#multiply_${index}`).val(1);
                                            $(`#total_fee_${index}`).val(response.total_fee);
                                            $(`#land_filed_fee_${index}`).val(response.land_filed_fee);
                                            $(`#monthly_fee_${index}`).val(response.monthly_fee);
                                            $(`#grand_total_${index}`).val(response.total_fee);
                                        }
                                    });
                                } else {
                                    tr = '<tr><td colspan=7 align="center">No data available in table</td></tr>';
                                }
                                $("#tbl_customer_business_type tbody").html(tr);
                            }
                        }
                    });
                }
            });
            // customer_required
            $(".customer_required").on('focus',function(){
                $(this).css("border-color","#1e9ff2");
            });  
            $(".customer_required").on('focusout',function(){
                $(this).css("border-color","#d8d2d2");
            });
            //customer_required_search
            $(".customer_required_search").on('focus',function(){
                $(this).css("border-color","#1e9ff2");
            });  
            $(".customer_required_search").on('focusout',function(){
                $(this).css("border-color","#d8d2d2");
            });
            //function on change province
            $("#new_province_code").on("change", function(){
                let id = $("#new_province_code").val() ?? $("#new_province_code").val();
                let optionSelect = "Province";
                $('#new_district').html('<option selected disabled> -- @lang("lang.select") --</option>');
                $('#new_commune').html('<option selected disabled> -- @lang("lang.select") --</option>');
                $('#new_village').html('<option selected disabled> -- @lang("lang.select") --</option>');
                showProvince(id, optionSelect);
            });
            $("#new_district").on("change", function(){
                let id = $("#new_district").val() ?? $("#new_district").val();
                let optionSelect = "District";
                $('#new_commune').html('<option selected disabled> -- @lang("lang.select") --</option>');
                $('#new_village').html('<option selected disabled> -- @lang("lang.select") --</option>');
                showProvince(id, optionSelect);
            });
            $("#new_commune").on("change", function(){
                let id = $("#new_commune").val() ?? $("#new_commune").val();
                let optionSelect = "Commune";
                $('#new_village').html('<option selected disabled> -- @lang("lang.select") --</option>');
                showProvince(id, optionSelect);
            });

            //function add to business type
            $(".addToBusinessType").on('click',function(){
                AddNewRecord();
            });
        });
        function removeBusinessType(index){
            if (index > -1) {
                $(`.row_${index}`).remove();
            }
        }
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
                                $('#new_district').append($('<option>', option));
                            }else if(optionSelect == "District"){
                                $('#new_commune').append($('<option>', option));
                            }else if (optionSelect == "Commune") {
                                $('#new_village').append($('<option>', option));
                            }
                        });
                    }
                }
            });
        }

        function removeRecord(button) {
            $(button).closest('tr').remove();
        }
        //function add new record
        function AddNewRecord(){
            var index = $("#tbl_customer_business_type tbody tr").length; 
            var html = `<tr class='section-row' style='text-align: center'>
                <td>
                    <select style="width: 300px" class="form-control business_type" name="business_type_id[${index}]" id="add_new_business_type_id_${index}">
                        <option value="">-- @lang('lang.select') --</option>
                        @foreach ($dataBusinessType as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select style="width: 300px" class="form-control category" name="category_id[${index}]" id="add_new_category_id_${index}">
                        <option value="">-- @lang('lang.select') --</option>
                    </select>
                </td>
                <td>
                    <select style="width: 300px" class="form-control sub_category" name="sub_category_id[${index}]" id="add_new_sub_category_id_${index}">
                        <option value="">-- @lang('lang.select') --</option>
                    </select>
                </td>
                <td>
                    <input style="width: 100px" type="text" id="add_new_multiply_${index}" name="multiply[${index}]" class="form-control multiply" value="1">
                </td>
                <td>
                    <input style="width: 100px" type="text" id="add_new_total_fee_${index}" name="total_fee[${index}]" class="form-control total_fee" value="">
                </td>
                <td>
                    <input style="width: 100px" type="text" id="add_new_grand_total_${index}" name="grand_total[${index}]" class="form-control grand_total" value="">
                </td>
                <td>
                    <input type="hidden" id="monthly_fee_${index}" name="monthly_fee" class="form-control monthly_fee" value="">
                    <input type="hidden" id="land_filed_fee_${index}" name="land_filed_fee" class="form-control land_filed_fee" value="">
                    <button class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record' onclick='removeRecord(this)'><span><i class='fal fa-times'></i></span></button>
                </td>
            </tr>`;
            $("#tbl_customer_business_type tbody").append(html);

            //function on change business type new record
            $(document).on('change', `#add_new_business_type_id_${index}`, function() {
                var business_type_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/business_type/onchange')}}",
                    data: {
                        business_type_id : business_type_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $(`#add_new_category_id_${index}`).empty();
                        $(`#add_new_category_id_${index}`).append('<option value="">Please Select</option>');
                        $.each(response.data, function(i, item)
                        {
                            $(`#add_new_category_id_${index}`).append('<option value="'+item.id+'">'+item.name+'</option>');
                        });
                    }
                });
            });

            
            // function on Change Category new record
            $(document).on('change', `#add_new_category_id_${index}`, function() {
                var cagegory_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/customer/category/onchange')}}",
                    data: {
                        cagegory_id : cagegory_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $(`#add_new_sub_category_id_${index}`).empty();
                        $(`#add_new_sub_category_id_${index}`).append('<option value="">Please Select</option>');
                        $.each(response.data, function(i, item)
                        {
                            $(`#add_new_sub_category_id_${index}`).append('<option value="'+item.id+'">'+item.name+'</option>');
                            $(`#add_new_total_fee_${index}`).val(item.total_fee);
                            $(`#add_new_grand_total_${index}`).val(item.total_fee);
                        });
                    }
                });
            });
            // function on change subcagory new record
            $(document).on('change', `#add_new_sub_category_id_${index}`, function() {
                var sub_cagegory_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{url('/admins/customer/sub-category/change')}}",
                    data: {
                        sub_cagegory_id : sub_cagegory_id
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $(`#add_new_total_fee_${index}`).empty();
                        $(`#add_new_grand_total_${index}`).empty();
                        $.each(response.data, function(i, item)
                        {
                            calculatorFee(response.data);
                        });
                    }
                });
            });
            function calculatorFee(response){
                $(`#add_new_multiply_${index}`).val(1);
                $(`#add_new_total_fee_${index}`).val(response.total_fee);
                $(`#land_filed_fee_${index}`).val(response.land_filed_fee);
                $(`#monthly_fee_${index}`).val(response.monthly_fee);
                $(`#add_new_grand_total_${index}`).val(response.total_fee);
            }
        }

        function saveCustomerChaneRequest(){
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
                var itemBusineeType = [];
                $(".business_type").each(function(e){
                    let tr = $(this).parent().parent();
                    itemBusineeType[e] = {
                        business_type_id : tr.find(".business_type").val(),
                        category_id : tr.find(".category").val(),
                        sub_category_id : tr.find(".sub_category").val(),
                        multiply : tr.find(".multiply").val(),
                        total_fee : tr.find(".total_fee").val(),
                        monthly_fee : tr.find(".monthly_fee").val(),
                        land_filed_fee : tr.find(".land_filed_fee").val(),
                        grand_total : tr.find(".grand_total").val(),
                    };
                });
                let arrImage = [];
                $('.imgGallery img').each(function(){
                    var srcValue = $(this).attr('src');
                    arrImage.push({"path_name":srcValue});
                });
                $.ajax({
                    type: "POST",
                    url: "{{url('admins/customer/chang/request/store')}}",
                    data: {
                        customer_id : $("#customer_id").val(),
                        branch_id : $("#branch_id").val(),
                        customer_no : $(".customer_no").val(),
                        location_code : $("#location_code").val(),
                        customer_name : $("#new_customer_name").val(),
                        business_name : $("#new_business_name").val(),
                        email : $("#new_email").val(),
                        zone_name : $("#new_zone_name").val(),
                        house_no : $("#new_house_no").val(),
                        add_street : $("#new_add_street").val(),
                        vatin : $("#new_vatin").val(),
                        province : $("#new_province_code").val(),
                        district : $("#new_district").val(),
                        commune : $("#new_commune").val(),
                        village : $("#new_village").val(),
                        location_latitude : $("#new_location_latitude").val(),
                        location_longitude : $("#new_location_longitude").val(),
                        link_map : $("#new_link_google_map").val(),
                        itemBusineeType : itemBusineeType,
                        arrImage : arrImage,
                        fee : $("#new_fee").val(),
                        total_fee : $("#new_total_fee").val(),
                        vat : $("#new_vat").val(),
                        vat_amount : $("#new_vat_amount").val(),
                        currency : $("#new_currency").val(),
                        payment_type : $("#new_payment_type").val(),
                        collector : $("#new_collector").val(),
                        collection_date : $("#new_collection_date").val(),
                        request_by : $("#request_by").val(),
                        request_date : $("#request_date").val(),
                        reson : $("#reson").val(),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if (response.message=='successfull') {
                            toastr.success("@lang('lang.data_has_been_save_success')", "@lang('lang.message_title')");
                        }
                        window.location.replace("{{ URL('admins/customer/chang/request') }}");
                    }
                });
            }
        }
    </script>
@endsection
