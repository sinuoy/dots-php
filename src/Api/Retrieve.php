<?php

namespace Dots\Api;

use Dots\Dots;
use Dots\DotsObject;
use Dots\Exception\ApiException;
use GuzzleHttp\Exception\GuzzleException;

trait Retrieve
{
    /**
     * @throws GuzzleException
     * @throws ApiException
     */
    public static function retrieve($id): DotsObject
    {
        return Dots::$dotsClient->{static::SERVICE}->retrieve($id);
    }
}
