@can('view-reports')
	<li class="{{
	    		Request::is('reports') ||
	    		Request::is('reports/*') ? 'active open': ''
			}}"
		>
		<a href="{{ url('reports') }}">
			<i class="fa fa-bar-chart-o"></i>
			Reports
		</a>
	</li>
@endcan