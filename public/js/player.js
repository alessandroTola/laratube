var player = videojs('video')

var viewLogger = false;
player.on('timeupdate', function() {
    var percentagePlayer = Math.ceil((player.currentTime() / player.duration()) * 100);

    if(percentagePlayer > 10 && !viewLogger){
        axios.put('/videos/' + window.CURRENT_VIDEO)
        viewLogger = true;

    }
})
