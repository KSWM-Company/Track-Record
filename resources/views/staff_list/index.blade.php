@extends('layouts.admin')
@section('content')
@include('loading.loading')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Staff Infor
                    </h2>
                    <div class="panel-toolbar">
                        <a href="javascript:void(0);" class="btn btn-outline-success btn-sm mr-1" id="btnAddNew"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 186.2px; text-align: center;" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.profile')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.name')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.sex')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.phone_number')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.position')</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" width="270px" aria-sort="ascending" aria-label="Branch Code: activate to sort column descending">@lang('lang.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key=>$item)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>
                                                        @if ($item->sex == 'Female' && $item->profile == null)
                                                            <img src="{{ asset('/images/fetch_photo/avatar-f.png') }}" class="profile-image rounded-circle" style="object-fit: cover;" alt="Female Profile">
                                                        @elseif ($item->sex == 'Male' && $item->profile == null)
                                                            <img src="{{ asset('/images/fetch_photo/avatar-m.png') }}" class="profile-image rounded-circle" style="object-fit: cover;" alt="Male Profile">
                                                        @else
                                                            <img src="{{ asset('/images/profilesstaff/' . $item->profile) }}" class="profile-image rounded-circle" style="object-fit: cover;" alt="Profile">
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->sex }}</td>
                                                    <td>{{ $item->phone_number}}</td>
                                                    <td>{{ $item->position }}</td>
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
                                                <th rowspan="1" colspan="1">#</th>
                                                <th rowspan="1" colspan="1">@lang('lang.profile')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.name')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.sex')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.phone_number')</th>
                                                <th rowspan="1" colspan="1">@lang('lang.position')</th>
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
    @include('staff_list.create')
    @include('staff_list.edit')
    @endsection

    @section('script')
    <script>
        $(function(){
            $('#importCategory').on('click',function(){
                $('#CategoryModal').modal('show');
            });
        });

        $('#btnAddNew').on('click',function(){
            $('#StaffListCreateModal').modal('show');
        });

        $(document).on('click','#btn_updated',function(){
            let id = $(this).data("id");
            $.ajax({
                type: "GET",
                url: `{{ url('/admins/business-type/${id}') }}`,

                dataType: "JSON",
                success: function (response) {
                    if (response.success) {
                        $('#e_id').val(response.success.id);
                        $('#e_name').val(response.success.name);
                        $('#editBusinessTypeModal').modal('show');
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
                        url: `{{url('/admins/staff-list/${id}')}}`,
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
