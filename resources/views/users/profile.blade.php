    @extends('layouts.admin')

    @section('content')
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admins/dashboard')}}">@lang('lang.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="{{url('admins/users')}}">@lang('lang.user_profile')</a></li>
        </ol>
        <div class="row">
            <div class="col-md-4">
                <div style="text-align: center;">
                <div id="panel-2" class="panel" >
                    <div class="panel-container collapse show">
                        <div class="panel-content" >
                            <div class="col-md-8">
                                <div class="card-body" style="text-align: center;">
                                    <img src="{{ asset('/images/fetch_photo/avatar-admin.jpg') }}" class=" imagestaff_preview shadow-3 img-thumbnail " alt="article photo" style="width: 127px;height:127px;border-radius: 50%;border: 2px solid #08ff67;">
                                    <input type="hidden" name="old_profile" id="old_profile" value="">
                                </div>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="profile" name="profile">
                                    <label class="custom-file-label"  for="profile">@lang('lang.choose_images')</label>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="panel-2" class="panel">
                    <div class="panel-container collapse show">
                        <div class="panel-hdr bg-success-600">
                            <h2>
                                @lang('lang.user_profile')
                            </h2>
                        </div>
                        <div class="panel-content">
                            <form action="" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label" for="cs_id">@lang('lang.user_id') <span class="text-danger">*</span></label>
                                            <input type="text" id="cs_id" name="cs_id" class="form-control @error('cs_id') is-invalid @enderror" value="{{ $data->cs_id }}">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label" for="Name">@lang('lang.name') <span class="text-danger">*</span></label>
                                            <input type="text" id="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label" for="Name">@lang('lang.role') <span class="text-danger">*</span></label>
                                            <input type="text" id="role_id" name="role_id" class="form-control" value="{{ $data->role_name}}" disabled>
                                        </div>
                                        <div class="col-md-12 mb-2" data-select2-id="35">
                                            <label class="form-label" for="single-default">@lang('lang.sex')</label>
                                            <select class="select2 form-control w-100  select2-hidden-accessible" name="sex" id="sex" data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                                <option value="Female">@lang('lang.female')</option>
                                                <option value="Male">@lang('lang.male')</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label" for="date_of_birth">@lang('lang.date_of_birth') <span class="text-danger">*</span></label>
                                            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{$data->date_of_birth}}">
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="form-label" for="single-default">@lang('lang.restrict_branch') <span class="text-danger">*</span></label>
                                            <input type="text" id="branches" name="branches[]" class="form-control" value="{{ $data->RestrictBranch}}" disabled>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2" style="text-align: right;">
                                                <a href="{{url('admins/users')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
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
    @endsection
