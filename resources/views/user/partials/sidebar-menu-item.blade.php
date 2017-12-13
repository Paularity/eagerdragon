@can('manage-users')
	<li class="{{
    		Request::is('users') ||
    		Request::is('users/*') ||
            Request::is('users/create') ||
    		Request::is('search/users') ||
    		Request::is('users/*/edit') ? 'active open': ''
		}}"
	>
		<a href="">
			<i class="fa fa-users"></i>
			{{ trans('app.users') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{
                Request::is('users') || Request::is('search/users')
                ? 'active'
                : ''
                }}">
				<a href="{{ url('users') }}">
					<i class="fa fa-list-ol "></i>
					{{ trans('app.lists') }}
				</a>
			</li>
			<li class="{{ Request::is('users/create') ? 'active': ''}}">
				<a href="{{ url('users/create')}}">
					<i class="fa fa-plus"></i>
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan