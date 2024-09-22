@extends('layouts.admin')
@section('content')
@include('loading.loading')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Province
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('admins/province/create')}}" class="btn btn-outline-success btn-sm"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                </div>
            </div>
            {!! Toastr::message() !!}
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="table-responsive">
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline">
                            <thead class="table table-bordered table-hover table-striped w-100">
                                <tr>
                                    <th>#</th>
                                    <th>code</th>
                                    <th>khmer</th>
                                    <th>english</th>
                                    <th>krong</th>
                                    <th>district</th>
                                    <th>khan</th>
                                    <th>commune</th>
                                    <th>sangkat</th>
                                    <th>village</th>
                                    <th>reference</th>
                                    <th>latitude</th>
                                    <th>longitudes</th>
                                    <th>abbreviation</th>
                                    <th>east_en</th>
                                    <th>east_kh</th>
                                    <th>west_en</th>
                                    <th>west_kh</th>
                                    <th>south_en</th>
                                    <th>south_kh</th>
                                    <th>north_en</th>
                                    <th>north_kh</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->khmer }}</td>
                                        <td>{{ $item->english }}</td>
                                        <td>{{ $item->krong }}</td>
                                        <td>{{ $item->DiststrictName }}</td>
                                        <td>{{ $item->khan }}</td>
                                        <td>{{ $item->CammuneName }}</td>
                                        <td>{{ $item->sangkat }}</td>
                                        <td>{{ $item->VillageName }}</td>
                                        <td>{{ $item->reference }}</td>
                                        <td>{{ $item->latitude }}</td>
                                        <td>{{ $item->longitudes }}</td>
                                        <td>{{ $item->abbreviation }}</td>
                                        <td>{{ $item->east_en }}</td>
                                        <td>{{ $item->east_kh }}</td>
                                        <td>{{ $item->west_en }}</td>
                                        <td>{{ $item->west_kh }}</td>
                                        <td>{{ $item->south_en }}</td>
                                        <td>{{ $item->south_kh }}</td>
                                        <td>{{ $item->north_en }}</td>
                                        <td>{{ $item->north_kh }}</td>
                                        <td>
                                            <div class='dropdown d-inline-block'>
                                                <a href='#' class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                    <i class="fal fa-ellipsis-v"></i>
                                                </a>
                                                <div class='dropdown-menu'>
                                                    <a href="{{url('admins/province/',$item->id)}}" class="dropdown-item  border-success bg-transparent text-success">
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
                                    <th>#</th>
                                    <th>code</th>
                                    <th>khmer</th>
                                    <th>english</th>
                                    <th>krong</th>
                                    <th>srok</th>
                                    <th>khan</th>
                                    <th>commune</th>
                                    <th>sangkat</th>
                                    <th>village</th>
                                    <th>reference</th>
                                    <th>latitude</th>
                                    <th>longitudes</th>
                                    <th>abbreviation</th>
                                    <th>east_en</th>
                                    <th>east_kh</th>
                                    <th>west_en</th>
                                    <th>west_kh</th>
                                    <th>south_en</th>
                                    <th>south_kh</th>
                                    <th>north_en</th>
                                    <th>north_kh</th>
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
</div>
@endsection
@section('script')
    <script>
        const deleteData = (id)=>{
            Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: `<span class="btn btn-outline-success">@lang('lang.cancel')</span>`,
                    confirmButtonText: `<span class="btn btn-outline-success">@lang('lang.deleted')</span>`,
                }).then(function(result)
                {
                    if (result.value)
                    {
                        $.ajax({
                            type: "DELETE",
                            url: `{{url('/admins/province/${id}')}}`,
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
