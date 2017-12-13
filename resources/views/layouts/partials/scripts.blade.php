<script src="{{ mix('/js/theme-vendor.js') }}"></script>
<script src="{{ mix('/js/theme-app.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(function() {
		$('.datepicker').datepicker({
			changeMonth: true,
			changeYear: true
		});
	})
</script>