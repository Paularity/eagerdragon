<div class="col-md-12">
    <div class="card">
        <div class="card-block">
            <form class="form-inline" action="{{ url('search/users') }}">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text"
                        class="form-control form-control-sm"
                        name="firstname"
                        value="{{
                                isset($oldInputs) && isset($oldInputs['firstname'])
                                ? $oldInputs['firstname']
                                : ''
                            }}"
                        >
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text"
                        class="form-control form-control-sm"
                        name="lastname"
                        value="{{
                                isset($oldInputs) && isset($oldInputs['lastname'])
                                ? $oldInputs['lastname']
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
                    <label for="text">Mobile Number</label>
                    <input type="text"
                        class="form-control form-control-sm"
                        name="mobile_number"
                        value="{{
                                isset($oldInputs) && isset($oldInputs['mobile_number'])
                                ? $oldInputs['mobile_number']
                                : ''
                            }}"
                        >
                </div>
                <div class="form-group">
                    <label class="control-label"> Role </label>
                    <select class="form-control form-control-sm" name="role">
                        <option value=""> Role </option>
                        @foreach($rolesList as $role)
                            <option value="{{$role->name}}"
                                @if ( isset($oldInputs)
                                     && isset($oldInputs['role'])
                                     && $oldInputs['role'] === $role->name )
                                    selected
                                @endif
                                >
                                {{ $role->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label"> Status </label>
                    <select class="form-control form-control-sm" name="status">
                        <option value=""> Status </option>
                        @foreach($userPresetStatus as $status)
                            <option value="{{ $status }}"
                                @if ( isset($oldInputs)
                                     && isset($oldInputs['status'])
                                     && $oldInputs['status'] === $status )
                                    selected
                                @endif
                            >
                                {{ ucwords($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
</div>