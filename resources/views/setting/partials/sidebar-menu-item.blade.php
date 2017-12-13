@can('manage-app-settings')
    <li class="{{ Request::is('settings') ||
            Request::is('settings/*') ? 'active': ''
        }}"
    >
        <a href="{{ url('settings') }}">
            <i class="fa fa-gear icon"></i>
            {{ trans('app.app_settings') }}
        </a>
    </li>
@endcan