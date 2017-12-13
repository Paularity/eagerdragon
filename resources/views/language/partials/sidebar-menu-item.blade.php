@can('manage-languages')
	<li class="{{
    		Request::is('language') ||
    		Request::is('language/*') ||
    		Request::is('language/create') ||
    		Request::is('language/*/edit') ? 'active open': ''        		
		}}"
	>
		<a href="">
			<i class="fa fa-flag"></i>
			{{ trans('app.language') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{ Request::is('language') ? 'active' : '' }}">
				<a href="{{ url('language') }}">
					<i class="fa fa-list-ol"></i>
					{{ trans('app.lists') }}
				</a>
			</li>
			<li class="{{ Request::is('language/create') ? 'active' : '' }}">
				<a href="{{ url('language/create') }}">
					<i class="fa fa-plus"></i>
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan