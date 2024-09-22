<div class="row" style="padding-top: 10px;">
    <div class="col-xl-12">
        <div class="panel-content">
            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="form-label" for="user">ID</label>
                    {{ Form::number('id', $id, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="user">@lang('lang.users')</label>
                    {{ Form::select('user', ['' => '-- All --'] + $users->toArray(), $user, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="tran_no">@lang('lang.block')</label>
                    {{ Form::select('block', ['' => '-- All --'] + $blocks->toArray(), $block, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="sector">@lang('lang.sector')</label>
                    {{ Form::select('sector', ['' => '-- All --'] + $sectors->toArray(), $sector, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="street">@lang('lang.street_no')</label>
                    {{ Form::select('street', ['' => '-- All --'] + $streets->toArray(), $street, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="side_of_street">@lang('lang.side_of_street')</label>
                    {{ Form::select('side_of_street', ['' => '-- All --'] + $side_of_streets->toArray(), $side_of_street, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
</div>
