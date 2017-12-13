@can('manage-merchants')
	<li class="{{
            Request::is('merchant-accounts') ||
    		Request::is('search/merchants') ||
    		Request::is('merchant-accounts/*') ||
    		Request::is('merchant-accounts/*/edit') ? 'active open': ''
		}}"
	>
		<a href="">
			<i class="fa fa-shopping-cart"></i>
			{{ trans('app.merchants') }}
			<i class="fa arrow"></i>
		</a>
		<ul class="collapse">
			<li class="{{
                Request::is('merchant-accounts') ||
                Request::is('search/merchants')
                ? 'active'
                : ''}}
            ">
				<a href="{{ url('merchant-accounts') }}">
					<i class="fa fa-list-ol "></i>
					{{ trans('app.lists') }}
				</a>
			</li>
			</li>
			<li class="{{ Request::is('merchant-accounts/create') ? 'active': ''}}">
				<a href="{{ url('merchant-accounts/create')}}">
					<i class="fa fa-plus"></i>
					{{ trans('app.add_new') }}
				</a>
			</li>
		</ul>
	</li>
@endcan