<div class="card card-block">
    <div class="form-group">
        <h3 class="title">
            Gateway Fees (All fees in US$)
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->businessInformation->business_name }}</td>
                        <td>
                            <input type="text"
                                name="gateway[merchant][setup]"
                                class="form-control underlined form-control-sm num-input"
                                @if ($gatewayFee)
                                    value="{{ $gatewayFee->setup }}"
                                @elseif (isset(old('gateway')['merchant']) &&
                                    isset(old('gateway')['merchant']['setup'])
                                    )
                                    value="{{ old('gateway')['merchant']['setup'] }}"
                                @endif
                            >
                        </td>
                        <td>
                            <input type="text"
                                name="gateway[merchant][monthly]"
                                class="form-control underlined form-control-sm num-input"
                                @if ($gatewayFee)
                                    value="{{ $gatewayFee->monthly }}"
                                @elseif (isset(old('gateway')['merchant']) &&
                                    isset(old('gateway')['merchant']['monthly'])
                                    )
                                    value="{{ old('gateway')['merchant']['monthly'] }}"
                                @endif
                            >
                        </td>
                        <td>
                            <input type="text"
                                name="gateway[merchant][transaction]"
                                class="form-control underlined form-control-sm num-input"
                                @if ($gatewayFee)
                                    value="{{ $gatewayFee->transaction }}"
                                @elseif (isset(old('gateway')['merchant']) &&
                                    isset(old('gateway')['merchant']['transaction'])
                                    )
                                    value="{{ old('gateway')['merchant']['transaction'] }}"
                                @endif
                            >
                        </td>
                    </tr>
                    @if ($agent)
                        <tr>
                            <td>{{ $agent->business_name }}</td>
                            <td>
                                <input type="text"
                                    name="gateway[agent][setup]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($agentGatewayFee)
                                        value="{{ $agentGatewayFee->setup }}"
                                    @elseif (isset(old('gateway')['agent']) &&
                                        isset(old('gateway')['agent']['setup'])
                                        )
                                        value="{{ old('gateway')['agent']['setup'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="gateway[agent][monthly]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($agentGatewayFee)
                                        value="{{ $agentGatewayFee->monthly }}"
                                    @elseif (isset(old('gateway')['agent']) &&
                                        isset(old('gateway')['agent']['monthly'])
                                        )
                                        value="{{ old('gateway')['agent']['monthly'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="gateway[agent][transaction]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($agentGatewayFee)
                                        value="{{ $agentGatewayFee->transaction }}"
                                    @elseif (isset(old('gateway')['agent']) &&
                                        isset(old('gateway')['agent']['transaction'])
                                        )
                                        value="{{ old('gateway')['agent']['transaction'] }}"
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