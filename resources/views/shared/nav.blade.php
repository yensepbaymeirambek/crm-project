<div class="nav">
    <div class="logo">
        <p class="logo-text">Activity Monitoring</p>
    </div>
    <div class="nav-menu">
        <a href="{{route('dashboard', app()->getLocale())}}" class="nav-menu-item @if(Route::current()->getName()==='dashboard') active @endif">
            <div class="nav-logo">
                <img src="{{asset('/images/dashboard.svg')}}" class="nav-logo-icon">
            </div>
            <p class="nav-menu-item-text">{{ __('shared.dashboard') }}</p>
        </a>
        @if(Auth::user()->role===\App\Models\User::ROLE_ADMIN)
            <a href="{{route('employees', app()->getLocale())}}" class="nav-menu-item @if(Route::current()->getName()==='employees' || Route::current()->getName()==='employee') active @endif">
                <div class="nav-logo">
                    <img src="{{asset('/images/employees.svg')}}" class="nav-logo-icon">
                </div>
                <p class="nav-menu-item-text">{{ __('shared.employee') }}</p>
            </a>
        @endif
        <a href="{{route('notifications', app()->getLocale())}}" class="nav-menu-item @if(Route::current()->getName()==='notifications') active @endif">
            <div class="nav-logo">
                <img src="{{asset('/images/notifications.svg')}}" class="nav-logo-icon">
            </div>
            <p class="nav-menu-item-text">{{ __('shared.notifications') }}</p>
        </a>
        <a href="{{route('settings', app()->getLocale())}}" class="nav-menu-item @if(Route::current()->getName()==='settings') active @endif">
            <div class="nav-logo">
                    <img src="{{asset('/images/settings.svg')}}" class="nav-logo-icon">
            </div>
            <p class="nav-menu-item-text">{{ __('shared.settings') }}</p>
        </a>
        <a href="{{route('help', app()->getLocale())}}" class="nav-menu-item @if(Route::current()->getName()==='help') active @endif">
            <div class="nav-logo">
                    <img src="{{asset('/images/help.svg')}}" class="nav-logo-icon">
            </div>
            <p class="nav-menu-item-text">{{ __('shared.help') }}</p>
        </a>
        <a href="{{route('exit', app()->getLocale())}}" class="nav-menu-item @if(Route::current()->getName()==='exit') active @endif">
            <div class="nav-logo">
                    <img src="{{asset('/images/logout.svg')}}" class="nav-logo-icon">
            </div>
            <p class="nav-menu-item-text">{{ __('shared.logout') }}</p>
        </a>
    </div>
</div>
