var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;

var playerWidth = windowWidth * 0.55
var playerHeight = windowHeight * .53
console.log(playerWidth);
console.log(playerHeight);


// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
    createPlayer(tempVideoIdenfitifer)
}

function createPlayer(vidId) {
    player = new YT.Player('player', {
        height: playerHeight,
        width: playerWidth,
        videoId: vidId,
        playerVars: {
            controls: 0,
            showinfo: 0
        },
        events: {
            'onReady': onPlayerReady,

        }
    });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  event.target.playVideo();
}



// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
function stopVideo() {
player.stopVideo();
}

function playVideo(){
player.playVideo()
}

function pauseVideo(){
player.pauseVideo()
}

function jumpTo(seconds){
player.seekTo(seconds, true)
}



function checkForPlaybackValue(item, index){
    if(item == .5)
    {
        showContent("playback .5");
    }
    if(item == 1.5)
    {
        showContent("playback 1.5");
    }
    if(item == 2)
    {
        showContent("playback 2");
    }
}


function hideContent(contentId) {
    var contentId = document.getElementById(contentId);
    contentId.style.display = "none";

}

function showContent(contentId) {

    var contentId = document.getElementById(contentId);
    contentId.style.display = "block";

}


function toggleContent(contentId) {
    // Get the DOM reference
    var contentId = document.getElementById(contentId);
    if(contentId == null) {
    contentId.style.display = "none";
}
    // Toggle
    contentId.style.display == "block" ? contentId.style.display = "none" :
        contentId.style.display = "block";
}

function setPlaybackSpeedButtons() {
    var playbackRates = player.getAvailablePlaybackRates();
    playbackRates.forEach(checkForPlaybackValue);
}


function jumpBackAndHide(seconds, contentId) {
    jumpTo(seconds);
    player.playVideo();
    hideContent(contentId);
}


function correctResponse(contentId) {
    // setFlag(contentId);
    hideContent(contentId);
    player.playVideo();

    }


function equalToYoutubeTime(seconds) {
    if(player.getCurrentTime() >= seconds)
    {
        return true;
    }
    else
    {
        return false;
    }
}
