# YouTube Silex Service Provider

[![Build Status](https://travis-ci.org/SilexFriends/YouTube.svg?branch=master)](https://travis-ci.org/SilexFriends/YouTube)
[![Code Climate](https://codeclimate.com/github/SilexFriends/YouTube/badges/gpa.svg)](https://codeclimate.com/github/SilexFriends/YouTube)
[![Test Coverage](https://codeclimate.com/github/SilexFriends/YouTube/badges/coverage.svg)](https://codeclimate.com/github/SilexFriends/YouTube/coverage)
[![Issue Count](https://codeclimate.com/github/SilexFriends/YouTube/badges/issue_count.svg)](https://codeclimate.com/github/SilexFriends/YouTube)

## Install

```
composer require mrprompt/silex-youtube
```

## Usage
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

## Tests

```
./vendor/bin/phpunit
```

## License

MIT