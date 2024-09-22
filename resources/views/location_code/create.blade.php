<div id="createLocationCodeModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.location_code')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admins/location-code')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-2" data-select2-id="35">
                                <label class="form-label" for="single-default">@lang('lang.type') <span class="text-danger">*</span></label>
                                <select class="form-control @error('type') is-invalid @enderror" name="type" id="type" required>
                                    <option value="">--Select--</option>
                                    <option value="Block">Block</option>
                                    <option value="Sector">Sector</option>
                                    <option value="Street">Street</option>
                                    <option value="Site_of_Street">Site of Street</option>
                                    <option value="House_Order">House Order</option>
                                    <option value="Devide_Order">Devide Order</option>
                                    <option value="Floor">Floor</option>
                                    <option value="Posstion">Posstion</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="example-textarea">@lang('lang.description')</label>
                                <textarea class="form-control @error('name') is-invalid @enderror" name="name" id="name" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-2" style="text-align: right;">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed ">@lang('lang.submit')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(".submit-btn").on('click', function(e) {
        let numRequired = 0;
        $(".field_required").each(function() {
            if ($(this).val().trim() === "") {
                $(this).css("border-color", "red");
                numRequired++;
            } else {
                $(this).css("border-color", ""); // Reset border color if valid
            }
        });

        if (numRequired > 0) {
            e.preventDefault(); // Prevent form submission
            $("#locationCodeForm").submit(); // Submit the form if valid
        }
    });
</script>  --}}


