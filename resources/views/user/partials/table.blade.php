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
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (count($user->roles) > 0)
                                        {{ $user->roles[0]['title'] }}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>{{ $user->status }}</td>
                                <td class="center">
                                    <a href="{{ url(sprintf('users/%s', $user->id)) }}"
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url(sprintf('users/%s/edit', $user->id))}}"
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url(sprintf('users/%s', $user->id))}}"
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="Delete"
                                        >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    @can('impersonate-user')
                                        <a href="{{ url(sprintf('impersonate/%s', $user->id)) }}"
                                            class="btn btn-default-outline btn-sm"
                                            title="Impersonate"
                                            >
                                            <i class="fa fa-user-secret"></i>
                                            Login
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->appends(request()->except('page'))->links() }}
        </div>
    </div>
</div>