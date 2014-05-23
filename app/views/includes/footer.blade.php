
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
{{ HTML::script('js/standard.js')}}
{{ HTML::script('js/classie.js')}}
{{ HTML::script('js/cbpAnimatedHeader.js')}}
{{ HTML::script('js/custom.js')}}
{{ HTML::script('js/classie.js')}}
{{ HTML::script('js/stepsForm.js')}}
<script>
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
    </script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
