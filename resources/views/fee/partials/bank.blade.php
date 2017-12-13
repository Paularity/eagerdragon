<div class="card card-block">
    <div class="form-group">
        <h3 class="title">
            Bank Fees (All fees in US$)
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-bordered">
                    <thead class="thead-default">
                        <tr>
                            <th></th>
                            <th>Transaction</th>
                            <th>Authorization</th>
                            <th>Capture</th>
                            <th>Sale</th>
                            <th>Decline</th>
                            <th>Refund</th>
                            <th>Chargeback 1</th>
                            <th>Chargeback 2</th>
                            <th>Chargeback Threshold</th>
                            <th>Discount Rate(%)</th>
                            <th>AVS Premium</th>
                            <th>CVV Premium</th>
                            <th>Interregional Premium</th>
                            <th>Wire</th>
                            <th>Reserve Rate(%)</th>
                            <th>Reserve Period(months)</th>
                            <th>Initial Reserve</th>
                            <th>Setup</th>
                            <th>Monthly</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->businessInformation->business_name }}</td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][transaction]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->transaction }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['transaction'])
                                        )
                                        value="{{ old('bank')['merchant']['transaction'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][authorization]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->authorization }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['authorization'])
                                        )
                                        value="{{ old('bank')['merchant']['authorization'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][capture]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->capture }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['capture'])
                                        )
                                        value="{{ old('bank')['merchant']['capture'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][sale]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->sale }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['sale'])
                                        )
                                        value="{{ old('bank')['merchant']['sale'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][decline]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->decline }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['decline'])
                                        )
                                        value="{{ old('bank')['merchant']['decline'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][refund]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->refund }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['refund'])
                                        )
                                        value="{{ old('bank')['merchant']['refund'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][chargeback1]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->chargeback1 }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['chargeback1'])
                                        )
                                        value="{{ old('bank')['merchant']['chargeback1'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][chargeback2]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->chargeback2 }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['chargeback2'])
                                        )
                                        value="{{ old('bank')['merchant']['chargeback2'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][chargeback_threshold]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->chargeback_threshold }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['chargeback_threshold'])
                                        )
                                        value="{{ old('bank')['merchant']['chargeback_threshold'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][discount_rate]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->discount_rate }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['discount_rate'])
                                        )
                                        value="{{ old('bank')['merchant']['discount_rate'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][avs_premium]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->discount_rate }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['avs_premium'])
                                        )
                                        value="{{ old('bank')['merchant']['avs_premium'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][cvv_premium]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->cvv_premium }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['cvv_premium'])
                                        )
                                        value="{{ old('bank')['merchant']['cvv_premium'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][interregional_premium]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->interregional_premium }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['interregional_premium'])
                                        )
                                        value="{{ old('bank')['merchant']['interregional_premium'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][wire]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->wire }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['wire'])
                                        )
                                        value="{{ old('bank')['merchant']['wire'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][reserve_rate]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->reserve_rate }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['reserve_rate'])
                                        )
                                        value="{{ old('bank')['merchant']['reserve_rate'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <select class="form-control underlined form-control-sm"
                                    name="bank[merchant][reserve_period]">
                                    @foreach($reservePeriod as $month)
                                        <option value="{{$month}}"
                                            @if ($bankFee && $bankFee->reserve_period == $month)
                                                selected
                                            @elseif (isset(old('bank')['merchant'])
                                                && isset(old('bank')['merchant']['reserve_period'])
                                                && old('bank')['merchant']['reserve_period'] == $month)
                                                selected
                                            @endif
                                        >
                                            {{ $month }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][initial_reserve]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->initial_reserve }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['initial_reserve'])
                                        )
                                        value="{{ old('bank')['merchant']['initial_reserve'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][setup]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->setup }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['setup'])
                                        )
                                        value="{{ old('bank')['merchant']['setup'] }}"
                                    @endif
                                >
                            </td>
                            <td>
                                <input type="text"
                                    name="bank[merchant][monthly]"
                                    class="form-control underlined form-control-sm num-input"
                                    @if ($bankFee)
                                        value="{{ $bankFee->monthly }}"
                                    @elseif (isset(old('bank')['merchant']) &&
                                        isset(old('bank')['merchant']['monthly'])
                                        )
                                        value="{{ old('bank')['merchant']['monthly'] }}"
                                    @endif
                                >
                            </td>
                        </tr>
                        @if ($agent)
                            <tr>
                                <td>{{ $agent->business_name }}</td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][transaction]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->transaction }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['transaction'])
                                            )
                                            value="{{ old('bank')['agent']['transaction'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][authorization]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->authorization }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['authorization'])
                                            )
                                            value="{{ old('bank')['agent']['authorization'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][capture]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->capture }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['capture'])
                                            )
                                            value="{{ old('bank')['agent']['capture'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][sale]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->sale }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['sale'])
                                            )
                                            value="{{ old('bank')['agent']['sale'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][decline]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->decline }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['decline'])
                                            )
                                            value="{{ old('bank')['agent']['decline'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][refund]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->refund }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['refund'])
                                            )
                                            value="{{ old('bank')['agent']['refund'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][chargeback1]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->chargeback1 }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['chargeback1'])
                                            )
                                            value="{{ old('bank')['agent']['chargeback1'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][chargeback2]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->chargeback2 }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['chargeback2'])
                                            )
                                            value="{{ old('bank')['agent']['chargeback2'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][chargeback_threshold]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->chargeback_threshold }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['chargeback_threshold'])
                                            )
                                            value="{{ old('bank')['agent']['chargeback_threshold'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][discount_rate]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->discount_rate }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['discount_rate'])
                                            )
                                            value="{{ old('bank')['agent']['discount_rate'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][avs_premium]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->discount_rate }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['avs_premium'])
                                            )
                                            value="{{ old('bank')['agent']['avs_premium'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][cvv_premium]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->cvv_premium }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['cvv_premium'])
                                            )
                                            value="{{ old('bank')['agent']['cvv_premium'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][interregional_premium]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->interregional_premium }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['interregional_premium'])
                                            )
                                            value="{{ old('bank')['agent']['interregional_premium'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][wire]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->wire }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['wire'])
                                            )
                                            value="{{ old('bank')['agent']['wire'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][reserve_rate]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->reserve_rate }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['reserve_rate'])
                                            )
                                            value="{{ old('bank')['agent']['reserve_rate'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <select class="form-control underlined form-control-sm num-input"
                                        name="bank[agent][reserve_period]">
                                        @foreach($reservePeriod as $month)
                                            <option value="{{$month}}"
                                                @if ($agentBankFee && $agentBankFee->reserve_period == $month)
                                                    selected
                                                @elseif (isset(old('bank')['agent'])
                                                    && isset(old('bank')['agent']['reserve_period'])
                                                    && old('bank')['agent']['reserve_period'] == $month)
                                                    selected
                                                @endif
                                            >
                                                {{ $month }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][initial_reserve]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->initial_reserve }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['initial_reserve'])
                                            )
                                            value="{{ old('bank')['agent']['initial_reserve'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][setup]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->setup }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['setup'])
                                            )
                                            value="{{ old('bank')['agent']['setup'] }}"
                                        @endif
                                    >
                                </td>
                                <td>
                                    <input type="text"
                                        name="bank[agent][monthly]"
                                        class="form-control underlined form-control-sm num-input"
                                        @if ($agentBankFee)
                                            value="{{ $agentBankFee->monthly }}"
                                        @elseif (isset(old('bank')['agent']) &&
                                            isset(old('bank')['agent']['monthly'])
                                            )
                                            value="{{ old('bank')['agent']['monthly'] }}"
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
</div>