@extends('layouts.admin')
@section('content')
@include('loading.loading')
    {!! Form::open(array('route' => 'permission_destroy.select','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Permission
                    </h2>
                    @can('Permission Delete')
                        <button type="submit" class="btn buttons-selected btn-primary btn-sm mr-1 btn_delete" tabindex="0" aria-controls="dt-basic-example" type="button"><span><i class="fal fa-times mr-1"></i> Delete</span></button>
                    @endcan
                    @can('Permission Create')
                        <a href="{{route('permission.create')}}" class="btn btn-sm btn-success waves-effect waves-themed btn-sm mr-1"><i class="fal fa-plus mr-1"></i> @lang('lang.add_new')</a>
                    @endcan
                </div>
                {!! Toastr::message() !!}
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <!-- datatable start -->
                            <table id="dt-basic-example" class="table-bordered table-hover table-striped w-100 dataTable dtr-inline">
                                <thead class="">
                                    <tr>
                                        <th class="checkbox_delete">
                                            <input type="checkbox" id="emp_length" onClick="toggle(this)" />
                                        </th>
                                        <th>ID</th>
                                        <th>Permission Name</th>
                                        <th>Category Name</th>
                                        <th>@lang('lang.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $value)
                                        <tr>
                                            <td><input type="checkbox" name="deleteAll[]" value="{{$value->id}}" class="ch_all"></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->cat_name}}</td>
                                            <td>
                                                <div class="d-flex demo">
                                                    @can('Permission Delete')
                                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1" onclick="deleteData({{$value->id}})" title="Delete Record"><i class="fal fa-times"></i></a>
                                                    @endcan
                                                    @can('Permission Edit')
                                                        <a href="{{route('permission.edit',$value->id)}}" class="btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1" title="Edit"><i class="fal fa-edit"></i></a>
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
    {!! Form::close() !!}
@endsection
@section('script')
    <script>
        $(function(){
            $('.btn_delete').attr('disabled',true);
            $('.ch_all').on('click',function(){
                if($(this).prop('checked')) {
                    $('.btn_delete').prop('disabled',false);
                } else {
                    $('.btn_delete').prop('disabled',true);
                }
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
                        url: `{{url('/admins/permission/${id}')}}`,
                        success: function (data) {
                            if (data.mg == "success") {
                                location.reload();
                            }
                        }
                    });
                }
            });
        }
        function toggle(source) {
            $('.btn_delete').prop('disabled',false);
            checkboxes = $('.ch_all');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

    </script>
@endsection
