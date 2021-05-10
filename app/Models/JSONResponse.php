<?php

namespace App\Models;


class JSONResponse
{
    private $url;
    private $json;

    public function __construct($url)
    {
        $this->url = $url;
        $response = null;
        try {
            $response = file_get_contents($url);
        } catch (\ErrorException $e) {
        }
        if ($response !== null ) {
            $this->json = json_decode($response);
        }
    }
    
    public function getJson()
    {
        return $this->json;
    }

}
