<div class="card card-block sameheight-item">
    <div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">
                    Merchant Account
                </label>
                <p>
                    {{ $merchant->businessInformation->business_name }}
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{$errors->has('processor_id') ? 'has-error' : ''}}">
                <label class="control-label">
                    Processor <span class="required">*</span>
                </label>
                @if (isset($merchantProcessor))
                    <p>{{ $merchantProcessor->name }} </p>
                @endif
                @if (isset($processors))
                    <select class="form-control" name="processor_id" required>
                        <option hidden> Select Processor </option>
                        @foreach($processors as $key => $processor)
                            <option value="{{$key}}"
                                @if (old('processor') === $key)
                                    selected
                                @endif
                                >
                                {{ $processor }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('processor_id'))
                        <span class="has-error">
                            {{ $errors->first('processor_id') }}
                        </span>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>