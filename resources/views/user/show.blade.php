@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <a href="{{ url(sprintf('users/%s/edit', $user->id)) }}" class="btn btn-primary-outline">
            <i class="fa fa-edit"></i>
            Edit
        </a> &nbsp;
        @if (Auth::user()->id != $user->id && $user->status === 'for verification')
            @can('manage-users')
                <form method="POST"
                    action="{{ url(sprintf('users/%s/approve-account', $user->id)) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="status" value="active">
                    <button type="submit" class="btn btn-primary-outline">
                        <i class="fa fa-check-square-o"></i>
                        Approve Account
                    </button>
                </form>
            @endcan
        @endif

    </div>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-md-8">
                @include('user.partials.details')
            </div>
            @can('manage-users')
                <div class="col-md-4">
                    @include('user.partials.user-abilities-table')
                </div>
            @endcan
        </div>
    </section>
@endsection
