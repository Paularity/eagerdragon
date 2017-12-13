<div class="card card-block form-inline">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">
                Merchant Account: {{ $user->businessInformation->business_name }}
            </label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group
            {{$errors->has('business_country') ? 'has-error' : ''}}">
            <label class="control-label">
                Processor
            </label>
            <select class="form-control underlined form-control-sm select-merchant-processor"
                name="processor_id">
                <option value="">
                    Select Processor
                </option>
                @foreach ($processors as $processor)
                    <option
                        @if ($processor->id == old('processor_id'))
                            selected
                        @elseif ($processorId == $processor->id)
                            selected
                        @endif
                        value="{{ $processor->id }}"
                    >
                        {{ $processor->name }}
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
    <div class="col-md-3">
        <div class="form-group">
            <a id="edit-merchant-processor"
                data-link="{{url(sprintf('merchant-accounts/%s/processors', $merchantAccount->id))}}"
                href="#"
                class="btn btn-primary">Go</a>
        </div>
    </div>
</div>