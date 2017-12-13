<div class="card card-block sameheight-item">                             
    @if(session()->has('message') || session()->has('success'))
        <div class="alert alert-success fade in alert-dismissable">
            {{ session()->get('message') }}
            {{ session()->get('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-title-block">
        <a href="" class="btn btn-primary" 
            data-toggle="modal" data-target="#newSettings">
            {{ trans('app.add_new_settings') }}
        </a>

        <a href="" class="btn btn-success" 
            data-toggle="modal" data-target="#changeLogo">
            {{ trans('app.change_logo') }}
        </a>
    </div>

    <div class="row">
        <div class="col-md-12">
             <table class="table table-hover table-sm">
                 <thead>
                        <tr>                            
                            <th>{{ trans('app.meta_key')}} </th>
                            <th>{{ trans('app.meta_value')}} </th>
                            <th class="text-center">{{ trans('app.actions') }}</th>
                        </tr>
                 </thead>
                 <tbody>
                 @if (isset($settings))
                     @foreach ($settings as $setting)
                        <tr>
                            <td>{{ $setting->meta_key }}</td>
                            <td>{{ $setting->meta_value }}</td>
                            <td class="text-center">
                                <a href="{{ url(sprintf('settings/%s/edit', $setting->id))}}"  
                                    class="btn btn-warning-outline btn-sm"
                                    title="Edit"
                                    >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ url(sprintf('settings/%s', $setting->id))}}"  
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
             {{ $settings->links() }}
        </div>
    </div>