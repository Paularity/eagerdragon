@can('process-chargebacks')
	<li class="{{
			Request::is('chargebacks') ||
			Request::is('chargebacks/*') ||
			Request::is('chargebacks/search') ||
			Request::is('chargebacks/create') ||
			Request::is('chargebacks/*/edit') ? 'active open': ''        		
		}}"
	>
		<a href="">
			<i class="fa fa-bank"></i>
			{{ trans('app.chargebacks') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{ Request::is('chargebacks') ? 'active' : '' }}">
				<a href="{{ url('chargebacks') }}">
					<i class="fa fa-search"></i>
					Search Chargebacks
				</a>
			</li>
		</ul>
	</li>
@endcan