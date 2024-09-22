<div id="CreateSubCategoryModal" class="modal custom-modal fade" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">@lang('lang.sub_category')</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
            <div class="modal-body">
                <form action="{{url('admins/sub-category')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="single-default">@lang('lang.business_type') <span class="text-danger">*</span></label>
                                    <select class="form-control onChangeBusinessType @error('name') is-invalid @enderror" name="business_type_id" id="business_type_id" required>
                                        <option value="">-- @lang('lang.select') --</option>
                                        @foreach ($dataBusinessType as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="single-default">@lang('lang.category') <span class="text-danger">*</span></label>
                                    <select class="form-control @error('name') is-invalid @enderror" name="category_id" id="category_id" required>
                                        <option value="">-- @lang('lang.select') --</option>
                                        @foreach ($dataCategory as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label class="form-label" for="name">@lang('lang.name') <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="unit">@lang('lang.unit')</label>
                                    <input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" id="unit" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label class="form-label" for="monthly_fee">@lang('lang.monthly_fee') <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('monthly_fee') is-invalid @enderror" id="monthly_fee" name="monthly_fee" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="land_filed_fee">@lang('lang.land_filed_fee') <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('land_filed_fee') is-invalid @enderror" id="land_filed_fee" name="land_filed_fee" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="total_fee">@lang('lang.total_fee')</label>
                                    <input type="number" class="form-control @error('total_fee') is-invalid @enderror" id="total_fee" name="total_fee" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <label class="form-label" for="example-textarea">@lang('lang.noted')</label>
                                    <textarea class="form-control @error('noted') is-invalid @enderror" name="noted" id="noted"></textarea>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


