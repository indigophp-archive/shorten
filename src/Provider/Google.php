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
use League\Url\Url;

/**
 * Shorten URL with Google
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Google implements Provider
{
    /**
     * API Endpoint
     */
    const ENDPOINT = 'https://www.googleapis.com/urlshortener/v1/url';

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
        $body = [
            'key'     => $this->apiKey,
            'longUrl' => $url,
        ];

        $body = json_encode(array_filter($body));

        $response = $this->client->post(self::ENDPOINT, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => $body,
        ]);

        $response = json_decode($response, true);

        return $response['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function expand($url)
    {
        $params = [
            'key'     => $this->apiKey,
            'shortUrl' => $url,
        ];

        $url = Url::createFromUrl(self::ENDPOINT);
        $query = $url->getQuery();
        $query->modify(array_filter($params));

        $response = $this->client->get((string) $url, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
        ]);

        $response = json_decode($response, true);

        return $response['longUrl'];
    }
}
