@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Location List
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline">
                                <thead class="table table-bordered table-hover table-striped w-100">
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 100.2px;" aria-sort="ascending" aria-label="ID: activate to sort column descending">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="tran no to sort column ascending">@lang('lang.location_code')</th>

                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="tran no to sort column ascending">@lang('lang.order_of_house')</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px;" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.devide_order')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="business type: activate to sort column ascending">@lang('lang.floor')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="category: activate to sort column ascending">@lang('lang.position')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="sub category: activate to sort column ascending">@lang('lang.house_no')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="muitiply: activate to sort column ascending">@lang('lang.survey_name')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="total fee: activate to sort column ascending">@lang('lang.business_name')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="survey_date: activate to sort column ascending">@lang('lang.total_amount')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="tran no to sort column ascending">@lang('lang.link_google_map')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 338.2px;" aria-label="Action: activate to sort column ascending">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr class="odd">
                                            <td class="sorting_1">{{$key + 1}}</td>
                                            <td rowspan="1" colspan="1">{{$item->location_code}}</td>
                                            <td rowspan="1" colspan="1">{{$item->order_of_house}}</td>
                                            <td rowspan="1" colspan="1">{{$item->devide_order}}</td>
                                            <td rowspan="1" colspan="1">{{$item->floor }}</td>
                                            <td rowspan="1" colspan="1">{{$item->position }}</td>
                                            <td rowspan="1" colspan="1">{{$item->house_no }}</td>
                                            <td rowspan="1" colspan="1">{{$item->survey_name }}</td>
                                            <td rowspan="1" colspan="1">{{$item->business_name}}</td>
                                            <td rowspan="1" colspan="1">{{$item->total_amount}}</td>
                                            <td>
                                                <ul>
                                                    @if($item->location_latitude && $item->location_longitude)
                                                        <li>
                                                            <a href="{{ $item->link_map }}" target="_blank">View on Map</a>
                                                        </li>
                                                    @else
                                                        <li>No Coordinates Available</li>
                                                    @endif
                                                </ul>
                                            </td>
                                            <td rowspan="1" colspan="1">
                                                <div class='dropdown d-inline-block'>
                                                    <a href='#' class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                        <i class="fal fa-ellipsis-v"></i>
                                                    </a>
                                                <div class='dropdown-menu'>
                                                    <a href="{{url('admins/request_change_survey')}}" class="dropdown-item  border-success bg-transparent text-success">
                                                        <span><i class="fal fa-show"></i> @lang('lang.request_change_survey')</span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 100.2px;" aria-sort="ascending" aria-label="ID: activate to sort column descending">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="tran no to sort column ascending">@lang('lang.location_code')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="tran no to sort column ascending">@lang('lang.order_of_house')</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px;" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.devide_order')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="business type: activate to sort column ascending">@lang('lang.floor')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="category: activate to sort column ascending">@lang('lang.position')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="sub category: activate to sort column ascending">@lang('lang.house_no')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="muitiply: activate to sort column ascending">@lang('lang.survey_name')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 379.2px;" aria-label="total fee: activate to sort column ascending">@lang('lang.business_name')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="survey_date: activate to sort column ascending">@lang('lang.total_amount')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="tran no to sort column ascending">@lang('lang.link_google_map')</th>
                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 338.2px;" aria-label="Action: activate to sort column ascending">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
