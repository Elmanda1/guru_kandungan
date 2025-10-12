<aside class="sidebar sidebar-fixed bg-primary" id="sidebar">
    <div class="sidebar-header" style="min-height: 64px">
        <div class="sidebar-brand">
            <a class="sidebar-brand-full d-flex align-items-center text-decoration-none m-0"
               href="{{ url()->current() }}"
               tabindex="-1"
            >
                <img src="{{ asset('assets/images/logo-with-yellow-text.png') }}" height="36" alt="Logo"/>
            </a>

            <div class="sidebar-brand-narrow">
                <img src="{{ asset('assets/images/logo.png') }}" height="20" alt="Logo"/>
            </div>
        </div>

        <button class="btn no-outline px-0 d-lg-none text-white" type="button" data-coreui-dismiss="offcanvas"
                data-coreui-theme="dark"
                aria-label="Close"
                onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()">
            <x-heroicon-o-x-mark height="30" width="30"/>
        </button>
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" tabindex="-1" style="padding: 32px 0;">
        <li class="nav-item">
            <a class="nav-link py-3 @if(request()->is('my-home')) active @endif"
               href="{{ route('my-home') }}"
            >
                <x-heroicon-o-home class="me-2" height="24" width="24"/>
                {{ __('Home') }}
            </a>
        </li>

        @if(auth()->user()->isAdmin())
            <li class="nav-title">Master Data</li>

            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/course/*')) active @endif"
                   href="{{ route('course.index') }}"
                >
                    <x-heroicon-o-computer-desktop class="me-2" height="24" width="24"/>
                    {{ __('Course') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/topic/*')) active @endif"
                   href="{{ route('topic.index') }}"
                >
                    <x-heroicon-o-tag class="me-2" height="24" width="24"/>
                    {{ __('Topic') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/department/*')) active @endif"
                   href="{{ route('department.index') }}"
                >
                    <x-heroicon-o-building-office class="me-2" height="24" width="24"/>
                    {{ __('Department') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/education-level/*')) active @endif"
                   href="{{ route('education-level.index') }}"
                >
                    <x-heroicon-o-academic-cap class="me-2" height="24" width="24"/>
                    {{ __('Education Level') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/lecturer/*')) active @endif"
                   href="{{ route('lecturer.index') }}"
                >
                    <x-heroicon-o-users class="me-2" height="24" width="24"/>
                    {{ __('Lecturer') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/participant/*')) active @endif"
                   href="{{ route('participant.index') }}"
                >
                    <x-heroicon-o-users class="me-2" height="24" width="24"/>
                    {{ __('Participant') }}
                </a>
            </li>
        @endif

        @if(auth()->user()->isParticipant())
            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/my-course/*')) active @endif"
                   href="{{ route('my-course.list') }}"
                >
                    <x-heroicon-o-computer-desktop class="me-2" height="24" width="24"/>
                    {{ __('My Course') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/course-schedule/*')) active @endif"
                   href="{{ route('course-schedule.app-list') }}"
                >
                    <x-heroicon-o-calendar-date-range class="me-2" height="24" width="24"/>
                    {{ __('Course Schedule') }}
                </a>
            </li>
        @endif

        @if(auth()->user()->isLecturer())
            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('course/*')) active @endif"
                   href="{{ route('course.index') }}"
                >
                    <x-heroicon-o-computer-desktop class="me-2" height="24" width="24"/>
                    {{ __('Course') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link py-3 @if(request()->is('app/course-schedule/*')) active @endif"
                   href="{{ route('course-schedule.app-list') }}"
                >
                    <x-heroicon-o-calendar-date-range class="me-2" height="24" width="24"/>
                    {{ __('Course Schedule') }}
                </a>
            </li>
        @endif

        <li class="nav-title">Menu Lainnya</li>

        <li class="nav-item">
            <a class="nav-link py-3 @if(request()->is('user-guide/*')) active @endif"
               href="{{ route('user-guide') }}"
            >
                <x-heroicon-o-information-circle class="me-2" height="24" width="24"/>
                {{ __('User Guide') }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link py-3 @if(request()->is('user-guide/*')) active @endif"
               href="{{ route('home') }}"
            >
                <x-heroicon-o-arrow-left class="me-2" height="24" width="24"/>
                {{ __('To Front Page') }}
            </a>
        </li>
    </ul>
</aside>
