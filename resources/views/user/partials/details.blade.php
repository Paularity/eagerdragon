<div class="card card-block sameheight-item">
    <form>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Firstname</label>
				<p class="form-control-static underlined">
					{{ $user->firstname }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Lastname</label>
				<p class="form-control-static underlined">
					{{ $user->lastname }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Email</label>
				<p class="form-control-static underlined">
					{{ $user->email }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Username</label>
				<p class="form-control-static underlined">
					{{ $user->username }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Mobile Number</label>
				<p class="form-control-static underlined">
					{{ $user->mobile_number }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Status</label>
				<p class="form-control-static underlined">
					{{ ucwords($user->status) }}
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Role</label>
				<p class="form-control-static underlined">
					@if (count($user->roles) > 0)
                        {{ $user->roles[0]->title }}
                    @else
                        --
                    @endif
				</p>
			</div>
    	</div>
    	<div class="col-md-6">
			<div class="form-group">
				<label class="control-label">Date Created</label>
				<p class="form-control-static underlined">
					{{ $user->created_at->toDayDateTimeString() }}
				</p>
			</div>
    	</div>
    </form>
</div>