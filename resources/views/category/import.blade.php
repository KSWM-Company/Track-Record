<div id="CategoryModal" class="modal custom-modal fade" style="display: none;" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.import_category')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 alert thanLess" style="display:none;background-color:#F7D7DA">
                    <span id="thanLess"></span>
                </div>
                <div class="form-group mb-0">
                    <label class="form-label">@lang('lang.import_excel')</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="customFile" accept=".xls, .xlsx, .csv">
                        <label class="custom-file-label" for="customFile">@lang('lang.choose_file')</label>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <div class="text-end" style="text-align: right;">
                        <button type="submit" class="btn btn-outline-success submit-btn position-relative">
                            <div class="spinner-border spinner-border-sm position-absolute start-0 top-50 translate-middle-y loading-icon" role="status" style="left: 0px; display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span class="btn-text-submit">@lang('lang.submit')</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#customFile").on("change", function(){
            $(".thanLess").hide();
            $("#thanLess").text("");
        });
        $(".submit-btn").on("click", function(e) {
            if ($('#customFile').val() == "") {
                $("#thanLess").text("@lang('lang.please_select_file')").css("color", "red");
                $(".thanLess").show();
                return false;
            }

            e.preventDefault(); // Prevent form submission
            var btn = $(this); // Reference to the clicked button
            $(".loading-icon").removeClass("hide").show();
            btn.attr("disabled", true);
            $(".close").remove();
            $(".btn-text-submit").text("@lang('lang.processing')");


            // Prepare form data for submission
            var file_data = $('#customFile').prop('files')[0];
            var fileName = file_data['name'];
            var form_data = new FormData();
            var fileExtension = fileName.split('.').pop();
            var fileSize = file_data['size'];
            form_data.append('file', file_data);
            if (fileExtension == "xls" || fileExtension == "xlsx" || fileExtension == "csv" && fileSize < 1048576) {
                // Perform an AJAX request to submit form data
                $.ajax({
                    type: 'POST',
                    url: '{{ url("/admins/category/import") }}',
                    data: form_data,
                    processData: false, // Prevent jQuery from processing data
                    contentType: false, // Prevent jQuery from setting content type
                    success: function (data) {
                        if (data.mg == "success") {
                            // Display success message
                            toastr.success("@lang('lang.your_file_has_been_imported_successfully')", "@lang('lang.message_title')");
                            window.location.replace("{{ URL('admins/category') }}");
                        } else {
                            // Display error message if import fails
                            toastr.error("@lang('There was an error importing the file. Please try again')", "@lang('lang.message_title')");
                            window.location.replace("{{ URL('admins/category') }}");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Display error message if AJAX request fails
                        Swal.fire("Error!", "An error occurred while processing your request. Please try again.","error");
                    },
                    complete: function() {
                        // Hide loading spinner and re-enable the button
                        $(".loading-icon").hide();
                        btn.attr("disabled", false);
                        $(".btn-text-submit").text("@lang('lang.submit')");

                        // Close the form modal
                        $("#CategoryModal").modal("hide");

                    }
                });
            }
            // Set a timeout to hide the loading spinner and enable the button after 5 seconds
            setTimeout(function() {
                $(".loading-icon").hide();
                btn.attr("disabled", false);
            }, 5000); // 5000 milliseconds = 5 seconds
        });
    });
</script>
