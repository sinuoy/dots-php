<?php

namespace Dots\Exception;

class ApiException extends Exception implements ExceptionInterface {
    public function __construct($message = "", $code = 0, \Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
