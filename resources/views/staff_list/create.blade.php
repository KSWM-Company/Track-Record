{{--  @extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-2" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.staff_list')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <form action="{{url('admins/staff-list')}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-4" style="display: flex;justify-content: center;">
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            <img src="{{ asset('/images/fetch_photo/avatar-admin.jpg') }}" class=" imagestaff_preview shadow-3 img-thumbnail" alt="article photo">
                                            <input type="hidden" name="old_profile" id="old_profile" value="">
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="profile" name="profile">
                                            <label class="custom-file-label" for="profile">@lang('lang.choose_images')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="Name">@lang('lang.name') <span class="text-danger">*</span></label>
                                        <input type="text" id="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="">
                                    </div>
                                    <div class="col-md-12 mb-2" data-select2-id="35">
                                        <label class="form-label" for="single-default">@lang('lang.sex')</label>
                                        <select class="select2 form-control w-100  select2-hidden-accessible" name="sex" id="sex" data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                        <option value="Female">@lang('lang.female')</option>
                                        <option value="Male">@lang('lang.male')</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="Phone_Number">@lang('lang.phone_number') <span class="text-danger">*</span></label>
                                        <input type="number" id="Phone_Number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="Position">@lang('lang.position') <span class="text-danger">*</span></label>
                                        <input type="text" id="Position" name="position" class="form-control @error('position') is-invalid @enderror" value="">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-2" style="text-align: right;">
                                            <a href="{{url('admins/staff-list')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                            <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                                        </div>
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
@section('script')
    <script>
       $(document).on('change','#profile', function() {
            if (this.files && this.files[0]) {
                let img = document.querySelector('.imagestaff_preview');
                img.onload = () =>{
                    URL.revokeObjectURL(img.src);
                }
                img.src = URL.createObjectURL(this.files[0]);
                document.querySelector(".imagestaff_preview").files = this.files;
            }
        });
    </script>
@endsection  --}}

<div id="StaffListCreateModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.staff_list')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{url('admins/staff-list')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="">
                                <label class="form-label" for="example-textarea">@lang('lang.name') <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required>
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

