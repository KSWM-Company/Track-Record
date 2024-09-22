@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container">
                    <div class="panel-content">
                        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Role Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Role Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Role Type</label>
                                    <select class="form-control @error('role_type') is-invalid @enderror" id="role_type" name="role_type">
                                        <option value="">-- Select --</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="form-group">
                            <div class="frame-wrap">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="" id="defaultInline" value="" onClick="toggle(this)">
                                    <label class="custom-control-label" for="defaultInline">Check All Permission</label>
                                </div>
                            </div>
                        </div>
                        <label for="">Permission Name</label>
                        <div class="row">
                            @foreach ($data_category as $cate)
                                <?php
                                    $permission = \Spatie\Permission\Models\Permission::where('permission_category_id', $cate->id)->get();
                                ?>
                                <div class="col-md-3 mb-2">
                                    <div class="form-group">
                                        <div class="card border-success">
                                            <div class="card-header border-success">{{$cate->name}}</div>
                                            <div class="card-body">
                                                <div class="mb-1">
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input check_all" id="checkAll_{{$cate->id}}" onClick="toggle_{{ $cate->id }}(this)">
                                                        <label class="custom-control-label" for="checkAll_{{$cate->id}}">Check All</label>
                                                    </div>
                                                </div>
                                                @foreach ($permission as $item)
                                                    <div class="mb-1">
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input check_all ch_all_{{ $cate->id }}" name="permission[]" id="defaultInline_{{ $item->id }}" value="{{$item->id}}">
                                                            <label class="custom-control-label" for="defaultInline_{{ $item->id }}">{{$item->name}}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    // checked all select
                                    function toggle_{{ $cate->id }}(source) {
                                        checkboxes = $('.ch_all_{{ $cate->id }}');
                                        for (var i = 0, n = checkboxes.length; i < n; i++) {
                                            checkboxes[i].checked = source.checked;
                                        }
                                    }
                                    // checked all select
                                </script>
                            @endforeach
                        </div>
                        <div class="col-sm-12 col-md-12 text-right">
                            <a class="btn btn-outline-secondary btn-pills waves-effect waves-themed" href="{{ route('roles.index') }}">@lang('lang.cancel')</a>
                            <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function toggle(source) {
            checkboxes = $('.check_all');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }
    </script>
@endsection

