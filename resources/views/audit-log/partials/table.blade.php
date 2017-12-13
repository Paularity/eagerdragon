<div class="col-md-12">
    <div class="card">
        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead class="thead-default">
                        <tr>
                            <th>Action Done</th>
                            <th>Action Done By</th>
                            <th>URL</th>
                            <th>IP Address</th>
                            <th>Date</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auditLogs as $log)
                            <tr>
                                <td>
                                    {{ ucfirst($log->event) }}
                                    {{ class_basename($log->auditable_type) }}
                                </td>
                                <td>{{ $log->firstname }} {{ $log->lastname }}</td>
                                <td>{{ $log->url }}</td>
                                <td>{{ $log->ip_address }}</td>
                                <td>
                                {{ date_format(date_create($log->created_at), "F j, Y, g:i a") }}
                                </td>
                                <td class="center">
                                    <a href="{{ url(sprintf('audit-logs/%s', $log->audit_id)) }}"
                                        class="btn btn-success-outline btn-sm"
                                        title="View Details"
                                        >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $auditLogs->links() }}
        </div>
    </div>
</div>