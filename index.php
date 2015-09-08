<?php
//http://webcheatsheet.com/php/create_thumbnail_images.php
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adriana Alonso</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <!-- Awesomfont -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Fancybox stylesheet -->
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <!-- bxSlider stylesheet -->
    <link rel="stylesheet" href="bxslider/jquery.bxslider.css">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="css/principal.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <?php
        include 'navigation.php';
      ?>
    </div>
    <div id="principal" class="container">
      <div class="row">
        <div id="loading" class="col-xs-12 col-md-12"></div>
        <div id="content"></div>
        <!-- <div id="body" class="col-xs-12 col-md-12 black"></div> -->
      </div>
    </div>
    <div class="container">
      <div id="footer" class="footer text-center">
          <p><a href="http://neschi.com" target="_blank">./neschi</a></p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/libraries/jquery-1-11-0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!-- Fancybox library -->
    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <!-- Spin JS library -->
    <script type="text/javascript" src="js/libraries/spin-2-0-1.min.js"></script>
    <!-- Sammy library -->
    <script type="text/javascript" src="js/libraries/sammy-latest.min.js"></script>
    <!-- bxSlider library -->
    <script type="text/javascript" src="bxslider/jquery.bxslider.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="js/principal.js"></script>
    <!-- Google Analytics for Sammy -->
    <script type="text/javascript" src="js/libraries/sammy.googleanalytics.js"></script>
    <!-- Route mapping -->
    <script type="text/javascript" src="js/routemap.js"></script>
    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-52860840-1', 'auto');
      ga('send', 'pageview');
    </script>
    
    <!-- Facebook -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : 235713796561916,
          xfbml      : true,
          version    : 'v2.4'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
  </body>
</html>
