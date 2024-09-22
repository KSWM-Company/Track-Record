@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-2" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.commune')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <form action="{{url('admins/commune')}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="district_code">@lang('lang.district_code') <span class="text-danger">*</span></label>
                                    <input type="number" id="district_code" name="district_code" class="form-control @error('district_code') is-invalid @enderror" value="">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="code">@lang('lang.code')</label>
                                    <input type="number" id="code" name="code" class="form-control @error('code') is-invalid @enderror" value="">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="Khmer">@lang('lang.khmer')</label>
                                    <input type="text" id="khmer" name="khmer" class="form-control @error('khmer') is-invalid @enderror" value="">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="Englsih">@lang('lang.english')</label>
                                    <input type="text" id="english" name="english" class="form-control @error('english') is-invalid @enderror" value="">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="reference">@lang('lang.reference')</label>
                                    <input type="text" id="reference" name="reference" class="form-control @error('reference') is-invalid @enderror" value="">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="note_by_checker">@lang('lang.note_by_checker')</label>
                                    <input type="text" id="note_by_checker" name="note_by_checker" class="form-control @error('unit') is-invalid @enderror" value="">
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="" style="text-align: right;">
                                        <a href="{{url('admins/commune')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                        <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
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


