@can('use-virtual-terminal')	
	<li class="{{ 
    		Request::is('virtual-terminal') ||
    		Request::is('transactions') ||
    		Request::is('transactions/*') ||
    		Request::is('transactions/search') ||
    		Request::is('virtual-terminal/*') ||
    		Request::is('virtual-terminal/create') ||
    		Request::is('virtual-terminal/*/edit') ? 'active open': ''        		
		}}"
	>
		<a href="">
			<i class="fa fa-desktop"></i>
			{{ trans('app.virtual_terminal') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{ Request::is('virtual-terminal') ? 'active': ''}}">
				<a href="{{ url('virtual-terminal') }}">
					<i class="fa fa-dollar"></i>
					{{ trans('app.sales_and_authorization') }}
				</a>
			</li>
			<li class="{{ Request::is('transactions') ? 'active': ''}}">
				<a href="{{ url('transactions')}}">
					<i class="fa fa-search"></i>
					{{ trans('app.search_transactions') }}
				</a>
			</li>
		</ul>
	</li>
@endcan