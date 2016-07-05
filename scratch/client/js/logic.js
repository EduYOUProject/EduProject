$(document).ready(function(){

  var myPlayer = videojs('vid1');

  $('#playPause').click(function(){
    return myPlayer.paused() ? myPlayer.play() : myPlayer.pause();
  })

  $('#makeBig').click(function(){
    myPlayer.dimensions('1280px', '720px')
  })

  $('#makeSmall').click(function(){
    myPlayer.dimensions('384px', '216px');
  })


  $('#makeNormal').click(function(){
    myPlayer.dimensions('640px', '360px');
  })


  var options = {locked:true,controlTime:false},
    mPlayer = videojs('vid1');
    mPlayer.rangeslider(options);

  $('#range-slider').click(function(){
      mPlayer.showSlider();
      mPlayer.showControlTime();
      mPlayer.unlockSlider();
  })

  $('#hide-rangeslider').click(function(){
    mPlayer.hideSlider();
    mPlayer.hidControlTime();
    mPlayer.lockSlider();
  })

  var ann = annotator(document.body);
  ann.setupPlugins()






})
