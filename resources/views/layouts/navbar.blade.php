@if (!Auth::check() && !Auth::user()->roles()->exists())
    <script>
        window.location = "/404";
    </script>
@endif
<nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
        <div class="position-relative">
            <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
            <a href="javascript:;" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                <i class="fal fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <ul id="js-nav-menu" class="nav-menu">
        <li class="@if (in_array(Request::instance()->segment(2), ['dashboard'])) active @endif">
            <a href="{{url('admins/dashboard')}}" title="Dashboard" data-filter-tags="Dashboard">
                <span class="mr-2">
                <img src="{{asset('/admins/img/png/003-statistics.png')}}" alt="" height="20">
            </span>
                <span class="nav-link-text">@lang('lang.dashboard')</span>
            </a>
        </li>
        {{-- User --}}
        @can('User View')
            <li class="@if (in_array(Request::instance()->segment(2), ['users'])) active @endif">
                <a href="{{url('admins/users')}}" title="Users" data-filter-tags="User">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/024-user.png')}}" alt="" height="20">
                    </span>
                    <span class="nav-link-text">@lang('lang.users')</span>
                </a>
            </li>
        @endcan

        {{-- branch --}}
        @can('Branch View')
            <li class="@if (in_array(Request::instance()->segment(2), ['branch'])) active @endif">
                <a href="{{url('admins/branch')}}" title="branch" data-filter-tags="branch">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/009-branch.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-share-from-square"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.branch')</span>
                </a>
            </li>
        @endcan
        {{-- Location Code --}}
        @can('Location Code View')
            <li class="@if (in_array(Request::instance()->segment(2), ['location-code'])) active @endif">
                <a href="{{url('admins/location-code')}}" title="location-code" data-filter-tags="location-code">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/007-location.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-location-dot"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.location_code')</span>
                </a>
            </li>
        @endcan
        {{-- business-type --}}
        @can('Location Code View')
            <li class="@if (in_array(Request::instance()->segment(2), ['business-type', 'category','sub-category'])) active @endif">
                <a href="#" title="Business Type" data-filter-tags="Business Type" aria-expanded="{{Request::is('admins/business-type') ? 'true' : 'false'}}">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/008-negotiation.png')}}" alt="" height="20">
                    </span>
                    <span class="nav-link-text">@lang('lang.business_type')</span>
                </a>
                <ul>
                    <li class="@if (in_array(Request::instance()->segment(2), ['business-type'])) active @endif">
                        <a href="{{url('admins/business-type')}}" title="Business Type" data-filter-tags="BusinesType" >
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/008-negotiation.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.business_type')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['category'])) active @endif">
                        <a href="{{url('admins/category')}}" title="Category" data-filter-tags="Category">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/011-category.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.category')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['sub-category'])) active @endif">
                        <a href="{{url('admins/sub-category')}}" title="Sub Category" data-filter-tags="Sub Category">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/017-categories-2.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.sub_category')</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        {{-- Menu Pre-Sursey --}}
        @can('Pre Survey View')
            <li class="@if (in_array(Request::instance()->segment(3),['pre-survey','pre_survey'])) active @endif">
                <a href="javascript:;" title="Survey Management" data-filter-tags="pre_survey" aria-expanded="false">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/040-survey-data.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-gear"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.pre_survey')</span>
                </a>
                <ul>
                    <li class="@if (in_array(Request::instance()->segment(3), ['pre-survey'])) active @endif">
                        <a href="{{url('admins/pre/pre-survey')}}" title="Pre Survey" data-filter-tags="pre-survey">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/002-surveyor.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.pre_survey')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(3), ['pre_survey'])) active @endif">
                        <a href="{{url('admins/map/pre_survey')}}" title="Map Pre Survey" data-filter-tags="map pre-survey">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/002-surveyor.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.map')</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        {{-- Menu Sursey --}}
        @if(Auth::user()->can('Survey View'))
            <li class="@if (in_array(Request::instance()->segment(2),['survey','location-list','changes-survey'])) active @endif">
                <a href="javascript:;" title="Survey Management" data-filter-tags="survey_management" aria-expanded="false">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/040-survey-data.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-gear"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.survey_management')</span>
                </a>
                <ul>
                    <li class="@if (in_array(Request::instance()->segment(3), ['create'])) active @endif">
                        <a href="{{url('admins/survey/create')}}" title="survey" data-filter-tags="survey">
                                <span class="mr-2">
                                    <img src="{{asset('/admins/img/png/002-surveyor.png')}}" alt="" height="20">
                                </span>
                            <span class="nav-link-text">@lang('lang.new_survey')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['survey']) && count(Request::segments()) == 2)  active @endif">
                        <a href="{{url('admins/survey')}}" title="Survey List" data-filter-tags="survey_list">
                                <span class="mr-2">
                                    <img src="{{asset('/admins/img/png/041-survey-list.png')}}" alt="" height="20">
                                    {{--  <i class="fa-solid fa-people-group"></i>  --}}
                                </span>
                            <span class="nav-link-text">@lang('lang.survey_list')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['location-list']) && count(Request::segments()) == 2) active @endif">
                        <a href="{{url('admins/location-list')}}" title="Location List" data-filter-tags="location-list ">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/042-change-urvey.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.location_list')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['changes-survey']) && count(Request::segments()) == 2) active @endif">
                        <a href="{{url('admins/changes-survey')}}" title="Request Change Survey" data-filter-tags="changes">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/042-change-urvey.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.request_change_survey')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['request_delete_survey'])) active @endif">
                        <a href="{{url('admins/request_delete_survey')}}" title="Request Delete Survey" data-filter-tags="request_delete_survey">
                                <span class="mr-2">
                                    <img src="{{asset('/admins/img/png/043-delete-survey.png')}}" alt="" height="20">
                                    {{--  <i class="fa-solid fa-people-group"></i>  --}}
                                </span>
                            <span class="nav-link-text">@lang('lang.request_delete_survey')</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        {{-- Customers --}}
        @if(Auth::user()->can('Customer View'))
            <li class="@if (in_array(Request::instance()->segment(2), ['customer'])) active @endif">
                <a href="javascript:;" title="Customer" data-filter-tags="customer" aria-expanded="false">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/005-customer-review.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-gear"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.customers')</span>
                </a>
                <ul>
                    <li class="@if (in_array(Request::instance()->segment(3), ['create'])) active @endif">
                        <a href="{{url('admins/customer/create')}}" title="New Customer" data-filter-tags="new_customer">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/034-new-account.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.new_customers')</span>
                        </a>
                    </li>

                    <li class="@if (in_array(Request::instance()->segment(2), ['customer']) && count(Request::segments()) == 2) active @endif">
                        <a href="{{url('admins/customer')}}" title="Customer List" data-filter-tags="customer_list">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/034-new-account.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.customer_list')</span>
                        </a>
                    </li>

                    {{-- customer request --}}
                    <li class="@if (in_array(Request::instance()->segment(4), ['request','type'])) active @endif">
                        <a href="{{url('admins/customer/chang/request')}}" title="Customer Request" data-filter-tags="customer Request" aria-expanded="false">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/035-change-customer.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.request_change_customer')</span>
                        </a>
                    </li>

                    <li class="@if (in_array(Request::instance()->segment(2), ['request_cancel_customer'])) active @endif">
                        <a href="{{url('admins/request_cancel_customer')}}" title="Request Cancel Customer" data-filter-tags="request_cancel_customer">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/036-cancel-customer.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.request_cancel_customer')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['customer_defaulted'])) active @endif">
                        <a href="{{url('admins/customer_defaulted')}}" title="Customer Defaulted" data-filter-tags="customer_defaulted">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/003-exchange.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.customer_defaulted')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['customer_view'])) active @endif">
                        <a href="{{url('admins/customer_view')}}" title="Customer View" data-filter-tags="customer_view">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/038-customer-view.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.customer_view')</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        {{-- check role permission --}}
        @if (Auth::user()->hasRole('Manager'))
            {{-- Agreement --}}
            <li class="@if (Request::instance()->segment(2) == 'agreement') active @endif">
                <a href="{{url('admins/agreement')}}" title="Agreement" data-filter-tags="agreement">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/039-agreement.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-people-group"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.agreement')</span>
                </a>
            </li>
            {{-- payment --}}
            <li class="@if (Request::instance()->segment(2) == 'payment') active @endif">
                <a href="{{url('admins/payment')}}" title="Payment" data-filter-tags="Payment">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/053-cash-payment.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-people-group"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.payment')</span>
                </a>
            </li>
            {{-- Invoice Management --}}
            <li class="@if (in_array(Request::instance()->segment(2), ['new-bill','request-change-bill', 'request-delete-bill','bill-planing', 'reprint-billing', 'invoice_settlement'])) active @endif">
                <a href="javascript:;" title="Invoice Management" data-filter-tags="Invoice Management" aria-expanded="false">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/028-billingmanagement.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-gear"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.invoice_management')</span>
                </a>
                <ul>
                    <li class="@if (in_array(Request::instance()->segment(2), ['new-invoice'])) active @endif">
                        <a href="{{url('admins/new-invoice')}}" title="New Invoice" data-filter-tags="New Invoice">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/029-newbill.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text" >@lang('lang.new_invoice')</span>
                        </a>
                    </li>

                    <li class="@if (in_array(Request::instance()->segment(2), ['request-change-bill'])) active @endif">
                        <a href="{{url('admins/request-change-bill')}}" title="Users" data-filter-tags="User">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/030-changebill.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.request-change-bill')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['request-delete-bill'])) active @endif">
                        <a href="{{url('admins/request-delete-bill')}}" title="request-delete-bill" data-filter-tags="request-delete-bill">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/030-deletebill.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.request-delete-bill')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['bill-planing'])) active @endif">
                        <a href="{{url('admins/bill-planing')}}" title="bill-planing" data-filter-tags="bill-planing">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/032-printbill.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.bill-planing')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['reprint-billing'])) active @endif">
                        <a href="{{url('admins/reprint-billing')}}" title="Reprint Billing" data-filter-tags="reprint-billing">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/032-printbill.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.reprint-billing')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['invoice_settlement'])) active @endif">
                        <a href="{{url('admins/invoice_settlement')}}" title="Invoice Settlement" data-filter-tags="invoice_settlement">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/051-settlement.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.invoice_settlement')</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Approval --}}
            <li class="@if (in_array(Request::instance()->segment(2), ['approval','approve_new_customer', 'approve_new_agreement', 'approve_new_invoice', 'approve_change_customer', 'approve_change_invoice', 'approve_change_survey'])) active @endif">
                <a href="javascript:;" title="Approval" data-filter-tags="approval" aria-expanded="false">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/044-approved.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-gear"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.approval')</span>
                </a>
                <ul>
                    <li class="@if (in_array(Request::instance()->segment(2), ['approve_new_customer'])) active @endif">
                        <a href="{{url('admins/approve_new_customer')}}" title="Approve New Customer" data-filter-tags="approve_new_customer">
                                <span class="mr-2">
                                    <img src="{{asset('/admins/img/png/050-approve-new-customer.png')}}" alt="" height="20">
                                </span>
                            <span class="nav-link-text">@lang('lang.approve_new_customer')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['approve_new_agreement'])) active @endif">
                        <a href="{{url('admins/survey_list')}}" title="Approve New Agreement" data-filter-tags="approve_new_agreement">
                                <span class="mr-2">
                                    <img src="{{asset('/admins/img/png/049-approve-new-agreement.png')}}" alt="" height="20">
                                    {{--  <i class="fa-solid fa-people-group"></i>  --}}
                                </span>
                            <span class="nav-link-text">@lang('lang.approve_new_agreement')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['approve_new_invoice'])) active @endif">
                        <a href="{{url('admins/approve_new_invoice')}}" title="Approve New Invoice" data-filter-tags="approve_new_invoice">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/045-approve-new-invoice.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.approve_new_invoice')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['approve_change_customer'])) active @endif">
                        <a href="{{url('admins/approve_change_customer')}}" title="Approve Change Customer" data-filter-tags="approve_change_customer">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/046-approve-change-customer.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.approve_change_customer')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['approve_change_invoice'])) active @endif">
                        <a href="{{url('admins/approve_change_invoice')}}" title=" Approve Change Invoice" data-filter-tags="approve_change_invoice">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/047-approve-change-invoice.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.approve_change_invoice')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['approve_change_survey'])) active @endif">
                        <a href="{{url('admins/approve_change_survey')}}" title=" Approve Change Survey" data-filter-tags="approve_change_survey">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/048-approve-change-survey.png')}}" alt="" height="20">
                                {{--  <i class="fa-solid fa-people-group"></i>  --}}
                            </span>
                            <span class="nav-link-text">@lang('lang.approve_change_survey')</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Setting --}}
            <li class="@if (in_array(Request::instance()->segment(2), ['staff-list', 'currencies','province', 'district','commune','village', 'payment-type','company-info'])) active @endif">
                <a href="javascript:;" title="Settings" data-filter-tags="settings" aria-expanded="false">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/023-setting.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-gear"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.setting')</span>
                </a>
                <ul>
                    <li class="@if (in_array(Request::instance()->segment(2), ['staff-list'])) active @endif">
                        <a href="{{url('admins/staff-list')}}" title="Staff List" data-filter-tags="StaffList">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/026-stafflist.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text" >@lang('lang.staff_list')</span>
                        </a>
                    </li>

                    <li class="@if (in_array(Request::instance()->segment(2), ['currencies'])) active @endif">
                        <a href="{{url('admins/currencies')}}" title="currencies" data-filter-tags="currencies">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/027-currency.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.exchange_rate')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['payment-type'])) active @endif">
                        <a href="{{url('admins/payment-type')}}" title="Payment Type" data-filter-tags="payment-type">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/033-paymenttype.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.payment_types')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['company-info'])) active @endif">
                        <a href="{{url('admins/company-info')}}" title="Company" data-filter-tags="Company">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/052-company.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.company_info')</span>
                        </a>
                    </li>
                    {{-- Address --}}
                    <li class="@if (in_array(Request::instance()->segment(2), ['province', 'district','commune','village'])) active @endif">
                        <a href="#" title="Address" data-filter-tags="Address" aria-expanded="{{Request::is('admins/province') ? 'true' : 'false'}}">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/006-address.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.address')</span>
                        </a>
                        <ul>
                            <li class="@if (in_array(Request::instance()->segment(2), ['province'])) active @endif">
                                <a href="{{url('admins/province')}}" title="Province" data-filter-tags="Province" >
                                    <span class="mr-2">
                                        <img src="{{asset('/admins/img/png/008-village.png')}}" alt="" height="20">
                                    </span>
                                    <span class="nav-link-text" data-i18n="nav.province">@lang('lang.province')</span>
                                </a>
                            </li>

                            <li class="@if (in_array(Request::instance()->segment(2), ['district'])) active @endif">
                                <a href="{{url('admins/district')}}" title="District" data-filter-tags="District">
                                    <span class="mr-2">
                                        <img src="{{asset('/admins/img/png/008-village.png')}}" alt="" height="20">
                                    </span>
                                    <span class="nav-link-text">@lang('lang.district')</span>
                                </a>
                            </li>
                            <li class="@if (in_array(Request::instance()->segment(2), ['commune'])) active @endif">
                                <a href="{{url('admins/commune')}}" title="Commune" data-filter-tags="Commune">
                                    <span class="mr-2">
                                        <img src="{{asset('/admins/img/png/008-village.png')}}" alt="" height="20">
                                    </span>
                                    <span class="nav-link-text">@lang('lang.commune')</span>
                                </a>
                            </li>
                            <li class="@if (in_array(Request::instance()->segment(2), ['village'])) active @endif">
                                <a href="{{url('admins/village')}}" title="Village" data-filter-tags="Villages">
                                    <span class="mr-2">
                                        <img src="{{asset('/admins/img/png/008-village.png')}}" alt="" height="20">
                                    </span>
                                    <span class="nav-link-text">@lang('lang.village')</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endif
        @if(Auth::user()->can('Role View') || Auth::user()->can('Permission View') || Auth::user()->can('Permission Category View'))
            {{-- Role --}}
            <li class="@if (in_array(Request::instance()->segment(2), ['user-log', 'permission','permission_category','roles'])) active @endif">
                <a href="javascript:;" title="Users" data-filter-tags="users" aria-expanded="false">
                    <span class="mr-2">
                        <img src="{{asset('/admins/img/png/004-menuuser.png')}}" alt="" height="20">
                        {{--  <i class="fa-solid fa-gear"></i>  --}}
                    </span>
                    <span class="nav-link-text">@lang('lang.role_permission')</span>
                </a>
                <ul>
                    <li class="@if (in_array(Request::instance()->segment(2), ['roles'])) active @endif">
                        <a href="{{url('admins/roles')}}" title="Role" data-filter-tags="Role">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/022-checklist.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.role')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['permission'])) active @endif">
                        <a href="{{url('admins/permission')}}" title="Permission" data-filter-tags="permission">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/022-checklist.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.permission')</span>
                        </a>
                    </li>
                    <li class="@if (in_array(Request::instance()->segment(2), ['permission_category'])) active @endif">
                        <a href="{{url('admins/permission/category')}}" title="Category Permission" data-filter-tags="Category permission">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/022-checklist.png')}}" alt="" height="20">
                            </span>
                            <span class="nav-link-text">@lang('lang.permission_category')</span>
                        </a>
                    </li>

                    <li class="@if (in_array(Request::instance()->segment(2), ['user-log'])) active @endif">
                        <a href="{{url('admins/user-log')}}" title="UserLog" data-filter-tags="UserLog">
                            <span class="mr-2">
                                <img src="{{asset('/admins/img/png/025-userlog.png')}}" alt="" height="20">

                            </span>
                            <span class="nav-link-text" data-i18n="nav.UserLog">@lang('lang.users_Log')</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
</nav>
