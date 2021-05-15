<?php

namespace App\Models;


class JSONResponse
{
    private $url;
    private $json;
    private $response;

    public function __construct($url)
    {
        $this->url = $url;
        $this->response = null;

        $options  = array(
            'http' => array(
                'user_agent' => env('APP_USER_AGENT')
            )
        );
        $context  = stream_context_create($options);
        try {
            $this->response = file_get_contents($url, false, $context);
        } catch (\ErrorException $e) {
        }
        if ($this->response !== null ) {
            $this->json = json_decode($this->response);
        }
    }
    
    public function getJson()
    {
        return $this->json;
    }

    public function setJson($json)
    {
        $this->json = $json;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
