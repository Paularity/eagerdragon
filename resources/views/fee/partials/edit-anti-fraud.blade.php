<div class="card card-block">
    <div class="form-group">
        <h3 class="title">
            Transaction Antifraud Fees (All fees in US$)
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-sm table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th></th>
                        <th>Setup</th>
                        <th>Monthly</th>
                        <th>Transaction</th>
                        <th>Rebill Transaction</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->businessInformation->business_name }}</td>
                        <td>
                            <input type="text"
                                name="antiFraud[merchant][setup]"
                                class="form-control underlined form-control-sm num-input"
                                @if ($antiFraudFee)
                                    value="{{ $antiFraudFee->setup }}"
                                @elseif (isset(old('antiFraud')['merchant']) &&
                                    isset(old('antiFraud')['merchant']['setup'])
                                    )
                                    value="{{ old('antiFraud')['merchant']['setup'] }}"
                                @endif
                            >
                        </td>
                        <td>
                            <input type="text"
                                name="antiFraud[merchant][monthly]"
                                class="form-control underlined form-control-sm num-input"
                                @if ($antiFraudFee)
                                    value="{{ $antiFraudFee->monthly }}"
                                @elseif (isset(old('antiFraud')['merchant']) &&
                                    isset(old('antiFraud')['merchant']['monthly'])
                                    )
                                    value="{{ old('antiFraud')['merchant']['monthly'] }}"
                                @endif
                            >
                        </td>
                        <td>
                            <input type="text"
                                name="antiFraud[merchant][transaction]"
                                class="form-control underlined form-control-sm num-input"
                                @if ($antiFraudFee)
                                    value="{{ $antiFraudFee->transaction }}"
                                @elseif (isset(old('antiFraud')['merchant']) &&
                                    isset(old('antiFraud')['merchant']['transaction'])
                                    )
                                    value="{{ old('antiFraud')['merchant']['transaction'] }}"
                                @endif
                            >
                        </td>
                        <td>
                            <input type="text"
                                name="antiFraud[merchant][rebill_transaction]"
                                class="form-control underlined form-control-sm num-input"
                                @if ($antiFraudFee)
                                    value="{{ $antiFraudFee->rebill_transaction }}"
                                @elseif (isset(old('antiFraud')['merchant']) &&
                                    isset(old('antiFraud')['merchant']['rebill_transaction'])
                                    )
                                    value="{{ old('antiFraud')['merchant']['rebill_transaction'] }}"
                                @endif
                            >
                        </td>
                    </tr>
                    @if ($agent)
                        <tr>
                            <td>{{ $agent->business_name }}</td>
                            <td>
                                <input type="text"
                                    name="antiFraud[agent][setup]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($agentAntiFraudFee)
                                        value="{{ $agentAntiFraudFee->setup }}"
                                    @elseif (isset(old('antiFraud')['agent']) &&
                                        isset(old('antiFraud')['agent']['setup'])
                                        )
                                        value="{{ old('antiFraud')['agent']['setup'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="antiFraud[agent][monthly]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($agentAntiFraudFee)
                                        value="{{ $agentAntiFraudFee->monthly }}"
                                    @elseif (isset(old('antiFraud')['agent']) &&
                                        isset(old('antiFraud')['agent']['monthly'])
                                        )
                                        value="{{ old('antiFraud')['agent']['monthly'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="antiFraud[agent][transaction]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($agentAntiFraudFee)
                                        value="{{ $agentAntiFraudFee->transaction }}"
                                    @elseif (isset(old('antiFraud')['agent']) &&
                                        isset(old('antiFraud')['agent']['transaction'])
                                        )
                                        value="{{ old('antiFraud')['agent']['transaction'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="antiFraud[agent][rebill_transaction]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($agentAntiFraudFee)
                                        value="{{ $agentAntiFraudFee->rebill_transaction }}"
                                    @elseif (isset(old('antiFraud')['agent']) &&
                                        isset(old('antiFraud')['agent']['rebill_transaction'])
                                        )
                                        value="{{ old('antiFraud')['agent']['rebill_transaction'] }}"
                                    @endif
                                >
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>