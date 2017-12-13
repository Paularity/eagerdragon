<div class="col-md-12">
    <div class="card">
        <div class="card-block">
        @include('flash.message')
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="thead-default">
                        <tr>
                            <th>Name</th>
                            <th>Business Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($merchants) == 0)
                        <tr>
                            <td colspan="5"
                                class="no-records-available">
                                {{ trans('app.no_records_available') }}
                            </td>
                        </tr>
                        @else
                        @foreach ($merchants as $user)
                            @if ($user->merchantAccount['created_by'] == Auth::id() &&
                                Bouncer::is(Auth::user())->an('agent'))
                            <tr>
                                <td>
                                    {{ $user->firstname }}
                                    {{ $user->lastname }}
                                </td>
                                <td>
                                    {{
                                        $user->businessInformation->business_name
                                            ? : '--'
                                    }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td class="center">
                                    @if ($user->status === 'active')
                                        @can('edit-fees')
                                            <a
                                                href="{{
                                                    url(sprintf('merchant-accounts/%s/fees', $user->merchantAccount->id))
                                                }}"
                                                class="btn btn-info-outline btn-sm"
                                                title="Fees"
                                                >
                                                <i class="fa fa-usd"></i>
                                            </a>
                                        @endcan
                                        @can('manage-processors')
                                            <a href="{{
                                                url(sprintf('merchant-accounts/%s/processors', $user->merchantAccount->id))}}"
                                                class="btn btn-info-outline btn-sm"
                                                title="Processors"
                                                >
                                                <i class="fa fa-calculator"></i>
                                            </a>
                                        @endcan
                                    @endif
                                    <a href="{{ url(sprintf('merchant-accounts/%s', $user->id)) }}"
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url(sprintf('merchant-accounts/%s/edit', $user->id))}}"
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{
                                        url(sprintf('merchant-accounts/%s', $user->id))}}"
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="Delete"
                                        >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @if (Bouncer::is(Auth::user())->a('master-admin'))
                            <tr>
                                <td>
                                    {{ $user->firstname }}
                                    {{ $user->lastname }}
                                </td>
                                <td>
                                    {{
                                        $user->businessInformation->business_name
                                            ? : '--'
                                    }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td class="center">
                                    @if ($user->status === 'active')
                                        @can('edit-fees')
                                            <a href="{{ url(sprintf('merchant-accounts/%s/fees', $user->merchantAccount->id)) }}"
                                                class="btn btn-info-outline btn-sm"
                                                title="Fees"
                                                >
                                                <i class="fa fa-usd"></i>
                                            </a>
                                        @endcan
                                        @can('manage-processors')
                                            <a href="{{
                                                url(sprintf('merchant-accounts/%s/processors', $user->merchantAccount->id))}}"
                                                class="btn btn-info-outline btn-sm"
                                                title="Add Processors"
                                                >
                                                <i class="fa fa-calculator"></i>
                                            </a>
                                        @endcan
                                    @endif
                                    <a href="{{ url(sprintf('merchant-accounts/%s', $user->id)) }}"
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url(sprintf('merchant-accounts/%s/edit', $user->id))}}"
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{
                                        url(sprintf('merchant-accounts/%s', $user->id))}}"
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="Delete"
                                        >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $merchants->appends(request()->except('page'))->links() }}
        </div>
    </div>
</div>