@can('view-audit-logs')
    <li class="{{ Request::is('audit-logs') ||
            Request::is('audit-logs/*') ? 'active': ''
        }}"
    >
        <a href="{{ url('audit-logs') }}">
            <i class="fa fa-book icon"></i>
            {{ trans('app.audit_logs') }}
        </a>
    </li>
@endcan