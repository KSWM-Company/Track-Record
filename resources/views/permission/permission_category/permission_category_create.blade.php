@extends('layouts.admin')
@section('content')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admins/dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item">@lang('lang.permission_category')</li>
        <li class="breadcrumb-item active">@lang('lang.create')</li>
    </ol>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-content">
                        {!! Form::open(array('route' => 'permission_category.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Name Permission Category</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Permission Category...">
                                </div>
                                <div class="col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-success">Create</button>
                                    <a href="{{route('permission_category.index')}}" class="btn btn-info">Back</a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
