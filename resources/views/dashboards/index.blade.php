@extends('layouts.admin')
@section('content')
    @include('loading.loading')
    <div class="row">
        <div class="col-lg-12 sortable-grid ui-sortable">
            <div class="subheader">
                <h1 class="subheader-title">
                    <i class='subheader-icon fal fa-chart-area'></i> WASTIE <span class='fw-300'>Dashboard</span>
                </h1>
                <div class="d-flex mr-4">
                    <div>
                        <label class="fw-300 fs-xs d-block opacity-50">Total Fee</label>
                        <h4 class="fw-500 fs-xl d-block color-primary-500">3</h4>
                    </div>
                </div>
                <div class="d-flex mr-0">
                    <div>
                        <label class="fw-300 fs-xs d-block opacity-50">Total Fee</label>
                        <h4 class="fw-500 fs-xl d-block color-primary-500">3</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                3
                                <small class="m-0 l-h-n">Total Pre Survey</small>
                            </h3>
                        </div>
                        <i class="fal fa-globe position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                3
                                <small class="m-0 l-h-n">Total Survey</small>
                            </h3>
                        </div>
                        <i class="fal fa-gem position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                20
                                <small class="m-0 l-h-n">Total Customers</small>
                            </h3>
                        </div>
                        <i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                20
                                <small class="m-0 l-h-n">Invioce</small>
                            </h3>
                        </div>
                        <i class="fal fa-lightbulb position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
                    </div>
                </div>
            </div>

            <div id="panel-1" class="panel panel-locked panel-sortable" data-panel-lock="false" data-panel-close="false"
                data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false"
                data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false" role="widget">
                <div class="panel-hdr" role="heading">
                    <h2 class="ui-sortable-handle">
                        Live Feeds
                    </h2>
                    <div class="panel-toolbar pr-3 align-self-end" role="menu">
                        <ul id="demo_panel-tabs" class="nav nav-tabs border-bottom-0 nav-tabs-clean" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab_default-1" role="tab">Live Stats</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab_default-2" role="tab">Revenue</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-saving mr-2" style="display:none"><i class="fal fa-spinner-third fa-spin-4x fs-xl"></i></div>
                </div>
                <div class="panel-container show" role="content">
                    <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                        <div class="row no-gutters">
                            <div class="col-lg-7 col-xl-8">
                                <div class="position-relative">
                                    <div
                                        class="custom-control custom-switch position-absolute pos-top pos-left ml-5 mt-3 z-index-cloud">
                                        <input type="checkbox" class="custom-control-input" id="start_interval">
                                        <label class="custom-control-label" for="start_interval">Live Update</label>
                                    </div>
                                    <div id="updating-chart" style="height: 242px; padding: 0px; position: relative;">
                                        <canvas class="flot-base" width="967" height="302"
                                            style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 773.6px; height: 242px;"></canvas><canvas
                                            class="flot-overlay" width="967" height="302"
                                            style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 773.6px; height: 242px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-4 pl-lg-3">
                                <div class="d-flex mt-2">
                                    My Tasks
                                    <span class="d-inline-block ml-auto">130 / 500</span>
                                </div>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-fusion-400" role="progressbar" style="width: 65%;"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex">
                                    Transfered
                                    <span class="d-inline-block ml-auto">440 TB</span>
                                </div>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-success-500" role="progressbar" style="width: 34%;"
                                        aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex">
                                    Bugs Squashed
                                    <span class="d-inline-block ml-auto">77%</span>
                                </div>
                                <div class="progress progress-sm mb-3">
                                    <div class="progress-bar bg-info-400" role="progressbar" style="width: 77%;"
                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex">
                                    User Testing
                                    <span class="d-inline-block ml-auto">7 days</span>
                                </div>
                                <div class="progress progress-sm mb-g">
                                    <div class="progress-bar bg-primary-300" role="progressbar" style="width: 84%;"
                                        aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <a href="#"
                                            class="btn btn-default btn-block waves-effect waves-themed">Generate PDF</a>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <a href="#"
                                            class="btn btn-default btn-block waves-effect waves-themed">Report a Bug</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-content p-0">
                        <div class="row row-grid no-gutters">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="px-3 py-2 d-flex align-items-center">
                                    <div class="js-easy-pie-chart color-primary-300 position-relative d-inline-flex align-items-center justify-content-center"
                                        data-percent="75" data-piesize="50" data-linewidth="5" data-linecap="butt"
                                        data-scalelength="0">
                                        <div
                                            class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                            <span class="js-percent d-block text-dark">75</span>
                                        </div>
                                        <canvas height="62" width="62"
                                            style="height: 50px; width: 50px;"></canvas>
                                    </div>
                                    <span class="d-inline-block ml-2 text-muted">
                                        SERVER LOAD
                                        <i class="fal fa-caret-up color-danger-500 ml-1"></i>
                                    </span>
                                    <div class="ml-auto d-inline-flex align-items-center">
                                        <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30"
                                            sparkwidth="70" sparklinecolor="#886ab5" sparkfillcolor="false"
                                            sparklinewidth="1" values="5,6,5,3,8,6,9,7,4,2"><canvas width="70"
                                                height="30"
                                                style="display: inline-block; width: 70px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                        <div class="d-inline-flex flex-column small ml-2">
                                            <span
                                                class="d-inline-block badge badge-success opacity-50 text-center p-1 width-6">97%</span>
                                            <span
                                                class="d-inline-block badge bg-fusion-300 opacity-50 text-center p-1 width-6 mt-1">44%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="px-3 py-2 d-flex align-items-center">
                                    <div class="js-easy-pie-chart color-success-500 position-relative d-inline-flex align-items-center justify-content-center"
                                        data-percent="79" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                        <div
                                            class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                            <span class="js-percent d-block text-dark">79</span>
                                        </div>
                                        <canvas height="62" width="62"
                                            style="height: 50px; width: 50px;"></canvas>
                                    </div>
                                    <span class="d-inline-block ml-2 text-muted">
                                        DISK SPACE
                                        <i class="fal fa-caret-down color-success-500 ml-1"></i>
                                    </span>
                                    <div class="ml-auto d-inline-flex align-items-center">
                                        <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30"
                                            sparkwidth="70" sparklinecolor="#1dc9b7" sparkfillcolor="false"
                                            sparklinewidth="1" values="5,9,7,3,5,2,5,3,9,6"><canvas width="70"
                                                height="30"
                                                style="display: inline-block; width: 70px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                        <div class="d-inline-flex flex-column small ml-2">
                                            <span
                                                class="d-inline-block badge badge-info opacity-50 text-center p-1 width-6">76%</span>
                                            <span
                                                class="d-inline-block badge bg-warning-300 opacity-50 text-center p-1 width-6 mt-1">3%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="px-3 py-2 d-flex align-items-center">
                                    <div class="js-easy-pie-chart color-info-500 position-relative d-inline-flex align-items-center justify-content-center"
                                        data-percent="23" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                        <div
                                            class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                            <span class="js-percent d-block text-dark">23</span>
                                        </div>
                                        <canvas height="62" width="62"
                                            style="height: 50px; width: 50px;"></canvas>
                                    </div>
                                    <span class="d-inline-block ml-2 text-muted">
                                        DATA TTF
                                        <i class="fal fa-caret-up color-success-500 ml-1"></i>
                                    </span>
                                    <div class="ml-auto d-inline-flex align-items-center">
                                        <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30"
                                            sparkwidth="70" sparklinecolor="#51adf6" sparkfillcolor="false"
                                            sparklinewidth="1" values="3,5,2,5,3,9,6,5,9,7"><canvas width="70"
                                                height="30"
                                                style="display: inline-block; width: 70px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                        <div class="d-inline-flex flex-column small ml-2">
                                            <span
                                                class="d-inline-block badge bg-fusion-500 opacity-50 text-center p-1 width-6">10GB</span>
                                            <span
                                                class="d-inline-block badge bg-fusion-300 opacity-50 text-center p-1 width-6 mt-1">10%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="px-3 py-2 d-flex align-items-center">
                                    <div class="js-easy-pie-chart color-fusion-500 position-relative d-inline-flex align-items-center justify-content-center"
                                        data-percent="36" data-piesize="50" data-linewidth="5" data-linecap="butt">
                                        <div
                                            class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                            <span class="js-percent d-block text-dark">36</span>
                                        </div>
                                        <canvas height="62" width="62"
                                            style="height: 50px; width: 50px;"></canvas>
                                    </div>
                                    <span class="d-inline-block ml-2 text-muted">
                                        TEMP.
                                        <i class="fal fa-caret-down color-success-500 ml-1"></i>
                                    </span>
                                    <div class="ml-auto d-inline-flex align-items-center">
                                        <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30"
                                            sparkwidth="70" sparklinecolor="#fd3995" sparkfillcolor="false"
                                            sparklinewidth="1" values="5,3,9,6,5,9,7,3,5,2"><canvas width="70"
                                                height="30"
                                                style="display: inline-block; width: 70px; height: 30px; vertical-align: top;"></canvas>
                                        </div>
                                        <div class="d-inline-flex flex-column small ml-2">
                                            <span
                                                class="d-inline-block badge badge-danger opacity-50 text-center p-1 width-6">124</span>
                                            <span
                                                class="d-inline-block badge bg-info-300 opacity-50 text-center p-1 width-6 mt-1">40F</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
