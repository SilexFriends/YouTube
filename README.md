# YouTube Silex Service Provider

[![Build Status](https://travis-ci.org/SilexFriends/silex-youtube.svg?branch=master)](https://travis-ci.org/mrprompt/silex-youtube)

```
use SilexFriends\YouTube\YouTube;

...

$api_key = getenv('YOUTUBE_API_KEY');

$app     = new Application;
$app->register(new YouTube($api_key));

...

/* @var $video array */
$video = $app['youtube']('http://...');

var_dump($video);
```

:)