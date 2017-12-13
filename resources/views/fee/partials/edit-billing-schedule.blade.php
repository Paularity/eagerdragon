<div class="card card-block">
    <div class="form-group"><h3 class="title"> Billing Schedule </h3></div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">
                    # of billing period per week
                    </label>
                <select class="form-control underlined form-control-sm"
                    name="billing_per_week" required>
                    @foreach($totalBillingPeriods as $period)
                        <option value="{{$period}}"
                            @if ($billingSchedule &&
                                 $billingSchedule->billing_per_week === $period
                                || old('billing_per_week') === $period)
                                selected
                            @endif
                            >
                            {{ $period }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">
                    Bill period #1 starts on:
                    </label>
                <select class="form-control underlined form-control-sm"
                    name="billing_period_1_starts_on" required>
                    @foreach($days as $day)
                        <option value="{{$day}}"
                            @if ($billingSchedule &&
                                 $billingSchedule->billing_period_1_starts_on === $day
                                || old('billing_period_1_starts_on') === $day)
                                selected
                            @endif
                            >
                            {{ ucfirst($day) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">
                    Bill period #2 starts on:
                </label>
                <select class="form-control underlined form-control-sm"
                    name="billing_period_2_starts_on" required>
                    @foreach($days as $day)
                        <option value="{{$day}}"
                            @if ($billingSchedule &&
                                 $billingSchedule->billing_period_2_starts_on === $day
                                || old('billing_period_2_starts_on') === $day)
                                selected
                            @endif
                            >
                            {{ ucfirst($day) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">
                    Time to settle(weeks)
                    </label>
                <select class="form-control underlined form-control-sm"
                    name="time_to_settle" required>
                    @foreach($timeToSettle as $week)
                        <option value="{{$week}}"
                            @if ($billingSchedule &&
                                $billingSchedule->time_to_settle === $week
                                || old('time_to_settle') === $week)
                                selected
                            @endif
                            >
                            {{ $week }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>