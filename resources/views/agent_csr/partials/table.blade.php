<div class="col-md-12">
    <div class="card">
        <div class="card-block">    
            <div class="table-responsive">
                @if(session()->has('message'))
                    <div class="alert alert-success fade in alert-dismissable">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agents_csr as $csr)
                            <tr>
                                <td>
                                    {{ $csr->firstname }} {{ $csr->lastname }}
                                </td>
                                <td>
                                    {{ $csr->email }}
                                </td>
                                <td>
                                    {{ $csr->address }}
                                </td>
                                <td>
                                    {{ $csr->mobile }}
                                </td>
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
                    </tbody>
                </table>
            </div>
            {{ $agents_csr->links() }}
        </div>
    </div>
</div>