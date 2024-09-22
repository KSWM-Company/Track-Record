@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-2" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.village')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <form action="{{url('admins/village',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-2">
                                <div class="col-md-4 mb-2">
                                <label class="form-label" for="commune_code">@lang ('lang.commune_code') <span class="text-danger">*</span></label>
                                <input type="text" id="commune_code" name="commune_code" class="form-control @error('commune_code') is-invalid @enderror" value="{{$data->commune_code}}">
                            </div>

                                <div class="col-md-4 mb-2">
                                <label class="form-label" for="code">@lang ('lang.code') <span class="text-danger">*</span></label>
                                <input type="text" id="code" name="code" class="form-control @error('code') is-invalid @enderror" value="{{$data->code}}">
                            </div>

                                <div class="col-md-4 mb-2">
                                <label class="form-label" for="khmer">@lang ('lang.khmer')  <span class="text-danger">*</span></label>
                                <input type="text" id="khmer" name="khmer" class="form-control @error('khmer') is-invalid @enderror" value="{{$data->khmer}}">
                            </div>

                                <div class="col-md-6 mb-2">
                                <label class="form-label" for="english">@lang ('lang.english')  <span class="text-danger">*</span></label>
                                <input type="text" id="english" name="english" class="form-control @error('english') is-invalid @enderror" value="{{$data->english}}">
                            </div>

                                <div class="col-md-6 mb-2">
                                <label class="form-label" for="reference">@lang ('lang.reference') <span class="text-danger">*</span></label>
                                <input type="text" id="reference" name="reference" class="form-control @error('reference') is-invalid @enderror" value="{{$data->reference}}">
                            </div>

                                <div class="col-md-6 mb-2">
                                <label class="form-label" for="official_note">@lang ('lang.official_note') <span class="text-danger">*</span></label>
                                <input type="text" id="official_note" name="official_note" class="form-control @error('official_note') is-invalid @enderror" value="{{$data->official_note}}">
                            </div>

                                <div class="col-md-6 mb-2">
                                <label class="form-label" for="note_by_checker">@lang ('lang.note_by_checker') <span class="text-danger">*</span></label>
                                <input type="text" id="note_by_checker" name="note_by_checker" class="form-control @error('note_by_checker') is-invalid @enderror" value="{{$data->note_by_checker}}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                            <div class="form-group mb-0" style="text-align: right;">
                                <input type="hidden" name="id" value="{{$data->id}}" id="">
                                <a href="{{url('admins/village')}}" class="btn btn-secondary btn-pills waves-effect waves-themed">Cancel</a>
                                <button type="submit" class="btn btn-success btn-pills waves-effect waves-themed">Submit</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
