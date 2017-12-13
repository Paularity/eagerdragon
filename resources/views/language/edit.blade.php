@extends('layouts.dashboard')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-block"> 
            <div class="card-title-block">
                <h3 class="title"> Language List </h3>
            </div>           
			@if(session()->has('success'))
			    <div class="alert alert-success fade in alert-dismissable">
			        {{ session()->get('success') }}
			    </div>
			@endif

			<form method="POST" action="{{ url(sprintf('language/%s', $foldername)) }}">
				{{ csrf_field() }}	
                <input name="_method" type="hidden" value="PATCH">
                <input name="id" type="hidden" value="{{ $foldername }}">
				   <table class="table table-striped">
					<thead> 
						<tr> 							
							<th style="width:50%">{{ trans('app.index_name')}} </th>
							<th style="width:50%">{{ trans('app.change_able')}} </th>							
						</tr> 
					</thead>
					<tbody> 
					@foreach($language_data as $key=>$value)
						<tr> 							 
							<td>{{$key}}</td>							
							<td>
								<input type="hidden" name="language_key[]" class="form-control" value="{{$key}}"/>
								<input type="text" name="language_value[]" class="form-control" value="{{$value}}"/>							
							</td> 							
						</tr>
						@endforeach
						<input type="hidden" value="{{$foldername}}" name="foldername"/>
					</tbody>		
				</table>
				<button type="submit" class="btn btn-primary ladda-button" data-plugin="ladda" data-style="expand-left"> 
				<span aria-hidden="true" class="glyphicon glyphicon-refresh"></span> {{ trans('app.language_update')}} </button>
			</form>

		</div>
	</div>
</div>
@endsection
