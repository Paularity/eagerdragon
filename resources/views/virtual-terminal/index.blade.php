@extends('layouts.dashboard')
    
@section('content')
    <div class="subtitle-block">
        <h3 class="subtitle"> {{ trans('app.sales_and_authorization') }} </h3>
    </div>
    <section class="section">
        <div class="row sameheight-container">
        @include('flash.success')
            <form role="form" method="POST" 
                action="{{ url('transactions') }}"
                enctype="multipart/form-data">
            {{ csrf_field() }}
                @include('virtual-terminal.partials.create.merchant-processor')
                @include('virtual-terminal.partials.create.form-credit-card-info')
                @include('virtual-terminal.partials.create.form-order-info')
                @include('virtual-terminal.partials.create.form-customer-info')
                @include('virtual-terminal.partials.create.form-shipping-info')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                ENV <span class="required">*</span>
                            </label>
                            <select name="environment" class="form-control">
                            @foreach ($envList as $env)
                                <option value="{{ $env }}">
                                    {{ ucfirst($env) }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                        
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ trans('app.submit') }}
                        </button> 
                    </div>
                </div>
            </form>          
        </div>
    </section>
@include('modals.new-customer')
@endsection

@push('scripts')
<script>
	$(function() {
		$(".payment_method").change(function(){
			if (this.value === 'refund') {
				$('.original_transaction_id').show();
				$('.transaction_type').hide();
				$('.authorization_code').hide();
			} else {
				$('.transaction_type').show();
				$('.original_transaction_id').hide();
			}
		});

		$('.transaction_type_radio').change(function() {
			if (this.value == 'capture') {
				$('.authorization_code').show();
			} else {
				$('.authorization_code').hide();
			}
		});

        $('.vt-merchant').change(function() {
            $('.vt-processor-none').hide();

            $.post('/virtual-terminal/merchant',
                {
                    id: this.value,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                function( data, status ) {
                    if (status === 'success') {
                        $.each(data, function(key, value) {
                            $('.vt-processor').append(
                                '<option value="'+value.id+'">'
                                +value.name+
                                '</option>'
                            );
                        });
                    $('.vt-processor').removeClass('hidden');
                    }
                });
        });
	});
</script>
@endpush