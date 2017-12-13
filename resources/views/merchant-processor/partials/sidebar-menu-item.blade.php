@can('manage-processors')
	<li class="{{
    		Request::is('processors') ||
    		Request::is('processors/*') ||
            Request::is('processors/create') ||
    		Request::is('search/processors') ||
    		Request::is('processors/*/edit') ? 'active open': ''
		}}"
	>
		<a href="">
			<i class="fa fa-hourglass-half"></i>
			{{ trans('app.processors') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{
                Request::is('processors') || Request::is('search/processors')
                ? 'active'
                : ''
                }}">
				<a href="{{ url('processors') }}">
					<i class="fa fa-list-ol "></i>
					{{ trans('app.lists') }}
				</a>
			</li>
			<li class="{{ Request::is('processors/create') ? 'active': ''}}">
				<a href="{{ url('processors/create')}}">
					<i class="fa fa-plus"></i>
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan