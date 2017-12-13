<div class="col-md-12">
    <div class="card">
        <div class="card-block">     
            <div class="table-responsive">
                @include('flash.message')
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('app.username') }}</th>
                            <th>{{ trans('app.email') }}</th>
                            <th>{{ trans('app.mobile') }}</th>
                            <th>{{ trans('app.status') }}</th>
                            <th class="text-center">{{ trans('app.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($agents) == 0)
                        <tr>
                            <td colspan="5"
                                class="no-records-available">
                                {{ trans('app.no_records_available') }}
                            </td>
                        </tr>
                        @else
                        @foreach ($agents as $agent)
                            @if ($agent->agentAccount['created_by'] == Auth::id() &&
                                Bouncer::is(Auth::user())->an('agent'))
                            <tr>
                                <td>
                                    {{ $agent->username }}
                                </td>
                                <td>
                                    {{ $agent->email }}
                                </td>
                                <td>
                                    {{ $agent->mobile_number }}
                                </td>
                                <td>{{ $agent->status }}</td>
                                <td class="text-center">
                                    <a href="{{ url(sprintf('agent-accounts/%s', $agent->id)) }}"  
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="{{ url(sprintf('agent-accounts/%s/edit', $agent->id))}}"  
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url(sprintf('agent-accounts/%s', $agent->id))}}"  
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="Delete"
                                        >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    @can('impersonate-user')
                                        <a href="{{ url(sprintf('impersonate/%s', $agent->id)) }}" 
                                            class="btn btn-default-outline btn-sm"
                                            title="Impersonate"
                                            >    
                                            <i class="fa fa-user-secret"></i> 
                                            Login   
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            @endif
                            @if (Bouncer::is(Auth::user())->a('master-admin')))
                            <tr>
                                <td>
                                    {{ $agent->username }}
                                </td>
                                <td>
                                    {{ $agent->email }}
                                </td>
                                <td>
                                    {{ $agent->mobile_number }}
                                </td>
                                <td>{{ $agent->status }}</td>
                                <td class="text-center">
                                    <a href="{{ url(sprintf('agent-accounts/%s', $agent->id)) }}"  
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="{{ url(sprintf('agent-accounts/%s/edit', $agent->id))}}"  
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url(sprintf('agent-accounts/%s', $agent->id))}}"  
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="Delete"
                                        >
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    @can('impersonate-user')
                                        <a href="{{ url(sprintf('impersonate/%s', $agent->id)) }}" 
                                            class="btn btn-default-outline btn-sm"
                                            title="Impersonate"
                                            >    
                                            <i class="fa fa-user-secret"></i> 
                                            Login   
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            {{ $agents->links() }}
        </div>
    </div>
</div>