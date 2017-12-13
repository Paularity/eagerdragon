@can('manage-users')
	<li class="{{ 
    		Request::is('roles') ||
    		Request::is('roles/*') ||
    		Request::is('roles/create') ||
    		Request::is('roles/*/edit') ? 'active open': ''        		
		}}"
	>
		<a href="">				
			<i class="fa fa-shield"></i>
			{{ trans('app.roles') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{ Request::is('roles') ? 'active': ''}}">
				<a href="{{ url('roles') }}">
					<i class="fa fa-list-ol"></i>						
					{{ trans('app.lists') }}
				</a>
			</li>
			<li class="{{ Request::is('roles/create') ? 'active': ''}}">
				<a href="{{ url('roles/create')}}">
					<i class="fa fa-plus"></i>
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan