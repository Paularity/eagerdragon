@can('use-virtual-terminal')
	<li class="{{ 
    		Request::is('transactions') ||
    		Request::is('transactions/*') ||
    		Request::is('transactions/create') ||
    		Request::is('transactions/*/edit') ? 'active open': ''        		
		}}"
	>
		<a href="">				
			<i class="fa fa-dollar"></i>
			{{ trans('app.transactions') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{ Request::is('transactions') ? 'active': ''}}">
				<a href="{{ url('transactions') }}">
					<i class="fa fa-list-ol"></i>						
					{{ trans('app.lists') }}
				</a>
			</li>
			<li class="{{ Request::is('transactions/create') ? 'active': ''}}">
				<a href="{{ url('transactions/create')}}">
					<i class="fa fa-plus"></i>
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan