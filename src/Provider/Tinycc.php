<?php

/*
 * This file is part of the Indigo Shorten package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Shorten\Provider;

use Indigo\Shorten\Provider;
use Indigo\Http\Client;

/**
 * Shorten URL with Tiny.cc
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Tinycc implements Provider
{
    /**
     * API Endpoint
     */
    const ENDPOINT = 'http://tiny.cc';

    /**
     * API Version
     */
    const VERSION = '2.0.3';

    /**
     * HTTP Client
     *
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @param Client $client
     * @param string $apiKey
     */
    public function __construct(Client $client, $apiKey = null)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function shorten($url)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function expand($url)
    {

    }
}
