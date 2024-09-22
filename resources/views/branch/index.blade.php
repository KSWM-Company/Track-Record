@extends('layouts.admin')
@section('content')
@include('loading.loading')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <div>@lang('lang.branch')</div>
                    </h2>
                    @can('Branch Create')
                        <div class="panel-toolbar">
                            <a href="javascript:void(0);" class="btn btn-outline-success btn-sm mr-1" id="btnAddNew"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                        </div>
                    @endcan
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <div id="dt-basic-example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline " role="grid" aria-describedby="dt-basic-example_info" style="width: 1163px;">
                                        <thead class="table table-bordered table-hover table-striped w-100">
                                            <tr>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px;" aria-sort="ascending" aria-label="ID: activate to sort column descending">#</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px;" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.branch_code_en')</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="Description: activate to sort column ascending">@lang('lang.branch_code_kh')</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 279.2px;" aria-label="Description: activate to sort column ascending">@lang('lang.description')</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 138.2px;" aria-label="Action: activate to sort column ascending">@lang('lang.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$key + 1}}</td>
                                                    <td>{{$item->name_en}}</td>
                                                    <td>{{$item->name_kh}}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>
                                                        <div class="d-flex demo">
                                                            @can('Branch Delete')
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1" data-toggle="modal" onclick="deleteData({{$item->id}})" data-id="{{$item->id}}" title="Delete Record"><i class="fal fa-times"></i></a>
                                                            @endcan
                                                            @can('Branch Edit')
                                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-success  btn-icon btn-inline-block mr-1" id="btn_updated" data-toggle="modal" data-target="#user-edit" data-id="{{$item->id}}" title="Edit"><i class="fal fa-edit"></i></a>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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
    @include('branch.create')
    @include('branch.edit')
    @endsection

    @section('script')
    <script>
        $(function(){
            $('#importBranch').on('click',function(){
                $('#BranchModal').modal('show');
            });
        });
        $('#btnAddNew').on('click',function(){
            $('#BranchModal').modal('show');
        });
        $(document).on('click','#btn_updated',function(){
            let id = $(this).data("id");
            $.ajax({
                type: "GET",
                url: `{{ url('/admins/branch/${id}') }}`,

                dataType: "JSON",
                success: function (response) {
                    if (response.success) {
                        $('#e_id').val(response.success.id);
                        $('#e_name_kh').val(response.success.name_kh);
                        $('#e_name_en').val(response.success.name_en);
                        $('#e_description').val(response.success.description);
                        $('#editBranchModal').modal('show');
                    }
                }
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
