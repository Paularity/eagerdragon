<li class="profile dropdown">
    <a class="nav-link dropdown-toggle"
        data-toggle="dropdown"
        href="#" role="button"
        aria-haspopup="true"
        aria-expanded="false">
        @if (Auth::user()->avatar_link)
            <div class="img"
                style="background-image: url('/img/{{Auth::user()->avatar_link}}')">
            </div>
        @else
            <div class="img"
                style="background-image: url('/img/default-avatar.png')">
            </div>
        @endif
        <span class="name">
            {{ Auth::user()->email }}
        </span>
    </a>
    <div class="dropdown-menu profile-dropdown-menu"
        aria-labelledby="dropdownMenu1">
        <a class="dropdown-item"
            href="{{ url('users/profile') }}">
            <i class="fa fa-user-circle-o icon"></i>
            {{ trans('app.profile') }}
        </a>
        <div class="dropdown-divider"></div>
        @impersonating
            <a class="dropdown-item" href="{{ url('leaveImpersonation')}}">
                <i class="fa fa-power-off icon"></i>
                {{ trans('app.leave_impersonation') }}
            </a>
        @else
            <a class="dropdown-item" href="{{ url('logout')}}">
                <i class="fa fa-power-off icon"></i>
                {{ trans('app.logout') }}
            </a>
        @endImpersonating
    </div>
</li>
