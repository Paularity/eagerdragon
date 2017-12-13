<header class="header">
	<div class="header-block header-block-collapse hidden-lg-up">
	    <button class="collapse-btn" id="sidebar-collapse-btn">
	        <i class="fa fa-bars"></i>
	    </button>
	</div>
	<div class="header-block header-block-nav">
    	<ul class="nav-profile">
    		@can('process-chargebacks')
	    		@include('layouts.partials.dashboard-header-chargeback')
	    	@endcan
			@include('layouts.partials.dashboard-header-language')
			@include('layouts.partials.dashboard-header-notifications')
			@include('layouts.partials.dashboard-header-user-profile')
	    </ul>
	</div>
</header>
