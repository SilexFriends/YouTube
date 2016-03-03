<?php
declare(strict_types = 1);

namespace MrPrompt\Silex;

/**
 * Youtube Service Interface
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
interface YoutubeInterface
{
    /**
     * @const string
     */
    const NAME = 'youtube';

    /**
     * Create an Youtube media
     *
     * @param string $url
     * @return array
     */
    public function create(string $url): array;
}
