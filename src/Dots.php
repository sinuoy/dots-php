<?php

namespace Dots;

class Dots {
    public static DotsClient $dotsClient;
    public static function setCredentials($clientId, $apiKey, $environment = 'sandbox'): void
    {
        self::$dotsClient = new DotsClient($clientId, $apiKey, $environment);
    }

    public static function __callStatic($method, $args) {
        if (!isset(self::$dotsClient)) {
            throw new \RuntimeException('Dots credentials not set');
        }

        return call_user_func_array([self::$dotsClient, $method], $args);
    }
}
