$(document).ready(function() {
  // Load fancybox.
  //$(".fancybox").fancybox();
  $(".fancybox")
    .attr('rel', 'gallery')
    .fancybox({
      //padding : 0,
      helpers : {
          title : {
              type: 'inside'
          }
      },
      beforeShow: function () {
        if (this.title) {
          var title_original = encodeURIComponent(this.title);
          // New line
          this.title += ' | ';
          // Prepare the URL for facebook
          var url = this.href;
          var url_splitted = url.split('/');
          var imgCat = url_splitted[5];
          var imgId = url_splitted[6].slice(0,-4);
          var fb_url = location.protocol + "//" + location.hostname + "/%23/categoria/" + imgCat + "/" + imgId;
          var img_url = location.protocol + "//" + "alonsoadriana.com.ar" + "/images/categories/" + imgCat + "/" + imgId + ".jpg";
          // Add FaceBook like button
          //this.title += '<i class="fa fa-facebook-square"></i> <a href="#" onclick="javascript:window.open(\'https://www.facebook.com/sharer/sharer.php?u='+fb_url+'\',\'Comparte en Facebook\',\'location=no,toolbar=no,width=350,height=350\');return false">Comparte en Facebook</span></a>';
          this.title += '<i class="fa fa-facebook-square"></i> <a href="#" onclick="javascript:window.open(\'https://www.facebook.com/dialog/feed?app_id=235713796561916&link='+fb_url+'&picture='+img_url+'&name=Mira%20esta%20obra%20de%20Adriana%20Alonso%21%21%21&description=Titulo%3A%20'+title_original+'%20%7C%20Oleo%20sobre%20tela&redirect_uri=http://alonsoadriana.com.ar/popupClose.html\');">Compartir en Facebook</span></a>';
        }
      }
    });

  // Load spinner.
  var opts = {
    lines: 9, // The number of lines to draw
    length: 0, // The length of each line
    width: 4, // The line thickness
    radius: 6, // The radius of the inner circle
    corners: 1, // Corner roundness (0..1)
    rotate: 0, // The rotation offset
    direction: 1, // 1: clockwise, -1: counterclockwise
    color: '#000', // #rgb or #rrggbb or array of colors
    speed: 1.9, // Rounds per second
    trail: 100, // Afterglow percentage
    shadow: false, // Whether to render a shadow
    hwaccel: false, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: '50%', // Top position relative to parent
    left: '50%' // Left position relative to parent
  };
  var target = document.getElementById('loading');
  var spinner = new Spinner(opts).spin(target);
  // Hide spinner when document ready.
  $('#loading').hide();
});
