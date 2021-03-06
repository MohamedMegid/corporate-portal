<head>
    <meta charset='utf-8' />
    <meta name="description" content="Youtube video gallery plugin for jquery >= 1.9" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="../jquery.youtubevideogallery.js"></script>
    <link rel="stylesheet" href="../youtube-video-gallery.css" type="text/css"/>
    <link rel="stylesheet" href="../test/test.css" type="text/css"/>
    <!--[if lt IE 9]>
    <link href="../youtube-video-gallery-legacy-ie.css" type="text/css" rel="stylesheet"/>
    <![endif]-->
</head>

<body>
@foreach ($albums as $album)
<h1>{{$album->name}}</h1>
<div id="test" style="width:100%;">
    <ul class="youtube-videogallery">
    @foreach ($videos as $video)
        <li><a href="http://www.youtube.com/watch?v=UCOC1YwNwZw">Call me gordie</a></li>
        <li><a href="http://www.youtube.com/watch?v=UCOC1YwNwZw">Call me gordie</a></li>
        <li><a href="http://www.youtube.com/watch?v=UCOC1YwNwZw">Call me gordie</a></li>
        <li><a href="http://www.youtube.com/watch?v=UCOC1YwNwZw">Call me gordie</a></li>
        <li><a href="http://www.youtube.com/watch?v=UCOC1YwNwZw">Call me gordie</a></li>
        <li><a href="http://www.youtube.com/watch?v=UCOC1YwNwZw">Call me gordie</a></li>
    </ul>
    @endforeach
</div>
@endforeach
<script>
    $(document).ready(function(){
        $("ul.youtube-videogallery").youtubeVideoGallery();

        $("ul.youtube-videogallery-compact").youtubeVideoGallery( {
                assetFolder:'../',
                style:'compact',
                title:'none'
            }
        );

        $("ul.youtube-videogallery-search").youtubeVideoGallery({
            apiFallbackUrl: 'https://www.youtube.com/results?search_query=football+soccer',
            apiUrl: 'https://gdata.youtube.com/feeds/api/videos?q=football+-soccer&orderby=published&start-index=1&alt=json&max-results=6&v=2',
            assetFolder:'../'
        });
        $("ul.youtube-videogallery-user").youtubeVideoGallery({
            apiFallbackUrl: 'http://www.youtube.com/user/mayarcade',
            apiUrl:'http://gdata.youtube.com/feeds/api/users/mayarcade/uploads?v=2&alt=jsonc&max-results=6',
            assetFolder:'../'
        });
        $("ul.youtube-videogallery-playlist").youtubeVideoGallery({
            apiFallbackUrl: 'http://www.youtube.com/playlist?list=PLdLRpN7S7Ubw-OQI7MS04NuYpXHadH6xc',
            apiUrl:'http://gdata.youtube.com/feeds/api/playlists/PLdLRpN7S7Ubw-OQI7MS04NuYpXHadH6xc?alt=json&start-index=1&max-results=6&v=2',
            assetFolder:'../'
        });
    });
</script>
</body>