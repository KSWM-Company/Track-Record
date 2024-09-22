@extends('layouts.admin')
@section('content')
@include('loading.loading')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('admins/dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item">Crud</li>
</ol>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Crud <span class="fw-300"><i>Table</i></span>
                </h2>

                <button class="btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1" tabindex="0" aria-controls="dt-basic-example" type="button" title="Generate PDF"><span>PDF</span></button>
                <button class="btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1" tabindex="0" aria-controls="dt-basic-example" type="button" title="Generate Excel"><span>Excel</span></button>
                <button class="btn buttons-csv buttons-html5 btn-outline-primary btn-sm mr-1" tabindex="0" aria-controls="dt-basic-example" type="button" title="Generate CSV"><span>CSV</span></button>
                <div class="panel-toolbar">
                    <a href="{{url('admins/crud/create')}}" class="btn btn-primary btn-sm">Add New</a>
                </div>
            </div>
            {!! Toastr::message() !!}
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="dt-buttons">
                                            <a href="{{url('admins/crud/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                                                <span><i class="fal fa-edit"></i> Edit</span>
                                            </a>
                                            <button class="btn btn-danger btn-sm btn-delete" onclick="deleteData({{$item->id}})">
                                                <span><i class="fal fa-times"></i> Delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- datatable end -->
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
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then(function(result)
                {
                    if (result.value)
                    {
                        $.ajax({
                            type: "DELETE",
                            url: `{{url('/admins/crud/${id}')}}`,
                            success: function (data) {
                                if (data.mg == "success") {
                                    Swal.fire("Deleted!", "Your file has been deleted.", data.mg).then(function(params) {
                                        location.reload();
                                    });
                                }
                            }
                        });
                    }
                });
        }
    </script>
@endsection
