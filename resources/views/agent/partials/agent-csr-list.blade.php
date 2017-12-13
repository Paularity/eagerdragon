<table class="table table-hover">
    <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>email</th>
            <th>mobile</th>
            <th>address</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (count($user->agentAccount->agentCSRs) == 0)
        <tr>
            <td colspan="6"
                class="no-records-available">
                {{ trans('app.no_records_available') }}
            </td>
        </tr>
        @else
        @foreach ($user->agentAccount->agentCSRs as $csr)
            <tr>
                <td>{{ $csr->firstname }}</td>
                <td>{{ $csr->lastname }}</td>
                <td>{{ $csr->email }}</td>
                <td>{{ $csr->mobile }}</td>
                <td>{{ $csr->address }}</td>
                <td class="text-center">
                    <a href="{{ url(sprintf('agents-csr/%s', $csr->id)) }}"
                        class="btn btn-success-outline btn-sm"
                        title="View"
                        >
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ url(sprintf('agents-csr/%s/edit', $csr->id))}}"
                        class="btn btn-warning-outline btn-sm"
                        title="Edit"
                        >
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ url(sprintf('agents-csr/%s', $csr->id))}}"
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