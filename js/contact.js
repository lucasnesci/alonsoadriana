$(document).ready(function() {
  $("#contact-form input, textarea").blur(checkFields);
  //$("#contact-form input, textarea").keyup(checkFields);
  $("#contact-form").submit(function(event) {
    var empty = false;
    // Prevent spam
    if( $('#contact-box').val() ) {
      return empty;
    } else {
      // Select all inputs minus spam
      $("#contact-form input, textarea").not('#contact-box').each(function(){
        var obj = {};
        obj.target = this;
        empty = checkFields(obj);
      });
      return !empty;
    }
  });
});

function checkFields(obj) {
  var obj = obj.target;
  var parent = $(obj).parent();
  var span = parent.children('span');
  parent.addClass("has-feedback");
  span.removeClass('hide');
  if(!obj.value) {
    parent.removeClass("has-success").addClass("has-error");
    span.removeClass("glyphicon-ok glyphicon-warning-sign").addClass("glyphicon-remove");
    empty = true;
  } else {
    parent.removeClass("has-error").addClass("has-success");
    span.removeClass("glyphicon-remove glyphicon-warning-sign").addClass("glyphicon-ok");
    empty = false;
    if ($(obj).is("input[type='email']")) {
      if(!isValidEmailAddress($(obj).val())) {
        parent.removeClass("has-success").addClass("has-warning ");
        span.removeClass("glyphicon-ok").addClass("glyphicon-warning-sign");
        empty = true;
      } else {
        parent.removeClass("has-warning").addClass("has-success");
        span.removeClass("glyphicon-warning-sign").addClass("glyphicon-ok");
        empty = false;
      }
    }
  }
  return empty;
};

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
