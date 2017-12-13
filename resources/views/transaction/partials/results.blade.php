<div class="col-md-12">
    <div class="card">
        <div class="card-block">     
            <div class="table-responsive">
            @include('flash.message')
                <table class="table table-hover table-sm">
                    <thead class="thead-default">
                        <tr>
                            <th>ID</th>
                            <th>DATE</th>
                            <th>TYPE</th>
                            <th>STATUS</th>
                            <th>AMOUNT</th>
                            <th>NAME</th>
                            <th>ADDRESS</th>
                            <th>EMAIL</th>
                            <th class="text-center">{{ trans('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>
                                {{ $transaction->id }}
                            </td>
                            <td>
                                {{ date('F j, Y', strtotime($transaction->created_at)) }}
                            </td>
                            <td>
                                {{ $transaction->payment_method }}
                            </td>
                            <td>
                            @if ($transaction->status == 2)
                                Failed
                            @else
                                Completed
                            @endif
                            </td>
                            <td>
                                {{ $transaction->amount }}
                            </td>
                            <td>
                                {{ $transaction->firstname }} 
                                {{ $transaction->lastname }}
                            </td>
                            <td>
                                {{ $transaction->address1 }}
                            </td>
                            <td>
                                {{ $transaction->email }}
                            </td>
                            <td class="center">
                                <a href="{{ url(sprintf('transactions/%s', $transaction->id)) }}"
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
            {{ $transactions->links() }}
        </div>
    </div>
</div>