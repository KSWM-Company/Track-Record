<div id="PreSurveyCreateModal" class="modal custom-modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('lang.pre_survey')</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{url('admins/pre-survey')}}" method="POST" enctype="multipart/form-data" class="needs-validation"  novalidate> --}}
                    {{-- @csrf --}}
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label" for="single-default">@lang('lang.category')<span class="text-danger">*</span></label>
                            <select class="form-control changeCategory pre_survey_required" name="category_id" id="category_id">
                                <option value="">-- @lang('lang.select') --</option>
                                @foreach ($Category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="single-default">@lang('lang.business_type')<span class="text-danger">*</span></label>
                            <select class="form-control onChangeCategory pre_survey_required" name="sub_category_id" id="sub_category_id">
                                <option value="">-- @lang('lang.select') --</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label" for="single-default">@lang('lang.block')<span class="text-danger">*</span></label>
                            <select class="form-control pre_survey_required" name="block_id" id="block_id">
                                <option value="">-- @lang('lang.select') --</option>
                                @foreach ($blocks as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="single-default">@lang('lang.sector')<span class="text-danger">*</span></label>
                            <select class="form-control pre_survey_required" name="sector_id" id="sector_id">
                                <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($sectors as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label" for="single-default">@lang('lang.street_no')<span class="text-danger">*</span></label>
                            <select class="form-control pre_survey_required" name="street_id" id="street_id">
                                <option value="">-- @lang('lang.select') --</option>
                                @foreach ($streets as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="single-default">@lang('lang.side_of_street')<span class="text-danger">*</span></label>
                            <select class="form-control pre_survey_required" name="side_of_street_id" id="side_of_street_id">
                                <option value="">-- @lang('lang.select') --</option>
                                    @foreach ($side_of_streets as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="col-md-12" style="border: 2px dashed #dedede;border-radius: 5px;background: #f5f5f5;display: -webkit-box;display: -ms-flexbox;display: flex;-ms-flex-wrap: wrap;flex-wrap: wrap;padding: 0.5rem;">
                            <div id="previewImage">
                                <div class="imgGallery"></div>
                                <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple style="display:none">
                                <label for="chooseFile" id="lb_image">@lang('lang.choose_images')</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label" for="location_longitude">@lang('lang.longitude')</label>
                            <input type="text" id="location_longitude" name="location_longitude" class="form-control field_survey_detail_required" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="location_latitude">@lang('lang.latitude')</label>
                            <input type="text" id="location_latitude" name="location_latitude" class="form-control field_survey_detail_required" value="">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mb-2">
                            <label class="form-label" for="link_map">@lang('lang.link_google_map')</label>
                            <input type="text" id="link_map" name="link_map" class="form-control field_survey_detail_required" value="">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div style="text-align: right;">
                                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
                                <a href="javascript:void(0);" class="btn btn-outline-success btn-pills waves-effect waves-themed" id="btnSubmitPreSurvey">@lang('lang.submit')</a>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
