@extends('layouts.admin')
@section('content')
@include('loading.loading')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Permission Category
                    </h2>
                    @can('Permission Category Create')
                        <button class="btn btn-sm btn-success waves-effect waves-themed btn-sm mr-1" data-toggle="modal" data-target="#permission-category-create" type="button"><span><i class="fal fa-plus mr-1"></i> Add New</span></button>
                    @endcan
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                                <thead class="">
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $value)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>
                                                <div class="d-flex demo">
                                                    @can('Permission Category Delete')
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1" onclick="deleteData({{$value->id}})" title="Delete Record"><i class="fal fa-times"></i></a>
                                                    @endcan
                                                    @can('Permission Category Edit')
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 btn_updated" data-id="{{$value->id}}" title="Edit"><i class="fal fa-edit"></i></a>
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
    <div class="modal fade" id="permission-category-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Permission Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admins/permission/category')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" required>
                        </div>
                        <div class="float-lg-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="permission-category-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Edit Permission Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admins/permission/category/update')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" id="e_name" class="form-control @error('name') is-invalid @enderror" name="name" required>
                        </div>
                        <div class="float-lg-right">
                            <input type="hidden" name="id" class="e_cate_id" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function(){
            $(document).on('click','.btn_updated',function(){
                let id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: `{{ url('admins/permission/category/${id}') }}`,
                    dataType: "JSON",
                    success: function (response) {
                        $('.e_cate_id').val(response.success.id)
                        $('#e_name').val(response.success.name)
                        $('#permission-category-edit').modal('show');
                    }
                });
            });
        });
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
                        url: `{{url('/admins/permission/category/${id}')}}`,
                        success: function (data) {
                            if (data.mg == "success") {
                                Swal.fire("Deleted!", "Your file has been deleted.","success");
                                location.reload();
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
