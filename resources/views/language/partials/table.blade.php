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
                            <th>{{ trans('app.folder_name') }}</th>
                            <th>{{ trans('app.language_name') }}</th>
                            <th>{{ trans('app.flag') }}</th>
                            <th class="text-center">{{ trans('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $language)
                            <tr>
                                <td>
                                    {{ $language->foldername }}
                                </td>
                                <td>
                                    <strong>{{ $language->languagename }}</strong>
                                </td>
                                <td>
                                    <img width="40" src="{{URL::to('/resources/assets/flags/')}}/{{ $language->flag_name }}"/>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url(sprintf('language/%s/edit', $language->foldername))}}" 
                                        class="btn btn-warning-outline btn-sm"
                                        title="{{ trans('app.edit') }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> 
                                    </a>
                                   @if($language->foldername != 'en')
                                    <a href="{{ url(sprintf('language/%s', $language->id))}}" 
                                        onclick="confirmDelete(event, this)"
                                        class="btn btn-danger-outline btn-sm"
                                        title="{{ trans('app.delete') }}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>