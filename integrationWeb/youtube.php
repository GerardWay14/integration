<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="youtube.css">
    <title>YouTube</title>

    <script src="https://www.youtube.com/iframe_api"></script>

</head>
<body>
    
 
  <div id="youtube-container"></div>


<script>
    
    var apiKey = 'AIzaSyDwMeTLC-4KHgOCH7U8m_mofx2d4OZIF84';
    
   
    var videoId = 'hKXItyudmzc';

   
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('youtube-container', {
            height: '360', // Adjust the height as needed
            width: '640',  // Adjust the width as needed
            videoId: videoId,
            playerVars: {
                'autoplay': 1,
                'controls': 1,
                'showinfo': 0,
                'rel': 0,
                'modestbranding': 1
            },
            events: {
                'onReady': onPlayerReady
            }
        });
    }

    function onPlayerReady(event) {
       
    }
</script>

</body>
</html>
