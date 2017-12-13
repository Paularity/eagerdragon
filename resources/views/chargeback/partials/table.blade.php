<div class="col-md-12">
    <div class="card">
        <div class="card-block">     
            <div class="table-responsive">
            @include('flash.message')
                <table class="table table-hover table-sm">
                    <thead class="thead-default">
                        <tr>
                            <th>{{ trans('app.merchants') }}</th>
                            <th>{{ trans('app.amount') }}</th>
                            <th>{{ trans('app.firstname') }}</th>
                            <th>{{ trans('app.lastname') }}</th>
                            <th>{{ trans('app.status') }}</th>
                            <th>{{ trans('app.dispute_result') }}</th>
                            <th class="text-center">{{ trans('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($chargebacks) == 0)
                        <tr>
                            <td colspan="7"
                                class="no-records-available">
                                {{ trans('app.no_records_available') }}
                            </td>
                        </tr>
                        @else
                        @foreach ($chargebacks as $chargeback)
                            <tr>                                
                                <td>
                                    @foreach ($merchantList as $merch)
                                        @if ($chargeback->merchant_id == $merch->id)
                                            {{ $merch->email }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $chargeback->amount }}</td>
                                <td>{{ $chargeback->firstname }}</td>
                                <td>{{ $chargeback->lastname }}</td>
                                <td>
                                    @foreach ($statusList as $k => $status)
                                        @if ($k == $chargeback->status)
                                            {{ $status }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $chargeback->dispute_result }}</td>
                                <td class="center">
                                    <a href="{{ url(sprintf('chargebacks/%s', $chargeback->id)) }}"  
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="{{ url(sprintf('chargebacks/%s/edit', $chargeback->id))}}"  
                                        class="btn btn-warning-outline btn-sm"
                                        title="{{ trans('app.edit') }}"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url(sprintf('chargebacks/%s', $chargeback->id))}}"  
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="{{ trans('app.delete') }}"
                                        >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $chargebacks->links() }}
        </div>
    </div>
</div>