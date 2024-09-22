<div id="LocationCodeModal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Location Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <form action="{{ url('admins/location/code/import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-0">
                        <label class="form-label">File (XLS XLSX or CSV)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="customFile" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-success submit-btn">
                                <span class="btn-text-submit">Submit</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
