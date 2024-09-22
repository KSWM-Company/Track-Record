{{--  @extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-6" style="margin: auto">
            <div id="panel-1" class="panel">
                <div class="panel-container collapse show" style="">
                    <div class="panel-content">
                        <form action="{{url('admins/category',$data->id)}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="mb-2">
                                <label class="form-label" for="Name">@lang('lang.name') <span class="text-danger">*</span></label>
                                <input type="text" id="Name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$data->name}}">
                            </div>
                            <div class="mb-2" data-select2-id="35">
                                <label class="form-label" for="single-default">@lang('lang.business_type')</label>
                                <select class="select2 form-control w-100 select2-hidden-accessible" name="business_type_id" id="business_type_id" data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                    @foreach ($businessType as $item)
                                        <option value="{{$item->id}}" {{ ( $item->id == $data->business_type_id) ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2" style="text-align: right;">
                                <a href="{{url('admins/category')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                <button type="submit" class="btn btn-outline-success btn-pills waves-effect waves-themed">@lang('lang.submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  --}}
<div id="editCategoryModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.category')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admins/category/update')}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-2">
                                <label class="form-label" for="name">@lang('lang.name') <span class="text-danger">*</span></label>
                                <input type="text" id="e_name" name="name" class="form-control @error('name') is-invalid @enderror" required>
                            </div>
                            <div class="mb-2" data-select2-id="35">
                                <label class="form-label" for="single-default">@lang('lang.business_type') <span class="text-danger">*</span></label>
                                <select class="form-control @error('name') is-invalid @enderror" name="business_type_id" id="e_business_type" required>
                                    <option value="">--Select--</option>
                                    @foreach ($dataBusinessType as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div style="text-align: right;">
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


