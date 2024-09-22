@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xl-12">
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
        <div id="panel-1" class="panel">
            <div class="panel-hdr bg-success-600">
                <h2>
                    @lang('lang.agreement')
                </h2>
            </div>
            <div class="panel-container">
                <div class="panel-content">
                    <form action="{{url('admins/agreement')}}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="location_code">@lang('lang.location_code')</label>
                                <input type="text" id="location_code" name="location_code" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="attach">@lang('lang.attach')</label>
                                <input type="file" id="attach" name="attach" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="customer_name">@lang('lang.customer_name')</label>
                                <input type="text" id="customer_name" name="customer_name" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="business_name">@lang('lang.business_name')</label>
                                <input type="text" id="business_name" name="business_name" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="contact_person">@lang('lang.contact_person')</label>
                                <input type="text" id="contact_person" name="contact_person" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="sex">@lang('lang.sex')</label>
                                <input type="text" id="sex" name="sex" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="address">@lang('lang.address')</label>
                                <input type="text" id="address" name="address" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="phone_number">@lang('lang.phone_number')</label>
                                <input type="number" id="phone_number" name="phone_number" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="title">@lang('lang.title')</label>
                                <input type="text" id="title" name="title" class="form-control" value="">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="fee">@lang('lang.fee')</label>
                                <input type="text" id="fee" name="fee" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="vat">@lang('lang.vat')</label>
                                <input type="text" id="vat" name="vat" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="vat_amount">@lang('lang.vat_amount')</label>
                                <input type="text" id="vat_amount" name="vat_amount" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="total_fee">@lang('lang.total_fee')</label>
                                <input type="text" id="total_fee" name="total_fee" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="currency">@lang('lang.currency')</label>
                                <input type="text" id="currency" name="currency" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="collection_day">@lang('lang.collection_day')</label>
                                <input type="text" id="collection_day" name="collection_day" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="staff">@lang('lang.staff')</label>
                                <select class="form-control search_required" name="staff_id" id="staff_id">
                                    <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($staff as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="make_at">@lang('lang.make_at')</label>
                                <input type="text" id="make_at" name="make_at" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="form-label" for="from">@lang('lang.from')</label>
                                <input type="date" id="from" name="from" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="to">@lang('lang.to')</label>
                                <input type="date" id="to" name="to" class="form-control" value="">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label" for="month_of_agr">@lang('lang.month_of_agr')</label>
                                <input type="number" id="month_of_agr" name="month_of_agr" class="form-control" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="agreement_date">@lang('lang.agreement_date')</label>
                                <div class="input-group">
                                    <input type="date" id="agreement_date" name="agreement_date" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="waste_collect_per_week">@lang('lang.waste_collect_per_week')</label>
                                <input type="number" id="waste_collect_per_week" name="waste_collect_per_week" class="form-control" value="">
                            </div>
                            <div class="col-md-9" style="padding-top: 30px;">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="monday" id="Monday" value="1">
                                    <label class="custom-control-label" for="Monday">Monday</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="tuesday" id="Tuesday" value="1">
                                    <label class="custom-control-label" for="Tuesday">Tuesday</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="wednesday" id="Wednesday" value="1">
                                    <label class="custom-control-label" for="Wednesday">Wednesday</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="thursday" id="Thursday" value="1">
                                    <label class="custom-control-label" for="Thursday">Thursday</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="friday" id="Friday" value="1">
                                    <label class="custom-control-label" for="Friday">Friday</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="saturday" id="Saturday" value="1">
                                    <label class="custom-control-label" for="Saturday">Saturday</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="sunday" id="Sunday" value="1">
                                    <label class="custom-control-label" for="Sunday">Sunday</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div style="text-align: right;">
                                    <input type="hidden" id="customer_no" name="customer_no" class="form-control" value="">
                                    <a href="{{url('admins/agreement')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                    <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function(){
            var path = "{{ url('admins/autocomplete') }}";
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
                    url: "{{url('admins/filter')}}",
                    data: {
                        search : search
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if (response) {
                            $("#location_code").val(response.location_code)
                            $("#customer_no").val(response.customer_no)
                            $("#customer_name").val(response.customer_name)
                            $("#business_name").val(response.business_name)
                            $("#contact_person").val(response.contact_person)
                            $("#address").val('ភូមិ'+ ' ' +response.village_name_khmer+' ឃុំ '+response.commune_name_khmer+' ស្រុក ' +response.district_name_khmer+' '+ response.province_name_khmer)
                            $("#sex").val(response.sex)
                            $("#phone_number").val(response.phone_number)
                            $("#title").val(response.title)
                            $("#fee").val(response.fee)
                            $("#vat").val(response.vat)
                            $("#vat_amount").val(response.vat_amount)
                            $("#total_fee").val(response.total_fee)
                            $("#currency").val(response.currency)
                        }
                    }
                });
            });
        });
    </script>
@endsection
