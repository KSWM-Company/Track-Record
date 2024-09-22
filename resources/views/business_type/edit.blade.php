<div id="editBusinessTypeModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.business_type')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admins/business-type/update')}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label class="form-label" for="example-textarea">@lang('lang.name') <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="e_name">
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

