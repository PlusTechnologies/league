//Navigation effect
var     menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeft = document.getElementById( 'showLeft' ),
        // showLeftPush = document.getElementById( 'showLeftPush' ),
        // showRightPush = document.getElementById( 'showRightPush' ),
        body = document.body;
 

$('.showLeft, #showLeft').click(function(e) {
    e.preventDefault();
    $('body').toggleClass('cbp-spmenu-push-toright' );
    $('#cbp-spmenu-s1').toggleClass('cbp-spmenu-open' );
});

//Flat UI widgets JS *******************//
// Focus state for append/prepend inputs
    $('.input-group').on('focus', '.form-control', function () {
        $(this).closest('.input-group, .form-group').addClass('focus');
    }).on('blur', '.form-control', function () {
        $(this).closest('.input-group, .form-group').removeClass('focus');
    });
//Dropdown menus padding and style
//$("select").selectpicker({style: 'select-block btn-select', menuStyle: 'dropdown-inverse'});
