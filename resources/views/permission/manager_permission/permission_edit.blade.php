@extends('layouts.admin')
@section('content')
<div id="panel-1" class="panel">
    <div class="panel-hdr">
        <h2>
            Edit Module Permission
        </h2>
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            {!! Form::open(array('route' => ['permission.update',$data->id],'method'=>'PUT')) !!}
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="">Permission Category</label>
                            <select id="permission_category_id" name="permission_category_id" class="form-control @error('permission_category_id') is-invalid @enderror">
                                <option value="">-- Select --</option>
                                @foreach($data_cate as $value)
                                    <option value="{{$value->id}}" {{$data->permission_category_id == $value->id ? "selected" : ""}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <?php
                    $st_name = explode(' ',$data->name);
                ?>
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <div class="form-group">
                            <div class="mb-1">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" onClick="toggle(this)" id="all">
                                    <label class="custom-control-label" for="all">All</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input ch_all" name="permission" id="view" value="View" {{ $st_name[1] == "View" ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="view">View</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input ch_all" name="permission" id="create" value="Create" {{ $st_name[1] == "Create" ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="create">Create</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input ch_all" name="permission" id="edit" value="Edit" {{$st_name[1] == "Edit" ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="edit">Edit</label>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input ch_all" name="permission" id="delete" value="Delete" {{$st_name[1] == "Delete" ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="delete">Delete</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 text-right">
                    <a href="{{route('permission.index')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                    <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.update')</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        function toggle(source) {
            checkboxes = $('.ch_all');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        //Add Input Fields
        $(document).ready(function() {
            var max_fields = 50; //Maximum allowed input fields
            var x = 1; //Initlal input field is set to 1
            //When user click on add input button
            $(".add_fields_lan").click(function(e){
                e.preventDefault();
                //Check maximum allowed input fields
                if(x < max_fields){
                    x++; //input field increment
                    var text =
                        ' <div class="col-xs-12 col-sm-12 col-md-12">'+
                        ' <a href="javascript:void(0);" class="remove_field  btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>' +
                        ' <div class="col-sm-2"></div>'+
                        ' <label for="gender1" class="col-sm-2 control-label" style="padding-left: 13px;">Other:</label>'+
                        ' <div class="col-sm-4" style="padding-left: 7px;">'+
                        '<input type="text" name="role[]" class="form-control" placeholder="Pleas enter name ..." required>'+
                        ' </div>'+
                        ' </div>';
                    //add input field
                    $(".wrapper_lan").append(text);
                }
            });

            //when user click on remove button
            $(".wrapper_lan").on("click",".remove_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //remove inout field
                x--; //inout field decrement
            })
            $(".wrapper_att").on("click",".remove_field", function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //remove inout field
                x--; //inout field decrement
            })
        });
    </script>
@endsection
