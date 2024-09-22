<div class='row  align-items-center'>
    <div class='col-md-1'>
        @lang('lang.start_date')
    </div>
    <div class='col-md-4'>
        <input type="date" name="start_date" value="{{$start_date}}" id="start_date" class='form-control'/>
    </div>
    <div class='col-md-1'>
        @lang('lang.end_date')
    </div>
    <div class='col-md-4'>
        <input type="date" name="end_date" value="{{$end_date}}" id="end_date" class='form-control'/>
    </div>
    <div class='col-md-1'>
        <button type="submit" id="search" class="btn btn-info">Serach</button>
    </div>
</div>
