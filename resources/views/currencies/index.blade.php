@extends('layouts.admin')
@section('content')
@include('loading.loading')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Currencies
                    </h2>
                    <div class="panel-toolbar">
                        <a href="{{url('admins/currencies/create')}}" class="btn btn-outline-success btn-sm mr-1"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <div id="dt-basic-example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline" role="grid" aria-describedby="dt-basic-example_info" style="width: 1163px;">
                                        <thead class="table table-bordered table-hover table-striped w-100">
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px;" aria-sort="ascending" aria-label="ID: activate to sort column descending">#</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.currency')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.usd')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.riel')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.exchange_rate')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key=>$item)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{number_format($item->amount_usd)}}</td>
                                                    <td>{{number_format($item->amount_riel)}}</td>
                                                    <td>{{ $item->exchange_date}}</td>
                                                    <td>
                                                        <div class='dropdown d-inline-block'>
                                                            <a href='#' class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                                <i class="fal fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class='dropdown-menu'>
                                                                <a href="{{url('admins/currencies',$item->id)}}" class="dropdown-item  border-success bg-transparent text-success">
                                                                    <span><i class="fal fa-edit"></i> @lang('lang.edit')</span>
                                                                </a>
                                                            </div>
                                                            <button class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 " title='Delete Record' onclick="deleteData({{$item->id}})">
                                                                <span><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">#</th>
                                                <th rowspan="1" colspan="1">@lang('lang.name')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.usd')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.riel')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.exchange_rate')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.action')</th>
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
    @endsection

    @section('script')
    <script>
        $(function(){
            $('#importCategory').on('click',function(){
                $('#CategoryModal').modal('show');
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
                        url: `{{url('/admins/currencies/${id}')}}`,
                        success: function (data) {
                            console.log(data);
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
