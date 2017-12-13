@extends('layouts.dashboard')

@section('content')
	<div class="section">
		<div class="row sameheight-container">			
			<div class="col-md-12">
                @if (Bouncer::is(Auth::user())->a('merchant'))
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> {{ trans('app.chargebacks') }} </h3>
                        </div>
                        <section class="example">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart"></div>
                            </div>
                        </section>
                    </div>
                </div>
                @endif
                @if (Bouncer::is(Auth::user())->a('master-admin') ||
                    Bouncer::is(Auth::user())->an('agent'))
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Accounts </h3>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <th>Agent/Merchant Name</th>
                                <th>Customer Service Email</th>
                                <th>Customer Service Phone</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $acc)
                                <tr>
                                    <td>
                                        @if (Auth::user()->can('impersonate-user'))
                                            <a href="{{ url(sprintf('impersonate/%s', $acc->id)) }}" 
                                                class="btn btn-default-outline btn-sm"
                                                title="Impersonate"
                                                >    
                                                <i class="fa fa-user-secret"></i> 
                                                {{ $acc->firstname }}
                                                {{ $acc->lastname }}
                                            </a>
                                        @else
                                            {{ $acc->firstname }}
                                            {{ $acc->lastname }}
                                        @endif

                                    </td>
                                    <td>
                                        {{ $acc->email }}
                                    </td>
                                    <td>
                                        {{ $acc->mobile_number }}
                                    </td>
                                    <td>
                                        {{ $acc->status }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $accounts->links() }}
                    </div>
                </div>
                @endif
            </div>
		</div>
	</div>
@endsection
