<div class="col-md-12">
    <div class="card">
        <div class="card-block">     
            <div class="table-responsive">
            @include('flash.message')
                <table class="table table-hover table-sm">
                    <thead class="thead-default">
                        <tr>
                            <th>ID</th>
                            <th>{{ trans('app.date') }}</th>
                            <th>{{ trans('app.customer') }}</th>
                            <th>{{ trans('app.billing_address') }}</th>
                            <th>{{ trans('app.shipping_address') }}</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($virtualTerminal) == 0)
                        <tr>
                            <td colspan="6"
                                class="no-records-available">
                                {{ trans('app.no_records_available') }}
                            </td>
                        </tr>
                        @else
                        @foreach ($virtualTerminal as $vt)
                            <tr>                                
                                <td>{{ $vt->id }}</td>
                                <td>
                                    {{ date('F j, Y', strtotime($vt->created_at)) }}
                                </td>
                                <td>
                                    {{ $vt->customer['firstname'] }} 
                                    {{ $vt->customer['lastname'] }}
                                </td>
                                <td>{{ $vt->billing_address }}</td>
                                <td>{{ $vt->shipping_address }}</td>
                                <td class="center">
                                    <a href="{{ url(sprintf('virtual-terminal/%s', $vt->id)) }}"  
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="{{ url(sprintf('virtual-terminal/%s/edit', $vt->id))}}"  
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url(sprintf('virtual-terminal/%s', $vt->id))}}"  
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="Delete"
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
            {{ $virtualTerminal->links() }}
        </div>
    </div>
</div>