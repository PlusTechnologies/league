
<footer>
  <div class="container">
    <div class="row">
      <a class="footer-brand"><div class="logo" style="background-image: url({{ URL::asset('images/league-together-logo.svg'); }})"></div></a>
      <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center">Join Today, It's Free!</h1>
<p class="text-center">League Together is a team management services build in the cloud centered around: clubs, players and parents. Now you can enjoy the game more and we will handle the rest.</p>
</div>
</div>
<div class="row">
<section>
<form id="theForm" class="simform" autocomplete="off">
<div class="simform-inner">
<ol class="questions">
<li>
<span><label for="q1">What's your favorite movie?</label></span>
                <input id="q1" name="q1" type="text"/>
              </li>
              <li>
                <span><label for="q2">Where do you live?</label></span>
                <input id="q2" name="q2" type="text"/>
              </li>
              <li>
                <span><label for="q3">What time do you go to work?</label></span>
                <input id="q3" name="q3" type="text"/>
              </li>
              <li>
                <span><label for="q4">How do you like your veggies?</label></span>
                <input id="q4" name="q4" type="text"/>
              </li>
              <li>
                <span><label for="q5">What book inspires you?</label></span>
                <input id="q5" name="q5" type="text"/>
              </li>
              <li>
                <span><label for="q6">What's your profession?</label></span>
                <input id="q6" name="q6" type="text"/>
              </li>
            </ol><!-- /questions -->
            <button class="submit" type="submit">Send answers</button>
            <div class="controls">
              <button class="previous"></button>
              <button class="next"></button>
              <div class="progress"></div>
              <span class="number">
                <span class="number-current"></span>
                <span class="number-total"></span>
              </span>
              <span class="error-message"></span>
            </div><!-- / controls -->
          </div><!-- /simform-inner -->
          <span class="final-message"></span>
        </form><!-- /simform -->
      </section>
    </div>
    <div class="row">
      <p class="copyright text-muted small">Copyright &copy; LeagueTogether 2014. All Rights Reserved</p>
    </div>
  </div>
</footer>
{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') }}
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
{{ HTML::script('js/standard.js')}}
{{ HTML::script('js/cbpAnimatedHeader.js')}}
{{ HTML::script('js/custom.js')}}
{{ HTML::script('js/classie.js')}}
@if(Route::currentRouteName() == 'home')
{{ HTML::script('js/stepsForm.js')}}
<script>
$(document).ready(function(){
var theForm = document.getElementById('theForm');

new stepsForm(theForm, {
    onSubmit: function(form) {
        // hide form
        classie.addClass(theForm.querySelector('.simform-inner'), 'hide');

        /*
                form.submit()
                or
                AJAX request (maybe show loading indicator while we don't have an answer..)
                */

        // let's just simulate something...
        var messageEl = theForm.querySelector('.final-message');
        messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
        classie.addClass(messageEl, 'show');
    }
});
})

</script>
@endif