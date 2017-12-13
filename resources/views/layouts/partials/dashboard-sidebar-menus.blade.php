<nav class="menu">
	<ul class="nav metismenu" id="sidebar-menu">
		@include('dashboard.partials.sidebar-menu-item')

		@include('user.partials.sidebar-menu-item')

		@include('role.partials.sidebar-menu-item')

		@include('report.partials.sidebar-menu-item')

		@include('merchant.partials.sidebar-menu-item')

        @include('processor.partials.sidebar-menu-item')

		@include('customer.partials.sidebar-menu-item')

		@include('agent.partials.sidebar-menu-item')

		@include('agent_csr.partials.sidebar-menu-item')

		@include('chargeback.partials.sidebar-menu-item')

		@include('virtual-terminal.partials.sidebar-menu-item')

        @include('language.partials.sidebar-menu-item')

        @include('audit-log.partials.sidebar-menu-item')

		@include('setting.partials.sidebar-menu-item')
	</ul>
</nav>
