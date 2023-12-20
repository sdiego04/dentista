<?php

namespace app\Services;

use stdClass;

class Api {

    public static function response(int $code, bool $status, $data, string $message = null):void
    {
        header("HTTP/1.1");
        http_response_code($code);

        $response = new stdClass();
        $response->status = $status;
        $response->message = $message;
        $response->data = $data;

        $json_response = json_encode($response);
        echo $json_response;
        
        die;
    }
}