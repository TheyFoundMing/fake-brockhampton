$(document).ready(function () {
    $('video').on('play', function (e) {
        setTimeout(function() {
          $('.carousel').carousel('pause'); 
        }, 500);
    });
    $('video').on('stop pause ended', function (e) {
      $(".carousel").carousel();
    });
}); 