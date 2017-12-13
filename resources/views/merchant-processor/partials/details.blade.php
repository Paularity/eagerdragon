    <div class="card card-block sameheight-item">
            <div class="col-md-12">
                    <div class="form-group">
                <h3 class="title"> Merchant Account </h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            Firstname
                        </label>
                        <p>{{ $user->firstname ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            Lastname
                        </label>
                        <p>{{ $user->lastname ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            Email
                        </label>
                        <p>{{ $user->email ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            Username
                        </label>
                        <p>{{ $user->username ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            Mobile Number
                        </label>
                        <p>{{ $user->mobile_number ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            MID
                        </label>
                        <p>{{ $merchantAccount->mid ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">
                            Address
                        </label>
                        <p>{{ $merchantAccount->address ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            City
                        </label>
                        <p>{{ $merchantAccount->city ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            Sate
                        </label>
                        <p>{{ $merchantAccount->state ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            Zip
                        </label>
                        <p>{{ $merchantAccount->zip ?: '--' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">
                            Country
                        </label>
                        <p>{{ $merchantAccount->country ?: '--' }}</p>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
