<?php

namespace ChrisHardinge\NbnLookup;


use GuzzleHttp\Client;

class Search
{
    /**
     * @var Client $guzzleClient
     */
    protected $guzzleClient;

    public function __construct(Client $guzzleClient = null)
    {
        $this->guzzleClient = $guzzleClient ?? new Client;
    }

    private function get(string $uri)
    {
        return json_decode($this->guzzleClient->get($uri, [
            'headers' => [
                'Referer' => "https://www.nbnco.com.au/when-do-i-get-it/rollout-map.html",
            ],
        ])->getBody()->getContents());
    }

    public function byAddress(string $address)
    {
        $response = $this->get('https://places.nbnco.net.au/places/v1/autocomplete?query=' . urlencode($address));
        if(!empty($response->suggestions)) {
            return $this->byLocId($response->suggestions[0]->id);
        }
        return null;
    }

    public function byLocId(string $loc)
    {
        if($response = $this->get('https://places.nbnco.net.au/places/v2/details/' . urlencode($loc))) {
            return $response;
        }
        return null;
    }
}