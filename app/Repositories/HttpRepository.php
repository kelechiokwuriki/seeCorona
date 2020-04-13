<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;


abstract class HttpRepository 
{
    protected $url;

    public function __construct(String $url)
    {
        $this->url = $url;
    }

    public function fetch(String $url)
    {
        $response = Http::get($url);

        if($response->successful())
        {
            return $response->json();
        }

        return false;
    }

    public function post(String $url, array $data) 
    {
        $response = Http::post($url, $data);

        if($response->successful())
        {
            return $response->json();
        }

        return false;
    }
}

