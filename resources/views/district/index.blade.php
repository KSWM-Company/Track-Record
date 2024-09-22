@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        District
                    </h2>
                    <div class="panel-toolbar">
                        <a href="{{url('admins/district/create')}}" class="btn btn-outline-success btn-sm mr-1"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline" role="grid" aria-describedby="dt-basic-example_info" style="width: 1163px;">
                            <thead class="table table-bordered table-hover table-striped w-100">
                                <tr>
                                    <th>#</th>
                                    <th>Province Code</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Khmer</th>
                                    <th>English</th>
                                    <th>Commune</th>
                                    <th>Sangkat</th>
                                    <th>Village</th>
                                    <th>Reference</th>
                                    <th>Official Note</th>
                                    <th>Note By Checker</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->province_code}}</td>
                                        <td>{{ $item->code}}</td>
                                        <td>{{ $item->type}}</td>
                                        <td>{{ $item->khmer}}</td>
                                        <td>{{ $item->english}}</td>
                                        <td>{{ $item->CammuneName}}</td>
                                        <td>{{ $item->sangkat}}</td>
                                        <td>{{ $item->VillageName}}</td>
                                        <td>{{ $item->reference}}</td>
                                        <td>{{ $item->official_not }}</td>
                                        <td>{{ $item->note_by_checker}}</td>
                                        <td>
                                            <div class='dropdown d-inline-block'>
                                                <a href='#' class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                    <i class="fal fa-ellipsis-v"></i>
                                                </a>
                                                <div class='dropdown-menu'>
                                                    <a href="{{url('admins/district/',$item->id)}}" class="dropdown-item  border-success bg-transparent text-success">
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
                                    <th>Province Code</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Khmer</th>
                                    <th>English</th>
                                    <th>Commune</th>
                                    <th>Sangkat</th>
                                    <th>Village</th>
                                    <th>Reference</th>
                                    <th>Official Note</th>
                                    <th>Note By Checker</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{$data->links('pagination::bootstrap-5')}}
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
                    showCancelButton: `<span class="btn btn-outline-success">@lang('lang.cancel')</span>`,
                    confirmButtonText: `<span class="btn btn-outline-success">@lang('lang.deleted')</span>`,
                }).then(function(result)
                {
                    if (result.value)
                    {
                        $.ajax({
                            type: "DELETE",
                            url: `{{url('/admins/district/${id}')}}`,
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
