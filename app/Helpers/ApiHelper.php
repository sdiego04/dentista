<?php


function response(int $code, bool $status, $data, string $message = null, stdClass $options = null): void
{
    header("HTTP/1.1");
    http_response_code($code);

    $response = new stdClass();
    $response->status = $status;
    $response->message = $message;
    $response->data = $data;
    $response->options = $options;

    $json_response = json_encode($response);
    echo $json_response;

    die;
}


?>