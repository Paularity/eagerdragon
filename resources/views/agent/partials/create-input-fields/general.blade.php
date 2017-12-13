<div class="card card-block sameheight-item">
	<div class="form-group">
        <h3 class="title"> General Information </h3>
    </div>
    <div class="row">
		<div class="col-md-8">
            <div class="form-group {{$errors->has('business_name') ? 'has-error' : ''}}">
                <label class="control-label">
                    Business Name (DBA or Individual/Sole Proprietor) <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_name"
                    class="form-control"
                    value="{{ old('business_name') }}"
                    required
                >
                @if ($errors->has('business_name'))
                    <span class="has-error">
                        {{ $errors->first('business_name') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('date_formed') ? 'has-error' : ''}}">
                <label class="control-label">
                    Date Formed (If DBA) <span class="required">*</span>
                </label>
                <input type="text"
                    name="date_formed"
                    class="form-control datepicker"
                    value="{{ old('date_formed') }}"
                    required
                >
                @if ($errors->has('date_formed'))
                    <span class="has-error">
                        {{ $errors->first('date_formed') }}
                    </span>
                @endif
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7">
			<div class="form-group {{$errors->has('legal_name') ? 'has-error' : ''}}">
                <label class="control-label">
                    Legal Name (If Different) <span class="required">*</span>
                </label>
                <input type="text"
                    name="legal_name"
                    class="form-control"
                    value="{{ old('legal_name') }}"
                    required
                >
                @if ($errors->has('legal_name'))
                    <span class="has-error">
                        {{ $errors->first('legal_name') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-5">
			<div class="form-group {{$errors->has('website') ? 'has-error' : ''}}">
                <label class="control-label">
                    Website <span class="required">*</span>
                </label>
                <input type="text"
                    name="website"
                    class="form-control"
                    value="{{ old('website') }}"
                    required
                >
                @if ($errors->has('website'))
                    <span class="has-error">
                        {{ $errors->first('website') }}
                    </span>
                @endif
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group {{$errors->has('business_street_address') ? 'has-error' : ''}}">
                <label class="control-label">
                    Business Street Address <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_street_address"
                    class="form-control"
                    value="{{ old('business_street_address') }}"
                    required
                >
                @if ($errors->has('business_street_address'))
                    <span class="has-error">
                        {{ $errors->first('business_street_address') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('business_type') ? 'has-error' : ''}}">
                <label class="control-label">
                    Business Type <span class="required">*</span>
                </label>
                <select name="business_type" class="form-control">
                    @foreach ($businessType as $key => $bs)
                        <option value="{{ $key }}"
                            @if (old('business_type') === $key)
                                selected
                            @endif 
                        >
                            {{ $bs }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('business_type'))
                    <span class="has-error">
                        {{ $errors->first('business_type') }}
                    </span>
                @endif
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group {{$errors->has('city') ? 'has-error' : ''}}">
                <label class="control-label">
                    City <span class="required">*</span>
                </label>
                <input type="text"
                    name="city"
                    class="form-control"
                    value="{{ old('city') }}"
                    required
                >
                @if ($errors->has('city'))
                    <span class="has-error">
                        {{ $errors->first('city') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('us_state') ? 'has-error' : ''}}">
                <label class="control-label">
                    State <span class="required">*</span>
                </label>
				<select name="us_state" class="form-control">
                @foreach ($statesList as $key => $state)
                    <option value="{{ $key }}"
                        @if (old('us_state') === $key)
                            selected 
                        @endif
                    >
                        {{ $state }}
                    </option>
                @endforeach
				</select>
                @if ($errors->has('us_state'))
                    <span class="has-error">
                        {{ $errors->first('us_state') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('zippostal_code') ? 'has-error' : ''}}">
                <label class="control-label">
                    Zip/Postal Code <span class="required">*</span>
                </label>
                <input type="text"
                    name="zippostal_code"
                    class="form-control"
                    value="{{ old('zippostal_code') }}"
                    required
                >
                @if ($errors->has('zippostal_code'))
                    <span class="has-error">
                        {{ $errors->first('zippostal_code') }}
                    </span>
                @endif
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group {{$errors->has('primary_contact') ? 'has-error' : ''}}">
                <label class="control-label">
                    Primary Contact <span class="required">*</span>
                </label>
                <input type="text"
                    name="primary_contact"
                    class="form-control"
                    value="{{ old('primary_contact') }}"
                    required
                >
                @if ($errors->has('primary_contact'))
                    <span class="has-error">
                        {{ $errors->first('primary_contact') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                <label class="control-label">
                    Email (Primary Contact) <span class="required">*</span>
                </label>
                <input type="text"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required
                >
                @if ($errors->has('email'))
                    <span class="has-error">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group {{$errors->has('phone') ? 'has-error' : ''}}">
                <label class="control-label">
                    Phone (Primary Contact) <span class="required">*</span>
                </label>
                <input type="text"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone') }}"
                    required
                >
                @if ($errors->has('phone'))
                    <span class="has-error">
                        {{ $errors->first('phone') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('office_phone') ? 'has-error' : ''}}">
                <label class="control-label">
                    Office Phone <span class="required">*</span>
                </label>
                <input type="text"
                    name="office_phone"
                    class="form-control"
                    value="{{ old('office_phone') }}"
                    required
                >
                @if ($errors->has('office_phone'))
                    <span class="has-error">
                        {{ $errors->first('office_phone') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-4">
			<div class="form-group {{$errors->has('fax') ? 'has-error' : ''}}">
                <label class="control-label">
                    Fax <span class="required">*</span>
                </label>
                <input type="text"
                    name="fax"
                    class="form-control"
                    value="{{ old('fax') }}"
                    required
                >
                @if ($errors->has('fax'))
                    <span class="has-error">
                        {{ $errors->first('fax') }}
                    </span>
                @endif
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group {{$errors->has('number_of_employees') ? 'has-error' : ''}}">
                <label class="control-label">
                    Number of Employees <span class="required">*</span>
                </label>
                <input type="text"
                    name="number_of_employees"
                    class="form-control"
                    value="{{ old('number_of_employees') }}"
                    required
                >
                @if ($errors->has('number_of_employees'))
                    <span class="has-error">
                        {{ $errors->first('number_of_employees') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-3">
			<div class="form-group {{$errors->has('hours_of_operation') ? 'has-error' : ''}}">
                <label class="control-label">
                    Hours of Operation <span class="required">*</span>
                </label>
                <input type="text"
                    name="hours_of_operation"
                    class="form-control"
                    value="{{ old('hours_of_operation') }}"
                    required
                >
                @if ($errors->has('hours_of_operation'))
                    <span class="has-error">
                        {{ $errors->first('hours_of_operation') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-3">
			<div class="form-group {{$errors->has('timezone') ? 'has-error' : ''}}">
                <label class="control-label">
                    Timezone <span class="required">*</span>
                </label>
				<select name="timezone" class="form-control">
					<option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
					<option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
					<option value="-10.0">(GMT -10:00) Hawaii</option>
					<option value="-9.0">(GMT -9:00) Alaska</option>
					<option value="-8.0">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
					<option value="-7.0">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
					<option value="-6.0">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
					<option value="-5.0" selected="">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
					<option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
					<option value="-3.5">(GMT -3:30) Newfoundland</option>
					<option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
					<option value="-2.0">(GMT -2:00) Mid-Atlantic</option>
					<option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
					<option value="0.0">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
					<option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
					<option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option>
					<option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
					<option value="3.5">(GMT +3:30) Tehran</option>
					<option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
					<option value="4.5">(GMT +4:30) Kabul</option>
					<option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
					<option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
					<option value="5.75">(GMT +5:45) Kathmandu</option>
					<option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
					<option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
					<option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
					<option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
					<option value="9.5">(GMT +9:30) Adelaide, Darwin</option>
					<option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
					<option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
					<option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
				</select>
                @if ($errors->has('timezone'))
                    <span class="has-error">
                        {{ $errors->first('timezone') }}
                    </span>
                @endif
            </div>
		</div>
		<div class="col-md-3">
			<div class="form-group {{$errors->has('start_up') ? 'has-error' : ''}}">
                <label class="control-label">
                    Start Up/New Business <span class="required">*</span>
                </label>
                <br>
                <input type="checkbox"
                    name="start_up"
                >
                @if ($errors->has('start_up'))
                    <span class="has-error">
                        {{ $errors->first('start_up') }}
                    </span>
                @endif
            </div>
		</div>
    </div>
    <div class="row">
    	<div class="col-md-4">
    		<div class="form-group {{$errors->has('legal_formation_type') ? 'has-error' : ''}}">
                <label class="control-label">
                    Legal Formation Type <span class="required">*</span>
                </label>
                <input type="text"
                    name="legal_formation_type"
                    class="form-control"
                    value="{{ old('legal_formation_type') }}"
                    required
                >
                @if ($errors->has('legal_formation_type'))
                    <span class="has-error">
                        {{ $errors->first('legal_formation_type') }}
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-4">
    		<div class="form-group {{$errors->has('state_organization') ? 'has-error' : ''}}">
                <label class="control-label">
                    State of Organization <span class="required">*</span>
                </label>
                <input type="text"
                    name="state_organization"
                    class="form-control"
                    value="{{ old('state_organization') }}"
                    required
                >
                @if ($errors->has('state_organization'))
                    <span class="has-error">
                        {{ $errors->first('state_organization') }}
                    </span>
                @endif
            </div>
    	</div>
    	<div class="col-md-4">
    		<div class="form-group {{$errors->has('tax_id') ? 'has-error' : ''}}">
                <label class="control-label">
                    Tax ID (use SSN if individual) <span class="required">*</span>
                </label>
                <input type="text"
                    name="tax_id"
                    class="form-control"
                    value="{{ old('tax_id') }}"
                    required
                >
                @if ($errors->has('tax_id'))
                    <span class="has-error">
                        {{ $errors->first('tax_id') }}
                    </span>
                @endif
            </div>
    	</div>
    </div>
</div>