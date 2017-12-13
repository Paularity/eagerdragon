<div class="card card-block">
	<div class="form-group">
        <h3 class="title"> Business Information </h3>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group
                {{$errors->has('business_name') ? 'has-error' : ''}}">
                <label class="control-label">
                    Name <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_name"
                    class="form-control underlined form-control-sm"
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
            <div class="form-group {{$errors->has('business_legal_name') ? 'has-error' : ''}}">
                <label class="control-label">
                    Legal Name <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_legal_name"
                    class="form-control underlined form-control-sm"
                    value="{{ old('business_legal_name') }}"
                    required
                >
                @if ($errors->has('business_legal_name'))
                    <span class="has-error">
                        {{ $errors->first('business_legal_name') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group
                {{$errors->has('business_type') ? 'has-error' : ''}}">
                <label class="control-label">
                    Type <span class="required">*</span>
                </label>
                <select required class="form-control underlined form-control-sm" name="business_type">
                    <option value="">
                        Select Business Type
                    </option>
                    @foreach ($businessType as $key => $type)
                        <option
                            @if ($key === old('business_type'))
                                selected
                            @endif
                            value="{{ $key }}">
                            {{ $type }}
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
        <div class="col-md-3">
            <div class="form-group
                {{$errors->has('business_website') ? 'has-error' : ''}}">
                <label class="control-label">
                    Website
                </label>
                <input type="text"
                    name="business_website"
                    class="form-control underlined form-control-sm"
                    value="{{ old('business_website') }}"
                    required
                >
                @if ($errors->has('business_website'))
                    <span class="has-error">
                        {{ $errors->first('business_website') }}
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group {{$errors->has('start_date') ? 'has-error' : ''}}">
                <label class="control-label">
                    Start Date <span class="required">*</span>
                </label>
                <input type="text"
                    name="start_date"
                    class="form-control underlined form-control-sm datepicker" data-date-format="mm/dd/yyyy"
                    value="{{ old('start_date') }}"
                    required
                >
                @if ($errors->has('start_date'))
                    <span class="has-error">
                        {{ $errors->first('start_date') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group
                {{$errors->has('estimated_monthly_sales') ? 'has-error' : ''}}">
                <label class="control-label">
                    Estimated Monthly Sales <span class="required">*</span>
                </label>
                <input type="text"
                    name="estimated_monthly_sales"
                    class="form-control underlined form-control-sm"
                    value="{{ old('estimated_monthly_sales') }}"
                    required
                >
                @if ($errors->has('estimated_monthly_sales'))
                    <span class="has-error">
                        {{ $errors->first('estimated_monthly_sales') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group
                {{$errors->has('industry') ? 'has-error' : ''}}">
                <label class="control-label">
                    Industry <span class="required">*</span>
                </label>
                <input type="text"
                    name="industry"
                    class="form-control underlined form-control-sm"
                    value="{{ old('industry') }}"
                    required
                >
                @if ($errors->has('industry'))
                    <span class="has-error">
                        {{ $errors->first('industry') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group
                {{$errors->has('description') ? 'has-error' : ''}}">
            <label class="control-label">
                Description <span class="required">*</span>
            </label>
                <textarea  required
                    class="form-control underlined"
                    name="description"
                    rows="2"
                    cols="50"
                    placeholder="What products or services do you you provide?"
                    @if (old('description'))
                        >{{ old('description') }}</textarea>
                    @else
                        ></textarea>
                    @endif
                @if ($errors->has('description'))
                    <span class="has-error">
                        {{ $errors->first('description') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group {{$errors->has('business_address') ? 'has-error' : ''}}">
                <label class="control-label">
                    Address <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_address"
                    class="form-control underlined form-control-sm"
                    value="{{ old('business_address') }}"
                    required
                >
                @if ($errors->has('business_address'))
                    <span class="has-error">
                        {{ $errors->first('business_address') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group
                {{$errors->has('business_city') ? 'has-error' : ''}}">
                <label class="control-label">
                    City <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_city"
                    class="form-control underlined form-control-sm"
                    value="{{ old('business_city') }}"
                    required
                >
                @if ($errors->has('business_city'))
                    <span class="has-error">
                        {{ $errors->first('business_city') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group {{$errors->has('business_state') ? 'has-error' : ''}}">
                <label class="control-label">
                    State <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_state"
                    class="form-control underlined form-control-sm"
                    value="{{ old('business_state') }}"
                    required
                >
                @if ($errors->has('business_state'))
                    <span class="has-error">
                        {{ $errors->first('business_state') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group
                {{$errors->has('business_zip') ? 'has-error' : ''}}">
                <label class="control-label">
                    Zip <span class="required">*</span>
                </label>
                <input type="text"
                    name="business_zip"
                    class="form-control underlined form-control-sm"
                    value="{{ old('business_zip') }}"
                    required
                >
                @if ($errors->has('business_zip'))
                    <span class="has-error">
                        {{ $errors->first('business_zip') }}
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group
                {{$errors->has('business_country') ? 'has-error' : ''}}">
                <label class="control-label">
                    Country <span class="required">*</span>
                </label>
                <select required class="form-control underlined form-control-sm"
                    name="business_country">
                    <option value="">
                        Select Country
                    </option>
                    @foreach ($countryList as $key => $value)
                        <option
                            @if ($key === old('business_country'))
                                selected
                            @endif
                            value="{{ $key }}">
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('business_country'))
                    <span class="has-error">
                        {{ $errors->first('business_country') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>