<?php
declare(strict_types = 1);

namespace SilexFriends\YouTube;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Madcoda\Youtube as YoutubeDriver;

/**
 * Youtube Service
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
final class YouTube implements YouTubeInterface, ServiceProviderInterface
{
    /**
     * @var array
     */
    private $config;

    /**
     * Youtube constructor.
     *
     * @param string $api_key
     */
    public function __construct(string $api_key)
    {
        $this->config = [
            'api_key' => $api_key,
        ];
    }

    /**
     * (non-PHPdoc)
     * @see \Silex\ServiceProviderInterface::register()
     * @param Application $app
     */
    public function register(Application $app)
    {
        $service = $this;

        $app[static::NAME] = $app->protect(
            function (string $url) use ($service) {
                return $service->create($url);
            }
        );
    }

    /**
     * (non-PHPdoc)
     * @see \Silex\ServiceProviderInterface::boot()
     * @param Application $app
     */
    public function boot(Application $app)
    {
        // :)
    }

    /**
     * Create a Youtube media
     *
     * @param string $url
     * @return array
     */
    public function create(string $url): array
    {
        $config  = $this->config;

        /* @service YoutubeDriver */
        $service = new YoutubeDriver(['key' => $config['api_key']]);

        $videoId = $service->parseVIdFromURL($url);
        $video   = $service->getVideoInfo($videoId);

        return (array) $video;
    }
}
