<div id="SubCategoryModal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.import_sub_category')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <form action="{{ url('admins/sub/category/import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-0">
                        <label class="form-label">@lang('lang.import_excel')</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="customFile" accept=".xls, .xlsx, .csv">
                            <label class="custom-file-label" for="customFile">@lang('lang.choose_file')</label>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <div class="text-end" style="text-align: right;">
                            <button type="submit" class="btn btn-outline-success submit-btn">
                                <span class="btn-text-submit">@lang('lang.submit')</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
