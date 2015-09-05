var app = Sammy('body', function () {
  //Use this for Google Analytics
  this.use(Sammy.GoogleAnalytics);
  /*
  **"#:view" means that sammy takes whatever is after the hash tag
  **and applies it to the value of "this.params.view"
  */
  this.get('#/', function () {
    $('#bs-example-navbar-collapse-1').removeClass('in');
    $('#bs-example-navbar-collapse-1 ul li').removeClass('active open');
    $('li.nav-home').addClass('active');
    $('.alert').hide();

    //Set currentView on your view model
    var content = $.get('home.php', function(data) {
      $('#content').html(data);
    })
      .done(function() {
        //$('#loading').addClass('hide');
      });
  });

  this.get('#/biografia', function () {
    $('#bs-example-navbar-collapse-1').removeClass('in');
    $('#bs-example-navbar-collapse-1 ul li').removeClass('active open');
    $('li.nav-bio').addClass('active');
    $('.alert').hide();

    //Set currentView on your view model
    var content = $.get('biography.php', function(data) {
      $('#content').html(data);
    })
      .done(function() {
        //$('#loading').addClass('hide');
      });
  });

  this.get('#/categoria/:name/:imgId', function () {
    // Obtain category name
    var name = this.params['name'];
    // Obtain image id and trigger click event on that image
    // If not image found, it will just show the whole gallery.
    var imgId = this.params['imgId'];
    setTimeout(function(){
      $("#"+imgId).eq(0).trigger('click');
    }, 1000);

    $('#loading').show();

    $('#bs-example-navbar-collapse-1').removeClass('in');
    $('#bs-example-navbar-collapse-1 ul li').removeClass('active open');
    $('li.nav-pics').addClass('active');
    $('li.nav-pics-' + name).addClass('active');
    $('.alert').hide();

    // Set currentView on your view model
    var url = 'categories.php/?categoria=' + name;
    var content = $.get( url, function(data) {
      $('#content').html(data);
    })
      .done(function() {
        $('#loading').hide();
      });
  });

  this.get('#/contacto', function () {
    $('#bs-example-navbar-collapse-1').removeClass('in');
    $('#bs-example-navbar-collapse-1 ul li').removeClass('active open');
    $('li.nav-contact').addClass('active');
    $('.alert').hide();

    // Set currentView on your view model
    var url = 'contact.php';
    var content = $.get( url, function(data) {
      $('#content').html(data);
    })
      .done(function() {
        //$('#loading').addClass('hide');
      });
  });

  this.get('#/dir', function () {
    $('#bs-example-navbar-collapse-1').removeClass('in');
    $('#bs-example-navbar-collapse-1 ul li').removeClass('active open');
    $('li.nav-contact').addClass('active');
    $('.alert').hide();

    // Set currentView on your view model
    var url = 'libraries/pictureManager.php';
    var content = $.get( url, function(data) {
      $('#content').html(data);
    })
      .done(function() {
        //$('#loading').addClass('hide');
      });
  });

/*
  this.notFound = function(){
    var url = 'home.php';
    var content = $.get( url, function(data) {
      $('#content').html(data);
    })
      .done(function() {
      });
  }
*/

  this.post('#/sendmail', function(context) {
    var $form = $('#contact-form'),
      user_name = $form.find( "input[name='name']" ).val(),
      user_email = $form.find( "input[name='email']" ).val(),
      user_message = $form.find( "textarea[name='comment']" ).val(),
      spambox = $form.find( "textarea[name='contact-box']" ).val();
    var url = "libraries/sendmail.php";

    //data to be sent to server
    var posting = $.post(url, {
      'userName':user_name,
      'userEmail':user_email,
      'userMessage':user_message,
      'spambox':spambox
    }, function(data) {
      // Put message on alert div
      $('#contact .alert').html(data.text);
      if (data.type == 'error') {
        // Show error message
        $('#contact .alert-success').hide();
        $('#contact .alert-danger').show();
      } else {
        // Load contact form on page
        var url = 'contact.php';
        var content = $.get( url, function(data) {
          $("#contact .form-group").removeClass("has-feedback has-success");
          $("#contact span.glyphicon").addClass("hide");
          $("#contact-form input, textarea").val("");
        });
        // Show success message
        $('#contact .alert-danger').hide();
        $('#contact .alert-success').show();
      }
    }, "json");
  });

});

$(function() {
  app.run('#/');
});

