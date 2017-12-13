<div id="fist-time-login-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">{{ trans('app.welcome_to') }} EAGERDRAGON</h4>
            </div>
            <div class="modal-body">
                <p>
                    {{ trans('app.first_time_login') }}
                </p>
                <button type="button"
                    data-dismiss="modal" 
                    class="btn btn-success btn-sm">
                    {{ trans('app.sure') }}
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#fist-time-login-modal").modal('show');
    });
</script>
