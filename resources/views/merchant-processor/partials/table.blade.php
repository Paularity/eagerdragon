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
                            <th>Name</th>
                            <th>Short Name</th>
                            <th>Email</th>
                            <th>Wire Fee</th>
                            <th>Timezone</th>
                            <th>Type</th>
                            <th>Is Integrated</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($processors as $processor)
                            <tr>
                                <td>{{ $processor->name }}</td>
                                <td>{{ $processor->short_name }}</td>
                                <td>{{ $processor->wire_fee }}</td>
                                <td>{{ $processor->email }}</td>
                                <td>{{ $processor->timezone }}</td>
                                <td>{{ $processor->type }}</td>
                                <td>{{ $processor->is_integrated ? 'Yes' : 'No' }}</td>
                                <td class="center">
                                    <a href="{{ url(sprintf('merchant-accounts/%s/processors/%s/edit',
                                        $merchantAccount->id,
                                        $processor->id))}}"
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url(sprintf('merchant-accounts/%s/processors/%s',
                                        $merchantAccount->id,
                                        $processor->id))}}"
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="Delete"
                                        >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>