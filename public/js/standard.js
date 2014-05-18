//Login page, agree button
$(function () {
    $('.button-checkbox').each(function () {
        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
// Select trigget
$("select").selectpicker({style: 'select-block btn-primary', menuStyle: 'dropdown-menu'});

//registration
$(document).ready(function() {
    $('#mobile').mask('(000) 000-0000');

    // $( '#register' ).on( 'click', function() {
 
    //     //.....
    //     //show some spinner etc to indicate operation in progress
    //     //.....
    //     var me = $('#new_account');
    //     $.post(
    //         me.prop('action'),
    //         {
    //             "_token"        : me.find( 'input[name=_token]' ).val(),
    //             "type"          : me.find( 'input[name=_type]' ).val(),
    //             "firstname"     : $( '#first_name' ).val(),
    //             "lastname"      : $( '#last_name' ).val(),
    //             "sport"         : $( "#sport" ).val(),
    //             "organization"  : $( '#org' ).val(),
    //             "email"         : $( '#email' ).val(),
    //             "password"      : $( '#password' ).val(),
    //             "password_confirmation": $( '#password_confirmation' ).val(),
    //             "agreement"         : $('#t_and_c:checked').val()
    //         },
    //         function(data) {
    //             $('.alert ').removeClass('hidden');
    //             $(".alert").show('slow');
    //             $(".alert").html('');
    //             $.each(data, function(k, v) {
                   
    //                 $('.alert ').append( '<li>'+v+'</li>');
    //             });

    //             setTimeout(function() {
    //                 $(".alert").hide('slow');
    //             }, 4000);

    //             //do something with data/response returned by server
    //         },
    //         'json'
    //     );
 
    //     //.....
    //     //do anything else you might want to do
    //     //.....
 
    //     //prevent the form from actually submitting in browser
    //     return false;
    // } );

})
