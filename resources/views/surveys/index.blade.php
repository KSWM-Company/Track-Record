@extends('layouts.admin')
@section('content')
@include('loading.loading')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Survey
                    </h2>
                    <div class="panel-toolbar">
                        <a href="{{url('admins/survey/create')}}" class="btn btn-outline-success btn-sm mr-1"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <!-- datatable start -->
                                <div id="dt-basic-example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline" role="grid" aria-describedby="dt-basic-example_info" style="width: 1163px;">
                                                <thead class="table table-bordered table-hover table-striped w-100">
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px;" aria-sort="ascending" aria-label="ID: activate to sort column descending">#</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="tran no to sort column ascending">@lang('lang.tran_no')</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px;" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.survey_by')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="business type: activate to sort column ascending">@lang('lang.block_name')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="category: activate to sort column ascending">@lang('lang.sector_name')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="sub category: activate to sort column ascending">@lang('lang.street_number')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="muitiply: activate to sort column ascending">@lang('lang.side_of_street')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="total fee: activate to sort column ascending">@lang('lang.zone_name')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="survey_date: activate to sort column ascending">@lang('lang.add_street')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 138.2px;" aria-label="Action: activate to sort column ascending">@lang('lang.total_amount')</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 138.2px;" aria-label="Action: activate to sort column ascending">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $key => $item)
                                                        <tr class="odd">
                                                            <td class="sorting_1">{{$key + 1}}</td>
                                                            <td rowspan="1" colspan="1">{{$item->trans_no}}</td>
                                                            <td rowspan="1" colspan="1">{{$item->SurveyName}}</td>
                                                            <td rowspan="1" colspan="1">{{$item->block }}</td>
                                                            <td rowspan="1" colspan="1">{{$item->sector }}</td>
                                                            <td rowspan="1" colspan="1">{{$item->street_no }}</td>
                                                            <td rowspan="1" colspan="1">{{$item->side_of_street }}</td>
                                                            <td rowspan="1" colspan="1">{{$item->zone_name}}</td>
                                                            <td rowspan="1" colspan="1">{{$item->add_street}}</td>
                                                            <td rowspan="1" colspan="1">{{number_format($item->total_amount,2)}}</td>
                                                            <td rowspan="1" colspan="1">
                                                                <div class='dropdown d-inline-block'>
                                                                    <a href='#' class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                                        <i class="fal fa-ellipsis-v"></i>
                                                                    </a>
                                                                    <div class='dropdown-menu'>
                                                                        <a href="{{url('admins/survey',$item->id)}}" class="dropdown-item  border-success bg-transparent text-success">
                                                                            <span><i class="fal fa-show"></i> @lang('lang.show')</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">#</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.tran_no')</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.survey_by')</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.block_name')</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.sector_name')</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.street_number')</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.side_of_street')</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.zone_name')</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.add_street')</th>
                                                        <th rowspan="1" colspan="1">@lang('lang.total_amount')</th>
                                                        <th rowspan="1" colspan="1">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <!-- datatable end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script>
        $(function(){
            $('#importBranch').on('click',function(){
                $('#BranchModal').modal('show');
            });
        });
        const deleteData = (id)=>{
            Swal.fire({
                title: "@lang('lang.are_you_sure')",
                text: "@lang('lang.are_you_sure_want_to_delete')",
                type: "warning",
                showCancelButton: `@lang('lang.cancel')`,
                confirmButtonText: `@lang('lang.deleted')`,
            }).then(function(result)
            {
                if (result.value)
                {
                    $.ajax({
                        type: "DELETE",
                        url: `{{ url('/admins/branch/${id}') }}`,
                        success: function(data) {
                            if (data.mg == "success") {
                                Swal.fire("Deleted!", "Your file has been deleted.","success");
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
