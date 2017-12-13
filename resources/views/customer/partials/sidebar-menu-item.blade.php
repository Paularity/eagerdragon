@can('manage-customers')
	<li class="{{
			Request::is('customers') ||
			Request::is('customers/*') ||
			Request::is('customers/create') ||
			Request::is('customers/*/edit') ? 'active open': ''        		
		}}"
	>
		<a href="">
			<i class="fa fa-address-card"></i>
			{{ trans('app.customer') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{ Request::is('customers') ? 'active' : '' }}">
				<a href="{{ url('customers') }}">
					<i class="fa fa-list-ol"></i>
					{{ trans('app.lists') }}
				</a>
			</li>
			<li class="{{ Request::is('customers/create') ? 'active' : '' }}">
				<a href="{{ url('customers/create') }}">
					<i class="fa fa-plus"></i>
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan