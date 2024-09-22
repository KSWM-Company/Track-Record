@extends('layouts.admin')
@section('content')
@include('loading.loading')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                    <h2 class="modal-title">@lang('lang.location_code')</h2>
                    <div class="panel-toolbar">
                        <a href="javascript:void(0);" class="btn btn-outline-success btn-sm mr-1" id="btnAddNew"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline ">
                            <thead class="table table-bordered table-hover table-striped w-100 ">
                                <tr>
                                    <th>#</th>
                                    <th>@lang('lang.description')</th>
                                    <th>@lang('lang.type')</th>
                                    <th>@lang('lang.branch')</th>
                                    <th>@lang('lang.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td class="table-blue">{{ $item->name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->campanyName }}</td>
                                        <td>
                                            <div class="d-flex demo">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1" data-toggle="modal" onclick="deleteData({{$item->id}})" data-id="{{$item->id}}" title="Delete Record"><i class="fal fa-times"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-success btn-icon btn-inline-block mr-1" id="btn_updated" data-toggle="modal" data-target="#user-edit" data-id="{{$item->id}}" title="Edit"><i class="fal fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('lang.description')</th>
                                    <th>@lang('lang.type')</th>
                                    <th>@lang('lang.branch')</th>
                                    <th>@lang('lang.action')</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('location_code.create')
    @include('location_code.edit')
@endsection
@section('script')
    <script>
        $(function(){
            $('#importLocationCode').on('click',function(){
                $('#LocationCodeModal').modal('show');
            });
            $('#btnAddNew').on('click',function(){
                $('#createLocationCodeModal').modal('show');
            });
            $(document).on('click','#btn_updated',function(){
                let id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: `{{ url('/admins/location-code/${id}') }}`,
                    dataType: "JSON",
                    success: function (response) {
                        if (response.success) {
                            $('#e_id').val(response.success.id);
                            $('#e_name').val(response.success.name);
                            $('#e_type').val(response.success.type);
                            $('#editlocationCodeModal').modal('show');
                        }
                    }
                });
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
                        url: `{{url('/admins/location-code/${id}')}}`,
                        success: function (data) {
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

