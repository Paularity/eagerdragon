@can('view-dashboard')
	<li class="{{ 
			Request::is('dashboard') ? 'active': '' 
		}}"
	> 	
		<a href="{{ url('/') }}">
			<i class="fa fa-home"></i> {{ trans('app.dashboard') }}
		</a> 
	</li>
@endcan