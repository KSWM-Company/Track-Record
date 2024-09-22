@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-content">
                        {!! Form::model($data, ['method' => 'PUT','route' => ['permission_category.update', $data->id],'enctype' => 'multipart/form-data']) !!}
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Name Permission Category</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Permission Category..." value="{{$data->name}}">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="">Name</label>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                        <samp >{!! $errors->first('name','<span class="error text-red">:message</span>') !!}</samp>
                                    </div> --}}
                                    <div class="col-sm-12 col-md-12 text-right">
                                        <button type="submit" class="btn btn-success">Update</button>
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
