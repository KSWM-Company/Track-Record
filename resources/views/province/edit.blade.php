@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show" style="">
                    <div class="panel-content">
                        <form action="{{url('admins/crud',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$data->name}}">
                            </div>

                            <div class="form-group mb-0" style="text-align: right;">
                                <input type="hidden" name="id" value="{{$data->id}}" id="">
                                <a href="{{url('admins/crud')}}" class="btn btn-secondary btn-pills waves-effect waves-themed">Cancel</a>
                                <button type="submit" class="btn btn-success btn-pills waves-effect waves-themed">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
