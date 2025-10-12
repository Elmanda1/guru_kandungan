<nav class="navbar fixed-top navbar-expand-lg p-lg-0 shadow-bottom bg-warning" style="min-height: 64px">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 d-none d-lg-block py-3" href="{{ url()->current() }}"
           style="margin-right: 120px">
            <img src="{{ asset('assets/images/logo-with-text.png') }}" alt="" height="60">
        </a>

        <button class="btn no-outline px-0 d-lg-none" type="button" data-coreui-toggle="offcanvas"
                data-coreui-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <x-heroicon-o-bars-3 height="30" width="30"/>
        </button>

        @if(auth()->user() && auth()->user()->hasVerifiedEmail())
            <ul class="header-nav d-lg-none">
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 rounded-circle bg-transparent" data-coreui-toggle="dropdown" href="#"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <img class="avatar avatar-md" src="{{ auth()?->user()?->getPhotoUrl() }}" alt="Photo Profile">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0 mt-3">
                        <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top"
                             style="width: 200px;">
                            Akun
                        </div>

                        <div class="px-3 mt-2">
                            <div class="d-flex flex-column">
                                <span class="fw-bold"
                                      style="font-size: 14px;">{{ Str::limit(auth()?->user()?->name, 20, '') }}</span>
                                <span class="small">{{ auth()?->user()?->email }}</span>
                                <span class="small">{{ auth()?->user()?->getRoleNames()->first() ?? ''}}</span>
                            </div>
                        </div>

                        <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                            <div class="fw-semibold">Menu</div>
                        </div>

                        @if(auth()->user()->isRegistrationComplete())
                            @if(auth()->user()->isProfileComplete())
                                <a class="dropdown-item small" href="{{ route('my-home') }}">
                                    <x-heroicon-o-home class="pb-1" height="24" width="24"/>
                                    {{ __('My Home') }}
                                </a>

                                <a class="dropdown-item small" href="{{ route('my-account.profile') }}">
                                    <x-heroicon-o-user class="pb-1" width="24" height="24"/>
                                    {{ __('Profile') }}
                                </a>
                            @else
                                <a class="dropdown-item small" href="{{ route('auth.profile-completion') }}">
                                    <x-heroicon-o-user class="pb-1" width="24" height="24"/>
                                    {{ __('Profile Completion') }}
                                </a>
                            @endif
                        @else
                            <a class="dropdown-item small" href="{{ route('auth.registration-completion') }}">
                                <x-heroicon-o-user class="pb-1" width="24" height="24"/>
                                {{ __('Registration Completion') }}
                            </a>
                        @endif

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">
                            <x-heroicon-o-arrow-left-end-on-rectangle class="pb-1" width="24" height="24"/>
                            {{ __('Logout') }}
                        </a>
                    </div>
                </li>
            </ul>
        @endif

        <div class="offcanvas offcanvas-start border-0" tabindex="-1" id="offcanvasNavbar"
             aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header align-items-center justify-content-between shadow-bottom"
                 style="height: 102px">
                <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                    <img class="d-none d-lg-block" src="{{ asset('assets/images/logo-with-text.png') }}" alt=""
                         height="60">
                    <img class="d-lg-none" src="{{ asset('assets/images/logo-with-yellow-text.png') }}" alt=""
                         height="60">
                </a>
                <button type="button"
                        class="btn no-outline px-0 text-white"
                        data-coreui-dismiss="offcanvas"
                >
                    <x-heroicon-o-x-mark height="30" width="30"/>
                </button>
            </div>
            <div class="offcanvas-body" style="min-height: 92px">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link p-3 {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                            {{ __('Home') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link p-3 {{ request()->is('contact-us') ? 'active' : '' }}"
                           href="{{ route('contact-us') }}">
                            {{ __('Contact Us') }}
                        </a>
                    </li>

                    @if(auth()->user() && auth()->user()->isProfileComplete() && auth()->user()->isRegistrationComplete())
                        <li class="nav-item">
                            <a class="nav-link p-3 {{ request()->is('course-schedule*') ? 'active' : '' }}"
                               href="{{ route('course-schedule.guest-list') }}">
                                {{ __('Course Schedule') }}
                            </a>
                        </li>
                    @endif
                </ul>

                <ul id="login-nav" class="navbar-nav justify-content-end flex-grow-1 mt-5 mt-lg-0">
                    @if(auth()->user() && auth()->user()->hasVerifiedEmail())
                        <li class="nav-item dropdown d-none d-lg-flex align-items-center justify-content-center">
                            <a class="nav-link p-0 bg-transparent" data-coreui-toggle="dropdown" href="#"
                               role="button"
                               aria-haspopup="true"
                               aria-expanded="false">
                                <img class="avatar avatar-md" src="{{ auth()?->user()?->getPhotoUrl() }}"
                                     alt="Photo Profile">
                                @if(auth()?->user()?->name)
                                    <small
                                        class="ms-2 d-none d-lg-inline">{{ Str::limit(auth()?->user()?->name, 20, '') }}</small>
                                @else
                                    <small
                                        class="ms-2 d-none d-lg-inline">{{ Str::limit(auth()?->user()?->email, 20, '') }}</small>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end pt-0 mt-2">
                                <div
                                    class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top"
                                    style="width: 200px;">
                                    Akun
                                </div>

                                <div class="px-3 mt-2">
                                    <div class="d-flex flex-column">
                                <span class="fw-bold"
                                      style="font-size: 14px;">{{ Str::limit(auth()?->user()?->name, 20, '') }}</span>
                                        <span class="small">{{ auth()?->user()?->email }}</span>
                                        <span class="small">{{ auth()?->user()?->getRoleNames()->first() ?? '' }}</span>
                                    </div>
                                </div>

                                <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                                    <div class="fw-semibold">Menu</div>
                                </div>

                                @if(auth()->user()->isRegistrationComplete())
                                    @if(auth()->user()->isProfileComplete())
                                        <a class="dropdown-item small" href="{{ route('my-home') }}">
                                            <x-heroicon-o-home class="pb-1" height="24" width="24"/>
                                            {{ __('My Home') }}
                                        </a>

                                        <a class="dropdown-item small" href="{{ route('my-account.profile') }}">
                                            <x-heroicon-o-user class="pb-1" width="24" height="24"/>
                                            {{ __('Profile') }}
                                        </a>
                                    @else
                                        <a class="dropdown-item small" href="{{ route('auth.profile-completion') }}">
                                            <x-heroicon-o-user class="pb-1" width="24" height="24"/>
                                            {{ __('Profile Completion') }}
                                        </a>
                                    @endif
                                @else
                                    <a class="dropdown-item small" href="{{ route('auth.registration-completion') }}">
                                        <x-heroicon-o-user class="pb-1" width="24" height="24"/>
                                        {{ __('Registration Completion') }}
                                    </a>
                                @endif

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item small" href="{{ route('auth.logout') }}">
                                    <x-heroicon-o-arrow-left-end-on-rectangle class="pb-1" width="24" height="24"/>
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>

                        @if(auth()->user()->isRegistrationComplete())
                            @if(auth()->user()->isProfileComplete())
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link p-3 {{ request()->is('auth/login') ? 'active' : '' }}"
                                       href="{{ route('auth.login') }}">
                                        <x-heroicon-o-home class="me-2" height="24" width="24"/>
                                        {{ __('My Home') }}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link p-3 {{ request()->is('auth/login') ? 'active' : '' }}"
                                       href="{{ route('auth.profile-completion') }}">
                                        <x-heroicon-o-user class="me-2" height="24" width="24"/>
                                        {{ __('Profile Completion') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item d-lg-none">
                                <a class="nav-link p-3 {{ request()->is('auth/login') ? 'active' : '' }}"
                                   href="{{ route('auth.registration-completion') }}">
                                    <x-heroicon-o-user class="me-2" height="24" width="24"/>
                                    {{ __('Registration Completion') }}
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link p-3 {{ request()->is('auth/login') ? 'active' : '' }}"
                               href="{{ route('auth.login') }}">
                                <x-heroicon-m-arrow-right-start-on-rectangle class="me-2" height="24" width="24"/>
                                Login
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
