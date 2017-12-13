<div class="col-md-12">
    <div class="card">
        <div class="card-block">     
            <div class="table-responsive">
            @include('flash.message')
                <table class="table table-hover table-sm">
                    <thead class="thead-default">
                        <tr>
                            <th>{{ trans('app.name') }}</th>
                            <th>{{ trans('app.address') }}</th>
                            <th>{{ trans('app.email') }}</th>
                            <th>{{ trans('app.phone') }}</th>
                            <th class="text-center">{{ trans('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($customers) == 0)
                        <tr>
                            <td colspan="6"
                                class="no-records-available">
                                {{ trans('app.no_records_available') }}
                            </td>
                        </tr>
                        @else
                        @foreach ($customers as $customer)
                            <tr>                                
                                <td>
                                    {{ $customer->firstname }}
                                    {{ $customer->lastname }}
                                </td>
                                <td>{{ $customer->address1 }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td class="center">
                                    <a href="{{ url(sprintf('customers/%s', $customer->id)) }}"  
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="{{ url(sprintf('customers/%s/edit', $customer->id))}}"  
                                        class="btn btn-warning-outline btn-sm"
                                        title="{{ trans('app.edit') }}"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url(sprintf('customers/%s', $customer->id))}}"  
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
            {{ $customers->links() }}
        </div>
    </div>
</div>