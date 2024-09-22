<div id="editlocationCodeModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.location_code')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admins/location-code/update')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12" style="margin: auto">
                            <div class="mb-2" data-select2-id="35">
                                <label class="form-label" for="single-default">Type <span class="text-danger">*</span></label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type" id="e_type" required>
                                    <option value="">--Select--</option>
                                    <option value="Block" id="e_type"  == "Block" ? "selected" : "" >Block</option>
                                    <option value="Sector" id="e_type"  == "Sector" ? "selected" : "" >Sector</option>
                                    <option value="Street" id="e_type"  == "Street" ? "selected" : "" >Street</option>
                                    <option value="Site_of_Street" id="e_type"  == "Site_of_Street" ? "selected" : "" >Site of Street</option>
                                    <option value="House_Order" id="e_type"   == "House_Order" ? "selected" : "" >House Order</option>
                                    <option value="Devide_Order" id="e_type"   == "Devide_Order" ? "selected" : "" >Devide Order</option>
                                    <option value="Floor" id="e_type"   == "Floor" ? "selected" : "" >Floor</option>
                                    <option value="Position" id="e_type" == "Position" ? "selected" : "" >Position</option>
                                </select>
                            </div>
                        </div>
                            <div class="mb-2">
                                <label class="form-label" for="example-textarea">@lang('lang.name') <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('name') is-invalid @enderror" name="name" id="e_name" required></textarea>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-2" style="text-align: right;">
                                <input type="hidden" name="id" value="" id="e_id">
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
