//Login page, agree button
$(function () {

  var spinner = $( ".spinner" ).spinner();
  $('#login input.login-error-top').on('focus', function(){
    $(this).removeClass('login-error-top');
  });
  $('#login input.login-error-bottom').on('focus', function(){
    $(this).removeClass('login-error-bottom');
  });

//image resize function.
$('.intro-header') .css({'height': (($(window).height()))+'px'});
$(window).resize(function(){
  $('.intro-header') .css({'height': (($(window).height()))+'px'});
});

// Focus state for append/prepend inputs
$('.input-group').on('focus', '.form-control', function () {
  $(this).closest('.input-group, .form-group').addClass('focus');
}).on('blur', '.form-control', function () {
  $(this).closest('.input-group, .form-group').removeClass('focus');
});

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
$("select").selectpicker({style: 'select-block btn-select', menuStyle: 'dropdown-inverse'});
//datepickers
// var datepickerSelector = '#start, #end, #dob';
// $(datepickerSelector).datepicker({
//   showOtherMonths: true,
//   selectOtherMonths: true,
//   dateFormat: "MM d, yy",
//   yearRange: '-3:+3'
// }).prev('.btn').on('click', function (e) {
//   e && e.preventDefault();
//   $(datepickerSelector).focus();
// });
// $(datepickerSelector).datepicker('widget').css({
//   'margin-left': -$(datepickerSelector).prev('.btn').outerWidth() - 49
// });


//registration
$(document).ready(function() {
  $('#dob').datepicker({
    format: "MM d, yyyy",
  });
  $('#dob-edit').datepicker({
    format: "MM d, yyyy",
  });
  $('#mobile').mask('(000)000-0000');
//Ajax save payment information to vault

$( '.process' ).click(function(e) {
  $('.process').html("");
  $('.process').addClass("disabled");
  $('.process').html("<i class='fa fa-refresh fa-spin'></i> Processing...");
});
$( '.vault' ).click(function(e) {
  e.preventDefault();
  $('.vault').html("");
  $('.vault').html("<i class='fa fa-refresh fa-spin'></i> Validating...");
  var c   = $('input[name=card]').val();
  var m   = $('input[name=month]').val();
  var y   = $('input[name=year]').val();
  var cv  = $('input[name=cvc]').val();
//Billing info
var fn   = $('input[name=fname]').val();
var ln   = $('input[name=lname]').val();
var em   = $('input[name=email]').val();
var mo   = $('input[name=mobile]').val();
var ad   = $('input[name=address]').val();
var ci   = $('input[name=city]').val();
var st   = $('select[name=state]').val();
var zi   = $('input[name=zip]').val();

$.post( "checkout/validate",
{
  "card"      : c,
  "month"     : m,
  "year"      : y,
  "cv"        : cv,
  "fname"     : fn,
  "lname"     : ln,
  "email"     : em,
  "mobile"    : mo,
  "address"   : ad,
  "city"      : ci,
  "state"     : st,
  "zip"       : zi,
}, 
function( data ) {
  if(data.success){
    location.reload();
  }else{
    $('.vault').html("");
    $('.vault').html("Verify Payment");
    $('.ajax-error').html("<div class='alert alert-danger'>"+
      "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
      data.error.responsetext+
      "</div>");
  }
},'json'
);
})

$( '.code' ).click(function(e) {
  e.preventDefault();
  $('.code').html("");
  $('.code').html("<i class='fa fa-refresh fa-spin'></i> Validating...");
  var c   = $('input[name=code]').val();

  $.post( "checkout/discount",
  {
    "code"      : c,
  }, 
  function( data ) {

    if(data.success){
      location.reload();
    }else{
      $('.code').html("");
      $('.code').html("Apply");
      $('.ajax-error').html("<div class='alert alert-danger'>"+
        "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
        data.error+
        "</div>");
    }
  },'json'
  );
})
})
