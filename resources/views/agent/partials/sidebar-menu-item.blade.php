@can('manage-agents')
	<li class="{{ 
    		Request::is('agent-accounts') ||
    		Request::is('agent-accounts/*') ||
    		Request::is('agent-accounts/create') ||
    		Request::is('agent-accounts/*/edit') ? 'active open': ''        		
		}}"
	>
	@if (Bouncer::is(Auth::user())->an('agent'))
		<a href="">
			<i class="fa fa-address-book"></i>
			Sub Agents
			<i class="fa arrow"></i>
		</a>
	@else
		<a href="">
			<i class="fa fa-address-book"></i>
			{{ trans('app.agents') }}
			<i class="fa arrow"></i>
		</a>
	@endif
		<ul class="collapse">
			<li class="{{ Request::is('agent-accounts') ? 'active': ''}}">
				<a href="{{ url('agent-accounts') }}">
					<i class="fa fa-list-ol "></i>
					{{ trans('app.lists') }}
				</a>
			</li>
			<li class="{{ Request::is('agent-accounts/create') ? 'active': ''}}">
				<a href="{{ url('agent-accounts/create')}}">
					<i class="fa fa-plus"></i>						
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan