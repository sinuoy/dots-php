<?php

namespace Dots\Config;

class Environment {
    const SANDBOX = 'sandbox';
    const PRODUCTION = 'production';

    public static function getApiUrl($environment): string
    {
        return match ($environment) {
            self::SANDBOX => 'https://pls.senddotssandbox.com/api',
            self::PRODUCTION => 'https://api.dots.dev/api',
            default => throw new \InvalidArgumentException('Invalid environment specified'),
        };
    }

    public static function makePath($path): string
    {
        return sprintf('/v2/%s', $path);
    }
}
