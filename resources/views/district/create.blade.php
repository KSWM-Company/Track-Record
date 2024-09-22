@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-2" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.district')
                        </h2>
                    </div>
                        <form action="{{url('admins/crud')}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="Name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="">
                            </div>
                            <div class="form-group mb-0" style="text-align: right;">
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
