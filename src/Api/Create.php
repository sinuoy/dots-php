<?php

namespace Dots\Api;

use Dots\Config\Environment;
use Dots\Dots;
use Dots\DotsObject;
use Dots\Exception\ApiException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @method static request(string $string, string $makePath, array $array)
 */
trait Create
{
    /**
     * @throws GuzzleException
     * @throws ApiException
     */
    public static function create(array $data): DotsObject
    {
        return Dots::$dotsClient->{static::SERVICE}->create($data);
    }
}
