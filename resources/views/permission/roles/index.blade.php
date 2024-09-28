@extends('layouts.admin')
@section('content')
@include('loading.loading')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Role Management</h2>
                    <div class="pull-right">
                        @can('Role Create')
                            <a href="{{route('roles.create')}}" class="btn btn-sm btn-success waves-effect waves-themed btn-sm mr-1"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                        @endcan
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table-bordered table-hover table-striped w-100 dataTable dtr-inline">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>Role Name</th>
                                        <th>Role Type</th>
                                        <th>Guard Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->role_type }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>
                                                <div class="d-flex demo">
                                                    @can('Role Delete')
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1" onclick="deleteData({{$role->id}})" title="Delete Record"><i class="fal fa-times"></i></a>
                                                    @endcan
                                                    @can('Role Edit')
                                                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1" title="Edit"><i class="fal fa-edit"></i></a>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        const deleteData = (id)=>{
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                showCancelButton: `@lang('lang.cancel')`,
                confirmButtonText: `@lang('lang.deleted')`,
            }).then(function(result)
            {
                if (result.value)
                {
                    $.ajax({
                        type: "DELETE",
                        url: `{{url('/admins/roles/${id}')}}`,
                        success: function (data) {
                            if (data.mg == "success") {
                                Swal.fire("Deleted!", "Your file has been deleted.", "success");
                                location.reload();
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
