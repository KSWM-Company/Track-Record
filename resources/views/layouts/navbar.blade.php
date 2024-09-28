<nav id="js-primary-nav" class="primary-nav mod-bg-1 mod-nav-link nav-function-fixed header-function-fixed pace-running desktop" role="navigation">
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

        @if(Auth::user()->can('Role View') || Auth::user()->can('Permission View') || Auth::user()->can('Permission Category View'))
            {{-- Role --}}
            <li class="nav-title">Management User &amp; Role</li>
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
