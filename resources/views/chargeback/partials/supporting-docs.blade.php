<div class="card card-block">                    
    <div class="card-title-block">
        <h3 class="title">Supporting Documents</h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                    <th>Document Name</th>
                    <th>Date</th>
                    <th>User</th>
                    <th align="center">Action</th>
                </thead>
                <tbody>
                    @foreach ($chargeback->supportingDocs as $docs)
                    <tr>
                        <td>
                            <a href="{{ asset('files/supporting-docs/'.$chargeback->id.'/'.$docs->filename) }}"
                                target="_blank" 
                            >
                                {{ $docs->filename }}
                            </a>
                        </td>
                        <td>{{ $docs->created_at }}</td>
                        <td>
                            {{ $docs->user['firstname'] }}
                            {{ $docs->user['lastname'] }}
                        </td>
                        <td class="text-center">
                            <a href="{{ url(sprintf('supporting-docs/%s', $docs->id))}}"  
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
        <div class="col-md-6">
            <h3 class="title">Add Supporting Document</h3>
            <form action="{{ url('/supporting-docs') }}" 
                method="POST"
                enctype="multipart/form-data" 
                class="dropzone" 
            >
            {{ csrf_field() }}
                <div class="dropzone-previews"></div>
                <input type="hidden"
                    name="chargeback_id"
                    value="{{ $chargeback->id }}" 
                >
                <div class="box__input">
                    <label for="file">
                        <strong><i class="fa fa-toggle-right"></i> Drop files</strong>
                        <span class="box__dragndrop"> to upload</span>
                        <br>
                        <small>(or click)</small>
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>