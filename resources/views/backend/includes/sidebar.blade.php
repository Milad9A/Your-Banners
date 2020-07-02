<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            @if ($logged_in_user->isAdmin() || $logged_in_user->company)
                <li class="nav-title">
                    @lang('menus.backend.sidebar.system')
                </li>

                @if($logged_in_user->isAdmin())

                    <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/auth*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                        active_class(Route::is('admin/auth*'))
                    }}" href="#">
                            <i class="nav-icon far fa-user"></i>
                            @lang('menus.backend.access.title')

                            @if ($pending_approval > 0)
                                <span class="badge badge-danger">{{ $pending_approval }}</span>
                            @endif
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link {{
                                active_class(Route::is('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                    @lang('labels.backend.access.users.management')

                                    @if ($pending_approval > 0)
                                        <span class="badge badge-danger">{{ $pending_approval }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{
                                active_class(Route::is('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                    @lang('labels.backend.access.roles.management')
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link {{
                                active_class(Route::is('admin/auth/location*'))
                            }}" href="{{ route('admin.auth.location.index') }}">
                                    @lang('labels.backend.access.locations.management')

                                    @if ($pending_approval > 0)
                                        <span class="badge badge-danger">{{ $pending_approval }}</span>
                                    @endif
                                </a>
                            </li>


                            @endif

                            @if (auth()->user()->isAdmin())

                                @foreach(\App\Company::all() as $company)
                                    <li class="nav-item">
                                        <a class="nav-link {{
                                    active_class(Route::is('admin/auth/banner*'))
                                }}" href="{{ route('admin.auth.banner.index') }}">
                                            {{ $company->name }} @lang('labels.backend.access.banners.management')

                                            @if ($pending_approval > 0)
                                                <span class="badge badge-danger">{{ $pending_approval }}</span>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach

                            @elseif(auth()->user()->company())
                                <li class="nav-item">
                                    <a class="nav-link {{
                                    active_class(Route::is('admin/auth/banner*'))
                                }}" href="{{ route('admin.auth.banner.index') }}">
                                        {{ auth()->user()->company->name }} @lang('labels.backend.access.banners.management')

                                        @if ($pending_approval > 0)
                                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                                        @endif
                                    </a>
                                </li>

                            @endif


                        </ul>
                    </li>

                    <li class="divider"></li>

                    <li class="nav-item nav-dropdown {{
                    active_class(Route::is('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Route::is('admin/log-viewer*'))
                        }}" href="#">
                            <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                    @lang('menus.backend.log-viewer.dashboard')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{
                            active_class(Route::is('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                    @lang('menus.backend.log-viewer.logs')
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<!--sidebar-->
