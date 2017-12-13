<div class="col-md-12">
    <div class="card">
        <div class="card-block">
            <form class="form-inline" action="{{ url('search/users') }}">
                <div class="form-group">
                    <label for="firstname">Name</label>
                    <input type="text"
                        class="form-control form-control-sm"
                        name="firstname"
                        value="{{
                                isset($oldInputs) && isset($oldInputs['name'])
                                ? $oldInputs['name']
                                : ''
                            }}"
                        >
                </div>
                <div class="form-group">
                    <label for="lastname">Short Name</label>
                    <input type="text"
                        class="form-control form-control-sm"
                        name="lastname"
                        value="{{
                                isset($oldInputs) &&
                                isset($oldInputs['short_name'])
                                ? $oldInputs['short_name']
                                : ''
                            }}"
                        >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email"
                        class="form-control form-control-sm"
                        name="email"
                        value="{{
                                isset($oldInputs) && isset($oldInputs['email'])
                                ? $oldInputs['email']
                                : ''
                            }}"
                        >
                </div>
                <div class="form-group">
                    <label for="text">Wire Fee</label>
                    <input type="text"
                        class="form-control form-control-sm"
                        name="mobile_number"
                        value="{{
                                isset($oldInputs) &&
                                isset($oldInputs['wire_fee'])
                                ? $oldInputs['wire_fee']
                                : ''
                            }}"
                        >
                </div>
                <div class="form-group">
                    <label class="control-label"> Timezone </label>
                    <select class="form-control form-control-sm" name="timezone">
                        <option value=""> Select </option>
                        @foreach($timezones as $key => $timezone)
                            <option value="{{$key}}"
                                @if ( isset($oldInputs)
                                     && isset($oldInputs['timezone'])
                                     && $oldInputs['timezone'] === $key )
                                    selected
                                @endif
                                >
                                {{ $timezone }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label"> Processor Type </label>
                    <select class="form-control form-control-sm" name="type">
                        <option value=""> Select </option>
                        @foreach($processorTypes as $key => $type)
                            <option value="{{$key}}"
                                @if ( isset($oldInputs)
                                     && isset($oldInputs['type'])
                                     && $oldInputs['type'] === $key )
                                    selected
                                @endif
                                >
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</div>