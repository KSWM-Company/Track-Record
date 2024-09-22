<div id="BranchModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.branch')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{url('admins/branch')}}" method="POST" enctype="multipart/form-data" class="needs-validation"  novalidate>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name_kh">@lang('lang.name_kh') <span class="text-danger">*</span></label>
                                    <input type="text" id="name_kh" name="name_kh" class="form-control @error('name_kh') is-invalid @enderror" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name_en">@lang('lang.name_en') <span class="text-danger">*</span></label>
                                    <input type="text" id="name_en" name="name_en" class="form-control @error('name_en') is-invalid @enderror" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="example-textarea">@lang('lang.description')</label>
                                    <textarea class="form-control" name="description" id="description" class="form-control @error('description') is-invalid @enderror"  required></textarea>
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
