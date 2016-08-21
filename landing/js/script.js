$(document).ready(function() {

  var myPlayer = videojs('vid1');

  $(".contentContainer").css("min-height", $(window).height());

  $("#modal-close").click(function() {
    if(!myPlayer.paused()) {
      myPlayer.pause();
    }
  });

  $('#playPause').click(function(){
    return myPlayer.paused() ? myPlayer.play() : myPlayer.pause();
  });



})
