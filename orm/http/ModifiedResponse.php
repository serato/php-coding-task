<?php

namespace Orm\http;

class Response implements Psr\Http\Message\ResponseInterface
{

    private $statusCode = 'HTTP/1.1 200 OK';
    private $headers = [];

    public function setHeader($name, $value) {
        $this->headers[$name] = [
            (string) $value,
        ];
    }

    public function redirect($url) {
        $this->setHeader('Location', $url);
    }

    // omitted more functions required by the interface

}
