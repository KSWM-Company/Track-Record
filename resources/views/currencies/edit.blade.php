@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-2" class="panel">
                <div class="panel-container collapse show">
                    <div class="panel-hdr bg-success-600">
                        <h2>
                            @lang('lang.exchange_rate')
                        </h2>
                    </div>
                    <div class="panel-content">
                        <form action="{{url('admins/currencies',$data->id)}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="single-default">@lang('lang.name')</label>
                                    <select class="select2 form-control w-100  select2-hidden-accessible" name="name" id="name" data-select2-id="single-default" tabindex="-1" aria-hidden="true">
                                    <option value="">-- Select --</option>
                                    <option value="USD" {{ $data->name == "USD" ? "selected" : "" }}>@lang('lang.usd')</option>
                                    <option value="Riel" {{ $data->name == "Riel" ? "selected" : "" }}>@lang('lang.riel')</option>

                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="single-default">@lang('lang.amount_usd') <span class="text-danger">*</span></label>
                                <input type="number" id="amount_usd" name="amount_usd" class="form-control" value="{{$data->amount_usd}}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label" for="single-default">@lang('lang.amount_riel') <span class="text-danger">*</span></label>
                                    <input type="number" id="amount_riel" name="amount_riel" class="form-control" value="{{$data->amount_riel}}">
                                    </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="exchange_date">@lang('lang.exchange_date') <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" id="exchange_date" name="exchange_date" class="form-control exchange_date_disabled datepicker exchange_date_required" value="{{$data->exchange_date}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text fs-xl">
                                                <i class="fal fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="mb-2" style="text-align: right;">
                                    <input type="hidden" name="id" value="{{ $data->id}}">
                                    <a href="{{url('admins/currencies')}}" class="btn btn-outline-secondary btn-pills waves-effect waves-themed">@lang('lang.cancel')</a>
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
