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
                            <th>Notification</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userNotifications as $notification)
                            <tr>
                                <td>
                                    {{$notification->data['message']}}
                                </td>
                                <td class="center">
                                    <a href="{{ $notification->data['link'] }}"
                                        class="btn btn-success-outline btn-sm"
                                        title="View"
                                        >
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$userNotifications->links()}}
        </div>
    </div>
</div>
