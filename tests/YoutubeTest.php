<?php
namespace MrPrompt\Silex\Tests;

use MrPrompt\Silex\YouTube;
use PHPUnit_Framework_TestCase;
use Silex\Application;

/**
 * Youtube service test case.
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class YoutubeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $app;

    /**
     * Bootstrap
     */
    public function setUp()
    {
        parent::setUp();

        $api_key = getenv('YOUTUBE_API_KEY');

        $app     = new Application;
        $app->register(new YouTube($api_key));

        $this->app = $app;
    }

    /**
     * Shutdown
     */
    public function tearDown()
    {
        $this->app = null;

        parent::tearDown();
    }

    /**
     * @test
     */
    public function createMustBeReturnArray()
    {
        $url = 'https://www.youtube.com/watch?v=moSFlvxnbgk';

        $result = $this->app[YouTube::NAME]($url);

        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('etag', $result);
        $this->assertArrayHasKey('snippet', $result);
    }
}
