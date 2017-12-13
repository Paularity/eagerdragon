@extends('layouts.dashboard')

@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle">
            Merchant Fees
        </h3>
    </div>
    <section class="section">
        @include('fee.partials.edit-form')
    </section>
@endsection
