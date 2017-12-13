<div class="col-md-12">
    <div class="card">
        <div class="card-block">
            <div class="table-responsive">
                @if(session()->has('success'))
                    <div class="alert alert-success fade in alert-dismissable">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <table class="table table-hover table-sm">
                    <thead class="thead-default">
                        <tr>
                            <th>Processor</th>
                            <th>Date Added</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($processors as $processor)
                            <tr>
                                <td>{{ $processor->name }}</td>
                                <td>{{ $processor->created_at }}</td>
                                <td class="center">
                                    <a href="{{ url(sprintf('merchant-accounts/%s/processors/%s/fees/edit',
                                        $merchantAccount->id,
                                        $processor->id))}}"
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $processors->links() }}
        </div>
    </div>
</div>