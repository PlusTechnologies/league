
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
{{ HTML::script('js/jquery-ui-1.10.4.custom.min.js') }}
{{ HTML::script('js/jquery.ui.touch-punch.min.js')}}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/bootstrap-select.js')}}
{{ HTML::script('js/bootstrap-switch.js')}}
{{ HTML::script('js/flatui-checkbox.js')}}
{{ HTML::script('js/flatui-radio.js')}}
{{ HTML::script('js/jquery.tagsinput.js')}}
{{ HTML::script('js/jquery.placeholder.js')}}
{{ HTML::script('js/flatui-fileinput.js')}}
{{ HTML::script('js/jquery.mask.min.js')}}
{{ HTML::script('js/jquery.maskMoney.min.js')}}
{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}
{{ HTML::script('//rawgithub.com/timrwood/moment/2.1.0/min/moment.min.js')}}
{{ HTML::script('//rawgithub.com/gf3/moment-range/master/lib/moment-range.js')}}
{{ HTML::script('//cdn.oesmith.co.uk/morris-0.5.1.min.js')}}
@if(Route::currentRouteName() == "dashboard.club.create" ||
Route::currentRouteName() == "dashboard.club.event.create"
)
{{ HTML::script('js/dashboard/redactor.js')}}
@endif
{{ HTML::script('js/dashboard/application.js')}}

@if($user->first_login == false)
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Welcome</h4>
      </div>
      <div class="modal-body">
        <small>It looks like is the first time you login</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
   	$('#myModal').modal('show')
   })
</script>
@endif
