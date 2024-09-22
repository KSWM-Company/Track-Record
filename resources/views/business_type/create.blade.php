{{--  @extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-6" style="margin: auto">
            <div id="panel-2" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.business_type')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <form action="{{url('admins/business-type')}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="Name">@lang('lang.name') <span class="text-danger">*</span></label>
                                <input type="text" id="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="">
                            </div>
                            <div class="form-group mb-0" style="text-align: right;">
                                <a href="{{url('admins/business-type')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  --}}
<div id="BusinessTypeCreateModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.business_type')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{url('admins/business-type')}}" method="POST" enctype="multipart/form-data" class="needs-validation"  novalidate>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="example-textarea">@lang('lang.name') <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div style="text-align: right;">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
