@can('manage-agents')
	<li class="{{ 
	    		Request::is('agents-csr') ||
	    		Request::is('agents-csr/*') ||
	    		Request::is('agents-csr/create') ||
	    		Request::is('agents-csr/*/edit') ? 'active open': ''        		
			}}"
		>
		<a href="">
			<i class="fa fa-phone"></i>
			{{ trans('app.agents_csr') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{ Request::is('agents-csr') ? 'active': ''}}">
				<a href="{{ url('agents-csr') }}">
					<i class="fa fa-list-ol "></i>
					{{ trans('app.lists') }}
				</a>
			</li>
			<li class="{{ Request::is('agents-csr/create') ? 'active': ''}}">
				<a href="{{ url('agents-csr/create')}}">
					<i class="fa fa-plus"></i>						
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan