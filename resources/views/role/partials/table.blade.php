<div class="col-md-12">
    <div class="card">
        <div class="card-block">              
            <div class="table-responsive">
                @if(session()->has('success'))
                    <div class="alert alert-success fade in alert-dismissable">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    {{ $role->title }}
                                </td>
                                <td class="center">                                    
                                    <a href="{{ url(sprintf('roles/%s/edit', $role->id))}}"  
                                        class="btn btn-warning-outline btn-sm"
                                        title="Edit"
                                        >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url(sprintf('roles/%s', $role->id))}}"  
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
            {{ $roles->links() }}
        </div>
    </div>
</div>