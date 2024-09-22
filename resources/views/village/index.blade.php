@extends('layouts.admin')
@section('content')
@include('loading.loading')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Village
                    {{-- <input type="text" name="search" class="form-control mr-2" placeholder="Search" value="">
                    <a href="javascript:void(0)" class="btn buttons-csv buttons-html5 btn-outline-success btn-sm mr-1">Search</a> --}}
                </h2>
                <div class="panel-toolbar">
                    <a href="{{url('admins/village/create')}}" class="btn btn-outline-success btn-sm">Add New</a>
                </div>
            </div>
            {!! Toastr::message() !!}
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="" class="table table-bordered table-hover table-striped w-100">
                        <thead class="table table-bordered table-hover table-striped w-100">
                            <tr>
                                <th>#</th>
                                <th>Commune Code</th>
                                <th>Code</th>
                                <th>Khmer</th>
                                <th>English</th>
                                <th>Reference</th>
                                <th>Official Note </th>
                                <th>Note By Checker</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->commune_code }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->khmer }}</td>
                                    <td>{{ $item->english }}</td>
                                    <td>{{ $item->reference }}</td>
                                    <td>{{ $item->official_note }}</td>
                                    <td>{{ $item->note_by_checker }}</td>
                                    <td>
                                        <div class='dropdown d-inline-block'>
                                            <a href='#'
                                                class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0"
                                                data-toggle='dropdown' aria-expanded='true' title='More options'>
                                                <i class="fal fa-ellipsis-v"></i>
                                            </a>
                                            <div class='dropdown-menu'>
                                                <a href="{{url('admins/village',$item->id)}}"
                                                    class="dropdown-item  border-success bg-transparent text-success">
                                                    <span><i class="fal fa-edit"></i> @lang('lang.edit')</span>
                                                </a>
                                            </div>

                                            <button class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 "
                                                title='Delete Record' onclick="deleteData({{$item->id}})">
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
                                <th>Commune Code</th>
                                <th>Code</th>
                                <th>Khmer</th>
                                <th>English</th>
                                <th>Reference</th>
                                <th>Official Note </th>
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
    @endsection

    @section('script')
    <script>
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
                        url: `{{url('/admins/village/${id}')}}`,
                        success: function (data) {
                            if (data.mg == "success") {
                                Swal.fire("Deleted!", "Your file has been deleted.", "success");
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        }

        //**search**//

        $(function(){

            $('#search').on('keypress', function(){
                show();
            });

            $('#search').on('keydown', function(){
                show();
            });
        });

        function show(){
            $.ajax({
                type: "GET",
                url: "{{ url('/admins/villages/search') }}",
                data: {
                    search: $("#search").val()
                },
                dataType: "JSON",
                success: function (response) {
                    let data =  response.success;
                    if (data.length > 0) {
                        data.map((row) => {
                            tr +='<tr class="odd">'+
                                '<td><a href="#">'+(row.id)+'</a></td>'+
                                '<td><a href="#">'+(row.commune_code)+'</a></td>'+
                                '<td><a href="#">'+(row.code )+'</a></td>'+
                                '<td><a href="#">'+(row.khmer )+'</a></td>'+
                                '<td><a href="#">'+(row.english )+'</a></td>'+
                                '<td><a href="#">'+(row.reference )+'</a></td>'+
                                '<td><a href="#">'+(row.official_note )+'</a></td>'+
                                '<td><a href="#">'+(row.note_by_checker )+'</a></td>'+
                                '<td>'+
                                    '<div class="dropdown d-inline-block">'+
                                        '<a href="#" class="btn btn-sm btn-icon btn-outline-success rounded-circle shadow-0" data-toggle="dropdown" aria-expanded="true" title="More options">'+
                                            '<i class="fal fa-ellipsis-v"></i>'+
                                        '</a>'+
                                        '<div class="dropdown-menu">'+
                                            '<a href="{{url("admins/village")}}/'+(row.id)+'" class="dropdown-item  border-success bg-transparent text-success">'+
                                                '<span><i class="fal fa-edit"></i> @lang("lang.edit")</span>'+
                                            '</a>'+
                                        '</div>'+

                                        '<button class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 " title="Delete Record" onclick="">'+
                                            '<span><i class="fal fa-times"></i></span>'+
                                        '</button>'+
                                    '</div>'+
                                '</td>'+
                            '</tr>';
                        });
                    }else {
                        var tr = '<tr><td colspan=15 align="center">No data available in table</td></tr>';
                    }
                    $("#tbl_village tbody").html(tr);
                }
            });
        }
    </script>
    @endsection
