<div class="col-md-12">
    <div class="card">
        <div class="card-block">     
            <div class="table-responsive">
            @include('flash.message')
                <table class="table table-hover table-sm">
                    <thead class="thead-default">
                        <tr>
                            <th>CHARBACK</th>
                            <th>TRANSACTION ID</th>
                            <th>MERCHANT</th>
                            <th>CHARGEBACK DATE</th>
                            <th>AMOUNT</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>STATUS</th>
                            <th class="text-center">{{ trans('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($chargebacks as $chargeback)
                        <tr>
                            <td>
                                {{ $chargeback->id }}
                            </td>
                            <td>
                                {{ $chargeback->sale_transaction_id }}
                            </td>
                            <td>
                                {{ $chargeback->merchant['firstname'] }}
                                {{ $chargeback->merchant['lastname'] }}
                            </td>
                            <td>
                                {{ $chargeback->created_at }}
                            </td>
                            <td>
                                {{ $chargeback->amount }}
                            </td>
                            <td>
                                {{ $chargeback->firstname }}
                            </td>
                            <td>
                                {{ $chargeback->lastname }}
                            </td>
                            <td>
                            @if ($chargeback->status == 2)
                                Failed
                            @else
                                Completed
                            @endif
                            </td>
                            <td class="center">
                                <a href="{{ url(sprintf('chargebacks/%s', $chargeback->id)) }}"
                                    target="_blank"  
                                    class="btn btn-success-outline btn-sm"
                                    title="View"
                                    >
                                    <i class="fa fa-folder-open fa-2x"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $chargebacks->links() }}
        </div>
    </div>
</div>