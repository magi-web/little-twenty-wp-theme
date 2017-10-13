<!DOCTYPE html>
<html>
<head>
    <title>Musiques de Frédéric Delarue</title>
    <link href="/wp/wp-content/themes/little-twenty/assets/css/jplayer/blue.monday/css/jplayer.blue.monday.min.css"
          rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/wp/wp-includes/js/jquery/jquery.js"></script>
    <script type="text/javascript"
            src="/wp/wp-content/themes/little-twenty/assets/js/jplayer/jquery.jplayer.min.js"></script>
    <script type="text/javascript"
            src="/wp/wp-content/themes/little-twenty/assets/js/jplayer/add-on/jplayer.playlist.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery.ajax({
                type: "GET",
                url: "/wp/wp-content/themes/little-twenty/assets/xml/playlist.xml",
                dataType: "xml",
                success: function (xml) {
                    var tracks = jQuery(xml).find('track');

                    var songs = [];
                    jQuery(tracks).each(function (index, element) {
                        var mp3 = jQuery(element).children('location').html();
                        var title = jQuery(element).children('title').html();
                        songs.push({title: title, mp3: mp3});
                    });

                    new jPlayerPlaylist({
                        jPlayer: "#jquery_jplayer_1",
                        cssSelectorAncestor: "#jp_container_1"
                    }, songs, {
                        swfPath: "./wp/wp-content/themes/little-twenty/assets/js/jplayer",
                        supplied: "mp3",
                        wmode: "window",
                        useStateClassSkin: true,
                        autoBlur: false,
                        smoothPlayBar: true,
                        keyEnabled: true
                    });
                }
            });
        });
    </script>
</head>
<body style="overflow: hidden;">
<div style="background:#ffffff; width: 275px; text-align: center;">
    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
    <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
        <div class="jp-type-playlist">
            <div class="jp-gui jp-interface">
                <div class="jp-controls">
                    <button class="jp-previous" role="button" tabindex="0">previous</button>
                    <button class="jp-play" role="button" tabindex="0">play</button>
                    <button class="jp-next" role="button" tabindex="0">next</button>
                    <button class="jp-stop" role="button" tabindex="0">stop</button>
                </div>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-volume-controls">
                    <button class="jp-mute" role="button" tabindex="0">mute</button>
                    <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                    <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
                </div>
                <div class="jp-time-holder">
                    <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                    <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                </div>
                <div class="jp-toggles">
                    <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                    <button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
                </div>
            </div>
            <div class="jp-playlist">
                <ul>
                    <li>&nbsp;</li>
                </ul>
            </div>
            <div class="jp-no-solution">
                <span>Update Required</span>
                To play the media you will need to either update your browser to a recent version or update your <a
                        href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
            </div>
        </div>
    </div>
    <!--
    <object type="application/x-shockwave-flash" data="/wp/wp-content/themes/little-twenty/assets/flash/dewplayer-playlist.swf" id="dewplayer" name="dewplayer" width="240" height="200">
        <param name="wmode" value="transparent">
        <param name="name" value="Relaxation">
        <param name="movie" value="/wp/wp-content/themes/little-twenty/assets/flash/dewplayer-playlist.swf">
        <param name="flashvars" value="showtime=true&amp;autoplay=true&amp;autoreplay=true&amp;volume=80&amp;xml=/wp/wp-content/themes/little-twenty/assets/xml/playlist.xml">
    </object>
    -->
    <p style="margin-top:0;">
        Oeuvres de <a href="http://www.fredericdelarue.com/homepage_francais.html" target="_blank">Frédéric Delarue</a>.<br>Vous
        pouvez vous procurer ses oeuvres sur <a title="aller sur www.debowska.fr" href="http://www.debowska.fr"
                                                target="_blank"> www.debowska.fr</a></p>
</div>
<p style="font-size: 10pt;width: 275px">Ces oeuvres vous sont proposées en écoute en ligne avec l'accord de Frédéric
    Delarue. Toute
    reproduction est strictement interdite.
</p>
</body>
</html>