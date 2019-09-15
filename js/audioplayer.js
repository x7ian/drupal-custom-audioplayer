( function($, win, doc) {

    function audioPlayer(){
        $("#song-audioplayer")[0].src = $("#song-playlist li a")[0];
        //$("#song-audioplayer")[0].play();
        $("#song-playlist li a").click(function(e){
            e.preventDefault();
            $("#song-audioplayer")[0].src = this;
            // $("#song-audioplayer")[0].play();
            $("#song-playlist li").removeClass("current-song");
            //currentSong = $(this).parent().index();
            $(this).parent().addClass("current-song");
            var title = $(this).parent().html();
            $("#song-title").html(title);
            var textId = $("#song-playlist li.current-song").data("text");
            $("#song-playlist ul").toggleClass('open');
            $(".list-icon").toggleClass('list-icon-active');

            //var playing = $("#song-playlist li.current-song").data('text');
            $(".song-text").removeClass('open');
            $(".lyrics-icon").removeClass('lyrics-icon-active');

        });

        $("#song-audioplayer")[0].addEventListener("ended", function(){
            currentSong++;
            if(currentSong == $("#song-audioplayer li a").length)
              currentSong = 0;
            $("#song-playlist li").removeClass("current-song");
            $("#song-playlist li:eq("+currentSong+")").addClass("current-song");
            $("#song-audioplayer")[0].src = $("#song-playlist li a")[currentSong].href;
            $("#song-audioplayer")[0].play();
            var textId = $("#song-playlist li.current-song").data("text");
            $("#song-controls .song-text").hide();
            $("#" + textId).show();
        });

        $(".list-icon").click(function() {
          $("#song-playlist ul").toggleClass('open');
          $(this).toggleClass('list-icon-active');
        });

        $(".lyrics-icon").click(function() {
          var playing = $("#song-playlist li.current-song").data('text');
          $(".song-text#" + playing).toggleClass('open');
          if ($(".song-text#" + playing).hasClass('open')) {
            $("#song-controls").css('z-index', 999);
          } else {
            $("#song-controls").css('z-index', 99);
          }
          $(this).toggleClass('lyrics-icon-active');
        });
        //list-icon-wrapper
    }
    audioPlayer();

}(jQuery, window, document));
