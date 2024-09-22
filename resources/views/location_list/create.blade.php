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
        <li class="breadcrumb-item active">@lang('lang.create')</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block">
            <a href="{{url('admins/location-list')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.back')</a>
        </li>
    </ol>
    <div id="panel-1" class="">
        <div class="panel-container">
            <div class="panel-content">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="search">
                            <i class="uil uil-search"></i>
                            <input spellcheck="false" id="search" class="form-control" type="text" placeholder="Search">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:void(0)" class="btn btn-outline-success" id="btnSearch">@lang('lang.search')</a>
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
                            @lang('lang.old_business_type')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table class="kswn-table table-bordered" id="tbn_old_businee_type">
                                <thead>
                                    <tr class="ui-state-default" style="text-align: center;">
                                        <th>@lang('lang.business_type')</th>
                                        <th>@lang('lang.category')</th>
                                        <th>@lang('lang.sub_category')</th>
                                        <th>@lang('lang.multiply')</th>
                                        <th>@lang('lang.total_fee')</th>
                                        <th>@lang('lang.grand_total')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   {{--  add  --}}
                                </tbody>
                            </table>
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
                            @lang('lang.new_business_type')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.business_type') <span class="text-danger">*</span></label>
                                <select class="form-control changeBusinessType business_type clearInput" name="business_type_id" id="business_type_id">
                                    <option value="">Please Select</option>
                                    @foreach ($dataBusinessType as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.category') <span class="text-danger">*</span></label>
                                <select class="form-control onChangeCategory clearInput" name="category_id" id="category_id">

                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.sub_category') <span class="text-danger">*</span></label>
                                <select class="form-control changeSubCategory clearInput" name="sub_category_id" id="sub_category_id">

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.multiply') <span class="text-danger">*</span></label>
                                <input type="number" id="multiply" name="multiply" class="form-control" value="1">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <input type="hidden" id="monthly_fee" name="monthly_fee" disabled class="form-control" value="">
                            <input type="hidden" id="land_filed_fee" name="land_filed_fee" disabled class="form-control" value="">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.total_fee') <span class="text-danger">*</span></label>
                                <input type="number" id="total_fee" name="total_fee" disabled class="form-control clearInput" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.grand_total') <span class="text-danger">*</span></label>
                                <input type="number" id="grand_total" name="grand_total" disabled class="form-control clearInput" value="">
                            </div>
                        </div>


                        <div class="mb-1" style="text-align: right;">
                            <a href="javascript:void(0)" class="btn btn-success btn-sm addToBusinessType"><i class="fal fa-times" aria-hidden="true"></i> Add</a>
                        </div>
                        <div class="table-responsive">
                            <table class="kswn-table table-bordered"  id="tbl_survey_business_type">
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

                        <div class="row mb-1">
                            <div class="col-md-12">
                                <div style="text-align: right;">
                                    <a href="javascript:void(0)" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSubmitCustomer">@lang('lang.submit')</a>
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
<script type="text/javascript">
    var businessType = [];

    $(function(){
        if (localStorage.getItem("businessType"))
        {
            businessType = JSON.parse(localStorage.getItem("businessType"));
            GetSurveyChangRequestBusinessType();
        }

        var path = "{{ url('admins/autocompleted') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(path, {
                    query: query
                }, function (response) {
                    return process(response);
                });
            }
        });

        $("#btnSearch").on('click',function(){
            var search = $("#search").val();
            $.ajax({
                type: "GET",
                url: "{{url('admins/filters')}}",
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
                    var tr = "";
                    if (data.length > 0) {
                        data.map((row) => {
                            tr +='<tr class="odd">'+
                                '<td><input type="text" id="" name="" class="form-control" value='+row.business_type+' disabled></td>'+
                                '<td><input type="text" id="" name="" class="form-control" value='+row.categorie+' disabled></td>'+
                                '<td><input type="text" id="" name="" class="form-control" value='+row.sub_categorie+' disabled></td>'+
                                '<td><input type="text" id="" name="" class="form-control" value='+row.multiply+' disabled></td>'+
                                '<td><input style="width: 200px" type="text" id="" name="" class="form-control" value='+row.grand_total+' disabled></td>'+
                                '<td><input style="width: 200px" type="text" id="" name="" class="form-control" value='+row.grand_total+' disabled></td>'+
                            '</tr>';
                        });
                    }else {
                        var tr = '<tr><td colspan=7 align="center">No data available in table</td></tr>';
                    }
                    $("#tbn_old_businee_type tbody").html(tr);
                }
            });
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
                    $('#category_id').append('<option value="">Please Select</option>');
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
                GetSurveyChangRequestBusinessType();
                ClearAllBusinessTeyp();
            }
        });
    });

    function ClearAllBusinessTeyp(){
        $(".clearInput").val("");
    }
    function removeCustomerchangReqestBusinessType(index){
        if (index > -1) {
            businessType.splice(index, 1);
        }
        SetLocalStorageBusinessType();
        GetSurveyChangRequestBusinessType();
    }
    function SetLocalStorageBusinessType() {
        if (window.localStorage)
        {
            localStorage.setItem("businessType", JSON.stringify(businessType));
        }
    }
    function GetSurveyChangRequestBusinessType() {
        $("#tbl_survey_business_type tbody").empty();
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
                        `<button class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 removeRecord' title='Delete Record' onclick='removeCustomerchangReqestBusinessType(${index})''><span><i class='fal fa-times'></i></span></button>
                    </td>`+
                "</tr>";
                $("#tbl_survey_business_type tbody").append(row);
                sum_grand_total += Number(item.grand_total);
            }
            $("#sum_grand_total").val(sum_grand_total);
        }
    }
</script>
@endsection
