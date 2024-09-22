@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container">
                    <div class="panel-content">
                        {!! Form::open(array('route' => 'permission.store','method'=>'POST')) !!}
                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Permission Category</label>
                                    <select name="permission_category_id" class="form-control @error('permission_category_id') is-invalid @enderror">
                                        @foreach($data as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="mb-1">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" onClick="toggle(this)" id="all">
                                            <label class="custom-control-label" for="all">All</label>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input ch_all" name="permission[]" id="view" value="View">
                                            <label class="custom-control-label" for="view">View</label>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input ch_all" name="permission[]" id="create" value="Create">
                                            <label class="custom-control-label" for="create">Create</label>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input ch_all" name="permission[]" id="edit" value="Edit">
                                            <label class="custom-control-label" for="edit">Edit</label>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" class="custom-control-input ch_all" name="permission[]" id="delete" value="Delete">
                                            <label class="custom-control-label" for="delete">Delete</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="wrapper_lan"></div>
                                <button class="add_fields_lan btn btn-success"><i class="fal fa-plus-circle"></i> Add</button>
                            </div>
                        </div>

                        <div class="text-right">
                            <a href="{{route('permission.index')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                            <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                        </div>
                    </div>
                </div>
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
                        ' <div class="row">'+
                        ' <div class="col-md-4" style="margin-bottom: 10px;">'+
                        '<input type="text" name="role[]" class="form-control" placeholder="Pleas enter name ..." required>'+
                        ' </div>'+
                        ' <a href="javascript:void(0);" class="remove_field  btn btn-danger" style="height: 36px;"><i class="fal fa-trash-alt"></i></a>' +
                        ' <div class="col-md-6"></div></div>';
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
