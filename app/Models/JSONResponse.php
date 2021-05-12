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

        $options  = array(
            'http' => array(
                'user_agent' => env('APP_USER_AGENT')
            )
        );
        $context  = stream_context_create($options);
        try {
            $response = file_get_contents($url, false, $context);
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
