@extends('layouts.dashboard')
    
@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> {{ trans('app.chargebacks') }} </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
        @include('flash.success')
            <form role="form" method="POST" action="{{ url('chargebacks/search') }}">
            {{ csrf_field() }}
                @include('chargeback.partials.merchant-processor')
                @include('chargeback.partials.filters')
                <div class="row">
                    <div class="col-md-12">                        
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-search"></i> 
                            Search Transaction
                        </button> 
                    </div>
                </div>
            </form>          
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(function() {
        $('.datepicker').datepicker();

        $('.charge-merchant').change(function() {
            $.post('/transactions/merchant',
                {
                    id: this.value,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                function(data, status) {
                    if (status === 'success') {
                        $('.charge-processor-text').hide();
                        $.each(data, function(key, value) {
                            $('.charge-processor').append(
                                '<option value="'+value.id+'">'
                                +value.name+
                                '</option>'
                            );
                        });
                        $('.charge-processor').removeClass('hidden');
                    }
                });
        });
    })
</script>
@endpush