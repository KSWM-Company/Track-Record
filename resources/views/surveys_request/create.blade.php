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
        <div class="col-md-4">
            <div class="search">
                <i class="uil uil-search"></i>
                <input spellcheck="false" id="survey_search" class="form-control survey_required" type="text" placeholder="Search Location Code">
            </div>
        </div>
        <div class="col-md-2">
            <a href="javascript:void(0)" class="btn btn-outline-success" id="btnSearch">@lang('lang.search')</a>
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
                                <select class="form-control" name="request_by" id="request_by">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($collector as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
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
                                    <input type="text" id="order_of_house" name="" class="form-control" value="" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="devide_order">@lang('lang.devide_order') <span class="text-danger">*</span></label>
                                    <input type="text" id="devide_order" name="" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 ">
                                    <label class="form-label" for="floor">@lang('lang.floor') <span class="text-danger">*</span></label>
                                    <input type="text" id="floor" name="" class="form-control" value="" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="house_no">@lang('lang.house_no')</label>
                                    <input type="sector" id="house_no" name="" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="survey_name">@lang('lang.survey_name')</label>
                                    <input type="" id="survey_name" name="" class="form-control" value="" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="business_name">@lang('lang.business_name')</label>
                                    <input type="text" id="business_name" name="" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label class="form-label" for="total_amount">@lang('lang.total_amount')</label>
                                    <input type="text" id="total_amount" name="" class="form-control" value="" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="longitude">@lang('lang.longitude')</label>
                                    <input type="text" id="location_longitude" name="longitude" class="form-control survey_required" value="" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="latitude">@lang('lang.latitude') <span class="text-danger">*</span></label>
                                    <input type="text" id="location_latitude" name="latitude" class="form-control survey_required" value="" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label class="form-label" for="link_google_map">@lang('lang.link_google_map') <span class="text-danger">*</span></label>
                                    <input type="text" id="link_map" name="link_google_map" class="form-control survey_required" value="" disabled>
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
                            <table class="kswn-table table-bordered" id="btl_businee_type">
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
    <div class="row mb-1">
        <div class="col-md-12">
            <div style="text-align: right;">
                <a href="{{url('admins/request/changes/survey')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.back')</a>
                <a href="javascript:void(0)" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSubmitCustomer">@lang('lang.submit')</a>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script type="text/javascript">
    var businessType = [];

    $(function(){
        var path = "{{ url('admins/change/request/autocompleted') }}";
        $('#survey_search').typeahead({
            source: function (query, process) {
                return $.get(path, {
                    query: query
                }, function (response) {
                    return process(response);
                });
            }
        });

        $("#btnSearch").on('click',function(){
            var search = $("#survey_search").val();
            $.ajax({
                type: "GET",
                url: "{{url('admins/change/request/filters')}}",
                data: {
                    search : search
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.data) {
                        $("#location_code").val(response.data.location_code)
                        $("#order_of_house").val(response.data.order_of_house)
                        $("#devide_order").val(response.data.devide_order)
                        $("#floor").val(response.data.floor)
                        $("#house_no").val(response.data.house_no)
                        $("#survey_name").val(response.data.house_no)
                        $("#business_name").val(response.data.business_name)
                        $("#total_amount").val(response.data.total_amount)
                        $("#location_longitude").val(response.data.location_longitude)
                        $("#location_latitude").val(response.data.location_latitude)
                        $("#link_map").val(response.data.link_map)
                    }
                    let data =  response.surveyBusinessType;
                    console.log(data);
                    var tr = "";
                    if (data.length > 0) {
                        data.map((row) => {
                            tr +='<tr class="odd">'+
                                '<td><input style="width: 300px" type="text" id="" name="" class="form-control" value='+row.business_type+'></td>'+
                                '<td><input style="width: 300px" type="text" id="" name="" class="form-control" value='+row.categorie+'></td>'+
                                '<td><input style="width: 300px" type="text" id="" name="" class="form-control" value='+row.sub_categorie+'></td>'+
                                '<td><input style="width: 100px" type="text" id="" name="" class="form-control" value='+row.multiply+'></td>'+
                                '<td><input style="width: 200px" type="text" id="" name="" class="form-control" value='+row.grand_total+'></td>'+
                                '<td><input style="width: 200px" type="text" id="" name="" class="form-control" value='+row.grand_total+'></td>'+
                            '</tr>';
                        });
                    }else {
                        var tr = '<tr><td colspan=7 align="center">No data available in table</td></tr>';
                    }
                    $("#btl_businee_type tbody").html(tr);
                }
            });
        });

        //function add to business type
        $(".addToBusinessType").on('click',function(){
            AddNewRecord();
        });
    });
    function removeCustomerchangReqestBusinessType(index){
        if (index > -1) {
            businessType.splice(index, 1);
        }
    }
    function AddNewRecord(){
        var index = $("#btl_businee_type tbody tr").length;
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
                <input style="width: 200px" type="text" id="add_new_total_fee_${index}" name="total_fee[${index}]" class="form-control total_fee" value="">
            </td>
            <td>
                <input style="width: 200px" type="text" id="add_new_grand_total_${index}" name="grand_total[${index}]" class="form-control grand_total" value="">
            </td>
            <td>
                <input type="hidden" id="monthly_fee_${index}" name="monthly_fee" class="form-control monthly_fee" value="">
                <input type="hidden" id="land_filed_fee_${index}" name="land_filed_fee" class="form-control land_filed_fee" value="">
                <button class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record' onclick='removeRecord(this)'><span><i class='fal fa-times'></i></span></button>
            </td>
        </tr>`;
        $("#btl_businee_type tbody").append(html);

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
                url: "{{url('/admins/survey/category/onchange')}}",
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
                url: "{{url('/admins/survey/sub-category/change')}}",
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
</script>
@endsection
