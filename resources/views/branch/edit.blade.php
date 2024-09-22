<div id="editBranchModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.branch')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="{{url('admins/branch/update')}}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name_kh">@lang('lang.name_kh') <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name_kh') is-invalid @enderror" name="name_kh" id="e_name_kh">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="name_en">@lang('lang.name_en') <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" id="e_name_en">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label" for="example-textarea">@lang('lang.description')</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="e_description" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2" style="text-align: right;">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="" id="e_id">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                            <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

