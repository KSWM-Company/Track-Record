{{--  @extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show" style="">
                    <div class="panel-content">
                        <form action="{{url('admins/staff-list',$data->id)}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-4" style="display: flex;justify-content: center;">
                                    <div class="col-md-6">
                                        <div class="form-group mt-1">
                                            @if ($data->profile == null)
                                                <img src="{{ asset('/images/profilesstaff/avatar-admin.jpg') }}" class="imagestaff_preview shadow-2 img-thumbnail" alt="article photo">
                                            @else
                                                <img src="{{ asset('/images/profiles/'.$data->profile) }}" class="imagestaff_preview shadow-2 img-thumbnail" alt="article photo">
                                            @endif
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="profile" name="profile">
                                            <label class="custom-file-label" for="profile">@lang('lang.choose_images')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="name">@lang('lang.name') <span class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$data->name}}">
                                    </div>
                                    <div class="col-md-12 mb-2" data-select2-id="35">
                                        <label class="form-label" for="single-default">@lang('lang.sex') <span class="text-danger">*</span></label>
                                        <select class="select2 form-control w-100 select2-hidden-accessible" name="sex" id="sex" data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                        <option value="Female" {{ $data->sex == "Female" ? "selected" : "" }}>Female</option>
                                        <option value="Male" {{ $data->sex == "Male" ? "selected" : "" }}>Male</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="phone_number">@lang('lang.phone_number') <span class="text-danger">*</span></label>
                                        <input type="number" id="phonenumber" name="phone_number" maxlength="12" class="form-control @error('phone_number') is-invalid @enderror" value="{{$data->phone_number}}">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="form-label" for="position">@lang('lang.position') <span class="text-danger">*</span></label>
                                        <input type="text" id="Position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{$data->position}}">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-0" style="text-align: right;">
                                            <input type="hidden" name="old_profile" id="old_profile" value="{{$data->profile}}">
                                            <input type="hidden" name="id" value="{{ $data->id}}">
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
