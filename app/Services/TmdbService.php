<?php

namespace App\Services;

use GuzzleHttp\Client;

class TmdbService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.key');

        $this->client = new Client([
            'base_uri' => config('services.tmdb.base_url'),
            'timeout'  => 5.0,
            'headers'  => [
                'Authorization' => 'Bearer ' . config('services.tmdb.token'),
                'Accept'        => 'application/json',
            ]
        ]);
    }

    public function authentication()
    {
        $response = $this->client->get('/3/account/22057170');
        return json_decode($response->getBody(), true);
    }

    public function trendingMovies( $timeWindow = 'week' ){
        $response = $this->client->get("/3/trending/movie/{$timeWindow}", [
            'query' => [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]
        ]);
        return json_decode($response->getBody(), true);
    }

    public function getTrendingMovies($timeWindow = 'week')
    {
        $response = $this->client->get("/3/trending/movie/{$timeWindow}", [
            'query' => [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

//    public function searchMovies($query)
//    {
//        $response = $this->client->get('/3/search/movie', [
//            'query' => [
//                'api_key' => $this->apiKey,
//                'query' => $query,
//                'language' => 'en-US',
//            ],
//        ]);
//
//        return json_decode($response->getBody(), true);
//    }

//    public function getMovie($id)
//    {
//        $response = $this->client->get("/3/movie/{$id}", [
//            'query' => [
//                'api_key' => $this->apiKey,
//                'language' => 'en-US',
//            ],
//        ]);
//
//        return json_decode($response->getBody(), true);
//    }
}
