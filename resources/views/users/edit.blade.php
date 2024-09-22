@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Users Infor
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <form method="POST" action="{{ url('admins/users',$user->id) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row form-group">
                            <div class="col-md-3">
                                <label class="form-label">@lang('lang.user_id') <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input id="cs_id" type="text" class="form-control @error('cs_id') is-invalid @enderror" name="cs_id" value="{{ $user->cs_id }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">@lang('lang.name') <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.profile')</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="profile" name="profile" value="{{$user->profile}}">
                                    <label class="custom-file-label" for="profile">@lang('lang.choose_images')</label>
                                </div>
                                <div class="form-group mt-1">
                                    <img src="{{ $user->profile }}" alt="article photo" style="width: 60px;object-fit: cover;">
                                    <input type="hidden" name="old_profile" id="old_profile" value="{{$user->profile}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.restrict_branch') <span class="text-danger">*</span></label>
                                <select class="select2 form-control w-100 select2-hidden-accessible" name="branches[]" id="branches" data-select2-id="single-default" tabindex="-1" aria-hidden="true" multiple>
                                    @foreach ($branch as $itemBranch)
                                        <option value="{{ $itemBranch->id}}" {{ in_array($itemBranch->id, $user->branches->pluck('id')->toArray()) ? "selected" : "" }}>{{ Helper::getLang() == 'en' ? $itemBranch->name_en : $itemBranch->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.access_branch') <span class="text-danger">*</span></label>
                                <select class="select2 form-control w-100 select2-hidden-accessible" name="branch_default" id="branch_default">
                                    @foreach(Auth::user()->branches as $item)
                                        <option value="{{ $item->id }}" {{ session('branch_id') == $item->id ? 'selected' : '' }}>
                                            {{ Helper::getLang() == 'en' ? $item->name_en : $item->name_en }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label">@lang('lang.email') <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="date_of_birth">@lang('lang.date_of_birth') <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" id="date_of_birth" name="date_of_birth" class="form-control datepicker" value="{{$user->date_of_birth}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text fs-xl">
                                            <i class="fal fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.sex') <span class="text-danger">*</span></label>
                                <select class="select2 form-control" name="sex" id="sex">
                                    <option value="1" {{ $user->sex == 1 ? 'selected' : '' }}>Male</option>
                                    <option value="2" {{ $user->sex == 2 ? 'selected' : '' }}>FeMale</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label class="form-label" for="single-default">@lang('lang.role') <span class="text-danger">*</span></label>
                                <select class="select2 form-control" name="role_id" id="role_id">
                                    @foreach ($role as $item)
                                        <option value="{{$item->id}}" {{$user->role_id == $item->id ? "selected" : ""}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="confirmation_password" required>
                            </div>
                        </div>
                        <div class="form-group mb-0" style="text-align: right;">
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <input type="hidden" value="{{$user->password}}" name="old_password">
                            <a href="{{url('admins/users')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                            <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

