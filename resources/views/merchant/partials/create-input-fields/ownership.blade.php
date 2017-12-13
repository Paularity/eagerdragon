<div class="card card-block">
	<div class="form-group">
        <h2 class="title"> Ownership </h2>
        <br/>
        <p class="text-center">*If a Privately Held Entity – Must Meet or Exceed 51% Ownership.  
        *If a Non-Profit, Publicly Traded or Government Entity – Must be Senior Officer.</p>
    </div>
    <div class="row">
    	<div class="col-md-3">
    		<div class="form-group">
    			<label class="control-label">
    				Ownership
    			</label>
    			<br/>
                <label class="radio-inline">
                    <input type="radio"
                    	name="ownership"
                    	value="owner"
                    	checked>
                    	Owner
                </label>
                <label class="radio-inline">
                	<input type="radio"
                		name="ownership"
                		value="partner">
                		Partner
                </label>
            </div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group
                {{$errors->has('officer_name') ? 'has-error' : ''}}">
                <label class="control-label">
                    Officer Name #1 <span class="required">*</span>
                </label>
                <input type="text"
                    name="officer_name"
                    class="form-control"
                    value="{{ old('officer_name') }}"
                    required
                >
                @if ($errors->has('officer_name'))
                    <span class="has-error">
                        {{ $errors->first('officer_name') }}
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group
                {{$errors->has('business_title') ? 'has-error' : ''}}">
                <label class="control-label">
                    Business Title <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_title"
                    class="form-control"
                    value="{{ old('business_title') }}"
                    required
                >
                @if ($errors->has('business_title'))
                    <span class="has-error">
                        {{ $errors->first('business_title') }}
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group
                {{$errors->has('ownership_percentage') ? 'has-error' : ''}}">
                <label class="control-label">
                    Ownership Percentage <span class="required">*</span>
                </label>
                <input type="text"
                    name="ownership_percentage"
                    class="form-control"
                    value="{{ old('ownership_percentage') }}"
                    required
                >
                @if ($errors->has('ownership_percentage'))
                    <span class="has-error">
                        {{ $errors->first('ownership_percentage') }}
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group
                {{$errors->has('date_of_birth') ? 'has-error' : ''}}">
                <label class="control-label">
                    Date of Birth <span class="required">*</span>
                </label>
                <input type="text"
                    name="date_of_birth"
                    class="form-control datepicker"
                    value="{{ old('date_of_birth') }}"
                    required
                >
                @if ($errors->has('date_of_birth'))
                    <span class="has-error">
                        {{ $errors->first('date_of_birth') }}
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
                <label class="control-label">
                    US Citizen
                </label>
                <br/>
                <input type="checkbox"
                    name="us_citizen">
            </div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group
                {{$errors->has('ssn') ? 'has-error' : ''}}">
                <label class="control-label">
                    SSN# <span class="required">*</span>
                </label>
                <input type="text"
                    name="ssn"
                    class="form-control"
                    value="{{ old('ssn') }}"
                    required
                >
                @if ($errors->has('ssn'))
                    <span class="has-error">
                        {{ $errors->first('ssn') }}
                    </span>
                @endif
            </div>
    	</div>    	
    	<div class="col-md-3">
    		<div class="form-group
                {{$errors->has('permanent_resident_address') ? 'has-error' : ''}}">
                <label class="control-label">
                    Permanent Resident Address <span class="required">*</span>
                </label>
                <input type="text"
                    name="permanent_resident_address"
                    class="form-control"
                    value="{{ old('permanent_resident_address') }}"
                    required
                >
                @if ($errors->has('permanent_resident_address'))
                    <span class="has-error">
                        {{ $errors->first('permanent_resident_address') }}
                    </span>
                @endif
            </div>
    	</div>
	</div>
</div>