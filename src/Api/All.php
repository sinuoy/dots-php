<?php

namespace Dots\Api;

use Dots\Dots;
use Dots\DotsObject;
use Dots\Exception\ApiException;
use GuzzleHttp\Exception\GuzzleException;

trait All
{
    /**
     * @throws GuzzleException
     * @throws ApiException
     */
    public static function all(): DotsObject
    {
        return Dots::$dotsClient->{static::SERVICE}->all();
    }
}
